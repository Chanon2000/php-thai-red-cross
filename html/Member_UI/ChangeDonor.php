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
        <a class="nav-link active" href="ChangeDonor.php">จัดการข้อมูล Donor</a>
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

        if (empty($_POST["txt_keyword"])) {
            // $str_sql = "SELECT * FROM DonorDetail WHERE Donor_ID = 0";//เพื่อให้หาไม่เจอ(0 เพราะวเรากำหนดIDเริ่มจาก1)
            $str_sql = "SELECT * FROM DonorDetail WHERE `Status`=0";
        } else {
            $txt_keyword = $_POST["txt_keyword"];//หาได้จาก3อย่างคือ Donor_ID, NIN, Name
            $str_sql = "SELECT * FROM DonorDetail WHERE Donor_ID LIKE '%$txt_keyword%' OR NIN LIKE '%$txt_keyword%' OR Name LIKE '%$txt_keyword%'";
            //ไม่ต่อstringเพราะตัวแปรมันเป็นstring
        }
        
    }else{//ถ้าไม่กดส่ง
        
        $str_sql = "SELECT * FROM DonorDetail WHERE `Status`=0";
    }
    ?>

<!-- <h2 style="padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;">คนท่ียังไม่ได้บริจาค</h2> -->
<!-- <a href="../DonorForm.html" onclick="" role="button">Create</a> -->
<!-- ตารางคนที่ยังไม่ได้บริจาค -->
<table border="2" id="customers">
     <thead>
          <tr>
                <th>Donor_ID</th>
                <th>NIN</th>
                <th>Name</th>
                <th>Brithday</th>
                <th>sex</th>
                <th>age</th>
                <th>Cdisease</th>
                <th>Bgroup</th>
                <th>weight</th>
                <th>Address</th>
                <th>PhoneNumber</th>
                <th>E-mail</th>
                <th>Career</th>

                <th>Update</th>
                <!-- <th>Delete</th> -->
                <th>Status</th>
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
                echo '<td>'.$row['Donor_ID'].'</td>';
                echo '<td>'.$row['NIN'].'</td>';
                echo '<td>'.$row['Name'].'</td>';
                echo '<td>'.$row['Brithday'].'</td>';
                if ($row['sex']==0){
                    echo '<td>'."ชาย".'</td>';
                }else{
                    echo '<td>'."หญิง".'</td>';
                }
                echo '<td>'.$row['Age'].'</td>';
                echo '<td>'.$row['Cdisease'].'</td>';
                echo '<td>'.$row['Bgroup'].'</td>';
                echo '<td>'.$row['weight'].'</td>';
                echo '<td>'.$row['Address'].'</td>';
                echo '<td>'.$row['PhoneNumber'].'</td>';
                echo '<td>'.$row['E-mail'].'</td>';
                echo '<td>'.$row['Career'].'</td>';
                ?>
                <td><a href="FormUpdateDonor.php?Donor_ID=<?php echo $row['Donor_ID']; ?>" role="button">UPDATE</a></td>
                <!-- <td><a href="../../php/delete_donor.php?Donor_ID=" onclick="return confirm('Are you sure')" role="button">DELETE</a></td> -->
                <td><a href="FormAddPhle.php?Donor_ID=<?php echo $row['Donor_ID']; ?>" role="button">STATUS</a></td>
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