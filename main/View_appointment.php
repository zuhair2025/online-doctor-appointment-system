<?php include 'includes/patientsheader.php' ?>
<?php include 'connect.php' ?>

<?php
$perpage = 2;
if (isset($_GET["page"])) {
    $page = intval($_GET["page"]);
} else {
    $page = 1;
}
$calc = $perpage * $page;
$start = $calc - $perpage;
$currentDayDate=date("Y-m-d");
$userId=$_SESSION['userId'];
$sql = "SELECT d.doctorName,d.doctorCategory,d.doctorHospitalName,d.doctorRoomNo,d.doctorFee,d.doctorTime,a.appointmentDate,a.tokenNumber FROM tbl_appointment AS a INNER JOIN tbl_doctor AS d ON a.doctor_Id=d.doctorId WHERE appointmentDate='$currentDayDate' AND userId=$userId ORDER BY doctorId DESC LIMIT $start, $perpage";
if (mysqli_query($conn, $sql)) {
    $query_result = mysqli_query($conn, $sql);
} else {
    die("Query problem" . mysqli_error($conn));
}
?>
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>View Appointment</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <input type="text" style="padding:15px; width:600px; "  name="filter" value="" id="search_doctor_filter" placeholder="Search Doctor By Name" autocomplete="off" />
            <br/>
            <table id="resultTable" class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th width="10%">Doctor Name</th>
                        <th width="5%">Category</th>
                        
                        <th width="10%">Doctor Hospital</th>
                        <th width="5%">Room No</th>
                        
                        <th width="4%">Fee</th>
                         <th width="10%">Date</th>
                        <th width="10%">Time</th>
                        <th width="10%">Token Number</th>
                        
                    </tr>
                </thead>   
                <tbody>
                    <?php
                    while ($doctor_info = mysqli_fetch_assoc($query_result)) {
                        ?>
                        <tr>
                            <td><?php echo $doctor_info['doctorName']; ?></td>
                            <td class="center"><?php echo $doctor_info['doctorCategory']; ?></td>
                            <td class="center"><?php echo $doctor_info['doctorHospitalName']; ?></td>
                            <td class="center"><?php echo $doctor_info['doctorRoomNo']; ?></td>
                            
                            <td class="center"><?php echo $doctor_info['doctorFee']; ?></td>
                            <td class="center"><?php echo $doctor_info['appointmentDate']; ?></td>
                            <td class="center"><?php echo $doctor_info['doctorTime']; ?></td>
                            <td class="center"><?php echo $doctor_info['tokenNumber']; ?></td>

                            
                        </tr>
                    <?php } ?>

                </tbody>
            </table> 
            <table id="resultTableSearch" class="table table-striped table-bordered " style="display:none;">
                <thead>
                    <tr>
                        <th width="10%">Name</th>
                        <th width="5%">Age</th>
                        <th width="10%">Description</th>
                        <th width="10%">Email</th>
                        <th width="5%">Password</th>
                        <th width="5%">Patients Number</th>
                        <th width="10%">Doctor Hospital</th>
                        <th width="5%">Room No</th>
                        <th width="5%">Category</th>
                        <th width="4%">Fee</th>
                        <th width="10%">Time</th>
                        <th width="21%">Actions</th>
                    </tr>
                </thead>   
                <tbody>
                </tbody>
            </table> 
            <br/>
            <br/>
            <div id="pagination_for_search">
            <?php
            if (isset($page)) {
                $datasql = "SELECT * FROM tbl_appointment WHERE appointmentDate='$currentDayDate' AND userId=$userId ";
                if (mysqli_query($conn, $datasql)) {
                    $result = mysqli_query($conn, $datasql);
                    $rowcount = mysqli_num_rows($result);
                } else {
                    die("Query problem" . mysqli_error($conn));
                }

                $total = $rowcount;

                $totalPages = ceil($total / $perpage);

                if ($page <= 1) {

                    echo "<span id='page_links' style='font-weight: bold;'>Prev</span>";
                } else {

                    $j = $page - 1;

                    echo "<span><a id='page_a_link' href='?page=$j'> Prev</a></span>";
                }

                $range = 3;
                // loop to show links to range of pages around current page
                for ($x = ($page - $range); $x < (($page + $range) + 1); $x++) {
                    // if it's a valid page number...
                    if (($x > 0) && ($x <= $totalPages)) {
                        // if we're on current page...
                        if ($x == $page) {
                            // 'highlight' it but don't make a link
                            //echo " [<b>$x</b>] ";
                            echo "<span><a id='page_a_link'><b>$x</b></a></span>";
                            // if not current page...
                        } else {
                            // make it a link
                            echo " <a id='page_links' style='font-weight: bold;' href='{$_SERVER['PHP_SELF']}?page=$x'>$x</a> ";
                        } // end else
                    } // end if 
                }

                if ($page == $totalPages) {

                    echo "<span id='page_links' style='font-weight: bold;'>Next</span>";
                } else {

                    $j = $page + 1;

                    echo "<span><a id='page_a_link' href='?page=$j'>Next</a></span>";
                }
            }
            ?>
            </div>
        </div>
    </div><!--/span-->

</div><!--/row-->
<script src="lib/jquery.js"></script>
<script>


</script>



<?php include 'includes/patientsfooter.php' ?>