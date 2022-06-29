<!DOCTYPE html>
<html>
    <head>
        <title>Modify Car</title>
        <script>
            function enviarDatos(){

                document.getElementById('form01').submit();

            }
        </script>
         <link href="../Styles/Vstyles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header >
            
            <A href='../index.html'><img src="../images/LOGO.png"  ></A>
            <div class="Center"><h1>ENJOY THE TRIP <H1 style="color: rgb(243, 181, 152);">IN OUR CARS</H1></h1></div>
            <div id="contact">CONTACT US:    tiquitos_cars@gmail.com<br><br><br>PHONE:    449-123-45-67</div>
            
        </header>

        <div class='box'> 
            <h2>MODIFY CAR</h2>  
            <?php
                $servername = "localhost:3306";
                $username = "root";
                $password = "";
            
                $conn = new mysqli($servername,$username,$password);
            
            
                if($conn->connect_error){
                    die("Connection Failed: ".$conn->connect_error);
                }
                //echo "Connected Successfully";
                
                $get_user = "SELECT * FROM car_system.cars WHERE CarID=".$_GET['id'];
                $results = $conn->query($get_user);

            
                if ($results->num_rows > 0) {

                    $row = $results->fetch_assoc();

                } else {
                    echo "<p align='center'>No hay datos para este usuario</p>";
                    echo "<p class='link'><a href='homework01.html'>Inicio</a></p>";
                }
            ?>
            <form action="modify_Car02.php" id="form01" method="post">
                <table class="mod_table">
                    <tr>
                        <th>Campo</th>
                        <th>Respuesta</th>
                    </tr>
                    <tr>
                        <td><label for="id">Id:</label></td>
                        <td align="center">
                            <label ><?php echo $row["CarID"]; ?></label>
                            <input id="id" name="id" type="hidden" value="<?php echo $row["CarID"]; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="MODEL">MODEL:</label></td>
                        <td><input class="modify_input" id="MODEL" name="MODEL" type="text" value="<?php echo $row["CarModel"]; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="MOTOR">MOTOR:</label></td>
                        <td><input class="modify_input" id="MOTOR" name="MOTOR" type="text" value="<?php echo $row["CarMotor"]; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="TRANSMITION">TRANSMITION:</label></td>
                        <td><input class="modify_input" id="TRANSMITION" name="TRANSMITION" type="text" value="<?php echo $row["CarTransmition"]; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="CO:">COLOR:</label></td>
                        <td><input class="modify_input" id="CO:" name="COLOR" type="text" value="<?php echo $row["Color"]; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="PRI:">PRICE:</label></td>
                        <td><input class="modify_input" id="PRI:" name="PRICE" type="text" value="<?php echo $row["Price"]; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input style="margin:auto;" type="button"  class="ghost-button" name="mod_Car" id="mod_Car" value="SEND" onclick="enviarDatos()"></td>
                    </tr>
                </table>
            </form>
        
        </div>
    </body>
</html>