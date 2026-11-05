<?php
include "env.php";

/* ===============================
   PAGINATION
=============================== */
$defs_per_page = 30;
$page  = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$start = ($page - 1) * $defs_per_page;

/* ===============================
   CONNEXION DB
=============================== */
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

/* ===============================
   DEFINITIONS AYANT AU MOINS 1 QUIZ
   (regroupement multi-quiz)
=============================== */
$sql = "
SELECT 
    d.defid,
    d.deftitre,
    d.nb_vue,
    GROUP_CONCAT(q.lien_quiz SEPARATOR '||') AS quiz
FROM definition d
LEFT JOIN quiz q ON q.defid = d.defid
WHERE q.lien_quiz IS NOT NULL
GROUP BY d.defid, d.deftitre, d.nb_vue
ORDER BY d.deftitre
LIMIT $start, $defs_per_page
";


$result = $conn->query($sql);
      if (!$result) {
    die("Erreur SQL : " . $conn->error);
}
/* ===============================
   TOTAL POUR PAGINATION
=============================== */
$totalRes = $conn->query("
    SELECT COUNT(DISTINCT defid) AS total
    FROM quiz
");
$totalRow   = $totalRes->fetch_assoc();
$total_defs = (int)$totalRow['total'];
$total_pages = ceil($total_defs / $defs_per_page);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Les Quiz du Numérique</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
            Nous mettons à votre disposition des quiz pour faciliter la compréhension
            des concepts du numérique.
        </h3>

        <a href="quiz.php" class="menu-button">Les Quiz du Numérique</a>
        <hr>

        <?php if ($result && $result->num_rows > 0): ?>

            <div class="definition-container">

            <?php while ($row = $result->fetch_assoc()): ?>

                <?php
                    $nbVues = (int)$row['nb_vue'];
                    $badge  = ($nbVues >= 1000)
                        ? '<span class="badge-populaire">🔥 Très consulté</span>'
                        : '';
                ?>

                <div class="video-def-card">

                    <!-- Ligne titre + vues -->
                    <div class="pop-line">
                        <a class="pop-link"
                           href="affichedef.php?defid=<?= (int)$row['defid'] ?>">
                            <?= htmlspecialchars($row['deftitre']) ?>
                        </a>

                        <span class="pop-views">
                            👁 <?= $nbVues ?> vues <?= $badge ?>
                        </span>
                    </div>

                    <!-- Ligne quiz -->
                    <div class="pop-videos">
                        <?php
                        $quizList = explode('||', $row['quiz']);
                        $i = 1;
                        foreach ($quizList as $url):
                            $url = trim($url);
                            if ($url === '') continue;
                        ?>
                            <a class="video-text-link"
                               href="<?= htmlspecialchars($url) ?>"
                               target="_blank">
                                🧠 Quiz <?= $i ?>
                            </a>
                        <?php $i++; endforeach; ?>
                    </div>

                </div>

            <?php endwhile; ?>

            </div>

            <!-- Pagination -->
            <?php if ($total_pages > 1): ?>
                <div class="pagination">
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <a class="page-link <?= ($i === $page) ? 'active' : '' ?>"
                           href="?page=<?= $i ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <p>Aucun quiz disponible.</p>
        <?php endif; ?>

        <hr><br>

        <div class="proposer-def-btn">
            <a href="newdef.php" class="btn-modifier">
                Proposer une définition
            </a>
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
