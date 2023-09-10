# PHPAkTürk

# Kurulum Yöntemleri
**Git**: `git clone https://github.com/phpakturk/phpakturk.git`  
**Composer**: `composer create-project phpakturk/phpakturk`



```php
/*if($dizin!=$yol){
echo gorunum("hatalar/hata_404",array("kod"=>404,"mesaj"=>"PAGE NOT FOUND "));
}
$fonksiyon=$destek['fonksiyon'];
if(isset(self::$ayarlar[self::$mod]['ozel_fonksiyon'])){
echo call_user_func(self::$ayarlar[self::$mod]['ozel_fonksiyon']);
}elseif(is_callable($fonksiyon)){
echo call_user_func($fonksiyon);
}elseif(is_string($fonksiyon)){
[$denetleyiciAdi,$metotAdi]=explode("@",$fonksiyon);
$denetleyiciAdi=$destek['namespace'].$denetleyiciAdi;
$denetleyici=new $denetleyiciAdi();
echo call_user_func([$denetleyici,$metotAdi]);
}*/
/*$rotaDegerleri = array_key_exists($metot, self::$rotalar[self::$mod]) ? self::$rotalar[self::$mod][$metot] : false; $fonksiyon = isset($rotaDegerleri[$yol]['fonksiyon']) ?$rotaDegerleri[$yol]['fonksiyon'] : false;if (!$rotaDegerleri) {echo gorunum("hatalar/hata_404", array("kod" => 404, "mesaj" => "Page not found"));}if(is_string($fonksiyon)){[$denetleyiciAdi, $metotAdi] = explode("@", $fonksiyon);$denetleyici = self::$alanbirimi . $denetleyiciAdi;$denetleyici = new $denetleyici();echo $denetleyici->$metotAdi();}*/
```