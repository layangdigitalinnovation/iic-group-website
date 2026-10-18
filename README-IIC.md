# IIC Group — Company Profile Website (Laravel)

Single-page company profile based on the IIC Group booklets.

## Menjalankan
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```
Buka http://127.0.0.1:8000

## Mengubah konten
- Semua teks: `app/Http/Controllers/HomeController.php`
- Struktur halaman: `resources/views/home.blade.php`
- Warna & gaya: `public/css/site.css` (variabel warna di `:root`)

Tidak perlu `npm`; CSS/JS ada di folder `public/`.
