<?php
 include "env.php";

$conn = new mysqli($_ENV['DB_SERVERNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
	$conn->set_charset("utf8mb4");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
	$deftitre = htmlspecialchars($_POST['deftitre']);
	$deflettre = htmlspecialchars($_POST['deflettre']);
	$nvldef = htmlspecialchars($_POST['nvldef']);
    //securise le code html envoyé
    $nvldef = strip_tags($nvldef, '<b><i><u><ul><li><ol><br>');
    
    // Afficher les données (ou les traiter comme vous le souhaitez)
    echo "Nom : " . $nom . "<br>";
    echo "Email : " . $email . "<br>";
	echo "Deftitre : " . $deftitre . "<br>";
	echo "Deflettre : " . $deflettre . "<br>";
	echo "Nvldef : " . $nvldef . "<br>";
     echo "DB_USERNAME : " .  $DB_USERNAME . "<br>";
}

// Création de la date
$defdate = date('Y-m-d H:i:s');

// Préparation de la requête SQL
$sql = "INSERT INTO definition (defauteur, defemail, deftitre, deflettre, definition, valider, defdate) 
VALUES ('$nom', '$email', '$deftitre', '$deflettre', '$nvldef', 1, '$defdate')";

// Exécution de la requête
echo $sql; // Affiche la requête pour vérifier sa validité (facultatif)


echo $sql;
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

header('Location: thanks.php');
exit();

?>
