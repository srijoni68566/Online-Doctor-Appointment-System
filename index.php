<!doctype html>
<html lang="en">
  <head>
  <title>HELLO DOC!!!!!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
   <style>
   
   body{
      background-image:url("images/medicine.jpg");
      
	  background-color: transparent; 
	  background-position: center center;
      background-repeat: no-repeat;
      background-attachment:fixed;
      background-size: cover;
      background-color: #464646;
     }

	 
   .container2 {
   padding-right: 30px;
   padding-left: 15px;
   margin-right: auto;
   margin-left: auto;
   max-width: 900px;
   overflow:hidden;
   min-height:80px !important;
   background-color: #AFEEEE;
   padding: 55px;
   
   }
   </style>
   
   
   </head>
  

<body>
<nav class="navbar navbar" ">
  <div class="container-fluid">
     <div class="navbar-header ">
      
    </div>
    <ul class="nav navbar-nav ">
      
      <li ><a href="login.php" style="color:#000;"><b><u>Admin Log in</u></b></a></li>
      <li><a href="doclogin.php"style="color:#000;"><b><u>Doctor log in</u></b></a></li>
     
    </ul>
  </div>
</nav>

  
	 <div class="container2 " height:"auto" align="center">
	
		<h1 class="text-center"><i>HELLO DOC!!!!</i></h1>
    
     </div>

		 
      <div >
         <form method ="post" action="index.php">

              <div align="center">
                  <h2 class="text-center">Doctor Information</h2>
              </div>

          <table align="center" >
	         <tr>
                 <th style="font color:"#FFFFFF">Choose Speciality</th>
		            <td>
		
		    <select name="speciality" required>
			    <option value="Medicine">Medicine</option>
				<option value="Cardiologist">Cardiologist</option>
				<option value="Surgeon">Surgeon</option>
				<option value="Psychiatrist">Psychiatrist</option>
				<option value="Pediatrician">Pediatrician</option>
			    <option value="Neorologist">Neorologist</option>
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
		
             <tr>
               <th align="left">Choose Fee</th>
		         <td>
				 
		<select name="fee" required>
			    <option value="500">Less than 500</option>
				<option value="1000">500-1000</option>
				<option value="1500">1000-1500</option>
				
		</select>
		</td>
       </tr>
    <tr>
      <td colspan="2" align="center">
	   <input type="submit" class="btn btn-info" name="submit"  value="Show details">
	   </td>

	</tr>

</table>
</form>
    </div>
	
<div >
  <table align="center" width="50%">
   
	   <tr ><th class="text-center">Wanna Check your Appointment? Click BELLOW</th></tr>
      <tr> <td class="text-center" style="background-color:#ffff;" align="center"><a href="cancel.php">Check Appointment</a></td></tr>
   
  </table>
</div>


<?php

	
    if(isset($_POST['submit'])){?>
		<table align="center" width="80%"  style="margin-top:10px">
    <tr style="color:#000;">
	   <th>No</th>
	   <th>Name</th>
	    <th>Doctor Contact no</th>
		 <th>Start time of serving</th>
		   <th>Finish time of serving</th>
		   	 <th>Degree</th>
			 <th>fee</th>
		  <th>Appointment</th>
		 
	</tr>
	<?php
		include('dbcon.php');
		
		$speciality=$_POST['speciality'];
		$fee=$_POST['fee'];
		if($fee==1000)

			{
	$sql="SELECT CONCAT(firstname,' ',lastname) AS 'docName',doc_contact,id,start_time,finish_time,degree,fee,avail FROM doctor_details WHERE speciality='$speciality' AND fee BETWEEN 501 AND '$fee' ;";
		}			
		else if($fee==1500)

			{
	$sql="SELECT CONCAT(firstname,' ',lastname) AS 'docName',doc_contact,id,start_time,finish_time,degree,fee,avail FROM doctor_details WHERE speciality='$speciality' AND fee BETWEEN 1001 AND '$fee' ;";
		}	
else	
{	
		$sql="SELECT CONCAT(firstname,' ',lastname) AS 'docName',doc_contact,id,start_time,finish_time,degree,fee,avail FROM doctor_details WHERE speciality='$speciality' AND fee<='$fee';";
}

		$run=mysqli_query($con,$sql);
		
		if(mysqli_num_rows($run)<1)
		{
           ?>
		     <tr align="center"><td colspan='8'>Sorry!! No doctor found</td></tr>;
		   <?php
		}
		else
		{
			$count=0;
			while($data=mysqli_fetch_assoc($run)){
				if($data['avail']=='NO'){
					
					$count++;
					?>
					<tr align="left"style="background-color:#fff;">
				 <td><?php echo $count; ?></td>
	                <td><?php echo $data['docName']; ?></td>
		              <td>0<?php echo $data['doc_contact']; ?></td>
					  <td><?php echo $data['start_time']; ?> (24 hour format)</td>
                        <td><?php echo $data['finish_time']; ?> (24 hour format)</td>
					      <td><?php echo $data['degree']; ?></td>
					    <td><?php echo $data['fee']; ?></td>
		               <td >Not Available Today</td>
					   </tr>
		   <?php
				}
				else{
				$count++;
				?>
				<tr align="left"style="background-color:#fff;">
				 <td><?php echo $count; ?></td>
	                <td><?php echo $data['docName']; ?></td>
		              <td>0<?php echo $data['doc_contact']; ?></td>
				        <td><?php echo $data['start_time']; ?> (24 hour format)</td>
                        <td><?php echo $data['finish_time']; ?> (24 hour format)</td>
					      <td><?php echo $data['degree']; ?></td>
					    <td><?php echo $data['fee']; ?></td>
		           <td><a href="book.php?id=<?php echo $data['id'];?>">Appoint</a></td>

				   
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


