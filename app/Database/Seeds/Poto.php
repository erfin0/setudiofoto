<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Poto extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul'=>"Hidupmu adalah petualanganmu",
                'keterangan'=>"Hidupmu adalah petualanganmu. Dan petualangan di depanmu adalah perjalanan untuk memenuhi tujuan dan potensimu sendiri",
                'image'=>'1.jpg',
            ], [
                'judul'=>"Jika kamu bahagia",
                'keterangan'=>"Jika kamu dapat melakukan yang terbaik dan bahagia, kamu lebih maju dalam hidup daripada kebanyakan orang.",
                'image'=>'2.jpg',
            ],
            [
                'judul'=>"Pendidikan adalah senjata",
                'keterangan'=>"Pendidikan adalah senjata paling ampuh yang bisa kita gunakan untuk mengubah dunia.",
                'image'=>'3.jpg',
            ],
            [
                'judul'=>"Kamu harus memiliki",
                'keterangan'=> "Kamu harus memiliki beberapa visi untuk hidupmu. Bahkan jika kamu tidak tahu rencananya, kamu harus memiliki arah yang kamu pilih." ,
                'image'=>'4.jpg',
            ],
            [
                'judul'=>"kamu tidak akan pernah merasa cukup",
                'keterangan'=>"Bersyukurlah atas apa yang kamu miliki; kamu akan mendapatkan lebih banyak. Jika kamu berkonsentrasi pada apa yang tidak kamu miliki, kamu tidak akan pernah merasa cukup." ,
                'image'=>'5.jpg',
            ],
            [
                'judul'=>"Kegagalan hanyalah",
                'keterangan'=> "Tidak ada yang namanya kegagalan. Kegagalan hanyalah kehidupan yang mencoba menggerakkan kita ke arah lain.",
                'image'=>'6.jpg',
            ],
            [
                'judul'=>"Apa yang kamu dapatkan",
                'keterangan'=>"Kamu mendapatkan dalam hidup apa yang kamu berani minta.",
                'image'=>'7.jpg',
            ],
            [
                'judul'=>"Perjuangkan apa",
                'keterangan'=>"Perjuangkan apa yang membuatmu optimistis tentang dunia. Temukan, pertahankan, gali, kejar.",
                'image'=>"8.jpg",
            ],
            [
                'judul'=>"Saya telah belajar ",
                'keterangan'=>"Saya telah belajar bahwa penting untuk tidak membatasi diri. Kamu dapat melakukan apa pun yang benar-benar kamu sukai, apa pun itu." ,
                'image'=>"9.jpg",
            ],
            [
                'judul'=>"Kecerdasan",
                'keterangan'=> "Kecerdasan plus karakter—itulah tujuan pendidikan sejati.",
                'image'=>"10.jpg",
            ],
            [
                'judul'=>"Jika saya harus ",
                'keterangan'=>"Jika saya harus mengatakan nasihat kepada kamu, itu adalah, 'katakan ya'. Katakan ya, dan buat takdirmu sendiri.",
                'image'=>"11.jpg",
            ],
            [
                'judul'=>"Sekarang pergilah",
                'keterangan'=>"Sekarang pergilah, dan buatlah kesalahan-kesalahan yang menarik, buatlah kesalahan-kesalahan yang luar biasa, buatlah kesalahan-kesalahan yang mulia dan fantastis. Langgar aturan. Biarkan dunia lebih menarik karena keberadaanmu di sini.",
                'image'=>"12.jpg",
            ],
        ];
        $this->db->table('portofolio')->insertBatch($data);
    }
}
