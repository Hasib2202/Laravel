Here's the complete README.md file in markdown format:

```markdown
# HRMS Employee Management System

A comprehensive employee management system built with Laravel featuring full CRUD operations, validation, and responsive UI.

## ✨ Features

- **Employee Management**
  - ✅ Create new employees with auto-generated UID
  - 📄 Employee listing with search/sort capabilities
  - ✏️ Edit existing employee records
  - 🗑️ Delete employees with confirmation
  - 📅 Age calculation from Date of Birth

- **Validation System**
  - 🔒 Frontend validation using jQuery Validate
  - 🛡️ Backend validation with Laravel
  - 🚨 Real-time error highlighting
  - 📧 Unique email validation

- **User Interface**
  - 📱 Responsive Bootstrap 5 design
  - 🎨 Clean and modern interface
  - 📊 Interactive DataTables
  - 💬 SweetAlert2 notifications
  - 🪟 Modal-based forms

- **Advanced Functionality**
  - 🔄 AJAX-powered operations
  - 🤝 Employee Type relationships
  - ⚡ Dynamic dropdowns
  - 🛡️ CSRF protection
  - 📦 Factory-generated dummy data

## 🛠️ Technologies Used

**Backend** | **Frontend** | **Libraries**
------------ | ------------- | -------------
PHP 8.2 | HTML5 | jQuery 3.7
Laravel 10 | CSS3 | DataTables
MySQL | Bootstrap 5 | 
Eloquent ORM | JavaScript | jQuery Validate

## 🚀 Installation Guide

1. **Clone repository**
   ```bash
   git clone https://github.com/yourusername/hrms-employee-system.git
   cd hrms-employee-system
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Configure environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Update `.env` with your database credentials:
   ```ini
   DB_DATABASE=hrms_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Database setup**
   ```bash
   php artisan migrate --seed
   ```

5. **Start development server**
   ```bash
   php artisan serve
   ```

6. **Access application**
   ```
   http://localhost:8000/employee-setup
   ```

## 🖥️ Usage Guide

### Add New Employee
1. Click "Add Employee" button
2. Fill in all required fields
3. Submit form to see success notification

### Edit Employee
1. Click Edit button on any row
2. Modify details in the modal
3. Save changes

### Delete Employee
1. Click Delete button
2. Confirm deletion in dialog
3. View deletion notification

### Employee List Features
- 🔍 Search using any column
- ⬆️⬇️ Sort by clicking column headers
- 📱 Responsive mobile view
- 🔄 Automatic data refresh

## 📂 Project Structure

```text
hrms-employee-system/
├── app/
│   ├── Models/              # Database models
│   │   ├── Employee.php
│   │   └── EmployeeType.php
│   └── Http/Controllers/    # Application controllers
│       └── EmployeeController.php
├── database/
│   ├── migrations/          # Database schema
│   └── seeders/             # Test data generators
├── resources/
│   └── views/               # Blade templates
│       └── employee_setup.blade.php
├── routes/                  # Application routes
│   └── web.php
└── public/                  # Compiled assets
```

## 📸 Screenshots
Landing page
![Image](https://github.com/user-attachments/assets/0a287e3c-dde7-492a-8d73-089e79689685)
Employee List 
![Image](https://github.com/user-attachments/assets/5272fc69-f07c-4024-8c57-76f74b01a183) 
Add Employee
![Image](https://github.com/user-attachments/assets/0c893bcd-c3af-40f5-a77a-6526c1c15146)

Edit Employee 
![Edit Modal](![Image](https://github.com/user-attachments/assets/dbe99f4d-da7a-4baf-8f7a-f79b003bb294)

Action Button
![Buttons](![Image](https://github.com/user-attachments/assets/1f58bd34-eb2f-4ea8-8267-67edc282985c)

## 📜 License


## 🙏 Credits

- [Laravel](https://laravel.com) - PHP framework
- [Bootstrap](https://getbootstrap.com) - CSS framework
- [DataTables](https://datatables.net) - Table plugin
- [Faker](https://fakerphp.github.io) - Dummy data

---


