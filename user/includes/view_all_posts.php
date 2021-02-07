<table class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                   <th>Id</th>
                                   <th>Author</th>
                                   <th>Title</th>
                                   <th>Image</th>
                                   <th>Status</th>             
                                   <th>Content</th>
                                   <th>Date</th>
                                   <th>Edit</th>
                                   <th>Delete</th>
                               </tr>
                           </thead>
                           <tbody>
                           <?php //find all category Query
                            $query = "SELECT * FROM posts";
                            $select_posts = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_assoc($select_posts)){
                                    $post_id = $row['post_id'];
                                    $post_author = $row['post_author'];
                                    $post_title = $row['post_title'];
                                    $post_image = $row['post_image']; 
                                    $post_status = $row['post_status'];   
                                    $post_content = $row['post_content'];
                                    $post_date = $row['post_date'];

                                    echo "<tr>";
                                    echo "<td>{$post_id}</td>";
                                    echo "<td>{$post_author}</td>";
                                    echo "<td>{$post_title}</td>";
                                    echo "<td><img width='100' src='../assets/img/{$post_image}' alt='image'></td>";                               
                                    echo "<td>{$post_status}</td>";
                                    echo "<td>{$post_content}</td>"; 
                                    echo "<td>{$post_date}</td>";
                                    echo "<td><a href= 'posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                                    echo "<td><a href= 'posts.php?delete={$post_id}'>Delete</a></td>";
                                    echo "</tr>";
                                                
                                }
                                ?>
                          
                           </tbody>
                       </table>

<?php
if(isset($_GET['delete'])){
    $delete_post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = {$delete_post_id} "; 
    $delete_query = mysqli_query($conn, $query);
    header("Location: posts.php");

    if(!$delete_query){
        die("QUERY FAILED" . mysqli_error($conn));
    }
}
?>