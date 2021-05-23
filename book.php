<?php

include('dbcon.php');

    $id=0;
	
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];

	}
	
	
	$sql="SELECT * FROM doctor_details WHERE id='$id';";
	
	$run=mysqli_query($con,$sql);
	
	$data=mysqli_fetch_assoc($run);
?>
	

<!DOCTYPE HTML>
<html lang="en_US">
<head>
    <meta charset="UTF-8">
	
	 <title>HELLO DOC!!!!!</title>
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
      background-image:url("images/colory.jpg");
	  background-color: transparent; 
	  background-position: center center;
      background-repeat: no-repeat;
      background-attachment:fixed;
      background-size: cover;
      background-color: #464646;
     }
	 .booktitle{

		color:#fff;
		margin-up:100px;
	margin-right:60px;
	margin-left:60px;
	height:150px;
	line-height:160px;
	text-align: center;
	
}
div{
	text-align: center;
}
span {
  display: inline-block;
  vertical-align: middle;
  line-height: normal;
}
	 </style>
<body >

  <div class="booktitle" align="center"  >
    <span>
	<h1 style="font-size:45px;"align="center">Fill up the Form for booking</h1></span>
	</div>

 <div >
         <form method="post" action="book.php">

              
     <table align="center" width="50%"  height="200" >
	    <tr  align="center">
	      <th align="right" ><h3>First Name</h3></th>
		    <td align="left" >
		       <input type="text" name="firstname" placeholder="Enter First Name" required>
			</td>
	   </tr>
	    <tr  align="center">
	      <th align="right"><h3>Last Name</h3></th>
		    <td align="left">
		       <input type="text" name="lastname" placeholder="Enter Last Name" required>
			</td>
	   </tr>
	   
	   
	   <tr align="center">
	      <th align="right" ><h3>Contact no</h3></th>
		  <td align="left" > 
		       <input type="number" name="pcont" placeholder="Enter Contact no" required> 
		  </td>
	   </tr>
	   
	  
	   <tr align="center">
	      <th align="right" ><h3>Age</h3></th>
		  <td align="left"> 
		       <input type="number" name="age" placeholder="Enter Your Age" required> 
		  </td>
	   </tr>
	   
	    </table>
		<table align="center"  width="50%">
	
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
	    
	   <input type="hidden" name="doc_id" value=<?php echo $data['id']; ?> required>
<br></br>
	  <input type="submit" class="btn btn-info" name="submit"  value="Submit">
	  
	   </tr>
	</table>
</form>
    </div>
   



</body>
</html>

	<?php

if(isset($_POST['submit']))
{ 
	
      $firstname=$_POST['firstname'];
	  $pcont=$_POST['pcont'];
	  $doc_id=$_POST['doc_id'];
	  $day=$_POST['day'];
	  $month=$_POST['month'];
	  $year=$_POST['year'];
	  $age=$_POST['age'];
	  $lastname=$_POST['lastname'];
	  $qry="SELECT doctor_details.firstname,patient_details.firstname ,doctor_details.limitt FROM doctor_details INNER JOIN patient_details ON patient_details.doc_id=doctor_details.id WHERE patient_details.day='$day' AND patient_details.month='$month' AND patient_details.year='$year' AND doctor_details.id='$doc_id' AND patient_details.doc_id='$doc_id';";

	$run1=mysqli_query($con,$qry);
	$data1=mysqli_fetch_assoc($run1);
     		if((mysqli_num_rows($run1)<$data1['limitt'])||$data1['limitt']==0){
	$SQL ="INSERT INTO patient_details(firstname,pcont,doc_id,day,month,year,age,lastname)VALUES
	       ('$firstname','$pcont','$doc_id','$day','$month','$year','$age','$lastname')";
      $run2=mysqli_query($con,$SQL);
			 if($run2==true){
		  ?>
		  <script>
		  			 window.open('smile.php','_self');
		      alert('Appointed successfully.Please check your appointment before visiting.Appointments can be cancelled For Unavoidable Circumstances.Thank you!!!');

		  </script><?php
	        
}
	 else{
		  ?>
		  <script>
		      alert('Insert again.Thank you!!!');
			 window.open('book.php','_self');
		  </script><?php

}
}
else
{
	 ?>
		  <script>
		      alert('Sorry.Appointment limit exceeded for this day of this doctor.Please book another Day or Another Doctor.Thank you!!!');
			 window.open('book.php','_self');
		  </script><?php

}
}

?>