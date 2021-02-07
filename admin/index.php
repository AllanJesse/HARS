<?php
include "includes/admin_header.php";
?>

    <div id="wrapper">

        <!-- Navigation -->
<?php
include "includes/admin_nav.php";
?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                            WELCOME Admin
                            <small><?php  echo $_SESSION ['uname']; ?></small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

                       
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                        $query = "SELECT * FROM posts";
                        $select_all_post = mysqli_query($conn, $query);
                        $post_counts = mysqli_num_rows($select_all_post);

                        echo "<div class='huge'>{$post_counts}</div>";
                    ?>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                        $query = "SELECT * FROM users";
                        $select_all_users = mysqli_query($conn, $query);
                        $user_count = mysqli_num_rows($select_all_users);

                        echo "<div class='huge'>{$user_count}</div>";
                    ?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
                <?php
                
                $query = "SELECT * FROM posts WHERE post_status = 'published' ";
                $select_all_published_post = mysqli_query($conn, $query);
                $post_published_counts = mysqli_num_rows($select_all_published_post);


                $query = "SELECT * FROM posts WHERE post_status = 'draft' ";
                $select_all_draft_post = mysqli_query($conn, $query);
                $post_draft_counts = mysqli_num_rows($select_all_draft_post);


                $query = "SELECT * FROM users WHERE user_role = 'user' ";
                $select_all_users = mysqli_query($conn, $query);
                $user_counts = mysqli_num_rows($select_all_users);

                $query = "SELECT * FROM users WHERE user_role = 'admin' ";
                $select_all_admins = mysqli_query($conn, $query);
                $admin_counts = mysqli_num_rows($select_all_admins);


                ?>

                <div class="row">
                    <script type="text/javascript">
                        google.load("visualization", "1.1", {packages:["bar"]});
                        google.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Data', 'Count'],
                                <?php
                                $element_text = ['All Posts', 'Active Posts', 'Draft Posts', 'Users', 'User', 'Admin'];
                                $element_count = [$post_counts, $post_published_counts, $post_draft_counts, $user_count, $user_counts, $admin_counts];
                                
                                for($i =0; $i < 6; $i++) {

                                    echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";

                                }

                                ?>
                                // ['Posts', 1000],


                            ]);

                            var options = {
                                chart: {
                                    title: '',
                                    subtitle: '',
                                }
                            }
                            var chart = new
                            google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, options);

                        };
                    </script>
                    <div id="columnchart_material" style=" width: 'auto'; height: 500px;"></div>
                </div>

            </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php
include "includes/admin_footer.php";
?>