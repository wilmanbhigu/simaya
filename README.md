# siMAYA Open-Source

siMAYA (*Sistem Informasi Persuratan Maya*) adalah aplikasi Open-Source yang dikembangkan oleh **조레지마 Software** berbasis dengan Laravel.
*siMAYA (*Sistem Informasi Persuratan Maya*) is an Open-Source developed by **조레지마 Software** created with Laravel.*

Aplikasi ini dikembangkan dengan basis API, untuk menggunakan aplikasi ini anda diperlukan untuk mempunyai/mengembangkan  *frontend* anda sendiri.
*This application is developed with API Specification, to use this application you'll need your own frontend application.*

Dokumentasi API dapat ditemukan saat aplikasi sudah masuk pada tahap ***release***.
*API Documentation can be found when this project entered **release** stage*

## Prasyarat // *Prerequisites*
* PHP Versi 7.1 atau diatasnya // *PHP 7.1 or above*
* MySQL / MariaDB
* Composer

## Instalasi // *Installation*
Untuk menginstall aplikasi ini, anda harus memenuhi prasyarat diatas, dan menjalankan *command* dibawah ini:
*To install this application, you'll need to complete prerequisites above, and then run the following command*:
1. `composer install`
2. `cp .env.example .env` 
	Lalu mengubah file `.env` untuk memenuhi kebutuhan anda (password database dsb.)
	*Then change `.env` file to match your current settings*
3. `php artisan key:generate`
4. `php artisan migrate --seed`
	Untuk melakukan migrasi database dan mengisi data default
	*To migrate database and fill default data*
5. Run the application!
	For DEV mode use `php artisan serve`

**&copy; Joreujima Software** Raga Subekti