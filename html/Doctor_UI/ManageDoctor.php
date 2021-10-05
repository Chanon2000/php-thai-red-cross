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
    
    <!-- นำค่าจากDBมาเป็นvalueให้inputต่างๆ -->
    <?php
    include("connectDB.php");
    session_start();
    $Employee_ID = $_SESSION["Employee_ID"];
    // echo $Employee_ID;

    $sql = "SELECT * FROM EmployeeAccount WHERE Employee_ID ='$Employee_ID' ";
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
    $row = mysqli_fetch_array($result);
    $split_string = explode(" ", $row['EmployeeName']);
    ?>

    <br>
    <nav class="nav nav-pills nav-fill">
        <a class="nav-link active" href="ManageDoctor.php">หน้าแรก</a>
        <a class="nav-link " href="DoctorReq.php">ขอใช้เลือด</a>
        <a class="nav-link " href="StatusOrder.php">Status Order</a>
        <a class="nav-link" href="../../php/Logout.php" role="button" style="color:red;">Logout</a>
    </nav>
    <br>
    
    <form action="../../php/update_emp.php" style="padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;">
        
            <h2 style="padding-left: 50px;">แก้ไขข้อมูลส่วนตัว(หมอ)</h2>
            <label for="page"></label>
            <input type="hidden" id="page" name="page" value="ManageDoctor" /><br>
            <!--start ข้อมูล-->
        <div class="form-group" style="padding-left: 50px;">
            <!--Name-->
            <label for="EmployeeName">Firstname:</label>
            <input class="form-control" id="fname" style="width:400px;" type="text" name="fname" value="<?php echo $split_string[0];?>"></br>
            <label for="EmployeeName">Lastname:</label>
            <input class="form-control" id="lname" style="width:400px;" type="text" name="lname" value="<?php echo $split_string[1];?>"></br>
        
            <!--sex-->
            <label for="sex">Sex:</label>
            <?php if($row['sex']==0) { ?>

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
            <input class="form-control" style="width:400px;" id="Age" type="text" name="Age" value="<?php echo $row['Age'];?>"></br>

            <!--Address-->
            <label for="Address">สถานที่ที่ติดต่อได้:</label>
            <input class="form-control" style="width:400px;" id="Address" type="text" name="Address" value="<?php echo $row['Address'];?>"></br>

            <!--PhoneNumber-->
            <label for="PhoneNumber">เบอร์โทรศัพท์:</label>
            <input class="form-control" style="width:400px;" id=PhoneNumber type="text" name="PhoneNumber" value="<?php echo $row['PhoneNumber'];?>"></br>

            <!--End ข้อมูล-->
            <label for="StartDate">วันที่เริ่มทำงาน:</label>
            <input class="form-control" style="width:400px;" id="StartDate" type="date" name="StartDate" value="<?php echo $row['StartDate'];?>"></br>
            
            <!--Strat ปุ่ม-->
            <input type="submit" value="แก้ไข">
            <input type="reset" value="เคลียร์">
            <!--End ปุ่ม-->
        <div>
    </form>
</body>
</html>