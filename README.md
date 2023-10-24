# SQL Server PHP Project

This repository contains a PHP project that connects to a SQL Server database, inserts data, and displays it. The MySQL code has been removed, and the project now exclusively focuses on SQL Server.

## Requirements

Before running the project, make sure you have the following components installed:

- **XAMPP**: A local web server package that includes PHP and MySQL.

- **SQL Server**: A SQL Server database where data will be stored.

- **PHP with SQL Server Drivers**: Ensure that your PHP installation includes the necessary drivers to connect to SQL Server. You may need to download and enable the `sqlsrv` extension.

## Getting Started

1. Clone this repository to your local machine.

2. Configure your SQL Server connection details in the `connect_sqlsrv.php` file. Make sure to set the correct server name, username, and password.

3. Create a database in your SQL Server instance, and configure the database name in `connect_sqlsrv.php`.

4. Import the SQL schema provided in `database_schema.sql` into your SQL Server database. This will create the necessary table for data storage.

5. Run the project by accessing the appropriate PHP files in your web browser.

## Usage

- **Insert Data**: Use the `insert_sqlsrv.php` script to insert data into the SQL Server database. The script allows you to insert names, including Arabic names, into the database.

- **List Data**: The `list_sqlsrv.php` script retrieves and displays the data from the SQL Server database in a tabular format.

## Folder Structure

- `connect_sqlsrv.php`: Database connection script for SQL Server.

- `insert_sqlsrv.php`: Script for inserting data into the SQL Server database.

- `list_sqlsrv.php`: Script for listing and displaying data from the SQL Server database.

- `database_schema.sql`: SQL schema for creating the database and table.

- `README.md`: You are here.

## Feedback

Your feedback and contributions to this project are highly appreciated. If you encounter any issues or have suggestions for improvement, please open an issue or submit a pull request.


