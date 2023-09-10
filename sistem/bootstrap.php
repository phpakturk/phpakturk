<?php defined('GUVENLIK') or die;$psr4=array('PHPWebTurk\\'=>__DIR__.'/kaynak/','Uygulama\\'=>UYGULAMADIZIN,'Yapilandirma\\'=>SABITLER['YAPILANDIRMA_DIZIN']);
include("sabitler.php");
yapilandirma("otomatikyukleme");
$Otomatikyukleme=new Yapilandirma\Otomatikyukleme();
array_push($psr4,(Array) $Otomatikyukleme->psr4);
for($yardimci=0;$yardimci<count($Otomatikyukleme->yardimcilar);$yardimci++){echo otomatikyukleme("yardimci",$Otomatikyukleme->yardimcilar[$yardimci]);}
foreach($psr4 as$psr4Alanbirimi=>$psr4Dizin){
if(is_array($psr4Dizin)){
foreach($psr4Dizin as$psr4Alanbirimi1=>$psr4Dizin1){
if(file_exists($psr4Dizin1."bootstrap.php")){include($psr4Dizin1."bootstrap.php");}
otomatikyukleme('psr4',$psr4Alanbirimi1,$psr4Dizin1);
}
}else{
if(file_exists($psr4Dizin."bootstrap.php")){include($psr4Dizin."bootstrap.php");}
otomatikyukleme('psr4',$psr4Alanbirimi,$psr4Dizin);
}
};
function gorunum($dosyaAdi,$degerler=[]){$gorunum=new PHPWebTurk\Denetleyici();return $gorunum->gorunum($dosyaAdi,$degerler);}
function cevap(){return new PHPWebTurk\HTTP\Cevap();}
function istek(){return new PHPWebTurk\HTTP\Istek();}
yapilandirma("rotalar");