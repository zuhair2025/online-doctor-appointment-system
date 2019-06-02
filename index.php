<?php 
	session_start();
	if(isset($_SESSION['adminId'])){
		
		 header('Location:main/dashboard.php');
	}else if(isset($_SESSION['doctorId'])){
		
		 header('Location:main/doctorsdashboard.php');
	}else if(isset($_SESSION['userId'])){
		
		 header('Location:main/patientsdashboard.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment</title>
	<link rel="stylesheet" href="main/css/bootstrap.css"/>
	<script src="main/js/bootstrap.js" ></script>
   
   
  
</head>
<body style="background: url(main/images/library.jpg) no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;  ">
<br/>
<div class="container-fluid body-content">
    <h1 style="color: #10ECFB; text-align: center; font-size:60px; ">Welcome To Doctor Appointment System</h1>
    <div style="text-align: center; margin-top:100px;">
		 <a href="login.php" class="btn btn-success btn-lg" >Admin Login</a>
                 <a href="doctorslogin.php" class="btn btn-warning btn-lg" >Doctor Login</a>
                 <a href="patientslogin.php" class="btn btn-primary btn-lg" >Patients Login</a>
	</div>
   
   <footer style="margin-top:200px; text-align: center;">
        <p><span style="color: #2D10E8; font-size: 40px; ">&copy; <?php date_default_timezone_set("Asia/Dhaka"); echo date("Y-m-d H:i:s");?> </span>- <span style="color: #18D7E5; font-size: 50px;">Doctor Appointment System</span></p>
    </footer>

</div>

 
</body>
</html>