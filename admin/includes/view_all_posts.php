<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Post ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
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
            $post_status = $row['post_status'];

            $query = "SELECT * FROM categories WHERE cat_id = {$post_cat_id}";
            $categories_query_id = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($categories_query_id))
            {
                $cat_title = $row['cat_title'];
            }

            echo "<tr>";
            echo "<td>{$post_id}</td>";
            echo "<td>{$post_author}</td>";
            echo "<td>{$post_title}</td>";

            echo "<td>{$cat_title}</td>";


            echo "<td>{$post_status}</td>";
            echo "<td><img width='50' height='50' src='../images/$post_image' alt='image'></td>";
            echo "<td>{$post_tags}</td>";
            echo "<td>{$post_comment_count}</td>";
            echo "<td>{$post_date}</td>";
            echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
            echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
            echo "</tr>";
        }
    ?>
    </tbody>
</table>

<?php

if(isset($_GET['delete']))
{
    $post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = {$post_id}";
    $delete_query = mysqli_query($connection, $query);

    confirmQuery($delete_query);

    header("Location: posts.php");
}

?>