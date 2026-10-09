<div align="center">

# Beauty Care ERP

**Sistem pengelolaan Beauty Care berbasis Laravel**

Kelola operasional Beauty Care melalui aplikasi web dengan panel administrasi Filament.

<br>

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?logo=php&logoColor=white)
![Filament](https://img.shields.io/badge/Filament-3.3-FDAE4B)

</div>

---

## Tentang proyek

Beauty Care ERP adalah aplikasi berbasis Laravel untuk mendukung pengelolaan layanan Beauty Care. Aplikasi ini menggunakan **Filament** sebagai panel administrasi dan menyediakan fondasi autentikasi pengguna.

### Fitur yang tersedia

- Panel admin Filament di `/admin`.
- Halaman login user Beauty Care di `/login`, dengan email/kata sandi dan Google.
- Halaman login owner/admin terpisah di `/admin/login`, tanpa Google.
- Daftar akun dengan email dan kata sandi.
- Login dan pendaftaran user menggunakan Google OAuth.
- Tiga role pengguna: `user`, `owner`, dan `admin`.
- Akun baru secara default memiliki role `user`.
- Hanya role `owner` dan `admin` yang dapat mengakses panel `/admin`.

> Pengelolaan fitur operasional ERP dapat dikembangkan sesuai kebutuhan bisnis.

## Teknologi

| Komponen | Versi |
| --- | --- |
| PHP | 8.2+ |
| Laravel | 12 |
| Filament | 3.3 |
| Laravel Socialite | 5 |

## Persyaratan

Pastikan perangkat telah memiliki:

- PHP 8.2 atau lebih baru beserta ekstensi yang dibutuhkan Laravel.
- [Composer](https://getcomposer.org/).
- [Node.js dan npm](https://nodejs.org/).
- Database yang dikonfigurasi pada file `.env` (SQLite, MySQL, atau database Laravel lain yang sesuai).

## Instalasi lokal

Jalankan perintah berikut dari folder proyek di PowerShell:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
```

Atur koneksi database pada `.env`, kemudian jalankan migrasi:

```powershell
php artisan migrate
```

Pasang dependensi frontend:

```powershell
npm install
```

Jalankan aplikasi. Gunakan dua terminal terpisah:

```powershell
# Terminal 1
php artisan serve
```

```powershell
# Terminal 2
npm run dev
```

Secara default, aplikasi tersedia di [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Halaman aplikasi

| Halaman | URL lokal | Keterangan |
| --- | --- | --- |
| Halaman utama | `/` | Halaman depan aplikasi |
| Login user | `/login` | Login email/kata sandi atau Google |
| Daftar akun | `/register` | Membuat akun dengan role `user` |
| Login owner/admin | `/admin/login` | Masuk menggunakan email dan kata sandi |
| Panel admin | `/admin` | Hanya tersedia untuk role `owner` dan `admin` |

Pengguna dengan role `user` dapat masuk melalui `/login`, tetapi tidak mendapat akses ke panel admin. Akun owner dan admin masuk melalui `/admin/login`; akun tersebut tidak dapat login melalui Google.

## Template beranda

Beranda menggunakan Blade agar layout dapat digunakan ulang dan komponennya mudah disesuaikan:

- `resources/views/layouts/website.blade.php` menyediakan kerangka halaman.
- `resources/views/partials/navbar.blade.php` dan `footer.blade.php` berisi navigasi dan footer terpisah.
- `resources/views/partials/seo.blade.php` menyediakan title, description, canonical, Open Graph, Twitter Card, dan structured data JSON-LD.
- `resources/views/home/` berisi bagian hero, layanan, keunggulan, promo, perawatan unggulan, testimoni, artikel, FAQ, dan ajakan bertindak.
- `resources/views/welcome.blade.php` menyimpan konten contoh sementara langsung di view; belum memakai controller atau seeder.
- `public/css/beautycare-home.css` menyimpan styling responsif untuk halaman beranda.

Ganti data dan metadata contoh pada view beranda saat konten bisnis sebenarnya sudah tersedia.

## Mengaktifkan Google Login

Google Login untuk user memerlukan OAuth Client bertipe **Web application** di [Google Cloud Console](https://console.cloud.google.com/).

Untuk pengembangan lokal dengan `php artisan serve`, atur alamat berikut pada OAuth Client:

**Authorized JavaScript origins**

```text
http://127.0.0.1:8000
```

**Authorized redirect URIs**

```text
http://127.0.0.1:8000/auth/google/callback
```

Tambahkan konfigurasi berikut ke `.env` dan isi Client ID serta Client Secret dari Google Cloud Console:

```dotenv
GOOGLE_CLIENT_ID=isi-client-id
GOOGLE_CLIENT_SECRET=isi-client-secret
GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/auth/google/callback
```

Setelah mengubah konfigurasi, bersihkan cache:

```powershell
php artisan config:clear
```

Jika aplikasi OAuth masih berstatus **Testing**, tambahkan akun Google yang digunakan untuk mencoba sebagai *test user*. Callback Google harus sama persis dengan nilai `GOOGLE_REDIRECT_URI`.

> **Keamanan:** jangan commit atau membagikan file `.env`. Jika Client Secret pernah terkirim atau terpublikasi, buat secret baru di Google Cloud Console dan perbarui nilainya di `.env`.

## Role dan akses

Semua pendaftaran baru—baik melalui form maupun Google—diberi role `user`. Role `owner` dan `admin` tidak dapat dipilih saat pendaftaran dan harus ditetapkan secara manual oleh pengelola tepercaya. Pastikan akun yang akan mengelola panel memiliki salah satu role tersebut. Akun owner/admin hanya menggunakan login email dan kata sandi di `/admin/login`, bukan Google Login user.

## Pengujian

Jalankan seluruh tes aplikasi dengan:

```powershell
php artisan test
```

## Lisensi

Proyek ini dikembangkan menggunakan Laravel. Lihat [lisensi Laravel](https://opensource.org/licenses/MIT) dan lisensi dependensi terkait untuk informasi lebih lanjut.
