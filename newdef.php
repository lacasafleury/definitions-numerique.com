<?php
	include "env.php";
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
			<?php
			include "bandeau.php";
			?>
		</div>
		<div class="search-alpha-wrapper"><div class="lettresdiv">
			<?php
			include "lettres.php";
			?>
		</div>
		<div class="barrediv">
			<?php
			include "barrederecherche.php";
			?>
		</div>
		</div><div class="homediv">
		<div class="container">
    <div class="home">
        <div class="controls">
		
		<br>
    <form action="newdeftraitement.php" method="post">
		<div class = "pititext" > Vous êtes entrain de proposer une nouvelle définition qui sera affichée dans notre site après confirmation de notre part.<br> La confirmation sera donnée par mail.  </div><br><br>
        <div class="textprop">Nom : </div>
        <input type="text" id="nom" name="nom" required ><br><br> 
        <div  class="textprop">Email :</div>
        <input type="email" id="email" name="email" required ><br><br>
		<span class="textprop">Titre :</span>
        <input type="text" id="deftitre" name="deftitre"required ><br><br>
		<span class="textprop">Première lettre du titre :</span>
       <input type="text" id="deflettre" name="deflettre" required maxlength="1" pattern="[A-Z]">  <br>
		<span  class="textprop" >Nouvelle définition :</span>
		<textarea id="nvldef" name="nvldef" required  rows="8" cols="80" ></textarea><br><br><br>
			
	  		<input type="submit" value="proposer une nouvelle définition" class="proposer">
		
<br><br>
    </form>
		</div>
			</div>
				</div>
		</div>
		<div class="footerdiv">
			<?php
			include "footer.php";
			?>
		</div>

</body>

</html>
