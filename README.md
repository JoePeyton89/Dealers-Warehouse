# Customer Management System For Dealer's Warehouse

This project is a simple customer management system using HTML, PHP, and MySQL.

## Setup Instructions

1. Clone the repository:

    ```bash
    git clone https://github.com/JoePeyton89/Dealers-Warehouse.git
    ```

2. Create a MySQL database and import the `customers.sql` file:

    ```bash
    mysql -u username -p your_database_name < customers.sql
    ```

3. Update the database connection details in `config.php`:

    ```php
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database_name";
    ```

4. Open the project in a web server (e.g., Apache, Nginx) or use PHP's built-in server:

    ```bash
    php -S localhost:8000
    ```

5. Visit `http://localhost:8000` in your web browser.

## Features

- Submit a new customer and save the input to the MySQL database.
- Display a list of customers ordered by the most recently added.
- View account details of a given customer account.
- Modify or delete a given customer account.