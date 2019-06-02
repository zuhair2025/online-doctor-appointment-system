<?php include 'includes/header.php' ?>
<?php include 'connect.php' ?>
<?php
if (isset($_POST['save'])) {
    $doctorName = $_POST['doctorName'];
    $doctorAge = $_POST['doctorAge'];
    $doctorDescription = $_POST['doctorDescription'];
    $doctorEmail = $_POST['doctorEmail'];
    $doctorPassword = $_POST['doctorPassword'];
    $doctorMobileNumber = $_POST['doctorMobileNumber'];
    $doctorPatientsNumber = $_POST['doctorPatientsNumber'];
    $doctorHospitalName = $_POST['doctorHospitalName'];
    $doctorRoomNo = $_POST['doctorRoomNo'];
    $doctorCategory = $_POST['doctorCategory'];
    $doctorFee = $_POST['doctorFee'];
    $doctorTime = $_POST['doctorTime'];

    if (empty($doctorName) || empty($doctorAge) || empty($doctorDescription) || empty($doctorEmail) || empty($doctorPassword) || empty($doctorMobileNumber) || empty($doctorPatientsNumber) || empty($doctorHospitalName) || empty($doctorRoomNo) || empty($doctorCategory) || empty($doctorFee) || empty($doctorTime)) {
        $msg = "Please Fill Up All Field";
    } else {
        $sql = "INSERT INTO tbl_doctor (doctorName, doctorAge, doctorDescription,doctorEmail, doctorPassword,doctorMobileNumber,doctorPatientsNumber,doctorHospitalName,doctorRoomNo,doctorCategory,doctorFee,doctorTime) VALUES('$doctorName', '$doctorAge', '$doctorDescription', '$doctorEmail', '$doctorPassword', '$doctorMobileNumber', '$doctorPatientsNumber', '$doctorHospitalName', '$doctorRoomNo', '$doctorCategory', '$doctorFee', '$doctorTime')";
        if (mysqli_query($conn, $sql)) {
            $message = "Congratulation ! Data Saved successfully !";
        } else {
            die('Query Problem' . mysqli_error($conn));
        }
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
            <form class="form-horizontal" id="doctorFrom" method="POST">
                <fieldset>

                    <div class="control-group">
                        <label class="control-label" >Doctor Name </label>
                        <div class="controls">
                            <input type="text" name="doctorName" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Age </label>
                        <div class="controls">
                            <input type="number" name="doctorAge" class="span6"  >

                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Doctor Description</label>
                        <div class="controls">
                            <textarea  name="doctorDescription"  rows="5" class="span6"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Email </label>
                        <div class="controls">
                            <input type="text" name="doctorEmail" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Password </label>
                        <div class="controls">
                            <input type="password" name="doctorPassword" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Mobile Number </label>
                        <div class="controls">
                            <input type="text" name="doctorMobileNumber" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Patients Number </label>
                        <div class="controls">
                            <input type="number" name="doctorPatientsNumber" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Hospital Name</label>
                        <div class="controls">
                            <input type="text" name="doctorHospitalName" class="span6"  >

                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" >Doctor Room No </label>
                        <div class="controls">
                            <input type="text" name="doctorRoomNo" class="span6"  >

                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" >Doctor Category </label>
                        <div class="controls">
                            <input type="text" name="doctorCategory" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Fee </label>
                        <div class="controls">
                            <input type="number" name="doctorFee" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Time </label>
                        <div class="controls">
                            <input type="text" name="doctorTime" class="span6"  >

                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="save" class="btn btn-primary">Save Doctor</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
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

        // validate signup form on keyup and submit
        $("#doctorFrom").validate({
            rules: {
                doctorName: "required",
                doctorAge: {
                    required: true,
                    min: 1,
                    max: 100
                },
                doctorDescription:"required",
                doctorEmail: "required",
                doctorPassword: {
                    required: true,
                    minlength: 5,
                    maxlength: 10
                },
                doctorMobileNumber: "required",
                doctorPatientsNumber:"required",
                doctorHospitalName: "required",
                doctorRoomNo:"required",
                doctorCategory:"required",
                doctorFee:"required",
                doctorTime:"required"

            },
            messages: {
                doctorName: "Please Enter Doctor Name",
                doctorAge: {
                    required: "Please Enter Doctor Age",
                    min: "Doctor Age Must Be Between 1 to 100",
                    max: "Doctor Age Must Be Between 1 to 100"
                },
                doctorDescription:"Please Enter Doctor Description",
                doctorEmail: "Please Enter Doctor Email Address",
                doctorPassword: {
                    required: "Please Enter Doctor Password",
                    minlength: "Password Length Must Be Between 5 To 10",
                    maxlength: "Password Length Must Be Between 5 To 10"
                },
                doctorMobileNumber: "Please Enter Doctor Mobile Number",
                doctorPatientsNumber:"Please Enter Doctor Patients Number",
                doctorHospitalName: "Please Enter Enter Doctor Hospital Name",
                doctorRoomNo:"Please Enter Doctor Room Number",
                doctorCategory:"Please Enter Doctor Category Name",
                doctorFee:"Please Enter Doctor Fee",
                doctorTime:"Please Enter Doctor Time Schedule To See Patients"

            }
        });

    });

</script> 
<?php include 'includes/footer.php' ?>		




