<?php
    include("connectDB.php");
    echo " ".$_GET['Username']." ".$_GET['Password']." ".$_GET['fname']." ".$_GET['lname'] ." ".$_GET['sex'].$_GET['Age'] ." ".$_GET['Address'] ." "
    ." ".$_GET['PhoneNumber']." ".$_GET['type_ID']." ".$_GET['StartDate'];
    
    $Username=$_GET['Username'];
    $Password=$_GET['Password'];
    $fname=$_GET['fname'];
    $lname=$_GET['lname'];
    $sex=$_GET['sex'];
    $age=$_GET['Age'];
    $Address=$_GET['Address'];
    $PhoneNumber=$_GET['PhoneNumber'];
    $type_ID=$_GET['type_ID'];
    $StartDate=$_GET['StartDate'];


    $sql = "INSERT INTO `EmployeeAccount`(`Username`, `Password`, `EmployeeName`, `sex`, `Age`, `Address`, `PhoneNumber`, `Type_ID`, `StartDate`) 
    VALUES ('".$Username."','".$Password."','".$fname." ".$lname."',".$sex.",".$age.",'".$Address."',".$PhoneNumber.",".$type_ID.",'".$StartDate."')";

    //กำหนด '' ครอบเมื่อชนิตข้อมูลนั้นใน DB เป็น ตัวอักษร (ในhtmlคุณตั้งให้PNเป็นtextแต่เมื่อเข้าDBคุณก็ไม่ต้องใส่ '' เข้าไปเพราะ '' จะแปลงข้อมูลเป็น ตัวอักษร 
    //แต่ถ้าไม่ใส่ก็จะเป็นตัวเลข)

    echo $sql;
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('location: ../html/Login.html');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

?>