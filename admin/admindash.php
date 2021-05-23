<?php
session_start();
if (isset($_SESSION['uid']))
{
	echo "";
}
else
{
	header('location :../login.php');
}

?>

<!DOCTYPE HTML>
<html lang="en_US">
<head>
    <meta charset="UTF-8">
	
	 <title>Admin Dash</title>
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
      background-image:url("../images/wood.jpg");
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
	margin-left:60px;
	height:120px;
	line-height:140px;
	
}
.dashboard{
	
	color:#fff;
	margin-right:60px;
	margin-left:60px;
	height:60%;
	line-height:100px;
	font-size:25px;

}
  
</style>
<body>



    <div class="admintitle" align="center">
	<h4><a href="logout.php" style="float:right; margin-right:100px; color:#fff; font-size:20px">Logout</a></h4>
         <span>  <h1 style="font-size:35px;">Welcome to Admin Dashboard</h1></span>
		   
    </div>
	
	<div style="height:600px;" class="dashboard" >
	        <table  style="width:50%;"  align="center" height="100">
			   <tr>
			      <td style="font-size:25px;"align="right">1.</td> <td><a href="adddoc.php" style="font-size:25px;color:#fff;">Insert Doctor Details</a></td>
			   </tr>
			   
			   <tr>
			      <td style="font-size:25px;"align="right">2.</td> <td><a href="updatedoc.php" style="font-size:25px;color:#fff;">Update Doctor Details</a></td>
			   </tr>
			   
			   <tr>
			      <td style="font-size:25px;"align="right">3.</td> <td><a href="deletedoc.php"style="font-size:25px;color:#fff;">Delete Doctor Details</a></td>
			   </tr>
			   <tr>
			      <td style="font-size:25px;"align="right">4.</td><td><a href="adminappointcheck.php" style="font-size:25px;color:#fff;">Check Appointments</a></td>
			   </tr>
			</table>
	</div>
	


</body>
</html>
