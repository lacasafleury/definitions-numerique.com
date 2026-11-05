<?php
include "env.php";

// Nombre de définitions par page
$defs_per_page = 30;

// Récupérer le numéro de la page courante
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $defs_per_page;

// Sécuriser l'ID de la catégorie
$id = isset($_GET['catid']) ? (int)$_GET['catid'] : 0;

// Connexion à la base de données
$conn = new mysqli($_ENV['DB_SERVERNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
	$conn->set_charset("utf8mb4");
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
	$conn->set_charset("utf8mb4");
// Récupérer le nom de la catégorie
$stmt = $conn->prepare("SELECT catnom FROM categorie WHERE catid = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$category = $result->fetch_assoc();
$stmt->close();

// Récupérer les définitions paginées pour la catégorie
$stmt = $conn->prepare("
    SELECT d.defid, d.deftitre, d.nb_vue
    FROM definition d 
    INNER JOIN lien l ON d.defid = l.defid 
    WHERE l.catid = ?
    ORDER BY d.deftitre
    LIMIT ?, ?
");
$stmt->bind_param("iii", $id, $start, $defs_per_page);
$stmt->execute();
$result = $stmt->get_result();
$definitions = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Comptabiliser le total de définitions
$stmt = $conn->prepare("SELECT COUNT(*) as total FROM definition d 
    INNER JOIN lien l ON d.defid = l.defid 
    WHERE l.catid = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$total_row = $result->fetch_assoc();
$total_defs = $total_row['total'];
$total_pages = ceil($total_defs / $defs_per_page);
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="global">
        <div class="bandeaudiv"> <?php include "bandeau.php"; ?> </div>
        <div class="logodiv"> <?php include "logo.php"; ?> </div>
        <div class="search-alpha-wrapper"><div class="lettresdiv"> <?php include "lettres.php"; ?> </div>
        <div class="barrediv"> <?php include "barrederecherche.php"; ?> </div>
        <div class="homediv">
            <div class="container">
                <div class="home">
                    <div class="gauche"> <?php include "gauche.php"; ?> </div>
                    <div class="droite">
                        <div class="controls">
                            <br>
                            <a class='menu-button'><?= htmlspecialchars($category['catnom'] ?? "Catégorie inconnue") ?></a><br> <span class='styled-span'> <?php echo $total_defs.' définitions'; ?></span>
                            <hr><br>
                            
                            <?php if (!empty($definitions)) { ?>
                                <div class="definition-container">
                                    <?php foreach ($definitions as $definition) { ?>
                                       <div class="related-item">
    <a href="affichedef.php?defid=<?= urlencode($definition['defid']) ?>" class="related-line">
        <span class="related-title">
            <?= htmlspecialchars($definition['deftitre']) ?>
        </span>
    </a>

    <span class="related-meta">
        👁 <?= (int)$definition['nb_vue'] ?> vues
        <?php if ($definition['nb_vue'] >= 1000) { ?>
            <span class="badge-populaire">🔥 Très consulté</span>
        <?php } ?>
    </span>
</div>
                                    <?php } ?>
                                </div>
                                
                                <div class="pagination">
                                    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                        <a href="?catid=<?= $id ?>&page=<?= $i ?>" class="page-link">
                                            <?= $i ?>
                                        </a>
                                    <?php } ?>
                                </div>
                            <?php } else { ?>
                                <p>Aucune définition trouvée.</p>
                            <?php } ?>
                            
                            <hr><br>
                            <div class="proposer-def-btn">
                                <a href="newdef.php" class="btn-modifier">Proposer une définition</a><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footerdiv"> <?php include "footer.php"; ?> </div>
    </div>
</body>
</html>
