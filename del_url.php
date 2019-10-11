<?php
	require 'db.php';

	$data = $_POST;
	if ( isset($data['del_id']) )
	{
		$errors = array();
		if ( trim($data['del_id']) == '' )
		{
			$errors[] = 'Нечего удалять!';
		}


		if ( empty($errors) )
		{
			$id = $data['del_id'];
			$url = R::load('urls', $id);
			R::trash($url);
			echo "<div class='uk-alert uk-alert-success'>Ссылка успешно удалена!</div>";
		}else
		{
			echo '<div class="uk-alert uk-alert-warning">Ссылку удалть не удалось!</div>';
		}
	}
?>
