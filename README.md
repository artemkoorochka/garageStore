<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# garageStore

## Use for develop
- php 8.1
- mysql 8.0.28
- Composer version 2.2.9
- git clone ... to your-directory
```
git clone https://github.com/artemkoorochka/garageStore.git garageStore
```
- cd your-directory
- composer install
- In .env set mysql connection data
- Set APP_KEY and APP_DEBUG to false
- Migrate data base
```
php artisan migrate --seed
```
- Run Serve project
```
php artisan serve
```
