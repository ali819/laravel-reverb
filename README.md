## Laravel Reverb (Realtime Chat)

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

### Instalasi
1. Clone repository: `git clone https://github.com/ali819/laravel-reverb.git`
2. Masuk ke direktori proyek & Instal dependensi: `composer install`
3. Salin file `.env.example` dan ubah nama menjadi `.env` dengan perintah `cp .env.example .env`
4. Generate key `php artisan key:generate`
5. Jalankan migrasi untuk membuat tabel: `php artisan migrate`
6. Install dependency `npm install`
7. Jalankan reverb socket `php artisan reverb:start`
8. Jalankan aplikasi: `php artisan serve`
