<!DOCTYPE html>
<html>
    <head>
        <title>Modify Seller</title>
        <script>
            function enviarDatos(){

                document.getElementById('form02').submit();

            }
        </script>
         <link href="../Styles/Vstyles.css" rel="stylesheet" type="text/css">
    </head>
    <body >
        <header >
            <A href='../index.html'><img src="../images/LOGO.png"  ></A>
            <div class="Center"><h1>ENJOY THE TRIP <H1 style="color: rgb(243, 181, 152);">IN OUR CARS</H1></h1></div>
            <div id="contact">CONTACT US:    tiquitos_cars@gmail.com<br><br><br>PHONE:    449-123-45-67</div>
        </header>
        <div class='box'> 
            <h2>SELLERS</h2>  
        <?php
             $servername = "localhost:3306";
             $username = "root";
             $password = "";
         
             $conn = new mysqli($servername,$username,$password);
         
        
             if($conn->connect_error){
                 die("Connection Failed: ".$conn->connect_error);
             }
             //echo "Connected Successfully";
             
             $get_user = "SELECT * FROM car_system.sellers WHERE SID=".$_GET['id'];
             $results = $conn->query($get_user);

           
             if ($results->num_rows > 0) {

                $row = $results->fetch_assoc();

            } else {
                echo "<p align='center'>No hay datos para este usuario</p>";
                echo "<p class='link'><a href='homework01.html'>Inicio</a></p>";
            }
        ?>
        <form action="modify_Seller02.php" id="form02" method="post">
            <table class="mod_table">
                <tr>
                    <th>Field</th>
                    <th>Answer</th>
                </tr>
                <tr>
                    <td><label for="id">Id:</label></td>
                    <td align="center">
                        <label ><?php echo $row["SID"]; ?></label>
                    <input id="id" name="id" type="hidden" value="<?php echo $row["SID"]; ?>">
                    </td>
                </tr>
                <tr>
                    <td><label for="FtName">First Name:</label></td>
                    <td><input class="modify_input" id="FtName" name="FtName" type="text" value="<?php echo $row["FtName"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="Ltname">Last Name:</label></td>
                    <td><input class="modify_input" id="Ltname" name="Ltname" type="text" value="<?php echo $row["Ltname"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="SPhone">Phone Number:</label></td>
                    <td><input class="modify_input" id="SPhone" name="SPhone" type="text" value="<?php echo $row["SPhone"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="SEmail:">Email:</label></td>
                    <td><input class="modify_input" id="SEmail:" name="SEmail" type="text" value="<?php echo $row["SEmail"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="NSALES:">Sales:</label></td>
                    <td><input class="modify_input" id="NSALES:" name="NSALES" type="text" value="<?php echo $row["NSALES"]; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input style="margin:auto;" type="button" class="ghost-button" name="user_button" id="user_button" value="Enviar" onclick="enviarDatos()"></td>
                </tr>
            </table>
        </form>
        
        </div> 
    </body>
</html>