<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/Genhome/Styles/new_home.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/Genhome/Scripts/js_new_room.js"></script>
</head>

<body class="rooms_body">

    <div class="rooms_container">
        
        <div class="new_room">
            <form id="roomForm" method="post">
                <span class="room_title">Add a New Room : </span>
                <input type="text" id="room_type" name="room_type" placeholder="Room Type">
                <input type="text" id="room_name" name="room_name" placeholder="Room Name">
                <input type="submit" id="Submit" value="Submit">
            </form>
        </div>

        <div class="error"><p id=error></p></div>

        <div class="rooms">
            <div class="rooms_elements">
                <span class="table_title">Your Rooms</span>
                <table class="rooms_table">
                    <tr id="head_table">
                        <th id="room_type_table">Room Type</th>
                        <th id="room_name_table">Room Name</th> 
                        <th id="delete_table"></th>
                    </tr>
                    <!-- CONTROLLER TO DISPLAY THE rooms -->
                    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Controllers/cv_full_rooms.php'; ?>
                </table>
            </div> 
            
        </div>

    </div>

</body>

</html>