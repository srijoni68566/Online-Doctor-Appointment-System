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
      background-image:url("../images/rongdhonu.jpg");
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
	background-color:#GGGG33;
	color:#000;
	margin-right:10px;
	margin-left:10px;
	height:120px;
	line-height:140px;
	
}
.dashboard{
	
	color:#000;
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
	<a href="admindash.php" style="float:left; margin-left:40px; color:#000; font-size:20px">Back to Dashboard</a>
	<a href="logout.php" style="float:right; margin-right:70px; color:#000; font-size:20px">Logout</a></h4>
           <span><h1><b>Admin Dashboard</b></h1></span>
		   
    </div>
	<br>
	</br>
<div>

 <form action="adminappointcheck.php" method="post">
 <table align="center" width="100%">
    <tr>
	    <th style="color:#000;"><h5>Choose Speciality</h5></th>
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

	    <th style="color:#000;"><h5>Enter Doctor's First Name</h5></th>
		<td>
		        <input type="text" name="firstname" placeholder="Enter First name" required="required"/>
        </td>
		
		<th style="color:#000;"><h5>Enter Doctor 's Last Name</h5></th>
		<td>
		        <input type="text" name="lastname" placeholder="Enter Last name" required="required"/>
        </td>
		</tr>
		<tr align="center" colspan="3">
		  <td align="center" colspan="6">
	    <div>
		<br>
		</br>
	  <input type="submit" class="btn btn-info"  name="submit"  value="Search">
	  </div>
	   </tr>
	</table>
		  
  </form>
  </div>
   <?php
if(isset($_POST['submit'])){?>
 <table align="center" width="80% style="margin-top:10px">
    <tr style="color:#000;">
	   <th>No</th>
	   <th>Name</th>
	    <th>Doctor Contact no</th>

		   	 <th>fee</th>
		  <th>Appointments</th>
	</tr>
<?php
		include('../dbcon.php');
		
		$speciality=$_POST['speciality'];
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$sql="SELECT CONCAT(firstname,' ',lastname) AS 'Dname',id,doc_contact,fee FROM doctor_details WHERE speciality='$speciality' AND firstname LIKE '%$firstname%' AND lastname LIKE '%$lastname%';";
		$run=mysqli_query($con,$sql);
		
		if(mysqli_num_rows($run)<1)
		{
           ?>
		     <tr align="center" style="color:#000;"><td colspan='5'>Sorry!! No records found</td></tr>;
		   <?php
		}
		else
		{
			$count=0;
			while($data=mysqli_fetch_assoc($run)){
				$count++;
				?>
				<tr align="left" style="color:#000">
				 <td><?php echo $count; ?></td>
	             <td><?php echo $data['Dname']; ?></td>
		           <td>0<?php echo $data['doc_contact']; ?></td>
				     <td><?php echo $data['fee'];?></td>
                      <td ><a href="adminappointcheckdata.php?sid=<?php echo $data['id'];?>" style="color:#000;"><u>Appointments</u></a></td>
				</tr>
				<?php
			}
		}
	}
?>
</table>		
 
 </body>
 </html>
 
 