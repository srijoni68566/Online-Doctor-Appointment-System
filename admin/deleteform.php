<?php
include('../dbcon.php');

    $id=$_REQUEST['sid'];
	  
	  	$sql="UPDATE patient_details SET check_appoint='CANCEL' WHERE doc_id='$id'";
	
	$run=mysqli_query($con,$sql);
	
	if($run==true){
		
	$SQL="UPDATE doctor_details SET name='Profile_deleted',firstname='profile_deleted',lastname='profile_deleted',fee='0',degree='profile_deleted',limitt='0',doc_contact='0',speciality='profile_deleted',start_time='0',finish_time='0', password='NULL' WHERE id='$id'";

	
	$run2=mysqli_query($con,$SQL);
	if($run2==true){
		?>
		 <script>
		      alert('Doctor Deleted successfully');
			 window.open('deletedoc.php','_self');
		  </script>
		  <?php
	}
	}
	?>
	  

	        
			 
	
	  
	 
