<?php
include('dbcon.php');

    $id=$_REQUEST['sid'];
	  
	  $qry ="DELETE FROM patient_details WHERE id='$id';";
	        
			 
	  $run=mysqli_query($con,$qry);
	  
	  if($run==true){
		  ?>
		  <script>
		      alert('Appointment cancelled successfully');
			 window.open('index.php','_self');
		  </script>
	  <?php
	  }
	  ?>
	