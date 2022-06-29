<!DOCTYPE html>
<html>
    <head>
        <title>SELLERS</title>
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
        <input style="font-weight:bolder; position: absolute; float: right; margin: 50px;" class="ghost-button" type="button" name="INS_SELLERS" id="INS_SELLERS" value="INSERT SELLER" onclick="location.href='Insert_Seller.html'">

        <?php
             $servername = "localhost:3306";
             $username = "root";
             $password = "";
         
             $conn = new mysqli($servername,$username,$password);
         
             if($conn->connect_error){
                 die("Connection Failed: ".$conn->connect_error);
             }
             //echo "Connected Successfully";
             
             $get_users = "SELECT * FROM car_system.sellers";
             $results = $conn->query($get_users);

            if ($results->num_rows > 0) {
                echo "<div class='box' >";
                echo " <h2>SELLERS</h2>";
                echo "<table >";
                echo "<thead><th>ID</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Email</th><th>Sales</th></thead>";

                while($row = $results->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row["SID"]."</td><td>".$row["FtName"]."</td><td>".$row["Ltname"]."</td><td>".$row["SPhone"]."</td><td>".$row["SEmail"]."</td><td>".$row["NSALES"]."</td><td style='text-align: center;'><img src='../icons/modify.png' id='mod_".$row["SID"]."' width='35' height='35' title ='Modificar usuario' onClick='modUser(".$row["SID"].")'></td><td style='text-align: center;'><img src='../icons/delete.png' id='del_".$row["SID"]."' width='35' height='35' title ='Eliminar usuario' onClick='delUser(".$row["SID"].")'></td>";
                    echo "</tr>";
                }

                echo "</table>";
                echo "</div>";
            } else {
                echo "<div class='box' >";
                echo " <h2>NO SELLERS AVAILABLE</h2>";
                echo "</div>";
            }
        ?>
        <script>
            function modUser(_ID){
                //document.getElementById('mod_id').value = userId;
               // document.write(document.getElementById('mod_id').value);
                document.getElementById('formValue').action = "modify_Seller.php?id="+_ID;
                document.getElementById('formValue').submit();
            }
            function delUser(userId){
                document.getElementById('formValue').action = "delete_Seller.php?id="+userId;
                document.getElementById('formValue').submit();
            }
        </script>
    </body>
</html>