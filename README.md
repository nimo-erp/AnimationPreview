# SAMP Animation Previewer (unfinished)

Website untuk melihat preview seluruh animasi dari San Andreas Multiplayer (SAMP) menggunakan PHP.

## Fitur

- Melihat daftar semua library animasi SAMP
- Melihat daftar animasi per library
- Preview animasi dalam bentuk video
- Pencarian animasi berdasarkan nama, library, atau ID
- Kode PAWN yang siap pakai untuk setiap animasi

## Instalasi

1. Clone repository ini ke direktori web server Anda
2. Import file `database_structure.sql` ke MySQL/MariaDB
3. Sesuaikan konfigurasi database di `Config/Config.php`
4. Pastikan folder `assets/images/previews` dan `assets/videos` memiliki hak akses write
5. Akses website melalui browser

## Struktur Database

Tabel `animations` memiliki struktur sebagai berikut:
- `id` (int, auto increment, primary key)
- `library` (varchar, nama library animasi)
- `name` (varchar, nama animasi)
- `anim_id` (int, ID animasi)
- `created_at` (timestamp)

## Struktur Kode

Project menggunakan pendekatan modular dengan struktur PHP yang menggunakan PascalCase untuk penamaan method dan variabel:

- **Config**: Berisi konfigurasi
- **Core**: Berisi kelas-kelas inti seperti Database dan Router
- **Models**: Berisi model data untuk mengakses database
- **Views**: Berisi template dan komponen tampilan
- **Controllers**: Berisi logika untuk menangani request

## Requirements

- PHP 7.0+
- MySQL/MariaDB
- Web server (Apache/Nginx)

## Catatan Penggunaan

Untuk menambahkan preview animasi:
1. Upload file gambar thumbnail ke folder `assets/images/previews/` dengan format nama `[LIBRARY]_[ANIMATION_NAME].jpg` (contoh: `DANCING_dance_loop.jpg`)
2. Upload file video ke folder `assets/videos/` dengan format nama `[LIBRARY]_[ANIMATION_NAME].mp4` (contoh: `DANCING_dance_loop.mp4`)

## Kontribusi

Anda dapat berkontribusi dengan menambahkan fitur baru atau memperbaiki bug yang ditemukan. Silakan fork repository ini dan buat pull request.

## Kode Struktur

SAMP_Animation_Previewer/
│
├── Config/
│   └── Config.php
│
├── Core/
│   ├── Database.php
│   └── Router.php
│
├── Models/
│   └── AnimationLibrary.php
│
├── Views/
│   └── Template.php
│
├── Controllers/
│   ├── HomeController.php
│   ├── LibraryController.php
│   ├── AnimationController.php
│   ├── SearchController.php
│   └── ErrorController.php
│
├── assets/
│   ├── css/
│   │   └── style.css
│   │
│   ├── js/
│   │   └── script.js
│   │
│   ├── images/
│   │   ├── previews/
│   │   │   └── [LIBRARY_NAME]_[ANIMATION_NAME].jpg
│   │   └── no-preview.jpg
│   │
│   └── videos/
│       └── [LIBRARY_NAME]_[ANIMATION_NAME].mp4
│
├── .htaccess
└── index.php