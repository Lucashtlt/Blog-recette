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

<?php

    $reponse = $bdd->query("SELECT * FROM categorie");
    $reponseRecette = $bdd->query("SELECT * FROM recette");

?>

<div id="global">

    <div id="categorie">


        <ul>
        <?php
             while ($donnees = $reponse->fetch())
            {
         ?>
            <li><a href="categorie.php?idCategorie=<?php echo $donnees['id']; ?>"><?php echo $donnees['nom']; ?></a></li>

        <?php
           }
           $reponse->closeCursor();
        ?>

    </ul>

    </div>
    <article>
        <header>
        <?php
             while ($donneesRecette = $reponseRecette->fetch())
            {
         ?>
            <img class="imgRecette" src="img/<?php echo $donneesRecette['photo']; ?>" width="300px" height="242px" alt="Tartiflette" />

            <a href="recette.php?idRecette=<?php echo $donneesRecette['id']; ?>">
                <h1 class="titreRecette">
                    <?php echo $donneesRecette['titre']; ?>
                </h1>
            </a>


            <time>
                <?php 
                    $date = new DateTime($donnees['dateCreation']);   
                    echo $date->format('Y-m-d');
                    
                ?>
            </time>


        </header>
        <p>
            <?php echo $donneesRecette['description']; ?>
        </p>
        <?php
            }
             $reponseRecette->closeCursor();
        ?>
    </article>
    <hr />

</div>
<!-- Le pied de page -->

<?php include("footer.php"); ?>
</body>
</html>