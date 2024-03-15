# Aplikasi Absensi Lab IT Komputer

## MVP Aplikasi:

-   Aplikasi memiliki 3 Role (Admin/Staf, PJ, Asisten)
-   Absensi (Clock in & Clock Out) serta Generate Code
-   Data asisten, data materi, dan data kelas
-   Generate Riwayat Absen Pribadi
-   Generate report seluruh absen sistem.
-   Import Report ke Excel

## Role User

-   Admin/Staf -> memiliki seluruh hak akses dan menu
-   PJ -> Generate Code, Riwayat Absen
-   Asisten -> Absen, RIwayat Absen

## ERD
![Teks paragraf Anda](https://github.com/anharID/mini-project-bri/assets/63109799/f89ca0dc-5ac0-4038-b0fc-ca1242e58e01)
* Relasi antara **users** dan **codes** adalah **One-to-many** (satu user dapat membuat dan menggunakan banyak kode untuk clock in)
* Relasi antara **codes** dan **precenses** adalah **One-to-one** (satu code hanya dapat digunakan untuk satu presensi)
* Relasi antara **classes** dan **precenses** adalah **One-to-many** (satu kelas dapat banyak kali presensi)
* Relasi antara **materials** dan **precenses** adalah **One-to-many** (satu materi dapat banyak kali presensi)
