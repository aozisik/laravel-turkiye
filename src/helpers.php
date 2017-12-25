<?php

use Aozisik\Turkiye\Turkce\Ek;

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

  if (!function_exists('tr_strtoupper')) {
      function tr_strtoupper($str)
      {
          $str = str_replace(['i', 'I'], ['İ', 'ı'], $str);
          return mb_strtoupper($str, 'UTF-8');
      }
  }

 if (!function_exists('tr_ucwords')) {
     function tr_ucwords($str)
     {
         $str = str_replace(['i', 'I'], ['İ', 'ı'], $str);
         return mb_convert_case($str, MB_CASE_TITLE, 'UTF-8');
     }
 }

 if (!function_exists('ek')) {
     function ek($soz)
     {
         return new Ek($soz);
     }
 }
