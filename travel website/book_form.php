<?php include "config.php";

   // $connection = mysqli_connect('localhost','root','root','book_db');

   // if(isset($_POST['send'])){
   //    $name = $_POST['name'];
   //    $email = $_POST['email'];
   //    $phone = $_POST['phone'];
   //    $address = $_POST['address'];
   //    $location = $_POST['location'];
   //    $guests = $_POST['guests'];
   //    $arrivals = $_POST['arrivals'];
   //    $leaving = $_POST['leaving'];

   //    $request = " INSERT INTO book_form (name, email, phone, address, location, guests, arrivals, leaving) VALUES ('$name','$email','$phone','$address','$location','$guests','$arrivals','$leaving') ";
  
   //    mysqli_query($connection, $request);

   //    header('location:book.php'); 

   // }else{
   //    echo 'something went wrong please try again!';
   // }

   
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $comment = $_POST['comment'];
      $guests = $_POST['guests'];
      $arrivals = $_POST['arrivals'];
      $leaving = $_POST['leaving'];


    //attempt insert query execution

   $sql = " INSERT INTO book_form (name, email, phone, address, comment, guests, arrivals, leaving) VALUES ('$name','$email','$phone','$address', '$comment', '$guests','$arrivals','$leaving') ";

    
    if(mysqli_query($link, $sql)){

      echo '<script>alert("Record added succesfully")
            window.location.href = "home.php";
      
      </script>';
    }
    else{
        echo "Error: " . mysqli_error($link);
    }
   //  header("Location: home.php");

    //close connection

    mysqli_close($link);



?>