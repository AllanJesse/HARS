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
    <?php include('db.php');?>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="index.php">HARS</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="service-page.php">Services</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="registration.php">Register</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="login.php">login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Registration</h2>
                </div>
                <form method="POST">
                    <div class="form-group"><label for="name">First name</label><input class="form-control item" type="text" id="name" name="fname" required></div>
                    <div class="form-group"><label for="name">Last name</label><input class="form-control item" type="text" id="name" name="user_lastname" required></div>
                    <div class="form-group"><label for="name">Username</label><input class="form-control item" type="text" id="name" name="uname" required></div>
                    <div class="form-group"><label for="email">E mail</label><input class="form-control item" type="email" id="email" name="email" required></div>
                    <div class="form-group"><label for="password">Password</label><input class="form-control item" type="password" id="password" name="pass" required></div>
                    <div class="form-group"><label for="password">Confirm password</label><input class="form-control item" type="password" id="password" name="pass" required></div><button class="btn btn-primary btn-block" type="submit" name="register">Register</button>
                    <div class="log-link"><a href="login.php">Already a member?</a></div>

                    <?php

                   if(isset($_POST['register']))
                   {
                    $fname=$_POST['fname'];
                    $uname=$_POST['uname'];
                    $email=$_POST['email'];
                    $pass=$_POST['pass'];
                    $pass=password_hash($pass,PASSWORD_DEFAULT);
                   
                    $add="INSERT INTO users (fname,uname,email,pass) VALUES('$fname','$uname','$email','$pass')";
                    $query = mysqli_query($conn,$add);

                    if($query)
                    {
                        echo "<CENTER>User registered succesfully<CENTER>";
                    }else{
                        echo "<CENTER>User registration failed</CENTER>";
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