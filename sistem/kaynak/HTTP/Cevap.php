<?php namespace PHPWebTurk\HTTP;class Cevap{
public function __construct(){}
public static function cikti($degerler,$tip='json'){
switch($tip){
case 'json':
header("Content-Type:application/json");
return json_encode($degerler,JSON_UNESCAPED_UNICODE);
break;
case 'xml':
header("Content-Type:application/xml");
echo '<?xml version="1.0" encoding="'.yapilandirma("uygulama")['karakter_seti'].'"?>';
return $degerler;
break;
case 'curl':
return $degerler;
break;	
}
return new self();
}
} ?>