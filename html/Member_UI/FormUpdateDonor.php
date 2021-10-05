<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
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
        include('connectDB.php');
        $Donor_ID=$_GET['Donor_ID'];
        $sql = "SELECT * FROM DonorDetail WHERE Donor_ID='$Donor_ID' ";
        $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
        $row = mysqli_fetch_array($result);
        $split_string = explode(" ", $row['Name']);
    
    ?>


    <form action="../../php/update_donor.php" >
        <h2>กรอกข้อมูลผู้บริจาค</h2>
        <!--start ข้อมูลส่วนตัว-->
        
        <label for="Donor_ID">Donor_ID:</labrl>
        <input id="Donor_ID" type="text" name="Donor_ID" value="<?php echo $row['Donor_ID']; ?>" /></br>

        
        <!--NIN-->
        <label for="NIN">เลขที่บัตรประชาชน:</label>
        <input id="NIN" type="text" name="NIN" value="<?php echo $row['NIN']; ?>"/></br>

        <!--name-->
        <label for="fname">First Name:</label>
        <input id="fname" type="text" name="fname" value="<?php echo $split_string[0]; ?>"/></br>
        <label for="lname">Last Name:</label>
        <input id="lname" type="text" name="lname" value="<?php echo $split_string[1]; ?>"/></br>

        <!--sex-->
        <label for="sex">เพศ:</label>
        <?php if ($row['sex'] == 0) { ?>
            <label for="sex">ชาย:</label>
            <input id="sexM" type="radio" name="sex" value="0" checked/>
            <label for="sex">หญิง:</label>
            <input id="sexF" type="radio" name="sex" value="1"/></br>
        <?php }else{ ?>
            <label for="sex">ชาย:</label>
            <input id="sexM" type="radio" name="sex" value="0" />
            <label for="sex">หญิง:</label>
            <input id="sexF" type="radio" name="sex" value="1" checked/></br>
        <?php } ?>
        <!--อายุ-->
        <label for="age">อายุ:</label>
        <input id="age" type="text" name="age" value="<?php echo $row['Age']; ?>" /></br>

        <!--brithday-->
        <label for="brithday">วันเดือนปีเกิด:</label>
        <input id="brithday" type="datetime" name="brithday" value="<?php echo $row['Brithday']; ?>" /></br>

        <!--Cdisease-->
        <label for="Cdisease">โรคประจำตัว:</label>
        <input id="Cdisease" type="textarea" name="Cdisease" value="<?php echo $row['Cdisease']; ?>" /></br>

        <!--Bgroup-->
        <label for="Bgroup">หมู่เลือด:</label>
        <?php if ($row['Bgroup'] == 'A') { ?>
            <label for="BgroupA">A:</label>
            <input id="BgroupA" type="radio" name="Bgroup" value="A" checked />
            <label for="BgroupB">B:</label>
            <input id="BgroupB" type="radio" name="Bgroup" value="B"/>
            <label for="BgroupO">O:</label>
            <input id="BgroupO" type="radio" name="Bgroup" value="O"/>
            <label for="BgroupAB">AB:</label>
            <input id="BgroupAB" type="radio" name="Bgroup" value="AB"/></br>
        <?php }else if ($row['Bgroup'] == 'B') { ?>
            <label for="BgroupA">A:</label>
            <input id="BgroupA" type="radio" name="Bgroup" value="A"/>
            <label for="BgroupB">B:</label>
            <input id="BgroupB" type="radio" name="Bgroup" value="B" checked />
            <label for="BgroupO">O:</label>
            <input id="BgroupO" type="radio" name="Bgroup" value="O"/>
            <label for="BgroupAB">AB:</label>
            <input id="BgroupAB" type="radio" name="Bgroup" value="AB"/></br>
        <?php }else if ($row['Bgroup'] == 'O') { ?>
            <label for="BgroupA">A:</label>
            <input id="BgroupA" type="radio" name="Bgroup" value="A"/>
            <label for="BgroupB">B:</label>
            <input id="BgroupB" type="radio" name="Bgroup" value="B"/>
            <label for="BgroupO">O:</label>
            <input id="BgroupO" type="radio" name="Bgroup" value="O" checked />
            <label for="BgroupAB">AB:</label>
            <input id="BgroupAB" type="radio" name="Bgroup" value="AB"/></br>
        <?php }else{ ?>
            <label for="BgroupA">A:</label>
            <input id="BgroupA" type="radio" name="Bgroup" value="A"/>
            <label for="BgroupB">B:</label>
            <input id="BgroupB" type="radio" name="Bgroup" value="B"/>
            <label for="BgroupO">O:</label>
            <input id="BgroupO" type="radio" name="Bgroup" value="O"  />
            <label for="BgroupAB">AB:</label>
            <input id="BgroupAB" type="radio" name="Bgroup" value="AB" checked/></br>
        <?php } ?>

        <!--Weight-->
        <label for="Weight">นำ้หนัก:</label>
        <input id="Weight" type="text" name="weight" value="<?php echo $row['weight']; ?>" />
        <label for="Weight">กิโลกรัม</label></br>

        <!--Address-->
        <label for="Address">สถานที่ที่ติดต่อได้:</label>
        <input id="Address" type="textarea" name="Address" value="<?php echo $row['Address']; ?>"></br>

        <!--PNumber-->
        <label for="PhoneNumber">หมายเลขโทรศัพท์:</label>
        <input id="PhoneNumber" type="text" name="PhoneNumber" value="<?php echo $row['PhoneNumber']; ?>"></br>

        <!--E-mail-->
        <label for="E-mail">E-mail address:</label>
        <input id="E-mail" type="text" name="E-mail" value="<?php echo $row['E-mail']; ?>"></br>

        <!--อาชีพ-->
        <label for="Career">อาชีพ:</label>
        <?php if ($row['Career'] == "นักเรียนนักศึกษา") { ?>
            <label for="student">นักเรียน,นักศึกษา:</label>
            <input id="student" type="radio" name="career" value="นักเรียนนักศึกษา" checked/>
            <label for="official">ข้าราชการ,ทหาร,ตำรวร,พนักงานรัฐวิสาหกิจ:</label>
            <input id="official" type="radio" name="career" value="ข้าราชการ"/>
            <label for="employee">พนักงานบริษัท,รับจ้าง:</label>
            <input id="employee" type="radio" name="career" value="รับจ้าง"/>
            <label for="Monk">พระภิกษุ,สามเฌร:</label>
            <input id="Monk" type="radio" name="career" value="พระภิกษุ"/></br>
            <label for="other">อื่นๆ:</label>
            <input id="other" type="text" name="career" /></br>
        <?php }else if ($row['Career'] == "ข้าราชการ") { ?>
            <label for="student">นักเรียน,นักศึกษา:</label>
            <input id="student" type="radio" name="career" value="นักเรียนนักศึกษา" />
            <label for="official">ข้าราชการ,ทหาร,ตำรวร,พนักงานรัฐวิสาหกิจ:</label>
            <input id="official" type="radio" name="career" value="ข้าราชการ" checked/>
            <label for="employee">พนักงานบริษัท,รับจ้าง:</label>
            <input id="employee" type="radio" name="career" value="รับจ้าง"/>
            <label for="Monk">พระภิกษุ,สามเฌร:</label>
            <input id="Monk" type="radio" name="career" value="พระภิกษุ"/></br>
            <label for="other">อื่นๆ:</label>
            <input id="other" type="text" name="career" /></br>
        <?php }else if ($row['Career'] == "รับจ้าง") { ?>
            <label for="student">นักเรียน,นักศึกษา:</label>
            <input id="student" type="radio" name="career" value="นักเรียนนักศึกษา" />
            <label for="official">ข้าราชการ,ทหาร,ตำรวร,พนักงานรัฐวิสาหกิจ:</label>
            <input id="official" type="radio" name="career" value="ข้าราชการ"/>
            <label for="employee">พนักงานบริษัท,รับจ้าง:</label>
            <input id="employee" type="radio" name="career" value="รับจ้าง" checked/>
            <label for="Monk">พระภิกษุ,สามเฌร:</label>
            <input id="Monk" type="radio" name="career" value="พระภิกษุ"/></br>
            <label for="other">อื่นๆ:</label>
            <input id="other" type="text" name="career" /></br>
        <?php }else if ($row['Career'] == "พระภิกษุ") { ?>
            <label for="student">นักเรียน,นักศึกษา:</label>
            <input id="student" type="radio" name="career" value="นักเรียนนักศึกษา" />
            <label for="official">ข้าราชการ,ทหาร,ตำรวร,พนักงานรัฐวิสาหกิจ:</label>
            <input id="official" type="radio" name="career" value="ข้าราชการ"/>
            <label for="employee">พนักงานบริษัท,รับจ้าง:</label>
            <input id="employee" type="radio" name="career" value="รับจ้าง"/>
            <label for="Monk">พระภิกษุ,สามเฌร:</label>
            <input id="Monk" type="radio" name="career" value="พระภิกษุ" checked/></br>
            <label for="other">อื่นๆ:</label>
            <input id="other" type="text" name="career" /></br>
        <?php }else{ ?>
            <label for="student">นักเรียน,นักศึกษา:</label>
            <input id="student" type="radio" name="career" value="นักเรียนนักศึกษา" />
            <label for="official">ข้าราชการ,ทหาร,ตำรวร,พนักงานรัฐวิสาหกิจ:</label>
            <input id="official" type="radio" name="career" value="ข้าราชการ"/>
            <label for="employee">พนักงานบริษัท,รับจ้าง:</label>
            <input id="employee" type="radio" name="career" value="รับจ้าง"/>
            <label for="Monk">พระภิกษุ,สามเฌร:</label>
            <input id="Monk" type="radio" name="career" value="พระภิกษุ"/></br>
            <label for="other">อื่นๆ:</label>
            <input id="other" type="text" name="career" value="<?php echo $row['Career']; ?>"/></br>
        <?php } ?>
        <!--End ข้อมูลส่วนตัว-->
        
        <!--Strat ปุ่ม-->
        <input type="submit" value="ส่ง" >
        <input type="reset" value="เคลียร์">
        <!--End ปุ่ม-->
    </form>
</body>
</html>