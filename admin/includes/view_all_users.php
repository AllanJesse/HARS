<table class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                   <th>Id</th>
                                   <th>Username</th>
                                   <th>Firstname</th>
                                   <th>Lastname</th>
                                   <th>Email</th>
                                   <th>Role</th>
                                   <th>Change Role</th>
                                   <th>Change Role</th>
                                   <th>Edit</th>
                                   <th>Delete</th>
                                   
                                   
                               </tr>
                           </thead>
                           <tbody>
                           <?php //find all Comments Query
                            $query = "SELECT * FROM users";
                            $select_users = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_assoc($select_users)){
                                    $user_id = $row['id'];
                                    $username = $row['uname'];
                                    $user_password = $row['pass'];
                                    $user_firstname = $row['fname'];
                                    $user_lastname = $row['user_lastname'];
                                    $user_email = $row['email'];
                                    $user_image = $row['user_image'];
                                    $user_role = $row['user_role'];


                                    echo "<tr>";
                                    echo "<td>{$user_id}</td>";
                                    echo "<td>{$username}</td>";
                                    echo "<td>{$user_firstname}</td>";

                                    // $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                                    // $select_categories_id = mysqli_query($connection, $query);
                                    //     while($row = mysqli_fetch_assoc($select_categories_id)){
                                    //         $cat_id = $row['cat_id'];
                                    //         $cat_title = $row['cat_title'];
                                    //     }

                                    // echo "<td>{$cat_title}</td>";


                                    echo "<td>{$user_lastname}</td>";
                                    echo "<td>{$user_email}</td>";
                                    echo "<td>{$user_role}</td>";
                                    
                                    // $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";

                                    // $select_post_id_query = mysqli_query($connection, $query);
                                    // while($row = mysqli_fetch_assoc($select_post_id_query)){
                                    //     $post_id = $row['post_id'];
                                    //     $post_title = $row['post_title'];

                                    //         echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";

                                    // }

                                    echo "<td><a href= 'users.php?change_role_admin={$user_id}'>Admin</a></td>";
                                    echo "<td><a href= 'users.php?change_role_customer={$user_id}'>Customer</a></td>";
                                    echo "<td><a href= 'users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
                                    echo "<td><a href= 'users.php?delete={$user_id}'>Delete</a></td>";
                                    echo "</tr>";
                                                
                                }
                                ?>
                          
                           </tbody>
                       </table>
<?php

if(isset($_GET['change_role_admin'])){
    $the_user_id = $_GET['change_role_admin'];
    $query = "UPDATE users SET user_role = 'admin' WHERE id = $the_user_id  "; 
    $change_admin_query = mysqli_query($conn, $query);
    header("Location: users.php");

    if(!$change_admin_query){
        die("QUERY FAILED" . mysqli_error($conn));
    }
}

if(isset($_GET['change_role_customer'])){
    $the_user_id = $_GET['change_role_customer'];
    $query = "UPDATE users SET user_role = 'customer' WHERE id = $the_user_id "; 
    $change_customer_query = mysqli_query($conn, $query);
    header("Location: users.php");

    if(!$change_customer_query){
        die("QUERY FAILED" . mysqli_error($conn));
    }
}


if(isset($_GET['delete'])){
    $delete_user_id = $_GET['delete'];
    $query = "DELETE FROM users WHERE id = {$delete_user_id} "; 
    $delete_query = mysqli_query($conn, $query);
    header("Location: users.php");

    if(!$delete_query){
        die("QUERY FAILED" . mysqli_error($conn));
    }
}
?>