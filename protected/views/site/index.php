<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>



<form name="input"  method="get">
		URL: <input type="text" size="70" placeholder="http://yandex.ru" id="long_url" name="url_a">
		<input type="submit" id='bt_link' value="Укоротить">
</form>
<br>
<div id="result">

</div>


