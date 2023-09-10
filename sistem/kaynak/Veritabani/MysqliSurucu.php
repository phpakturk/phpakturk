<?php 
namespace PHPWebTurk\Veritabani;
/**
 * @package PHPWebTurk\Veritabani
 */
class MysqliSurucu{
public $vt;
public $sorgu;
public $hata_cikti;
protected $gerekli_uzanti="mysqli";
public function baglan($parametreler){
$vt=@mysqli_connect($parametreler['sunucu'],$parametreler['kadi'],$parametreler['sifre'],$parametreler['adi']);
if($vt){
$this->vt=$vt;
}
}
public function sorgu($sorgu,$degerler=[]){
$sonuc=$this->vt->query($sorgu);
if(!$sonuc){
$this->hata_cikti='Sorgu Başarız!';
}else{ return $sonuc; }
}
public function hata_ver(){
$cikti='<ul>
<li>Tarih: '.date('d.m.Y H:i:s').'</li>
<li>Adres: '.$_SERVER['REQUEST_URI'].'</li>
<li>IP Adresiniz: '.$_SERVER['REMOTE_ADDR'].'</li>
<li>Sorgu: '.$this->sorgu.'</li>
</ul>';
return $cikti;
}
public function tumu($sorgu){
while($sql=$sorgu->fetch_assoc()){
return $sql;
}
}
public function kapat(){ mysqli_close($this->vt); }
}
?>