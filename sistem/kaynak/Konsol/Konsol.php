<?php namespace PHPWebTurk\Konsol;defined('GUVENLIK') or die();class Konsol{
public const SURUM='1.0';
public function __construct(){}
public function cikti($mesaj){
return " \n\r ".$mesaj." \n\r ";
}
public function vt($argv){
$mod=isset($argv[1]) ? $argv[1] : null;
switch($mod){
case 'vt:value':
echo $this->cikti("string wor while");
break;
default:
echo $this->cikti(" Veritabanı Ayarları ");
break;
}
}
public function yardim(){
echo $this->cikti((\PHPWebTurk\Uygulama::FRAMEWORK_ADI)."  v".self::SURUM);
echo do_action("konsol_yardim");
}
} ?>