<?php
	require 'db.php';

	$data = $_POST;

	function captcha_show(){
		$questions = array(
			1 => '1+3',
			2 => '75-5',
			3 => '2 + 3',
			4 => '15 + 14',
			5 => '45 - 10',
			6 => '33 - 3'
		);
		$num = mt_rand( 1, count($questions) );
		$_SESSION['captcha'] = $num;
		echo $questions[$num];
	}

	if ( isset($data['do_signup']) )
	{
		$errors = array();
		if ( trim($data['login']) == '' )
		{
			$errors[] = 'Введите логин';
		}

		if ( trim($data['email']) == '' )
		{
			$errors[] = 'Введите Email';
		}

		if ( $data['password'] == '' )
		{
			$errors[] = 'Введите пароль';
		}

		if ( $data['password_2'] != $data['password'] )
		{
			$errors[] = 'Повторный пароль введен не верно!';
		}

		if ( R::count('users', "login = ?", array($data['login'])) > 0)
		{
			$errors[] = 'Пользователь с таким логином уже существует!';
		}

		if ( R::count('users', "email = ?", array($data['email'])) > 0)
		{
			$errors[] = 'Пользователь с таким Email уже существует!';
		}

		$answers = array(
			1 => '4',
			2 => '70',
			3 => '5',
			4 => '29',
			5 => '35',
			6 => '30'
		);
		if ( $_SESSION['captcha'] != array_search( mb_strtolower($_POST['captcha']), $answers ) )
		{
			$errors[] = 'Ответ на вопрос указан не верно!';
		}


		if ( empty($errors) )
		{
			$user = R::dispense('users');
			$user->login = $data['login'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			R::store($user);
			echo '<div style="color:dreen;">Вы успешно зарегистрированы!</div><hr>';
		}else
		{
			echo '<div id="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
		}

	}

?>
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

<form action="/signup.php" method="POST">
	<div class="uk-margin">
	<strong>Ваш логин</strong>
	<input class="uk-input"  type="text" name="login" value="<?php echo @$data['login']; ?>"><br/>
	</div>

	<div class="uk-margin">
	<strong>Ваш Email</strong>
	<input class="uk-input"  type="email" name="email" value="<?php echo @$data['email']; ?>"><br/>
	</div>

	<div class="uk-margin">
	<strong>Ваш пароль</strong>
	<input class="uk-input"  type="password" name="password" value="<?php echo @$data['password']; ?>"><br/>
	</div>

	<div class="uk-margin">
	<strong>Повторите пароль</strong>
	<input class="uk-input"  type="password" name="password_2" value="<?php echo @$data['password_2']; ?>"><br/>
	</div>

	<div class="uk-margin">
	<strong><?php captcha_show(); ?></strong>
	<input class="uk-input"  type="text" name="captcha" ><br/>
</div>

	<div class="uk-margin">
	<button class="uk-button uk-button-default uk-modal-close" type="submit" name="do_signup">Регистрация</button>
	</div>
</form>
</div>
</div>
</body>
</html>
