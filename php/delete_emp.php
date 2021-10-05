<?php
$Employee_ID = $_GET["Employee_ID"];

include('connectDB.php');
//สร้างคำสั่ง sql
$sql = "DELETE FROM EmployeeAccount WHERE Employee_ID = ".$Employee_ID;

if ($conn->query($sql)) {
    echo "New record created successfully";
     header('location: ../html/Member_UI/ChangeDoctor.php'); //กลับไปยังหน้าตาราง
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>