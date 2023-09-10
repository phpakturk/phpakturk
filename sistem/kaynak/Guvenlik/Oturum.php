<?php namespace PHPWebTurk\Guvenlik;defined("GUVENLIK") or die;class Oturum{
public static function olustur($isim,$deger=null){if(is_array($isim)){foreach($isim as$key => $value) {$_SESSION[$key]=$value;}}else{$_SESSION[$isim]=$deger;}}
public static function sahipOldugu($isim){return isset($_SESSION[$isim]) ? true : false;}
public static function cek($isim){if(self::sahipOldugu($isim)){return $_SESSION[$isim];}else{return false;}}
public static function sil($isim){if(self::sahipOldugu($isim)){unset($_SESSION[$isim]);}
}
public static function tumunuSil(){session_destroy();}
} ?>