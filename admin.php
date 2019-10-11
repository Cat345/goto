<?php
	require 'db.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Short Url Servise</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/uikit.min.css" />
        <script src="assets/js/uikit.min.js"></script>
        <script src="assets/js/uikit-icons.min.js"></script>
				<script
				src="https://code.jquery.com/jquery-3.4.1.js"
				integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
				crossorigin="anonymous"></script>
				  <script src="assets/js/script.js"></script>
    </head>
    <body>
 <?php	require 'views/header.php';?>
  <?php	require 'views/login-form.php';?>
	<?php if ( isset ($_SESSION['logged_user']) ) : ?>
		<div class="uk-container">
		<div class="uk-margin"> <div id="result"> </div></div>
	<div class="uk-flex uk-flex-center uk-margin-xlarge-top">


	<table class="uk-table uk-table-divider">
    <thead>
        <tr>
            <th>Адрес</th>
            <th>Хеш</th>
            <th>Управление</th>
        </tr>
    </thead>
    <tbody>

<?php
$urls = R::findAll('urls');
$urls = R::findAll('urls', 'ORDER BY id');

foreach ($urls as $url){
	echo "<tr id='tr".$url[id]."'>
			<td>".$url[url_adress]."</td>
			<td>".$url[hash]."</td>
			<td><a href='javascript:void(0)' onclick='delete_url(".$url[id].")' uk-icon='trash'></a></td>
	</tr>";
}

?>

</tbody>
</table>
</div></div>
	<?php else : ?>
<meta http-equiv="refresh" content="0;/">
	<?php endif; ?>
    </body>
</html>
