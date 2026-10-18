# IIC Group — Company Profile Website

Official company profile website for **Ibraahiim Ibaadurrahmaan Corporation (IIC Group)**. Built with Laravel.

## Features
- **Corporate Profile**: Elegant single-page presentation covering Pillars, Value Chain, Corporate Governance, and Specialized Business Units (IDRP, CariTempat, SMAN, SAA'IR, HUMS).
- **Barcode / QR Code Forms**: Interactive QR codes for partner curation and business expansion assessments with one-click direct links and downloads.
- **Fast & Lightweight**: Clean styling and typography matching corporate brand guidelines with zero compile-time frontend overhead.

## Requirements
- PHP >= 8.2
- Composer
- MySQL

## Installation & Setup

1. **Clone the repository**:
   ```bash
   git clone https://github.com/layangdigitalinnovation/iic-group-website.git
   cd iic-group-website
   ```

2. **Install PHP dependencies**:
   ```bash
   composer install
   ```

3. **Configure environment**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Set your database credentials in `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=iic_group_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Run migrations**:
   ```bash
   php artisan migrate
   ```

5. **Start local development server**:
   ```bash
   php artisan serve
   ```
   Open [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.

## Content Management
- **Text & Data**: `app/Http/Controllers/HomeController.php`
- **Page Layout & Views**: `resources/views/home.blade.php`
- **Styling & Theme**: `public/css/site.css`
- **Scripts**: `public/js/site.js`
- **Brand Assets**: `public/images/logo/` and `public/images/qr/`

## Deployment Notes
- All static assets (CSS, JS, images, QR codes) are pre-packaged in `public/`.
- Ensure the web server document root points to the `public/` directory.

## License
Proprietary — All rights reserved by IIC Group.
