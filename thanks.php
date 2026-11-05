
<?php
	include "env.php"
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
			<?php
			include "bandeau.php"
			?>
		</div>
		<div class="search-alpha-wrapper"><div class="lettresdiv">
			<?php
			include "lettres.php"
			?>
		</div>
		<div class="barrediv">
			<?php
			include "barrederecherche.php"
			?>
		</div>
		</div><div class="homediv">
			<div class="container">
				<div class="home">
					<div class="controls">
					
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

		
		echo "<br><br>Merci de ta proposition. Nous vous recontacterons par mail si cette définition est retenue.<br><br><br>";

		?>
				
		</div>
			</div>
				</div>
						</div>
		<div class="footerdiv">
			<?php
			include "footer.php"
			?>
		</div>

</body>

</html>
