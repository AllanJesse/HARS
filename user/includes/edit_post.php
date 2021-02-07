<?php
if(isset($_GET['p_id'])){
    $the_post_id = $_GET['p_id'];
}
$query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
  $select_posts_by_id = mysqli_query($conn, $query);
      while($row = mysqli_fetch_assoc($select_posts_by_id)){

            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_image = $row['post_image']; 
            $post_status = $row['post_status'];   
            $post_content = $row['post_content'];
            $post_date = $row['post_date'];
        }

        if(isset($_POST['update_post'])){

            $post_author = $_POST['post_author'];
            $post_title = $_POST['post_title'];
            $post_status = $_POST['post_status'];
            $post_image = $_FILES['image']['name'];
            $post_image_temp = $_FILES['image']['tmp_name'];          
            $post_content = $_POST['post_content'];

            move_uploaded_file($post_image_temp, "../assets/img/$post_image" );

            if(empty($post_image)){
                $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
                $select_image = mysqli_query($conn, $query);

                while($row = mysqli_fetch_array($select_image)){
                    $post_image = $row['post_image'];
                }
            }

            $query = "UPDATE posts SET ";
            $query .= "post_title = '{$post_title}', ";
            $query .= "post_date = now(), ";
            $query .= "post_author = '{$post_author}', ";
            $query .= "post_status = '{$post_status}', ";
            $query .= "post_content = '{$post_content}', ";
            $query .= "post_image = '{$post_image}', ";
            $query .= "WHERE post_id = '{$the_post_id}' ";

            $update_post = mysqli_query($conn, $query);
            // if(!$update_post){
            //     die("QUERY FAILED" . mysqli_error($conn));
            // }
        }

        
?>

<form action ="" method = "post" enctype = "multipart/form-data">

<div class="form-group">
<label for = "title">Post Title</label>
<input type = "text" value = "<?php echo $post_title; ?>" class = "form-control" name = "post_title">
</div>

<div class="form-group">
<label for = "title">Post Author</label>
<input type = "text" value = "<?php echo $post_author; ?>" class = "form-control" name = "post_author">
</div>

<div class="form-group">
<label for = "title">Post Status</label>
<input type = "text" value = "<?php echo $post_status; ?>" class = "form-control" name = "post_status">
</div>

<div class="form-group">
<img width = "100" src = "../assets/img/<?php echo $post_image; ?>" alt = "">
<input type = "file" name = "image">
</div>

<div class="form-group">
<label for = "title">Post Content</label>
<textarea class = "form-control" name = "post_content" id="" cols = "30" rows = "10"><?php echo $post_content; ?>
</textarea>
</div>

<div class="form-group">
<input type = "submit" class = "btn btn-primary" name = "update_post" value = "Publish Post">
</div>

</form>