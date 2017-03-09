<?php

if(isset($_GET['p_id']))
{
	$post_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = {$post_id}";
$posts_query_by_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($posts_query_by_id))
{
    $post_cat_id = $row['post_cat_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_status = $row['post_status'];
}

if(isset($_POST['create_post']))
{
	$post_cat_id = escape($_POST['categories']);
	$post_title = escape($_POST['title']);
	$post_author = escape($_POST['author']);
	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];
	$post_content = escape($_POST['content']);
	$post_tags = escape($_POST['tags']);
	$post_status = escape($_POST['status']);

	move_uploaded_file($post_image_temp, "../images/$post_image");

	// if no new image is selected when updating, the old image won't be erased.
	if(empty($post_image))
	{
		$query = "SELECT * FROM posts WHERE post_id = $post_id";
		$select_image = mysqli_query($connection, $query);

		while ($row = mysqli_fetch_assoc($select_image)) 
		{
			$post_image = $row['post_image'];
		}
	}

	$query = "UPDATE posts SET ";
	$query .="post_title = '{$post_title}', ";
	$query .="post_cat_id = '{$post_cat_id}', ";
	$query .="post_date = now(), ";
	$query .="post_author = '{$post_author}', ";
	$query .="post_status = '{$post_status}', ";
	$query .="post_tags = '{$post_tags}', ";
	$query .="post_content = '{$post_content}', ";
	$query .="post_image = '{$post_image}' ";
	$query .= "WHERE post_id = {$post_id}";

	$update_post = mysqli_query($connection, $query);

	confirmQuery($update_post);

	echo "<p class='bg-success'>Post Updated. <a href='../post.php?p_id={$post_id}'>View Post</a> or <a href='posts.php'>Edit More Posts</a></p>";
}

?>


<h1 class="page-header">Edit Post</h1>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input class="form-control" type="text" name="title" value="<?php echo $post_title ?>">
	</div>
	<div class="form-group">
		<label for="cat_id">Category</label>
		<select class="form-control" name="categories">
		<?php 

		$query = "SELECT * FROM categories WHERE cat_id = '{$post_cat_id}'";
		$curr_cat_query = mysqli_query($connection, $query);

		confirmQuery($curr_cat_query);

		$row = mysqli_fetch_assoc($curr_cat_query);

		$cat_title = $row['cat_title'];

		echo "<option value='$cat_id'>{$cat_title}</option>";

		$query = "SELECT * FROM categories WHERE cat_id != '{$post_cat_id}'";
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
		<input class="form-control" type="text" name="author" value="<?php echo $post_author; ?>">
	</div>
	<div class="form-group">
		<label for="post_status">Post Status</label>
		<select class="form-control" name="status">
			<option value='<?php echo $post_status ?>'><?php echo $post_status; ?></option>

			<?php

			if($post_status == "Published")
			{
				echo "<option value='Draft'>Draft</option>";
			} else {
				echo "<option value='Published'>Publish</option>";
			}

			?>
		</select>
	</div>
	<div class="form-group">
		<label for="image">Post Image</label><br>
		<img width="50" height="50" src="../images/<?php echo $post_image; ?>"><br><br>
		<input class="form-control" type="file" name="image">
	</div>
	<div class="form-group">
		<label for="tags">Post Tags</label>
		<input class="form-control" type="text" name="tags" value="<?php echo $post_tags ?>">
	</div>
	<div class="form-group">
		<label for="content">Post Content</label>
		<textarea class="form-control" type="text" cols='30' rows='10' name="content" ><?php echo $post_content ?></textarea>
	</div>
	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="create_post" value="Save Changes">
	</div>
</form>