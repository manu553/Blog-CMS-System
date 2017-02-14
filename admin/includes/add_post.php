<?php

if (isset($_POST['create_post'])) 
{
	$post_title = $_POST['title'];
	$post_cat_id = $_POST['categories'];
	$post_author = $_POST['author'];
	$post_content = $_POST['content'];
	$post_tags = $_POST['tags'];
	$post_status = $_POST['status'];

	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];

	$post_date = date('d-m-y');

	move_uploaded_file($post_image_temp, "../images/$post_image");

	$query = 	"INSERT INTO posts(post_cat_id, post_title, post_author,
				post_date, post_image, post_content, post_tags,
				post_status)
				VALUES ('{$post_cat_id}', '{$post_title}', '{$post_author}',
				now(), '{$post_image}', '{$post_content}', '{$post_tags}',
				'{$post_status}')";

	$create_post_query = mysqli_query($connection, $query);

	confirmQuery($create_post_query);
}


?>



<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input class="form-control" type="text" name="title">
	</div>
	<div class="form-group">
		<label for="cat_id">Post Category ID</label>
		<select class="form-control" name="categories">
		<?php 
		$query = "SELECT * FROM categories";
		$categories_query = mysqli_query($connection, $query);

		confirmQuery($categories_query);

		while ($row = mysqli_fetch_assoc($categories_query))
		{
		    $cat_id = $row['cat_id'];
		    $cat_title = $row['cat_title'];

		    echo "<option value='$cat_id'>{$cat_title}</option>";
		}
		?>
		</select>
	</div>
	<div class="form-group">
		<label for="author">Post Author</label>
		<input class="form-control" type="text" name="author">
	</div>
	<div class="form-group">
		<label for="status">Post Status</label>
		<input class="form-control" type="text" name="status">
	</div>	
	<div class="form-group">
		<label for="image">Post Image</label>
		<input type="file" name="image">
	</div>
	<div class="form-group">
		<label for="tags">Post Tags</label>
		<input class="form-control" type="text" name="tags">
	</div>
	<div class="form-group">
		<label for="content">Post Content</label>
		<textarea class="form-control" type="text" cols='30' rows='10' name="content"></textarea>
	</div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
	</div>
</form>