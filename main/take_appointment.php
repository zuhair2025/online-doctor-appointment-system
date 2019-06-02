<?php include 'includes/patientsheader.php' ?>
<?php include 'connect.php' ?>
<?php
$doctorId = $_GET['doctorId'];

$sql = "SELECT * FROM tbl_doctor WHERE doctorId=$doctorId";
if (mysqli_query($conn, $sql)) {
    $query_result = mysqli_query($conn, $sql);
    $doctor_info = mysqli_fetch_assoc($query_result);
} else {
    die("Query problem" . mysqli_error($conn));
}
$currentDayDate = date("Y-m-d");





$sql = "SELECT * FROM tbl_appointment WHERE  doctor_Id=$doctorId AND appointmentDate='$currentDayDate'";
if (mysqli_query($conn, $sql)) {
    $query_result = mysqli_query($conn, $sql);
    $row_cnt = mysqli_num_rows($query_result);
    //$doctor_info_By_Date = mysqli_fetch_assoc($query_result);
} else {
    die("Query problem" . mysqli_error($conn));
}

if (isset($_POST['confirm'])) {
    $doctorName = $doctor_info['doctorId'];
    $userId = $_SESSION['userId'];
    $appointmentDate = date("Y-m-d");
    $tokenNumber = $row_cnt + 1;

    $sql = "INSERT INTO tbl_appointment (doctor_Id, userId, appointmentDate,tokenNumber) VALUES('$doctorId', '$userId', '$appointmentDate','$tokenNumber')";
    if (mysqli_query($conn, $sql)) {
        
        $userId = $_SESSION['userId'];
        $sql = "SELECT * FROM tbl_user WHERE userId=$userId";
        if (mysqli_query($conn, $sql)) {
            $_result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($_result);
        } else {
            die("Query problem" . mysqli_error($conn));
        }
        $to = $user['userMobileNo'];
        $token = "7beef618b545ea8f357453624e91beb1";
        $message = "Patient Name: " . $user['userName'] . "\nSerial Number: " . $tokenNumber . "\nDoctor Name: " . $doctor_info['doctorName'] . "\nFee: " . $doctor_info['doctorFee'] . "\nDate: " . $appointmentDate . "\nTime: " . $doctor_info['doctorTime'] . "\nHospital Name: " . $doctor_info['doctorHospitalName'];

        $url = "http://sms.greenweb.com.bd/api.php";
        //echo $to . " " . $message;

        $data = array(
            'to' => "$to",
            'message' => "$message",
            'token' => "$token"
        ); // Add parameters in key value
        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $message = "Congratulation ! Appointment Take successfully !";





        //header("Location:View_appointment.php");
    } else {
        die('Query Problem' . mysqli_error($conn));
    }
}
?>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Doctor</h2>
            <div class="box-icon">

                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <span class="suc">
                <?php
                if (isset($message)) {
                    echo $message;
                    $message = "";
                }
                ?>
            </span>

            <form class="form-horizontal" id="doctorFrom" method="POST" >

                <fieldset>

                    <div class="control-group">
                        <label class="control-label" >Doctor Name </label>
                        <div class="controls">
                            <input type="text" readonly="readonly" value="<?php echo $doctor_info['doctorName']; ?>" name="doctorName" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Age </label>
                        <div class="controls">
                            <input type="number" readonly="readonly" value="<?php echo $doctor_info['doctorAge']; ?>" name="doctorAge" class="span6"  >

                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Doctor Description</label>
                        <div class="controls">
                            <textarea  name="doctorDescription" readonly="readonly" rows="5" class="span6"><?php echo $doctor_info['doctorDescription']; ?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Email </label>
                        <div class="controls">
                            <input type="text" readonly="readonly" value="<?php echo $doctor_info['doctorEmail']; ?>" name="doctorEmail" class="span6"  >

                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" >Doctor Mobile Number </label>
                        <div class="controls">
                            <input type="text" readonly="readonly" value="<?php echo $doctor_info['doctorMobileNumber']; ?>" name="doctorMobileNumber" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Patients Number </label>
                        <div class="controls">
                            <input type="number" readonly="readonly" value="<?php echo $doctor_info['doctorPatientsNumber']; ?>" name="doctorPatientsNumber" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Available Token Number </label>
                        <div class="controls">
                            <input type="text" readonly="readonly" value="<?php
                            $sub = intval($doctor_info['doctorPatientsNumber']) - intval($row_cnt);
                            if ($sub > 0) {
                                echo $sub;
                            } else {
                                echo "Token Not Available For Today";
                            }
                            ?>" name="doctortoken" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Hospital Name</label>
                        <div class="controls">
                            <input type="text" readonly="readonly" value="<?php echo $doctor_info['doctorHospitalName']; ?>" name="doctorHospitalName" class="span6"  >

                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" >Doctor Room No </label>
                        <div class="controls">
                            <input type="text" readonly="readonly" value="<?php echo $doctor_info['doctorRoomNo']; ?>" name="doctorRoomNo" class="span6"  >

                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" >Doctor Category </label>
                        <div class="controls">
                            <input type="text" readonly="readonly" value="<?php echo $doctor_info['doctorCategory']; ?>" name="doctorCategory" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Fee </label>
                        <div class="controls">
                            <input type="number" readonly="readonly" value="<?php echo $doctor_info['doctorFee']; ?>" name="doctorFee" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Time </label>
                        <div class="controls">
                            <input type="text" readonly="readonly" value="<?php echo $doctor_info['doctorTime']; ?>" name="doctorTime" class="span6"  >

                        </div>
                    </div>
<?php if ($sub > 0) { ?>
                        <div class="form-actions">
                            <button type="submit" name="confirm" class="btn btn-primary">Confirm Appointment</button>

                        </div>
<?php } ?>
                </fieldset>

            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->
<script src="lib/jquery.js"></script>

<script>
    $().ready(function () {

        $(".suc").fadeOut(6000);
        $(".error").fadeOut(6000);
    });

</script> 

<?php include 'includes/patientsfooter.php' ?>