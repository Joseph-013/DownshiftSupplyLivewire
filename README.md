<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Application Screenshots:
![Screenshot](pictures/436105705_958803575324486_7345692234537839276_n.png?raw=true "Screenshot")
![Screenshot](pictures/438209156_26061963900083779_6033493168884128012_n.png?raw=true "Screenshot")
![Screenshot](pictures/436166789_1511689269755557_2679488853201715190_n.png?raw=true "Screenshot")
![Screenshot](pictures/435201422_368424316199187_344075048791832390_n.png?raw=true "Screenshot")
![Screenshot](pictures/432536875_431920789235574_5299332428074130644_n.png?raw=true "Screenshot")
![Screenshot](pictures/433447821_1129941631671549_5771850221105293633_n.png?raw=true "Screenshot")
![Screenshot](pictures/431230330_3410262592606312_6242846646322272749_n.png?raw=true "Screenshot")
![Screenshot](pictures/432345066_3636986606557601_4567710963216037186_n.png?raw=true "Screenshot")
![Screenshot](pictures/432435957_948149630176929_2853718757424210029_n.png?raw=true "Screenshot")
![Screenshot](pictures/437613033_1345072249492006_9134599903923352034_n.png?raw=true "Screenshot")


<!-- <p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## NOTE/S TO ALL COLLABORATORS: 
- Gawa po branch bago eddit code. Wag po galawin yung main ng basta basta.
- Etong repository po installed with breeze-livewire
- Email testing API: mailtrap.io

Installing composer and building database on project directory:

1. Run: git clone <my-cool-project> (optional)
2. Run: composer install
3. Run: cp .env.example .env
4. Run: php artisan key:generate
5. Run: php artisan migrate --seed
6. Run: php artisan serve
7. Go to link http://127.0.0.1:8000
8. Set APP_NAME="Downshift Supply" in .env file  !!!IMPORTANT

Installing node on project directory:

1. npm install
2. npm run dev

Creating fresh database

php artisan migrate:fresh --seed

Routing issue: (Second time trigger)
php artisan route:clear
php artisan route:cache
php artisan config:cache
php artisan cache:clear



Production:
APP_DEBUG=true
npm run build
php artisan route:clear
php artisan route:cache
php artisan config:cache
php artisan cache:clear


Storage/Picture issue:
php artisan storage:link

Timezone Setup
1. open config/app.php
2. line 73, change
    'timezone' => 'Asia/Singapore',
    to
    'timezone' => env('APP_TIMEZONE', 'UTC'),
3. open .env file
4. add code
    APP_TIMEZONE='Asia/Singapore'
    to last line of the first code group: "APP_"
5. run terminal:
    php artisan config:clear
    php artisan config:cache

## Project Custom Events
Component (Listener) alertNotif, 'message'
    $this->dispatch('alertNotif', 'message');

Component confirmation-notification (Listener)
    $this->dispatch('confirmationOverlay', data: [
        'positive' => 'positiveButton',
        'neutral' => 'neutralButton',
        'negative' => 'negativeButton',
        'message' => 'message',
        'title' => 'title',
    ]);
 -->
