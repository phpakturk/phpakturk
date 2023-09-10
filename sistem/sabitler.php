<?php defined("GUVENLIK") or die;include("kancalar.php");
function git($adres,$zaman=0){
if($zaman==0){
header("Location:".$adres);
}else{
header("Refresh:".$zaman.";url=".$adres);
}
}
function dd($deger){
echo '<div style="background:rgb(0 0 0 / 57%)!important;color:white;padding:1px 9px 2px 20px;"><p><b>'.ucfirst(gettype($deger)).'</b></p>';
echo '<code><pre>';
print_r($deger);
echo '</pre></code></div>';
}
function dizin_url($dir=__DIR__){$root="";$dir=str_replace('\\','/',realpath($dir));$root.=!empty($_SERVER['HTTPS'])?'https':'http';$root.='://'.@$_SERVER['HTTP_HOST'];if(!empty($_SERVER['CONTEXT_PREFIX'])){$root.=$_SERVER['CONTEXT_PREFIX'];$root.=substr($dir,strlen($_SERVER['CONTEXT_DOCUMENT_ROOT']));}else{$root.=substr($dir,strlen($_SERVER['DOCUMENT_ROOT']));}return $root;}
function dizin_tip($dir=__DIR__){$root="";$dir=str_replace('\\','/',realpath($dir));if(!empty($_SERVER['CONTEXT_PREFIX'])){$root.=$_SERVER['CONTEXT_PREFIX'];$root.=substr($dir,strlen($_SERVER['CONTEXT_DOCUMENT_ROOT']));}else{$root.=substr($dir,strlen($_SERVER['DOCUMENT_ROOT']));}return $root;}
function yapilandirma($dosya){
$sinif='Yapilandirma\\'.ucfirst($dosya);
$dosya=SABITLER['YAPILANDIRMA_DIZIN'].ucfirst($dosya).'.php';
if(class_exists($sinif)){
return new $sinif();
}elseif(file_exists($dosya)){
include($dosya);
}
}
function site_url($url=''){ 
$uygulama=yapilandirma("uygulama");
if($uygulama->site_url=='{sistem_belirlesin}'){
return dizin_url(ANADIZIN).$url;
}else{
return $uygulama->site_url.$url;
}
}
function kodu_kucult($icerik,$durum=true){
if($durum==true){
$cikti=preg_replace(array(
'/ {2,}/',
'/<!--.*?-->|\t|(?:\r?\n[ \t]*)+/s'
),array(' ',''),$icerik);
return $cikti;
}else{
return $icerik;
}
}
function otomatikyukleme($tip,$alanBirimi,$dizin=''){
switch ($tip) {
case 'yardimci':if(file_exists(UYGULAMADIZIN."Yardimcilar/".$alanBirimi.".php")){
include(UYGULAMADIZIN."Yardimcilar/".$alanBirimi.".php");
}elseif(file_exists(SISTEMDIZIN."Yardimcilar/".$alanBirimi.".php")){
include(SISTEMDIZIN."Yardimcilar/".$alanBirimi.".php");
}break;
case 'psr4':spl_autoload_register(function ($className)use($alanBirimi,$dizin){$namespace=$alanBirimi;$directory=$dizin;$className=ltrim($className, '\\');$fileName='';$namespaceLength=strlen($namespace);if(strncmp($namespace,$className,$namespaceLength)===0){$relativeClassName=substr($className, $namespaceLength);$fileName=$directory.str_replace('\\', '/', $relativeClassName).'.php';}if(file_exists($fileName)){require $fileName;}});break;
}
}
function dosya_tamponlama($dosya){
ob_start();
include($dosya);
echo ob_get_clean();
}
session_set_cookie_params([
'httponly'=>true,
'path'=>dizin_tip(ANADIZIN)
]);ob_start();session_start();
yapilandirma("sabitler");
?>