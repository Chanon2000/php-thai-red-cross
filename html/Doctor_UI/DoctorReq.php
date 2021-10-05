<!doctype html>
  <html>
    <head>
      <meta charset="UTF-8">
      <title></title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link href="../table.css" rel="stylesheet" />
      <link rel="stylesheet" href="../../css/bootstrap.min.css" 
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" 
      crossorigin="anonymous">
    </head>
    <body>
    <br>
    <nav class="nav nav-pills nav-fill">
        <a class="nav-link " href="ManageDoctor.php">หน้าแรก</a>
        <a class="nav-link active" href="DoctorReq.php">ขอใช้เลือด</a>
        <a class="nav-link " href="StatusOrder.php">Status Order</a>
        <a class="nav-link" href="../../php/Logout.php" role="button" style="color:red;">Logout</a>
    </nav>



    <form action="../../php/InsertOrder.php" style="padding-left: 100px;">
        <label for="Bgroup">Choose a car:</label>
            <select name="Bgroup" id="Bgroup">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="AB">AB</option>
                <option value="O">O</option>
            </select>
        <br><br>

        <label for="Plasma_num" >Plasma:</label>
        <input type="number" id="Plasma_num" name="Plasma_num"/></br>
        <label for="BCs_num" >BCs:</label>
        <input type="number" id="BCs_num" name="BCs_num"/></br>
        <label for="Platelets_num" >Platelets:</label>
        <input type="number" id="Platelets_num" name="Platelets_num"/></br>

        <!-- <label for=""></label>
        <input type="" id="" name="" /></br>
        <label for=""></label>
        <input type="" id="" name="" /></br>
        <label for=""></label>
        <input type="" id="" name="" /></br> -->


        <input type="submit" value="Submit">
    </form>





    </body>
</html>