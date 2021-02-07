<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - HARS</title>
    
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="index.php">HARS</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="service-page.php">Services</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="registration.php">Register</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="login.php">login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Login here</h2>
                </div>
                <form method="POST">
                    <div class="form-group"><label for="name">Username</label><input class="form-control item" type="text" id="name" name="uname" required></div>
                    <div class="form-group"><label for="password">Password</label><input class="form-control item" type="password" id="password" name="pass" required></div><button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
                    <div class="log-link"><a href="registration.php">Not a member?</a></div>
                    <div class="log-link"><a href="forgotpass.php">Forgot password?</a></div>
<?php
include "db.php";
?>

<?php session_start(); ?> 

<?php

if(isset($_POST['login'])){
    $username= $_POST['uname'];
    $password = $_POST['pass'];

   $username= mysqli_real_escape_string($conn, $username);
   $password = mysqli_real_escape_string($conn, $password);

   $query = "SELECT * FROM users WHERE uname = '{$username}' ";
   $select_user_query = mysqli_query($conn, $query);
   if(!$select_user_query){
       die("QUERY FAILED" . mysqli_error($conn));
   }

   while($row = mysqli_fetch_array($select_user_query)){
       $db_id = $row['id'];
       $db_username = $row['uname'];
       $db_user_password = $row['pass'];
       $db_user_firstname = $row['fname'];
       $db_user_lastname = $row['user_lastname'];
       $db_user_role = $row['user_role'];

   }if($username !== $db_username && $password !== $db_user_password ){
       header("Location: index.php ");
   } else if($username == $db_username && $password == $db_user_password){

    $_SESSION['uname'] = $db_username;
    $_SESSION['fname'] = $db_user_firstname;
    $_SESSION['lastname'] = $db_user_lastname;
    $_SESSION['user_role'] = $db_user_role;


    header("Location: admin/index.php ");
    
   } else{
       header("Location: index.php ");
   }

}

?>
                </form>
            </div>
        </section>
    </main>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>