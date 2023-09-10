<?php
namespace PHPWebTurk;
class Uygulama{
public Rota $rota;
public HTTP\Istek $istek;
public HTTP\Cevap $cevap;
public Konsol\Konsol $konsol;
public static $baglamiAyarla='';
public $uygulamaYapilandirma='';
public const FRAMEWORK_ADI='PHPWebTürk';
public const SURUM='1.0';
public function __construct()
{
$this->istek=new HTTP\Istek();
$this->cevap=new HTTP\Cevap();
$this->konsol=new Konsol\Konsol();
$this->rota=new Rota();
$this->uygulamaYapilandirma=yapilandirma("uygulama");
}
public function baglamiAyarla($baglam)
{
self::$baglamiAyarla=$baglam;
return new self();
}
public function calistir($baglam)
{
switch(self::$baglamiAyarla){
case 'php-cli':
$konsolIslem=isset($GLOBALS['argv'][1]) ? $GLOBALS['argv'][1] : 'yardim';
$parts = explode(":", $konsolIslem);
if(is_callable([$this->konsol,$parts[0]]))
{
call_user_func_array([$this->konsol,$parts[0]], [$GLOBALS['argv']]);
}else{
add_action("konsol_yardim",function(){
echo "\r Böyle bir komut bulunamadı.\n";
});
call_user_func_array([$this->konsol,'yardim'], []);
}
break;
default:
ob_start();
$this->rota->mod($baglam)->cagir();
echo kodu_kucult(ob_get_clean(),$this->uygulamaYapilandirma->kucult);
break;
}
}
} ?>