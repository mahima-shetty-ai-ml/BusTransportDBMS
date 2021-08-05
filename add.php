<?php
$insert = false;   
if(isset($_POST['passenger_name'])){
   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "";
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_connect_error());
   }
   // echo "Connected successfully";
   // mysqli_close($conn);

   $passenger_name = $_POST["passenger_name"];
   $phone = $_POST["phone"];
   $source = $_POST["source"];
   $date_source = $_POST["date_source"];
   $time_source = $_POST["time_source"];
   $destination = $_POST["destination"];
   $date_destination = $_POST["date_destination"];
   $time_destination = $_POST["time_destination"];
   $fare = $_POST["fare"];
   $bus_no = $_POST["bus_no"];
   
   // INSERT INTO `bus_management` (`booking_no`, `passenger_name`, `phone`, `source`, `date_source`, `time_source`, `destination`, `date_destination`, `time_destination`) VALUES (NULL, 'Mahima Shetty', '+91 123456789', 'Mumbai', '2020-10-14', '08:47:07', 'Bangalore', '2020-10-22', '17:47:07');
   $sql = "INSERT INTO `dbms`.`bus_management` (`booking_no`, `passenger_name`, `phone`, `source`, `date_source`, `time_source`, `destination`, `date_destination`, `time_destination`,`fare`,`bus_no`) VALUES (NULL, '$passenger_name', '$phone', '$source', '$date_source', '$time_source', '$destination', '$date_destination', '$time_destination','$fare','$bus_no');";

   if($conn->query($sql) == true ){
      // echo "Successfully inserted";
      $insert = true;
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

        <br>
        <?php 
        if($insert == true)
        {
            echo "<h2 style = 'color : white; text-align: center;text-shadow: 2px 2px 5px #c7a4f7 ;' > Your submission had been successfully added! </h2> ";

        }
         ?>
         

        <div class = "formbeautify"> 
        
            <form action="add.php" method="post">
                <label for="passenger_name">Passenger Name</label>
                <input type="text" id="passenger_name" name="passenger_name" placeholder="Enter Passenger name..">
            
                <br><br>

                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" placeholder="Enter phone..">
            
                <br><br>
                <label for="source">Source</label>
                <select id="source" name="source">
                    <option value="Mumbai">Mumbai</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Bangalore">Bangalore</option>
                    <option value="Hyderabad">Hyderabad</option>
                    <option value="Ahmedabad">Ahmedabad</option>
                    <option value="Chennai">Chennai</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Agra">Agra</option>
                    <option value="Amritsar">Amritsar</option>
                    <option value="Bhopal">Bhopal</option>
                    <option value="Pune">Pune</option>
                </select>

                <br><br>

                <label for="date_source">Select a Source Date:</label>
                <input type="date" id="date_source" name="date_source">
                <br>
                <label for="time_source">Select a Source Time:</label>
                <input type="time" id="time_source" name="time_source">
                <br><br>
                <label for="destination">Destination</label>
                <select id="destination" name="destination">
                    <option value="Mumbai">Mumbai</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Bangalore">Bangalore</option>
                    <option value="Hyderabad">Hyderabad</option>
                    <option value="Ahmedabad">Ahmedabad</option>
                    <option value="Chennai">Chennai</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Agra">Agra</option>
                    <option value="Amritsar">Amritsar</option>
                    <option value="Bhopal">Bhopal</option>
                    <option value="Pune">Pune</option>
                </select>
                
                <br><br>
                <label for="date_source">Select a Destination Date:</label>
                <input type="date" id="date_source" name="date_source">
                <br>
                <label for="time_destination">Select a Destination Time:</label>
                <input type="time" id="time_destination" name="time_destination">
                <br><br>
    
                <label for="bus_no">Bus No.</label>
                <select id="bus_no" name="bus_no">
                    <option value="101">101 Mumbai<->Bangalore</option>
                    <option value="102">102 Mumbai<->Pune<->Bhopal</option>
                    <option value="103">103 Amritsar<->Delhi<->Agra</option>
                    <option value="104">104 Chennai<->Hyderabad<->Bhopal<->Agra</option>
                    <option value="105">105 Hyderabad<->Bhopal</option>
                    <option value="106">106 Kolkata<->Pune<->Mumbai</option>
                    <option value="107">107 Delhi<->Agra<->Kolkata</option>
                </select>

                <label for="fare">Fare</label>
                <input type="text" id="fare" name="fare" placeholder="Enter fare..">
            
                <input type="submit" value="Submit">
            </form>
        </div>

    </div>
      

      
</body>
</html>


