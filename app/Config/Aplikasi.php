<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Aplikasi extends BaseConfig
{
    public string $layoutUser = 'LayoutUser';
    public array $MenuUser = [
        [
            'menu' => 'Price list',
            'url' => '/pricelist'
        ],
        [
            'menu' => 'Portofolio',
            'url' => '/portofolio'
        ],
        /*  [
            'menu' => 'Jadwal Boking',
            'url' => ''
        ], */
        [
            'menu' => 'Testimoni',
            'url' => '/testimoni'
        ],
        [
            'menu' => 'About',
            'url' => '/about'
        ],
        [
            'menu' => 'Contact',
            'url' => '/contact'
        ],
    ];
    public string $perusahaan = 'Wilis Photo';
    public string $slogan = 'capture your most beautiful moments';
    public string $about = 'Melayani pas photo,foto panggilan dan cetak foto dari berbagai media seperti Hp,CD,Flashdisk dengan kualitas cetak unggul';
    public array $about_team = [
        [
            'title' => 'cs 2',
            'image' => 'https://picsum.photos/600?1',
        ], [
            'title' => 'cs 5',
            'image' => 'https://picsum.photos/600?2',
        ]
    ];
    public array $contact = [
        'alamat' => 'Jl. Imogiri Timur No 141, Giwangan, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55163',
        'map' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15810.46939705836!2d110.3900343!3d-7.8302609!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5704ae19ca9f%3A0xb05bec832fda2bdd!2sWilis%20Photo!5e0!3m2!1sid!2sid!4v1687626983848!5m2!1sid!2sid',
        'wa' => '+6287839594951',
        'mail' => 'photowilis88@gmail.com',
        'twitter' => null,
        'facebook' => null,
        'google' => null,
        'instagram' => null,
        'linkedin' => null,
        'github' => null,
        'youtube' => null,
        'tiktok' => null,
    ];


    public string $layoutAdmin = 'LayoutAdmin';
    public array $MenuAdmin = [
        [
            'icon' => '<i class="fa-solid fa-user-gear"></i>',
            'menu' => 'Admin',
            'url' => '/admin/admin'
        ],
        [
            'icon' => '<i class="fa-regular fa-image"></i>',
            'menu' => 'Portofolio',
            'url' => '/admin/portofolio'
        ],
        [
            'icon' => '<i class="fa-solid fa-ticket"></i>',
            'menu' => 'Booking',
            'url' => '/admin/booking'
        ],
        [
            'icon' => '<i class="fa-regular fa-credit-card"></i>',
            'menu' => 'Pembayaran',
            'url' => '/admin/pembayaran'
        ],
        [
            'icon' => '<i class="fa-solid fa-star"></i>',
            'menu' => 'Testimoni',
            'url' => '/admin/testimoni'
        ],
        [
            'icon' => '<i class="fa-solid fa-users"></i>',
            'menu' => 'User',
            'url' => '/admin/user'
        ],
        [
            'icon' => ' <i class="fa-solid fa-calendar-days"></i>',
            'menu' => 'Paket',
            'url' => '/admin/paket'
        ],


    ];


    public array $chat = [
        [
            'tanya' =>   'Buka jam berapa?',
            'jawap' =>   'Kita Buka dari Jam 08.00 – 20.00',
        ],
        [
            'tanya' =>   'Maksimal bisa untuk berapa orang?',
            'jawap' =>  'Sesuai  paket yang di pilih ya kak, bisa tambah orang dan kena charge tambahan.',
        ],
        [
            'tanya' =>  'Apa bisa untuk Paket Wedding?',
            'jawap' => 'Bisa Kak, informasi tentang Paket sudah tertera di halaman price list ya!',
        ],
        [
            'tanya' =>   'Apa Boleh ganti Kostum Saat Foto?',
            'jawap' =>   'Boleh, tetapi asal tidak melebihi batas waktu paket!',
        ],
    ];
    public string $bataspesanan="6 months";

    public array $rekening = [
       'atasnama' => "erlanga adi pamungkas",
       'no'=>'7000 0101 7707 533',
       'bank' => 'BRI',
       'img' =>''
    ];
}
