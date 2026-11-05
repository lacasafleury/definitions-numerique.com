<?php
include "env.php";

/* ===============================
   CONFIG
=============================== */
$defs_per_page = 30;
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$start = ($page - 1) * $defs_per_page;

/* ===============================
   CONNEXION BDD
=============================== */
$conn = new mysqli(
    $_ENV['DB_SERVERNAME'],
    $_ENV['DB_USERNAME'],
    $_ENV['DB_PASSWORD'],
    $_ENV['DB_NAME']
);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Erreur BDD");
}

/* ===============================
   REQUÊTE PRINCIPALE
   - 1 ligne par définition
   - vidéos regroupées
=============================== */
$sql = "
SELECT 
    d.defid,
    d.deftitre,
    d.nb_vue,
    GROUP_CONCAT(v.lien_video SEPARATOR '||') AS videos
FROM definition d
INNER JOIN video v ON v.defid = d.defid
GROUP BY d.defid, d.deftitre, d.nb_vue
ORDER BY d.deftitre
LIMIT ?, ?
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $start, $defs_per_page);
$stmt->execute();
$result = $stmt->get_result();

$definitions = [];
while ($row = $result->fetch_assoc()) {
    $definitions[] = $row;
}

/* ===============================
   TOTAL POUR PAGINATION
=============================== */
$countSql = "
SELECT COUNT(DISTINCT d.defid) AS total
FROM definition d
INNER JOIN video v ON v.defid = d.defid
";
$totalRes = $conn->query($countSql);
$totalRow = $totalRes->fetch_assoc();
$total_defs = (int)$totalRow['total'];
$total_pages = max(1, ceil($total_defs / $defs_per_page));

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Définitions avec vidéos – Definitions Numérique</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="bandeaudiv"><?php include "bandeau.php"; ?></div>
<div class="lettresdiv"><?php include "lettres.php"; ?></div>

<div class="homediv">
    <div class="container">
        <div class="home">

            <div class="gauche">
                <?php include "gauche.php"; ?>
            </div>

            <div class="droite">
                <div class="controls">

                    <h3>
                        Nous mettons à votre disposition des vidéos explicatives
                        pour mieux comprendre les notions du numérique.
                    </h3>

                    <a class="menu-button">Définitions avec vidéos</a>
                    <hr>

                    <?php if (!empty($definitions)) : ?>

                        <div class="definition-container">

                            <?php foreach ($definitions as $definition) :

                                $nbVues = (int)$definition['nb_vue'];

                                $badge = '';
                                if ($nbVues >= 1000) {
                                    $badge = '<span class="badge-populaire">🔥 Très consulté</span>';
                                }
                            ?>

                            <div class="definition-box video-def-card">

                                <!-- ===== LIGNE IDENTIQUE AU TOP 9 ===== -->
                                <div class="related-item">
                                    <a href="affichedef.php?defid=<?= intval($definition['defid']) ?>"
                                       class="related-line">

                                        <span class="related-title">
                                            <?= htmlspecialchars($definition['deftitre']) ?>
                                        </span>

                                        <span class="related-meta">
                                            👁 <?= $nbVues ?> vues <?= $badge ?>
                                        </span>

                                    </a>
                                </div>

                                <!-- ===== VIDEOS SOUS LE LIEN ===== -->
                               <div class="pop-videos">
<?php
$videos = explode('||', $definition["videos"]);
$i = 1;
foreach ($videos as $url) {
    $url = trim($url);
    if ($url === '') continue;

    echo '<a href="'.htmlspecialchars($url).'" target="_blank" class="video-text-link">';
    echo '▶ Voir la vidéo';
    if (count($videos) > 1) echo ' '.$i;
    echo '</a>';
    $i++;
}
?>
</div>


                            </div>

                            <?php endforeach; ?>

                        </div>

                        <!-- ===== PAGINATION ===== -->
                        <div class="pagination">
                            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                                <a href="?page=<?= $i ?>"
                                   class="page-link <?= ($i === $page) ? 'active' : '' ?>">
                                    <?= $i ?>
                                </a>
                            <?php endfor; ?>
                        </div>

                    <?php else : ?>
                        <p>Aucune définition avec vidéo trouvée.</p>
                    <?php endif; ?>

                    <hr>

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

<div class="footerdiv"><?php include "footer.php"; ?></div>

</body>
</html>
