<?php
	  session_start();
	  if (isset($_SESSION['id']))
	  {
		  header('location:doctor/docprofile.php');
	  }
?>
<!DOCTYPE HTML>
<html lang="en_US">
<head>
    <meta charset="UTF-8">
	
	 <title>Doc Log in</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="css/style.css" rel="stylesheet" type="text/css">
  	<h4 align="right" style="margin-right:20px; margin-top:20px;"><a href="reg.php"style="color:#fff;">Register</a></h4>
	<h4 align="right" style="margin-right:20px; margin-top:20px;"><a href="index.php"style="color:#fff;">Home</a></h4>
	</head>
	<style>
  .form-container{
	boder:0px solid #fff;padding:50px 60px;margin-top:5vh;
	margin-right:400px;
	margin-left:400px;
    -webkit-box-shadow:-1px 4px 20px 11px rgba(0,0,0,0.75);
    -moz-box-shadow: -1px 4px 20px 11px rgba(0,0,0,0.75);
     box-shadow: -1px 4px 20px 11px rgba(0,0,0,0.75);
}
   body{
      background-image:url("images/ash.jpg");
	  background-color: transparent; 
	  background-position: center center;
      background-repeat: no-repeat;
      background-attachment:fixed;
      background-size: cover;
      background-color: #464646;
     }
	 .logintitle{
	
		color:#000000;
		margin-up:100px;
	margin-right:60px;
	margin-left:60px;
	height:120px;
	line-height:160px;
	text-align:center;
	
}
span {
  display: inline-block;
  vertical-align: middle;
  line-height: normal;
}


</style>


<body>


    <div class="logintitle">
	<span>
     <h1><b align="center">Doctor Login</b></h1>

	 </span>
	 </div>
	 <div class="form-container">
	 <form action="doclogin.php" method="post">
	    
		<table align="center">
		    <tr>
			   <td><b>Username</b></td><td><input type="text" name="uname" required</td>
			</tr>
	        <tr>
			   <td><b>Password</b></td><td><input type="password" name="pass" required</td>
			</tr>
			
			<tr>
	 <td colspan="2" align="center"><input type="submit" class="btn btn-info" name="verify"  value="Verify"></td>
			   
			</tr>
			
		</table>
		
	 </form>
	 </div>
</body>
</html>
<?php
	 
  include('dbcon.php');       /*connection with database*/
  
     if(isset($_POST['login'])) //after log in button press
  {
	  $name = $_POST['uname']; //input deya info gulo variable e store
	  $password =$_POST['pass'];
	  
	  $qry="SELECT * FROM doctor_details WHERE name='$name' AND password='$password'"; //database er info er sathe matching
	  $run = mysqli_query($con,$qry);
	  
	  $row=mysqli_num_rows($run);//row 0 theke  beshi mane milse
	  
	  if($row < 1)
	  {
		  ?>
		  <script>alert('Username or Password not matched !! ');
		  window.open('doclogin.php','_self');
		  </script>
		  <?php
	  }
  
  else{
	  
	  $data =mysqli_fetch_assoc($run);
	  
	  $id=$data['id'];
	 
	  $_SESSION['id']=$id;

	  
	  
	  header('location:doctor/docmenu.php');
	  
  }
  }
  ?>