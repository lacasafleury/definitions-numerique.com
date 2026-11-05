<?php
include "env.php";  // Inclure les variables d'environnement



?>

<!DOCTYPE html>
<html lang="fr">

<head>
<meta name="theme-color" content="#47657F">
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="bandeaudiv" type="video/mp4">
        <?php include "bandeau.php"; ?>
    </div>
    <div class="search-alpha-wrapper"><div class="lettresdiv">
        <?php include "lettres.php"; ?>
    </div>
    <div class="barrediv">
        <?php include "barrederecherche.php"; ?>
    </div>
    <div class="homediv">
        <div class="container">
            <div class="home">       
			<div class="gauche">
                <?php
                include "gauche.php"
		        ?>	
		    </div>
			
			<div class="droite">
                <div class="controls">
					

	<table style="text-align: left; width:100%; border-collapse: collapse;">
  <tr>
    <td style="text-align: left; padding: 5px;">
       <a href="plan.php" id="boutonHaut4" class="menu-button">Plan du site</a>
    </td>
  </tr>
  <tr><td><a href="index.php" class="plan">Accueil</a></td></tr>
  <tr><td><a href="definitions.php" class="plan">Définitions</a></td></tr>
  <tr><td><a href="populaires.php" class="plan">Affiche les définitions les plus populaires</a></td></tr>
  <tr><td><a href="videos.php" class="plan">Vidéos</a></td></tr>
  <tr><td><a href="quiz.php" class="plan">Quiz</a></td></tr>
  
  
  
  <tr><td><a href="affichelesdefs.php" class="plan">Afficher une définition</a></td></tr>
  <tr><td><a href="categories.php" class="plan">Affiche les catégories</a></td></tr>
  <tr><td><a href="definitions.php" class="plan">Affiche toutes les définitions</a></td></tr>
  <tr><td><a href="newdef.php" class="plan">Créer une nouvelle définition</a></td></tr>
  
  
  
  <tr><td><a href="qui.php" class="plan">Qui sommes-nous</a></td></tr>
  <tr><td><a href="legal.php" class="plan">Mentions Légales</a></td></tr>
  <tr><td><a href="contact.php" class="plan">Contact</a></td></tr>
  </tr>
</table>

        

                </div>        </div>
            </div>
        </div>
    </div>
    <div class="footerdiv">
        <?php include "footer.php"; ?>
    </div>
</body>

</html>
