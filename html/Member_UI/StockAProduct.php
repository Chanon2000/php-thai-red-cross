<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../table.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" 
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" 
      crossorigin="anonymous">
</head>
<body>
<br>
    <nav class="nav nav-pills nav-fill">
        <a class="nav-link " href="ManageMember.php">หน้าหลัก</a>
        <a class="nav-link" href="ChangeDoctor.php">แก้ไขข้อมูลหมอ</a>
        <a class="nav-link" href="ChangeOrder.php">จัดการข้อมูล Order</a>
        <a class="nav-link" href="ChangeDonor.php">จัดการข้อมูล Donor</a>
        <a class="nav-link " href="ChangeBB.php">จัดการข้อมูล Blood Bag</a>
        <a class="nav-link" href="StockProduct.php">คลัง Product</a>
        <a class="nav-link active" href="StockAProduct.php">คลัง Product รวม</a>
        <a class="nav-link  " href="StatusOrderMember.php">StatusOrder</a>
        <a class="nav-link" href="../../php/Logout.php" role="button" style="color:red;">Logout</a>
    </nav>
    <br><br><br>

    <?php
    include('connectDB.php');
    $sql = "SELECT COUNT(*) AS num FROM `Product` WHERE `Protype_ID` = 101 AND `Status`= 1";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $Plasma_A = $row['num'];//ถ้าไม่ใช้numก็เรียนเป็น $row[0]
    // echo $Plasma_A;
    // echo var_dump($result);


    $sql = "SELECT COUNT(*) AS num FROM `Product` WHERE `Protype_ID` = 102 AND `Status`= 1";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $Plasma_B = $row['num'];
    


    $sql = "SELECT COUNT(*) AS num FROM `Product` WHERE `Protype_ID` = 103 AND `Status`= 1";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $Plasma_AB = $row['num'];
    


    $sql = "SELECT COUNT(*) AS num FROM `Product` WHERE `Protype_ID` = 104 AND `Status`= 1";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $Plasma_O = $row['num'];
    


    $sql = "SELECT COUNT(*) AS num FROM `Product` WHERE `Protype_ID` = 105 AND `Status`= 1";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $BCs_A = $row['num'];
    


    $sql = "SELECT COUNT(*) AS num FROM `Product` WHERE `Protype_ID` = 106 AND `Status`= 1";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $BCs_B = $row['num'];
    


    $sql = "SELECT COUNT(*) AS num FROM `Product` WHERE `Protype_ID` = 107 AND `Status`= 1";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $BCs_AB = $row['num'];


    $sql = "SELECT COUNT(*) AS num FROM `Product` WHERE `Protype_ID` = 108 AND `Status`= 1";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $BCs_O = $row['num'];
    


    $sql = "SELECT COUNT(*) AS num FROM `Product` WHERE `Protype_ID` = 109 AND `Status`= 1";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $Platelets_A = $row['num'];
    


    $sql = "SELECT COUNT(*) AS num FROM `Product` WHERE `Protype_ID` = 110 AND `Status`= 1";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $Platelets_B = $row['num'];



    $sql = "SELECT COUNT(*) AS num FROM `Product` WHERE `Protype_ID` = 111 AND `Status`= 1";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $Platelets_AB = $row['num'];
    


    $sql = "SELECT COUNT(*) AS num FROM `Product` WHERE `Protype_ID` = 112 AND `Status`= 1";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $Platelets_O = $row['num'];



    ?>
    <table border="2" id="customers">
        <tr>
            <th>ส่วนประกอบเลือดรวม</th>
            <th>A</th>
            <th>B</th>
            <th>AB</th>
            <th>O</th>

        </tr>
        <tr>
            <td>Plasma</td>
            <td><?php echo $Plasma_A;?> ถุง</td>
            <td><?php echo $Plasma_B;?> ถุง</td>
            <td><?php echo $Plasma_AB;?> ถุง</td>
            <td><?php echo $Plasma_O;?> ถุง</td>
        </tr>
        <tr>
            <td>BCs</td>
            <td><?php echo $BCs_A;?> ถุง</td>
            <td><?php echo $BCs_B;?> ถุง</td>
            <td><?php echo $BCs_AB;?> ถุง</td>
            <td><?php echo $BCs_O;?> ถุง</td>
        </tr>
        <tr>
            <td>Platelets</td>
            <td><?php echo $Platelets_A;?> ถุง</td>
            <td><?php echo $Platelets_B;?> ถุง</td>
            <td><?php echo $Platelets_AB;?> ถุง</td>
            <td><?php echo $Platelets_O;?> ถุง</td>
        </tr>
        
    </table>
</body>
</html>