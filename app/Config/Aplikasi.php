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
            'url' => ''
        ],
        [
            'menu' => 'Jadwal Boking',
            'url' => ''
        ],
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
    public string $perusahaan = 'xxxstudio';
    public string $slogan = 'capture your most beautiful moments';
    public string $about = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br>xxxxxxxxxxxxxxxxxxxxxxxxxx<br>xxxxxxxxxxxxxxxxxxxxxxxxx<br>xxxxxxxxxxxxxxxxxxxxxxxxx';
    public array $about_team = [
        [
            'title' => 'xxxxxxxxx',
            'image' => 'https://picsum.photos/600?1',
        ], [
            'title' => 'xxxxxxxxx',
            'image' => 'https://picsum.photos/600?2',
        ]
    ];
    public array $contact = [
        'alamat' => 'Jl kesana kesini no,3567, selalu',
        'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d252994.32062682518!2d110.38321545801648!3d-7.785980452530815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5788f3c4d097%3A0x80cd3a492e0cd50!2sSekretariat%20Negara%20Istana%20Kepresidenan!5e0!3m2!1sid!2sid!4v1686150030857!5m2!1sid!2sid',
        'wa' => '+6286321323232',
        'mail' => null,
        'twitter' => 'https://twitter.com/?lang=id',
        'facebook' => null,
        'google' => null,
        'instagram' => null,
        'linkedin' => null,
        'github' => null,
        'youtube' => 'https://www.youtube.com/' ,
        'tiktok' => null,
    ];
}
