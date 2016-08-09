<div class="person-information">
	<div class="title">
		<h2>个人信息管理</h2> -> 
		<font color="blue">修改信息</font>
		<label class="time-label" id="time_label"></label>
		<a href="/person/all">返回</a>
	</div>
	<div class="update-div">
		<img src="/<?php echo $person['imageFile'] ?>" class="image" >
		<a href="javascript:void(0)" onclick="display_file()" class="update-image">修改头像</a>
		<form class="update-form" method="post" action="/person/update" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?=$person['_id']?>">
			<input type="hidden" name="hidden-imageFile" value="<?=$person['imageFile'] ?>">
			<div class="file">
				<input type="file" name="imageFile" style="display:none" id="file">
			</div>
			<div class="name">
				<label>Name : </label><input type="text" name="name" value="<?=$person['name']?>">
			</div>
			<div class="gender">
				<label>Gender : </label>
				<input type="radio" name="gender" class="gender-one" value="male" <?php echo $person['gender'] == 'male' ? 'checked':''; ?>> male
				<input type="radio" name="gender" class="gender-two" value="female" <?php echo $person['gender'] == 'female' ? 'checked':''; ?>> female
			</div>
			<div class="age">
				<label>Age : </label><input type="text" name="age" value="<?=$person['age']?>">
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
</div>