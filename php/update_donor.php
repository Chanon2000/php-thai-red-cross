<?php
    session_start();
    $Donor_ID=$_GET['Donor_ID'];
    $NIN=$_GET['NIN'];
    $fname=$_GET['fname'];
    $lname=$_GET['lname'];
    $sex=$_GET['sex'];
    $age=$_GET['age'];
    $brithday=$_GET['brithday'];
    $Cdisease=$_GET['Cdisease'];
    $Bgroup=$_GET['Bgroup'];
    $weight=$_GET['weight'];
    $Address=$_GET['Address'];
    $PhoneNumber=$_GET['PhoneNumber'];
    $email=$_GET['E-mail'];
    $career=$_GET['career'];

    include('connectDB.php');
    //สร้างคำสั่ง sql
    $sql = "UPDATE `DonorDetail` SET `NIN`='".$NIN."',`Name`='".$fname." ".$lname."',`sex`=".$sex.",`Age`=".$age.",`brithday`='".$brithday."',
    `Cdisease`='".$Cdisease."',`Bgroup`='".$Bgroup."',`weight`=".$weight.",`Address`='".$Address."',`PhoneNumber`='".$PhoneNumber."',`E-mail`='".$email."',`career`='".$career."'
    WHERE Donor_ID = ".$Donor_ID;
    // echo $sql;
    if ($conn->query($sql)) {
        echo "New record created successfully";
        header('location: ../html/Member_UI/ChangeDonor.php'); //กลับไปยังหน้าตาราง
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
?>