<?php
    session_start();
    $Order_ID=$_GET['Order_ID'];
    $Status=$_GET['Status'];
    $Plasma_num=$_GET['Plasma_num'];
    $BCs_num=$_GET['BCs_num'];
    $Platelets_num=$_GET['Platelets_num'];
    $Bgroup=$_GET['Bgroup'];
    $check_Plasma=0;// 0 คือของไม่พอorder
    $check_BCs=0;
    $check_Platelets=0;
    include('connectDB.php');
    

    //1. check_stock
    if ($Plasma_num > 0){ // check ว่า มากกว่า 0 มั้ย
        //หาrecord product ที่ เป็นtype Plasma จาก 'Plasma' และตัวแปร $Bgroup
        $sql="SELECT * FROM Product PD INNER JOIN Protype PT ON PD.Protype_ID = PT.Protype_ID 
        WHERE  PD.Status=1 AND PT.Protype_name LIKE 'Plasma_".$Bgroup."'ORDER BY `Product_ID` ASC LIMIT ".$Plasma_num;//LIMIT ".$Plasma_num คือเอามาตามจำนวนที่รับจาก $Plasma_num
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) == $Plasma_num){ // ถ้า recordที่หาได้ในstockมีเท่ากับ ค่า$Plasma_num(หรือจำนวนถุงที่หมอต้องการ)
            $check_Plasma=1; // 1 คือของพอOrder
        }else{
            $check_Plasma=0;
            //คำสั่งบางอย่างที่ทำแล้วออกจากไฟล์ไปเลยไม่ทำต่อมีมั้ย?
        }
    }else{
        $check_Plasma=1; //ถ้า $Plasma เป็น 0 คือไม่ได้สั่งสินค้านั้น ดังนั้นจึงพอstockแน่นอน
    }
    if ($BCs_num > 0){
        $sql="SELECT * FROM Product PD INNER JOIN Protype PT ON PD.Protype_ID = PT.Protype_ID 
        WHERE  PD.Status=1 AND PT.Protype_name LIKE 'Plasma_".$Bgroup."'ORDER BY `Product_ID` ASC LIMIT ".$BCs_num;
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows ($result) == $BCs_num){
            $check_BCs=1;
        }else{
            $check_BCs=0;
        }
    }
    else{
        $check_BCs=1;
    }
    if ($Platelets_num > 0){
        $sql="SELECT * FROM Product PD INNER JOIN Protype PT ON PD.Protype_ID = PT.Protype_ID 
        WHERE  PD.Status=1 AND PT.Protype_name LIKE 'Plasma_".$Bgroup."'ORDER BY `Product_ID` ASC LIMIT ".$Platelets_num;
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows ($result) == $Platelets_num){
            $check_Platelets=1;
        }else{
            $check_Platelets=0;
        }
    }else{
        $check_Platelets=1;
    }



    //2. ทำการ INSERT ลง LogOrder 
    if($check_Plasma==1 AND $check_BCs==1 AND $check_Platelets==1){
        if ($Plasma_num > 0){ //check ว่า มากกว่า 0 มั้ย //ต้องcheckอยู่เพราะว่า เมื่อ$Plasma=0ไม่ควรจะเข้ามาINSERTลงLogOrder
            $sql="SELECT * FROM Product PD INNER JOIN Protype PT ON PD.Protype_ID = PT.Protype_ID 
            WHERE PD.Status=1 AND PT.Protype_name LIKE 'Plasma_".$Bgroup."'ORDER BY `Product_ID` ASC LIMIT ".$Plasma_num;
            $result = mysqli_query($conn,$sql);
            //ก่อนหน้านี้คำสั่งsqlด้านบนคุณไม่กำหนดในWHEREว่าเอาStatus=1ด้วย เลยทำให้เมื่อถุงสถานะเป็น0(คือ"ใช้แล้ว")เป็นถุงเก่าสุด จะทำให้มันเมื่อเข้าwhileด้านล่างสถานะ0ก็ยังเป็นสถานะ0
            if (mysqli_num_rows ($result) == $Plasma_num){//หักstock
                while($row = $result->fetch_assoc()) {//fetch เป็น array ที่ละ record
                    $sql="INSERT INTO `LogOrder`(`Product_ID`, `Order_ID`, `Protype_ID`) VALUES (".$row['Product_ID'].",".$Order_ID.",".$row['Protype_ID'].")";
                    if ($conn->query($sql)) {
                        echo "New record created successfully";
                        // header('location: ../html/Member_UI/ChangeOrder.php'); //กลับไปยังหน้าตาราง
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }//ทำการ update status record นี้ ของ Product
                    $sql="UPDATE Product PD  SET PD.Status=0 WHERE PD.Product_ID = ".$row['Product_ID'];
                    if ($conn->query($sql)) {
                        echo "New record created successfully";
                        // header('location: ../html/Member_UI/ChangeOrder.php'); //กลับไปยังหน้าตาราง
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            }
        }
        if ($BCs_num > 0){
            $sql="SELECT * FROM Product PD INNER JOIN Protype PT ON PD.Protype_ID = PT.Protype_ID 
            WHERE  PD.Status=1 AND PT.Protype_name LIKE 'Plasma_".$Bgroup."'ORDER BY `Product_ID` ASC LIMIT ".$BCs_num;//คืนค่าrecordไม่เกิน BCs_num
            $result = mysqli_query($conn,$sql);

            if (mysqli_num_rows ( $result ) == $BCs_num){//หักstock
                // $check_update=1;
                while($row = $result->fetch_assoc()) {
                    $sql="INSERT INTO `LogOrder`(`Product_ID`, `Order_ID`, `Protype_ID`) VALUES (".$row['Product_ID'].",".$Order_ID.",".$row['Protype_ID'].")";
                    if ($conn->query($sql)) {
                        echo "New record created successfully";
                        // header('location: ../html/Member_UI/ChangeOrder.php'); //กลับไปยังหน้าตาราง
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    $sql="UPDATE Product PD INNER JOIN Protype PT ON PD.Protype_ID = PT.Protype_ID SET PD.Status=0 
                    WHERE PD.Product_ID = ".$row['Product_ID'];
                    if ($conn->query($sql)) {
                        echo "New record created successfully";
                        // header('location: ../html/Member_UI/ChangeOrder.php'); //กลับไปยังหน้าตาราง
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            }
        }
        if ($Platelets_num > 0){
            $sql="SELECT * FROM Product PD INNER JOIN Protype PT ON PD.Protype_ID = PT.Protype_ID 
            WHERE  PD.Status=1 AND PT.Protype_name LIKE 'Plasma_".$Bgroup."'ORDER BY `Product_ID` ASC LIMIT ".$Plasma_num;
            $result = mysqli_query($conn,$sql);

            if (mysqli_num_rows ( $result ) == $Plasma_num){//หักstock
                // $check_update=1;
                while($row = $result->fetch_assoc()) {
                    $sql="INSERT INTO `LogOrder`(`Product_ID`, `Order_ID`, `Protype_ID`) VALUES (".$row['Product_ID'].",".$Order_ID.",".$row['Protype_ID'].")";
                    if ($conn->query($sql)) {
                        echo "New record created successfully";
                        // header('location: ../html/Member_UI/ChangeOrder.php'); //กลับไปยังหน้าตาราง
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    $sql="UPDATE Product PD INNER JOIN Protype PT ON PD.Protype_ID = PT.Protype_ID SET PD.Status=0 
                    WHERE PD.Product_ID = ".$row['Product_ID'];
                    if ($conn->query($sql)) {
                        echo "New record created successfully";
                        // header('location: ../html/Member_UI/ChangeOrder.php'); //กลับไปยังหน้าตาราง
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            }
        }
    }

    //ทำการUPDATE สถานะของ Order
    if ($check_Plasma==1 AND $check_BCs==1 AND $check_Platelets==1){
        $sql="UPDATE Order_Blood SET Status =".$Status.", Endorser_ID =".$_SESSION["Employee_ID"]." WHERE Order_ID = ".$Order_ID;
        if ($conn->query($sql)) {
            echo "New record created successfully";
            header('location: ../html/Member_UI/ChangeOrder.php'); //กลับไปยังหน้าตาราง
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else{//ถ้าของไม่พร้อมOrder การกลับไปหน้าเดิม
        header('location: ../html/Member_UI/ChangeOrder.php');
    }

$conn->close();
?>