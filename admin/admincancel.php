<?php
include('../dbcon.php');

    $id=$_GET['sid'];
	  
	  	  $qry ="UPDATE patient_details SET check_appoint='CANCEL' WHERE id='$id';";
	        
			 
	  $run=mysqli_query($con,$qry);
	  
	  if($run==true){
		  ?>
		  <script>
		      alert('Appointment cancelled successfully');
			 window.open('adminappointcheck.php','_self');
		  </script>
	  <?php
	  }
	  ?>
	