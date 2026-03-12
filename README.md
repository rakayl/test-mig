##  Tech Stack

- PHP 8.2+
- Composer
- Laravel 11
- MySQL / MariaDB
- Blade Template

# Cara Menjalankan Project (Step by Step)

Ikuti langkah berikut untuk menjalankan project di komputer lokal Anda.

# 1. Clone Repository

Clone repository dari GitHub: git clone https://github.com/rakayl/test-mig.git


# 2. Install Dependency dengan Composer

Project ini menggunakan dependency manager **Composer**.
Jalankan perintah berikut: 

```command
composer install
```



# 3. Copy File Environment

Laravel membutuhkan file konfigurasi `.env`.
Copy file `.env.example` menjadi `.env`
setting .env untuk database

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=keyboard_transform
DB_USERNAME=root
DB_PASSWORD=
```


# 4. Generate Application Key

Laravel membutuhkan **application key** untuk keamanan aplikasi.
Jalankan perintah berikut: 
```command
php artisan key:generate
```

# 5. Run Migration
```command
php artisan migrate
```

# 6. Jalankan Server Laravel

Untuk menjalankan aplikasi, gunakan perintah: 
```command
php artisan serve
```


