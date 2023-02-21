## CommentSold! Code Test

### Setup
I used Laravel 10 and PHP 8.1 with PostgreSQL on a Vagrant (VirtualBox) VM (PHP 8.1, PostgreSQL and Vagrant is my current workstation setup), but I will show settings for MySQL where possible.

1. Create a database and a user with privileges for that database to create and drop tables and to read and write data.
   I named everything "ecom", so you may need to modify these entries in .env as needed:

   >DB_CONNECTION=mysql<br>
   >DB_HOST=localhost<br>
   >DB_PORT=3306<br>
   >DB_DATABASE=ecom<br>
   >DB_USERNAME=ecom<br>
   >DB_PASSWORD=ecom<br>

2. Also, set the full path to the path where the .env file is:

   >BASE_DIRECTORY="/vagrant/ecom"

3. In the console, install the composer packages:
   >composer install

4. Run the migrations to create the schema:
   >php artisan migrate

5. Run the database seeder to import the csv files:
   >php artisan db:seed

### Added Components

- jQuery DataTables<br>
  https://datatables.net/

  
- Laravel Datatables<br>
  https://github.com/yajra/datatables
  >composer require yajra/laravel-datatables:^10
