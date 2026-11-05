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
</head>

<body>
    <div class="bandeaudiv">
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
                        <br>    <h3>Découvrez notre sélection des 9 définitions incontournables <br>
                        du numérique expliquées de manière claire et accessible<br> pour mieux comprendre les concepts essentiels du digital.</h3>
                        <a href="populaires.php" id="boutonHaut4" class="menu-button">Le TOP 9 des définitions</a>
                        <hr>
                        <?php
                        // Connexion à la base de données
                        $conn = new mysqli($_ENV['DB_SERVERNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);

                        // Vérifier la connexion
                        if ($conn->connect_error) {
                            die("Échec de la connexion : " . $conn->connect_error);
                        }
	$conn->set_charset("utf8mb4");
                        // Récupération des 10 définitions les plus vues
                        $sql = "SELECT deftitre, defid, nb_vue FROM definition ORDER BY nb_vue DESC LIMIT 9";
                        $result = $conn->query($sql);
                        $compteur = 0;
                        if ($result->num_rows > 0) {
                            $definitions = [];
                            while ($row = $result->fetch_assoc()) {
                                $definitions[] = $row;
                            }

                            // Diviser les définitions en groupes de 3
                            $grouped_definitions = array_chunk($definitions, 3);

                         echo '<div class="definition-container">';

foreach ($definitions as $definition) {
    $compteur++;

    $badge = '';
    if ($definition['nb_vue'] >= 1000) {
        $badge = '<span class="badge-populaire">🔥 Très consulté</span>';
    }

    echo '<div class="related-item">';

        // Numéro du TOP
        echo '<span class="compteur-class">' . $compteur . '</span>';

        // Titre cliquable uniquement
        echo '<a href="affichedef.php?defid=' . urlencode($definition['defid']) . '" class="related-line">';
            echo '<span class="related-title">' . htmlspecialchars($definition['deftitre']) . '</span>';
        echo '</a>';

        // Vues NON cliquables
        echo '<span class="related-meta">';
            echo '👁 ' . (int)$definition['nb_vue'] . ' vues ';
            echo $badge;
        echo '</span>';

    echo '</div>';
}

echo '</div>';


                            echo '</div>';  // Fin de la container
                        } else {
                            echo "<p>Aucune définition trouvée.</p>";
                        }

                        $conn->close();
                        ?>
                        <hr>
                        <br>
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
