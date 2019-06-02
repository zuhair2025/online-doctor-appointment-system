<?php include 'main/connect.php' ?>
<?php
session_start();
if (isset($_SESSION['adminId'])) {

    header('Location:main/dashboard.php');
} else if (isset($_SESSION['doctorId'])) {

    header('Location:main/doctorsdashboard.php');
} else if (isset($_SESSION['userId'])) {

    header('Location:main/patientsdashboard.php');
}
?>
<?php
if (isset($_POST['signup'])) {
    $userName = $_POST['userName'];
    $userAge = $_POST['userAge'];
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    $userMobileNo = $_POST['userMobileNo'];
    $userAddress = $_POST['userAddress'];

    if (empty($userName) || empty($userAge) || empty($userEmail) || empty($userPassword) || empty($userMobileNo) || empty($userAddress)) {
        $msg = "Please Fill Up All Field";
    } else {
        $sql = "INSERT INTO tbl_user (userName, userAge, userEmail, userPassword, userMobileNo, userAddress) VALUES('$userName', '$userAge', '$userEmail', '$userPassword', '$userMobileNo', '$userAddress')";
        if (mysqli_query($conn, $sql)) {
            $message = "Congratulation ! Account create successfully ! Now You Can Login";
        } else {
            die('Query Problem' . mysqli_error($conn));
        }
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
            .suc{
                color:green;
                font-style: italic;
            }
        </style>	


    </head>

    <body style="background: url(main/images/library.jpg) no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; ">

        <div class="login">
            <div class="login-triangle"></div>

            <h2 class="login-header">Sign Up</h2>

            <form class="login-container" id="loginFrom" method="POST">
               
                
                    <span class="error">
                        <?php
                        if (isset($msg)) {
                            echo $msg;
                            $msg = "";
                        }
                        ?>
                    </span>
                    <span class="suc">
                        <?php
                        if (isset($message)) {
                            echo $message;
                            $message = "";
                        }
                        ?>
                    </span>

                
                <p><input type="text" name="userName" placeholder="Name..."></p>
                <p><input type="number" name="userAge" placeholder="Age..."></p>
                <p><input type="email" name="userEmail" placeholder="Email..."></p>
                <p><input type="password" name="userPassword" placeholder="Password..."></p>
                <p><input type="text" name="userMobileNo" placeholder="Mobile Number..."></p>
                <p><textarea rows="6" cols="41"name="userAddress" placeholder="User Address......."></textarea></p>
                <p><input type="submit" name="signup" value="Sign Up"></p>
                <p>Already have Account ? Please <a href="patientslogin.php" class="back">Login</a></p>

            </form>
            <h2 class="login-header"><a href="index.php" class="back">Back</a></h2>
        </div>

        <script src="main/lib/jquery.js"></script>
        <script src="main/dist/jquery.validate.js"></script>
        <script>
            $().ready(function () {

                $(".suc").fadeOut(6000);

                // validate signup form on keyup and submit
                $("#loginFrom").validate({
                    rules: {
                        userName: "required",
                        userAge: {
                            required: true,
                            min: 1,
                            max: 150
                        },
                        userEmail: "required",
                        userPassword: {
                            required: true,
                            minlength: 5,
                            maxlength: 10
                        },
                        userMobileNo: "required",
                        userAddress: "required"

                    },
                    messages: {
                        userName: "Please Enter Your Name",
                        userAge: {
                            required: "Please Enter Your Age",
                            min: "Age Must Be Between 1 to 150",
                            max: "Age Must Be Between 1 to 150"
                        },
                        userEmail: "Please Enter Your Email Address",
                        userPassword: {
                            required: "Please Enter Your Password",
                            minlength: "Password Length Must Be Between 5 To 10",
                            maxlength: "Password Length Must Be Between 5 To 10"
                        },
                        userMobileNo: "Please Enter Your Mobile Number",
                        userAddress: "Please Enter Your Address"

                    }
                });

            });

        </script> 

    </body>

</html>
