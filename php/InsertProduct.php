<?php
    include("connectDB.php");
    $Plasma=$_GET['Plasma'];
    $BCs=$_GET['BCs'];
    $Platelets=$_GET['Platelets'];
    $BloodBag_ID=$_GET['BloodBag_ID'];
    $Bgroup=$_GET['Bgroup'];
    $volum=$_GET['volum'];
    $Test_Status=$_GET['Test_Status'];
    // $Status=$_GET['Status'];


    if ($Plasma > 0){
        $sql="SELECT * FROM `Protype` WHERE `Protype_name` LIKE '%".$Bgroup."' AND `Protype_name` LIKE 'Plasma%'";
        $result = mysqli_query($conn,$sql);//คือการ query
        $row = mysqli_fetch_array($result);
        for($i=0;$i<$Plasma;$i++){
            $sql="INSERT INTO `Product`(`Protype_ID`, `BloodBag_ID`, `volum`, `Test_Status`) 
            VALUES (".$row['Protype_ID'].",".$BloodBag_ID.",".$volum.",".$Test_Status.")";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                header('location: ../html/Member_UI/ChangeBB.php'); //กลับไปยังหน้าตาราง
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    if ($BCs > 0){
        $sql="SELECT * FROM `Protype` WHERE `Protype_name` LIKE '%".$Bgroup."' AND `Protype_name` LIKE 'BCs%'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        for($i=0;$i<$BCs;$i++){
            $sql="INSERT INTO `Product`(`Protype_ID`, `BloodBag_ID`, `volum`, `Test_Status`) 
            VALUES (".$row['Protype_ID'].",".$BloodBag_ID.",".$volum.",".$Test_Status.")";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                header('location: ../html/Member_UI/ChangeBB.php'); //กลับไปยังหน้าตาราง
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    if ($Platelets > 0){
        $sql="SELECT * FROM `Protype` WHERE `Protype_name` LIKE '%".$Bgroup."' AND `Protype_name` LIKE 'Platelets%'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        for($i=0;$i<$Platelets;$i++){
            $sql="INSERT INTO `Product`(`Protype_ID`, `BloodBag_ID`, `volum`, `Test_Status`) 
            VALUES (".$row['Protype_ID'].",".$BloodBag_ID.",".$volum.",".$Test_Status.")";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                header('location: ../html/Member_UI/ChangeBB.php'); //กลับไปยังหน้าตาราง
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    
    $sql="UPDATE `Blood_Bag` SET `Status`=0 WHERE BloodBag_ID=".$BloodBag_ID;
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('location: ../html/Member_UI/ChangeBB.php'); //กลับไปยังหน้าตาราง
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

?>