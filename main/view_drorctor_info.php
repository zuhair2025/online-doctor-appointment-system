<?php include 'includes/header.php' ?>
<?php include 'connect.php' ?>
<?php
$doctorId=$_GET['doctorId'];
$sql = "SELECT * FROM tbl_doctor WHERE doctorId=$doctorId";
if (mysqli_query($conn, $sql)) {
    $query_result = mysqli_query($conn, $sql);
    $doctor_info = mysqli_fetch_assoc($query_result);
} else {
    die("Query problem" . mysqli_error($conn));
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
            
            <form class="form-horizontal" >
                 
                <fieldset>
                   
                    <div class="control-group">
                        <label class="control-label" >Doctor Name </label>
                        <div class="controls">
                            <input type="text"  value="<?php echo $doctor_info['doctorName'];?>" name="doctorName" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Age </label>
                        <div class="controls">
                            <input type="number"  value="<?php echo $doctor_info['doctorAge'];?>" name="doctorAge" class="span6"  >

                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Doctor Description</label>
                        <div class="controls">
                            <textarea  name="doctorDescription"  rows="5" class="span6"><?php echo $doctor_info['doctorDescription'];?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Email </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $doctor_info['doctorEmail'];?>" name="doctorEmail" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Password </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $doctor_info['doctorPassword'];?>" name="doctorPassword" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Mobile Number </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $doctor_info['doctorMobileNumber'];?>" name="doctorMobileNumber" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Patients Number </label>
                        <div class="controls">
                            <input type="number" value="<?php echo $doctor_info['doctorPatientsNumber'];?>" name="doctorPatientsNumber" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Hospital Name</label>
                        <div class="controls">
                            <input type="text" value="<?php echo $doctor_info['doctorHospitalName'];?>" name="doctorHospitalName" class="span6"  >

                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" >Doctor Room No </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $doctor_info['doctorRoomNo'];?>" name="doctorRoomNo" class="span6"  >

                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" >Doctor Category </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $doctor_info['doctorCategory'];?>" name="doctorCategory" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Fee </label>
                        <div class="controls">
                            <input type="number" value="<?php echo $doctor_info['doctorFee'];?>" name="doctorFee" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Doctor Time </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $doctor_info['doctorTime'];?>" name="doctorTime" class="span6"  >

                        </div>
                    </div>
                   
                </fieldset>
                 
            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->

<?php include 'includes/footer.php' ?>		




