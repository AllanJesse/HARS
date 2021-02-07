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
                            WELCOME DashBoard
                            <small>Author</small>
                        </h1>

                        <?php
                        if(isset($_POST['submit'])){
                            $cat_title = $_POST['cat_title'];
                            if($cat_title == "" || empty($cat_title)){
                                echo "The field can't be empty";
                            }else{
                                $query = "INSERT INTO categories(cat_title) ";
                                $query .= "VALUE('{$cat_title}') ";

                                $create_category_query = mysqli_query($connection, $query);

                                if(!$create_category_query){
                                    die("QUERY FAILED" . mysqli_error($connection));
                                }
                            }
                        }
                        ?>
  
                        <div class="col-xs-6">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for = "cat-title">Add Category</label>
                                <input class = "form-control" type ="text" name = "cat_title">
                            </div>
                            <div class="form-group">
                                <input class ="btn btn-primary" type ="submit" name = "submit" value = "Add Category">
                            </div>
                        </form>

                        <?php
                        if(isset($_GET['edit'])){
                           $cat_id = $_GET['edit'];

                           include "includes/update_categories.php";
                        }
                        ?>
                     
                        </div>
                        <!-- Add category form -->
                        <div class="col-xs-6">
               
                        <table class = "table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php //find all category Query
                            $query = "SELECT * FROM categories";
                            $select_categories = mysqli_query($connection, $query);
                                while($row = mysqli_fetch_assoc($select_categories)){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
            
                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                    echo "</tr>";
                                }
                                ?>

                                <?php //delete query
                                if(isset($_GET['delete'])){
                                    $the_cat_id = $_GET['delete'];
                                    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
                                    $delete_query = mysqli_query($connection, $query);
                                    if(!$delete_query){
                                        die("QUERY FAILED" . mysqli_error($connection));
                                    }
                                    header("Location: categories.php");
                                }
                                ?>
                          
                            </tr>
                            </tbody>
                        </table>
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php
include "includes/admin_footer.php";
?>