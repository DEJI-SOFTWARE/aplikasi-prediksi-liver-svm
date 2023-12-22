# **Aplikasi Prediksi Penyakit Liver Menggunakan Algoritma SVM**
**Author by:** *Natsuki-Yasumi & yunatamaaldho*

Selamat datang di dokumentasi Aplikasi Prediksi Penyakt Liver Menggunakan Algoritma SVM.
seperti namanya aplikasi ini bertujuan untuk memprediksi apakah orang itu mengidap penyakit liver atau tidak, berdasarkan data latih yang di inputkan.
aplikasi ini menggunakan bantuan library libsvm dari PHP. :grinning:

### Table of Content
* :rainbow: [Required](#required)
* :rainbow: [Instalasi](#instalasi)
* :rainbow: [Hasil Tampilan](#hasil_tampilan) 


<a name="required"></a>
## **Required**
Sebelum melakukan instalasi, kalian harus menginstal beberapa software dan library, adapun list nya sebagai berikut :
+ Composer
+ NodeJs
+ Libsvm
+ Mysql

> [!Note]
> Untuk melihat dokumentasi tentang Libsvm di php bisa kunjungi [link ini](https://www.php.net/manual/en/book.svm.php), dan untuk instalasi libsvm bisa kunjungi [di sini](https://www.php.net/manual/en/svm.installation.php) :wink:
 



<a name="instalasi"></a>
## **Instalasi**
Bukalah direktori yang akan dijadikan tempat menyimpan prooject/aplikasi nya, lalu setelah itu melakukan instalasi project laravel menggunakan composer, ketikan perintah `composer create-project laravel/laravel aplikasi-svm`

```
composer create-project laravel/laravel aplikasi-svm
```
> [!Note]
> Disini saya menamai aplikasinya dengan **aplikasi-svm**, kalian bisa mengganti namanya sesuai dengan keinginan :wink:
## Install package/library

Untuk memastikan package/library terinstall di proyek ketikan perintah `composer install` dan `npm install`
```
composer intsall
npm install
```
## Membuat Database
Pada aplikasi ini saya menggunakan database **MYSQL** artinya, kalian harus membuat sebuah database dari mysql, disini saya membuatnya dengan nama **aplikasi_svm** (kalian bisa menamainya dengan apapun).
setelah database dibuat, pastikan mysql server dalam keadaan nyala.

## Migrate database
setelah membuat database, lalu lakukan lah migrate database dengan perintah `php artisan migrate:fresh` dengan menggunakan terminal
``` 
php artisan migrate:fresh

````
## Atur File .ENV
ketika pertamakali melakukan clone maka tidak ada file `.env` sehingga kalian harus mengubah nama `env.example` menjadi `.env`.
setelah itu ubahlah settingan konfigurasi mengikuti configurasi kalian

## Menjalankan Aplikasi
Setelah langkah-langkah di atas sudah dilakukan, maka saatnya menjalankan aplikasi dengan cara mengetikan `php artisan serve` di terminal
```
php artisan serve
```
>[!Note]
>ketika menuliskan perintah `php artisan serve` di terminal, pastikan kalian sudah berada dalam direktori aplikasinya :wink:

<a name="hasil_tampilan"></a>
## Hasil Tampilan Aplikasi :framed_picture:
1. Halaman Login
   ![alt text](https://github.com/DEJI-SOFTWARE/aplikasi-prediksi-liver-svm/blob/develop/Example/image/ha-login.png?raw=true)

2. Halaman Register
   ![alt text](https://github.com/DEJI-SOFTWARE/aplikasi-prediksi-liver-svm/blob/develop/Example/image/hal-register.png?raw=true)

3. Halaman Dashboard
   ![alt text](https://github.com/DEJI-SOFTWARE/aplikasi-prediksi-liver-svm/blob/develop/Example/image/hal-dashboard.png?raw=true)
   
5. Halaman Data Training
   ![alt text](https://github.com/DEJI-SOFTWARE/aplikasi-prediksi-liver-svm/blob/develop/Example/image/hal-data-training.png?raw=true)
   
7. Halaman Data Testing
   ![alt text](https://github.com/DEJI-SOFTWARE/aplikasi-prediksi-liver-svm/blob/develop/Example/image/hal-data-testing.png?raw=true)
   
9. Halaman Visualisasi
    ![alt text](https://github.com/DEJI-SOFTWARE/aplikasi-prediksi-liver-svm/blob/develop/Example/image/has-viusalisasi.png?raw=true)
   
11. Halaman Profile
    ![alt text](https://github.com/DEJI-SOFTWARE/aplikasi-prediksi-liver-svm/blob/develop/Example/image/hal-profile.png?raw=true)





