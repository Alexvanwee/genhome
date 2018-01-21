<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/Genhome/Styles/new_home.css" rel="stylesheet" type="text/css" />
</head>

<body class="homes_body">

    <div class="homes_container">
        <div class="new_home">
            <form id="homeForm" method="post">
                <span class="home_title">Add a New Home : </span>
                <input type="text" id="address" name="address" placeholder="Address">
                <input type="text" id="home_name" name="home_name" placeholder="Home Name">
                <input type="submit" id="Submit" value="Submit">
            </form>
        </div>
        <div class="homes">
            <div class="homes_elements">
                <span class="table_title">Your Homes</span>
                <table class="homes_table">
                    <tr id="head_table">
                        <th id="address_table">Address</th>
                        <th id="name_table">Home Name</th> 
                        <th id="delete_table"></th>
                    </tr>
                    
                    <tr>
                        <td>Jill</td>
                        <td>Smith</td> 
                        <td id="delete"><button class="delete_button" title="Delete" type="button"/></td>
                    </tr>
                </table>
            </div> 
            
        </div>

    </div>

</body>

</html>