<?php

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
    
    $query = "INSERT INTO users(uname, fname, user_lastname, email, user_role, pass) ";
    $query .="VALUES('{$uname}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_role}','{$pass}')";
    $create_post_query = mysqli_query($conn, $query);

    if(!$create_post_query){
        die("QUERY FAILED" . mysqli_error($conn));
    }

    echo "User Added Successful: <a href='users.php'>View All Users</a> ";


}
?>
<form action ="" method = "post" enctype = "multipart/form-data">

<div class="form-group">
<label for = "title">First Name</label>
<input type = "text" class = "form-control" name = "fname">
</div>

<div class="form-group">
<label for = "title">Last Name</label>
<input type = "text" class = "form-control" name = "user_lastname">
</div>

<div class="form-group">
<label for = "title">User Name</label>
<input type = "text" class = "form-control" name = "uname">
</div>

<div class="form-group">
<label for = "title">Email</label>
<input type = "email" class = "form-control" name = "email">
</div>

<!-- <div class="form-group">
<label for = "title">User Image</label>
<input type = "file" name = "image">
</div> -->

<div class="form-group">
<label for = "title">Select User Role</label>
<br>
<select name="user_role" id="">
<option value="customer">Select Options</option>
<option value="admin">Admin</option>
<option value="customer">Customer</option>
</select>
</div>

<div class="form-group">
<label for = "title">Password</label>
<input type = "password" class = "form-control" name = "pass">
</div>

<div class="form-group">
<input type = "submit" class = "btn btn-primary" name = "create_user" value = "Add User">
</div>

</form>