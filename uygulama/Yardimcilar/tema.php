<?php defined('GUVENLIK') or die;
function genel_ayarlar($deger=null){
$degerler=include(SISTEMDIZIN."ayarlar/site.php");
if($deger==null){return $degerler;}else{$deger='site_'.$deger;return $degerler[$deger];}
}
function tema_dizin($dosya=''){
$cikti=PHPWebTurk\Veritabani\VT::sec("ayar_deger")->tablo("ayarlar")->nerede("ayar_baslik","site_tema")->tumu();
return ANADIZIN."web/temalar/".$cikti['ayar_deger']."/".$dosya;
}
function tema_adres($adres=''){
return dizin_url(tema_dizin())."/".$adres;
}
function html_attr(){
return ' lang="'.genel_ayarlar("dil").'" dir="'.genel_ayarlar("dir").'"';
}
function phpakturk_ustalan(){
$stiller='';
$pwaManifest=json_decode(file_get_contents(site_url("manifest-pwa.json")));
$temaBilgileri=json_decode(file_get_contents(tema_adres("tema.json")));
foreach($temaBilgileri->varliklar->stiller as$stilKimligi=>$stilAdresi){
$stiller.='<link id="'.$stilKimligi.'-css" rel="stylesheet" href="'.str_replace(array('{tema_url}'),\tema_adres(),$stilAdresi).'">';
}
echo '<meta charset="'.yapilandirma("uygulama")->karakter_seti.'"><meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge"><meta name="view-transition" content="same-origin" />
<meta name="referrer" content="unsafe-url"><title>'.genel_ayarlar("baslik").'</title><meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<base href="'.site_url().'"><link rel="manifest" href="'.site_url("manifest-pwa.json").'">
<meta name="distribution" content="Global"/><meta name="classification" content="software"/><meta name="content-language" content="'.yapilandirma("uygulama")->varsayilan_dil.'"/>
<meta property="twitter:card" content="summary"/><meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="'.$pwaManifest->name.'"><meta name="apple-mobile-web-app-status-bar-style" content="black"><script>
var SITE_URL="'.site_url().'";
if("serviceWorker" in navigator){window.addEventListener("load",function(){navigator.serviceWorker.register(SITE_URL+"uygulama.js").then(function(registration){console.log("ServiceWorker registration successful with scope:",registration.scope);},function(err){console.log("ServiceWorker registration failed:",err);});});}</script>
'.$stiller.'
';
}
?>