<?php 
namespace Kontrolpaneli\kontrolcu;
defined('GUVENLIK') or die;
use \PHPWebTurk\Denetleyici;
use PHPWebTurk\Veritabani\VT;
/**
 * Baslangic Kontrolcu
 * @package Kontrolpaneli\kontrolcu;
 */
class Baslangic extends Denetleyici
{
use \PHPAkTurk\Panel_Denetleyici;
protected $erisim=[
'kurucu'=>'*'
];
public function index()
{
$this->p_gorunum("anasayfa");
}
}
?>