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