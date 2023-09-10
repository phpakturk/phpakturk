<?php defined('GUVENLIK') or die;
error_reporting(E_ALL);
ini_set("display_errors",1);
define("WEBDIZIN",ANADIZIN."web/");
define("SISTEMDIZIN",ANADIZIN."sistem/");
define("UYGULAMADIZIN",ANADIZIN."uygulama/");
define('SABITLER',[
'KONTROLCU_DIZIN'=>UYGULAMADIZIN.'Kontrolculer/',
'GORUNUM_DIZIN'=>UYGULAMADIZIN.'Gorunum/',
'MODEL_DIZIN'=>UYGULAMADIZIN.'Modeller/',
'YAPILANDIRMA_DIZIN'=>ANADIZIN.'yapilandirma/',
]);
if(file_exists(ANADIZIN."vendor/autoload.php")){include(ANADIZIN."vendor/autoload.php");}
include(SISTEMDIZIN."bootstrap.php");
$Uygulama=new PHPWebTurk\Uygulama();
$Uygulama->baglamiAyarla(((php_sapi_name()=='cli' ? 'php-cli' : 'web'))); ?>