<?php

include "includes/header.php";

?>
    <!-- Navigation -->
    <?php

    include "includes/nav.php";

    ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php

                if(isset($_GET['p_id']))
                {
                    $selected_post = $_GET['p_id'];
                    $post_author = $_GET['author'];
                }

                $query = "SELECT * FROM posts WHERE post_author = '{$post_author}' AND post_status != 'Draft'";
                $posts_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($posts_query)) 
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

                ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>

                <hr>

                <?php 
                } // ends while loops for posts
                ?>

                <?php

                if(isset($_POST['create_comment']))
                {

                    $selected_post = $_GET['p_id'];
                    $author = $_POST['comment_author'];
                    $email = $_POST['comment_email'];
                    $content = $_POST['comment_content'];

                    if(!empty($author) && !empty($email) && !empty($content))
                    {
                        $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES ($selected_post, '{$author}', '{$email}', '{$content}', 'Unapproved', now())";

                        $new_comment_query = mysqli_query($connection, $query);

                        if(!$new_comment_query)
                        {
                            die("Query failed" . mysqli_error($connection));
                        }

                        $query =    "UPDATE posts SET post_comment_count = post_comment_count + 1
                                    WHERE post_id = {$selected_post}";

                        $update_comment_count = mysqli_query($connection, $query);     
                    } else {
                        echo "<script>alert('Fields cannot be empty')</script>";
                    }
                }
                ?>                
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php

            include "includes/sidebar.php";

            ?>

        </div>
        <!-- /.row -->

        <hr>

<?php

include "includes/footer.php";

?>