<?php
include "env.php";  // Inclure les variables d'environnement




?>

<!DOCTYPE html>
<html lang="fr">

<head>
<meta name="theme-color" content="#47657F">
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d76759a8b0.js" crossorigin="anonymous"></script>
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
            
            
		
		<?php
	


// Exemple d'affichage
?>
<?php

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
//echo "Connected successfully<br>";


   printf ("<br><a href='definitions.php' class='rubrique'>DEFIINITIONS</a>");

/* RequÃªte "Select" retourne un jeu de rÃ©sultats */
if ($result3 = mysqli_query($conn, "SELECT COUNT(*) as total from definition")) 
{
//   printf("Select a retournÃ© %d lignes.\n", mysqli_num_rows($result));
   
    while ($row3 = $result3->fetch_assoc()) 
	{
        		printf ("<span class='styled-span'> %s </span><br><br>", $row3['total']);
	
 	 }
  }
else 
		{
		   //printf("erreur");
		}

/* RequÃªte "Select" retourne un jeu de rÃ©sultats */
if ($result = mysqli_query($conn, "SELECT * from categorie")) 
{
//   printf("Select a retournÃ© %d lignes.\n", mysqli_num_rows($result));
   
     printf("<center><table class=tab border='0' ><tr>");
 
    $compteur = -1;
    while ($row = $result->fetch_assoc()) 
	{
         if ($compteur %3 == 2){
		    printf("</tr><tr>");
	   }   
	   $compteur++;
        printf ("<td><a href='categoriedetail.php?catid=%s' class='rubrique'>%s</a>", $row['catid'], $row['catnom']);
		// comptage du nombre de def par categorie
		$catid = intval($row['catid']);
		$sql2="SELECT COUNT(*) as total FROM lien WHERE catid=" . $catid;
		//echo $sql2;
		if ($result2 = mysqli_query($conn2,$sql2 )) 
		{
		    //printf("Select a retournÃ© %d lignes.\n", mysqli_num_rows($result2));
			while ($row2 = $result2->fetch_assoc()) 
			{
				printf ("<span class='styled-span'> %s </span>&nbsp;&nbsp;&nbsp;</td>", $row2['total']);
				
			}
		} 
		else 
		{
		   //printf("erreur");
		}
	
	}    
         printf("</tr></table></center>");
}	
$conn->close();
$conn2->close();

?>
            
                </div>
            </div>
        </div>
    </div>
    <div class="footerdiv">
        <?php include "footer.php"; ?>
    </div>
</body>

</html>
