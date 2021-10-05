<?php
    session_start();
    $BloodBag_ID=$_GET['BloodBag_ID'];
    $PhleCode=$_GET['PhleCode'];
    $DateofDonate=$_GET['DateofDonate'];
    $Bgroup=$_GET['Bgroup'];
    $volum=$_GET['volum'];
    $Test_Status=$_GET['Test_Status'];
    $Donor_ID=$_GET['Donor_ID'];


    

    include('connectDB.php');
    //สร้างคำสั่ง sql
    $sql = "UPDATE `Blood_Bag` SET `PhleCode`=".$PhleCode.",`DateofDonate`='".$DateofDonate."',
    `Bgroup`='".$Bgroup."',`volum`=".$volum.",`Test_Status`=".$Test_Status.",`Donor_ID`=".$Donor_ID." 
    WHERE BloodBag_ID =".$BloodBag_ID;
    // echo $sql;
    if ($conn->query($sql)) {
        echo "New record created successfully";
        header('location: ../html/Member_UI/ChangeBB.php'); //กลับไปยังหน้าตาราง
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
?>