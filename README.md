# Beverly - Beverage Management System

## Overview
**Beverly** is a beverage management system designed to help businesses manage their inventory, categories, and users efficiently. This system allows for CRUD operations on products, user role management, and sorting/filtering features.

## Features
- **Product Management**: Add, edit, delete, and view products with detailed information including name, description, price, volume, and unit.
- **Category Management**: Organize products into categories for better structure.
- **User Management**: Role-based access control (Admin/Employee) for managing users and permissions.
- **Sorting & Filtering**: Search, sort by name, price and category.
- **Authentication**: Secure login and logout functionality.
- **Image Handling**: Supports external image URLs with a default fallback image.

## Tech Stack
- **Backend**: Laravel (PHP)
- **Frontend**: Blade (Laravel's templating engine)
- **Database**: MySQL
- **Authentication**: Laravel's built-in authentication
- **Testing**: PHPUnit, Laravel feature and unit tests
- **CI**: GitHub Actions (used for automated testing)

## Installation & Setup
1. **Clone the repository**
    ```sh
    git clone https://github.com/maxjvjohansson/beverly
    cd beverly

2. **Install dependencies**
    ```sh 
    composer install
    npm install

3. **Run database migrations & seed data**
    ```sh
    php artisan migrate:fresh --seed

4. **Start the development server**
    ```sh
    php artisan serve

## License
**This project is licensed under the MIT License.**