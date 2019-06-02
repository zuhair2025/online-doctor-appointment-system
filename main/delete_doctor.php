<?php include 'includes/header.php' ?>
<?php include 'connect.php' ?>
<?php

$doctorId = $_GET['doctorId'];
$sql = "DELETE FROM tbl_doctor WHERE doctorId=$doctorId";
if (mysqli_query($conn, $sql)) {
    header("Location:view_doctor.php");
} else {
    die("Query problem" . mysqli_error($conn));
}
?> 
<?php include 'includes/footer.php' ?>		




