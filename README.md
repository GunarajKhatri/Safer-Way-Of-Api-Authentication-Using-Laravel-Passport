## Safer Way Of Api Authentication Using Laravel Passport

[Read blog about it](https://gunaraj.hashnode.dev/safer-way-of-api-authentication-using-laravel-passport)

## Cloning Project 
###### open terminal and type:
```
git clone https://github.com/GunarajKhatri/Safer-Way-Of-Api-Authentication-Using-Laravel-Passport.git

```
###### install composer moving into cloned project directory
```
composer install
```
###### Rename .env.example file as .env and insert proper DB credentials and generate key
```
php artisan key:generate
```
###### Migrate Admin/User table along with tables of passport with 
```
php artisan:migrate
```
###### Generate Client Credentials For Authentication with
```
php artisan passport:client --password
```
<p>and be sure you generate password by selecting Admin Provider after hitting above cmd as this project has used Admin provider rather than defualt one(user).You can check app/config.php to get more about it. </p>

## All things are done !! Now you are good to go for authenticating and suggest you to check apiController.php,api.php,web.php and views for better understanding how things are being done...

