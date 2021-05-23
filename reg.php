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
  	
</head>
<style>

     body{
      background-image:url("images/palok.jpg");
	  background-color: transparent; 
	  background-position: center center;
      background-repeat: no-repeat;
      background-attachment:fixed;
      background-size: cover;
      background-color: #464646;
     }
	 .regtitle{
	
		color:#7fffD4;
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

 <div class="regtitle">
	<span>
     <h1 ><b align="center"><i>Join With Us</i></b></h1>

	 </span>
	 </div>

	 <div>
	 <br>
	 </br>
<form method="post" action="reg.php">
     
    <table align="center" width="40%" height="200" style="color:#fff;">
	   
	   	  <tr align="center">
	      <td><h6>First Name</h6></td>
		    <td align="center">
		       <input type="text" name="firstname" placeholder="Enter First Name" required>
			</td>
	   </tr>
	   
	   	   <tr align="center">
	      <td><h6>Last Name</h6></td>
		    <td>
		       <input type="text" name="lastname" placeholder="Enter Last Name" required>
			</td>
	   </tr>
	   
	   <tr align="center">
	      <td><h6>User Name</h6></td>
		    <td>
		       <input type="text" name="name" placeholder="Enter User Name" required>
			</td>
	   </tr>
	   
	   <tr "align="center">
	      <td align="center"><h6>Speciality</h6></td>
		    <td align="center">
		    <select name="speciality" required>
			    <option value="Medicine">Medicine</option>
				<option value="Cardiologist">Cardiologist</option>
				<option value="Surgeon">Surgeon</option>
				<option value="Psychiatrist">Psychiatrist</option>
				<option value="Pediatrician">Pediatrician</option>
			    <option value="Neorologist</">Neorologist</option>
                <option value="opthalmologist">opthalmologist</option>
	            <option value="Dentist">Dentist</option>
                <option value="Gynecologist">Gynecologist</option>
    		   <option value="Nephrologist">Nephrologist</option>
			   <option value="Oncologist">Oncologist</option>
				<option value="Gastroenterologist">Gastroenterologist</option>
				<option value="Dermatologist">Dermatologist</option>
				<option value="Neurosurgeon">Neurosurgeon</option>
			</select>
            </td>
	   </tr>
	   <tr  align="center">
	      <td><h6>Start time of serving</h6></td>
		  <td> 
		       <input type="number" name="stime" placeholder="24 hour format" required>
		  </td>
	   </tr>
	   <tr  align="center">
	      <td><h6>Finish time of serving</h6></td>
		  <td>
		       <input type="number" name="ftime" placeholder="24 hour format" required>
		  </td>
	   </tr>
	   <tr align="center">
	      <td><h6>Contact no</h6></td>
		  <td>
		       <input type="number" name="contact" placeholder="Enter contact no " required>
		  </td>
	   </tr>
	    <tr  align="center">
	      <td><h6>Fee</h6></td>
		  <td>
        <input type="number" name="fee" placeholder="Enter Fee" required>
		</td>
	   </tr>
	   	  
		  	 <tr align="center">
	      <td><h6>Degree</h6></td>
		    <td>
		       <input type="text" name="degree" placeholder="Include Your Degree" required>
			</td>
	   </tr>
	  
	   	      <td align="center"><h6>Patient limit Per day</h6></td>
		    <td align="center">
		       <input type="number" name="limitt" placeholder="Include/Enter 0" required>
			</td>
	   </tr>
		  
	   <tr align="center">
			   <td><h6>password</h6></td>
			    <td><input type="password" name="password" placeholder="Enter password " required</td>
	    </tr>
	   
<tr>
<td>
</td>
</tr>
<tr>
<td>
</td>
</tr>
	   <tr align="right">
	   
	   	<td colspan="2" align="center"><input type="submit" class="btn btn-info" name="submit"  value="Submit"></td>
	   </tr>
	</table>

</form>
</div>
</body>
</html>
<?php //database e info gula pathate
  if(isset($_POST['submit']))
  {
	  include('dbcon.php');
	  
	  $firstname=$_POST['firstname'];
	  $lastname=$_POST['lastname'];
	  $limitt=$_POST['limitt'];
	  $name=$_POST['name'];
	  $degree=$_POST['degree'];
	  $speciality=$_POST['speciality'];
	  $stime=$_POST['stime'];
	  $ftime=$_POST['ftime'];
	  $contact=$_POST['contact'];
	  $fee=$_POST['fee'];
	  $password=$_POST['password'];
		  
		  $qry="SELECT password FROM doctor_details WHERE password='$password';";
	
	  $run=mysqli_query($con,$qry);
	   $row=mysqli_num_rows($run);
	 if($row<1){
		  $SQL ="INSERT INTO doctor_details(avail,name,speciality,start_time,finish_time,doc_contact,fee,password,firstname,lastname,degree,limitt)VALUES
	       ('YES','$name','$speciality','$stime','$ftime','$contact','$fee','$password','$firstname','$lastname','$degree','$limitt');";
		    $run1=mysqli_query($con,$SQL);
			 if($run1==true){
		  ?>
		  <script>
		      alert('you registered successfully.Thank you!!!');
			 window.open('doclogin.php','_self');
		  </script>
		  <?php
		  	
	  }

	 }
	 else{?>
		 <script>
		      alert('Password is common.Please give another password and register again.Thank you!!!');
			  window.open('reg.php','_self');
		  </script>
		  <?php
		  	 
	 }
  }
		 

	  ?>
	  
	
 