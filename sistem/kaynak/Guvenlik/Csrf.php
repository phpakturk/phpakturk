<?php
namespace PHPWebTurk\Guvenlik;
use \PHPWebTurk\Guvenlik\Oturum;
defined("GUVENLIK") or die;
class Csrf {
    protected static $csrf_config;

    public function __construct() {
       self::$csrf_config=yapilandirma("guvenlik");
    }

    public static function olustur() {
        return Oturum::olustur(self::$csrf_config['csrf']['session'], sha1(md5(uniqid(mt_rand()))));
    }

    public static function input(){
    self::olustur();
        return '<input type="hidden" id="' . self::$csrf_config['csrf']['input_adi'] . '" name="' . self::$csrf_config['csrf']['input_adi'] . '" value="'.Oturum::cek(self::$csrf_config['csrf']['session']).'">';
    }
    public static function cek($degerAdi) {
        return self::$csrf_config['csrf'][$degerAdi];
    }
}
?>
