<?php

if(isset($_POST['checkboxArray']))
{
    foreach($_POST['checkboxArray'] as $checkBoxValue)
    {
        $bulkOptions = $_POST['bulkOptions'];

        switch ($bulkOptions) 
        {
            case 'Published':
                $query = "UPDATE posts SET post_status = '{$bulkOptions}' WHERE post_id = {$checkBoxValue}";
                $update_to_published = mysqli_query($connection, $query);
                confirmQuery($update_to_published);
                break;

            case 'Draft':
                $query = "UPDATE posts SET post_status = '{$bulkOptions}' WHERE post_id = {$checkBoxValue}";
                $update_to_draft = mysqli_query($connection, $query);
                confirmQuery($update_to_draft);
                break;

            case 'Delete':
                $query = "DELETE FROM posts WHERE post_id = {$checkBoxValue}";
                $delete_post = mysqli_query($connection, $query);
                confirmQuery($delete_post);
                break;

            default:
                # code...
                break;
        }
    }
}


?>

<h1 class="page-header">Posts</h1>

<form action="" method="post">
<table class="table table-bordered table-hover">

    <div id="bulkOptionContainer" class="col-xs-4" style="padding-bottom: 15px;">
        <select class="form-control" name="bulkOptions">
            <option value="">Select Options</option>
            <option value="Published">Publish</option>
            <option value="Draft">Draft</option>
            <option value="Delete">Delete</option>
        </select>
    </div>
    <div class="col-xs-5">
        <input type="submit" name="submit" class="btn btn-success" value="Apply">
        <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
    </div>

    <thead>
        <tr>
            <th><input id="selectAllBoxes" type="checkbox" name=""></th>
            <th>Post ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Views</th>
            <th>Date</th>
            <th>View Post</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

    <?php
        $query = "SELECT * FROM posts";
        $posts_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($posts_query))
        {
            $post_id = $row['post_id'];
            $post_cat_id = $row['post_cat_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_view_count = $row['post_view_count'];
            $post_status = $row['post_status'];

            $query = "SELECT * FROM categories WHERE cat_id = {$post_cat_id}";
            $categories_query_id = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($categories_query_id))
            {
                $cat_title = $row['cat_title'];
            }

            echo "<tr>";
            ?>

            <td><input class="checkBoxes" type="checkbox" name="checkboxArray[]" value="<?php echo $post_id; ?>"></td>


            <?php
            echo "<td>{$post_id}</td>";
            echo "<td>{$post_author}</td>";
            echo "<td>{$post_title}</td>";

            echo "<td>{$cat_title}</td>";


            echo "<td>{$post_status}</td>";
            echo "<td><img width='50' height='50' src='../images/$post_image' alt='image'></td>";
            echo "<td>{$post_tags}</td>";
            echo "<td>{$post_comment_count}</td>";
            echo "<td><a href='posts.php?reset={$post_id}'>{$post_view_count}</a></td>";
            echo "<td>{$post_date}</td>";
            echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
            echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
            echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete the post(s)?'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
            echo "</tr>";
        }
    ?>
    </tbody>
</table>
</form>

<?php

if(isset($_GET['delete']))
{
    $post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = {$post_id}";
    $delete_query = mysqli_query($connection, $query);

    confirmQuery($delete_query);

    header("Location: posts.php");
}

if(isset($_GET['reset']))
{
    $post_id = $_GET['reset'];
    $query = "UPDATE posts SET post_view_count = 0 WHERE post_id = {$post_id}";
    $reset_query = mysqli_query($connection, $query);

    confirmQuery($reset_query);

    header("Location: posts.php");
}

?>