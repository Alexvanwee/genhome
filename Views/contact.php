<html>
<head>
    <link rel="stylesheet" href="/Genhome/Styles/contact.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/Genhome/Scripts/js_contact.js"></script>
</head>

<body>
  <div class="logo">
        <img src="/Genhome/Images/logo.png" class="thelogo" alt="Logo">
  </div>
  <div class="container">  
    <form id="contact" action="" method="post">
        <h3><span class="genhomeh3">Genhome</span> Contact Form</h3>
        <h4>Contact us for custom quote</h4>
        <fieldset>
            <label for="name">Name</label>
            <input id="name" type="text" tabindex="1" required >
        </fieldset>
        <fieldset>
            <label for="email">Email</label>
            <input id="email" type="email" tabindex="2" required>
        </fieldset>
        <fieldset>
            <label for="phone">Phone Number (optional)</label>
            <input id="phone" type="tel" tabindex="3" required>
        </fieldset>
        <fieldset>
            <label for="website">Your Website (optional)</label>
            <input id="website" type="url" tabindex="4" required>
        </fieldset>
        <fieldset>
            <label for="message">Message</label>
            <textarea id="message" placeholder="Type your message here...." tabindex="5" required></textarea>
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="contact-submit">Submit</button>
        </fieldset>
        <p class="back">Back to <a class="index" href="/Genhome/index.php">Genhome</a></p>
    </form>
  </div>
</body>

</html>