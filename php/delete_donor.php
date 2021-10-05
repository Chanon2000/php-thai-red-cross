<?php
$Donor_ID = $_GET["Donor_ID"];

include('connectDB.php');
//สร้างคำสั่ง sql
$sql = "DELETE FROM DonorDetail WHERE Donor_ID = ".$Donor_ID;

if ($conn->query($sql)) {
    echo "New record created successfully";
     header('location: ../html/Member_UI/ChangeDonor.php'); //กลับไปยังหน้าตาราง
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>