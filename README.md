# Simple App - Calculator

A robust PHP Laravel application that provides a secure and user-friendly calculator with history tracking.

## Features

### 1. Advanced Calculator
Perform basic arithmetic operations with ease:
- **Addition (+)**
- **Subtraction (-)**
- **Multiplication (*)**
- **Division (/)** (with zero-division protection)

### 2. History Tracking
- Every calculation is automatically saved to your personal history.
- View the date, operation, numbers used, and the result.
- Delete individual history entries as needed.

### 3. Secure Authentication
- **User Registration**: Create an account to start saving your calculations.
- **Login/Logout**: Secure access to your personal dashboard.
- **Guest Protection**: The calculator interface is only accessible to authenticated users.
- **Smart Redirects**: 
    - Guests trying to access the calculator are redirected to login.
    - Logged-in users trying to access login/register pages are redirected to the calculator.

### 4. Modern UI/UX
- **Responsive Design**: Built with Tailwind CSS for a seamless experience on mobile and desktop.
- **Consistent Layout**: Unified header and footer across all pages.
- **Dynamic Welcome Page**: Adaptive content based on your login status.

## Technologies Used
- **Framework**: Laravel 11
- **Styling**: Tailwind CSS
- **Database**: SQLite (default) / MySQL

## Getting Started

1.  Clone the repository.
2.  Run `composer install` to install dependencies.
3.  Run `npm install && npm run dev` to build assets.
4.  Copy `.env.example` to `.env` and configure your database.
5.  Run `php artisan key:generate`.
6.  Run `php artisan migrate` to set up the database schema.
7.  Start the server with `php artisan serve`.
