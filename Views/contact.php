<html>
<head>
    <title>Contact</title>
    <link rel="stylesheet" href="/Genhome/Styles/contact.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/Genhome/Scripts/js_contact.js"></script>
</head>
<?php 
    include_once $_SERVER['DOCUMENT_ROOT']."/Genhome/Controllers/c_contact.php"; 
    global $input_name,$input_email;
?>
<body>
  <div class="logo">
        <img src="/Genhome/Images/logo.png" class="thelogo" alt="Logo">
  </div>
  <div class="container">  
    <form id="contactForm" action="" method="post">
        <h3><span class="genhomeh3">Genhome</span> Contact Form</h3>
        <h4>Contact us for custom quote</h4>
        <div id="holder"><span id="error"></span></div>
        <div id="fields">
            <fieldset>
                <label for="name">Name</label>
                <input id="name" type="text" name="name" <?php echo($input_name) ?> >
            </fieldset>
            <fieldset>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" <?php echo($input_email) ?> >
            </fieldset>
            <fieldset>
                <label for="message">Message</label>
                <textarea id="message" placeholder="Type your message here...." name="msg" required></textarea>
            </fieldset>
            <fieldset>
                <button name="submit" type="submit" id="contact-submit">Submit</button>
            </fieldset>
        </div>
        <p class="back">Back to <a class="index" href="/Genhome/index.php">Genhome</a></p>
    </form>
  </div>
</body>

</html>