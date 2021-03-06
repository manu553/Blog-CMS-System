<?php include "includes/db.php"; ?>
<?php session_start(); ?>



<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Bloggerz</a>
            </div>


            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                    <?php

                    if(isset($_SESSION['userrole']))
                    {
                        if($_SESSION['userrole'] == "Admin")
                        {
                            if(isset($_GET['p_id']))
                            {
                                $post_id = $_GET['p_id'];
                                echo "<li><a href='admin/posts.php?source=edit_post&p_id={$post_id}'>Edit Post</a></li>";
                            }
                        }
                    }

                    ?>
                    <li><a href="registration.php">Register</a></li>
                    <li><a href="">Users Online: <?php echo users_online(); ?></a>
                    </li>
                    
                </ul>
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <?php if(isset($_SESSION['username'])) { echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-user'></i> Hi {$_SESSION['username']}!"; } ?></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>