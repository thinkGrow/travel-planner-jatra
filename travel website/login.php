<?php

//Initialize the session
session_start();
 
//  // Check if the user is already logged in, if yes then redirect him to welcome page
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: we.php");
//     exit;
// }
  
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $error = 0;

    // print_r($_POST);
    // exit;
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
        $error++;
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
        $error++;
    } else{
        $password = $_POST["password"];
    }

    
    // Validate credentials
    //if($username_err=="" && $password_err=="" && empty($BranchName_err) && empty($role_err) && empty($user_type))
    if($error==0)
    {
        
          //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        //$password = stripcslashes($password);  
       $username = mysqli_real_escape_string($link, $username);  
       //$password = mysqli_real_escape_string($link, $password);
       $encryptedPass = md5($password);
        

   $sql = "select * from users where username = '$username' and password = '$encryptedPass'";  
        $result = mysqli_query($link, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        

        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
         
                            
                            // Store data in session variables
           foreach ($row as $key => $value) {
                 $_SESSION["loggedin"] = true;
                 $_SESSION["id"] = $row["id"];
                 $_SESSION["username"] = $row['username'];
                 $_SESSION["name"] = $row['name'];
                 $_SESSION["role"] = $row['role']; 

               
           } 
                            // Redirect user to welcome page
                            header("location: home.php");
        }  
        else{  
            echo "Login failed. Invalid username or password.";  
        }


   
    }


}
   $sql1 = "SELECT * FROM `branch_details`";
    $all_branches = mysqli_query($link,$sql1);

    $sql2 = "SELECT * FROM `roles`";
    $roleInfo = mysqli_query($link,$sql2);

    $sql3 = "SELECT * FROM `user_type`";
    $userType = mysqli_query($link,$sql3);
    
     mysqli_close($link);    
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>

    <!-- icon -->
    <link rel = "icon" type = "image/png" href = "images/icon.jpeg">
    <!-- First include jquery js -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>

<!-- Then include bootstrap js -->
<script src="js/bootstrap.min3.6.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min3.4.1.js"></script>
    <script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<!-- swiper css link  -->
  

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
<script>
    $(document).ready(function() {
        $('#userTable').DataTable();
    });
    </script>


    
        <style type="text/css">
  body {
  background-image: url('images/home-slide-3.jpg');
  font: 14px sans-serif; 
  

   }
   
   
    .sub_btn:hover
    {
        background: blue !important;
        -webkit-transition: background 2s ease-out !important;
        

    }
   </style>
</head>
<body>
    <!-- header section starts  -->

<section class="header">

   <a href="home.php" class="logo">|যাত্রা|</a>

   <nav class="navbar">
      <a href="home.php">home</a>
      <a href="about.php">about</a>
      <a href="package.php">package</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="card" style="background: #e6f2ff;border-radius: 8px;padding-top:1px;margin-top:100px;">
                    <div class="card-body p-0">
                        <div id="card-title" style="font-family: 'Raleway Thin',sans-serif;letter-spacing:4px;padding-bottom: 23px;padding-top: 10px;text-align: center;">
                                <h2>Log In</h2>
                                <div style="background: -webkit-linear-gradient(right, #6699ff, #99ccff);height: 4px;margin: -1.1rem auto 0 auto;width: 105px;" class="underline-title"></div>
                        </div>

                             <p style="padding:10px;" class="text-center">Please fill in your credentials to log in.</p>
                             <?php 
                             if(!empty($login_err)){
                               echo '<div style="width: 278px; padding: 10px; padding-left: 12%;margin-left:    35px" class="alert alert-danger">' . $login_err . '</div>';
                             }
                             ?>
                     <form style="align-items: left;display: flex;flex-direction: column; border-style: align-items: left;display: flex;flex-direction: column; border: none;outline: none; padding-left:35px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                            <div class="row">
                              <div class="col-md-12 form-group row mt-4">
                                <div class="col-md-4 mb-4 mb-sm-0">
                                  <label for="input"><b><font size="2px" style="color:black;padding-left:25px;">Username</font></b></label><br>
                                </div>
                                <div class="col-md-6 mt-1">
                                  <input style="text-transform: none;" type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username;?>"/>
                                  <span class="invalid-feedback"><?php echo $username_err; ?></span>
                              
                                </div>
                               </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12 form-group row mt-4">
                                <div class="col-md-4 mb-4 mb-sm-0">
                                  <label for="input"><b><font size="2px" style="color:black;padding-left:25px;">Password</font></b></label><br>
                                </div>
                                <div class="col-md-6 mt-1">
                                  <input style="text-transform: none;" type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"/>
                                  <span class="invalid-feedback"><?php echo $password_err; ?></span>
                              
                                </div>
                               </div>
                            </div>
                               
                            <br>

                            <div class="form-group" style="padding-left:170px;">
                                <input style="width:40%;background: linear-gradient(to right, #6699ff, #99ccff); color: black;border-radius: 7%;" type="submit" class="btn btn-primary" value="Login">
                            </div>
                            <!-- <p style="padding-left: 120px">Do you have an account? <a style="color: #6699ff;" href="sign_up.php">Register here</a>.</p>   -->
                            <p style="text-align:center">Do you have an account? <a style="color: #6699ff;" href="sign_up.php">Register here</a>.</p>  
                     </form>
                    </div>
                </div>       
            </div>
        </div>
    </div>
    <!-- footer section starts  -->

<section class="footer" style="margin-top: 300px">

   <div class="box-container">

      <div class="box">
         <h3>quick links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
         <a href="package.php"> <i class="fas fa-angle-right"></i> package</a>
      </div>

      <div class="box">
         <h3>extra links</h3>
         <a href="https://www.facebook.com/rubait"> <i class="fas fa-angle-right"></i> ask questions</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about us</a>
         <a href="#"> <i class="fas fa-angle-right"></i> privacy policy</a>
         <a href="#"> <i class="fas fa-angle-right"></i> terms of use</a>
      </div>

      <div class="box">
         <h3>contact info</h3>
         <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
         <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
         <a style="text-transform: lowercase;" href="#"> <i class="fas fa-envelope"></i> rubaitreshad@gmail.com </a>
         <a href="#"> <i class="fas fa-map"></i> IUB, Bashundhara, Dhaka </a>
      </div>

      <div class="box">
         <h3>follow us</h3>
         <a href="https://www.facebook.com/rubait"> <i class="fab fa-facebook"></i> facebook </a>
         <a href="https://www.twitter.com/rubait"> <i class="fab fa-twitter"></i> twitter </a>
         <a href="https://www.instagram.com/reshad_rubait"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="https://github.com/thinkGrow"> <i class="fab fa-github"></i> linkedin </a>
      </div>

   </div>

   <div class="credit"> created by <span>Rubait & Tasnim</span> | all rights reserved! </div>

</section>

<!-- footer section ends -->










<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>