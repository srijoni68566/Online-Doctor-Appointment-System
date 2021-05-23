<?php
include('../dbcon.php');

    
	  
	   $firstname=$_POST['firstname'];
	  $lastname=$_POST['lastname'];
	  $limitt=$_POST['limitt'];
	  $degree=$_POST['degree'];
	  $speciality=$_POST['speciality'];
	  $stime=$_POST['start_time'];
	  $ftime=$_POST['finish_time'];
	  $contact=$_POST['doc_contact'];
	  $fee=$_POST['fee'];
	  $avail=$_POST['avail'];
	  $id=$_POST['sid'];
	  
	  	  if($avail=='NO'){
		  $sql2="UPDATE patient_details SET check_appoint='CANCEL' WHERE doc_id='$id';";
		  $run3=mysqli_query($con,$sql2);
	  }
	 
	  
	  $qry ="UPDATE doctor_details SET avail='$avail',firstname='$firstname',lastname='$lastname',degree='$degree',limitt='$limitt',speciality='$speciality',start_time='$stime',finish_time='$ftime',fee='$fee',doc_contact='$contact'
	        WHERE id=$id;";
	        
			 
	  $run=mysqli_query($con,$qry);
	  
	  if($run==true){
		  ?>
		  <script>
		      alert('Data Updated successfully');
			 window.open('updateform.php?sid=<?php echo $id;?>','_self');
		  </script>
	  <?php
	  }
	  ?>