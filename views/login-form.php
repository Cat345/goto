<?php if ( isset ($_SESSION['logged_user']) ) : ?>
<?php else : ?>



	<div id="modal-example" uk-modal>
	    <div class="uk-modal-dialog uk-modal-body">
				<form action="login.php" method="POST">
					 <div class="uk-margin">
			<div class="uk-inline">
					 <span class="uk-form-icon" uk-icon="icon: user"></span>
					<input type="text" name="login" value="<?php echo @$data['login']; ?>" class="uk-input" placeholder="Логин"><br/>
			 </div> </div>
			 <div class="uk-margin">
				 <div class="uk-inline">
										 <span class="uk-form-icon " uk-icon="icon: lock"></span>
					<input type="password" name="password" value="<?php echo @$data['password']; ?>" class="uk-input" placeholder="Пароль"><br/>
					 </div>
						</div>
			<div class="uk-margin">
					<button type="submit" name="do_login" class="uk-button uk-button-primary">Войти</button>
			 </div>
				</form>
	        <p class="uk-text-right">
	            <button class="uk-button uk-button-default uk-modal-close" type="button">Закрыть</button>
	        </p>
	    </div>
	</div>

<?php endif; ?>
