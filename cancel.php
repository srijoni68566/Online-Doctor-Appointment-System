<?php
include('dbcon.php');

   
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
      background-image:url("images/pink.jfif");
	  background-color: transparent; 
	  background-position: center center;
      background-repeat: no-repeat;
      background-attachment:fixed;
      background-size: cover;
      background-color: #464646;
     }
	 .canceltitle{
	
		color:#8B0000;
		margin-up:100px;
	margin-right:60px;
	margin-left:60px;
	height:120px;
	line-height:160px;
	text-align:center;
	
}
 .form{

		color:#000;
	
	margin-right:60px;
	margin-left:60px;
	height:135px;
	line-height:20px;
	text-align: center;
	
}
 .form2{
	
		color:#000;
	height:130px;
	line-height:20px;
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

<body>
	
<div class="canceltitle" align="center"  >
    <span>
	<h1 style="font-size:40;"align="center">Appointment Checking</h1></span>
	</div>
<br>
	</br>
<div class="form" >
       
<form method="post" action="cancel.php">
     
    <table align="center" width="50%"  height="100">
	   <tr  align="center">
	      <th align="right"><h3>First Name</h3></th>
		    <td align="left">
		       <input type="text" name="firstname" placeholder="Enter First Name" required>
			</td>
	   </tr>
	  
	       <tr align="center">
	      <th align="right" ><h3>Last Name</h3></th>
		    <td align="left">
		       <input type="text" name="lastname" placeholder="Enter Last Name" required>
			</td>
	       </tr>
	   
		
	   </table>
	   <div class="form2">
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
	    


	  <input type="submit" class="btn btn-info" name="submit"  value="Submit">
	  
	   </tr>
	</table>
	</div>
	   

</form>
</div>

<?php
    if(isset($_POST['submit'])){
	
		?>
<table align="center" border="1" width="90%" style="margin-top:140px;  color:#000;">
    <tr align="center">
	   <th>No</th>
	   <th>Name</th>
     	 <th>Doc name</th>
		  <th>Speciality</th>
		   <th>Degree</th>
		   <th>Appointment Date</th>
		  <th>Cancel Appointmnet</th>
	</tr><?php
		$firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
		$day=$_POST['day'];
	    $month=$_POST['month'];
	    $year=$_POST['year'];
		 
		$sql="SELECT CONCAT(patient_details.firstname,' ',patient_details.lastname) AS 'Pname',doctor_details.avail,patient_details.check_appoint,patient_details.id,CONCAT(patient_details.day,'-',patient_details.month,'-',patient_details.year) AS 'appointdate',CONCAT(doctor_details.firstname,' ',doctor_details.lastname) AS 'Dname',doctor_details.speciality,doctor_details.degree FROM patient_details INNER JOIN doctor_details ON doctor_details.id=patient_details.doc_id AND patient_details.firstname LIKE '%$firstname%' AND  patient_details.lastname LIKE '%$lastname%' AND patient_details.day='$day' AND  patient_details.month='$month' AND  patient_details.year='$year';";
		
		$run=mysqli_query($con,$sql);
		
		if(mysqli_num_rows($run)<1)
		{
           ?>
		     <tr align="center" ><td colspan='7'>Sorry!! No appointments</td></tr>;
		   <?php
		}
		
		else
		{
			$count=0;
			while($data=mysqli_fetch_assoc($run)){
				if($data['check_appoint']=='CANCEL'||$data['avail']=='NO'){
					$count++;
					?>
					<tr align="center" >
				 <td><?php echo $count; ?></td>
				 <td><?php echo $data['Pname']; ?></td>
					<td><?php echo $data['Dname']; ?></td>
				     <td><?php echo $data['speciality']; ?></td>
					  <td><?php echo $data['degree']; ?></td>
					 	<td><?php echo $data['appointdate']; ?></td>
					<td >Sorry!!Appointment Cancelled</td></tr>;
					<?php
				}
			
				else{
				
				$count++;
				?>
				<tr align="center" >
				 <td><?php echo $count; ?></td>
	             <td><?php echo $data['Pname']; ?></td>
		           <td><?php echo $data['Dname']; ?></td>
				     <td><?php echo $data['speciality']; ?></td>
					  <td><?php echo $data['degree']; ?></td>
					 	<td><?php echo $data['appointdate']; ?></td>
		           <td><a href="cancelfinal.php?sid=<?php echo $data['id'];?>" style="color:#000;"><u>CANCEL</u></a></td>
				</tr>
				<?php
			}
		}
	}
		}
	
?>
</table>

</body>
</html>

