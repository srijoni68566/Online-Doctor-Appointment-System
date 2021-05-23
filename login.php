<?php
	  session_start();
	  if (isset($_SESSION['uid']))
	  {
		  header('location:admin/admindash.php');
	  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin login</title>
<meta Charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet" type="text/css">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	  	<h4 align="right" style="margin-right:20px; margin-top:20px;"><a href="index.php"><u>Home</u></a></h4>
	</head>
	<style>
	*{color:#fff;}


.form-container{
	boder:0px solid #fff;padding:50px 60px;margin-top:0vh;
	margin-right:400px;
	margin-left:400px;
-webkit-box-shadow:-1px 4px 20px 11px rgba(0,0,0,0.75);
-moz-box-shadow: -1px 4px 20px 11px rgba(0,0,0,0.75);
box-shadow: -1px 4px 20px 11px rgba(0,0,0,0.75);
}
   body{
      background-image:url("images/Shadow.jpg");
	  background-color: transparent; 
	  background-position: center center;
      background-repeat: no-repeat;
      background-attachment:fixed;
      background-size: cover;
      background-color: #464646;
     }
	 	 .logintitle{
	
		color:#8B0000;
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
     <h1 align="center">Admin Login</h1>
	 </span>
	 </div>
	 <br>
	 </br>
	 
	 <div class="form-container">
	 <form action="login.php" method="post">
	   
		<table align="center" style="color:#DCDCDC;">
		    <tr>
			   <td align="right" ><h5><b style="color:#000000;">Username</b></h5></td><td><input type="text" name="uname" value="Enter User Name"  required</td>
			</tr>
			
    <tr>
	<td></td>
	</tr>
	<tr>
	<td></td>
	</tr>
	        <tr>
			   <td align="right"><h5><b style="color:#000000;">Password</b></h5></td><td><input type="password" name="pass" value="Enter password" required</td>
			</tr>
						
    <tr>
	<td></td>
	</tr>
	<tr>
	<td></td>
	</tr>

			<tr align="right">
			
	   <td colspan="2" align="center">
	   
	    	  <input type="submit" class="btn btn-success" name="login"  value="Login">
	  
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
	  $username = $_POST['uname']; //input deya info gulo variable e store
	  $password =$_POST['pass'];
	  
	  $qry="SELECT * FROM admin WHERE userName='$username' AND password='$password'"; //database er info er sathe matching
	  $run = mysqli_query($con,$qry);
	  
	  $row=mysqli_num_rows($run);//row 0 theke  beshi mane milse
	  
	  if($row < 1)
	  {
		  ?>
		  <script>alert('Username or Password not matched !! ');
		  window.open('login.php','_self');
		  </script>
		  <?php
	  }
  
  else{
	  
	  $data =mysqli_fetch_assoc($run);
	  
	  $id=$data['id'];
	  

	  $_SESSION['uid']=$id;
	  header('location:admin/admindash.php');
	  
  }
  }
  ?>
  