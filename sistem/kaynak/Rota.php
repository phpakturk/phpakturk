<?php 
namespace PHPWebTurk;
/**
 * @package PHPWebTurk
 */
class Rota{
public static $mod='';
public static $onek='';
public static $rotalar=[];
public static $ayarlar=[];
public static $alanbirimi='';
public static $desenler=array('@id[0-9]?' => '([0-9]+)','@url[0-9]?' => '([0-9a-zA-Z-_]+)');
public HTTP\Istek $istek;
public HTTP\Cevap $cevap;
public function __construct(){
$this->istek=new HTTP\Istek();
$this->cevap=new HTTP\Cevap();
}
public static function ayarlar($ayarlar=[]){self::$ayarlar[self::$mod]=$ayarlar;return new self();}
public static function mod($mod){self::$mod=$mod;return new self();}
public static function namespace($deger){self::$alanbirimi=$deger;return new self();}
public static function get($dizin,$fonksiyon,$ayarlar=[]){self::$rotalar[self::$mod]['get'][self::$onek.$dizin]=array("fonksiyon"=>$fonksiyon,"ozellikler"=>$ayarlar,"alanbirimi"=>self::$alanbirimi);return new self();}
public static function post($dizin,$fonksiyon,$ayarlar=[]){self::$rotalar[self::$mod]['post'][self::$onek.$dizin]=array("fonksiyon"=>$fonksiyon,"ozellikler"=>$ayarlar,"alanbirimi"=>self::$alanbirimi);return new self();}
public static function put($dizin,$fonksiyon,$ayarlar=[]){self::$rotalar[self::$mod]['put'][self::$onek.$dizin]=array("fonksiyon"=>$fonksiyon,"ozellikler"=>$ayarlar,"alanbirimi"=>self::$alanbirimi);return new self();}
public static function delete($dizin,$fonksiyon,$ayarlar=[]){self::$rotalar[self::$mod]['delete'][self::$onek.$dizin]=array("fonksiyon"=>$fonksiyon,"ozellikler"=>$ayarlar,"alanbirimi"=>self::$alanbirimi);return new self();}
public function cagir()
{
$yol=str_replace(\dizin_tip(DIZIN),'',$this->istek->yoluAl());
$metot=strtolower($this->istek->metoduAl());
foreach(self::$rotalar[self::$mod][$metot]as$rota=>$ayarlar){
foreach(self::$desenler as$desenKimlik=>$desenDeger){
$rota=preg_replace('#^'.$desenKimlik.'$#',$desenDeger,$rota);
}
$desen='#^'.$rota.'$#';
if(preg_match($desen,$yol,$degerler)){
$fonksiyon=$ayarlar['fonksiyon'];
array_shift($degerler);
if(is_string($fonksiyon)){
[$denetleyiciAdi,$metotAdi]=explode("@",$fonksiyon);
$denetleyici=$ayarlar['alanbirimi'].$denetleyiciAdi;
$denetleyici=new $denetleyici();
echo $denetleyici->$metotAdi();
}
}
}
}
public static function onek($onek){self::$onek=$onek;return new self();}
public static function grup(\Closure $closure):void{$closure();self::$onek='';}
} ?>