    
<!DOCTYPE html>
<html>
    <head>
    <title>Modify Car</title>
    <link href="../Styles/Vstyles.css" rel="stylesheet" type="text/css">
    </head>
      <body>
      <header >
            <A href='../index.html'><img src="../images/LOGO.png"  ></A>
            <div class="Center"><h1>ENJOY THE TRIP <H1 style="color: rgb(243, 181, 152);">IN OUR CARS</H1></h1></div>
            <div id="contact">CONTACT US:    tiquitos_cars@gmail.com<br><br><br>PHONE:    449-123-45-67</div>
            
        </header>
        
       <?php
            $servername = "localhost:3306";
            $username = "root";
            $password = "";

           $conn = new mysqli($servername,$username,$password);

            if($conn->connect_error){
               die("Connection Failed: ".$conn->connect_error);
              }
            //echo "Connected Successfully";

            $insert_user = "UPDATE car_system.cars SET CarID='".$_POST['id']."',CarModel='".$_POST['MODEL']."',CarMotor='".$_POST['MOTOR']."',CarTransmition='".$_POST['TRANSMITION']."',Color='".$_POST['COLOR']."',Price='".$_POST['PRICE']."' WHERE CarID= '".$_POST['id']."'";

            echo "<div class='box'>";
            ECHO "<h2>MODIFY CAR</h2>";  
            if ($conn->query($insert_user) === TRUE) {
                header("Location: View_Car.php");
             } else {
               echo "Error: " . $insert_user . "<br>" . $conn->error;
              }
            echo "</div>";

            //echo "Hola muchachos!!";
            //echo "<p> Este es el sabor que pusiste anteriormente: ".$_POST["sabor"]."</p>";
        ?>
 </body>
</html>




