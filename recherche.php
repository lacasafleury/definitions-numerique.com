<?php

include "env.php";

// Créer une connexion à la base de données
$conn = new mysqli($_ENV['DB_SERVERNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
	$conn->set_charset("utf8mb4");
if (isset($_GET['terme']) && !empty($_GET['terme'])) {
    $_SESSION['definitions'] = null; // Met la variable à null

    $terme = htmlspecialchars(trim($_GET['terme'])); // Sécuriser et nettoyer le terme saisi par l'utilisateur

    // Préparation de la requête pour récupérer toutes les définitions
    $stmt = $conn->prepare("SELECT definition, deftitre, defid FROM definition WHERE deftitre LIKE ? AND valider = 2 ORDER BY deftitre ASC");
    if ($stmt) {
        $terme_like = $terme . '%'; // Utilisation du LIKE pour trouver des mots commençant par le terme
        $stmt->bind_param("s", $terme_like);

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            // Vérifier si des définitions ont été trouvées
            if ($result->num_rows > 0) {
                $definitions = [];
                while ($row = $result->fetch_assoc()) {
                    $defid = $row['defid'];

                    // Récupérer les catid et catnom associés au defid dans la table lien et categorie
                    $cat_stmt = $conn->prepare("
                        SELECT c.catid, c.catnom
                        FROM lien l
                        INNER JOIN categorie c ON l.catid = c.catid
                        WHERE l.defid = ?
                    ");
                    if ($cat_stmt) {
                        $cat_stmt->bind_param("i", $defid);
                        if ($cat_stmt->execute()) {
                            $cat_result = $cat_stmt->get_result();
                            $categories = [];

                            // Ajouter chaque catid et catnom au tableau des catégories
                            while ($cat_row = $cat_result->fetch_assoc()) {
                                $categories[] = [
                                    'catid' => $cat_row['catid'],
                                    'catnom' => $cat_row['catnom']
                                ];
                            }

                            // Ajouter la définition avec les catégories associées
                            $definitions[] = [
                                'deftitre' => $row['deftitre'],
                                'definition' => $row['definition'],
                                'defid' => $defid,
                                'categories' => $categories, // Ajouter les catid et catnom
                            ];
                        }
                        $cat_stmt->close();
                    }
                }
                // Stocker les définitions dans la session
                $_SESSION['definitions'] = $definitions;
            } 
        }

        $stmt->close();
    } 
} 

// Fermer la connexion
$conn->close();

// Rediriger vers la page d'affichage des résultats
header('Location: affichelesdefs.php');
exit();
?>
