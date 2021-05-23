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
<?php

	include('../dbcon.php');
	$sid=0;
	
	if(isset($_GET['sid']))
	{
		$sid=$_GET['sid'];

	}
	//echo '<script>console.log("' + $sid + '")</script>';
	$sql="SELECT * FROM doctor_details WHERE id='$sid';";
	
	$run1=mysqli_query($con,$sql);
	
	$data1=mysqli_fetch_assoc($run1);
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
      background-image:url("../images/red 2.jpg");
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
	height:60%;
	line-height:100px;
	font-size:25px;

}
  
</style>
<body>
<div class="admintitle" align="center">
	<h4>
	<a href="admindash.php" style="float:left; margin-left:40px; color:#fff; font-size:20px">Back to Dashboard</a>
	<a href="logout.php" style="float:right; margin-right:70px; color:#fff; font-size:20px">Logout</a></h4>
           <span><h1><b>Admin Dashboard</b></h1></span>
		   
    </div>
	<br>
	</br>
	<div>


     <form method="post" action="adminappointcheckdata.php">
     
    <table align="center" width="60%" style="color:#fff;" height="100">
	
		<tr align="center" >
	      <th align="center" colspan="9"><h3>Appointment Date</h3></th>
		  </tr>
		  <tr >
		  <th>Day</th>
		  <td colspan="2"> 
		       <input type="number" name="day" placeholder="00" required> 
		  </td>
		  
               				<th> Month</th>
		         <td colspan="2" align="center">

		<select name="month" required>
			    <option value="1">January</option>
				<option value="2">February</option>
				<option value="3">March</option>
				<option value="4">April</option>
				<option value="5">May</option>
			    <option value="6">June</option>
                <option value="7">July</option>
	            <option value="8">August</option>
				<option value="9">September</option>
				<option value="10">October</option>
    		    <option value="11">November</option>
                <option value="12">December</option>
                 
		</select>
		</td>
		  
		  
		  <th>Year</th>
		  	 <td>

	   
		       <input type="number" name="year" placeholder="0000" required> 
			  </td>
	   </tr>

	   

	      <tr align="right">
	            <td colspan="9" align="center">

		  	   <input type="hidden" name="doc_id" value="<?php echo $data1['id'];?>" required>
			   <div>
			   <br>
	  <input type="submit" class="btn btn-info" name="submit"  value="Search">
	  </br>
	  </div>
	  </td>
	   </tr>
	</table>
	
	   

</form>
</div>


		
		
 
 

<?php
    if(isset($_POST['submit'])){
		
	$day=$_POST['day'];
	$year=$_POST['year'];
	$month=$_POST['month'];
	$doc_id=$_POST['doc_id'];
	
	$sql="SELECT CONCAT(firstname,' ',lastname) AS 'Pname',pcont,id,check_appoint FROM patient_details WHERE doc_id='$doc_id' AND day='$day' AND month='$month' AND year='$year';";
	
	$run=mysqli_query($con,$sql);
	if(mysqli_num_rows($run)<1)
		{
           ?><script>
		      alert('No Appointments.Thank you');
			 window.open('adminappointcheckdata.php','_self');
		  </script
		   <?php
		  
	  
		}
		else{
			
		?>
		<table align="center" width="50%" height="100" style="color:#fff;">
		   <tr >
		     <th>No</th>
			 <th>Patient Name</th>
			 <th>Patient Conatct No</th>
			 <th>Cancel</th>
		   </tr>
		<?php
		
			$count=0;
			while($data=mysqli_fetch_assoc($run)){
				if($data['check_appoint']=='CANCEL'){
					
					$count++;?>
					<tr border="1">
					<td align="left"><b><?php echo $count; ?></b></td>
             <td colspan="3" align="center" width="100%"><b>Appointment cancelled</b></td>
			 </tr>
					<?php
				}
				else{
				$count++;
				?>
				<tr align="left">
				 <td><?php echo $count; ?></td>
	             <td><?php echo $data['Pname']; ?></td>
		           <td>0<?php echo $data['pcont']; ?></td>
                      <td><a href="admincancel.php?sid=<?php echo $data['id'];?>">Cancel</a></td>
				   
				</tr><?php
			
		}
	}
	}
	}
		?>

</table>
	
</body>
</html>


		
		