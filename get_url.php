<?php
	require 'db.php';

	$data = $_POST;
	if ( isset($data['url']) )
	{
		$errors = array();
		if ( trim($data['url']) == '' )
		{
			$errors[] = 'Введите url';
		}


		if ( empty($errors) )
		{
			$hash = md5(time());
			$url = R::dispense('urls');
			$url->url_adress = $data['url'];
			$url->hash = $hash;
			R::store($url);
			echo "<div class='uk-alert uk-alert-success'>Ваша короткая ссылка:<br><input class='uk-input' type='text' value='http://".$_SERVER['SERVER_NAME']."/go/to/".$url['hash']."'></div>";
		}else
		{
			echo '<div class="uk-alert uk-alert-warning">' .array_shift($errors). '<a href="" class="uk-alert-close uk-close"></a></div>';
		}
	}

	?>
