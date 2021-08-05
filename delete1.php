<?php
$insert = false;   

   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "";
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,"dbms");
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_connect_error());
   }
   // echo "Connected successfully";
   // mysqli_close($conn);

   $deletebooking = $_POST["deletebooking"];
   $deletepassenger = $_POST["deletepassenger"];
   
   
   // INSERT INTO `bus_management` (`booking_no`, `passenger_name`, `phone`, `source`, `date_source`, `time_source`, `destination`, `date_destination`, `time_destination`) VALUES (NULL, 'Mahima Shetty', '+91 123456789', 'Mumbai', '2020-10-14', '08:47:07', 'Bangalore', '2020-10-22', '17:47:07');
   $sql = "DELETE FROM bus_management
   WHERE (booking_no = '$deletebooking' AND passenger_name LIKE '$deletepassenger%' );";

    // $sql1 = "SELECT a.bus_no, a.booking_no, a.passenger_name, a.source, a.date_source, a.time_source, a.destination, a.date_destination, a.time_destination, a.fare, b.bus_reg, b.driver_name, b.conductor_name FROM bus_management a, businfo b WHERE a.bus_no=b.bus_no;";

    $res = mysqli_query($conn, $sql); 

   if($conn->query($sql) == true ){
      // echo "Successfully inserted";
      $insert = true;
  }
  else{
      echo "ERROR : $sql <br> $conn->error";
  }

  


  $conn->close();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        }


        input[type=submit] {
        width: 100%;
        background-color: #120f3b73;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        font-size: large;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

        input[type=submit]:hover {
        background-color: white;
        color: #120f3b73;
        border-color:  #120f3b73;
        }
        
        .formbeautify{
            width: 80%;
            height: 80%;
            position: relative;
            font-family: Georgia;
            background-color: black;
            color: white;
            padding: 20px 20px 20px 20px;
            margin: auto;
            border-radius: 0px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }


input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        }


        input[type=submit] {
        width: 100%;
        background-color: #120f3b73;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        font-size: large;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

        input[type=submit]:hover {
        background-color: white;
        color: #120f3b73;
        border-color:  #120f3b73;
        }
        
        .formbeautify{
            width: 80%;
            height: 80%;
            position: relative;
            font-family: Georgia;
            background-color: black;
            color: white;
            padding: 20px 20px 20px 20px;
            margin: auto;
            border-radius: 0px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }


        .selectquery {
        overflow: hidden;
        background-color: rgba(0, 0, 0, 0.918)
        


        }

        .selectquery a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        }

        .selectquery a:hover {
        background-color: #ddd;
        color: black;
        }

        .selectnext {
        overflow: hidden;
        background-color: rgba(0, 0, 0, 0.918)
        


        }

        .selectnext a {
        float: left;
        color: #3d305eb7;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        }

        .selectnext a:hover {
        background-color: #3d305eb7;
        color: black;
        }
        
        
        body {
        background-image: url("bus1.jpg");
        height: 500px;
        color: white;
        width: fit-content;
        padding-top: 50px;
            padding-right: 30px;
            padding-bottom: 50px;
            padding-left: 30px;
            
        }

        



        .content{
            border: 1px solid rgb(255, 255, 255);
            background-color: rgba(0, 0, 0, 0.801);
            
            
            padding-top: 50px;
            padding-right: 30px;
            padding-bottom: 50px;
            padding-left: 30px;
            
        }
        
        </style>
</head>
<body>
    
    <div class="content">
        <div class="selectquery" style="width: 100%; ">
            <a href="add.html" style="width: 22%;">ADD DATA</a>
            <a href="viewall.html" style="width: 22%;" >VIEW DATA</a>
            <a href="delete.html" style="width: 22%;" >DELETE DATA</a>
            <a href="view.html" style="width: 22%;" >SEARCH DATA</a>
        </div>

        <br><br>

        <div class="selectnext" style="width: 22%; margin-left: 35%; text-align: justify;">
            <a href="delete1.html" style="width: 100%; color: white;">DELETE DATA</a>
            
            
        </div>
        <br><br>
        <div class = "formbeautify"> 
        
            <form action="delete1.php" method="post">
                <label for="deletebooking">Delete by Booking No: </label>
                <input type="text" id="deletebooking" name="deletebooking" placeholder="Enter Booking No...">
            
                <br><br>
                <label for="deletepassenger">Delete by Passenger Name </label>
                <input type="text" id="deletepassenger" name="deletepassenger" placeholder="Enter Passenger Name...">
            
                <input type="submit" value="Submit">
            </form>
            <!-- <?php
                if (mysqli_num_rows($res1) > 0) {
                ?>
                <table id = "customers">
                
                <tr>
                    <td>Booking No</td>
                    <td>Passenger Name</td>
                    <td>Source</td>
                    <td>Source Date</td>
                    <td>Source Time</td>
                    <td>Destination</td>
                    <td>Destination Date</td>
                    <td>Destination Time</td>
                    <td>Fare</td>
                </tr>
                <?php
                $i=0;
                while($row = mysqli_fetch_array($res1)) {
                ?>
                <tr>
                    <td><?php echo $row["booking_no"]; ?></td>
                    <td><?php echo $row["passenger_name"]; ?></td>
                    <td><?php echo $row["source"]; ?></td>
                    <td><?php echo $row["date_source"]; ?></td>
                    <td><?php echo $row["time_source"]; ?></td>
                    <td><?php echo $row["destination"]; ?></td>
                    <td><?php echo $row["date_destination"]; ?></td>
                    <td><?php echo $row["time_destination"]; ?></td>
                    <td><?php echo $row["fare"]; ?></td>
                </tr>
                <?php
                $i++;
                }
                ?>
                </table>
                <?php
                }
                else{
                    echo "No result found";
                }
            ?>
             -->
        </div>

    </div>
      

      
</body>
</html>
