<?php
namespace Config;
use CodeIgniter\Config\BaseConfig;

class Aplikasi extends BaseConfig
{
    public string $layoutUser = 'LayoutUser';
    public array $MenuUser=[
       [ 'menu'=>'Price list',
        'url'=>'/pricelist'],
        [ 'menu'=>'Portofolio',
        'url'=>''],
        [ 'menu'=>'Jadwal Boking',
        'url'=>''],
        [ 'menu'=>'Testimoni',
        'url'=>'/#testimoni'],
        [ 'menu'=>'About',
        'url'=>''],        
        [ 'menu'=>'Contact',
        'url'=>''],
    ];
    public string $perusahaan= 'xxxstudio';
    public string $slogan='capture your most beautiful moments';
}