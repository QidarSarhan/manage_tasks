# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Clone the repository

    git clone git@github.com:QidarSarhan/manage_tasks.git

Switch to the repo folder

    cd manage_tasks

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

Generate a new application key

    php artisan key:generate
    

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate


## Database seeding

Run the database seeder and you're done

    php artisan db:seed

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

# Test the application

The web app can now be accessed at

    http://localhost:8000/


User and Admin Login

    http://localhost:8000/login

            type => admin
            email => sudo@admin.com
            password => 012345678            

            type => user
            email => user1@user.com
            password => 12345678
            

Tasks management 

    http://localhost:8000/tasks


Create management 

    http://localhost:8000/tasks/create
