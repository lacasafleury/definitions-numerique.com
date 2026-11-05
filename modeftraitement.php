<?php
 include "env.php";

// Create connection
$conn = new mysqli($_ENV['DB_SERVERNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
	$conn->set_charset("utf8mb4");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}	
//echo "Connected successfully<br>";

// Create connection
$conn2 = new mysqli($_ENV['DB_SERVERNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
	$conn2->set_charset("utf8mb4");
// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}	


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $modemail = htmlspecialchars($_POST['modemail']);
	$modefinition = htmlspecialchars($_POST['definition']);
	$modlettre = htmlspecialchars($_POST['modlettre']);
	$modtitre = htmlspecialchars($_POST['modtitre']);
	$modauteur = htmlspecialchars($_POST['nom']);
	$idorigine = htmlspecialchars($_POST['defid']);
	
    
    // Afficher les données (ou les traiter comme vous le souhaitez)
    echo "Email : " . $modemail . "<br>";
	echo "Modefinition : " . $modefinition . "<br>";
	echo "Modtitre : " . $modtitre . "<br>";
	echo "Modlettre : " . $modlettre . "<br>";
	echo "Auteur : " . $modauteur . "<br>";
   }

// Création de la date
$modate = date('Y-m-d H:i:s');

// Préparation de la requête SQL
$sql = "INSERT INTO definitionmodif (idorigine, modlettre, modtitre, modefinition, modauteur, modate, valider, modemail) 
VALUES ('$idorigine','$modlettre', '$modtitre', '$modefinition', '$modauteur', '$modate', 1,  '$modemail' )";


$stmt = $conn->prepare($sql);
if ($stmt) {
	// Associer les valeurs aux paramètres
	$stmt->bind_param(
		$idorigine,
		$modlettre,
		$modtitre,
		$modefinition,
		$modauteur,
		$modate,
		$modemail
	);

	// Exécuter la requête
	if ($stmt->execute()) {
		echo "Nouvel enregistrement créé avec succès.";
		header('Location: thanks.php');
		exit;
	} else {
		echo "Erreur lors de l'insertion : " . $stmt->error;
	}

	$stmt->close();
} else {
	echo "Erreur dans la préparation de la requête : " . $conn->error;
}

$conn->close();



?>
