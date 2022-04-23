<?php include('header.php'); 
// //Initialize the session
session_start();
$role=$_SESSION["role"];
if($role!='Admin')
{	
?>
<style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            font-family: "Georgia", Times, serif;
            padding-top: 35px;


        }

    </style>
    <link rel="stylesheet" href="css/bootstrap.min.css">
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="alert alert-danger">
                            <p>You do not have access to this page.</p>
                        </div>
                </div>
            </div>        
        </div>
    </div>


<?php
exit; 
} 


   ?>
 <title>Booking List</title>  
<body>


    <div class="row-fluid">
        <div class="span12">


         

            <div class="container">
			<br>
			<br>
			<a class="btn btn-primary" href="home.php" target="_blank">Back</a>
<h1 style="text-align: center;color:#3399ff;">Booking List</h1>

                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                            
                            <thead>
                                <tr>
                                    <th style="text-align:center;">Name</th>
                                    <th style="text-align:center;">Email</th>
                                    <th style="text-align:center;">Phone</th>
                                    <th style="text-align:center;">Adress</th>
                                    <th style="text-align:center;">Comment</th>
                                    <th style="text-align:center;">Guests</th>
                                    <th style="text-align:center;">Arrivals</th>
                                    <th style="text-align:center;">Leaving</th>
                                    

                                </tr>
                            </thead>
                
							<?php
								require_once('config.php');
								$sqlto = "SELECT * FROM `book_form`";
								// echo $sqlto;
                                $id = 0;
                                 if($result2 = mysqli_query($link, $sqlto)){

                                    // dd($row);
                                    // exit();

                    
                                
                                 echo "<tbody>";
                            
                                while($row = mysqli_fetch_array($result2)){
                    
                                    ?>
								<tr>
								<td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row ['name']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['email']; ?></td>
                                <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['phone']; ?></td>
                                <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['address']; ?></td>
                                <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['comment']; ?></td>
                                <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['guests']; ?></td>
                                <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['arrivals']; ?></td>
                                <td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['leaving']; ?></td>
								</tr>
                                <?php }?>
                            </tbody>
                            <?php }?>
                        </table>
                        <?php
                        mysqli_close($link);
                        ?>
            </div>
        </div>
    </div>
</body>