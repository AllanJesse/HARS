<?php
include "db.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Services - HARS</title>

    
    <link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/css/aos.css">

    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <link rel="stylesheet" href="assets/css/sty.css">

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
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="service-page.php">Services</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="registration.php">Register</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="login.php">login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page service-page">
        <section class="clean-block clean-services dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">HOUSES AND APARTMENTS AVAILABLE</h2>
                </div>
                <div class="row">
                    <!-- <div class="col-md-6 col-lg-4"> -->
                        <?php
                        $query = "SELECT * FROM posts ";
                        $select_all_posts_query = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_assoc($select_all_posts_query)){
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = substr($row['post_content'], 0,120);
                            $post_status = $row['post_status'];

                            if($post_status == 'Published'){
                             
                        ?> 
                        <div class="card"><img class="card-img-top w-100 d-block" src="assets/img/<?php echo $post_image; ?>" alt="">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $post_title; ?></h4>
                                <p class="lead">
                                     by <a href="index.php"><?php echo $post_author; ?></a>
                                </p>
                                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                                <p class="card-text"><?php echo $post_content; ?></p>
                            </div>
                            <div><button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter" type="button">RENT</button></div>
                        </div>
                        <?php
                        }
                          }
                        ?>
                    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">PAYMENT FORM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        if(isset($_POST['submit'])) {

          $first_name= $_POST['first_name'];
          $last_name = $_POST['last_name'];
          $phone_number = $_POST['phone_number'];
          $gender = $_POST['gender'];
          $method = $_POST['method'];
          $payment_method = $_POST['payment_method'];
          $payment_date = date('d-m-y');

          echo $first_name;
      
         
          $query = "INSERT INTO payment(first_name, last_name, phone_number, gender, method, payment_method, payment_date) ";
          $query .="VALUES('{$first_name}','{$last_name}','{$phone_number}','{$gender}','{$method}', '{$payment_method}', now() )";
          $create_payment_query = mysqli_query($conn, $query);
      
            if(!$create_payment_query){
                die("QUERY FAILED" . mysqli_error($conn));
            }
        }
        ?>
      <form action="" method="POST">
        <div class="form-group">
          <label for="firstname">First Name</label>
          <input name="first_name" type="text" class="form-control" placeholder="Enter your firstname">   
        </div>
        <div class="form-group">
          <label for="lastname">Last Name</label>
          <input name="last_name" type="text" class="form-control" placeholder="Enter your lastname">    
        </div>
        <div class="form-group">
          <label for="phonenumber">Phone Number</label>
          <input name="phone_number" type="number" class="form-control" placeholder="Enter your Phone Number">    
        </div>
        <div class="form-group">
          <label for = "title">Choose Gender</label>
          <select name="gender" id="">
            <option value="customer" selected disabled>Choose Gender</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
          </select>
        </div>

        <h2><label for="phonenumber">Payment Method</label></h2>
        <div class="form-group">
          <label for = "title" name="method">Choose Payment Method</label>
          <br>
          <select name="payment_method" id="">
            <option value="customer" selected disabled>Choose Your Payment Method</option>
            <option>Credit Cards</option>
            <option>PayPAL</option>
            <option>Mobile</option>
            <option>Others</option>
          </select>
        </div>
        <div class="form-group">
          <label for="payment_method">Card Details</label>
          <input name="payment_method" type="email" class="form-control" placeholder="Enter your card number eg.cvv 369" maxlength="3">   
          <br>
          <input type="date"  class="" placeholder="Expire-date: eg. YY / MM" ><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
      </form>
    </div>
    </div>
  </div>
</div>
                    <div class="col">
                        <div class="but-div"><button class="btn btn-primary" id="btn1" type="button">&lt;&lt; Prev</button><button class="btn btn-primary" id="btn1" type="button">Next&gt;&gt;</button></div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">We are Social !!!</h2>
              <p>Check us on Social Media.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="https://www.twitter.com/AllanJesse"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="https://www.facebook.com/AllanJesse"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://www.instagram.com/dj_lug"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="index.php"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                <li><a href="service-page.php"><span class="icon-long-arrow-right mr-2"></span>Services</a></li>
                <li><a href="registration.php"><span class="icon-long-arrow-right mr-2"></span>Registration</a></li>
                <li><a href="login.php"><span class="icon-long-arrow-right mr-2"></span>Login</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Hire</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Rent</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Buy</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Get a Quotation</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Dar Es Salaam, Tanzania.</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+255 717 407 501</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@hars.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved.
          </div>
        </div>
      </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/scrollax.min.js"></script>
  
    <script src="js/main.js"></script>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>