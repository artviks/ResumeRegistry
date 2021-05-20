## Description

A simple CRUD app for resumes. Can add multiple education and work experience fields to a resume.

Made using the `Laravel 8` and `Vue.js 2`.

## Project setup

- Create a local database named `project`
- Rename the `.env.example` in `project_directory/server` file to `.env` and fill in the database information
- Run the following commands in `project_directory/server`:
    - `composer install`
    - `php artisan key:generate`
    - `php artisan migrate`
    - `php artisan db:seed`
    - `php artisan serve`
- Then navigate to `project_directory/client` and run:
    - `npm install`
    - `npm run serve`
- App will be running at: `http://localhost:8080/`

Testing server:
- Create a local database named `test`
- Copy `.env` and name the copy `.env.testing`, fill in the testing database information
- Navigate back to `project_directory/server`
- Run migrations for test database `php artisan migrate:fresh --env=testing`
- Then test the ap by running this command `php artisan test`