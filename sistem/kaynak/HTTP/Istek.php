<?php namespace PHPWebTurk\HTTP;
class Istek{
public \PHPWebTurk\Guvenlik\Csrf $csrf;
public \PHPWebTurk\Guvenlik\Oturum $oturum;
public \PHPWebTurk\Guvenlik\Sifreleme $sifreleme;
private $rotaDegerleriniAyarla=[];
public function __construct(){
$this->csrf=new \PHPWebTurk\Guvenlik\Csrf();$this->oturum=new \PHPWebTurk\Guvenlik\Oturum();$this->sifreleme=new \PHPWebTurk\Guvenlik\Sifreleme();}
public function rotaDegerleriniAyarla($deger,$varsayilan=null){return isset($this->rotaDegerleriniAyarla[$deger]) ? $this->rotaDegerleriniAyarla[$deger] : $varsayilan;}
public static function get($par,$st=false){return self::guvenlik($_GET[$par],$st);}
public static function post($par,$st=false){return self::guvenlik($_POST[$par],$st);}
public static function kontrol($deger){switch($deger){
case 'GET': return (!empty($_GET) ? true : false);break;
case 'POST': return (!empty($_POST) ? true : false);break;
case 'PUT': return (!empty($_GET) ? true : false);break;
case 'DELETE': return (!empty($_GET) ? true : false);break;
default:return false;break;}}
public static function guvenlik($metin='',$st=false){
if($st){
return htmlspecialchars(addslashes(trim($metin)),ENT_QUOTES);
}else {
return addslashes(trim($metin)); 
}
return $metin;
}
public static function metoduAl():string{return $_SERVER['REQUEST_METHOD'];return new self();}
public static function yoluAl():string{return $_SERVER['REQUEST_URI'];return new self();}
} ?>