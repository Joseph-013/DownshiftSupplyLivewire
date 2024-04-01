<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## NOTE/S TO ALL COLLABORATORS: 
- Gawa po branch bago eddit code. Wag po galawin yung main ng basta basta.
- Etong repository po installed with breeze-livewire
- Email testing API: mailtrap.io

## Links
- Email: downshiftsupply.store@gmail.com

Client Name
- Christian Carlo Cataring Capuno

- Drive: [Google Drive for Codes and shit](https://drive.google.com/drive/folders/17CFFhPzVXMjAkvNUn-krRIs5I3kboyS4?usp=sharing)

Installing composer and building database on project directory:

1. Run git clone <my-cool-project>
2. Run composer install
3. Run cp .env.example .env
4. Run php artisan key:generate
5. Run php artisan migrate
6. Run php artisan serve
7. Go to link localhost:8000
8. Set APP_NAME="Downshift Supply" in .env file

Installing node on project directory:

1. npm install
2. npm run dev

Creating fresh database

- php artisan migrate:fresh --seed

Routing issue: Second time trigger
php artisan route:cache
php artisan config:cache
php artisan cache:clear

Storage issue:
php artisan storage:link


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

