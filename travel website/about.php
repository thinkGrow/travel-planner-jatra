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
   <title>About</title>

   <!-- icon -->
   <link rel = "icon" type = "image/png" href = "images/icon.jpeg">

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->

<?php
// if log in true
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
?>
<section class="header">

   <a href="home.php" class="logo">|যাত্রা|</a>
   <div style="text-align: center;font-size:25px;font-weight:bold;"><?php echo htmlspecialchars($_SESSION["username"]); ?> </div>


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
  <a href="login.php">log in</a>
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

<div class="heading" style="background:url(images/header-bg-1.png) no-repeat">
   <h1>about us</h1>
</div>

<!-- about section starts  -->

<section class="about">

   <div class="image">
      <img style="border-radius: 3%;" src="images/makersmania.jpeg" alt="">
   </div>

   <div class="content">
      <h3>why choose us?</h3>
      <p>To Travel Is To Live</p>
      <p>Jatra started off as a friend's circle of few people from the Engineering Dept who started going to tours and ended up making a business out of it. </p>
      <p>We offer packages for Cox's Bazar, Sundarban, Bandarban and plan to expand to all over Bangladesh. Best believe.</p>
      <div class="icons-container">
         <div class="icons">
            <i class="fas fa-map"></i>
            <span>top destinations</span>
         </div>
         <div class="icons">
            <i class="fas fa-hand-holding-usd"></i>
            <span>affordable price</span>
         </div>
         <div class="icons">
            <i class="fas fa-headset"></i>
            <span>24/7 guide service</span>
         </div>
      </div>
   </div>

</section>

<!-- about section ends -->

<!-- reviews section starts  -->

<section class="reviews">

   <h1 class="heading-title"> clients reviews </h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

      <div class="swiper-slide slide">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <p>I could care less about the views or the accomodation.
               I don't think none of this comes close to the love I have for C++. Perhaps my spouse? Perhaps, perhaps.
               But I am not going to lie, I did have a good time writing code in this vacation. 5 star.
            </p>
            <h3>Romasa Qasim</h3>
            <span>Lecturer, IUB</span>
            <img src="images/RomasaQasim.jpeg" alt="">
         </div>

         <div class="swiper-slide slide">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
             <p>Good value package but quite excruciating to book. Had to keep going backwards and forwards 
                selecting different dates and rooms to see which were included in the "Cox's Bazar" package 
                as this wasn't immediately discernible.</p>
            <h3>Dr. Mahady Hasan</h3>
            <span>Associate Professor, IUB</span>
            <img src="images/MahadyHasan.jpeg" alt="">
         </div>

         <div class="swiper-slide slide">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <p>Deals always tend to be hard to beat on travel online. We've booked with them for years for this 
               reason. On this occasion, it did not take a while. They were pretty co-operative and always responded
               to calls. Overall I would book again.</p>
            <h3>Sanzar Adnan Alam</h3>
            <span>Lecturer, IUB</span>
            <img src="images/SanzarAdnan.jpeg" alt="">
         </div>

         <div class="swiper-slide slide">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <p>I could care less about the views or the accomodation.
               I don't think none of this comes close to the love I have for Java. Perhaps my spouse? Perhaps, perhaps.
               But I am not going to lie, I did have a good time writing in java in this vacation. 
            </p>
            <h3>Subrata Kumar Dey</h3>
            <span>Lecturer, IUB</span>
            <img src="images/SKD.jpeg" alt="">
         </div>

         <div class="swiper-slide slide">
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <p>I could care less about the views or the accomodation.
               I don't think none of this comes close to the love I have for C++. Perhaps my spouse? Perhaps, perhaps.
               But I am not going to lie, I did have a good time writing code in this vacation. 5 star.
            </p>
            <h3>Romasa Qasim</h3>
            <span>Lecturer, IUB</span>
            <img src="images/RomasaQasim.jpeg" alt="">
         </div>


      </div>

   </div>

</section>

<!-- reviews section ends -->



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