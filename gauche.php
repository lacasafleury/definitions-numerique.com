
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


   printf ("<br><a href='definitions.php' class='rubriqueDEF'>DEFINITIONS</a>");

/* Requête "Select" retourne un jeu de résultats */
if ($result3 = mysqli_query($conn, "SELECT COUNT(*) as total from definition")) 
{
//   printf("Select a retourné %d lignes.\n", mysqli_num_rows($result));
   
    while ($row3 = $result3->fetch_assoc()) 
	{
        		printf ("<span class='styled-span'> %s </span><br><br>", $row3['total']);
	
 	 }
  }
else 
		{
		   //printf("erreur");
		}

/* Requête "Select" retourne un jeu de résultats */
if ($result = mysqli_query($conn, "SELECT * from categorie ORDER BY catnom ")) 
{
//   printf("Select a retourné %d lignes.\n", mysqli_num_rows($result));
   
    while ($row = $result->fetch_assoc()) 
	{
        printf ("<a href='categoriedetail.php?catid=%s' class='rubrique'>%s</a>", $row['catid'], $row['catnom']);
		// comptage du nombre de def par categorie
		$catid = intval($row['catid']);
		$sql2="SELECT COUNT(*) as total FROM lien WHERE catid=" . $catid;
		//echo $sql2;
		if ($result2 = mysqli_query($conn2,$sql2 )) 
		{
		    //printf("Select a retourné %d lignes.\n", mysqli_num_rows($result2));
			while ($row2 = $result2->fetch_assoc()) 
			{
				printf ("<span class='styled-span'> %s </span>&nbsp;&nbsp;&nbsp;<br>", $row2['total']);
				
			}
		} 
		else 
		{
		   //printf("erreur");
		}
	}
}	
$conn->close();
$conn2->close();

?>
        <!-- Réseaux sociaux -->
        <div class="reseau-container">
            <div class="reseau-item">
                <a href="https://youtube.com/@definitionsnumerique" target="_blank">
				<img src="y.png" class="imageRéseaux"></a>
         
                <a href="https://instagram.com/definitionsnumerique" target="_blank"> 
				<img src="i.png" class="imageRéseaux"></a>
            </div>
        </div>