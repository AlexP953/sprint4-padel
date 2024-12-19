# Padel

This project is a padel court reservation management system, designed to be scalable and support multiple companies with several courts. Users can make flexible bookings in 1-hour intervals, view, and manage their reservations. It uses the MVC pattern with Laravel, Blade/Livewire, and MySQL to provide a dynamic and smooth user experience.

##  Dependencies

- PHP 8.2+
- Laravel 11
- Composer 2.8.3
- Livewire 3.5
- Breeze
- FakerPHP
- TailwindCSS 3.1

## Initial Setup

### Configure your credentials in the `.env` file:

  Copy the `.env.example` file to create the `.env` file:

   ```
   cp .env.example .env
   ```


Modify the sections related to the database and email in the `.env` file:

```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=padel
     DB_USERNAME=<YOUR_USERNAME>
     DB_PASSWORD=<YOUR_PASSWORD>

     MAIL_MAILER=smtp
     MAIL_HOST=sandbox.smtp.mailtrap.io
     MAIL_PORT=2525
     MAIL_USERNAME=<YOUR_mailtrap_USERNAME>
     MAIL_PASSWORD=<YOUR_mailtrap_PASSWORD>
     MAIL_ENCRYPTION=tls
     MAIL_FROM_ADDRESS="alexperis95@gmail.com"
     MAIL_FROM_NAME="Reservas Padel"
```

## Installing Dependencies

### Install project dependencies:
   - Install PHP dependencies with Composer:
   ```
   composer install
  ```
  
   - Install Node.js dependencies with npm:
  ```
     npm install
     npm run build
  ```

## Generate the application key and migrate the database

### Generate the application key:
```
   php artisan key:generate
```

### Create the database locally:
   - Make sure to create a database named `padel` in your database manager.

### Run the migrations and seed the data:
```
   php artisan migrate:fresh --seed
```
## Running the Project

### Start the development server:

  In one terminal, run the following command to start the server:

  ```
    php artisan serve
  ```
  
  
In another terminal, run the following command to start the development process with npm:
  ```
    npm run dev
  ```

## Test Credentials

You can now test the application with the following credentials at http://localhost:8000
- Email: alexperis95@gmail.com
- Contraseña: 1234
