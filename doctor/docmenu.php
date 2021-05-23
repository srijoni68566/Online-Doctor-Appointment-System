<?php
session_start();
if (isset($_SESSION['id']))
{
	echo "";
}
else
{
	header('location :../doclogin.php');
}

?>
<!DOCTYPE HTML>
<html lang="en_US">
<head>
    <meta charset="UTF-8">
	
	 <title>Doc Menu</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	<h4><a href="doclogout.php" style="float:right; margin-right:10px; font-size:20px">Logout</a></h4>
	</head>
<style>
	 body{
      background-image:url("../images/light.jpg");
	  background-color: transparent; 
	  background-position: center center;
      background-repeat: no-repeat;
      background-attachment:fixed;
      background-size: cover;
      background-color: #464646;
     }
	 .docmenu{
	
		
		color:#fff;
		margin-up:200px;
	margin-right:60px;
	margin-left:60px;
	height:140px;
	line-height:160px;
	text-align:center;
	
}
span {
  display: inline-block;
  vertical-align: middle;
  line-height: normal;
}
  .form-container{
	boder:0px solid #fff;padding:50px 50px;margin-top:5vh;
	margin-right:250px;
	margin-left:250px;
    -webkit-box-shadow:-1px 4px 20px 11px rgba(0,0,0,0.75);
    -moz-box-shadow: -1px 4px 20px 11px rgba(0,0,0,0.75);
     box-shadow: -1px 4px 20px 11px rgba(0,0,0,0.75);
}

</style>	
<body>

 <div class="docmenu">

	<span>
     <h1><b align="center">Make Your Choice</b></h1>

	 </span>
	 </div>


<div align="center">
<span>
 <table  style="width:100%;" height=300 align="center">
			   <tr >
			      <td style="font-size:25px; color:#fff;"><b>1.</b></td><td colspan="2"><a href="docprofile.php" style="font-size:25px;color:#fff;"><b >Re-Design your Profile</b></a></td>
			   </tr>
			   
			   <tr>
			      <td style="font-size:25px; color:#fff;"><b>2.</b></td> <td><a href="appointcheck.php" style="font-size:25px;color:#fff;"><b>Check Appointments</b></a></td>
			   </tr>
			   	 <tr>
			      <td style="font-size:25px; color:#fff;"><b>3.</b></td> <td><a href="docdelete.php" style="font-size:25px;color:#fff;"><b>Unregister</b></a></td>
				 
				  </tr>


			</table>
			</span>
			</div>
			<div class="form-container">
			<h5><b><p style="color:#8B0000;">NB : If you Unregister.Your All Appointments Will be Cancelled</p></b></h5>
			</div>
			</body>
			</html>