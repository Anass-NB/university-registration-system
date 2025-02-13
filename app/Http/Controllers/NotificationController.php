<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Config;

class NotificationController extends Controller
{
    private $apiUrl;
    private $apiKey;
    private $originator;

    public function __construct()
    {
        $this->apiUrl = config('services.d7networks.url');
        $this->apiKey = config('services.d7networks.key');
        $this->originator = config('services.d7networks.originator');
    }

    public function index()
    {
        return view("pages.admin.notifications.index");
    }

    public function store(Request $request)
    {
        $request->validate([
            'fichier_excel' => 'required|mimes:xlsx,xls,csv',
            'message' => 'required|string|max:160'
        ]);

        try {
            $file = $request->file('fichier_excel');
            $data = Excel::toArray([], $file);
            $telephones = collect($data[0])->pluck(3)->map(fn($phone) => strval($phone))->toArray();

            $payload = [
                "messages" => [
                    [
                        "channel" => "sms",
                        "recipients" => $telephones,
                        "content" => $request->message,
                        "msg_type" => "text",
                        "data_coding" => "text"
                    ]
                ],
                "message_globals" => [
                    "originator" => $this->originator,
                    "report_url" => config('services.d7networks.report_url')
                ]
            ];

            $response = $this->sendSMS($payload);

            if (!$response) {
                throw new \Exception('Failed to send SMS');
            }

            toastr()->success('Les messages ont été envoyés avec succès');
            return redirect()->route("notifications.index");

        } catch (\Exception $e) {
            toastr()->error('Erreur lors de l\'envoi des messages: ' . $e->getMessage());
            return back();
        }
    }

    private function sendSMS($payload)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $this->apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Accept: application/json',
                'Authorization: Bearer ' . $this->apiKey
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            \Log::error('SMS API Error: ' . $err);
            return false;
        }

        return $response;
    }
}
