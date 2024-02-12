# Initial Setup

## 1. Clone repository
Launch a cmd and clone the project.

`git clone https://github.com/rahadianap/test-griya-net.git`

## 2. Lakukan perintah cd ke dalam folder.

`cd test-griya-net`

## 3. Install composer dependencies.

`composer install`

## 4. Install NPM dependencies.

`npm install`

## 5. Copy .env file
Copy file .env.example dan rename menjadi .env.

`cp .env.example .env`

## 6. Generate app encryption key
Jalankan perintah berikut untuk generate encryption key.

`php artisan key:generate`

## 7. Buat sebuah database baru untuk menyimpan data.

## 8. Konfigurasi .env.
Konfigurasi .env file yang sudah dibuat tadi, masukkan pengaturan database sesuai dengan yang sudah dibuat.

## 10. Database migration.
Jalankan perintah berikut untuk menjalankan migration (create table).

`php artisan migrate`

## 11. Jalankan server
Untuk menjalankan service, cukup ketikkan perintah berikut.

`php artisan serve`

# Fitur
## 1. Admin
### 1.1 Create Paket Penjualan
Paste url berikut untuk mendaftarkan user agar bisa mengakses data yang dibutuhkan. Data yang dibutuhkan adalah `name`, `email`, `password`, dan `password_confirmation`. Isikan data tersebut ke dalam `body`.

`http://localhost:8000/api/register`

Jika berhasil, response yang didapat adalah

```json
{
    "success": true,
    "token": "5|YJ3LGpSoq***************************************"
}
```

### 1.2 Login user
Untuk mengakses data, user harus melakukan login ke dalam service. Ketikkan url berikut

`http://localhost:8000/api/login`

Jika berhasil, response yang didapat sebagai berikut

```json
{
    "success": true,
    "token": "6|SOsxoWF5M***************************************"
}
```

Token yang didapat setelah melakukan login, akan digunakan untuk autentikasi user.

### 1.3 Akses data
Untuk mengetahui apakah aplikasi berhasil dijalankan, coba paste url berikut ke postman. Jangan lupa untuk menambahkan token yang sudah diperoleh melalui proses login. Di tab `Authorization`, pilih `Bearer Token` dan isikan token yang sudah didapat pada kolom `Token`.

![alt text](https://github.com/rahadianap/test-dot-indonesia/blob/sprint1/Screenshot.png?raw=true)

`http://localhost:8000/api/search/provinces?id=1`

Jika berhasil, response yang didapat sebagai berikut

```json
{
    "success": true,
    "message": "Data Retrieved Successfully",
    "data": {
        "province_id": "1",
        "province": "Bali"
    }
}
```
