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
                }

                $query = "SELECT * FROM posts WHERE post_id = $selected_post";
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
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

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

                    $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES ($selected_post, '{$author}', '{$email}', '{$content}', 'Unapproved', now())";

                    $new_comment_query = mysqli_query($connection, $query);

                    if(!$new_comment_query)
                    {
                        die("Query failed" . mysqli_error($connection));
                    }

                    $query =    "UPDATE posts SET post_comment_count = post_comment_count + 1
                                WHERE post_id = {$selected_post}";

                    $update_comment_count = mysqli_query($connection, $query);
                    
                }

                ?>



                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="Author">Author:</label>
                            <input class="form-control" type="text" name="comment_author">
                        </div>
                        <div class="form-group">
                            <label for="Email">Email:</label>
                            <input class="form-control" type="email" name="comment_email">
                        </div>
                        <div class="form-group">
                            <label for="Comment">Comment:</label>
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php

                $query =   "SELECT * FROM comments WHERE comment_post_id = {$selected_post} AND comment_status= 'Approved' ORDER BY comment_id DESC ";
                $comment_fetch_query = mysqli_query($connection, $query);

                if(!$comment_fetch_query)
                {
                    die("Query failed! " . mysqli_error($connection));
                }

                while ($rows = mysqli_fetch_assoc($comment_fetch_query)) 
                {
                    $comment_author = $rows['comment_author'];
                    $comment_content = $rows['comment_content'];
                    $comment_email = $rows['comment_email'];
                    $comment_date = $rows['comment_date'];

                ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author ?>
                            <small><?php echo $comment_date ?></small>
                        </h4>
                        <?php echo $comment_content ?>
                    </div>
                </div>
                
                <?php

                } // end while

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