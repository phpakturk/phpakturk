<?php defined('GUVENLIK') or die; include("ustalan.php"); ?>
<table cellspacing="1" cellpadding="7" border="0" width="96%" align="center"><tbody>
<tr><td><?=$this->dil("index.phpakturk_surumu")?>:</td><td><?=(\PHPAkTurk\Uygulama::SURUM)?></td></tr>
<tr><td><?=$this->dil("index.phpwebturk_surumu")?>:</td><td><?=(\PHPWebTurk\Uygulama::SURUM)?></td></tr>
<tr><td><?=$this->dil("index.php_surumu")?>:</td><td><?=phpversion()?></td></tr>
<tr><td><?=$this->dil("index.zend_surumu")?>:</td><td><?=@zend_version()?></td></tr>
<tr><td><?=$this->dil("index.sunucu_isletim_sistemi")?>:</td><td><?=PHP_OS?></td></tr>
<tr><td><?=$this->dil("index.sunucu_ip_adres")?>:</td><td><?=$_SERVER['REMOTE_ADDR']?></td></tr>
</tbody></table>
<?php include("altalan.php"); ?>