<?php

// Include file which makes the
    // Database Connection.
    include 'config.php'; 
 

    $showAlert = false; 
    $showError = false; 
    $exists=false;
    
    // Define variables and initialize with empty values
$username = $password = $confirm_password =$name=$phoneNo=$email=$address=$role="";
$username_err = $password_err = $confirm_password_err =$name_err=$phoneNo_err=$role_err= "";

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
      
      

   // Validate password 
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password =$_POST["password"];

    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = $_POST["confirm_password"];
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }     
    }

    // Validate name
    if(empty(trim($_POST["name"]))){
        $employee_name_err = "Please enter your name.";     
    } else{
        $employee_name = trim($_POST["name"]);
        if(empty($employee_name_err)){
            $employee_name_err = "Invalid name.";
        }    
    }
  

    // Validate Branch User
    if(empty(trim($_POST["role"]))){
        $branch_user_err = "Please select the role.";     
    } else{
        $branch_user = trim($_POST["role"]);
        if(empty($branch_user_err)){
            $branch_user_err = "The role is not selected.";
        }    
    }
    

    
    $username = $_POST["username"]; 
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $phoneNo = $_POST["phoneNo"];
    $email = $_POST["email"];
    $role = $_POST["role"]; 
       
    
            
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
    $sql = "Select * from users where username='$username'";
    
    $result = mysqli_query($link, $sql);
    
    $num = mysqli_num_rows($result); 
    
    // This sql query is use to check if
    // the username is already present 
    // or not in our Database
    if($num == 0) {
        if(($password == $confirm_password) && $exists==false) {
    
            //$hash = password_hash($password,PASSWORD_DEFAULT);
                
            $hash = md5($password);
            // Password Hashing is used here. 
            $sql = "INSERT INTO `users` ( `username`, 
                `password`,`confirm_password`,`name`,`phoneNo`,`email`,`address`,`role`) VALUES ('$username','$hash','$hash','$name','$phoneNo','$email','$address','User')";
            echo $sql;
    
            $result = mysqli_query($link, $sql);
    
            if ($result) {
                $showAlert = true; 
                header('Location: login.php');
            }
        } 
    }
        else { 
            $showError = "Passwords do not match"; 
        }      
   
    } // end if 
    
   if($num>0) 
   {
      $exists="Username not available"; 
   } 
    
}//end if   


    // Get all the role name from role table
    $sql= "SELECT * FROM `roles`";
    $roleInfo = mysqli_query($link,$sql);


    

    // Close connection
    mysqli_close($link);
   
   
?>


<?php
    
    if($showAlert) {
    
        echo ' <div class="alert alert-success 
            alert-dismissible fade show" role="alert">
    
            <strong>Success!</strong> Your account is 
            now created and you can login. 
            <button type="button" class="close"
                data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">×</span> 
            </button> 
        </div> '; 
    }
    
    if($showError) {
    
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert"> 
        <strong>Error!</strong> '. $showError.'
    
       <button type="button" class="close" 
            data-dismiss="alert aria-label="Close">
            <span aria-hidden="true">×</span> 
       </button> 
     </div> '; 
   }
        
    if($exists) {
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert">
    
        <strong>Error!</strong> '. $exists.'
        <button type="button" class="close" 
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button>
       </div> '; 
     }
   
?>
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
   <head>
 
        <!-- First include jquery js -->
        <script src="js/jquery-1.12.0.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>

        <!-- Then include bootstrap js -->
        <script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- custom css file link  -->
        <link rel="stylesheet" href="css/style.css">

        <!-- icon -->
        <link rel = "icon" type = "image/png" href = "images/icon.jpeg">

        <title>Sign Up</title>
    </head>
<body>
    <!-- header section starts  -->

