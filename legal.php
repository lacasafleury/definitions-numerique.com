<?php
include "env.php";  // Inclure les variables d'environnement



?>

<!DOCTYPE html>
<html lang="fr">

<head>
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
                
			<div class="gauche">
                <?php
                include "gauche.php"
		        ?>	
		    </div>
			
			<div class="droite">
                <div class="controls">
                    <h2>2. Éditeur du Site</h2>
                    <p><strong>Lycée Saint Riquier</strong><br>
                    Adresse : 50, Chaussée Jules Ferry, 80094 Amiens<br>
                    Téléphone : [Numéro de téléphone]<br>
                    Email : [Adresse e-mail de contact]</p>
                    
                    <h2>3. Hébergeur du Site</h2>
                    <p><strong>[Nom de l'hébergeur]</strong><br>
                    Adresse : [Adresse de l’hébergeur]<br>
                    Téléphone : [Numéro de contact de l’hébergeur]<br>
                    Email : [Email de l’hébergeur]</p>
                    
                    <h2>4. Propriété Intellectuelle</h2>
                    <p>L’ensemble des contenus présents sur le Site sont réalisés par les élèves dans un cadre éducatif et pédagogique. Les textes, illustrations et autres éléments sont protégés par les lois relatives à la propriété intellectuelle.</p>
                    <p>Toute reproduction, distribution ou modification des contenus, en tout ou partie, sans l'autorisation préalable de l'établissement scolaire est strictement interdite.</p>
                    
                    <h2>5. Responsabilités</h2>
                    <p>Les rédacteurs du Site s’efforcent de fournir des informations exactes et mises à jour. Cependant, ils ne garantissent ni l’exhaustivité ni l’exactitude des définitions proposées.</p>
                    <p>En conséquence, l'établissement et les auteurs ne peuvent être tenus responsables d’éventuelles erreurs ou omissions dans les contenus publiés.</p>
                    
                    <h2>6. Protection des Données Personnelles</h2>
                    <p>Le Site ne collecte pas de données personnelles sans consentement explicite. En cas d'utilisation d'un formulaire de contact, les données ne seront utilisées qu’à des fins de réponse et ne seront pas transmises à des tiers.</p>
                    <p>Conformément au RGPD, tout utilisateur peut demander l'accès, la modification ou la suppression de ses données personnelles en contactant l’éditeur du Site.</p>
                    
                    <h2>7. Cookies et Traceurs</h2>
                    <p>Le Site peut utiliser des cookies afin d’améliorer l’expérience utilisateur et d’analyser la fréquentation. L’utilisateur peut configurer son navigateur pour refuser ou accepter ces cookies.</p>
                    
                    <h2>8. Liens Externes</h2>
                    <p>Le Site peut contenir des liens vers des sites tiers. Ces liens sont fournis à titre informatif et l’équipe du Site ne peut être tenue responsable du contenu de ces sites externes.</p>
                    
                    <h2>9. Droit Applicable et Juridiction Compétente</h2>
                    <p>Les présentes mentions légales sont régies par le droit français. En cas de litige, les tribunaux compétents seront ceux de la juridiction du siège de l’établissement scolaire.</p>
                    
                    <h2>10. Contact</h2>
                    <p>Pour toute question relative à ces mentions légales, vous pouvez nous contacter à l’adresse suivante : [adresse e-mail de contact].</p>
                    
                    <p><strong>Date de mise à jour : [Date]</strong></p>
                </div>





        <br>  <a href="videos.php" id="boutonHaut4" class="menu-button">Mentions Légales</a><br>   <br>
        





                </div>        </div>
            </div>
        </div>
    </div>
    <div class="footerdiv">
        <?php include "footer.php"; ?>
    </div>
</body>

</html>
