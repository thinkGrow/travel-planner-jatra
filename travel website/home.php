<?php
// //Initialize the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- icon -->
   <link rel = "icon" type = "image/png" href = "images/icon.jpeg">

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
   
<!-- header section starts  -->
<?php
// if log in true
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
?>
<section class="header">

   <a href="home.php" class="logo">|যাত্রা|</a>
   <div style="text-align: center;font-size:25px;font-weight:bold;"><?php echo htmlspecialchars($_SESSION["username"]); ?></div>


   <nav class="navbar">
     <a href="home.php">home</a>
      <a href="about.php">about</a>
      <a href="package.php">package</a>
      <?php 
    $role=$_SESSION["role"];
    if($role=='Admin')
     { 	
    ?>
       <a href="book.php">Book</a>
      <a href="bookList.php">Booking List</a>
      <a href="admin.php">Admin Panel</a>
      <?php
      }
      else
      {
      ?>
      <a href="book.php">Book</a>
      <?php   
      }
      ?>
      <a href="logout.php">log Out</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>
<?php
}
// if log in false
else
{
?> 
<section class="header">

<a href="home.php" class="logo">|যাত্রা|</a>

<nav class="navbar">
  <a href="login.php">login</a>
  <a href="home.php">home</a>
   <a href="about.php">about</a>
   <a href="package.php">package</a>
</nav>

<div id="menu-btn" class="fas fa-bars"></div>

</section>
<?php
}
?>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home">

   <div class="swiper home-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide" style="background:url(images/bd.jpg) no-repeat">
            <div class="content">
               <span>explore, discover, travel</span>
               <h3 style="text-transform: capitalize;">Hi,
               <?php
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
               ?>
              <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b><br>
              <?php
                }
               ?>
               Discover Bangladesh</h3>
               <a href="package.php" class="btn">discover more</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/bandarban.jpeg) no-repeat">
            <div class="content">
               <span>explore, discover, travel</span>
               <h3>discover the new places</h3>
               <a href="package.php" class="btn">discover more</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/coxsbazarcover.jpeg) no-repeat">
            <div class="content">
               <span>explore, discover, travel</span>
               <h3>make your tour worthwhile</h3>
               <a href="package.php" class="btn">discover more</a>
            </div>
         </div>
         
      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>

   </div>

</section>

<!-- home section ends -->

<!-- services section starts  -->

<section class="services">

   <h1 class="heading-title"> our services </h1>

   <div class="box-container">

      <div class="box">
         <img src="images/icon-1.png" alt="">
         <h3>adventure</h3>
      </div>

      <div class="box">
         <img src="images/icon-2.png" alt="">
         <h3>tour guide</h3>
      </div>

      <div class="box">
         <img src="images/icon-3.png" alt="">
         <h3>trekking</h3>
      </div>

      <div class="box">
         <img src="images/icon-4.png" alt="">
         <h3>camp fire</h3>
      </div>

      <div class="box">
         <img src="images/icon-5.png" alt="">
         <h3>off road</h3>
      </div>

      <div class="box">
         <img src="images/icon-6.png" alt="">
         <h3>camping</h3>
      </div>

   </div>

</section>

<!-- services section ends -->

<!-- home about section starts  -->

<section class="home-about">

   <div class="image">
      <img style="border-radius: 3%;" src="images/makersmania.jpeg" alt="">
   </div>

   <div class="content">
      <h3>about us</h3>
      <p>To Travel Is To Live</p>
      <p>Jatra started off as a friend circle of few people from the Engineering Deptartment who started going to tours and ended up making a business out of it.</p>
      <a href="about.php" class="btn">read more</a>
   </div>

</section>

<!-- home about section ends -->

<!-- home packages section starts  -->

<section class="home-packages">

   <h1 class="heading-title"> our packages </h1>

   <div class="row">
      <?php
         require_once('db.php');
         $result = $conn->prepare("SELECT * FROM tbl_image ORDER BY tbl_image_id ASC");
         $result->execute();
         for($i=0; $row = $result->fetch(); $i++){
               $id=$row['tbl_image_id'];
      ?>

            <div class="col-md-4" ">
 
               <div class="image"> 
                  <img src="images/<?php echo $row['image_location']?>" alt="" height="300" width="375" style="border-radius:10px ;  box-shadow : 1px 1px;"> 
               </div>

                  <div class="content">
                     <h3><?php echo $row ['package_name'];?></h3>
                     <p><?php echo $row['package_details'];?></p>
                     <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
                           { ?>
                              <a href="book.php" class="btn">book now</a>
                              <?php
                           }
                           else
                           {?>
                              <a href="login.php" class="btn">book now</a>
                           <?php
                           } 
                     ?>
                  </div>
            </div>
      <?php
      }
      ?>
   </div>

</section>

<!-- home packages section ends -->

<!-- home offer section starts  -->

<section class="home-offer">
   <div class="content">
      <h3>upto 50% off</h3>
      <p>Offer applied for students only</p>
      <?php
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
               ?>
            <a href="book.php" class="btn">book now</a>
            <?php
            }
            else
              {
              ?>
                <a href="login.php" class="btn">book now</a>
              <?php
            } 
            ?>
   </div>
</section>

<!-- home offer section ends -->

















<!-- footer section starts  -->

<section class="footer">

<div class="box-container">

<?php
// if log in true
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
?>
      <div class="box">
         <h3>quick links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
         <a href="package.php"> <i class="fas fa-angle-right"></i> package</a>
         <a href="book.php"> <i class="fas fa-angle-right"></i> book</a>
      </div>

<?php
}
else
{ ?>
   <div class="box">
         <h3>quick links</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
         <a href="about.php"> <i class="fas fa-angle-right"></i> about</a>
         <a href="package.php"> <i class="fas fa-angle-right"></i> package</a>
      </div>
<?php
 }
?>
      <div class="box">
         <h3>extra links</h3>
         <a href="#"> <i class="fas fa-angle-right"></i> ask questions</a>
         <a href="#"> <i class="fas fa-angle-right"></i> about us</a>
         <a href="#"> <i class="fas fa-angle-right"></i> privacy policy</a>
         <a href="#"> <i class="fas fa-angle-right"></i> terms of use</a>
      </div>

      <div class="box">
         <h3>contact info</h3>
         <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
         <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
         <a style="text-transform: lowercase;" href="#"> <i class="fas fa-envelope"></i> rubaittasnim@gmail.com </a>
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