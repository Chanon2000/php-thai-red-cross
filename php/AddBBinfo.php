<?php
    include("connectDB.php");
    echo " ".$_GET['PhleCode']." ".$_GET['DateofDonate']." ".$_GET['volum']." ".$_GET['Test_Status'];

    $PhleCode=$_GET['PhleCode'];
    $DateofDonate=$_GET['DateofDonate'];
    $volum=$_GET['volum'];
    $Test_Status=$_GET['Test_Status'];
    $Donor_ID=$_GET['Donor_ID'];


    $sql = "SELECT * FROM `DonorDetail` WHERE `Donor_ID`=$Donor_ID";//เพื่อเอาค่าAttributeอื่นมาเช่น Bgroup
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    

    $sql = "INSERT INTO `Blood_Bag`(`PhleCode`, `DateofDonate`, `Bgroup`, `volum`, `Test_Status`, `Donor_ID`) 
        VALUES (".$PhleCode.",'".$DateofDonate."','".$row['Bgroup']."',".$volum.",".$Test_Status.",".$Donor_ID.")";

    // echo $sql;//print string
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "UPDATE `DonorDetail` SET `Status`=1 WHERE `Donor_ID`=$Donor_ID";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('location: ../html/Member_UI/ChangeDonor.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    
?>