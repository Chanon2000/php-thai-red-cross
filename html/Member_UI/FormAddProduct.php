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
        echo $_GET['BloodBag_ID']." ".$_GET['Bgroup'];
    
    ?>

    <form action="../../php/InsertProduct.php">
        <label for="BloodBag_ID">BloodBag_ID:</label>
        <input type="text" id="BloodBag_ID" name="BloodBag_ID" value="<?php echo $_GET['BloodBag_ID']; ?>"><br>
        <label for="Bgroup">Bgroup:</label>
        <input type="text" id="Bgroup" name="Bgroup" value="<?php echo $_GET['Bgroup']; ?>"><br>

        <label for="Plasma">Plasma:</label>
        <input type="number" id="Plasma" name="Plasma" value="0"><br>


        <label for="BCs">BCs:</label>
        <input type="number" id="BCs" name="BCs" value="0"><br>


        <label for="Platelets">Platelets:</label>
        <input type="number" id="Platelets" name="Platelets" value="0"><br>

   
        <label for="volum">volum:</label>
        <input type="text" id="volum" name="volum" value="0"><br>

        <label for="Test_Status">Test_Status:</label>
        <label for="Test_Status">ผ่าน:</label>
        <input type="radio" id=pass name="Test_Status" value="1"/>
        <label for="Test_Status">ไม่ผ่าน:</label>
        <input type="radio" id=not_pass name="Test_Status" value="0"/><br>
        <!-- <label for="Status">Status:</label>
        <input type="text" id="Status" name="Status" value="0"><br> -->



        <input type="submit" value="ส่ง" >
        <input type="reset" value="เคลียร์">
    </form>




    <!-- <form>
        <label for="Plasma_A">Plasma_A:</label>
        <input type="number" id="101" name="101"><br>
        <label for="Plasma_B">Plasma_B:</label>
        <input type="number" id="102" name="102"><br>
        <label for="Plasma_AB">Plasma_AB:</label>
        <input type="number" id="103" name="103"><br>
        <label for="Plasma_O">Plasma_O:</label>
        <input type="number" id="104" name="104"><br>
        <label for="BCs_A">BCs_A:</label>
        <input type="number" id="105" name="105"><br>
        <label for="BCs_B">BCs_B:</label>
        <input type="number" id="106" name="106"><br>
        <label for="BCs_AB">BCs_AB:</label>
        <input type="number" id="107" name="107"><br>
        <label for="BCs_O">BCs_O:</label>
        <input type="number" id="108" name="108"><br>
        <label for="Platelets_A">Platelets_A:</label>
        <input type="number" id="109" name="109"><br>
        <label for="Platelets_B">Platelets_B:</label>
        <input type="number" id="110" name="110"><br>
        <label for="Platelets_AB">Platelets_AB:</label>
        <input type="number" id="111" name="111"><br>
        <label for="Platelets_O">Platelets_O:</label>
        <input type="number" id="112" name="112"><br>




        <label for="volum">Volum:</label>
        <input type="text" id="volum" name="volum"/><br>
        <label for="Test_Status">Test_Status:</label>
        <input type="text" id="Test_Status" name="Test_Status"/><br>
        <label for="Status">Status:</label>
        <input type="text" id="Status" name="Status"/><br>
    </form> -->
</body>
</html>