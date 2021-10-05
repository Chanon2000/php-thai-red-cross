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
        $BloodBag_ID=$_GET['BloodBag_ID'];
        $sql = "SELECT * FROM Blood_Bag WHERE BloodBag_ID='$BloodBag_ID' ";
        $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
        $row = mysqli_fetch_array($result);
    ?>


    <form action="../../php/update_BB.php">
        <label for="BloodBag_ID">BloodBag_ID:</label>
        <input type="text" id="BloodBag_ID" name="BloodBag_ID" value="<?php echo $row['BloodBag_ID'];?>" /><br>

        <label for="PhleCode">PhleCode:</label>
        <input type="text" id="PhleCode" name="PhleCode" value="<?php echo $row['PhleCode'];?>" /><br>

        <label for="DateofDonate">DateofDonate:</label>
        <input type="date" id="DateofDonate" name="DateofDonate" value="<?php echo $row['DateofDonate'];?>" /><br>

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

        <label for="volum">Volum:</label>
        <input type="range" id="volum" name="volum" value="<?php echo $row['volum'];?>" /><br>

        
        
        
        <?php if ($row['Test_Status'] == 1) { ?>
            <label for="Test_Status">Test_Status:</label>
            <label for="Test_Status">ผ่าน:</label>
            <input type="radio" id=pass name="Test_Status" value="1" checked/>
            <label for="Test_Status">ไม่ผ่าน:</label>
            <input type="radio" id=not_pass name="Test_Status" value="0"/><br>
        <?php }else{ ?>
            <label for="Test_Status">Test_Status:</label>
            <label for="Test_Status">ผ่าน:</label>
            <input type="radio" id=pass name="Test_Status" value="1"/>
            <label for="Test_Status">ไม่ผ่าน:</label>
            <input type="radio" id=not_pass name="Test_Status" value="0" checked/><br>
        <?php } ?>


        

        <label for="Donor_ID">Donor_ID:</label>
        <input type="text" id="Donor_ID" name="Donor_ID" value="<?php echo $row['Donor_ID'];?>" /><br>


        <!-- <label for="Status">Status:</label> ไม่ควร update ได้
        <input type="text" id="Status" name="Status" value="<?php echo $row['Status'];?>" /><br> -->


        <input type="submit" value="ส่ง" >
        <input type="reset" value="เคลียร์">

    </form>
</body>
</html>