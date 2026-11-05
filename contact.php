<?php
include "env.php";  // Inclure les variables d'environnement
?>

<!DOCTYPE html>
<html lang="fr">

<head>
<meta name="theme-color" content="#47657F">
    <!-- Meta et styles -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Lien vers la feuille de style CSS -->
    <link rel="stylesheet" href="style.css" />
    
    <!-- Icônes FontAwesome -->
    <script src="https://kit.fontawesome.com/d76759a8b0.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Bandeau -->
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
            
                <div class="droite">
                    <div class="controls">
                        <h2>Contactez-nous</h2>
                        <form action="INCcontact.php" method="POST">
                            <div class="form-group">
                                <label for="email" class="textprop">Email :</label>
                                <input type="email" id="email" name="email" placeholder="Votre email" required>
                            </div>
                            <div class="form-group">
                            <label for="message" class="textprop">Message :</label>
                            <textarea id="message" name="message" placeholder="Votre message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn-modifier">Envoyer</button>
                        </form>
                    </div>  
                </div>
  
            </div>
        </div>
    </div>
                        

    <!-- Footer -->
    <div class="footerdiv">
        <?php include "footer.php"; ?>
    </div>
</body>

</html>
