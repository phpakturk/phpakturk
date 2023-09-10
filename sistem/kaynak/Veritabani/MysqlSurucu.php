<?php 
namespace PHPWebTurk\Veritabani;
/**
 * @package PHPWebTurk\Veritabani
 */
class MysqlSurucu{
public $vt;
public $sorgu;
public function baglan($parametreler){
try {
$this->vt=new \PDO("mysql:host=".$parametreler['sunucu'].";dbname=".$parametreler['adi'].";charset=".$parametreler['karakter_seti'].";",$parametreler['kadi'],$parametreler['sifre']);
}catch(\PDOException $e){return ['hata'=>$e];}
}
public function sorgu($sorgu,$degerler=array()){
$sql=$this->vt->prepare($sorgu);
return $sql->execute($degerler);
}
public function tumu($sorgu){
return $sorgu->fecthAll(\PDO::FECTH_OBJ);
}
}
?>