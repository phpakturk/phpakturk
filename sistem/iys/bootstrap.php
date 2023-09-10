<?php defined('GUVENLIK') or die;
use PHPWebTurk\{Rota,HTTP\Istek};
function panel_url($adres=''){
return dizin_url(KONTROLPANEL_KLASOR).'/'.$adres;
}
function panel_dizin($adres=''){
return KONTROLPANEL_KLASOR.$adres;
}
function panel_bilgiler($anahtar=''){
$cikti=\PHPWebTurk\Veritabani\VT::sec("ayar_deger")->tablo("ayarlar")->nerede("ayar_baslik","panel_bilgiler")->tumu();
if($anahtar==''){ return $cikti; }else{
return json_decode($cikti['ayar_deger'],true)["panel_".$anahtar];
}
}
function panel_tema_adres($adres=''){
$cikti=PHPWebTurk\Veritabani\VT::sec("ayar_deger")->tablo("ayarlar")->nerede("ayar_baslik","panel_tema")->tumu();
return panel_url("temalar/".$cikti['ayar_deger'])."/".$adres;
}
function panel_tema_dizin($adres=''){
$cikti=PHPWebTurk\Veritabani\VT::sec("ayar_deger")->tablo("ayarlar")->nerede("ayar_baslik","panel_tema")->tumu();
return panel_dizin("temalar/".$cikti['ayar_deger'])."/".$adres;
}
Rota::mod("site")->onek("/api")->namespace("Uygulama\Kontrolcu\\")->grup(function(){
Rota::get('/','ApiAnasayfa@index');
});
Rota::mod("panel")->namespace("Kontrolpaneli\kontrolcu\\")->grup(function(){
Rota::get('/','Baslangic@index');
Rota::get('/index.php?do=eklentiler','Eklentiler@index');
});
function panel_ustalan(){
$cikti='';
$temaBilgileri=json_decode(file_get_contents(panel_tema_adres("tema.json")));
foreach($temaBilgileri->varliklar->stiller as$stilKimlik=>$stilAdres){
$cikti.='<link id="'.$stilKimlik.'-css" rel="stylesheet" href="'.str_replace(array('{panel_tema_adres}'),panel_tema_adres(),$stilAdres).'">';
}
echo '<meta charset="'.yapilandirma("uygulama")->karakter_seti.'">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>var SITE_URL="'.site_url().'";</script>
'.$cikti.'
';
} ?>