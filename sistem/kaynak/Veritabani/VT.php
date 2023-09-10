<?php
namespace PHPWebTurk\Veritabani;
use PHPWebTurk\HTTP\Istek;
class VT{
public $nerede=[];
protected $sorgu='';
protected $sirala='';
public $baglanti=null;
public $hata_cikti='';
public static $sec='*';
public static $tablo='';
protected static $bilgiler=[];
public function __construct(){
self::$bilgiler=self::bilgiler(self::bilgiler("varsayilanGrup"));
$this->baglanti=self::baglan(self::$bilgiler);
}
public static function baglan($veri)
{
$sinif='PHPWebTurk\Veritabani\\'.$veri['surucu'].'Surucu';
if(class_exists($sinif)){
$surucu=new $sinif();
$surucu->baglan($veri);
return $surucu;
}
}
public static function bilgiler($veri='',$grup='')
{
$degerler=yapilandirma("veritabani");
if($veri=='' && $grup==''){
return $degerler;
}else{
$grup=($grup ? $grup : $degerler->varsayilanGrup);
return $degerler->$grup;
}
}
public static function tablo($adi){self::$tablo=self::bilgiler(self::bilgiler("varsayilanGrup"))['tablo_oneki'].$adi;return new self();}
public static function sec($sutunlar='*'){self::$sec=$sutunlar;return new self();}
public function sirala($sutun,$deger='ASC'){$this->sirala='ORDER BY '.$sutun.' '.strtoupper($deger);return $this;}
public function sorgu($sql,$degerler=[]){
return $this->baglanti->sorgu($sql,$degerler);
}
public function nerede($sutunAdi,$deger,$operator='='){
$this->nerede[]=Istek::guvenlik($sutunAdi,true).' '.Istek::guvenlik($operator,true)."'".Istek::guvenlik($deger,true)."'";
return $this;}
public function sorguHazila(){
$this->sorgu="SELECT ".self::$sec." FROM ".self::$tablo;
if(count($this->nerede)){ $this->sorgu.=' WHERE '.implode(" AND ",$this->nerede); }
$this->sorgu.=' '.$this->sirala;
}
public function tumu(){
$this->sorguHazila();
return $this->baglanti->tumu($this->baglanti->sorgu($this->sorgu));
}
public function mesaj(){
return $this->baglanti->hata_ver();
}
} ?>