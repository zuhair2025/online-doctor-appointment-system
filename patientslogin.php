<?php include 'main/connect.php'?>
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
<?php
if(isset($_POST['login'])){
   $email=$_POST["email"];
   $password=$_POST["password"];
   
   $sql="SELECT * FROM tbl_user WHERE userEmail='$email' AND userPassword='$password'";
    if(mysqli_query($conn,$sql)){
            $query_result=mysqli_query($conn,$sql);
            $user_info=mysqli_fetch_assoc($query_result);
            if($user_info){
                //session_start();
                $_SESSION['userName']=$user_info['userName'];
                $_SESSION['userId']=$user_info['userId'];
                
                header('Location:main/patientsdashboard.php');
            }else{
                $message="Your email address or password invalid";
                
            }


        }
        else{
            die("Query problem".mysqli_error($conn));
        }
   
}


?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="main/css/screen.css">
  
`<style>
	.back{
		color:#9109FB;
		text-decoration:none;
	}
	.back:hover{
		color:#0ECF86;
		
	}
	.error{
		color:red;
		font-style: italic;
	}
</style>	

  
</head>

<body style="background: url(main/images/library.jpg) no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; ">

  <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Log in</h2>

  <form class="login-container" id="loginFrom" method="POST">
	
    <p><input type="email" name="email" placeholder="Email..."></p>
    <p><input type="password" name="password" placeholder="Password..."></p>
    <p><input type="submit" name="login" value="Log in"></p>
    <p>No Account ? Please <a href="patientsSignup.php" class="back">Sign Up</a></p>
	<p class="error">
		<?php 
			if(isset($message)){
				echo $message;
				$message="";
			}
		?>
	</p>
  </form>
  <h2 class="login-header"><a href="index.php" class="back">Back</a></h2>
</div>

<script src="main/lib/jquery.js"></script>
<script src="main/dist/jquery.validate.js"></script>
 <script>
	$().ready(function() {
		$(".error").fadeOut(4000);

		// validate signup form on keyup and submit
		$("#loginFrom").validate({
			rules: {
				email: "required",
				password: "required"
				
			},
			messages: {
				email: "Please Enter Your Email",
				password: "Please Enter Your Password"
				
			}
		});
		
	});	

</script> 

</body>

</html>
