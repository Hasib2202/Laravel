# 🚀 Laravel & MySQL Essentials – Learning Project :) :)

This repository contains essential concepts, examples, and mini-implementations for mastering **Laravel** and **MySQL**.

---

## 📌 Topics Covered

- ✅ Laravel Setup & Directory Structure
- ✅ Web Routing & Controllers
- ✅ Blade Templating Engine
- ✅ Database Migrations & Eloquent ORM
- ✅ CRUD Operations (with Validation)
- ✅ Form Handling & File Upload
- ✅ Authentication (Laravel Breeze)
- ✅ Email Sending (Mailables)
- ✅ Relationships (One-to-Many, etc.)

---

## 🛠️ Requirements

- PHP >= 8.1
- Composer
- MySQL
- Node.js + npm (for Laravel Breeze & frontend)
- Laravel 10+

---

## 🚀 Setup Instructions

```bash
git clone https://github.com/your-username/laravel-learning.git
cd laravel-learning
composer install
cp .env.example .env
php artisan key:generate

# Configure your .env (DB, Mail)
php artisan migrate
npm install && npm run dev
php artisan serve
