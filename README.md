# Timedoor Technical Test

Repositori ini berisi project Laravel untuk keperluan technical test.

## 🛠 Requirements

- PHP >= 8.1
- Composer
- MySQL atau database lain sesuai konfigurasi
- Laravel 10

## 🚀 Langkah Menjalankan Project

### 1. Clone Repository

```bash
git clone https://github.com/Widyasa/timedoor-technical-test.git
cd timedoor-technical-test
```

### 2. Install Dependency PHP

```bash
composer install
```

### 3. Salin File `.env` dan Atur Konfigurasi

```bash
cp .env.example .env
```

Lalu buka file `.env` dan atur konfigurasi database Anda:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Jalankan Migrasi dan Seeder

```bash
php artisan migrate:fresh --seed
```

### 6. Jalankan Server Laravel

```bash
php artisan serve
```

Aplikasi akan berjalan di [http://localhost:8000](http://localhost:8000).
