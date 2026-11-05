<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body >
        <div id="content">
        <title>Page Admin</title>
</head>
<?php
// admin_login.php

// Paramètres de connexion à la base de données
$servername = "localhost"; // ou l'adresse de ton serveur de base de données
$username = "root"; // Ton nom d'utilisateur MySQL
$password = ""; // Ton mot de passe MySQL
$dbname = "defnumerique"; // Nom de la base de données

// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $mailadmin = $_POST['mailadmin'];
    $mdpadmin = $_POST['mdpadmin'];
    $adminid = $_POST['adminid']; // ID caché
    $date = date('Y-m-d H:i:s'); // Date et heure actuelle

    // Hacher le mot de passe avant de l'enregistrer (c'est une bonne pratique)
    $mdp = ($mdpadmin);

    // Préparer la requête SQL pour insérer les données dans la table "admin"
    $sql = "INSERT INTO admin (mailadmin, mdpadmin, adminid, date)
            VALUES (?, ?, ?, ?)";

    // Préparer la requête pour éviter les injections SQL
    if ($stmt = $conn->prepare($sql)) {
        // Lier les paramètres (s, s, i, s) -> string, string, integer, string
        $stmt->bind_param("ssis", $mailadmin, $mdp , $adminid, $date);

        // Exécuter la requête
        if ($stmt->execute()) {
            echo "<h3>Connexion réussie et données enregistrées !</h3>";
            echo "<p>Bienvenue $mailadmin. Vous vous êtes connecté le $date.</p>";
        } else {
            echo "<h3>Erreur d'enregistrement</h3>";
            echo "<p>Une erreur est survenue lors de l'enregistrement des informations.</p>";
        }

        // Fermer la requête préparée
        $stmt->close();
    } else {
        echo "<h3>Erreur SQL</h3>";
        echo "<p>La requête a échoué : " . $conn->error . "</p>";
    }
}

// Fermer la connexion
$conn->close();
?>
<body>
    <h2>ajouter Admin</h2>
    <form action="ajouter_admin.php" method="post">
        <label for="mailadmin">Email:</label>
        <input type="email" id="mailadmin" name="mailadmin" required><br><br>
        
        <label for="mdpadmin">Mot de passe:</label>
        <input type="password" id="mdpadmin" name="mdpadmin" required><br><br>
        
        <!-- Champ caché pour l'ID -->
        <input type="hidden" name="user_id" value="12345"><br><br> <!-- ID dynamique selon l'utilisateur -->

        <input type="submit" value="ajouter">
    </form>
</body>
</html>