<?php
setcookie('pseudo', $_POST["pseudo"], time() + 365*24*3600);
$bdd = new PDO('mysql:host=localhost;dbname=tp_minichat;charset=utf8', 'root', '');
$pseudo = htmlspecialchars($_POST["pseudo"]);
$Message = htmlspecialchars($_POST["Message"]);

if (isset($_POST["pseudo"], $_POST["Message"]) ){

    $req = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES(?, ?) ') or die(print_r($bdd->errorInfo())) ;
    $req->execute(array($pseudo ,$Message ))or die(print_r($bdd->errorInfo()));

}
header('Location: minichat.php');
    

?>  