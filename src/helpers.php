<?php

/**
 * Kolay ulaşım için bazı fabrika fonksiyonlarını ve
 * yardımcı fonksiyonları burada tutacağız
 */

 if (!function_exists('tr_strtolower')) {
     function tr_strtolower($str)
     {
         $str = str_replace(['i', 'I'], ['İ', 'ı'], $str);
         return mb_strtolower($str, 'UTF-8');
     }
 }

 if (!function_exists('tr_ucwords')) {
     function tr_ucwords($str)
     {
         $str = str_replace(['i', 'I'], ['İ', 'ı'], $str);
         return mb_convert_case($str, MB_CASE_TITLE, 'UTF-8');
     }
 }
