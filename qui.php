<?php
	include "env.php"
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
		
		
					<script src="https://kit.fontawesome.com/d76759a8b0.js" crossorigin="anonymous"></script>
    <style>
        /* Styles généraux */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f9;
            color: #333;
            text-align: center;
        }

        h1 {
            margin: 20px 0;
            font-size: 3em;
            color: #0056b3;
            text-shadow: 2px 2px 4px #aaa;
        }

        .team-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        /* Carte de membre */
        .team-card {
            background: #fff;
            width: 250px;
            height: 350px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            position: relative;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }

        .team-card:hover {
            transform: translateY(-10px);
        }

        .team-card img {
            width: 100%;
            height: 60%;
            object-fit: cover;
        }

        .team-info {
            padding: 10px;
            background: #0056b3;
            color: #fff;
            position: absolute;
            bottom: 0;
            width: 100%;
            transform: translateY(100%);
            transition: transform 0.3s ease-in-out;
        }

        .team-card:hover .team-info {
            transform: translateY(0);
        }

        .team-info h3 {
            margin: 0;
            font-size: 1.2em;
        }

        .team-info p {
            font-size: 0.9em;
            margin: 5px 0 0;
        }
    </style>
</head>

<body>
<br>               <a href="qui.php" class="menu-button">Qui sommes nous ?</a>
        <br>
    <div>Nous sommes une classe de NSI qui avons entrprit la création d'un site internet centré sur un dictionnaire spécialisé dans le vocabulaire de l'informatique. 
    Le site propose une interface simple et intuitive, permettant de naviguer entre les différentes catégories de mots.
    Chaque terme est accompagné d'une définition claire et lorsque cela est nécessaire, d'une vidéo explicative.
    Ce dictionnaire en ligne est un outil pédagogique qui vise à aider les étudiants, les enseignants, 
    et tous ceux qui souhaitent approfondir leurs connaissances dans le domaine de l'informatique.
    </div>


    <div class="team-container">
        <!-- Membre 1 -->
        <div class="team-card">
        <a href="https://linktr.ee/elfs_cedric" target="_blank">

            
            <div class="team-info">
                <h3>Cédric Clérentin--Vieille</h3>
                <p>Affichage des définitions, Barre de recherche, A propos</p>
            </div>
        </div>
        <!-- Membre 2 -->
        <div class="team-card">
        <a href="https://www.instagram.com/gael_theron/" target="_blank">

            <div class="team-info">
                <h3>Valerian Cathoire</h3>
                <p>Partie admin, base de données</p>
            </div>
        </div>
        <!-- Membre 3 -->
        <div class="team-card">
        <a href="https://www.instagram.com/gael_theron/" target="_blank">

            <div class="team-info">
                <h3>Vincent Fleury</h3>
                <p>Chef de projet</p>
            </div>
        </div>
        <!-- Membre 4 -->
        <div class="team-card">
        <a href="https://www.instagram.com/gael_theron/" target="_blank">

          
            <div class="team-info">
                <h3>Blaise Brunet</h3>
                <p>CSS, Lettres, Contact, A propos</p>
            </div>
        </div>
        <!-- Membre 5 -->
        <div class="team-card">
        <a href="https://www.instagram.com/gael_theron/" target="_blank">

            <div class="team-info">
                <h3>Eva Filassier</h3>
                <p>CSS, Charte graphique</p>
            </div>
        </div>
        <!-- Membre 6 -->
        <div class="team-card">
        <a href="https://www.instagram.com/gael_theron/" target="_blank">

            <div class="team-info">
                <h3>Matthis Lande</h3>
                <p>Pages diverses du site</p>
            </div>
        </div>
        <!-- Membre 7 -->
        <div class="team-card">
			<a href="https://www.instagram.com/gael_theron/" target="_blank">

           
            <div class="team-info">
                <h3>Fanny Leroy</h3>
                <p>Tests</p>
            </div>
        </div>
        <!-- Membre 8 -->
        <div class="team-card">
		    <a href="https://www.instagram.com/gael_theron/" target="_blank">

            <div class="team-info">
                <h3>Gael Theron</h3>
                <p>Partie admin</p>
            </div>
        </div>
    </div>
		
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
