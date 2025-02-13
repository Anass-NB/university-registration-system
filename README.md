# 🎓 University Professional License Course Registration System
[![Laravel](https://img.shields.io/badge/Laravel-10.0-FF2D20?style=flat&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.1-777BB4?style=flat&logo=php)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=flat&logo=mysql)](https://mysql.com)
[![License](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)

A comprehensive web application for managing university professional course registrations, built with Laravel, PHP, MySQL, and modern frontend technologies.

## 📑 Table of Contents
- [Features](#-features)
- [System Requirements](#-system-requirements)
- [Technologies](#-technologies-used)
- [Installation](#️-installation)
- [Testing](#-testing)
- [API Documentation](#-api-documentation)
- [Mobile Support](#-mobile-support)
- [Contributing](#-contributing)
- [Authors](#-authors)
- [License](#-license)
- [Screenshots](#-screenshots)
- [Troubleshooting](#-troubleshooting)
- [Acknowledgments](#-acknowledgments)

## 🚀 Features

### 👨‍🎓 For Students

#### Account Management:
- Create and authenticate user accounts with email verification
- Manage personal profiles with detailed information
- Upload necessary documents (e.g., Baccalaureate, CV, Diploma, Transcripts)
- Reset passwords and manage security settings
- View application history and status timeline

#### Course Applications:
- Browse available professional license courses with advanced filtering
- View detailed information about each course (duration, requirements, schedule)
- Submit applications for multiple courses with document attachments
- Track application status with email notifications
- Cancel or modify applications within the designated timeframe
- Download application receipts and confirmations

#### Notifications:
- Receive real-time updates on application status
- Get email and SMS notifications about exam schedules and locations
- Custom notification preferences management
- Calendar integration for important dates

### 👨‍💼 For Administrators

#### Dashboard:
- Real-time statistics and analytics visualization
- Interactive charts showing application trends
- Geographic distribution of applicants
- Course popularity metrics
- Profile completion rate tracking
- Custom report generation

#### Course Management:
- Create and manage professional license courses
- Set application deadlines and requirements
- Assign teachers and manage course capacity
- Schedule exams and manage locations
- Generate course-specific reports
- Manage course prerequisites and requirements

#### Teacher Management:
- Comprehensive teacher profile management
- Course assignment and workload tracking
- Performance analytics and reporting
- Bulk teacher account creation via CSV
- Access control and permission management

#### Application Management:
- Advanced application filtering and sorting
- Batch application processing
- Automated eligibility checking
- Excel import/export functionality
- Document verification system
- Room assignment optimization

#### Communication:
- Automated email and SMS notification system
- Custom notification templates
- Bulk messaging capabilities
- Communication history tracking
- Emergency broadcast system

### 👨‍🏫 For Teachers (Chefs de Filière)

#### Application Review:
- Advanced candidate filtering system
- Automated scoring and ranking
- Batch application processing
- Document verification tools
- Interview scheduling system
- Application history tracking

#### Reporting:
- Custom report generation
- Excel and PDF export options
- Statistical analysis tools
- Performance metrics tracking
- Automated periodic reports
- Data visualization tools

#### Communication:
- Direct messaging with candidates
- Bulk notification system
- Automated status updates
- Interview scheduling
- Document request system

## 💻 System Requirements

### Server Requirements
- PHP >= 8.1
- MySQL >= 8.0
- Composer >= 2.0
- Node.js >= 16.0
- Apache/Nginx web server
- SSL certificate for production

### Supported Browsers
- Chrome (last 3 versions)
- Firefox (last 3 versions)
- Safari (last 2 versions)
- Edge (last 3 versions)

### Recommended Server Specifications
- CPU: 2+ cores
- RAM: 4GB minimum
- Storage: 20GB minimum
- Network: 100Mbps minimum

## 🛠 Technologies Used

### Backend
- PHP 8.1
- Laravel 10.x
- MySQL 8.0
- Redis (for caching)
- Laravel Sanctum (API authentication)
- Laravel Excel
- Laravel Breeze

### Frontend
- HTML5
- CSS3/SASS
- JavaScript/TypeScript
- Bootstrap 5
- Alpine.js
- Livewire
- Chart.js

### DevOps & Tools
- Git
- Docker
- Laravel Mix
- PHPUnit
- Jest
- GitHub Actions

## ⚙️ Installation

### Development Environment

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

MAIL_MAILER=smtp
MAIL_HOST=your_mail_host
MAIL_PORT=587
MAIL_USERNAME=your_mail_username
MAIL_PASSWORD=your_mail_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email
MAIL_FROM_NAME="${APP_NAME}"

SMS_PROVIDER=your_sms_provider
SMS_API_KEY=your_sms_api_key
```

5. Database setup
```bash
php artisan migrate --seed
php artisan storage:link
```

6. Start the application
```bash
php artisan serve
npm run dev
```

### Production Deployment

1. Configure production environment
```bash
composer install --optimize-autoloader --no-dev
npm install --production
```

2. Optimize Laravel
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

3. Set up HTTPS
```bash
# Using Let's Encrypt
certbot --nginx -d yourdomain.com
```

## 🧪 Testing

### Available Test Suites
- Unit Tests: `php artisan test --testsuite=Unit`
- Feature Tests: `php artisan test --testsuite=Feature`
- Browser Tests: `php artisan dusk`

### Test Accounts

#### Administrator
```
Email: amine.abdellah@usms.test
Password: password
Role: Administrator
```

#### Teachers
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

#### Student
```
Email: Create new account
Password: create new password
Role: Student
```

## 📚 API Documentation

### Authentication
```
POST /api/auth/login
POST /api/auth/register
POST /api/auth/logout
GET /api/auth/user
```

### Courses
```
GET /api/courses
POST /api/courses
GET /api/courses/{id}
PUT /api/courses/{id}
DELETE /api/courses/{id}
```

### Applications
```
GET /api/applications
POST /api/applications
GET /api/applications/{id}
PUT /api/applications/{id}
DELETE /api/applications/{id}
```

## 🔧 Troubleshooting

### Common Issues

1. Installation Problems
```bash
# Clear composer cache
composer clear-cache

# Remove vendor directory
rm -rf vendor
composer install

# Clear Laravel cache
php artisan config:clear
php artisan cache:clear
```

2. Database Issues
```bash
# Reset database
php artisan migrate:fresh --seed

# Fix permission issues
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

3. File Upload Issues
```bash
# Create storage link
php artisan storage:link

# Set proper permissions
chmod -R 775 storage/app/public
```

## 👥 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

### Coding Standards
- Follow PSR-12 coding standard
- Write meaningful commit messages
- Add tests for new features
- Update documentation as needed

## 👨‍💻 Authors

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
