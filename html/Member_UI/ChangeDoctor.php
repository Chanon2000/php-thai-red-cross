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
        <a class="nav-link active" href="ChangeDoctor.php">แก้ไขข้อมูลหมอ</a>
        <a class="nav-link" href="ChangeOrder.php">จัดการข้อมูล Order</a>
        <a class="nav-link " href="ChangeDonor.php">จัดการข้อมูล Donor</a>
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
            // $str_sql = "SELECT * FROM EmployeeAccount WHERE Employee_ID = 0";//เพื่อให้หาไม่เจอ
            $str_sql = "SELECT * FROM EmployeeAccount WHERE `Type_ID`=1";
        } else {
            $txt_keyword = $_POST["txt_keyword"];
            $str_sql = "SELECT * FROM EmployeeAccount WHERE EmployeeName LIKE '%$txt_keyword%' OR Employee_ID LIKE '%$txt_keyword%' AND `Type_ID`=1";//ไม่ต่อstringเพราะตัวแปรมันเป็นstring
        }
        
    }else{//ถ้าไม่กดส่ง
        $str_sql = "SELECT * FROM EmployeeAccount WHERE `Type_ID`=1";
    }
    ?>


<!-- <a href="../RegisterEmployee.html" onclick="" role="button">Create</a> -->
<table border="2" id="customers">
     <thead>
          <tr>
                <th>Employee_Id</th>
                <th>Name</th>
                <th>sex</th>
                <!-- <th>Action</th> -->
                <th>Age</th>
                <th>Address</th>
                <th>PhoneNumber</th>
                <th>StartDate</th>

                <th>Update</th>
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
                echo '<td>'.$row['Employee_ID'].'</td>';
                echo '<td>'.$row['EmployeeName'].'</td>';
                if ($row['sex']==0){
                    echo '<td>'."ชาย".'</td>';
                }else{
                    echo '<td>'."หญิง".'</td>';
                }
                echo '<td>'.$row['Age'].'</td>';
                echo '<td>'.$row['Address'].'</td>';
                echo '<td>'.$row['PhoneNumber'].'</td>';
                echo '<td>'.$row['StartDate'].'</td>';
                ?>
                <td><a href="FormUpdateDoc.php?Employee_ID=<?php echo $row['Employee_ID']; ?>" role="button">UPDATE</a></td>
                <!-- <td><a href="../../php/delete_emp.php?Employee_ID=" onclick="return confirm('Are you sure')" role="button">DELETE</a></td> -->
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