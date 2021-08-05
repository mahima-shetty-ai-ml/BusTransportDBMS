<?php
$insert = false;   
if(isset($_POST['searchpassenger'])){
   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "";
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,"dbms");
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_connect_error());
   }
   // echo "Connected successfully";
   // mysqli_close($conn);

   $searchpassenger = $_POST["searchpassenger"];
   
   
   // INSERT INTO `bus_management` (`booking_no`, `passenger_name`, `phone`, `source`, `date_source`, `time_source`, `destination`, `date_destination`, `time_destination`) VALUES (NULL, 'Mahima Shetty', '+91 123456789', 'Mumbai', '2020-10-14', '08:47:07', 'Bangalore', '2020-10-22', '17:47:07');
   $sql = "SELECT a.bus_no, a.booking_no, a.passenger_name, a.source, a.date_source, a.time_source, a.destination, a.date_destination, a.time_destination, a.fare, b.bus_reg, b.driver_name, b.conductor_name FROM bus_management a, businfo b WHERE a.bus_no=b.bus_no and passenger_name LIKE '$searchpassenger%'";

    $res = mysqli_query($conn, $sql); 

   if($conn->query($sql) == true ){
      // echo "Successfully inserted";
      $insert = true;
  }
  else{
      echo "ERROR : $sql <br> $conn->error";
  }

  $conn->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    }

    #customers tr:nth-child(even){background-color: black;}

    #customers tr:hover {background-color: #3d2e87;}

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #7e70c4;
    color: white;
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
            max-width: 1600px;
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
        padding: 14px 0px;
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
        <div class="selectnext" style="width: 100%; ">
            <a href="searchbooking.html" style="width: 16.66%; color: white;">SEARCH BY BOOKING_NO</a>
            <a href="searchpassenger.html" style="width: 16.66%; color: white;" >SEARCH BY PASSENGER NAME</a>
            <a href="searchsource.html" style="width: 16.66%; color: white;" >SEARCH BY SOURCE DATE</a>
            <a href="searchdestination.html" style="width: 16.66%; color: white;" >SEARCH BY DESTINATION DATE</a>
            <a href="searchbus.html" style="width: 16.66%; color: white;" >SEARCH BY BUS NO.</a>
            <a href="searchbusinfo.html" style="width:16.66%; color: white;" >SEARCH THE BUS</a>
        </div>
        <br><br>

        <div class = "formbeautify"> 
        
            <form action="searchpassenger.php" method="post">
                <label for="searchbooking">Passenger Name</label>
                <input type="text" id="searchpassenger" name="searchpassenger" placeholder="Enter passenger name...">
            
                <br><br>
            
                <input type="submit" value="Submit">
            </form>
            <br>
            <?php
                if (mysqli_num_rows($res) > 0) {
                ?>
                <table id = "customers">
                
                <tr>
                    <td>Bus No.</td>
                    <td>Booking No</td>
                    <td>Passenger Name</td>
                    <td>Source</td>
                    <td>Source Date</td>
                    <td>Source Time</td>
                    <td>Destination</td>
                    <td>Destination Date</td>
                    <td>Destination Time</td>
                    <td>Fare</td>
                    <td>Bus Registration No.</td>
                    <td>Bus Driver Name</td>
                    <td>Bus Conductor Name</td>
                </tr>
                <?php
                $i=0;
                while($row = mysqli_fetch_array($res)) {
                ?>
                <tr>
                    <td><?php echo $row["bus_no"]; ?></td>
                    <td><?php echo $row["booking_no"]; ?></td>
                    <td><?php echo $row["passenger_name"]; ?></td>
                    <td><?php echo $row["source"]; ?></td>
                    <td><?php echo $row["date_source"]; ?></td>
                    <td><?php echo $row["time_source"]; ?></td>
                    <td><?php echo $row["destination"]; ?></td>
                    <td><?php echo $row["date_destination"]; ?></td>
                    <td><?php echo $row["time_destination"]; ?></td>
                    <td><?php echo $row["fare"]; ?></td>
                    <td><?php echo $row["bus_reg"]; ?></td>
                    <td><?php echo $row["driver_name"]; ?></td>
                    <td><?php echo $row["conductor_name"]; ?></td>
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
            
        </div>



    </div>
      

      
</body>
</html>
