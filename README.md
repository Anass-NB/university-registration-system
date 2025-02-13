# Registration System for University Professional License Courses

A comprehensive web application for managing university professional  course registrations, built with Laravel, PHP, MySQL, and modern frontend technologies.

## 🚀 Features

### 👨‍🎓 For Students
- Account creation and authentication
- Profile management
- Course browsing and application
- Real-time application status tracking
- Document upload system

### 👨‍💼 For Administrators
- Comprehensive dashboard
- Course and training management
- Teacher account management
- Competition room assignment
- Excel report generation and management

### 👨‍🏫 For Teachers
- Student list management
- Advanced filtering system
- Excel report generation
- Application review system

## 🛠 Technologies Used

- **Backend:** PHP 8.1, Laravel 10
- **Frontend:** HTML5, CSS3, JavaScript, Bootstrap 5
- **Database:** MySQL
- **Authentication:** Laravel Breeze
- **File Storage:** Laravel Storage
- **Reporting:** Laravel Excel

## ⚙️ Installation

1. Clone the repository
```bash
git clone https://github.com/Anass-NB/precandidature-pfe.git
cd precandidature-pfe
```

2. Install dependencies
```bash
composer install
npm install
```

3. Environment setup
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure your database in `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. Database setup
```bash
php artisan migrate --seed
```

6. Start the application
```bash
php artisan serve
npm run dev
```

## 🧪 Testing the Application

### Test Accounts

1. **Admin Account**
```
Email: amine.abdellah@usms.test
Password: password
Role: Administrator
```

2. **Teacher Accounts**
```
Email: rachid.ait@usms.test
Password: password
Role: Teacher/Enseignant
Speciality: Informatique

Email: marie.martin@education.com
Password: password
Role: Teacher/Enseignant
Speciality: Mathématiques
```

3. **Student Account**
```
Email: Create new account
Password: create new password
Role: Student
```

### Testing Flow

1. **Admin Testing**
   - Login 
   - Access the admin dashboard
   - Manage formations and teachers
   - View all applications
   - Send SMS notifications
   - Generate reports

2. **Teacher Testing**
   - Login 
   - View assigned formations
   - Review student applications
   - Generate class reports
   - Manage student evaluations

3. **Student Testing**
   - Login using user@user.com or register a new account
   - Complete your profile
   - Browse available formations
   - Submit applications
   - Upload required documents
   - Track application status

### Important Notes
- All test accounts use 'password' as the default password
- Additional random accounts are generated through seeders
- You can create new accounts through the registration system

## 📱 Mobile Responsiveness
The application is fully responsive and works seamlessly on:
- Desktop browsers
- Tablets
- Mobile devices

## 👥 Authors

- **EL JADI Soufiane** - [eljadi.souf@gmail.com](mailto:eljadi.souf@gmail.com)
- **NABIL Anass** - [Anassnabil067@gmail.com](mailto:Anassnabil067@gmail.com)

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 📸 Screenshots

### Administrator Interface
![Admin Dashboard](https://github.com/Anass-NB/precandidature-pfe/assets/110456240/cee219fd-3c6a-4359-8e57-475a6926be34)
![Admin Statistics](https://github.com/Anass-NB/precandidature-pfe/assets/110456240/a4212d21-4205-4b8a-864d-136b250a1e91)
![Admin Management](https://github.com/Anass-NB/precandidature-pfe/assets/110456240/0e2645da-683c-469d-ad9a-3b26f206ea32)
![Admin Reports](https://github.com/Anass-NB/precandidature-pfe/assets/110456240/e547ce83-1773-4476-a6b6-0bbdbb29373e)
![Admin Users](https://github.com/Anass-NB/precandidature-pfe/assets/110456240/2eed3534-dcb1-4c49-b385-3e935969994a)
![Admin Formations](https://github.com/Anass-NB/precandidature-pfe/assets/110456240/9cb47a5f-a44d-4ea0-8145-aa117540df76)
![Admin Applications](https://github.com/Anass-NB/precandidature-pfe/assets/110456240/9b967801-4ee0-4530-aa55-ac432e758952)
![Admin Settings](https://github.com/Anass-NB/precandidature-pfe/assets/110456240/6ef7415f-5a72-4340-8950-14bd6c951a23)

### Teacher Interface
![Teacher Dashboard](https://github.com/Anass-NB/precandidature-pfe/assets/110456240/54f0b4eb-b80b-496c-8f72-72004dd012d9)
![Teacher Students](https://github.com/Anass-NB/precandidature-pfe/assets/110456240/63e44952-3ce7-4f10-baba-ae92a2bfca58)
![Teacher Reports](https://github.com/Anass-NB/precandidature-pfe/assets/110456240/f3b735a5-b587-4f67-af4a-66cac1895820)
![Teacher Management](https://github.com/Anass-NB/precandidature-pfe/assets/110456240/7f569ead-fc85-4b72-9007-308d9d6c2408)

### Student Interface
![Student Dashboard](https://github.com/Anass-NB/precandidature-pfe/assets/110456240/12fed1c3-501f-4072-95b3-2a7e86358e90)
![Student Profile](https://github.com/Anass-NB/precandidature-pfe/assets/110456240/9364cc45-6d60-4753-b25a-d570d190a251)
![Application Form 1](https://github.com/Anass-NB/precandidature-pfe/assets/110456240/2465129d-57f3-420c-9ad1-669a747daa38)
![Application Form 2](https://github.com/Anass-NB/precandidature-pfe/assets/110456240/6a5ec99d-45d5-40da-a598-2cbd00ddd654)
![Application Form 3](https://github.com/Anass-NB/precandidature-pfe/assets/110456240/590a5c3a-a333-44b6-af73-2da67be933fe)

### Mobile Interface
![Mobile View 1](https://github.com/Anass-NB/precandidature-pfe/assets/110456240/1d2a6463-989e-42c3-a74f-8a044bd6c43b)
![Mobile View 2](https://github.com/Anass-NB/precandidature-pfe/assets/110456240/5b045192-e8a6-4894-853a-125e233c3651)
![Mobile View 3](https://github.com/Anass-NB/precandidature-pfe/assets/110456240/53c2b952-1c83-4302-91ae-565e66927fb4)

## 🙏 Acknowledgments

- All contributors who helped in this project
