# Introdution
- Chat real time built from Laravel to store data and real time websocket (Laravel websocket), included integration continious/delivery (CI/CD)
# Setup Chat real time by laravel-websocket
## Step 1. Start Docker
-  Run `docker-compose up -d` command to build container.
## Step 2. Set up
- Run `docker exec -it app_chat bash` to connect docker container called `app chat`
- `composer install`
- `php artisan key:gen`
- `npm install`
- `npm run prod`
- Run `php artisan db:seed --class=DatabaseSeeder` to create fake user
- Done!!!! 
## Step 3. Login
- Login to accounts :
  - hoangvan149dhv/123456
  - hoangvandhv149/123456
![image](https://user-images.githubusercontent.com/64452682/177082603-11eb7faa-dadf-4ed6-88e1-23a09c1ffbf1.png)

## Contact

* Duong Hoang Van | [hoangvan149dhv@gmail.com](hoangvan149dhv@gmail.com)
