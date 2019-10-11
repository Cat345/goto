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
	<div class="uk-container">


<div class="uk-flex uk-flex-center uk-margin-xlarge-top">
	<form>
		<div class="uk-margin">
         <input name="url"id="url" class="uk-input uk-form-width-large" type="text" placeholder="Введите адрес ссылки. Например: https://yandex.ru"><a class="uk-button uk-button-primary" href="javascript:void(0)" onclick="geturl()">Сократить</a>
				 <progress id="js-progressbar" class="uk-progress" value="0" max="100" style="display:none"></progress>



     </div>
		 <div class="uk-margin"> <div id="result"> </div></div>
</form>

</div>

	</div>
    </body>
</html>
