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
	
	 <title>Appoint Check</title>
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
      background-image:url("../images/gru.jpg");
	  background-color: transparent; 
	  background-position: center center;
      background-repeat: no-repeat;
      background-attachment:fixed;
      background-size: cover;
      background-color: #464646;
	  color:#800000;
     }
	 .docprofile{
	
		color:#fff;
		margin-up:100px;
	margin-right:60px;
	margin-left:0px;
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
<h4><a href="doclogout.php" style="float:right; margin-right:30px; font-size:20px;color:#000;"><u><b>Logout</b></u></a></h4>
	<h4><a href="docmenu.php" style="float:left; margin-left:0px; font-size:20px;color:#fff;"><u><b>Back to menu board</b></u></a></h4>
	<span>
     <h1 ><b align="center">Appointments</b></h1>

	 </span>
	 </div>
	 <br>
	 </br>
     <form method="post" action="appointcheck.php">
     
    <table align="center" width="50%"  height="100">
	
		<tr align="center" >
	      <th align="center" colspan="9"><h4>Appointment Date</h4></th>
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
	    


	  <input type="submit" class="btn btn-info"  name="submit"  value="Submit">
	  
	   </tr>
	</table>
	
	   

</form>
<?php
    include('../dbcon.php');
   if(isset($_POST['submit'])){
	   $day=$_POST['day'];
	    $month=$_POST['month'];
	   $year=$_POST['year'];
     $id=$_SESSION['id'];

	  $sql="SELECT CONCAT(firstname,' ',lastname) AS 'Pname',pcont,id,patient_details.check_appoint FROM patient_details WHERE doc_id='$id' AND day='$day' AND month='$month' AND year='$year';";
		
		$run=mysqli_query($con,$sql);
		
		if(mysqli_num_rows($run)<1)
		{
           ?><script>
		      alert('No Appointments For you.Thank you');
			 window.open('docmenu.php','_self');
		  </script
		   <?php
		  
	  
		}
		else
		{ ?>
	
		<table align="center" width="50%" style="margin-top:50px;  color:#000;" height="100">
		   <tr >
		     <th align="center"><h5>No</h5></th>
			 <th align="center"><h5>Patient Name</h5></th>
			 <th align="center"><h5>Patient Conatct No</h5></th>
			  <th align="center"><h5>Cancel</h5></th>
		   </tr>
		<?php
		
			$count=0;
			while($data=mysqli_fetch_assoc($run)){
								
				if($data['check_appoint']=='CANCEL'){
					
					$count++;?>
					<tr border="1">
					<td align="left"><b><?php echo $count; ?></b></td>
             <td colspan="3" align="center"><b>Appointment cancelled</b></td>
			 </tr>
					<?php
				}
				else{
				$count++;
				?>
				<tr align="center">
				 <td align="left"><b><?php echo $count; ?></b></td>
	             <td align="left"><b><?php echo $data['Pname']; ?></b></td>
		           <td align="left"><b>0<?php echo $data['pcont']; ?><b></td>
		           <td align="left"><a href="doccancel.php?sid=<?php echo $data['id'];?>"><b>Cancel</b></a></td>
				   
				</tr><?php
			}
		}
   }
   
   
   }		?>

</table>


</body>
</html>
