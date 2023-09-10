<?php 
namespace PHPWebTurk;
class Denetleyici{
public $vt;
public function gorunum($dosyaAdi,$degerler=[]){
extract($degerler);
$gorunum=yapilandirma("gorunum");
$dosya=UYGULAMADIZIN."Gorunum/".$dosyaAdi.$gorunum->dosya_uzantisi;
if(file_exists($dosya)){
ob_start();
include($dosya);
echo ob_get_clean();
}
}
public function ozel_gorunum($dosyaAdi,$degerler=[]){
extract($degerler);
$dosya=ANADIZIN.str_replace(ANADIZIN,"",$dosyaAdi).".php";
if(file_exists($dosya)){
ob_start();
include($dosya);
echo ob_get_clean();
}
}
public function vt(){return new PHPWebTurk\Veritabani\VT();}
}
 ?>