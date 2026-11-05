<?php
include "env.php";

// Créer une connexion
$conn = new mysqli($_ENV['DB_SERVERNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
	$conn->set_charset("utf8mb4");
// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion: " . $conn->connect_error);
}

$id = htmlspecialchars($_GET['id']);
	
    // Afficher les données (ou les traiter comme vous le souhaitez)
    echo "id : " . $id ;


	
$sql = "DELETE FROM CLIENT WHERE ID_CLIENTS=".$id."";
echo $sql;






echo $sql;
if ($conn->query($sql) === TRUE) {
  echo "New record deleted successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

header('Location: index.php');

?>
