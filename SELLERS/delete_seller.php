<!DOCTYPE html>
<html>
    <head>
        <title>Modify User</title>
        <script>
            function showUsers(){
                document.getElementById('form02').action="View_Seller.php"
                document.getElementById('form02').submit();

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
    <div class="box">
        
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
                echo "<p align='center'>THIS SELLER DOES NOT EXIST</p>";
            }
        ?>
        <form action="delete_Seller02.php" id="form02" method="post" align="center" class="mod_table">
            <p align="center">DELETE THE SELECTED SELLER</p>
            <p>ARE YOU SURE YOU WANT TO DELETE THIS RECORD?: <?php echo $_GET['id'];?>?</p>
            <input id="id" name="id" type="hidden" value="<?php echo $_GET['id']; ?>">
            <input class="ghost-button" id="si" name="si" type="submit" value="YES">
            <input class="ghost-button" id="no" name="no" type="button" value="NO" onClick="showUsers()">
        </form>
        </div>
    </body>
</html>