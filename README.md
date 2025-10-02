# SMPN1 Situbondo - Layanan Pengaduan (Laravel Starter)

Paket ini adalah *starter* Laravel untuk fitur Layanan Pengaduan Sekolah.
Paket berisi migration, model, controller, route, dan view Blade siap pakai.

**PENTING**:
- Paket ini bukan full Laravel framework. Tempelkan file/folder ini ke project Laravel (>=9/10/11).
- Setelah memindahkan file, jalankan `composer install` pada project Laravel Anda,
  siapkan file `.env`, lalu jalankan migrasi dan seeder yang tersedia.

## Langkah instalasi singkat
1. Copy folder `app/`, `database/`, `routes/`, `resources/` dari paket ini ke root project Laravel Anda.
2. Pastikan `composer.json` Laravel Anda sudah benar, lalu jalankan:
   ```
   composer install
   cp .env.example .env
   php artisan key:generate
   ```
3. Sesuaikan konfigurasi DB pada `.env`.
4. Jalankan migrasi dan seeder:
   ```
   php artisan migrate
   php artisan db:seed --class=AdminSeeder
   ```
5. Buat symbolic link untuk storage (jika menggunakan upload lampiran):
   ```
   php artisan storage:link
   ```
6. Jalankan `php artisan serve` atau deploy ke server production (Nginx + PHP-FPM).

## Endpoint & fitur
- Public:
  - `GET  /` → Form pengaduan publik.
  - `POST /complaints` → Submit pengaduan (name, phone, email, message, attachment).
- Admin:
  - `GET  /admin/login` → Login admin.
  - `POST /admin/login` → Proses login.
  - `GET  /admin` → Dashboard listing pengaduan (login required).
  - `GET  /admin/complaints/{id}` → Detail dan form respons.
  - `POST /admin/complaints/{id}/response` → Kirim respons admin.
  - `POST /admin/complaints/{id}/status` → Ubah status (baru/diproses/selesai).

## Catatan keamanan & production
- Gunakan HTTPS (TLS), konfigurasi Nginx/Apache dengan sertifikat.
- Jangan gunakan password default. Ganti segera.
- Batasi ukuran upload dan validasi tipe file.
- Pertimbangkan menggunakan queue/email untuk notifikasi.

