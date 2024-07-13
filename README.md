# Laravel-Template

A simple Laravel template.

<p align="center">
  <img src="https://media.giphy.com/media/aiOt9fWJtTqubDVqZy/giphy.gif" alt="Laravel Tailwind">
</p>

## Features

- Login: Login page.
- Authentication: Full authentication functionality.
- Logout: Logout functionality.
- Sidebar: Sidebar for navigation.
- Navbar: Top navigation bar.
- Dashboard: Control panel.
- CRUD Users: Create, Read, Update, and Delete user functionality.

## Prerequisites
Before you begin, make sure you have the following installed:

- PHP >= 7.3
- Composer
- MySQL
- Node.js and npm

## Installation

Follow these steps to install and set up the project:

1. **Clone the repository**

    ```bash
    git clone https://github.com/pzric/Laravel-Template.git
    cd Laravel-Template
    ```

2. **Install PHP dependencies with Composer**

    ```bash
    composer install
    ```

3. **Install JavaScript dependencies with npm**

    ```bash
    npm install
    ```

4. **Set up the `.env` file**

    Copy the `.env.example` file to `.env` and adjust the database and other environment settings as needed.

    ```bash
    cp .env.example .env
    ```

5. **Generate the application key**

    ```bash
    php artisan key:generate
    ```

6. **Set up the database**

    Make sure you have a MySQL database created and configured in the `.env` file.

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

7. **Run migrations and seeders**

    ```bash
    php artisan migrate --seed
    ```

8. **Compile frontend assets**

    ```bash
    npm run dev
    ```

9. **Start the development server**

    ```bash
    php artisan serve
    ```

10. **Access the application**

    Open your web browser and go to `http://localhost:8000` to see the application in action.

## Usage
The project includes the following functionalities:

- Login/Logout: Access and exit the application.
- Sidebar: Sidebar navigation to access different sections.
- Navbar: Top navigation bar.
- Dashboard: Main view of the control panel.
- CRUD Users: Manage users with create, read, update, and delete operations.


## Resources

- [Tailwind CSS](https://tailwindcss.com)
- [Alpine.js](https://alpinejs.dev)
- [Livewire](https://laravel-livewire.com)
- [Laravel Collective](https://laravelcollective.com/docs)


## License
This project is licensed under the MIT License. For more details, see the LICENSE file.

All images sourced from [Unsplash](https://unsplash.com/es).

## Author ✒️

* **Ricardo Zamora Picazo** - [Ricardo ZP](https://github.com/pzric)
