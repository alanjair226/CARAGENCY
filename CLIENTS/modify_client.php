<!DOCTYPE html>
<html>
    <head>
        <title>Modify Client</title>
        <script>
            function enviarDatos(){

                document.getElementById('form03').submit();

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
            <h2>CLIENTS</h2>  
            <?php
                $servername = "localhost:3306";
                $username = "root";
                $password = "";
            
                $conn = new mysqli($servername,$username,$password);
            
            
                if($conn->connect_error){
                    die("Connection Failed: ".$conn->connect_error);
                }
                //echo "Connected Successfully";
                
                $get_user = "SELECT * FROM car_system.CLIENTS WHERE ClID=".$_GET['id'];
                $results = $conn->query($get_user);

            
                if ($results->num_rows > 0) {

                    $row = $results->fetch_assoc();

                } else {
                    echo "<p align='center'>No hay datos para este usuario</p>";
                    echo "<p class='link'><a href='homework01.html'>Inicio</a></p>";
                }
            ?>
            <form action="modify_client02.php" id="form03" method="post">
                <table class="mod_table">
                    <tr>
                        <th>Campo</th>
                        <th>Respuesta</th>
                    </tr>
                    <tr>
                        <td><label for="ClID">Id:</label></td>
                        <td align="center">
                            <label ><?php echo $row["ClID"]; ?></label>
                            <input id="ClID" name="ClID" type="hidden" value="<?php echo $row["ClID"]; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="FtName">First Name:</label></td>
                        <td><input class="modify_input" id="FtName" name="FtName" type="text" value="<?php echo $row["FtName"]; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="LsName">Last Name:</label></td>
                        <td><input class="modify_input" id="LsName" name="LsName" type="text" value="<?php echo $row["Ltname"]; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="ClPhone">Phone:</label></td>
                        <td><input class="modify_input" id="ClPhone" name="ClPhone" type="text" value="<?php echo $row["ClPhone"]; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="ClEmail:">Email:</label></td>
                        <td><input class="modify_input" id="ClEmail" name="ClEmail" type="text" value="<?php echo $row["ClEmail"]; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input style="margin:auto;" type="button"  class="ghost-button" name="user_button" id="user_button" value="Enviar" onclick="enviarDatos()"></td>
                    </tr>
                </table>
            </form>
        
        </div>
    </body>
</html>