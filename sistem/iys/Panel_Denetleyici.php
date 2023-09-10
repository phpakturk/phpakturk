<?php 
namespace PHPAkTurk;
trait Panel_Denetleyici{
public function __construct(){}
public function p_gorunum($dosyaAdi,$degerler=[]){
extract($degerler);
$gorunum=yapilandirma("gorunum");
$dosya=KONTROLPANEL_KLASOR."gorunum/".$dosyaAdi.".php";
if(file_exists($dosya)){
ob_start();
include($dosya);
echo ob_get_clean();
}
}
public function dil($key, $default = null)
{
    $degerler = explode(".", $key);
    $dilDosyasi = panel_dizin() . "diller/" . panel_bilgiler("dil") . "/" . $degerler[0] . ".php";
    include($dilDosyasi);

    $durum = $degerler[1];

    if (array_key_exists($durum, $dil)) {
        return $dil[$durum];
    } else {
        return $default;
    }
}

} ?>