# Test Task - User Registration & Authentication

## Technologies
- PHP 8.x
- MySQL
- HTML, CSS, Bootstrap
- MVC pattern (Controllers, Models, Views)
- PDO for database interaction

## Project Structure
- `controllers/` - controllers containing business logic
- `models/` - classes for database operations
- `views/` - HTML templates
- `init.php` - session initialization and database connection
- `config.php` - database configuration

## Features & Improvements
- Uses PDO and prepared statements for secure database operations
- Passwords are stored hashed using `password_hash`
- Server-side data validation
- Class autoloading using `spl_autoload_register` or Composer
- Possible use of `enum` for fixed values
- Optionally, a Makefile can be added for quick project setup and workflow