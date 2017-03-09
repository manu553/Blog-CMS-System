<?php

if (isset($_POST['create_user'])) 
{
	$username = escape($_POST['username']);
	$user_password = escape($_POST['user_password']);
	$user_firstname = escape($_POST['user_firstname']);
	$user_lastname = escape($_POST['user_lastname']);
	$user_email = escape($_POST['user_email']);
	$user_role = escape($_POST['user_role']);

	/*
	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];

	$post_date = date('d-m-y');

	move_uploaded_file($post_image_temp, "../images/$post_image");
	*/

	$query = "INSERT INTO users(username, user_password, user_firstname,
				user_lastname, user_email, user_role)
				VALUES ('{$username}', '{$user_password}', '{$user_firstname}',
				'{$user_lastname}', '{$user_email}', '{$user_role}')";

	$create_post_query = mysqli_query($connection, $query);

	confirmQuery($create_post_query);
	header('Location: ./users.php');
}


?>



<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="author">Username</label>
		<input class="form-control" type="text" name="username">
	</div>

	<div class="form-group">
		<label for="image">Password</label>
		<input class="form-control" type="password" name="user_password">
	</div>
	<div class="form-group">
		<label for="title">First Name</label>
		<input class="form-control" type="text" name="user_firstname">
	</div>
	<div class="form-group">
		<label for="status">Last Name</label>
		<input class="form-control" type="text" name="user_lastname">
	</div>
	<div class="form-group">
		<label for="status">Email</label>
		<input class="form-control" type="email" name="user_email">
	</div>	
	<div class="form-group">
		<label for="cat_id">User role</label>
		<select class="form-control" name="user_role">
			<option value="admin">Admin</option>
			<option value="subscriber">Subscriber</option>
		</select>

	</div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_user" value="Create User">
	</div>
</form>