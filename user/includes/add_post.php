<?php

if(isset($_POST['create_post'])) {

    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    

    move_uploaded_file($post_image_temp, "../assets/img/$post_image" );
    
    $query = "INSERT INTO posts(post_title, post_author, post_date, post_image, post_content, post_status) ";
    $query .="VALUES('{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_status}')";
    $create_post_query = mysqli_query($conn, $query);

    if(!$create_post_query){
        die("QUERY FAILED" . mysqli_error($conn));
    }
}
?>
<form action ="" method = "post" enctype = "multipart/form-data">

<div class="form-group">
<label for = "title">Post Title</label>
<input type = "text" class = "form-control" name = "title">
</div>

<div class="form-group">
<label for = "title">Post Author</label>
<input type = "text" class = "form-control" name = "author">
</div>

<div class="form-group">
<label for = "title">Post Status</label>
<input type = "text" class = "form-control" name = "post_status">
</div>

<div class="form-group">
<label for = "title">Post Image</label>
<input type = "file" name = "image">
</div>

<div class="form-group">
<label for = "title">Post Content</label>
<textarea class = "form-control" name = "post_content" id="" cols = "30" rows = "10">
</textarea>
</div>

<div class="form-group">
<input type = "submit" class = "btn btn-primary" name = "create_post" value = "Publish Post">
</div>

</form>