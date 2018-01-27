<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/Genhome/Styles/new_room.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/Genhome/Scripts/js_new_room.js"></script>
</head>

<body class="rooms_body">

    <div class="rooms_container">
        
        <div class="new_room">
            <form id="roomForm" method="post">
                <span class="room_title">Add a New Room : </span>
                <select id="room_type" name="room_type" class="selection" required>
                    <option value="" disabled selected>Room Type...</option>
                    <option value="kitchen">Kitchen</option>
                    <option value="bathroom">Bathroom</option>
                    <option value="bedroom">Bedroom</option>
                    <option value="dining">Dining Room</option>
                    <option value="living">Living Room</option>
                    <option value="laundry">Laundry Room</option>
                    <option value="office">Office</option>
                    <option value="other">Other</option>
                </select>
                <input type="text" id="room_name" name="room_name" maxlength="20" placeholder="Room Name">
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
                        <th id="name_table">Room Name</th> 
                        <th id="delete_table"></th>
                    </tr>
                    <!-- CONTROLLER TO DISPLAY THE ROOMS -->
                    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Controllers/cv_full_rooms.php'; ?>
                </table>
            </div> 
            
        </div>

    </div>

</body>

</html>