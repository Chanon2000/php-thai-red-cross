<?php
    session_start();
    include('connectDB.php');
    //สร้างคำสั่ง sql
    $Bgroup=$_GET['Bgroup'];

    if ($_GET['Plasma_num']>0) {
        $Plasma_num=$_GET['Plasma_num'];
    }else{
        $Plasma_num=0;
    }

    if ($_GET['BCs_num']>0) {
        $BCs_num=$_GET['BCs_num'];
    }else{
        $BCs_num=0;
    }

    if ($_GET['Platelets_num']>0) {
        $Platelets_num=$_GET['Platelets_num'];
    }else{
        $Platelets_num=0;
    }


    echo $_SESSION['Employee_ID'];
    $sql = "INSERT INTO `Order_Blood`( `Employee_ID`, `Plasma_num`, `BCs_num`, `Platelets_num`,  
      `Bgroup`) 
    VALUES (".$_SESSION['Employee_ID'].",".$Plasma_num.",".$BCs_num.",".$Platelets_num.",'".$Bgroup."')";//


    // echo $sql;
    if ($conn->query($sql)) {
        echo "New record created successfully";
        header('location: ../html/Doctor_UI/StatusOrder.php'); //กลับไปยังหน้าตาราง
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
?>