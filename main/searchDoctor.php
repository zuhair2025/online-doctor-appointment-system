
<?php include 'connect.php' ?>
<?php

if (isset($_POST['keyword'])) {
    $doctorName = $_POST['keyword'];
  
    $sql = "SELECT * FROM tbl_doctor WHERE doctorName LIKE '%{$doctorName}%' ORDER BY doctorId LIMIT 0,5";
    if (mysqli_query($conn, $sql)) {
        $query_result = mysqli_query($conn, $sql);
    } else {
        die("Query problem" . mysqli_error($conn));
    }
}
if (!empty($query_result)) {
    while ($doctor_info = mysqli_fetch_assoc($query_result)) {
        ?>
        <tr>
            <td><?php echo $doctor_info['doctorName']; ?></td>
            <td class="center"><?php echo $doctor_info['doctorAge']; ?></td>
            <td class="center"><?php echo $doctor_info['doctorDescription']; ?></td>
            <td class="center"><?php echo $doctor_info['doctorEmail']; ?></td>
            <td class="center"><?php echo $doctor_info['doctorPassword']; ?></td>
            <td class="center"><?php echo $doctor_info['doctorPatientsNumber']; ?></td>
            <td class="center"><?php echo $doctor_info['doctorHospitalName']; ?></td>
            <td class="center"><?php echo $doctor_info['doctorRoomNo']; ?></td>
            <td class="center"><?php echo $doctor_info['doctorCategory']; ?></td>
            <td class="center"><?php echo $doctor_info['doctorFee']; ?></td>
            <td class="center"><?php echo $doctor_info['doctorTime']; ?></td>

            <td class="center">
                <a class="btn btn-success" title="View" href="view_drorctor_info.php?doctorId=<?php echo $doctor_info['doctorId']; ?>">
                    <i class="halflings-icon white zoom-in"></i>  
                </a>
                <a class="btn btn-info" title="Edit" href="edit_doctor.php?doctorId=<?php echo $doctor_info['doctorId']; ?>">
                    <i class="halflings-icon white edit"></i>  
                </a>
                <a class="btn btn-danger" href="delete_doctor.php?doctorId=<?php echo $doctor_info['doctorId']; ?>">
                    <i class="halflings-icon white trash"></i> 
                </a>
            </td>
        </tr>
        <?php
    }
}
?>

