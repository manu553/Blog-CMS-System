<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>In Response to</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Date</th>
            <th>Status</th>
            <th>Approve</th>
            <th>Unapproved</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

    <?php
        $query = "SELECT * FROM comments";
        $comments_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($comments_query))
        {
            $comment_id = $row['comment_id'];
            $comment_author = $row['comment_author'];
            $comment_post_id = $row['comment_post_id'];
            $comment_email = $row['comment_email'];
            $comment_content = $row['comment_content'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];

            $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id}";
            $posts_query_id = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($posts_query_id))
            {
                $post_title = $row['post_title'];
            }

            echo "<tr>";
            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_author}</td>";
            echo "<td><a href='../post.php?p_id={$comment_post_id}'>{$post_title}</a></td>";
            echo "<td>{$comment_content}</td>";
            echo "<td>{$comment_email}</td>";
            echo "<td>{$comment_date}</td>";
            echo "<td>{$comment_status}</td>";
            echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
            echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
            echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
            echo "</tr>";
        }
    ?>
    </tbody>
</table>

<?php

if(isset($_GET['approve']))
{
    $comment_id = $_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = $comment_id";
    $unapprove_comment_query = mysqli_query($connection, $query);

    confirmQuery($unapprove_comment_query);

    header("Location: comments.php");
}

if(isset($_GET['unapprove']))
{
    $comment_id = $_GET['unapprove'];
    $query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = $comment_id";
    $unapprove_comment_query = mysqli_query($connection, $query);

    confirmQuery($unapprove_comment_query);

    header("Location: comments.php");
}

if(isset($_GET['delete']))
{
    $comment_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$comment_id}";
    $delete_query = mysqli_query($connection, $query);

    confirmQuery($delete_query);

    header("Location: comments.php");
}

?>