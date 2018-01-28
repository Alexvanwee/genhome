<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/Genhome/Styles/back_office.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/Genhome/Scripts/js_back_office.js"></script>
</head>

<body class="homes_body">

    <div class="homes_container">



        <div class="error"><p id=error></p></div>

        <div class="members">
            <div class="members_elements">
                <span class="table_title">All Members</span>
                <table class="members_table">
                    <tr id="head_table">
                        <th id="first_name_table">First Name</th>
                        <th id="last_name_table">Last Name</th>
                        <th id="email_table">Email</th>
                        <th id="statu_table">Status</th>
                        <th id="delete_table"></th>
                    </tr>
                    <!-- CONTROLLER TO DISPLAY THE HOMES -->
                    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/Genhome/Controllers/c_full_members.php'; ?>
                </table>
            </div>

        </div>
        <p></p>


        <div class="members">
            <div class="members_elements">
                <span class="table_title">New Sold</span>
                <p></p>

                <form id="serialForm"  method="post" action="">
                <label  class="serial_label" for="serialID">Serial ID</label>
        				<input  type="text" name="serialID" minlength="8" maxlength="8" required><br>
                <input id="submit" type="submit"  class="validate" value="Add">
                </form>

            </div>

        </div>

    </div>

</body>

</html>
