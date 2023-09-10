<?php defined("GUVENLIK") or die;
use PHPWebTurk\Rota;
Rota::mod("site")->namespace("Uygulama\Kontrolcu\\")->grup(function(){
Rota::get('/','Anasayfa@index');
});
?>