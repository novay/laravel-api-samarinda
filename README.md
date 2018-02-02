# Laravel Samarinda API (Application Programming Inteface)

[![Total Downloads](https://poser.pugx.org/novay/laravel-api-samarinda/d/total.svg)](https://packagist.org/packages/novay/laravel-api-samarinda)
[![Build Status](https://travis-ci.org/novay/laravel-api-samarinda.svg?branch=master)](http://travis-ci.org/novay/laravel-api-samarinda)
[![Latest Stable Version](https://poser.pugx.org/novay/laravel-api-samarinda/v/stable.svg)](https://packagist.org/packages/novay/laravel-api-samarinda)
[![Latest Unstable Version](https://poser.pugx.org/novay/laravel-api-samarinda/v/unstable.svg)](https://packagist.org/packages/novay/laravel-api-samarinda)
[![License](https://poser.pugx.org/novay/laravel-api-samarinda/license.svg)](https://raw.githubusercontent.com/novay/laravel-auth/LICENSE)

Package Laravel untuk memudahkan developer lokal khususnya para programmer di Samarinda dalam pemanfaatan API yang disediakan oleh Pemerintah Kota Samarinda.

- [Tentang](#tentang)
- [Requirements](#requirements)
- [Instalasi](#instalasi)
    - [Laravel 5.5 Ke Atas](#laravel-5.5-ke-atas)
    - [Laravel 5.4 Ke Bawah](#laravel-5.4-ke-bawah)
	- [Konfigurasi](#konfigurasi)
- [Panduan Penggunaan](#panduan-penggunaan)
- [Credit](#credit)
- [License](#license)

### Tentang
Untuk menjawab seluruh kebutuhan para developer lokal akan data, Pemerintah Kota Samarinda membuat sebuah Package Laravel untuk memudahkan developer lokal khususnya para programmer di Samarinda dalam pemanfaatan API yang disediakan oleh Pemerintah Kota Samarinda.

### Requirements
* [Composer](https://getcomposer.org/download)
* [Laravel 5.3, 5.4 or 5.5+](https://laravel.com/docs/installation)

### Instalasi

##### Laravel 5.5 Ke Atas
1. Jalankan perintah berikut melalui terminal (Linux & Mac) atau Command Prompt (Windows):

```bash
    composer require novay/laravel-api-samarinda
```

* Package ini menggunakan fitur `auto discovery`.

##### Laravel 5.4 Ke Bawah (Optional untuk Laravel 5.5)
2. Tambahkan baris berikut pada file `config/app.php` pada masing-masing lokasi `providers` dan `aliases`:

```php
'providers' => [
    Novay\ApiSamarinda\ApiSamarindaServiceProvider::class, 
];

'aliases' => [
    'ApiSamarinda' => Novay\ApiSamarinda\Facade::class, 
];
```

##### Konfigurasi
3. Jalankan perintah berikut:

```
php artisan vendor:publish --provider="Novay\ApiSamarinda\ApiSamarindaServiceProvider"
```

4. Tambahkan beberapa settingan berikut kedalam file `.env` Anda:

```
# Samarinda API Settings, SMR_TOKEN are required.
SMR_API='http://api.samarindakota.go.id/api'
SMR_API_VERSION='v1'
SMR_TOKEN='API_KEY_ANDA'
```

5. Buat akun dan dapatkan `TOKEN` Anda di [http://api.samarindakota.go.id](http://api.samarindakota.go.id). 

### Panduan Penggunaan

Sementara to the point begini dulu ya.

```php
# DEVELOPER RESMI

// Untuk menampilkan seluruh data penduduk di Kota Samarinda. Note: 15 Penduduk per Page
return ApiSamarinda::penduduk();
// Untuk menampilkan data Penduduk berdasarkan NIK (Khusus KTP Samarinda)
return ApiSamarinda::pendudukByNik(6403050611910002);


# DEVELOPER BIASA

// Untuk melakukan pemanggilan menggunakan URL lengkap
return ApiSamarinda::url('GET', 'http://api.samarindakota.go.id/api/v1/sekolah?with=both&jenjang=smk', true);

// Menampilkan seluruh data provinsi di Indonesia
return ApiSamarinda::provinsi();
// Menampilkan data provinsi per paginasi (Tentukan sendiri berapa yang mau ditampilkan per Halaman)
return ApiSamarinda::provinsi(15);
// Menampilkan data provinsi berdasarkan ID (List ID Provinsi segera dibuatkan halaman khusus)
return ApiSamarinda::provinsiById($id_provinsi);
// Melakukan pencarian provinsi berdasarkan kata kunci, dalam hal ini adalah "nama"
return ApiSamarinda::provinsiByNama('kalimantan timur');

// Penjelasan sama dengan provinsi
return ApiSamarinda::kota();
return ApiSamarinda::kota(15);
return ApiSamarinda::kotaById(1103);
return ApiSamarinda::kotaByNama('samarinda');
// Menampilkan seluruh Kota yang ada di Provinsi sesuai dengan ID Provinsi yang ditentukan
return ApiSamarinda::kotaByIdProvinsi(64);

// Penjelasan sama dengan Provinsi dan Kota
return ApiSamarinda::kecamatan();
return ApiSamarinda::kecamatan(15);
return ApiSamarinda::kecamatanById(1101030);
return ApiSamarinda::kecamatanByNama('redeb');
return ApiSamarinda::kecamatanByIdKota(6472);

// Penjelasan sama dengan Provinsi, Kota dan Kecamatan
return ApiSamarinda::kelurahan();
return ApiSamarinda::kelurahan(15);
return ApiSamarinda::kelurahanById(1101010007);
return ApiSamarinda::kelurahanByNama('redeb');
return ApiSamarinda::kelurahanByIdKecamatan(6405060);

// Menampilkan seluruh data sekolah yang ada di Kota Samarinda (Data diambil langsung dari Dapodik)
return ApiSamarinda::sekolah();

// Berhubung nama kecamatan dan kelurahan ditampilkan dalam bentuk Kode, 
// gunakan parameter berikut untuk menampilkan kecamatan dan kelurahan dalam bentuk nama.
// 1. 'kecamatan' untuk menampilkan nama kecamatannya 
// 2. 'kelurahan' untuk menampilkan nama kelurahannya
// 3. 'both' untuk menampilkan keduanya
return ApiSamarinda::sekolah('kecamatan');
return ApiSamarinda::sekolah('kelurahan');
return ApiSamarinda::sekolah('both');

// Menampilkan seluruh data sekolah di Kota Samarinda berdasarkan jenjang pendidikannya
return ApiSamarinda::sekolahByJenjang('sd');
return ApiSamarinda::sekolahByJenjang('smp');
return ApiSamarinda::sekolahByJenjang('sma');
return ApiSamarinda::sekolahByJenjang('smk');

// Menampilkan seluruh data sekolah di Kota Samarinda berdasarkan status sekolah
return ApiSamarinda::sekolahByStatus('swasta');
return ApiSamarinda::sekolahByStatus('negeri');

// Menampilkan seluruh data sekolah di Kota Samarinda yang berlokasi di Kelurahan tertentu 
// Silahkan gunakan ID Kelurahan yang diinginkan
return ApiSamarinda::sekolahByKelurahan(6472030002);

// Menampilkan seluruh data sekolah di Kota Samarinda yang berlokasi di Kecamatan tertentu
// Silahkan gunakan ID Kecamatan yang diinginkan
return ApiSamarinda::sekolahByKecamatan(6472022);



// Contoh untuk melakukan Looping pada data yang ditarik menggunakan salah satu function diatas

// Untuk yang sifatnya List atau Array gunakan ini:
$data = ApiSamarinda::provinsi();
$array = (array)$data->original;
foreach($array['data'] as $temp) {
	return $temp['name'];
}

// Untuk yang sifatnya Individual atau Object gunakan ini:
$data = ApiSamarinda::provinsiById(64);
$array = (array)$data->original;
return $array['data']['name'];

```

### Credit
* [Pemerintah Kota Samarinda](https://samarindakota.go.id).
* [Dinas Komunikasi dan Informatika Kota Samarinda](https://diskominfo.samarindakota.go.id).
* Bidang Aplikasi dan Layanan E-Government (Bidang 4)

## License
API (Application Programming Interface) Samarinda is licensed under the MIT license for both personal and commercial products. Enjoy!
