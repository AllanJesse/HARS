<?php
include "includes/admin_header.php";
?>

    <div id="wrapper">

        <!-- Navigation -->
<?php
include "includes/admin_nav.php";
?>

<?php
if(isset($_SESSION['uname'])){
    $uname = $_SESSION['uname'];

    $query = "SELECT * FROM users WHERE uname = '{$uname}' ";

    $select_user_profile_query = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($select_user_profile_query)){
        $id = $row['id'];
        $uname = $row['uname'];
        $fname = $row['fname'];
        $user_lastname = $row['user_lastname'];
        $pass = $row['pass'];
        $email = $row['email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
    }

}
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
                        <?php

if(isset($_GET['edit_user'])){
    $the_user_id = $_GET['edit_user'];

    $query = "SELECT * FROM users WHERE id = $the_user_id ";
    $select_users_query = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($select_users_query)) {
            $user_id = $row['id'];
            $username = $row['uname'];
            $user_password = $row['pass'];
            $user_firstname = $row['fname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
        } 
}

if(isset($_POST['create_user'])) {

    $uname = $_POST['uname'];
    $user_firstname = $_POST['fname'];
    
    $user_lastname = $_POST['user_lastname'];

    // $post_image = $_FILES['image']['name'];
    // $post_image_temp = $_FILES['image']['tmp_name'];

    
    $user_email = $_POST['email'];
    $user_role = $_POST['user_role'];
    $pass = $_POST['pass'];
    

    // move_uploaded_file($post_image_temp, "../assets/img/$post_image" );
    
            $query = "UPDATE users SET ";
            $query .= "fname = '{$user_firstname}', ";
           
            $query .= "user_lastname = '{$user_lastname}', ";
            $query .= "uname = '{$username}', ";
            $query .= "pass = '{$user_password}', ";
            $query .= "email = '{$user_email}', ";
            $query .= "user_image = '{$user_image}', ";
            $query .= "user_role = '{$user_role}' ";
            $query .= "WHERE id = {$the_user_id} ";

            $edit_user_query = mysqli_query($conn, $query);
            if(!$edit_user_query){
                die("QUERY FAILED" . mysqli_error($conn));
            }
}
?>
<form action ="" method = "post" enctype = "multipart/form-data">

<div class="form-group">
<label for = "title">First Name</label>
<input type = "text" value="<?php echo $fname; ?>" class = "form-control" name = "fname">
</div>

<div class="form-group">
<label for = "title">Last Name</label>
<input type = "text" value="<?php echo $user_lastname; ?>" class = "form-control" name = "user_lastname">
</div>

<div class="form-group">
<label for = "title">User Name</label>
<input type = "text" class = "form-control" value="<?php echo $uname; ?>" name = "uname">
</div>

<div class="form-group">
<label for = "title">Email</label>
<input type = "email" value="<?php echo $email; ?>" class = "form-control" name = "email">
</div>

<!-- <div class="form-group">
<label for = "title">User Image</label>
<input type = "file" name = "image">
</div> -->

<div class="form-group">
<label for = "title">Select User Role</label>
<br>
<select name="user_role" id="">
<option value="customer"><?php echo $user_role; ?></option>

<?php
if($user_role == 'admin'){
    
    echo "<option value='customer'>Customer</option>";
}else{
    echo "<option value='admin'>Admin</option>";
}
?>

</select>
</div>

<div class="form-group">
<label for = "title">Password</label>
<input type = "password" value="<?php echo $pass; ?>" class = "form-control" name = "pass">
</div>

<div class="form-group">
<input type = "submit" class = "btn btn-primary" name = "edit_user" value = "Update Profile">
</div>

</form>
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