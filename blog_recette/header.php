<?php
        include("config/config.inc.php");
        try {
            $bdd = new PDO($url, $login, $password);
        }
        catch(Exception $e) {
        die('Erreur : ' . $e->getMessage());
        }
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="css/style.css" />
        <title>Mon Blog de Recettes</title>
    </head>
    <body>


    <header id="header">
        <a href="index.php"><h1 id="titreBlog">Mon Blog de Recettes</h1></a>
        <div style="width:300px;margin:20px auto;">Bienvenue sur mon blog de recettes</div>
        <div id="loginBar">
            <div class="login">
                <a class="primaryBtn login" href="inscription.php">Inscription</a>
            </div>
        </div>
    </header>


