<?php include "includes/admin_header.php" ?>

<?php

if(isset($_SESSION['username']))
{
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $user_data = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($user_data))
    {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
    }
}

if (isset($_POST['update_profile'])) 
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

    $query = "UPDATE users SET username = '{$username}', user_password = '{$user_password}', user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', user_email = '{$user_email}', user_role = '{$user_role}' WHERE username = '{$username}'";

    $create_post_query = mysqli_query($connection, $query);

    confirmQuery($create_post_query);

    header('Location: index.php');
}

?>

    <div id="wrapper">
        <!-- Navigation -->
        <?php include "includes/admin_nav.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to the Admin Page!
                            <small>Author</small>
                        </h1>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="author">Username</label>
                                <input class="form-control" type="text" name="username" value="<?php echo $username; ?>">
                            </div>

                            <div class="form-group">
                                <label for="image">Password</label>
                                <input class="form-control" type="password" name="user_password" value="<?php echo $user_password; ?>">
                            </div>
                            <div class="form-group">
                                <label for="title">First Name</label>
                                <input class="form-control" type="text" name="user_firstname" value="<?php echo $user_firstname; ?>">
                            </div>
                            <div class="form-group">
                                <label for="status">Last Name</label>
                                <input class="form-control" type="text" name="user_lastname" value="<?php echo $user_lastname; ?>">
                            </div>
                            <div class="form-group">
                                <label for="status">Email</label>
                                <input class="form-control" type="email" name="user_email" value="<?php echo $user_email; ?>">
                            </div>  
                            <div class="form-group">
                                <label for="cat_id">User role</label>
                                <select class="form-control" name="user_role">
                                    <option value="admin">Admin</option>
                                    <option value="subscriber">Subscriber</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update_profile" value="Update Profile">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>
