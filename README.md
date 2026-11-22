# MHILLIANA GRAND HOTEL
### Hotel Reservation Management System

## Project Overview

MHILLIANA GRAND HOTEL is a web-based Hotel Reservation Management System developed using Laravel. It provides a platform for guests to browse available rooms, make reservations, manage their bookings, and submit payments. It also provides an administrator interface for managing hotel operations.

## Technologies Used

- Laravel (PHP Framework)
- PHP
- MySQL
- XAMPP
- HTML, CSS, and JavaScript
- Tailwind CSS
- Blade Templates
- Alpine.js
- Vite

## Main Features

### Guest Features
- Guest registration and login
- Browse available hotel rooms
- View room information and prices
- Make room reservations
- View personal reservations
- Submit payments
- Manage profile information

### Administrator Features
- Administrator login
- Admin dashboard
- Manage hotel rooms
- Manage reservations
- Update reservation statuses
- Manage hotel services
- Manage and monitor payments

### Security Features
- Role-based access control
- Separate guest and administrator access
- Password hashing
- CSRF protection
- Form validation
- Protected administrator routes

## System Requirements

- PHP 8.2 or compatible version required by the installed Laravel version
- Composer
- Node.js and npm
- XAMPP
- MySQL
- Git

## Installation and Setup

### 1. Clone the Repository

```bash
git clone YOUR_GITHUB_REPOSITORY_LINK
```

Enter the project folder:

```bash
cd hotel-reservation-system
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Configure Environment

Copy `.env.example` and create a new file named `.env`.

On Windows Command Prompt:

```cmd
copy .env.example .env
```

On Git Bash:

```bash
cp .env.example .env
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Configure MySQL Database

1. Open XAMPP Control Panel.
2. Start Apache and MySQL.
3. Open phpMyAdmin at `http://localhost/phpmyadmin`.
4. Create a database named:

```text
hotel_reservation_system
```

5. Update the database configuration in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hotel_reservation_system
DB_USERNAME=root
DB_PASSWORD=
```

Adjust the username and password if your local MySQL configuration is different.

### 6. Configure Administrator Credentials

Add the following to `.env`:

```env
ADMIN_EMAIL=admin@mhillianagrandhotel.com
ADMIN_PASSWORD=ChooseYourOwnStrongPassword
```

Use a strong password of your choice. Never upload your actual `.env` file to GitHub.

### 7. Run Database Migrations

```bash
php artisan migrate
```

### 8. Create Administrator Account

Run:

```bash
php artisan db:seed
```

The administrator credentials will be based on the `ADMIN_EMAIL` and `ADMIN_PASSWORD` values configured in `.env`.

### 9. Build Frontend Assets

```bash
npm run build
```

### 10. Start the Laravel Application

```bash
php artisan serve
```

Open the application in your browser:

`http://127.0.0.1:8000`

## User Roles

**Guest:** Can browse available rooms, make reservations, manage bookings, and submit payments.

**Administrator:** Can manage rooms, reservations, hotel services, and payments through the administrator dashboard.

## Important Notes

- Do not upload `.env` to GitHub.
- Keep `.env.example` updated with the required environment variable names.
- Configure your own database credentials before running migrations.
- Configure administrator credentials before running the database seeder.
- The application requires its dependencies and database to be configured before it can run.

## Project Purpose

This project demonstrates the development of a web-based hotel reservation system using Laravel, MySQL, and modern web technologies. It aims to simplify hotel reservation processes and provide organized management of hotel operations.
