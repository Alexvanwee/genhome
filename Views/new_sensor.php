<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/Genhome/Styles/new_sensor.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/Genhome/Scripts/js_new_sensor.js"></script>
</head>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Controllers/cv_full_sensors.php'; ?>
<body class="sensors_body">

    <div class="sensors_container">
        
        <div class="new_sensor_div">
            <form id="sensorForm" method="post">
                <span class="sensor_title">Add a New Sensor : </span>
                <select id="sensor_type" name="sensor_type" class="selection" required>
                    <option value="" disabled selected>Sensor Type...</option>
                    <option value="temperature">Temperature</option>
                    <option value="humidity">Humidity</option>
                    <!-- <option value="camera">Camera</option> -->
                    <option value="smoke">Smoke Detector</option>
                    <option value="window">Window Sensor</option>
                    <option value="door">Door Sensor</option>
                </select>
                <select id="room_name" name="room_name" class="selection" required>
                    <option value="" disabled selected>Choose Room...</option>
                    <?php rooms_names(); ?>
                </select>
                <input type="submit" id="Submit" value="Submit">
            </form>
        </div>

        <div class="error"><p id=error></p></div>

        <div id="sensors">
            <div class="sensors_elements">
                <span class="table_title">Your Sensors</span>
                <table class="sensors_table">
                    <tr id="head_table">
                        <th id="sensor_type_table">Sensor Type</th>
                        <th id="name_table">Room</th> 
                        <th id="delete_table"></th>
                    </tr>
                    <!-- CONTROLLER TO DISPLAY THE ROOMS -->
                    <?php sensors_table(); ?>
                </table>
            </div> 
            
        </div>

    </div>

</body>

</html>