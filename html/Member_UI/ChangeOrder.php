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
        <a class="nav-link active" href="ChangeOrder.php">จัดการข้อมูล Order</a>
        <a class="nav-link" href="ChangeDonor.php">จัดการข้อมูล Donor</a>
        <a class="nav-link " href="ChangeBB.php">จัดการข้อมูล Blood Bag</a>
        <a class="nav-link" href="StockProduct.php">คลัง Product</a>
        <a class="nav-link" href="StockAProduct.php">คลัง Product รวม</a>
        <a class="nav-link" href="StatusOrderMember.php">StatusOrder</a>
        <a class="nav-link" href="../../php/Logout.php" role="button" style="color:red;">Logout</a>
    </nav>
    <br>

    <form class="form-inline mt-2 mt-md-0" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <label for="inputEmail3" class="col-sm-2 control-label">ค้นหา : </label>
        <input class="form-control mr-sm-2" type="text" name="txt_keyword" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <br>


    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {//ถ้ากดส่ง

        if (empty($_POST["txt_keyword"])) {//กดenterแต่ไม่ใส่ข้อความ
            // $str_sql = "SELECT * FROM Order_Blood WHERE Order_ID = 0 AND Status = 0";//เพื่อให้หาไม่เจอ(0 เพราะวเรากำหนดIDเริ่มจาก1)
            $str_sql = "SELECT * FROM Order_Blood WHERE `Status` = 0";
        } else {
            $txt_keyword = $_POST["txt_keyword"];//
            $str_sql = "SELECT * FROM Order_Blood WHERE Order_ID LIKE '%$txt_keyword%' OR Employee_ID LIKE '%$txt_keyword%' AND  Status = 0";
            //ไม่ต่อstringเพราะตัวแปรมันเป็นstring
        }
        
    }else{//ถ้าไม่กดส่ง
        $str_sql = "SELECT * FROM Order_Blood WHERE `Status` = 0";
    }
    ?>

<!-- <a href="../DonorForm.html" onclick="" role="button">Create</a> -->
<table border="2" id="customers">
     <thead>
          <tr>
                <th>Order_ID</th>
                <th>Employee_ID</th>
                <th>Plasma_num</th>
                <th>BCs_num</th>
                <th>Platelets_num</th>
                <th>order_date</th>
                <th>status</th>
                <!-- <th>Endorser_ID</th> -->
                <th>Bgroup</th>



                <th>อนุมัติ</th>
                <th>ยกเลิก</th>
          </tr>
      </thead>
      <tbody align="center">
      <?php
      include('connectDB.php');
      $sql = $str_sql;
    //   echo $str_sql;
      $result = $conn->query($sql);
    //   echo var_dump($result);
      if ($result->num_rows > 0) {
      //แสดงข้อมูลเป็นตาราง
           while($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>'.$row['Order_ID'].'</td>';
                echo '<td>'.$row['Employee_ID'].'</td>';
                echo '<td>'.$row['Plasma_num'].'</td>';
                echo '<td>'.$row['BCs_num'].'</td>';
                echo '<td>'.$row['Platelets_num'].'</td>';
                echo '<td>'.$row['Order_date'].'</td>';
                // echo '<td>'.$row['Status'].'</td>';
                if ($row['Status']==0){
                    echo '<td>'.'รอดำเนินการ..'.'</td>';
                }else if($row['Status']==1){
                    echo '<td>'.'ทำการยืนยันแล้ว'.'</td>';
                }else{
                    echo '<td>'.'ยกเลิกแล้ว'.'</td>';
                }
                // echo '<td>'.$row['Endorser_ID'].'</td>';
                echo '<td>'.$row['Bgroup'].'</td>';
                
                ?>
                <td><a href="../../php/updateOrderStatus.php?Order_ID=<?php echo $row['Order_ID']; ?>&Status=1&Plasma_num=<?php echo $row['Plasma_num'];?>&BCs_num=<?php echo $row['BCs_num'];?>&Platelets_num=<?php echo $row['Platelets_num'];?>&Bgroup=<?php echo $row['Bgroup'];?>" onclick="return confirm('Are you sure')" role="button">อนุมัติ</a></td>
                <td><a href="../../php/CancelOrderStatus.php?Order_ID=<?php echo $row['Order_ID']; ?>&Status=2" onclick="return confirm('Are you sure')" role="button">ยกเลิก</a></td>
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


</body>
</html>