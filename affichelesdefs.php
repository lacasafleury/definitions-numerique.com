<?php
include "env.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
<meta name="theme-color" content="#47657F">
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d76759a8b0.js" crossorigin="anonymous"></script>
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
                    <?php include "gauche.php"; ?>
                </div>

                <div class="droite">
                    <div class="controls">
                        <br>
                        <a href="definitions.php" id="boutonHaut4" class="menu-button">Les définitions du Numérique</a>
                        <hr>

                        <?php
                        // Vérifier si des définitions sont disponibles dans la session
                        if (isset($_SESSION['definitions']) && !empty($_SESSION['definitions'])) {
                            // Afficher les définitions en trois colonnes
                            echo '<div class="definition-container">';
                            foreach ($_SESSION['definitions'] as $definition) {
                                echo '<div class="definition-box">';
                                echo '<h2><u><a href="affichedef.php?defid=' . urlencode($definition["defid"]) . '" class="link">' . htmlspecialchars($definition["deftitre"]) . '</a></u></h2>';
                                
                        

                                echo '<br>'; // Histoire d’aérer
                                echo '</div>';
                            }
                            echo '</div>';
                        } else {
                            echo "<p>Aucune définition trouvée.</p>"; // Si rien dans la session
                        }
                        ?>
                        <hr>
                        <br>
                        <div class="proposer-def-btn">
                            <a href="newdef.php" class="btn-modifier">Proposer une définition</a><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footerdiv">
        <?php include "footer.php"; ?>
    </div>
</body>

</html>
