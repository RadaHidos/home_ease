# 🏠 HomeEase

HomeEase is a Laravel-based web application designed to help users **discover, create, and manage home service listings** — such as cleaning, repairs, interior design, gardening, and more.

Users can browse published services, assign categories, leave comments, and authenticated authors can manage their own listings.

---

## 📌 Features

- 👤 User authentication (Laravel Breeze)
- 🛠 Create, edit, and delete services
- 📂 Categorize services (Many-to-Many relationship)
- 💬 Comment system for each service
- 🔐 Role-based access logic (Admin / Author / Guest)
- 📡 Publish/unpublish functionality for services
- 📄 SQLite database for local development (preconfigured)

---

## 🧱 Data Relationships

| Model | Relationship | Type |
|-------|-------------|------|
| User → Service | One user can create many services | **1:N** |
| Service → Category | A service may belong to multiple categories | **N:N** |
| Category → Service | A category may contain many services | **N:N** |
| Service → Comment | A service can have multiple comments | **1:N** |
| Comment → Service | Each comment belongs to one service | **N:1** |

---

## 🛠 Tech Stack

- **Laravel 12**
- Blade templates  
- Tailwind CSS  
- Alpine.js  
- SQLite database  
- Laravel Debugbar (development only)

---

##Dev Installation instructions:

Create a directory for the project and cd into it
Clone the project into this directory ```(git clone https://github.com/radahidos/home_ease.git  .)```
```run composer install```
Create a ```.env``` for your dev environment: ```cp .env.example .env``` and adjust the settings (local domain, database, etc) if needed
Set the encryption key in the .env: ```php artisan key:generate```
when using sqlite: do execute ```touch database/database.sqlite``` to create the database
next migrate the tables: ```php artisan migrate```
and then seed date: ```php artisan db:seed```
Seeding includes two default users: ```admin@admin.com``` and ```user@user.com```, both with ```password``` as password.
