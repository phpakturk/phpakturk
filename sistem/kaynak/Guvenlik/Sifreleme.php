<?php namespace PHPWebTurk\Guvenlik;defined('GUVENLIK') or die;class Sifreleme{
public function sifrele($deger){return sha1($this->sifreleme['anahtar'].$deger);}
} ?>