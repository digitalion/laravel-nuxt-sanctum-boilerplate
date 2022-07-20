# Digitalion - A boilerplate for Laravel Sanctum with Nuxt as a frontend

This is a zero-config API boilerplate with Laravel Sanctum and comes with excellent user and role management API out of the box.

- [Getting Started](#getting-started)
  - [Without Docker (Simple)](#without-docker-simple)
  - [Using Docker & Laravel Sail](#using-docker--laravel-sail)
- [Database Migration and Seeding](#database-migration-and-seeding)
- [Routes Documentation](#routes-documentation)
  - [User Registration](#user-registration)
  - [User Authentication/Login (Admin)](#user-authenticationlogin-admin)
  - [User Authentication/Login (Other Roles)](#user-authenticationlogin-other-roles)
  - [List Users (Admin Ability Required)](#list-users-admin-ability-required)
  - [Update a User (User/Admin Ability Required)](#update-a-user-useradmin-ability-required)
  - [Delete a User (Admin Ability Required)](#delete-a-user-admin-ability-required)
  - [List Roles (Admin Ability Required)](#list-roles-admin-ability-required)
  - [Add a New Role (Admin Ability Required)](#add-a-new-role-admin-ability-required)
  - [Update a Role (Admin Ability Required)](#update-a-role-admin-ability-required)
  - [Delete a Role (Admin Ability Required)](#delete-a-role-admin-ability-required)
  - [List Available Roles of a User (Admin Ability Required)](#list-available-roles-of-a-user-admin-ability-required)
  - [Assign a Role to a User (Admin Ability Required)](#assign-a-role-to-a-user-admin-ability-required)
  - [Delete a Role from a User (Admin Ability Required)](#delete-a-role-from-a-user-admin-ability-required)
- [Notes](#notes)
  - [Default Admin Username and Password](#default-admin-username-and-password)
  - [Add `Accept: application/json` Header In Your API Calls (Important)](#add-accept-applicationjson-header-in-your-api-calls-important)
  - [Code Formatting](#code-formatting)

## Getting Started

First clone the project and change the directory

```shell
git clone https://github.com/digitalion/laravel-nuxt-sanctum-boilerplate.git
cd laravel-nuxt-sanctum-boilerplate
```

Then follow the process using either Docker or without Docker (simple).

### Without Docker (Simple)

1. install the dependencies

```shell
composer install
```

2. Copy `.env.example` to `.env`

```shell
cp .env.example .env
```

3. Generate application key

```shell
php artisan key:generate
```

4. Start the webserver

```shell
php artisan serve
```

That's mostly it! You have a fully running laravel installation with Sanctum, all configured.

### Using Docker & Laravel Sail

1. install the dependencies

```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

2. Copy `.env.example` to `.env`

```shell
cp .env.example .env
```

3. Run the containers

```shell
./vendor/bin/sail up
```

4. Generate application key

```shell
./vendor/bin/sail artisan key:generate
```

To learn more about Sail, visit the [official Doc](https://laravel.com/docs/9.x/sail).

## Database Migration and Seeding

Open your `.env` file and change the DATABASE options. You can start with SQLite by following these steps

1. Create a new SQLite database

```shell
touch database/digitalion.sqlite
```

Or simply create a new file as **digitalion.sqlite** inside your **database** folder.

2. you can run both migrations and seeders together by simply running the following command

```shell
php artisan migrate:fresh --seed
```

**OR**


you can run them separately using the following commands

2. Run Migrations

```shell
php artisan migrate:fresh
```

Now your database has essential tables for user and roles management.

3. Run Database Seeders

Run `db:seed`, and you have your first admin user, some essential roles in the roles table, and the relationship correctly setup.

```shell
php artisan db:seed
```

Please note that the default admin user is **admin@digitalion** and the default password is **digitalion**. You should create a new admin user before deploying to production and delete this default admin user. You can do that using the available user management API or any DB management tool.

## List of Default Routes

Here is a list of default routes. Run the following artisan command to see this list in your terminal.

```shell
php artisan route:list
```

## Default Roles

The project comes with these `admin` & `user` roles out of the box. For details, open the roles table after database seeding, or open the laravel tinker and experiment with the `Role` model.

```shell
php artisan tinker
```

run the following command

```php
>>> Role::select(['id','slug','name'])->get()
//or
>>> Role::all(['id','name','slug'])
//or
>>> Role::all()
```

## Routes Documentation

Before experimenting with the following API endpoints, run your Project project using `php artisan serve` command. For the next part of this documentation, we assumed that project is listening at http://localhost:8000

### User Registration

You can make an `HTTP POST` call to create/register a new user to the following endpoint. Newly created users will have the `user` role by default.

```shell
http://localhost:8000/api/users
```

**API Payload & Response**

You can send a Form Multipart payload or a JSON payload like this.

```json
{
    "name":"User",
    "email":"user@digitalion",
    "password":"digitalion"
}
```

Voila! Your user has been created and is now ready to log in!

If this user already exists, then you will receive a 409 Response like this

```json
{
    "error": 1,
    "message": "user already exists"
}
```

### User Authentication/Login (Admin)

You can log in as an admin by making an HTTP POST call to the following route.

```shell
http://localhost:8000/api/login
```

**API Payload & Response**

You can send a Form Multipart or a JSON payload like this.

```json
{
    "email":"admin@digitalion",
    "password":"digitalion"
}
```

You will get a JSON response with user token. You need this admin token for making any call to other routes protected by admin ability.

```json
{
    "error": 0,
    "token": "1|se9wkPKTxevv9jpVgXN8wS5tYKx53wuRLqvRuqCR"
}
```

For any unsuccessful attempt, you will receive a 401 error response.

```json
{
    "error": 1,
    "message": "invalid credentials"
}
```

### User Authentication/Login (Other Roles)

You can log in as a user by making an HTTP POST call to the following route

```shell
http://localhost:8000/api/login
```

**API Payload & Response**

You can send a Form Multipart or a JSON payload like this

```json
{
    "email":"user@digitalion",
    "password":"digitalion"
}
```

You will get a JSON response with user token. You need this user token for making any calls to other routes protected by user ability.

```json
{
    "error": 0,
    "token": "2|u0ZUNlNtXgdUmtQSACRU1KWBKAmcaX8Bkhd2xVIf"
}
```

For any unsuccessful attempt, you will receive a 401 error response.

```json
{
    "error": 1,
    "message": "invalid credentials"
}
```

### List Users (Admin Ability Required)

To list the users, make an `HTTP GET` call to the following route, with Admin Token obtained from Admin Login. Add this token as a standard `Bearer Token` to your API call.

```shell
http://localhost:8000/api/users
```

**API Payload & Response**

No payload is required for this call.

You will get a JSON response with all users available in your project.

```json
[
    {
        "id": 1,
        "name": "Admin",
        "email": "admin@digitalion"
    },
    {
        "id": 2,
        "name": "User",
        "email": "user@digitalion"
    },
]
```

For any unsuccessful attempt or wrong token, you will receive a 401 error response.

```json
{
    "message": "Unauthenticated."
}
```

### Update a User (User/Admin Ability Required)

Make an `HTTP PUT` request to the following route to update an existing user. Replace {userid} with actual user id. You must include a Bearer token obtained from User/Admin authentication. A bearer admin token can update any user. A bearer user token can only update the authenticated user by this token.

```shell
http://localhost:8000/api/users/{userid}
```

For example, to update the user with id 3, use this endpoint `http://localhost:8000/api/users/3`

**API Payload & Response**

You can include `name` or `email`, or both in a URL Encoded Form Data or JSON payload, just like this

```json
{
    "name":"Cloud",
    "email":"cloud@digitalion"
}
```

You will receive the updated user if the bearer token is valid.

```json
{
    "id": 3,
    "name": "Cloud",
    "email": "cloud@digitalion",
}
```

For any unsuccessful attempt with an invalid token, you will receive a 401 error response.

```json
{
    "error": 1,
    "message": "invalid credentials"
}
```

If a bearer user token attempts to update any other user but itself, a 409 error response will be delivered

```json
{
    "error": 1,
    "message": "Not authorized"
}
```

For any unsuccessful attempt with an invalid `user id`, you will receive a 404 not found error response. For example, when you are trying to delete a non-existing user with id 3, you will receive the following response.

```json
{
    "error": 1,
    "message": "No query results for model [App\\Models\\User] 3"
}
```

### Delete a User (Admin Ability Required)

To delete an existing user, make a `HTTP DELETE` request to the following route. Replace {userid} with actual user id

```shell
http://localhost:8000/api/users/{userid}
```

For example to delete the user with id 2, use this endpoint `http://localhost:8000/api/users/2`

**API Payload & Response**

No payload is required for this call.

If the request is successful and the bearer token is valid, you will receive a JSON response like this

```json
{
   "error": 0,
   "message": "user deleted"
}
```

You will receive a 401 error response for any unsuccessful attempt with an invalid token.

```json
{
    "error": 1,
    "message": "invalid credentials"
}
```

For any unsuccessful attempt with an invalid `user id`, you will receive a 404 not found error response. For example, you will receive the following response when you try to delete a non-existing user with id 3.

```json
{
   "error": 1,
   "message": "No query results for model [App\\Models\\User] 3"
}
```

### List Roles (Admin Ability Required)

To list the roles, make an `HTTP GET` call to the following route, with Admin Token obtained from Admin Login. Add this token as a standard `Bearer Token` to your API call.

```shell
http://localhost:8000/api/roles
```

**API Payload & Response**

No payload is required for this call.

You will get a JSON response with all the roles available in your project.

```json
[
    {
        "id": 1,
        "name": "Administrator",
        "slug": "admin"
    },
    {
        "id": 2,
        "name": "User",
        "slug": "user"
    }
]
```

For any unsuccessful attempt or wrong token, you will receive a 401 error response.

```json
{
    "message": "Unauthenticated."
}
```

### Add a New Role (Admin Ability Required)

To list the roles, make an `HTTP POST` call to the following route, with Admin Token obtained from Admin Login. Add this token as a standard `Bearer Token` to your API call.

```shell
http://localhost:8000/api/roles
```

**API Payload & Response**

You need to supply title of the role as `name`, role `slug` in your payload as Multipart Form or JSON data

```json
{
    "name":"User",
    "slug":"user"
}
```

You will get a JSON response with this newly created role for successful execution.

```json
{
    "name": "User",
    "slug": "user",
    "id": 7
}
```

If this role `slug` already exists, you will get a 409 error message like this

```json
{
    "error": 1,
    "message": "role already exists"
}
```

For any unsuccessful attempt or wrong token, you will receive a 401 error response.

```json
{
    "message": "Unauthenticated."
}
```

### Update a Role (Admin Ability Required)

To update a role, make an `HTTP PUT` or `HTTP PATCH` request to the following route, with Admin Token obtained from Admin Login. Add this token as a standard `Bearer Token` to your API call.

```shell
http://localhost:8000/api/roles/{roleid}
```

For example to update the Customer role, use this endpoint `http://localhost:8000/api/roles/3`

**API Payload & Response**

You need to supply title of the role as `name`, and/or role `slug` in your payload as Multipart Form or JSON data

```json
{
    "name":"Product Customer",
    "slug":"product-customer"
}
```

You will get a JSON response with this updated role for successful execution.

```json
{
    "id": 3,
    "name": "Product Customer",
    "slug": "product-customer"
}
```

Please note that you cannot change a `super-admin` or `admin` role slug because many API routes in project exclusively require this role to function correctly.

For any unsuccessful attempt or wrong token, you will receive a 401 error response.

```json
{
    "message": "Unauthenticated."
}
```

### Delete a Role (Admin Ability Required)

To delete a role, make an `HTTP DELETE` request to the following route, with Admin Token obtained from Admin Login. Add this token as a standard `Bearer Token` to your API call.

```shell
http://localhost:8000/api/roles/{roleid}
```

For example, to delete the Customer role, use this endpoint `http://localhost:8000/api/roles/3`

**API Payload & Response**

No payload is required for this endpoint.

You will get a JSON response with this updated role for successful execution.

```json
{
    "error": 0,
    "message": "role has been deleted"
}
```

Please note that you cannot delete the `admin` role because many API routes in project exclusively require this role to function correctly.

If you try to delete the admin role, you will receive the following 422 error response.

```json
{
    "error": 1,
    "message": "you cannot delete this role"
}
```

For any unsuccessful attempt or wrong token, you will receive a 401 error response.

```json
{
    "message": "Unauthenticated."
}
```

### List Available Roles of a User (Admin Ability Required)

To list all available roles for a user, make an `HTTP GET` request to the following route, with Admin Token obtained from Admin Login. Add this token as a standard `Bearer Token` to your API call. Replace {userid} with an actual user id

```shell
http://localhost:8000/api/users/{userid}/roles
```

For example to get all roles assigned to the user with id 2, use this endpoint `http://localhost:8000/api/users/2/roles`

**API Payload & Response**

No payload is required for this call.

For successful execution, you will get a JSON response containing the user with all its assigned roles.

```json
{
    "id": 2,
    "name": "User",
    "email": "user@digitalion",
    "roles": [
        {
            "id": 2,
            "name": "User",
            "slug": "user"
        },
        {
            "id": 3,
            "name": "Customer",
            "slug": "customer"
        }
    ]
}
```

For any unsuccessful attempt or wrong token, you will receive a 401 error response.

```json
{
    "message": "Unauthenticated."
}
```

### Assign a Role to a User (Admin Ability Required)

To assign a role to a user, make an `HTTP POST` request to the following route, with Admin Token obtained from Admin Login. Add this token as a standard `Bearer Token` to your API call. Replace {userid} with an actual user id

```shell
http://localhost:8000/api/users/{userid}/roles
```

For example to assign a role to the user with id 2, use this endpoint `http://localhost:8000/api/users/2/roles`

**API Payload & Response**

You need to supply `role_id` in your payload as Multipart Form or JSON data

```json
{
    "role_id":3
}
```

For successful execution, you will get a JSON response containing the user with all its assigned roles.

```json
{
    "id": 2,
    "name": "User",
    "email": "user@digitalion",
    "roles": [
        {
            "id": 2,
            "name": "User",
            "slug": "user"
        },
        {
            "id": 3,
            "name": "Customer",
            "slug": "customer"
        }
    ]
}
```

Notice that the user has a `Roles` array, and this newly assigned role is present in this array.

Please note that it will have no effect if you assign the same `role` again to a user.

For any unsuccessful attempt or wrong token, you will receive a 401 error response.

```json
{
    "message": "Unauthenticated."
}
```

### Delete a Role from a User (Admin Ability Required)

To delete a role from a user, make an `HTTP DELETE` request to the following route, with Admin Token obtained from Admin Login. Add this token as a standard `Bearer Token` to your API call. Replace `{userid}` with an actual user id, and `{role}` with an actual role id

```shell
http://localhost:8000/api/users/{userid}/roles/{role}
```

For example, to delete a role with id 3 from the user with id 2, use this endpoint `http://localhost:8000/api/users/2/roles/3`

**API Payload & Response**

No payload is required for this call

For successful execution, you will get a JSON response containing the user with all asigned roles to it.

```json
{
    "id": 2,
    "name": "User",
    "email": "user@digitalion",
    "roles": [
        {
            "id": 2,
            "name": "User",
            "slug": "user"
        },
    ]
}
```

Notice that the user has a `Roles` array, and the role with id 3 is not present in this array.

For any unsuccessful attempt or wrong token, you will receive a 401 error response.

```json
{
    "message": "Unauthenticated."
}
```

## Notes

### Default Admin Username and Password

When you run the database seeders, a default admin user is created with the username '**admin@digitalion**' and the password '**digitalion**'. You can login as this default admin user and use the bearer token on next API calls where admin ability is required.

When you push your application to production, please remember to change this user's password, email or simply create a new admin user and delete the default one.

### Add `Accept: application/json` Header In Your API Calls (Important)

This is very important. To properly receive JSON responses, add the following header to your API requests.

```shell
Accept: application/json
```

For example, if you are using `curl` you can make a call like this.

```shell
curl --request GET \
  --url http://localhost:8000/api/ \
  --header 'Accept: application/json' \
  --header 'Content-Type: application/x-www-form-urlencoded' \
  --data =
```

### Code Formatting

Project comes with an excellent code formatter called [Laravel Pint](https://github.com/laravel/pint) out of the box, with an excellent configuration preset that you can find in `pint.json`. By default `pint` uses the [Allman style](https://en.wikipedia.org/wiki/Indentation_style#Allman_style) for the braces where the braces are placed in a new line after the function name. So we have changed it to [K&R style](https://en.wikipedia.org/wiki/Indentation_style#K&R_style) formatting where the brace stays on the same line of the function name.

To format your code using `laravel pint`, you can run the following command any time from inside your project diretory.

```shell
./vendor/bin/pint
```

And that's all for formatting. To know more, check out laravel pint documentation at [https://github.com/laravel/pint](https://github.com/laravel/pint)
