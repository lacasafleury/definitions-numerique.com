<?php
 include "env.php";
 $conn = new mysqli($_ENV['DB_SERVERNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
	$conn->set_charset("utf8mb4");
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = htmlspecialchars($_POST['email']);
	$message = htmlspecialchars($_POST['message']);
}

// Création de la date
$date = date('Y-m-d H:i:s');

// Préparation de la requête SQL
$sql = "INSERT INTO utilisateur (mailauteur, commentaire, date) 
VALUES ('$email', '$message', '$date')";

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
