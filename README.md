# System Information Cafe Application

This repository contains the source code for a System Information (SI) Cafe application. The application aims to provide a comprehensive system for managing cafe-related information, including orders, menus.

## Installation Steps:

1. **Clone Repository**

    ```bash
    git clone https://github.com/fauzanlnh/Web-SI-Cafe.git
    cd Web-SI-Cafe / folder-name
    ```

2. **Install Dependencies**

    ```bash
    composer install
    ```

    or

    ```bash
    composer update
    ```

3. **Setup or Create File .env**

    ```bash
    cp .env.example .env
    ```

4. **Generate APP_KEY in file .env**

    ```bash
    php artisan key:generate
    ```

5. **Create Database**

    Set up a database for the application.

6. **Migrate & Seed Database**

    ```bash
    php artisan migrate --seed
    ```

7. **Run Local Server**
    ```bash
    php artisan serve
    ```
    Access the web application at http://localhost:8000.

These instructions provide a step-by-step guide to set up the System Information Cafe application on a local environment. Make sure to follow each step carefully to ensure a successful installation.

## Example View

This screenshot showcases a sample view of the SI Cafe application.

### Customer View

![Example View](./storage/app/public/img/readme/customer-1.PNG)
![Example View](./storage/app/public/img/readme/customer-2.PNG)

### Chef View

![Example View](./storage/app/public/img/readme/chef-1.PNG)

### Cashier View

![Example View](./storage/app/public/img/readme/cashier-1.PNG)
![Example View](./storage/app/public/img/readme/cashier-2.PNG)

## Admin View

![Example View](./storage/app/public/img/readme/admin.PNG)

## Features

-   **Order Management:** Track and manage customer orders efficiently.

## Technologies Used

-   **Laravel:** PHP framework for web application development.
-   **Composer:** Dependency manager for PHP.
-   **MySQL:** Relational database for storing application data.
-   **Tailwind CSS:** Utility-first CSS framework for styling and layout.
-   **AdminLTE:** A powerful open-source admin dashboard template based on Bootstrap.

## Contributors

-   [Fauzan Lukmanul Hakim](https://fauzanlnh.vercel.app) - Backend Developer / Database Design
-   [Muhamad Faishal Azizi](https://github.com/faishalmhmd) - Frontend Developer / UI Designer

## License

This project is licensed under the [MIT License](LICENSE).