<section class="header">

   <a href="home.php" class="logo">travel.</a>

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
          <div class="card" style="background: #e6f2ff;border-radius: 8px;padding-top:20px;margin-top:40px;height:630px;">
            <div class="card-body p-0">
                   <div id="card-title" style="font-family: 'Raleway Thin',sans-serif;letter-spacing:4px;padding-bottom: 23px;padding-top: 5px;text-align: center;">
                      <h2>Sign Up</h2>
                      <div style="background: -webkit-linear-gradient(right, #6699ff, #99ccff);height: 2px;margin: -1.1rem auto 0 auto;width: 89px;" class="underline-title"></div>
                   </div>
                
                <form name="uniform" style="align-items: left;display: flex;flex-direction: column; border-style: align-items: left;display: flex;flex-direction: column; border: none;outline: none;"class="form" action=""  method="POST" required />

                    <div class="row">
                        <div class="col-md-12 form-group row mt-4">
                              <div class="col-md-4 mb-4 mb-sm-0">
                                <label for="input"><b><font size="2px" style="color:black;padding-left:25px;">Username</font></b></label><br>
                              </div>
                              <div class="col-md-8 mt-1">
                                 <input style="text-transform: none;" type="text" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" id="username" name = "username" value="<?php echo $username;?>" required/>
                                 <span class="invalid-feedback"><?php echo $username_err; ?></span>
                              
                              </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 form-group row mt-4">
                          <div class="col-md-4 mb-4 mb-sm-0">
                            <label for="input"><b><font size="2px" style="color:black;padding-left:25px;">Password</font></b></label><br>
                          </div>
                          <div class="col-md-8 mt-1">
                             <input style="text-transform: none;" type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" id="password" name = "password" value="<?php echo $password; ?>" required/>
                             <span class="invalid-feedback"><?php echo $password_err; ?></span>
                          
                          </div>
                        </div>
                    </div>

                     <div class="row">
                        <div class="col-md-12 form-group row mt-4">
                          <div class="col-md-4 mb-4 mb-sm-0">
                            <label for="input"><b><font size="1px" style="color:black;padding-left:15px;">Confirm Password</font></b></label><br>
                          </div>
                          <div class="col-md-8 mt-1">
                             <input style="text-transform: none;" type="password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" id="confirm_password" name = "confirm_password" value="<?php echo $confirm_password; ?>" required/>
                             <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                          
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 form-group row mt-4">
                          <div class="col-md-4 mb-4 mb-sm-0">
                            <label for="input"><b><font size="2px" style="color:black;padding-left:25px;">Name</font></b></label><br>
                          </div>
                          <div class="col-md-8 mt-1">
                             <input style="text-transform: none;" type="text" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" id="name" name = "name" value="<?php echo $name;?>" required/>
                             <span class="invalid-feedback"><?php echo $name_err; ?></span>
                          
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 form-group row mt-4">
                          <div class="col-md-4 mb-4 mb-sm-0">
                            <label for="input"><b><font size="2px" style="color:black;padding-left:25px;">Phone No</font></b></label><br>
                          </div>
                          <div class="col-md-8 mt-1">
                             <input style="text-transform: none;" type="text" class="form-control <?php echo (!empty($phoneNo_err)) ? 'is-invalid' : ''; ?>" id="phoneNo" name = "phoneNo" value="<?php echo $phoneNo;?>" required/>
                             <span class="invalid-feedback"><?php echo $phoneNo_err; ?></span>
                          
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 form-group row mt-4">
                          <div class="col-md-4 mb-4 mb-sm-0">
                            <label for="input"><b><font size="1px" style="color:black;padding-left:25px;">Email Address</font></b></label><br>
                          </div>
                          <div class="col-md-8 mt-1">
                             <input style="text-transform: none;" type="text" class="form-control" id="email" name = "email" value="<?php echo $email;?>" required/> 
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 form-group row mt-4">
                          <div class="col-md-4 mb-4 mb-sm-0">
                            <label for="input"><b><font size="2px" style="color:black;padding-left:25px;">Address</font></b></label><br>
                          </div>
                          <div class="col-md-8 mt-1">
                             <input style="text-transform: none;" type="text" class="form-control" id="address" name = "address" value="<?php echo $address;?>" required/>
                           </div>
                        </div>
                    </div>

                    <br>
                    <div class="form-group" style="padding-left:160px;">
                       <input style="width:40%;background: linear-gradient(to right, #6699ff, #99ccff); color: black;border-radius: 7%;" type="submit" class="btn btn-primary" value="Submit">
                       <input style="width:40%;background: linear-gradient(to right, #6699ff, #99ccff); color: black;border-radius: 7%;" type="reset" class="btn btn-secondary ml-2" value="Reset">
                    </div>
                    <p style="padding-left: 150px">Already have an account? <a style="color: #6699ff;" href="login.php">Login here</a>.</p>
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