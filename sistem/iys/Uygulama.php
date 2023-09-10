<?php 
namespace PHPAkTurk;
use \PHPWebTurk\Rota;
class Uygulama{
public $rota;
public const SURUM="1.0";
public function __construct(){
$this->rota=new \PHPWebTurk\Rota();
}
public function baslat($mod)
{
switch($mod){
default:
$this->rota->ayarlar([
'mod'=>$mod
]);
$this->rota->cagir();
break;
}
}
} ?>