# Votes

##Installation

Navigate to the root directory and run `composer install` in your terminal.

Easiest way to get the project running is to run using PHP's internal server. Run the command below:
`php artisan serve`

The project is a laravel 5.8 based project. Follow Laravel's guide for setting up for dev web environment:

[Laravel Installation Guide](https://laravel.com/docs/5.8/installation)



Due to ease of use and portability, I used Sqlite database for this project, to change the database to MySQL, navigate to the `.env` file in the root of the project and change the `DB_CONNECTION` property's value to `mysql`, and the remaining configurations as such based on your environment.

After setting up your development environment, run:
`php artisan migrate --seed` in your terminal to run both the database migrations and the seed

To refresh the database and run the seeder to to an issue that may occur, run:
`php artisan migrate:fresh --seed` in your terminal to run both the database migrations and the seed

Nagivate to the web root of the project

## Testing

To run tests, navigate to the root directory in the terminal and run:
`./vendor/bin/phpunit`