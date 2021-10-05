<?php
$BloodBag_ID = $_GET["BloodBag_ID"];

include('connectDB.php');
//สร้างคำสั่ง sql
$sql = "DELETE FROM Blood_Bag WHERE BloodBag_ID = ".$BloodBag_ID;

if ($conn->query($sql)) {
    echo "New record created successfully";
     header('location: ../html/Member_UI/ChangeBB.php'); //กลับไปยังหน้าตาราง
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>