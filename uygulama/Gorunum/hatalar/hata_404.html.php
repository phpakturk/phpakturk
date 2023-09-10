<?php defined('GUVENLIK') or die; ?><!DOCTYPE html><html lang="<?=yapilandirma("uygulama")->varsayilan_dil?>"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?=$kod?> - <?=$mesaj?></title>
<style>body{background:#ddd;height:100%;font-weight:300;}
div{max-width:1024px;margin:5rem auto;padding:2rem;background:white;text-align:center;border:1px solid #efefef;border-radius:0.5rem;position:relative;}
h2{font-weight:lighter;letter-spacing:normal;font-size:3rem;margin-top:0;margin-bottom:0;color:#222;}
</style></head><body><div>
<h2><?=$kod?></h2><p><?=$mesaj?></p>
</div></body></html>