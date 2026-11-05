<?php
 include "env.php";

// Create connection
$conn = new mysqli($_ENV['DB_SERVERNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
	$conn->set_charset("utf8mb4");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}	
echo "Connected successfully<br>";

?>

<?php
// Récupérer l'ID de la définition depuis l'URL
$defid = isset($_GET['defid']) ? intval($_GET['defid']) : 0; // Sécurisation avec intval()

if ($defid > 0) {
    // Préparer la requête SQL pour récupérer les données
    $sql = "SELECT deftitre, deflettre, definition FROM definition WHERE defid = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Associer les paramètres et exécuter la requête
        $stmt->bind_param("i", $defid); // "i" pour integer
        $stmt->execute();

        // Récupérer le résultat
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Récupérer les données
            $row = $result->fetch_assoc();
            $deftitre = $row['deftitre'];
            $deflettre = $row['deflettre'];
            $definition = $row['definition'];
        } else {
            echo "Aucune définition trouvée pour l'ID $defid.";
            exit;
        }

        $stmt->close();
    } else {
        echo "Erreur dans la préparation de la requête : " . $conn->error;
        exit;
    }
} else {
    echo "ID de définition invalide.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
</head>
<body>
    <div class="bandeaudiv" type="video/mp4">
        <?php include "bandeau.php"; ?>
    </div>
    <div class="search-alpha-wrapper"><div class="lettresdiv">
        <?php include "lettres.php"; ?>
    </div>
    <div class="barrediv">
        <?php include "barrederecherche.php"; ?>
    </div>
    <div class="homediv">
        <div class="container">
            <div class="home">
                <div class="controls">
				
						  
		<br>
    <form action="modeftraitement.php" method="post">
		<div class = "pititext" > Vous êtes entrain de modifier la définition suivante: <br><br>  <?php echo($definition);?> </div><br><br>
        <div for="modauteur" class="textprop">Nom :</div>
        <input type="text" id="nom" name="nom" autofocus required ><br><br>
        <div for="modemail" class="textprop">Email :</div>
        <input type="email" id="email" name="modemail" required ><br><br>
		<div for="modtitre" class="textprop">Titre :</div>
        <input type="text" id="modtitre" name="modtitre" value="<?php echo($deftitre);?>" required ><br><br>
		<div for="modlettre" class="textprop">Première lettre du titre :</div>
        <input type="text" id="modlettre" name="modlettre" value="<?php echo($deflettre);?>" required ><br><br>
		<div for="modefinition" class="textprop">Modification définition :</div>
		<textarea id="definition" name="definition"  required rows="4" cols="60"><?php echo($definition);?> </textarea><br><br>
        <input type="hidden" id="defid" name="defid" value="<?php echo $defid;?>"><br><br>
		<input type="submit" value="proposer une modification" class="proposer">
    </form>

			
			
				
				
				
				
				
</div></div>			
	
		</div>
		<div class="footerdiv">
			<?php
			include "footer.php"
			?>
		</div>
	</div>

</body>

</html>

         
           
         
</html>


     
