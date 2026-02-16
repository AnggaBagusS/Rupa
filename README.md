# Rupa Mabel - Furniture E-Commerce Platform 🛋️

**Rupa Mabel** adalah aplikasi web e-commerce modern yang dirancang untuk penjualan furnitur rumah tangga (Sofa, Meja, Kursi, dll). Aplikasi ini dibangun menggunakan kerangka kerja PHP **Laravel**, menyediakan antarmuka belanja yang elegan untuk pelanggan dan dashboard manajemen yang kuat untuk administrator.

<img width="495" height="383" alt="Screenshot 2026-02-16 094835" src="https://github.com/user-attachments/assets/4f448431-6cdf-4bc4-8eb6-6407f85c88c1" />


## 🚀 Fitur Utama

### 🛒 Halaman Pengguna (Front-End)
* **Katalog Produk Interaktif:** Penelusuran produk dengan tampilan grid yang rapi.
* **Filter & Kategori:** Memudahkan pencarian berdasarkan kategori (Meja, Kursi, Sofa) dan Brand.
* **Manajemen Keranjang:** Tambahkan produk ke keranjang belanja dengan mudah.
* **Checkout Fleksibel:** Mendukung metode pembayaran **Stripe** (Kartu Kredit) dan **COD** (Cash on Delivery).
* **Desain Responsif:** Tampilan yang optimal di berbagai perangkat.

### 🛠️ Halaman Admin (Back-End)
* **Dashboard Analitik:** Ringkasan statistik real-time (Pesanan Baru, Sedang Diproses, Total Pendapatan).
* **Manajemen Pesanan:** Tabel pesanan lengkap dengan status pembayaran dan status pengiriman.
* **Manajemen Status:** Kemampuan untuk mengubah status pesanan (misal: dari *New* ke *Processing* atau *Delivered*).

## 🛠️ Teknologi yang Digunakan

* **Backend:** [Laravel](https://laravel.com/) (PHP Framework)
* **Frontend:** Blade Templates
* **Asset Bundling:** [Vite](https://vitejs.dev/)
* **Database:** MySQL
* **Payment Gateway:** Stripe API
* **Styling:** CSS / Bootstrap / Tailwind (sesuaikan dengan yang Anda gunakan)

## 📸 Screenshots

| Dashboard Admin | Katalog Produk |
| :---: | :---: |
|<img width="931" height="492" alt="Screenshot 2026-02-16 100122" src="https://github.com/user-attachments/assets/a1d97ee5-ae4f-4835-93d8-e899c47a7a6d" />|<img width="788" height="492" alt="Screenshot 2026-02-16 095418" src="https://github.com/user-attachments/assets/840ef22f-bb8a-473c-8a46-9816601c1574" />|
| *Statistik Penjualan & Order* | *Filter Kategori & List Produk* |

## ⚙️ Cara Instalasi (Local Development)

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di komputer lokal Anda:

### Prasyarat
* PHP >= 8.1
* Composer
* Node.js & NPM
* MySQL

### Langkah-langkah

1.  **Clone Repository**
    ```bash
    git clone https://github.com/AnggaBagusS/Rupa.git
    ```

2.  **Install Dependencies (PHP & Node)**
    ```bash
    composer install
    npm install
    ```

3.  **Setup Environment**
    Salin file `.env.example` menjadi `.env` dan konfigurasi database serta kredensial lainnya (termasuk Stripe API Keys).
    ```bash
    cp .env.example .env
    ```

4.  **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

5.  **Konfigurasi Database**
    Buat database baru di MySQL, lalu sesuaikan konfigurasi di file `.env`:
    ```env
    DB_DATABASE=nama_database_anda
    DB_USERNAME=root
    DB_PASSWORD=
    
    STRIPE_KEY=your_stripe_public_key
    STRIPE_SECRET=your_stripe_secret_key
    ```

6.  **Migrasi & Seeding**
    Jalankan migrasi untuk membuat tabel database (dan seeder jika ada).
    ```bash
    php artisan migrate --seed
    ```

7.  **Jalankan Server**
    Anda perlu menjalankan server Laravel dan Vite secara bersamaan (di dua terminal berbeda).

    *Terminal 1 (Laravel):*
    ```bash
    php artisan serve
    ```

    *Terminal 2 (Vite):*
    ```bash
    npm run dev
    ```

8.  **Akses Aplikasi**
    Buka browser dan kunjungi `http://127.0.0.1:8000`.

## 🧪 Testing

Untuk menjalankan unit test (jika tersedia):
```bash
php artisan test
