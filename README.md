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

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/TURBO-95/online-library-laravel.git
   cd online-library-laravel
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies:**
   ```bash
   npm install
   ```

4. **Setup your environment file:**
   - Copy the example environment file:
     ```bash
     cp .env.example .env
     ```
   - Open the `.env` file and configure your database connection details (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).

5. **Generate an application key:**
   ```bash
   php artisan key:generate
   ```

6. **Create the storage link:**
   This is required for viewing uploaded cover images.
   ```bash
   php artisan storage:link
   ```

7. **Run the database migrations and seeders:**
   This is a critical step. The `--seed` flag will run all the seeders to populate your database with default data.
   ```bash
   php artisan migrate:fresh --seed
   ```

8. **Start the development servers:**
   You need to run both the PHP and Vite servers in separate terminals.
   - In your first terminal:
     ```bash
     php artisan serve
     ```
   - In your second terminal:
     ```bash
     npm run dev
     ```

The application should now be running at `http://127.0.0.1:8000`.

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

```