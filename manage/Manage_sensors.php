<!DOCTYPE html>
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="/Manage_sensors/Manage_sensors.css">
		<title>Manage the sensors location</title>
	</head>

    <header>	
      <img id="logo" src="/Manage_sensors/logo_orange_effect.png" alt"logo">
      <h2>Website Name</h2>
      <a href="french.php"><img id="flag" src="/Manage_sensors/france.png" alt"french"></a>
      <a href="english.php"><img id="flag" src="/Manage_sensors/great-britain.png" alt"english"></a>
    </header>

    <body>

	<h1>Manage the sensors location</h1>

	<div class="exemple">
  			<img src="/Manage_sensors/living.png" height="100px" width ="100px" alt="living room"/>
  			<p>Living room</p>
  		</div>

  		<div class="add">
  			<img class="plus" src="/Manage_sensors/plus.png" height="100px" width ="100px" alt="plus"/>
  			<ul class="niveau1">
          <li>Add a new room
            <ul class="niveau2">
              <li><img src="/Manage_sensors/kitchen.png" height="30px" width ="30px" alt="kitchen"> Kitchen</li>
              <li><img src="/Manage_sensors/bathroom.png" height="30px" width ="30px" alt="bathroom"> Bathroom</li>
              <li><img src="/Manage_sensors/bedroom.png" height="30px" width ="30px" alt="bedroom"> Bedroom</li>
              <li><img src="/Manage_sensors/plus.png" height="30px" width ="30px" alt="plus"> Other</li>
            </ul>
          </li>
        </ul>
  		</div>

    <ul id="menu_accordeon">
        <div class="grid">
          <div class="box a">
   			  <li><a href="#"><strong>Kitchen</strong></a>
      			<ul>
        			 <li><a href="#"><input id="checkBox" type="checkbox">Sensor 1</a></li>
         			 <li><a href="#"><input id="checkBox" type="checkbox">Sensor 2</a></li>
         			 <li><a href="#"><input id="checkBox" type="checkbox">Sensor 3</a></li>
         			 <li><a href="#"><input id="checkBox" type="checkbox">Sensor 4</a></li>
      			</ul>
   			  </li>
          </div>

          <div class="box b">
   			  <li><a href="#"><strong>Living Room</strong></a>
      			<ul>
        			 <li><a href="#"><input id="checkBox" type="checkbox">Sensor 1</a></li>
         			 <li><a href="#"><input id="checkBox" type="checkbox">Sensor 2</a></li>
         			 <li><a href="#"><input id="checkBox" type="checkbox">Sensor 3</a></li>
         			 <li><a href="#"><input id="checkBox" type="checkbox">Sensor 4</a></li>
      			</ul>
   			  </li>
          </div>

          <div class="box c">
   			  <li><a href="#"><strong>Bathroom</strong></a>
      			<ul>
        			 <li><a href="#"><input id="checkBox" type="checkbox">Sensor 1</a></li>
         			 <li><a href="#"><input id="checkBox" type="checkbox">Sensor 2</a></li>
         			 <li><a href="#"><input id="checkBox" type="checkbox">Sensor 3</a></li>
         			 <li><a href="#"><input id="checkBox" type="checkbox">Sensor 4</a></li>
      			</ul>
   			  </li>
          </div>

          <div class="box d">
          <li><a href="#"><strong>Bedroom 1</strong></a>
            <ul>
               <li><a href="#"><input id="checkBox" type="checkbox">Sensor 1</a></li>
               <li><a href="#"><input id="checkBox" type="checkbox">Sensor 2</a></li>
               <li><a href="#"><input id="checkBox" type="checkbox">Sensor 3</a></li>
               <li><a href="#"><input id="checkBox" type="checkbox">Sensor 4</a></li>
            </ul>
          </li>
          </div>

          <div class="box e">
          <li><a href="#"><strong>Bedroom 2</strong></a>
            <ul>
               <li><a href="#"><input id="checkBox" type="checkbox">Sensor 1</a></li>
               <li><a href="#"><input id="checkBox" type="checkbox">Sensor 2</a></li>
               <li><a href="#"><input id="checkBox" type="checkbox">Sensor 3</a></li>
               <li><a href="#"><input id="checkBox" type="checkbox">Sensor 4</a></li>
            </ul>
          </li>
          </div>

          <div class="box f">
          <li><a href="#"><strong>Garage</strong></a>
            <ul>
               <li><a href="#"><input id="checkBox" type="checkbox">Sensor 1</a></li>
               <li><a href="#"><input id="checkBox" type="checkbox">Sensor 2</a></li>
               <li><a href="#"><input id="checkBox" type="checkbox">Sensor 3</a></li>
               <li><a href="#"><input id="checkBox" type="checkbox">Sensor 4</a></li>
            </ul>
          </li>
          </div>

        </div>
   	</ul>



    <a class="button" href="next.php"><img src="data:image/png;base64,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"></a>
	</body>	
</html>