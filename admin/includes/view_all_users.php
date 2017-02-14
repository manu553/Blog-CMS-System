<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Admin?</th>
            <th>Subscriber?</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

    <?php
        $query = "SELECT * FROM users";
        $users_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($users_query))
        {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];

            /*
            $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id}";
            $posts_query_id = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($posts_query_id))
            {
                $post_title = $row['post_title'];
            }
            */

            echo "<tr>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$username}</td>";
            echo "<td>{$user_firstname}</td>";
            echo "<td>{$user_lastname}</td>";
            echo "<td>{$user_email}</td>";
            echo "<td>{$user_role}</td>";

            echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
            echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
            echo "<td><a href='users.php?source=edit_user&p_id={$user_id}'>Edit</a></td>";
            echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
            echo "</tr>";
        }
    ?>
    </tbody>
</table>

<?php

if(isset($_GET['change_to_admin']))
{
    $user_id = $_GET['change_to_admin'];
    $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = $user_id";
    $admin_query = mysqli_query($connection, $query);

    confirmQuery($admin_query);

    header("Location: users.php");
}

if(isset($_GET['change_to_sub']))
{
    $user_id = $_GET['change_to_sub'];
    $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $user_id";
    $sub_query = mysqli_query($connection, $query);

    confirmQuery($sub_query);

    header("Location: users.php");
}

if(isset($_GET['delete']))
{
    $comment_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = {$user_id}";
    $delete_query = mysqli_query($connection, $query);

    confirmQuery($delete_query);

    header("Location: users.php");
}

?>