<div　class="person-information">
	<div class="register-title">
		<h2>注册</h2>
		<a href="/user/login">返回</a>
	</div>
	<div class="register-div">
		<form action="/user/register" method="post">
			<div><?php ?></div>
			<div class="name">
				<span><?php if(!empty($message['name'])) { echo $message['name'][0];} ?></span><br>
				<label>Input Username:</label>
				<input type="text" name="name" value="">
			</div>
			<div class="password">
				<span><?php if(!empty($message['password'])) {echo $message['password'][0];} ?></span><br>
				<label>Input Password:</label>
				<input type="password" name="input_password" value="">
			</div>
			
			<div class="confirm-password">
				<span><?php if(!empty($confirm_password)) {echo $confirm_password;} ?></span><br>
				<label>Confirm Password:</label>
				<input type="password" name="confirm_password" value="">
				
			</div>
			<div class="email">
				<span><?php if(!empty($message['email'])) {echo $message['email'][0];} ?></span><br>
				<label>Email:</label>
				<input type="text" name="email" value="">
			</div>

			<div class="register">
				<input type="submit" name="submit" value="Register" class="submit">
				<input type="reset" name="reset" value="Reset">
			</div>
			
			<input type="hidden"
                name="<?= \Yii::$app->request->csrfParam; ?>"
                value="<?= \Yii::$app->request->getCsrfToken();?>">
		</form>
	</div>
</div>