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
	
	 <title>Doc Log in</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="css/style.css" rel="stylesheet" type="text/css">
  		<h4><a href="doclogout.php" style="float:right; margin-right:30px; font-size:20px;color:#000;"><b><u>Logout</u></b></a></h4>
	<h4><a href="docmenu.php" style="float:left; margin-left:30px; font-size:20px;color:#000;"><b><u>Back to menu board</u></b></a></h4>
</head>
<style>

     body{
      background-image:url("../images/zero.jpg");
	  background-color: transparent; 
	  background-position: center center;
      background-repeat: no-repeat;
      background-attachment:fixed;
      background-size: cover;
      background-color: #464646;
	  color:#000;
     }
	 .docprofile{
	
		color:#000;
		margin-up:100px;
	margin-right:60px;
	margin-left:30px;
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

<div class="docprofile">
	<span>
     <h1 ><b align="center"><i>Re-Design Your Profile</i></b></h1>

	 </span>
	 </div>

	 <div>
	 <br>
	 </br>

<?php
    
	include('../dbcon.php');
	
	$id=$_SESSION['id'];
	
	$sql="SELECT * FROM doctor_details WHERE id='$id'";
	
	$run=mysqli_query($con,$sql);
	
	$data=mysqli_fetch_assoc($run);
?>
<div>
<form method="POST" action="docprofile.php" enctype="multipart/form-data">
     
    <table align="center" width="50%" height="200">
	   
	    <tr align="center" >
	      <td ><h6 ><b>First Name</b></h6></td>
		    <td align="left">
		       <input type="text" name="firstname" value=<?php echo $data['firstname']; ?> required>
			</td>
	   </tr>
	   
	   <tr align="center">
	      <td><h6><b>Last Name</b></h6></td>
		    <td align="left">
		       <input type="text" name="lastname" value=<?php echo $data['lastname']; ?> required>
			</td>
	   </tr>
	   
	   <tr align="center">
	      <td><h6><b>Name</b></h6></td>
		    <td align="left">
		       <input type="text" name="name" value=<?php echo $data['name'];?> required>
			</td>
	   </tr>
	   <tr align="center">
	      <td><h6><b>Speciality</b></h6></td>
		  <td align="left"> 
		       <input type="text" name="speciality" value=<?php echo $data['speciality']; ?> required> 
		  </td>
	   </tr>
	   
	   <tr align="center">
	      <td><h6><b>Degree</b></h6></td>
		    <td align="left">
		       <input type="text" name="degree" value=<?php echo $data['degree']; ?> required>
			</td>
	   </tr>
	   
	   <tr align="center">
	      <td><h6><b>Start Time of serving(24 hour format)</b></h6></td>
		  <td align="left"> 
		       <input type="number" name="start_time" value=<?php echo $data['start_time'] ;?> required>
		  </td>
	   </tr>
	   <tr align="center">
	      <td><h6><b>Finish time of serving(24 hour format)</b></h6></td>
		  <td align="left">
		       <input type="number" name="finish_time" value=<?php echo $data['finish_time'] ;?> required>
		  </td>
	   </tr>
	   <tr  align="center">
	      <td><h6><b>Contact no of Doctor</b></h6></td>
		  <td align="left">
		       <input type="number" name="doc_contact" value=0<?php echo $data['doc_contact']; ?> required>
		  </td>
	   </tr>
	   	   <tr  align="center">
	      <td><h6><b>Fee of Doctor</b></h6></td>
		  <td align="left">
		       <input type="number" name="fee" value=<?php echo $data['fee']; ?> required>
		  </td>
	   </tr>
	   
	   	   <tr align="center">
	      <td><h6><b>Patient limit per day</b></h6></td>
		    <td align="left">
		       <input type="number" name="limitt" value=<?php echo $data['limitt']; ?> required>
			</td>
	   </tr>
	   
	    <tr  align="center">
	      <td><h6><b>Password</b></h6></td>
		  <td align="left">
		       <input type="text" name="password" value=<?php echo $data['password']; ?> required>
		  </td>
	   </tr>
	   	   <tr align="center">
	      	      <td><h6><b>Availability(YES/NO)</b></h6></td>
		    <td align="left">
		       <input type="text" name="avail" value=<?php echo $data['avail'];?> required>
			</td>
	   </tr>
	   
	   <tr align="center">
	   
	   <td colspan="2"  align="center">
	   
	   <input type="hidden" name="sid" value="<?php echo $data['id'];?>"/>
	  <input type="submit" class="btn btn-info" name="submit"  value="Submit"></td>
	   
	   </tr>
	</table>

</form>
</div>
</body>
</html>
<?php
   
    if(isset($_POST['submit'])){
   	  $firstname=$_POST['firstname'];
	  	  $lastname=$_POST['lastname'];
		  	  $name=$_POST['name'];
	  $degree=$_POST['degree'];
	  $speciality=$_POST['speciality'];
	  $start_time=$_POST['start_time'];
	  $finish_time=$_POST['finish_time'];
	  $doc_contact=$_POST['doc_contact'];
	  $fee=$_POST['fee'];
	  	  $limitt=$_POST['limitt'];
	  $password=$_POST['password'];
	  $avail=$_POST['avail'];
	  $id=$_POST['sid'];
	  if($avail=='NO'){
		  $sql2="UPDATE patient_details SET check_appoint='CANCEL' WHERE doc_id='$id';";
		  $run3=mysqli_query($con,$sql2);
	  }
	  $SQL="SELECT password,id FROM doctor_details WHERE password='$password';";
	
	  $run1=mysqli_query($con,$SQL);
	  	$data1=mysqli_fetch_assoc($run1);
	   $row1=mysqli_num_rows($run1);

	  	 if($row1<1||$data1['id']==$id){
	  $qry ="UPDATE doctor_details SET avail='$avail',lastname='$lastname',firstname='$firstname',degree='$degree',limitt='$limitt', name='$name',speciality='$speciality',start_time='$start_time',finish_time='$finish_time',fee='$fee',doc_contact='$doc_contact'
	      ,password='$password'  WHERE id=$id;";
	        
			 
	  $run=mysqli_query($con,$qry);
	  
	  if($run==true){
		  ?>
		  <script>
		      alert('Data Updated successfully');
			 window.open('../doclogin.php?sid=<?php echo $id;?>','_self');
		  </script>
	  <?php
	  	 
	  }
		 }
		 else{?>
		 <script>
		      alert('Password is common.Please give another password and register again.Thank you!!!');
			  window.open('docprofile.php','_self');
		  </script>
		  <?php
		  	 
	 }
	}
	  ?>
