# Access-Guard - Laravel Admin Dashboard & User Management System

A robust Laravel-based web application featuring a user management system, role-based access control, pending request handling, activity logs, system settings, and profile management including image uploads. Built with a focus on extensibility, admin oversight, and real-time user interaction.

## 🌐 Live Demo

> 🚀 [View Deployed App](https://accessguard.onrender.com)  


## 🚀 Features

- 🔐 **Authentication & Authorization**
  - User registration, login, and email verification
  - Role-based access control (User, Admin)
  
- 🧑‍💼 **Admin Dashboard**
  - Overview of system activities and user metrics
  - Recent activities with dynamic tracking

- 👥 **User Management**
  - View, manage, and modify registered users
  - Approve or reject user-initiated requests

- 🔄 **Pending Requests**
  - Admin approval system for role upgrades & account deletions
  - Tracks request status (pending, approved, rejected)

- 🎚️ **Role Management**
  - Manage user roles and associated permissions (basic setup)

- 📋 **Activity Logs**
  - Log key user actions (login, profile update, requests)

- ⚙️ **System Settings**
  - Update and persist global app settings from the admin panel

- 🖼️ **Profile Image Upload**
  - Upload & manage profile pictures with storage optimization

## 🛠️ Tech Stack

- **Framework:** Laravel 10
- **Authentication:** Laravel Breeze / Sanctum
- **Database:** MySQL
- **Front-end:** Blade templating, Tailwind CSS
- **Storage:** Laravel Filesystem (local/public disk)

## 📂 Folder Structure Highlights

├── app/
│ ├── Http/
│ │ ├── Controllers/
│ │ │ ├── Admin/
│ │ │ ├── User/
│ │ │ └── Auth/
│ ├── Models/
│ ├── Providers/
│
├── resources/
│ └── views/
│ ├── admin/
│ ├── profile/
│ └── auth/


## ⚙️ Setup Instructions


```bash
# Clone the repo
git clone https://github.com/Unique-Ade/access-guard.git
cd access-guard

# Install dependencies
composer install

# Copy and edit environment file
cp .env.example .env
php artisan key:generate

# Set up DB connection in .env and then migrate
php artisan migrate

# (Optional) Seed the database
php artisan db:seed

# Serve the app
php artisan serve
```

## 🙋‍♂️ Author
 
- **Name**: Adeola Gabriel Olagbenro
- **Email**: 📧 olagbenrogabriel@gmail.com
- **GitHub**: 🔗 [Unique-Ade](https://github.com/Unique-Ade)
- **LinkedIn**:🔗 [Adeola Olagbenro](https://www.linkedin.com/in/olagbenro-adeola/)

---

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

## Contact

If you have any questions or feedback, feel free to reach out:
- Email: olagbenrogabriel@gmail.com
- GitHub: [Unique-Ade](https://github.com/Unique-Ade)
- LinkedIn: [Adeola Olagbenro](https://www.linkedin.com/in/olagbenro-adeola/)
