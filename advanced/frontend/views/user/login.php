<div　class="person-information">
	<div class="login-title">
		<h2>个人信息管理</h2>
		<label class="time-label" id="time_label"></label>
	</div>
	<div class="login-div">
		<form action="/user/log" method="post">
		<?php $cookies = Yii::$app->request->cookies; if (isset($cookies['name'])) { 
			/*$user = explode(',', $cookies['user']->value);*/
			?>
			<div class="name">
				<label>Username:</label>
				<input type="text" name="name" value="<?=$cookies['name'];?>">
			</div>
			<div class="password">
				<label>Password:</label>
				<input type="password" name="password" value="<?=$cookies['password'];?>">
			</div>
		<?php } else { ?>
			<div class="name">
				<label>Username:</label>
				<input type="text" name="name" value="">
			</div>
			<div class="password">
				<label>Password:</label>
				<input type="password" name="password" value="">
			</div>
	   <?php } ?>
			<div class="message">
				<?php if (!empty($message)) {?>
					<label><?=$message?></label>
				<?php }?>
			</div>
			<div class="remember-password">
				<input type="checkbox" name="checkbox" value="checked">rememberMe?&nbsp;&nbsp;
				<a href="/user/to-forget">forgetMe?</a>
			</div>
			<div class="submit">
				<input type="submit" name="submit" value="Login">
			</div>
			<div class="register">
				<a href="/user/to-register">no register?</a>
			</div>
			<input type="hidden"
                name="<?= \Yii::$app->request->csrfParam; ?>"
                value="<?= \Yii::$app->request->getCsrfToken();?>">
		</form>
	</div>
</div>