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
    <form action="../../php/AddBBinfo.php" method="GET" name="FormAddPhle">
        <h1>ฟอร์มยืนยันการเจาะเลือด</h1>
        <labal for="Donor_ID">Donor_ID:</labal>
        <input type="text" id="Donor_ID" name="Donor_ID" value="<?php echo $_GET['Donor_ID'];?>"><br>
        <label for="PhleCode">PhleCode:</label>
        <input type="text" id="PhleCode" name="PhleCode"><br>
        <label for="DateofDonate">DateofDonate:</label>
        <input type="date" id="DateofDonate" name="DateofDonate" /><br>
        <label for="volum">Volum:</label>
        <input type="range" placeholder="450" min="0" max="600" id="volum" name="volum" /><br>
        <label for="Test_Status">Test_Status:</label>
        <label for="Test_Status">ผ่าน:</label>
        <input type="radio" id="pass" name="Test_Status" value="1"/>
        <label for="Test_Status">ไม่ผ่าน:</label>
        <input type="radio" id="not_pass" name="Test_Status" value="0"/><br>

        <!-- ข้อมูลที่เหลือสามารถเอามาจาก Donor ได้ -->

        <button type="submit" name='submit' class="btn btn-success">ยืนยัน</button>
        <!-- <input type="submit" value="ยืนยัน" /> -->
        <!-- <input type="reset" value="reset" /> -->
        <button type="reset" name='reset' class="btn btn-primary">reset</button>
    </form>
</body>
</html>