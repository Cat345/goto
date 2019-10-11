<div class="uk-navbar-container" uk-navbar>
		<div class="uk-navbar-center">
				<a href="/" class="uk-navbar-item uk-logo">Short Url</a>

<?php if ( isset ($_SESSION['logged_user']) ) : ?>
	Привет, <a href="/admin.php"><?php echo $_SESSION['logged_user']->login; ?>!<br/>
   </a>
 <div class="uk-navbar-item">	<a href="logout.php">Выйти</a>  <div class="uk-navbar-item">

<?php else : ?>
Вы не авторизованы!<br/>
<div class="uk-navbar-item"><a href="#modal-example" uk-toggle>Войти</a></div>
<?php endif; ?>
</div>
</div>
</div>
</div>
