<div　class="person-information">
	<div class="login-title">
		<h2>个人信息管理</h2>
		<label class="time-label" id="time_label"></label>
	</div>
	<div class="forget-div">
		<form action="/user/forget" method="post">
			<div class="forget-message">请输入你的有效邮箱，方便找回密码</div>
			<div class="email">Email :<input type="text" name="email"></div>
			<div class="forget"><input type="submit" name="submit" value="Send"></div>
			<input type="hidden"
                name="<?= \Yii::$app->request->csrfParam; ?>"
                value="<?= \Yii::$app->request->getCsrfToken();?>">
		</form>
		<div class="message"><?php if (!empty($message)) {echo $message;} ?></div> 
	</div>
</div>


