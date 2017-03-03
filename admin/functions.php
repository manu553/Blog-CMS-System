<?php

function users_online()
{
	global $connection;
	$session = session_id();
    $time = time();
    $time_out_in_seconds = 60;
    $time_out = $time - $time_out_in_seconds;

    $query = "SELECT * FROM user_online WHERE session = '$session'";
    $session_query = mysqli_query($connection, $query);
    $count = mysqli_num_rows($session_query);

    if($count == NULL)
    {
        mysqli_query($connection, "INSERT INTO user_online(session, time) VALUES('$session', '$time')");
    } else {
        mysqli_query($connection, "UPDATE user_online SET time = '$time' WHERE session = '$session'");
    }

    $users_online_query = mysqli_query($connection, "SELECT * FROM user_online WHERE time > '$time_out'");

    return $count_users = mysqli_num_rows($users_online_query);
}

function confirmQuery($query)
{
	global $connection;
	if(!$query)
	{
		die("Query Failed! " . mysqli_error($connection));
	}
}

function insert_categories()
{
	global $connection;
	if(isset($_POST['submit']))
	{
	    $cat_title = $_POST['cat_title'];

	    if($cat_title == "" || empty($cat_title))
	    {
	        echo "This field cannot be empty";
	    } else {
	        $query =    "INSERT INTO categories(cat_title)
	                    VALUES('{$cat_title}')";
	        $new_cat_query = mysqli_query($connection, $query);

	        if(!$new_cat_query)
	        {
	            die('QUERY FAILED' . mysqli_error($connection));
	        }
	    }
	}
}

function findAllCategories()
{
	global $connection;
	$query = "SELECT * FROM categories";
	$categories_query = mysqli_query($connection, $query);

	while ($row = mysqli_fetch_assoc($categories_query))
	{
	    $cat_id = $row['cat_id'];
	    $cat_title = $row['cat_title'];
	    echo "<tr>";
	    echo "<td>{$cat_id}</td>";
	    echo "<td>{$cat_title}</td>";
	    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
	    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
	    echo "</tr>";
	}

}

function deleteCategory()
{
	global $connection;

	if(isset($_GET['delete']))
	{
	    $get_cat_id = $_GET['delete'];
	    $query = "DELETE FROM categories WHERE cat_id = {$get_cat_id}";
	    $delete_query = mysqli_query($connection, $query);
	    header("Location: categories.php");
	}
}

?>