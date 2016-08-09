<div class="person-information">
	<div class="title">
		<h2>个人信息管理</h2> -> 
		<font color="blue">添加信息</font>
		<label class="time-label" id="time_label"></label>
		<a href="/index.php?r=person/all">返回</a>
	</div>
	<div class="add-div">

		<form class="add-form" method="post" action="/person/save" id="add_form" enctype="multipart/form-data">
			<div class="image">
				<input type="file" name="imageFile" class="file">
			</div>
			<div class="name">
				<label>Name : </label><input type="text" name="name">
			</div>
			<div class="gender" id="gender">
				<label>Gender : </label><input type="radio" name="gender" class="gender-one" value="male"> male
				<input type="radio" name="gender" class="gender-two" value="female"> female
			</div>
			<div class="age" id="age">
				<label>Age : </label><input type="text" name="age">
			</div>
			
			<div class="button-div">
				<input type="submit" name="submit" value="Submit" class="submit">
				<input type="reset" name="reset" value="Reset" class="reset">
			</div>
			<!-- Yii2 Unable to verify your data submission 错误-CSRF -->
			 <input type="hidden"
                name="<?= \Yii::$app->request->csrfParam; ?>"
                value="<?= \Yii::$app->request->getCsrfToken();?>">
		</form>
	</div>
	<div class="message">
		<font><?php if (!empty($message)){echo $message;}?></font>
	</div>
</div>