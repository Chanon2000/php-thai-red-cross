<?php
    session_start();
    $Order_ID=$_GET['Order_ID'];
    $Status=$_GET['Status'];

    

    include('connectDB.php');
    //สร้างคำสั่ง sql
    $sql="UPDATE Order_Blood SET Status =".$Status.", Endorser_ID =".$_SESSION["Employee_ID"]." WHERE Order_ID = ".$Order_ID;
    if ($conn->query($sql)) {
        echo "New record created successfully";
        header('location: ../html/Member_UI/ChangeOrder.php'); //กลับไปยังหน้าตาราง
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
?>