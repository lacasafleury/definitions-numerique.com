<?php
// Activer l'affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Démarrer la session si ce n'est pas déjà fait
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Vérifier l'état des sessions
$session_status = "";
if (session_status() === PHP_SESSION_DISABLED) {
    $session_status = "Les sessions sont désactivées sur ce serveur.";
} elseif (session_status() === PHP_SESSION_NONE) {
    $session_status = "Les sessions sont activées mais aucune session n'a été démarrée.";
} elseif (session_status() === PHP_SESSION_ACTIVE) {
    $session_status = "Les sessions sont activées et une session est actuellement active.";
} else {
    $session_status = "Impossible de déterminer l'état des sessions.";
}

// Récupérer le contenu de la session
$session_data = isset($_SESSION) ? $_SESSION : [];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debug Session</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
        }

        h1 {
            font-size: 24px;
            color: #336699;
        }

        .status {
            margin-top: 20px;
            padding: 10px 20px;
            background: #336699;
            color: #fff;
            border-radius: 8px;
            display: inline-block;
        }

        .session-data {
            text-align: left;
            margin-top: 20px;
            padding: 10px;
            background: #e0e0e0;
            border-radius: 8px;
            max-height: 300px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>État des Sessions</h1>
        <p>Cette page affiche l'état actuel des sessions sur le serveur.</p>
        <div class="status">
            <?php echo htmlspecialchars($session_status); ?>
        </div>

        <h2>Données de la session</h2>
        <div class="session-data">
            <?php if (empty($session_data)): ?>
                <p>Aucune donnée de session disponible.</p>
            <?php else: ?>
                <pre><?php print_r($session_data); ?></pre>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
