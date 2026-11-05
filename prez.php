<?php
include "env.php";

// Définir combien de définitions par page (3 par page)
$defs_per_page = 30;

// Récupérer le numéro de la page courante depuis l'URL, si pas défini mettre la page 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $defs_per_page;

// Connexion à la base de données
$conn = new mysqli($_ENV['DB_SERVERNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
	$conn->set_charset("utf8mb4");
// Vérification connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
// Connexion à la base de données
$conn2 = new mysqli($_ENV['DB_SERVERNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
	$conn2->set_charset("utf8mb4");
// Vérification connexion
if ($conn2->connect_error) {
    die("Échec de la connexion : " . $conn2->connect_error);
}

// Préparer la requête pour récupérer les définitions avec les catégories
$sql = "SELECT distinct definition.defid, prez.lien_prez, definition.deftitre FROM prez inner join definition on prez.defid=definition.defid order by definition.deftitre;";


$result = $conn->query($sql);

// Récupérer toutes les définitions dans un tableau
$definitions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $definitions[] = $row;
    }
}


$total_defs = $result->num_rows;

// Calculer le nombre total de pages
$total_pages = ceil($total_defs / $defs_per_page);

// Fermer la connexion

?>

<!DOCTYPE html>
<html lang="fr">
<head>
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

    <div class="homediv">
        <div class="container">
            <div class="home">
                <div class="gauche">
                    <?php include "gauche.php"; ?>
                </div>
                <div class="droite">
                    <div class="controls">     
                        <br>     <h3>  Nous mettons à votre disposition des prez pour faciliter la compréhension des concepts du numérique. </h3>
                        <a href="prez.php" id="boutonHaut4" class="menu-button">Les Prez du Numérique</a>
                        <hr>

                        <?php
                        // Vérifier si des définitions sont disponibles
                        if (!empty($definitions)) {
                            // Afficher les définitions en trois colonnes
                            echo '<div class="definition-container">';
                            foreach ($definitions as $definition) {
                                echo '<div class="definition-box">';
                                echo '<a href="affichedef.php?defid=' . urlencode($definition["defid"]) . '" class="link">' . htmlspecialchars($definition["deftitre"]) . '</a>';
                                echo '<br>';
								// Préparer la requête pour récupérer les vidéos associées à la définition
                                     echo '<a href="'.$definition["lien_prez"].'"><img src="prez.png"></a>';

                            
                                  
                                                                                                     
                                echo '</div>';
                            }
                            echo '</div>';

						 	
							 // Afficher les boutons de pagination
                            echo '<div class="pagination">';
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo '<a href="?page=' . $i . '" class="page-link">' . $i . '</a>';
                            }
                            echo '</div>';
						}
						else {
                            echo "<p>Aucune définition trouvée.</p>";
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
