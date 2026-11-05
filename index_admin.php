<?php
// Démarrer une session
session_start();


// Exemple : Si l'utilisateur est connecté, afficher son email (ou autre info)
if (isset($_SESSION['mailadmin'])) {
    $welcomeMessage = "Bienvenue, " . $_SESSION['adminok'] . " !";
} else {
    $welcomeMessage = "Bienvenue sur notre site !";
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body >
        <div id="content">
        <title>Page Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        h1 {
            font-size: 50px;
            color: #333;
            margin-top: 50px;
        }

        .btn {
            margin-top: 30px;
            padding: 15px 30px;
            font-size: 18px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <!-- Affichage du message de bienvenue personnalisé -->
    <h1><?php echo $welcomeMessage; ?></h1>

    <!-- Bouton redirigeant vers une autre page -->
    <a href="ajouter_admin.php" class="btn">ajouter un admin</a>

</body>
</html>