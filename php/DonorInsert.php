<?php
    include("connectDB.php");
    echo " ".$_GET['NIN']." ".$_GET['fname']." ".$_GET['lname'] ." ".$_GET['sex'].$_GET['age'] ." ".$_GET['brithday'] ." "
    .$_GET['Cdisease'].$_GET['Bgroup']." ".$_GET['weight']." ".$_GET['Address']." ".$_GET['PhoneNumber']." ".$_GET['email']." ".$_GET['career'];
    
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
    $email=$_GET['email'];
    $career=$_GET['career'];


    $sql = "INSERT INTO `DonorDetail`(`NIN`, `Name`, `Brithday`, `sex`, `Age`, `Cdisease`, `Bgroup`, `weight`, `Address`, `PhoneNumber`, `E-mail`, `Career`) 
    VALUES (".$NIN.",'".$fname." ".$lname."','".$brithday."',".$sex.",".$age.",'".$Cdisease."','".$Bgroup."',".$weight.",'".$Address."','".$PhoneNumber."','".$email."','".$career."')";
    
    echo $sql;//print string
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('location: ../html/HomePage.html');
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

?>