<html>
  <head>
  	<title>ID/Password</title>
  	<link rel="stylesheet" href="/Genhome/Styles/changePassword.css" >
  </head>
  <body> 
  <main>
    <section class="logo">
      <image class="img" src="/Genhome/Images/logo.png">
    </section>
    <section class="name"> 
      <h1>Genhome</h1>
    </section>
  	<section class="titlee">
      <h2>Do you want to change your Password?</h2>
  	</section>
    <section class="login">
  	  <div class="login1">
      <div class="a">
  		<label for="text1">Email</label> &ensp; <input class="text1" type="text" required="required">
      </div>
      <div class="b">
      <p></p>
  		<label for="text2">New Password</label> &ensp; <input class="text2" type="text" minlength="6" maxlength="30" name="N_password" required>
  		</div>
      <div class="c">
      <p></p>
      <label for="text3">Confirm Password</label> &ensp; <input class="text3" type="text" minlength="6" maxlength="30" name="C_password" required>
      </div>
      <div class="d">
      <p></p>
  		<button type="skip">Skip</button></div>
  		<div class="e">
      <p></p>
      <form action="user1.php" > 
      <button type="submit">Submit</button>
      </form> 
      </div>
  	  </div>
    </section>
  </main>
  </body> 
</html>