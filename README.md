# Online Library Management System

This is a complete Online Library Management System built with the Laravel framework. The application provides a robust backend and a complete user interface for both students and administrators, allowing for efficient management of library resources and borrowings.

This project was built following modern Laravel best practices, including the use of Policies for authorization, Form Requests for validation, and the Repository Pattern (via Eloquent Models) for data management.

---

## Features

The application is divided into two primary user modules: **Student** and **Admin**.

### Admin Module Features
- **Dashboard:** At-a-glance view of key statistics (Total Books, Registered Students, Books Currently on Loan).
- **Book Management:** Full CRUD (Create, Read, Update, Delete) functionality for library books, including cover image uploads.
- **Student Management:** Admins can search for students by their ID, Name, or Email.
- **Detailed Student View:** Admins can view a student's profile and their complete borrowing history.
- **Secure:** All administrative actions are protected by an authorization policy, ensuring only users with the 'admin' role can access them.

### Student Module Features
- **Registration & Login:** Secure user authentication provided by Laravel Breeze.
- **Book Catalog:** Students can browse a paginated list of all library books.
- **Book Details:** View detailed information for any book, including description, author, and availability.
- **Borrowing System:** Students can borrow an available book. The system automatically tracks the book's quantity.
- **Personal Dashboard:** Students can view their currently borrowed books, see the due date, and return books to the library.
- **Borrowing History:** The dashboard also shows a complete history of all previously returned books.
- **Profile Management:** All users can update their own name, email, and password.

---

## Getting Started

Follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- PHP >= 8.2
- Composer
- Node.js & NPM
- A database server (e.g., MySQL)

## Installation Guide

Follow these steps carefully to set up the project on your local machine.

#### 1. Clone the repository
Open your terminal and run the following command to download the project:
```bash
git clone https://github.com/TURBO-95/online-library-laravel.git
cd online-library-laravel
```

#### 2. Install Dependencies
Install both the PHP and JavaScript packages required for the application.
```bash
composer install
npm install
```

#### 3. Setup Your Environment File
This is a critical step for your database connection.

-   Copy the example environment file:
    ```bash
    cp .env.example .env
    ```

#### 4. Configure Your Database
You must create a database for the application to use.

-   Open your database management tool (like phpMyAdmin from XAMPP).
-   Create a new, empty database. The recommended name is `online_library_laravel`.
-   Now, open the `.env` file in your code editor and update the database connection details. It should look like this:
    ```ini
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=online_library_laravel  # The name of the database you just created
    DB_USERNAME=root                  # Your database username (usually 'root')
    DB_PASSWORD=                      # Your database password (usually blank)
    ```

#### 5. Generate Application Key
This creates a unique key to secure your application's data.
```bash
php artisan key:generate```

#### 6. Run Database Migrations and Seeding
This command will create all the necessary tables in your database (`migrate:fresh`) and then add the default admin user and sample books (`--seed`).
```bash
php artisan migrate --seed
```
-   **Admin Login:**
    -   **Email:** `admin@example.com`
    -   **Password:** `password`

#### 7. Link the Storage Directory
This makes uploaded book cover images publicly accessible.
```bash
php artisan storage:link
```

## Running the Application

You need to run two servers in two separate terminals from your project root directory.

-   **In your first terminal (for the PHP server):**
    ```bash
    php artisan serve
    ```
-   **In your second terminal (for the Vite frontend server):**
    ```bash
    npm run dev
    ```

The application should now be running at **[http://127.0.0.1:8000](http://127.0.0.1:8000)**.

## Troubleshooting

If you encounter a `500 Server Error` or an error message like `Please provide a valid cache path`, it is likely due to a stale configuration cache. Run these commands to fix it:

```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan config:cache
```
After clearing the cache, try running `php artisan serve` again.
---

## Database Seeding & Factories

This project includes seeders and factories to quickly populate the database with sample data for testing.

- **Admin User Seeder (`AdminUserSeeder.php`):**
  - Creates a default administrator account.
  - **Email:** `admin@admin.com`
  - **Password:** `password`

- **Book Seeder (`BookSeeder.php`):**
  - Creates 25 sample books with realistic titles.
  - This seeder utilizes the `BookFactory.php`.

- **Book Factory (`BookFactory.php`):**
  - Defines how to generate fake data for a book.
  - It automatically generates a realistic author name, a unique ISBN, a random genre, a quantity, and a description for each book seeded.

Running `php artisan migrate:fresh --seed` will execute all of these and set up a ready-to-use development environment.
