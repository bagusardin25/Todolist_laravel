# TaskFlow - Todo App

A simple and modern task management application built with Laravel.

## Features

- Create, edit, and delete tasks
- Mark tasks as completed or pending
- Search tasks by keyword
- Filter tasks by status
- Modern glassmorphism UI design

## Requirements

- PHP 8.1+
- Composer
- MySQL or SQLite

## Installation

1. Clone the repository
   ```bash
   git clone <repository-url>
   cd belajar_laravel1
   ```

2. Install dependencies
   ```bash
   composer install
   ```

3. Copy environment file and configure database
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Run migrations
   ```bash
   php artisan migrate
   ```

## Usage

Start the development server:

```bash
php artisan serve
```

Open your browser and visit `http://localhost:8000`

## Tech Stack

- **Backend:** Laravel 10
- **Frontend:** Bootstrap 5, Bootstrap Icons
- **Database:** MySQL / SQLite
