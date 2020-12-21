
<html>
  <head>
    <title>Minichat</title>
  </head>
</html>

<body>
<form action = "minichat_post.php" method = "post">
<?php 
if(isset($_COOKIE['pseudo']))
{ 
    echo '<p><label name = "pseudo"> Entrez votre pseudo ici </label> <input type="text" name="pseudo" value="' . $_COOKIE['pseudo'] . '"> </p>';
 }
else
{ ?>
    <p><label name = "pseudo"> Entrez votre pseudo ici </label> <input type="text" name="pseudo"> </p>
<?php }
?>

<p><p><label name = "Message"> Entrez votre message ici : </label></p>
<textarea id="Message" name="Message" rows="4" cols="50">
Postez votre message ici !
</textarea></p>
<input type="submit" value="envoyer le message">
</form>

<button onclick = "window.location.href = 'minichat.php';">Rafraichir</button>
 
<?php 
$bdd = new PDO('mysql:host=localhost;dbname=tp_minichat;charset=utf8', 'root', '');
$response = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0,10');
while($donnees = $response->fetch()) {
    echo '<p><strong>' . $donnees['pseudo'] . '</strong> : ' . $donnees['message'] . '</p>';
}
?>

</body>