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
    <style>
    body{
        max-width: 1200px;
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
        /* background-color: rgb(175, 45, 22); */
    }
    </style>
</head>
<body>
    <?php
        include("connectDB.php");
        $Employee_ID = $_GET['Employee_ID'];
        echo $Employee_ID;
        $sql = "SELECT * FROM EmployeeAccount WHERE Employee_ID='$Employee_ID' ";
        $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
        $row = mysqli_fetch_array($result);
        $split_string = explode(" ", $row['EmployeeName']);

    ?>
    <!-- action จะใช้การส่งแบบ GET ไม่ได้ -->
    <form action="../../php/update_emp.php">
            <h2>EmployeeRegister</h2>
            <!--start ข้อมูล-->

            
            <label for="page">page:</label>
            <input type="text" id="page" name="page" value="FormUpdateDoc"/></br>
            <label for="Employee_ID">Employee_ID:</label>
            <input type="text" id="Employee_ID" name="Employee_ID" value="<?php echo $Employee_ID;?>"/></br>

            <!--Name-->
            <label for="EmployeeName">Firstname:</label>
            <input id="fname" type="text" name="fname" value="<?php echo $split_string[0];?>"></br>
            <label for="EmployeeName">Lastname:</label>
            <input id="lname" type="text" name="lname" value="<?php echo $split_string[1];?>"></br>

            <!--sex-->
            
            <label for="sex">Sex:</label>
            
            
            <?php if ($row['sex'] == 0)  {?>
                <label for="sexM">Male</label>
                <input id="sexM" type="radio" name="sex" value="0" checked>
                <label for="sexF">Female</label>
                <input id="sexF" type="radio" name="sex" value="1"></br>
            <?php }else{ ?>
                <label for="sexM">Male</label>
                <input id="sexM" type="radio" name="sex" value="0" >
                <label for="sexF">Female</label>
                <input id="sexF" type="radio" name="sex" value="1" checked></br>
            <?php } ?>

            <!--Age-->
            <label for="Age">Age:</label>
            <input id="Age" type="text" name="Age" value="<?php echo $row['Age'];?>"></br>

            <!--Address-->
            <label for="Address">สถานที่ที่ติดต่อได้:</label>
            <input id="Address" type="text" name="Address" value="<?php echo $row['Address'];?>"></br>

            <!--PhoneNumber-->
            <label for="PhoneNumber">เบอร์โทรศัพท์:</label>
            <input id=PhoneNumber type="text" name="PhoneNumber" value="<?php echo $row['PhoneNumber'];?>"></br>

            
            <label for="StartDate">วันที่เริ่มทำงาน:</label>
            <input id="StartDate" type="date" name="StartDate" value="<?php echo $row['StartDate'];?>"></br>
            <!--End ข้อมูล-->
            
            <!--Strat ปุ่ม-->
            <input type="submit" value="ส่ง" >
            <input type="reset" value="เคลียร์">
            <!--End ปุ่ม-->
    </form>
</body>
</html>