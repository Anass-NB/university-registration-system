# Registration System for University Professional License Courses

A comprehensive web application for managing university professional license course registrations, built with Laravel, PHP, MySQL, and modern frontend technologies.

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
Email: admin@admin.com
Password: password
Role: Administrator
```

2. **Teacher Accounts**
```
Email: jean.dupont@education.com
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
Email: user@user.com
Password: password
Role: Student
```

### Testing Flow

1. **Admin Testing**
   - Login using admin@admin.com
   - Access the admin dashboard
   - Manage formations and teachers
   - View all applications
   - Send SMS notifications
   - Generate reports

2. **Teacher Testing**
   - Login using jean.dupont@education.com or marie.martin@education.com
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

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch
```bash
git checkout -b feature/AmazingFeature
```
3. Commit your changes
```bash
git commit -m 'Add some AmazingFeature'
```
4. Push to the branch
```bash
git push origin feature/AmazingFeature
```
5. Open a Pull Request

## 👥 Authors

- **EL JADI Soufiane** - [eljadi.souf@gmail.com](mailto:eljadi.souf@gmail.com)
- **NABIL Anass** - [Anassnabil067@gmail.com](mailto:Anassnabil067@gmail.com)

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 📸 Screenshots

### Admin Dashboard
![Admin Dashboard](public/images/screens/admin.png)
![Admin Formations](public/images/screens/admin-formations.png)
![Admin Users](public/images/screens/admin-users.png)

### Teacher Interface
![Teacher Dashboard](public/images/screens/teacher.png)
![Teacher Students](public/images/screens/teacher-students.png)

### Student Interface
![Student Dashboard](public/images/screens/student.png)
![Student Profile](public/images/screens/student-profile.png)
![Application Form](public/images/screens/application.png)

### Authentication Screens
![Login Page](public/images/screens/login.png)
![Register Page](public/images/screens/register.png)

### Responsive Design
![Mobile View](public/images/screens/mobile.png)
![Tablet View](public/images/screens/tablet.png)

## 🔗 Links

- [Live Demo](your-demo-link)
- [Documentation](your-docs-link)
- [Bug Report](your-issues-link)

## 🙏 Acknowledgments

- Laravel Team
- Bootstrap Team
- All contributors who helped in this project
