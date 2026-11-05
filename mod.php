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
    echo "id : " . $id."<br>" ;


$sql = "SELECT * FROM CLIENT WHERE ID_CLIENTS=".$id."";
echo $sql;






/* RequÃªte "Select" retourne un jeu de rÃ©sultats */
if ($result = mysqli_query($conn, $sql)) {
  printf("Select a retournÃ© %d lignes.\n", mysqli_num_rows($result));


   while ($row = $result->fetch_assoc()) {
        $nom=$row["nom"];
		$prenom=$row["prenom"];
		$email=$row["email"];
   }
echo $nom;
$conn->close();
}
?>
<form action="mod2.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo $nom;?>"><br><br>
		<label for="prenom">Prenom :</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo $prenom;?>"><br><br>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?php echo $email;?>"><br><br>
		

        <input type="hidden" id="idclient" name="idclient" value="<?php echo $id;?>"><br><br>
		<input type="submit" value="Envoyer">

    </form>
