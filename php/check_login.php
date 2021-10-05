<?php 
session_start();
date_default_timezone_set("Asia/Bangkok");//เอาไว้บนสุดนั้นแหละ

        if(isset($_POST['Username'])){
                //checkว่าUsernameมีข้อมูลมั้ย ถ้ามี ..
				//connection
                  include("connectDB.php");
				//รับค่า user & password
                  $Username = $_POST['Username'];
                  $Password = $_POST['Password'];

				//query //$sqlได้ทุกcolumในแถวที่ตรงกับUsernameและpassword
                  $sql="SELECT * FROM EmployeeAccount Where Username='".$Username."' and Password='".$Password."' ";

                  $result = mysqli_query($conn,$sql);
                //$row = mysqli_fetch_array($result);
                //echo var_dump($result);
                  if(mysqli_num_rows($result)==1){
                        //ดึงข้อมูลออกมาให้เป็นarray
                      $row = mysqli_fetch_array($result);//เอาข้อมูลจาก $result ลง $row เป็น Array โดยมีkeyเป็น ชื่อcolum
                      //กำหนด SESSION ที่ check_login หมายความว่า ...
                      $_SESSION["Username"] = $row["Username"];
                      $_SESSION["Password"] = $row["Password"];
                      //$_SESSION["User"] = $row["Firstname"]." ".$row["Lastname"];
                      $_SESSION["Type_ID"] = $row["Type_ID"];
                      $_SESSION["Employee_ID"] = $row["Employee_ID"];

                      $sql="INSERT INTO `Log`( `EmployeeID`, `Username`) VALUES (".$row["Employee_ID"].",'".$row["Username"]."')";
                      if ($conn->query($sql) === TRUE) {
                        // echo "New record created successfully";
                        } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                      if($_SESSION["Type_ID"]==0){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin.php (OfficerTRC)
                        // echo 0;
                        Header("Location: ../html/Member_UI/ManageMember.php");

                      }

                      if ($_SESSION["Type_ID"]==1){  //ถ้าเป็น member ให้กระโดดไปหน้า user.php (Doctor)
                        // echo $_SESSION["Type_ID"];
                        Header("Location: ../html/Doctor_UI/ManageDoctor.php");

                      }


                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{


             Header("Location: Login.html"); //user & password incorrect back to login again

        }
?>