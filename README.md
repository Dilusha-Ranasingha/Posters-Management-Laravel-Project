<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

---

# 🚀 Laravel Blog Post Project

![Laravel Blog Screenshot](screenshot.png) <!-- Replace with an actual screenshot URL if available -->

A **modern, feature-rich** blog application built with **Laravel 11**, styled using **Tailwind CSS**, and designed with a **dark, cinematic theme**. This project enables users to register, log in, create, edit, and delete posts while categorizing them into **Health & Wellness, Science & Nature, Technology, Sports, and History & Culture**.

---

## ✨ Features

- 🔑 **User Authentication** – Secure registration, login, and logout with Laravel’s built-in auth system.
- 📝 **Post Management** – Create, edit, and delete posts with a title, body, image, and category.
- 📂 **Categories** – Posts are organized into five predefined categories.
- 🖼️ **Image Uploads** – Images are stored in `public/storage/post_images`.
- 🎨 **Responsive & Cinematic UI** – Dark mode styling with **Tailwind CSS**, subtle shadows, and smooth hover effects.
- 🛢 **Database Driven** – Uses **MySQL** (or another Laravel-supported database) with **Eloquent ORM**.
- 🔒 **Security** – CSRF protection, input sanitization with `strip_tags`, and secure authentication.

---

## 🛠️ Prerequisites

Ensure you have the following installed:

- **PHP** 8.4.4 or higher (Laravel 11 requirement)
- **Composer** (for PHP dependency management)
- **Node.js & npm** (Node v20+ recommended for Tailwind compilation)
- **MySQL** (or another supported database)
- **Git** (to clone the repository)

---

## 📥 Installation Guide

### 1️⃣ Clone the Repository
    git clone https://github.com/yourusername/your-repo-name.git
    cd your-repo-name

### 2️⃣ Install PHP Dependencies
    composer install

### 3️⃣ Install Node.js Dependencies
    composer install

### 4️⃣ Configure Environment Variables
    Edit the .env file and update the database credentials:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_username
    DB_PASSWORD=your_password

### 5️⃣ Run Database Migrations
    php artisan migrate

### 6️⃣ Set Up Storage Link (For Image Uploads)
    php artisan storage:link 

### 7️⃣ Compile Tailwind CSS
    npm run dev

### 8️⃣ Start Laravel Server
    php artisan serve

### 9️⃣ Access the Application
    Open your browser and visit:
    http://localhost:8000


## 🎮 Usage

### 🔹 Register & Login
- Visit `/` to register or log in.  
- Create an account and access the blog dashboard.  

### 🔹 Create a Post
- Use the **"Create a New Post"** form to add a post with a title, body, image (optional), and category.  
- Click **"Create Post"** to publish it.  

### 🔹 View Posts
- Your posts appear under **"My Posts"**.  
- All public posts are visible at `/posts`.  

### 🔹 Edit or Delete Posts
- Under **"My Posts"**, click **"Edit"** to modify or **"Delete"** to remove a post (only for your own posts).  

### 🔹 Logout
- Click **"Logout"** on the homepage to end your session.  

---
 


