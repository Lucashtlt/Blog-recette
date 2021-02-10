<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="css/style.css" />
        <title>Mon Blog de Recettes</title>
    </head>
    <body>
        <!-- L'en-tête -->

        <?php include("header.php"); ?>

        <div id="global">
            <h1>Inscription</h1>
            <div id="inscription">
                <form method="post" action="inscription.php" >
			        <input id="nom" name="nom" type="text" class="inputChamp" placeholder="Votre nom *" /><br />
			        <input id="pseudo" name="pseudo" type="text" class="inputChamp" placeholder="Votre pseudo *" /><br />
			        <input id="email" name="email" type="text" class="inputChamp" placeholder="Votre email *" /><br />
			        <input id="mdp" name="mdp" type="password" class="inputChamp" placeholder="Votre mot de passe *" /><br />
			        <br />
			        <input type="submit" value="Je 'm'inscris" class="submitBtn" />
		        </form>
            </div>
            <div id="erreur">
			    <p> Bienvenu nom </p>
		    </div>
		    <div id="erreur">
			    <p> Erreurs </p>
		    </div>
        </div>
        <?php include("footer.php"); ?>
    </body>
</html>
