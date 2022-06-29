<!DOCTYPE html>
<html>
    <head>
        <title>SOLDS</title>
        <link href="../Styles/Vstyles.css" rel="stylesheet" type="text/css">
        
    </head>
    <body>
        <form id="formValue" method="post">
        </form>
        <header >
            
            <A href='../index.html'><img src="../images/LOGO.png"  ></A>
            <div class="Center"><h1>ENJOY THE TRIP <H1 style="color: rgb(243, 181, 152);">IN OUR CARS</H1></h1></div>
            <div id="contact">CONTACT US:    tiquitos_cars@gmail.com<br><br><br>PHONE:    449-123-45-67</div>
            
        </header>
        <input style="font-weight:bolder; position: absolute; float: right; margin: 50px;" class="ghost-button" type="button" name="INS_SOLD id="INS_SOLD" value="INSERT SOLD" onclick="location.href='Insert_Sold.html'">

        <?php
             $servername = "localhost:3306";
             $username = "root";
             $password = "";
         
             $conn = new mysqli($servername,$username,$password);
         
             if($conn->connect_error){
                 die("Connection Failed: ".$conn->connect_error);
             }
             //echo "Connected Successfully";
             
             $get_users = "SELECT * FROM car_system.SOLDS";
             $results = $conn->query($get_users);

            if ($results->num_rows > 0) {
                echo "<div class='box' >";
                echo " <h2>SOLDS REGISTER</h2>";
                echo "<table >";
                echo "<thead><th>SOLD ID</th><th>CLIENT ID</th><th>SELLER ID</th><th>CAR ID</th><th>DATE</th><th>PAY METHOD</th></thead>";

                while($row = $results->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row["SOID"]."</td><td>".$row["ClID"]."</td><td>".$row["SID"]."</td><td>".$row["CarID"]."</td><td>".$row["SDATE"]."</td><td>".$row["PAY_METHOD"]."</td><td style='text-align: center;'><img src='../icons/modify.png' id='mod_".$row["SOID"]."' width='35' height='35' title ='Modificar usuario' onClick='modUser(".$row["SOID"].")'></td><td style='text-align: center;'><img src='../icons/delete.png' id='del_".$row["SOID"]."' width='35' height='35' title ='Eliminar usuario' onClick='delUser(".$row["SOID"].")'></td>";
                    echo "</tr>";
                }

                echo "</table>";
                echo "</div>";
            } else {
                echo "<div class='box' >";
                echo " <h2 >NO SOLDS REGISTER</h2>";
                echo "</div>";
            }

        ?>
        <script>
            function modUser(_ID){
                //document.getElementById('mod_id').value = userId;
               // document.write(document.getElementById('mod_id').value);
                document.getElementById('formValue').action = "modify_Sold.php?id="+_ID;
                document.getElementById('formValue').submit();
            }
            function delUser(userId){
                document.getElementById('formValue').action = "delete_Sold.php?id="+userId;
                document.getElementById('formValue').submit();
            }
        </script>
    </body>
</html>