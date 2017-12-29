<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
//session_start();
// On récupère nos variables de session
if (isset($_SESSION['login'])) 
{
	// On teste pour voir si nos variables ont bien été enregistrées
	echo '<html>';
	echo '<head>';
	echo '<title>Owner</title>';
	echo '</head>';

	echo '<body>';
	echo 'You are the user.' ;
	echo '<br />';
	// On affiche un lien pour fermer notre session
	echo '<a href="/Genhome/Models/logout.php">Disconnect</a>';
}
else 
{
	echo 'Variables are not set.';
}

?>