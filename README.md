## Requirements
- PHP >= 8.2
- Composer
- Laravel Framework 11

# Cara Menjalankan Project (Step by Step)

Ikuti langkah berikut untuk menjalankan project di komputer lokal Anda.

# 1. Clone Repository

Clone repository dari GitHub: git clone https://github.com/rakayl/test-mig.git


# 2. Install Dependency dengan Composer

Project ini menggunakan dependency manager **Composer**.
Jalankan perintah berikut: composer install



# 3. Copy File Environment

Laravel membutuhkan file konfigurasi `.env`.
Copy file `.env.example` menjadi `.env`:



# 4. Generate Application Key

Laravel membutuhkan **application key** untuk keamanan aplikasi.
Jalankan perintah berikut: php artisan key:generate

# 5. Jalankan Server Laravel

Untuk menjalankan aplikasi, gunakan perintah: php artisan serve



