
<!-- 
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
//session_start();
// On récupère nos variables de session
if (isset($_SESSION['login'])) 
{
	// On teste pour voir si nos variables ont bien été enregistrées
	echo '<html>';
	echo '<head>';
	echo '<title>You are a standard user</title>';
	echo '</head>';

	echo '<body>';
	echo 'Your login is : '.$_SESSION['login'] ; //et votre mot de passe est '.$_SESSION['pwd'].'.';
	echo '<br />';
	// On affiche un lien pour fermer notre session
	echo '<a href="/Genhome/Models/logout.php">Disconnect</a>';
}
else 
{
	echo 'Variables are not set.';
}
 -->

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//cdn.muicss.com/mui-latest/css/mui.min.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-latest/js/mui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/Genhome/Scripts/js_dashboard.js"></script>
    <link href="/Genhome/Styles/dashboard.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div id="sidedrawer" class="mui--no-user-select">
      <div id="sidedrawer-brand" class="mui--appbar-line-height">
        <!-- <span class="mui--text-title">Genhome</span> -->
        <img src="/Genhome/Images/logo.png" class="thelogo" alt="Logo">
      </div>
      <div class="mui-divider"></div>
      <ul>
        <li>
          <strong>Category 1</strong>
          <ul>
            <li><a href="#">Item 1</a></li>
            <li><a href="#">Item 2</a></li>
            <li><a href="#">Item 3</a></li>
          </ul>
        </li>
        <li>
          <strong>Category 2</strong>
          <ul>
            <li><a href="#">Item 1</a></li>
            <li><a href="#">Item 2</a></li>
            <li><a href="#">Item 3</a></li>
          </ul>
        </li>
        <li>
          <strong>Category 3</strong>
          <ul>
            <li><a href="#">Item 1</a></li>
            <li><a href="#">Item 2</a></li>
            <li><a href="#">Item 3</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <header id="header">
      <div class="mui-appbar mui--appbar-line-height">
        <div class="mui-container-fluid">
          <a class="sidedrawer-toggle mui--visible-xs-inline-block mui--visible-sm-inline-block js-show-sidedrawer">☰</a>
          <a class="sidedrawer-toggle mui--hidden-xs mui--hidden-sm js-hide-sidedrawer">☰</a>
          <span class="mui--text-title mui--visible-xs-inline-block mui--visible-sm-inline-block">Genhome</span>
        </div>
      </div>
    </header>
    <div id="content-wrapper">
      <div class="mui--appbar-height"></div>
      <div class="mui-container-fluid">
        <br>
        <h1>Genhome</h1>
        <p>Texte ici</p>
      </div>
    </div>
    <footer id="footer">
      <!-- <div class="mui-container-fluid"> -->
        <!-- <br> -->
        Made with ♥ by <a href="https://www.muicss.com">MUI</a>
      <!-- </div> -->
    </footer>
  </body>
</html>