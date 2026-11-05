<?php
include "env.php";

/* ===============================
   PAGINATION
=============================== */
$defs_per_page = 30;
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$start = ($page - 1) * $defs_per_page;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="theme-color" content="#47657F">
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Définitions – Définitions Numérique</title>
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

                    <br>
                    <h3>
                        Nous mettons à votre disposition des définitions simples et accessibles<br>
                        pour mieux comprendre les concepts du numérique.
                    </h3>

                    <a href="definitions.php" class="menu-button">
                        Les définitions du Numérique
                    </a>

                    <hr>

                    <?php
                    // Connexion DB
                    $conn = new mysqli(
                        $_ENV['DB_SERVERNAME'],
                        $_ENV['DB_USERNAME'],
                        $_ENV['DB_PASSWORD'],
                        $_ENV['DB_NAME']
                    );
                    $conn->set_charset("utf8mb4");

                    if ($conn->connect_error) {
                        die("Erreur connexion : " . $conn->connect_error);
                    }

                    // Total pour pagination
                    $totalRes = $conn->query("SELECT COUNT(*) AS total FROM definition WHERE valider = 2");
                    if (!$totalRes) {
                        die("Erreur SQL COUNT : " . $conn->error);
                    }

                    $totalRow = $totalRes->fetch_assoc();
                    $total_defs = (int)$totalRow['total'];
                    $total_pages = (int)ceil($total_defs / $defs_per_page);

                    // Définitions paginées (AVEC nb_vue)
                    $sql = "
                        SELECT defid, deftitre, nb_vue
                        FROM definition
                        WHERE valider = 2
                        ORDER BY deftitre ASC
                        LIMIT $start, $defs_per_page
                    ";

                    $result = $conn->query($sql);
                    if (!$result) {
                        die("Erreur SQL LISTE : " . $conn->error);
                    }

                    if ($result->num_rows > 0) {

                        echo '<div class="definition-container">';

                        while ($row = $result->fetch_assoc()) {

                            $nbVues = (int)$row['nb_vue'];
                            $badge = ($nbVues >= 1000)
                                ? '<span class="badge-populaire">🔥 Très consulté</span>'
                                : '';

                            echo '<div class="related-item">';

                                // Titre (cliquable)
                                echo '<a href="affichedef.php?defid=' . (int)$row['defid'] . '" class="related-line">';
                                    echo '<span class="related-title">' . htmlspecialchars($row['deftitre']) . '</span>';
                                echo '</a>';

                                // Vues (NON cliquable)
                                echo '<span class="related-meta">';
                                    echo '👁 ' . $nbVues . ' vues ' . $badge;
                                echo '</span>';

                            echo '</div>';
                        }

                        echo '</div>';

                        // Pagination
                        if ($total_pages > 1) {
                            echo '<div class="pagination">';
                            for ($i = 1; $i <= $total_pages; $i++) {
                                $active = ($i === $page) ? 'active' : '';
                                echo '<a href="?page=' . $i . '" class="page-link ' . $active . '">' . $i . '</a>';
                            }
                            echo '</div>';
                        }

                    } else {
                        echo '<p>Aucune définition trouvée.</p>';
                    }

                    $conn->close();
                    ?>

                    <hr><br>

                    <div class="proposer-def-btn">
                        <a href="newdef.php" class="btn-modifier">
                            Proposer une définition
                        </a> <br>
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
