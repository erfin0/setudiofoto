<?php
if (!function_exists('reimg')) {
    function  reimg( $img, $name="product"): string
    {
        if (filter_var($img, FILTER_VALIDATE_URL)) {
            return $img ;
        } else {
            if ($img != "") {
                return base_url( '/uploads/'.$name.'/' . $img);
            }
            return base_url("/img/Image_not_available.png");
        }
       
    }
}
if (!function_exists('treimg')) {
    function  treimg( $img, $name="product"): string
    {
        if (filter_var($img, FILTER_VALIDATE_URL)) {
            return $img ;
        } else {
            if ($img != "") {
                return  base_url('/uploads/'.$name.'/thumbnail' . $img);
            }
            return base_url("/img/Image_not_available_mini.png");
        }
       
    }
}


if (!function_exists('gantiformat')){
function gantiformat($nomorhp)
{
    //Terlebih dahulu kita trim dl
    $nomorhp = trim($nomorhp);
    //bersihkan dari karakter yang tidak perlu
    $nomorhp = strip_tags($nomorhp);
    // Berishkan dari spasi
    $nomorhp = str_replace(" ", "", $nomorhp);
    // bersihkan dari bentuk seperti  (022) 66677788
    $nomorhp = str_replace("(", "", $nomorhp);
    $nomorhp = str_replace(")", "", $nomorhp);
    // bersihkan dari format yang ada titik seperti 0811.222.333.4
    $nomorhp = str_replace(".", "", $nomorhp);

    //cek apakah mengandung karakter + dan 0-9
    if (!preg_match('/[^+0-9]/', trim($nomorhp))) {
        // cek apakah no hp karakter 1-3 adalah +62
        if (substr(trim($nomorhp), 0, 3) == '+62') {
            $nomorhp = trim($nomorhp);
        }
        // cek apakah no hp karakter 1 adalah 0
       if (substr($nomorhp, 0, 1) == '0') {
            $nomorhp = '+62' . substr($nomorhp, 1);
        }
        if (substr($nomorhp, 0, 2) == '62') {
            $nomorhp = '+' . $nomorhp;
        }

    }
    return $nomorhp;
}}


if (!function_exists('linkwa')){
function linkwa($nomor)
{
    $nomorhp = gantiformat($nomor);
    $nomorhp = trim($nomorhp, "+");
    return  'https://api.whatsapp.com/send?phone=' . $nomorhp;
}}