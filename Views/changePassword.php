<?php
$email = $_SESSION['login'];
?>
<html>
  <head>
  	<title>ID/Password</title>
  	<link rel="stylesheet" href="/Genhome/Styles/changePassword.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="/Genhome/Scripts/js_modify_password.js"></script>
  </head>
  <body>
    <main>
      <section class="logo">
          <image class="img" src="/Genhome/Images/logo.png">
      </section>
      <section class="name">
          <h1>Genhome</h1>
      </section>
      <section class="vide">
      </section>
  	  <section class="titlee">
          <h2>Do you want to change your Password?</h2>
  	  </section>
      <section class="login">
        <form id="form2"  method="post" action="index.php?t=newpassword">
  	      <div class="login1">
          <div class="a">
  		        <label for="text1">Email</label> &ensp; <label class="text1"><?php echo($email)?></label>
          </div>
          <div class="b">
              <p></p>
  		        <label for="text2">New Password</label> &ensp; <input class="text2" type="password" minlength="6" maxlength="30" name="N_password" required>
  		    </div>
          <div class="c">
              <p></p>
              <label for="text3">Confirm Password</label> &ensp; <input class="text3" type="password" minlength="6" maxlength="30" name="C_password" required>
          </div>
          <div class="d">
              <p></p>
  		        <button type="skip">Skip</button></div>
  		        <div class="e">
                  <p></p>


                  <button id="butt" name="submit" type="submit" >Submit</button>

              </div>
  	       </div>
         </form>
        </section>
      </main>
  </body>
</html>
