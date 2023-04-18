# **Laravel Task Management**

## **Introduction**
The purpose of this project is to provide API endpoints that can be used to:
1. Manage Users
2. Manage User Tasks

This project uses the following versions versions:

- PHP version 8.1
- MySQL Server

---

## **Installation Instructions**

The first step is to clone the repository

```bash 
# Clone the repository
git clone git@github.com:stivo-m/laravel_task_management.git

# Change directory into the repository
cd laravel_task_management
```

### **For those using Laravel with Docker**
If you are using docker, you can utilize the power of Laravel Sail and Docker to spin up images that will automatically connect to the Laravel instance. 

```bash
# The first step is to create an environment variable file. 
# Copy .env.example to .env. and change where it has 127.0.0.1 to localhost. In the DB_HOST change the value to mysql
cp .env.example .env

# The second thing you need to do is to run this command
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs

# This will create a folder named "./vendor/bin/sail"
# You can run the sail command as follows
./vendor/bin/sail up

# To access the running container with a bash terminal, you can run
./vendor/bin/sail bash

```

### **For those using laravel without Docker**
If you are not using Docker, you need to setup your environment variables with credentials for your database. 

```bash
# The first step is to create an environment variable file. 
cp .env.example .env
```
Once you have setup your environment variables, you can start up the laravel server using the following

```bash
# Run the Laravel application
php artisan serve
```


---

## **License**

MIT License

Copyright (c) [2023] [Steven Maina]

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
