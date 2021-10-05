<!-- หน้านี้ไม่ได้ทำ UPDATE กับ DELETE -->
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
        <a class="nav-link active" href="StockProduct.php">คลัง Product</a>
        <a class="nav-link " href="StockAProduct.php">คลัง Product รวม</a>
        <a class="nav-link " href="StatusOrderMember.php">StatusOrder</a>
        <a class="nav-link" href="../../php/Logout.php" role="button" style="color:red;">Logout</a>
    </nav>

    <br>

    <form class="form-inline mt-2 mt-md-0" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <label for="inputEmail3" class="col-sm-2 control-label">ค้นหา : </label>
        <input class="form-control mr-sm-2" type="text" name="txt_keyword" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="reset">reset</button> -->
    </form>
    <br>
    

    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {//ถ้ากดส่ง

        if (empty($_POST["txt_keyword"])) {
            // $str_sql = "SELECT * FROM Product WHERE Product_ID = 0";//เพื่อให้หาไม่เจอ(0 เพราะวเรากำหนดIDเริ่มจาก1)
            $str_sql = "SELECT * FROM Product";
        } else {
            $txt_keyword = $_POST["txt_keyword"];//หาได้จาก3อย่างคือ Donor_ID, NIN, Name
            $str_sql = "SELECT * FROM Product WHERE Product_ID LIKE '%$txt_keyword%' OR Protype_ID LIKE '%$txt_keyword%' OR BloodBag_ID LIKE '%$txt_keyword%'" ;
            //ไม่ต่อstringเพราะตัวแปรมันเป็นstring
        }
        
    }else{//ถ้าไม่กดส่ง
        $str_sql = "SELECT * FROM Product";
    }
    ?>

    <!-- <div style="height:500px;width:600px;overflow:auto;" > -->
        <!-- <a href="../DonorForm.html" onclick="" role="button">Create</a> -->
        <table border="2" id="customers">
        <thead>
            <tr>
                    <th>Product_ID</th>
                    <th>Protype_ID</th>
                    <th>BloodBag_ID</th>
                    <th>volum</th>
                    <th>Test_Status</th>
                    <th>Status</th>

                    <!-- <th>Update</th> -->
                    <!-- <th>Delete</th> -->
            </tr>
        </thead>
        <tbody align="center">
        <?php
        include('connectDB.php');
        $sql = $str_sql;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        //แสดงข้อมูลเป็นตาราง
            while($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>'.$row['Product_ID'].'</td>';
                    echo '<td>'.$row['Protype_ID'].'</td>';
                    echo '<td>'.$row['BloodBag_ID'].'</td>';
                    echo '<td>'.$row['volum'].'</td>';
                    if ($row['Test_Status']==0){
                        echo '<td>'."ไม่ผ่าน".'</td>';
                    }else{
                        echo '<td>'."ผ่าน".'</td>';
                    }
                    if ($row['Status']==0){
                        echo '<td>'."ใช้แล้ว".'</td>';
                    }else{
                        echo '<td>'."ยังอยู่ในคลัง".'</td>';
                    }
                    
                    ?>
                    <!-- <td><a href="../../php/update_Product.php?Product_ID=" role="button">UPDATE</a></td>
                    <td><a href="delete_cus.php?Product_ID=" onclick="return confirm('Are you sure')" role="button">DELETE</a></td> -->
                    <?php
                    echo '</tr>';
                }
            } else {
                echo " ";
            }
            $conn->close();
            ?>
        </tbody>
        </table>
    <!-- </div> -->

</body>
</html>