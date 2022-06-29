<!DOCTYPE html>
<html>
    <head>
        <title>CARS</title>
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
        <input style="font-weight:bolder; position: absolute; float: right; margin: 50px;" class="ghost-button" type="button" name="INS_CAR" id="INS_CAR" value="INSERT CAR" onclick="location.href='Insert_Car.html'">

        <?php
             $servername = "localhost:3306";
             $username = "root";
             $password = "";
         
             $conn = new mysqli($servername,$username,$password);
         
             if($conn->connect_error){
                 die("Connection Failed: ".$conn->connect_error);
             }
             //echo "Connected Successfully";
             
             $get_users = "SELECT * FROM car_system.cars";
             $results = $conn->query($get_users);

            if ($results->num_rows > 0) {
                echo "<div class='box' >";
                echo " <h2>CARS IN STOCK</h2>";
                echo "<table >";
                echo "<thead><th>ID</th><th>MODEL</th><th>MOTOR</th><th>TANSMITION</th><th>COLOR</th><th>PRICE</th></thead>";

                while($row = $results->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row["CarID"]."</td><td>".$row["CarModel"]."</td><td>".$row["CarMotor"]."</td><td>".$row["CarTransmition"]."</td><td>".$row["Color"]."</td><td>".$row["Price"]."</td><td style='text-align: center;'><img src='../icons/modify.png' id='mod_".$row["CarID"]."' width='35' height='35' title ='Modificar usuario' onClick='modUser(".$row["CarID"].")'></tdstyle=><td style='text-align: center;' ><img src='../icons/delete.png' id='del_".$row["CarID"]."' width='35' height='35' title ='Eliminar usuario' onClick='delUser(".$row["CarID"].")'></td>";
                    echo "</tr>";
                }

                echo "</table>";
                echo "</div>";
            } else {
                echo "<div class='box' >";
                echo " <h2 >NO CARS IN STOCK</h2>";
                echo "</div>";
            }

        ?>
        <script>
            function modUser(_ID){
                //document.getElementById('mod_id').value = userId;
               // document.write(document.getElementById('mod_id').value);
                document.getElementById('formValue').action = "modify_Car.php?id="+_ID;
                document.getElementById('formValue').submit();
            }
            function delUser(userId){
                document.getElementById('formValue').action = "delete_Car.php?id="+userId;
                document.getElementById('formValue').submit();
            }
        </script>
    </body>
</html>