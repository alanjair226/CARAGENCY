<!DOCTYPE html>
<html>
    <head>
        <title>Modify Sold</title>
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
            <h2>MODIFICATIONS</h2>  
            <?php
                $servername = "localhost:3306";
                $username = "root";
                $password = "";
            
                $conn = new mysqli($servername,$username,$password);
            
            
                if($conn->connect_error){
                    die("Connection Failed: ".$conn->connect_error);
                }
                //echo "Connected Successfully";
                
                $get_user = "SELECT * FROM car_system.solds WHERE SOID=".$_GET['id'];
                $results = $conn->query($get_user);

            
                if ($results->num_rows > 0) {

                    $row = $results->fetch_assoc();

                } else {
                    echo "<p align='center'>No hay datos para este usuario</p>";
                    echo "<p class='link'><a href='homework01.html'>Inicio</a></p>";
                }
            ?>
            <form action="modify_Sold02.php" id="form01" method="post">
                <table class="mod_table">
                    <tr>
                        <th>Field</th>
                        <th>Answer</th>
                    </tr>
                    <tr>
                        <td><label for="id">Id:</label></td>
                        <td align="center">
                            <label ><?php echo $row["SOID"]; ?></label>
                            <input id="id" name="id" type="hidden" value="<?php echo $row["SOID"]; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="ClID">CLIENT ID:</label></td>
                        <td><input class="modify_input" id="ClID" name="ClID" type="text" value="<?php echo $row["ClID"]; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="SID">SELLER ID:</label></td>
                        <td><input class="modify_input" id="SID" name="SID" type="text" value="<?php echo $row["SID"]; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="CarID">CAR ID:</label></td>
                        <td><input class="modify_input" id="CarID" name="CarID" type="text" value="<?php echo $row["CarID"]; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="SDATE">SOLD DATE:</label></td>
                        <td><input class="modify_input" id="SDATE" name="SDATE" type="text" value="<?php echo $row["SDATE"]; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="PAY_METHOD">PAYMENT METHOD:</label></td>
                        <td><input class="modify_input" id="PAY_METHOD" name="PAY_METHOD" type="text" value="<?php echo $row["PAY_METHOD"]; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input style="margin:auto;" type="button"  class="ghost-button" name="mod_Car" id="mod_Car" value="SEND" onclick="enviarDatos()"></td>
                    </tr>
                </table>
            </form>
        
        </div>
    </body>
</html>