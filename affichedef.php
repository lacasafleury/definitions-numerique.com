<?php
include "env.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="theme-color" content="#47657F">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Définition – Définitions Numérique</title>
</head>

<body>

<div class="bandeaudiv"><?php include "bandeau.php"; ?></div>
<div class="lettresdiv"><?php include "lettres.php"; ?></div>

<div class="homediv">
    <div class="container">
        <div class="home">

            <!-- COLONNE GAUCHE (inchangée) -->
            <div class="gauche">
                <?php include "gauche.php"; ?>
            </div>

            <!-- CONTENU PRINCIPAL -->
            <div class="droite">
                <div class="definition-page">

<?php
$conn = new mysqli(
    $_ENV['DB_SERVERNAME'],
    $_ENV['DB_USERNAME'],
    $_ENV['DB_PASSWORD'],
    $_ENV['DB_NAME']
);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Erreur de connexion");
}

if (isset($_GET['defid'])) {
    $motId = (int)$_GET['defid'];

    $stmt = $conn->prepare(
        "SELECT defid, deftitre, definition, nb_vue, defauteur, defdate 
         FROM definition WHERE defid = ?"
    );
    $stmt->bind_param("i", $motId);
    $stmt->execute();
    $result = $stmt->get_result();
    $definition = $result->fetch_assoc();

    if ($definition) {

        // Mise à jour des vues
        $newNbVues = $definition['nb_vue'] + 1;
        $update = $conn->prepare("UPDATE definition SET nb_vue = ? WHERE defid = ?");
        $update->bind_param("ii", $newNbVues, $motId);
        $update->execute();
        $update->close();
        ?>

        <!-- TITRE -->
        <div class="menu-button">
            <?= htmlspecialchars($definition['deftitre']) ?>
        </div>

        <!-- META -->
        <div class="definition-meta">
            <small>
                Écrit par <?= htmlspecialchars($definition['defauteur'] ?: "Définitions Numérique") ?>
                le <?= htmlspecialchars($definition['defdate']) ?>
                • 👁 <?= $newNbVues ?> vues
            </small>
        </div>

        <!-- CONTENU -->
        <div class="definition-main">
            <div class="definition-text">
                <?= nl2br(htmlspecialchars($definition['definition'])) ?>
            </div>
        </div>
                      <?php
// Récupération de la vidéo principale
$connVideo = new mysqli(
    $_ENV['DB_SERVERNAME'],
    $_ENV['DB_USERNAME'],
    $_ENV['DB_PASSWORD'],
    $_ENV['DB_NAME']
);
$connVideo->set_charset("utf8mb4");

$sqlVideo = "SELECT lien_video FROM video WHERE defid = $motId LIMIT 1";
$resVideo = $connVideo->query($sqlVideo);

if ($resVideo && $resVideo->num_rows > 0) {
    $video = $resVideo->fetch_assoc();
   function getYoutubeId($url) {
    $patterns = [
        '/youtu\.be\/([^\?&]+)/',
        '/youtube\.com\/watch\?v=([^\?&]+)/',
        '/youtube\.com\/embed\/([^\?&]+)/',
        '/youtube\.com\/shorts\/([^\?&]+)/'
    ];

    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }
    }
    return null;
}

$youtubeId = getYoutubeId($video['lien_video']);
if ($youtubeId) {
?>
    <div class="definition-video">
        <h3>🎥 Vidéo explicative</h3>
        <div class="video-wrapper">
            <iframe
                src="https://www.youtube.com/embed/<?= htmlspecialchars($youtubeId) ?>"
                allowfullscreen>
            </iframe>
        </div>
    </div>
<?php
}
                                     
    ?>
    
                                     <?php
// Catégories associées
$stmtCat = $conn->prepare(
    "SELECT c.catid, c.catnom
     FROM categorie c
     JOIN lien l ON c.catid = l.catid
     WHERE l.defid = ?"
);
$stmtCat->bind_param("i", $motId);
$stmtCat->execute();
$resCat = $stmtCat->get_result();

if ($resCat->num_rows > 0) {
    ?>
    <div class="definition-categories">
        <h3>📂 Catégories</h3>
        <div class="categories-list">
            <?php
            while ($cat = $resCat->fetch_assoc()) {
                ?>
                <a class="category-badge"
                   href="categoriedetail.php?catid=<?= urlencode($cat['catid']) ?>">
                    <?= htmlspecialchars($cat['catnom']) ?>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}
$stmtCat->close();
?>


<?php
}
$connVideo->close();
?>
                 <?php
// Récupération du quiz
$sqlQuiz = "SELECT lien_quiz FROM quiz WHERE defid = $motId LIMIT 1";
$resQuiz = $conn->query($sqlQuiz);

if ($resQuiz && $resQuiz->num_rows > 0) {
    $quiz = $resQuiz->fetch_assoc();
    ?>
    
    <div class="definition-quiz">
        <h3>🧠 Tester ses connaissances</h3>
        <a class="quiz-button"
           href="<?= htmlspecialchars($quiz['lien_quiz']) ?>"
           target="_blank">
            Lancer le quiz
        </a>
    </div>

<?php
}
?>
    <div class="definition-related">
    <h3>📂 Définitions liées</h3>

    <div class="related-list">
        <!-- définitions générées en PHP -->
                              
<?php



// Récupération des définitions liées (mêmes catégories)
$sqlRelated = "
SELECT DISTINCT d.defid, d.deftitre, d.nb_vue
FROM definition d
JOIN lien l ON d.defid = l.defid
WHERE l.catid IN (
    SELECT catid FROM lien WHERE defid = ?
)
AND d.defid != ?
ORDER BY d.nb_vue DESC
LIMIT 6
";

$stmtRelated = $conn->prepare($sqlRelated);
$stmtRelated->bind_param("ii", $motId, $motId);
$stmtRelated->execute();
$resRelated = $stmtRelated->get_result();

if ($resRelated->num_rows > 0) {
 while ($rel = $resRelated->fetch_assoc()) {

    $badge = '';
    if ($rel['nb_vue'] >= 1000) {
        $badge = '<span class="badge-populaire">🔥 Très consulté</span>';
    }

    echo '<div class="related-item">';
        echo '<div class="related-line">';

            // 🔗 TITRE cliquable uniquement
            echo '<a href="affichedef.php?defid=' . intval($rel['defid']) . '" class="related-title">';
                echo htmlspecialchars($rel['deftitre']);
            echo '</a>';

            // 👁 VUES non cliquables
            echo '<span class="related-meta">';
                echo '👁 ' . intval($rel['nb_vue']) . ' vues ';
                echo $badge;
            echo '</span>';

        echo '</div>';
    echo '</div>';
} 
} else {
    echo '<p>Aucune définition liée pour le moment.</p>';
}

$stmtRelated->close();
?>
    
    </div>
</div>

        <?php
    } else {
        echo "<p>Définition introuvable.</p>";
    }

    $stmt->close();
} else {
    echo "<p>Aucune définition sélectionnée.</p>";
}

$conn->close();
?>

                </div>
            </div>

        </div>
    </div>
</div>

<div class="footerdiv"><?php include "footer.php"; ?></div>

</body>
</html>
