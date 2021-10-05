<?php
    session_start();
    $fname=$_GET['fname'];
    $lname=$_GET['lname'];
    $sex=$_GET['sex'];
    $age=$_GET['Age'];
    $Address=$_GET['Address'];
    $PhoneNumber=$_GET['PhoneNumber'];
    $StartDate=$_GET['StartDate'];

    $Employee_ID=$_GET['Employee_ID'];
    $page=$_GET['page'];

    include('connectDB.php');
    //สร้างคำสั่ง sql
    if ($page == "ManageMember"){//จากหน้า ManageMember.php
        $sql = "UPDATE `EmployeeAccount` SET `EmployeeName`='".$fname." ".$lname."',`sex`=".$sex.",`Age`=".$age.",`Address`='".$Address."',
        `PhoneNumber`=".$PhoneNumber.",`StartDate`='".$StartDate."'
        WHERE Employee_ID = ".$_SESSION["Employee_ID"];//session จาก check_login
        // echo $sql;
        if ($conn->query($sql)) {
            echo "New record created successfully";
            header('location: ../html/Member_UI/ManageMember.php'); //กลับไปยังหน้าตาราง
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else if ($page == "FormUpdateDoc"){ //จากหน้า FormUpdateDoc.php
        
        $sql = "UPDATE `EmployeeAccount` SET `EmployeeName`='".$fname." ".$lname."',`sex`=".$sex.",`Age`=".$age.",`Address`='".$Address."',
        `PhoneNumber`=".$PhoneNumber.",`StartDate`='".$StartDate."'
        WHERE Employee_ID = ".$Employee_ID;
        
        if ($conn->query($sql)) {
            echo "New record created successfully";
            header('location: ../html/Member_UI/ChangeDoctor.php'); //กลับไปยังหน้าตาราง
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }else{//จากหน้า ManageDoctor.php

        $sql = "UPDATE `EmployeeAccount` SET `EmployeeName`='".$fname." ".$lname."',`sex`=".$sex.",`Age`=".$age.",`Address`='".$Address."',
        `PhoneNumber`=".$PhoneNumber.",`StartDate`='".$StartDate."'
        WHERE Employee_ID = ".$_SESSION["Employee_ID"];//session จาก check_login
        // echo $sql;
        if ($conn->query($sql)) {
            echo "New record created successfully";
            header('location: ../html/Doctor_UI/ManageDoctor.php'); //กลับไปยังหน้าตาราง
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    

$conn->close();
?>