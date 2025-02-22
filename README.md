# Content Management System (CMS) - Laravel

A robust and scalable Content Management System built with **Laravel** for managing digital content efficiently. This CMS allows users to create, edit, and publish content with ease, while providing advanced features like user roles, media management, and API support.

---

## Features

- **User Management**: Role-based access control (Admin, Editor, Author, Viewer).
- **Authentication**: Powered by **Laravel Breeze** for secure login, registration, and password reset.
- **Content Creation**: Rich text editor (WYSIWYG) for creating and editing content.
- **Media Management**: Upload, store, and manage media files (images, videos, documents).
- **Content Organization**: Categorize and tag content for better organization.
- **API Support**: RESTful API for seamless integration with frontend applications.
- **Security**: Secure authentication, input validation, and role-based permissions.
- **Performance**: Caching with **Redis** for faster content delivery.

---

## Technologies Used

- **Backend**: [Laravel](https://laravel.com/) (PHP Framework)
- **Frontend**: [Blade Templates](https://laravel.com/docs/blade) with [Tailwind CSS](https://tailwindcss.com/) (via Laravel Breeze)
- **Database**: [PostgreSQL](https://www.postgresql.org/)
- **Authentication**: [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze)
- **Caching**: [Redis](https://redis.io/)
- **File Storage**: [Laravel Filesystem](https://laravel.com/docs/filesystem) (Supports local, AWS S3, etc.)
- **Search**: [Laravel Scout](https://laravel.com/docs/scout) with [Algolia](https://www.algolia.com/) or [Meilisearch](https://www.meilisearch.com/)

---

## Database Schema

Below is the database schema for the CMS:

![Database Schema](src\CMS Database Schema.png)

---

## Installation

Follow these steps to set up the CMS locally:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/AliAlYaman/Content-Management-System.git
   cd Content-Management-System
   composer install
   cp .env.example .env
   php artisan key:generate
   php artisan migrate --seed
   php artisan serve