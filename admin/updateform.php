<?php
session_start();
if (isset($_SESSION['uid']))
{
	echo "";
}
else
{
	header('location : ../login.php');
}

?>

<!DOCTYPE HTML>
<html lang="en_US">
<head>
    <meta charset="UTF-8">
	
	 <title>Admin dash</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="css/style.css" rel="stylesheet" type="text/css">
  		
</head>
<style>

     body{
      background-image:url("../images/purple.jpg");
	  background-color: transparent; 
	  background-position: center center;
      background-repeat: no-repeat;
      background-attachment:fixed;
      background-size: cover;
      background-color: #464646;
	  color:#800000;
     }

span {
  display: inline-block;
  vertical-align: middle;
  line-height: normal;
}
.admintitle{
	background-color:#GGGG33;
	color:#fff;
	margin-right:10px;
	margin-left:10px;
	height:120px;
	line-height:140px;
	
}
.dashboard{
	
	color:#fff;
	margin-right:60px;
	margin-left:60px;
	height:20%;
	line-height:15px;
	font-size:20px;

}
  
</style>
<body>
<div class="admintitle" align="center">
	<h4>
	<a href="admindash.php" style="float:left; margin-left:40px; color:#fff; font-size:20px">Back to Dashboard</a>
	<a href="logout.php" style="float:right; margin-right:70px; color:#fff; font-size:20px">Logout</a></h4>
           <span><h1><b>Admin Dashboard</b></h1></span>
		   
    </div>


<?php

	include('../dbcon.php');
	
	$sid=$_GET['sid'];
	
	$sql="SELECT * FROM doctor_details WHERE id='$sid'";
	
	$run=mysqli_query($con,$sql);
	
	$data=mysqli_fetch_assoc($run);
?>
<div class="dashboard">
<form method="POST" action="updatedata.php" enctype="multipart/form-data">
     
    <table align="center" width="60%"  height="200">
	   
	   <tr style="color:#fff;"  align="center">
	      <td>First Name</td>
		    <td>
		       <input type="text" name="firstname" value=<?php echo $data['firstname'];?> required>
			</td>
	   </tr>
	   
	    <tr style="color:#fff;"  align="center">
	      <td>Last Name</td>
		    <td>
		       <input type="text" name="lastname" value=<?php echo $data['lastname'];?> required>
			</td>
	   </tr>
	   
	   

	   <tr style="color:#fff;"  align="center">
	      <td>Speciality</td>
		  <td> 
		       <input type="text" name="speciality" value=<?php echo $data['speciality']; ?> required> 
		  </td>
	   </tr>
	   
	   	   <tr style="color:#fff;"  align="center">
	      <td>Degree</td>
		    <td>
		       <input type="text" name="degree" value=<?php echo $data['degree'];?> required>
			</td>
	   </tr>
	   
	   <tr style="color:#fff;"  align="center">
	      <td>Start time of serving(24 hour format)</td>
		  <td> 
		       <input type="number" name="start_time" value=<?php echo $data['start_time'] ;?> required>
		  </td>
	   </tr>
	   <tr style="color:#fff;"  align="center">
	      <td>Finish time of serving(24 hour format)</td>
		  <td>
		       <input type="number" name="finish_time" value=<?php echo $data['finish_time'] ;?> required>
		  </td>
	   </tr>
	   <tr style="color:#fff;"  align="center">
	      <td>Contact no of Doctor</td>
		  <td>
		       <input type="number" name="doc_contact" value=0<?php echo $data['doc_contact']; ?> required>
		  </td>
	   </tr>
	   	   <tr style="color:#fff;"  align="center">
	      <td>Fee of Doctor</td>
		  <td>
		  
		  
		       <input type="number" name="fee" value=<?php echo $data['fee']; ?> required>
		  </td>
	   </tr>
	   
	   	   <tr style="color:#fff;"  align="center">
	      <td>Patient limit per day</td>
		    <td>
		       <input type="number" name="limitt" value=<?php echo $data['limitt'];?> required>
			</td>
	   </tr>
	   
	   	   	   <tr style="color:#fff;"  align="center">
	      <td>Availability(YES/NO)</td>
		    <td>
		       <input type="text" name="avail" value=<?php echo $data['avail'];?> required>
			</td>
	   </tr>
	   
	   
	   
	   <tr align="center">
	   
	   <td colspan="2">
	   
	   <input type="hidden" name="sid" value="<?php echo $data['id'];?>"/>
	   <div>
	   <br>
	   <input type="submit" class="btn btn-info name="submit" value="submit"></td>
	   </br>
	   </div>
	   </tr>
	</table>

</form>
</div>
