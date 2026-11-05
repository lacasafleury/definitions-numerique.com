<?php
	include "env.php"
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Définitions Numérique - Encyclopédie des mots du numérique</title>
    <meta name="description" content="Explorez Définitions Numérique, l'encyclopédie incontournable pour comprendre tous les termes liés au numérique. Accessible, précis et à jour.">
    <meta name="keywords" content="numérique, définitions numérique, encyclopédie numérique, glossaire numérique, mots numérique, technologie, digital">
    <meta name="author" content="Definitions-Numerique.com">
    <link rel="canonical" href="https://www.definitions-numerique.com">
    <meta property="og:title" content="Définitions Numérique - Encyclopédie des mots du numérique">
    <meta property="og:description" content="Explorez Définitions Numérique, l'encyclopédie incontournable pour comprendre tous les termes liés au numérique.">
    <meta property="og:url" content="https://www.definitions-numerique.com">
    <meta property="og:image" content="https://www.definitions-numerique.com/images/logo.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Définitions Numérique">
    <meta name="twitter:description" content="Explorez l'encyclopédie des mots du numérique.">
    <meta name="twitter:image" content="https://www.definitions-numerique.com/images/logo.png">

</head>

<body>
		<div class="bandeaudiv" type="video/mp4">
			<?php
			include "bandeau.php"
			?>
		</div>
	<div class="lettresdiv">
			<?php
			include "lettres.php"
			?>
		</div>
		<div class="barrediv">
			<?php
		//	include "barrederecherche.php"
			?>
		</div>
		<div class="homediv">
			<?php
			include "home.php"
			?>
		</div>
		<div class="footerdiv">
			<?php
			include "footer.php"
			?>
		</div>

</body>

</html>
