<?php 
namespace Uygulama\Kontrolcu;
defined('GUVENLIK') or die;
use PHPWebTurk\Denetleyici;
/**
 * Anasayfa Kontrolcu
 * @package Uygulama\Kontrolcu
 */
class Anasayfa extends Denetleyici
{
public function index()
{
$this->ozel_gorunum(tema_dizin("index"));
}
}
 ?>