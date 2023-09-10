<?php 
namespace Uygulama\Kontrolcu;
defined('GUVENLIK') or die;
use PHPWebTurk\Denetleyici;
/**
 * Api Anasayfa Kontrolcu
 * @package Uygulama\Kontrolcu
 */
class ApiAnasayfa extends Denetleyici
{
public function index()
{
return cevap()->cikti([
'baslik'=>genel_ayarlar("baslik"),
'url'=>site_url(),
'dil'=>genel_ayarlar("dil"),
'dir'=>genel_ayarlar("dir"),
'aciklama'=>genel_ayarlar("aciklama"),
'anahtar_kelimeler'=>genel_ayarlar("anahtar_kelimeler"),
'karakter_seti'=>yapilandirma("uygulama")->karakter_seti,
'altalan'=>genel_ayarlar("altalan"),
'yazar'=>genel_ayarlar("yazar"),
'zaman_dilimi'=>yapilandirma("uygulama")->zamanDilimi
]);
}
}
 ?>