## Laravel Reverb - Realtime Chat 

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

![Preview 1](public/preview/preview-155954.png)
![Preview 2](public/preview/preview-160031.png)

### Instalasi
1. Clone repository: `git clone https://github.com/ali819/laravel-reverb.git`
2. Masuk ke direktori proyek `cd laravel-reverb`
3. Install dependensi: `composer install`
4. Salin file `.env.example` dan ubah nama menjadi `.env` dengan perintah `cp .env.example .env`
5. Generate key `php artisan key:generate`
6. Jalankan migrasi untuk membuat tabel: `php artisan migrate`
7. Install dependency `npm install` & `npm run build`
8. Jalankan reverb socket `php artisan reverb:start`
9. Jalankan aplikasi: `php artisan serve`
