<?php
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
   <!-- Button to trigger modal -->
    <a class="btn btn-primary" href="#myModal" data-toggle="modal">Click Here To Add</a>
	<br>
	<br>
	<br>
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">

<h3 id="myModalLabel">Add</h3>
</div>
<div class="modal-body">
<form method="post" action="upload.php"  enctype="multipart/form-data">
<table class="table1">
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Package Name</label></td>
		<td width="30"></td>
		<td><input type="text" name="package_name" placeholder="Package Name" required /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Package Details</label></td>
		<td width="30"></td>
		<td><input type="text" name="package_details" placeholder="Package Details" required /></td>
	</tr>
	<tr>
		<td><label style="color:#3a87ad; font-size:18px;">Select your Image</label></td>
		<td width="30"></td>
		<td><input type="file" name="image"></td>
	</tr>
</table>
    </div>
    <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
<button type="submit" name="Submit" class="btn btn-primary">Upload</button>
    </div>
</form>
</div>			