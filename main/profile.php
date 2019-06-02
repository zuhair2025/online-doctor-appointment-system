<?php include 'includes/patientsheader.php' ?>
<?php include 'connect.php' ?>
<?php
$userId = $_SESSION['userId'];
$sql = "SELECT * FROM tbl_user WHERE userId=$userId";
if (mysqli_query($conn, $sql)) {
    $query_result = mysqli_query($conn, $sql);
    $patients_info = mysqli_fetch_assoc($query_result);
} else {
    die("Query problem" . mysqli_error($conn));
}
?>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span><?php echo $_SESSION['userName']; ?> Profile</h2>
            <div class="box-icon">

                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <span class="suc">
                <?php
                if (isset($_SESSION["patients_profile_message"])) {
                    echo $_SESSION["patients_profile_message"];
                    unset($_SESSION["patients_profile_message"]);
                }
                ?>
            </span>
            <form class="form-horizontal" >

                <fieldset>

                    <div class="control-group">
                        <label class="control-label" > Name </label>
                        <div class="controls">
                            <input type="text"  value="<?php echo $patients_info['userName']; ?>" name="userName" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Age </label>
                        <div class="controls">
                            <input type="number"  value="<?php echo $patients_info['userAge']; ?>" name="userAge" class="span6"  >

                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" > Email </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $patients_info['userEmail']; ?>" name="userEmail" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Password </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $patients_info['userPassword']; ?>" name="userPassword" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" >Mobile Number </label>
                        <div class="controls">
                            <input type="text" value="<?php echo $patients_info['userMobileNo']; ?>" name="userMobileNo" class="span6"  >

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" > Address </label>
                        <div class="controls">
                            <textarea  name="userAddress"  rows="5" class="span6"><?php echo $patients_info['userAddress']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-actions">

                        <a class="btn btn-primary" href="editProfile.php">Edit</a>
                    </div>

                </fieldset>

            </form>   

        </div>
    </div><!--/span-->

</div><!--/row-->
<script src="lib/jquery.js"></script>

<script>
    $().ready(function () {
        //alert("s");
        $(".suc").fadeOut(4000);
    });
</script>

<?php include 'includes/patientsfooter.php' ?>		






