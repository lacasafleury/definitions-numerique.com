<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    
    // Afficher les données (ou les traiter comme vous le souhaitez)
    echo "Nom : " . $nom . "<br>";
	echo "Prenom : " . $prenom . "<br>";
    echo "Email : " . $email . "<br>";
    
}


include "env.php";

// Créer une connexion
$conn = new mysqli($_ENV['DB_SERVERNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
	$conn->set_charset("utf8mb4");
// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion: " . $conn->connect_error);
}



$sql = "INSERT INTO CLIENT (nom, prenom, email)
VALUES ('". $nom ."','". $prenom ."','" . $email ."')";

echo $sql;
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

header('Location: index.php');

?>
