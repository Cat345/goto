<?php
	require 'db.php';
	if(isset($_GET['to'])) {


$id = $_GET['to'];
$url = R::findOne('urls', 'hash = ?', [$id]);
$adress=$url->url_adress;
if($adress!=""){
echo '<meta http-equiv="refresh" content="0;'.$adress.'"> ';
}
else{
echo"Такого URL не существует!";
echo '<meta http-equiv="refresh" content="2;/"> ';
}

}

?>
