<!DOCTYPE html>
<html>
    <head>
        <title>CARS</title>
        <link href="../Styles/Vstyles.css" rel="stylesheet" type="text/css">
        
    </head>
    <body>
        <form id="formValue" method="post">
        </form>
        <header>
            
            <A href='../index.html'><img src="../images/LOGO.png"  ></A>
            <div class="Center"><h1>ENJOY THE TRIP <H1 style="color: rgb(243, 181, 152);">IN OUR CARS</H1></h1></div>
            <div id="contact">CONTACT US:    tiquitos_cars@gmail.com<br><br><br>PHONE:    449-123-45-67</div>
            
        </header>
        
        <input style="font-weight:bolder; position: absolute; float: right; margin: 50px;" class="ghost-button" type="button" name="INS_Cl" id="INS_Cl" value="INSERT CLIENT" onclick="location.href='Insert_Client.html'">

        <?php
             $servername = "localhost:3306";
             $username = "root";
             $password = "";
         
             $conn = new mysqli($servername,$username,$password);
         
             if($conn->connect_error){
                 die("Connection Failed: ".$conn->connect_error);
             }
             //echo "Connected Successfully";
             
             $get_users = "SELECT * FROM car_system.Clients";
             $results = $conn->query($get_users);

            if ($results->num_rows > 0) {
                echo "<div class='box' >";
                echo " <h2>CLIENTS</h2>";
                echo "<table >";
                echo "<thead><th>ID</th><th>Name</th><th>Last Name</th><th>Phone</th><th>email</th></thead>";

                while($row = $results->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row["ClID"]."</td><td>".$row["FtName"]."</td><td>".$row["Ltname"]."</td><td>".$row["ClPhone"]."</td><td>".$row["ClEmail"]."</td><td style='text-align: center;'><img src='../icons/modify.png' id='mod_".$row["ClID"]."' width='35' height='35' title ='Modificar usuario' onClick='modUser(".$row["ClID"].")'></td><td style='text-align: center;'><img src='../icons/delete.png' id='del_".$row["ClID"]."' width='35' height='35' title ='Eliminar usuario' onClick='delUser(".$row["ClID"].")'></td>";
                    echo "</tr>";
                }

                echo "</table>";
                echo "</div>";
            } else {
                echo "<div class='box' >";
                echo " <h2 >NO CLIENTS AVAILABLE</h2>";
                echo "</div>";
            }
        ?>
        <script>
            function modUser(_ID){
                //document.getElementById('mod_id').value = userId;
               // document.write(document.getElementById('mod_id').value);
                document.getElementById('formValue').action = "modify_client.php?id="+_ID;
                document.getElementById('formValue').submit();
            }
            function delUser(userId){
                document.getElementById('formValue').action = "delete_client.php?id="+userId;
                document.getElementById('formValue').submit();
            }
        </script>
    </body>
</html>