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
            'url' => ''
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
}
