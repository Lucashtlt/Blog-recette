<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css" />

    <?php include("header.php"); 
    
    // recupere le contenu du paramètre id qui est dans l'url et le stock dans la variable $id
    $id = $_GET['idRecette'];
    // créé une requête préparée
    $reqRecette = $bdd->prepare("SELECT * FROM recette WHERE id = ?");
    // exécute la requête préparée
    $reqRecette->execute(array($id));
    // récupère les données  lors de l'exécution de la requête
    $donnees = $reqRecette->fetch();
    
    $reqIngredients = $bdd->prepare("SELECT nom, quantite, unit FROM ingredient WHERE idRecette = ?");
    $reqIngredients->execute(array($id));

    $reqCommentaires = $bdd->prepare("SELECT * FROM commentaire WHERE idRecette = ?");
    $reqCommentaires->execute(array($id));
    
    
   ?>

    <title>Mon Blog de Recette - 
        <?php echo $donnees['titre']; ?>
    </title>
</head>


<body>
    <!-- L'en-tête -->

   

    <div id="global">
        <article>
            <header>
            <img class="imgRecette" src="
            <?php 
            echo "img/" . $donnees['photo'];
            ?>
            "/>

            <h1 class="titreRecette">
                <?php
                echo $donnees['titre'] . "<br/>";
                ?>
            </h1>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                </br>
                <time>
                    <?php 
                        $date = new DateTime($donnees['dateCreation']);   
                        echo $date->format('Y-m-d');
                        
                    ?>
                </time>
            </header>
            <p> 
                <?php
                        echo $donnees['description'] . "</br>" ;
                ?>
             </p>

        </article>
        <hr />        
        <header>
            <h2 id="titreIngredient">
                Ingrédients 
            </h2>
            <ul>
            <?php 
                while ($donnees=$reqIngredients-> fetch ())
                {
               ?>   
                   <li><?php echo $donnees['quantite'] . " " .  $donnees['unit'] . " " . $donnees['nom'];?></li>        
         <?php 
                }
                $reqIngredients->closeCursor();
                ?>
            </ul>
        </header>

        <h2 id="titreCommentaire">
            Commentaires
        </h2>

        <div class="divCommentaire">
            <?php 
                while ($donnees=$reqCommentaires-> fetch ())
                 {
                ?>   
                    <p><?php echo $donnees['auteur'] . " " .  $donnees['contenu'] ?></p>     
                    <p><?php echo $donnees['note'] ?><p>     
                    <p><?php echo $donnees['dateCreation'] ?><p>       
          <?php 
                 }
                 $reqCommentaires->closeCursor();
                 ?>
            <hr/>
        </div>

        <form method="post" action="recette.php?id=" >
			<input id="auteur" name="auteur" type="text" placeholder="Votre nom *" class="inputChamp" /><br />
			<textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire *" class="inputTextArea" ></textarea><br/>
			<label for="note">Note</label><br />
            <select name="note" id="note" class="select">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
			<br />
			<input type="submit" value="Commenter" class="submitBtn" />
		</form>
		<div id="erreur">
			<p> Erreurs </p>
		</div>	

    </div>
    <!-- Le pied de page -->

    <?php include("footer.php"); ?>
</body>
</html>
