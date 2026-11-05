<div class="container">
	    <div class="home">
			<div class="gauche">
                <?php
                include "gauche.php"
		        ?>	
		    </div>
			<div class="droite">
				   <br> <img src="deflogo2.png">     <h3>
                          Definitions-numerique.com est une encyclopédie en ligne dédiée aux<br>
                        termes du numérique, offrant des définitions claires et accessibles<br>
                         pour mieux comprendre les concepts du digital.<br> 
                          Pour chaque définition, nous proposons des vidéos, des quiz et des<br>
                           présentations afin d’enrichir l’apprentissage et la compréhension<br> des termes du numérique.</h3>
                        <hr>

                  
                   
               <h3>Définition la plus consultée</h3>
            
            <?php
            // Connexion à la base de données
            $conn = new mysqli($_ENV['DB_SERVERNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
	$conn->set_charset("utf8mb4");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }


             $result10 = $conn->query("SELECT defid, deftitre, definition, defauteur, defdate, nb_vue FROM definition ORDER BY nb_vue DESC LIMIT 1");
              if ($result10) {
                while ($row10 = $result10->fetch_assoc()) {
                    $motId =$row10['defid']       ;
                   } }

            // Vérifier si un defid est passé en GET
                            

                            // Récupération des informations de la définition
                            $stmt = $conn->prepare("SELECT defid, deftitre, definition, nb_vue, defauteur, defdate FROM definition WHERE defid = ?");
                            $stmt->bind_param("i", $motId);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $definition = $result->fetch_assoc();

                            // Récupération des catégories associées
                            $stmtCategories = $conn->prepare("SELECT c.catid, c.catnom 
                                                             FROM categorie c
                                                             JOIN lien l ON c.catid = l.catid
                                                             WHERE l.defid = ?");
                            $stmtCategories->bind_param("i", $motId);
                            $stmtCategories->execute();
                            $resultCategories = $stmtCategories->get_result();
							
							// Connexion à la base de données
							$conn2 = new mysqli($_ENV['DB_SERVERNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
							$conn2->set_charset("utf8mb4");
							// Vérification connexion
							if ($conn2->connect_error) {
								die("Échec de la connexion : " . $conn2->connect_error);
							}	
							
							// Préparer la requête pour récupérer les définitions avec les catégories
							$sql2 = "SELECT definition.deftitre, video.lien_video, definition.defid FROM video JOIN definition ON video.defid = definition.defid and definition.defid= ".$motId;

							$result2 = $conn2->query($sql2);

							// Récupérer toutes les définitions dans un tableau
							$lien = [];
							if ($result2->num_rows > 0) {
								while ($row2 = $result2->fetch_assoc()) {
									$lien[] = $row2;
								}
							}
							
							// Connexion à la base de données
							$conn3 = new mysqli($_ENV['DB_SERVERNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);

							// Vérification connexion
							if ($conn3->connect_error) {
								die("Échec de la connexion : " . $conn3->connect_error);
							}
							
							// Préparer la requête pour récupérer les définitions avec les catégories
							$sql3 = "SELECT definition.deftitre, quiz.lien_quiz, definition.defid FROM quiz JOIN definition ON quiz.defid = definition.defid and definition.defid= ".$motId;

							$result3 = $conn3->query($sql3);

							// Récupérer toutes les définitions dans un tableau
							$lien3 = [];
							if ($result3->num_rows > 0) {
								while ($row3 = $result3->fetch_assoc()) {
									$lien3[] = $row3;
								}
							}
							
                            if ($definition) {
                                echo '<div class="definition-box">';
								
                                echo '<div class="menu-button">' . htmlspecialchars($definition['deftitre']) . '</div>';
								echo '<br>';
								echo "<small>Écrit par " . (empty($definition['defauteur']) ? "Définition numérique" : htmlspecialchars($definition['defauteur'])) . " le " . htmlspecialchars($definition['defdate']) . "</small>";

								echo '<br>';
								echo '<br>';
								echo "<table class='tabledef'><tr><td>";
								echo '<div class="mepdef">Définition: </div>'; 
								echo '<div>' . nl2br(htmlspecialchars($definition['definition'])) . '</div>';
								echo '<p><small>La définition a été vue ' . htmlspecialchars($definition['nb_vue']) . ' fois.</small></p>';

								echo"</td><td>"; // mettrele tableau en 80% 
								// Affichage des catégories associées avec une nouvelle classe CSS
								echo '<div class="categorie"><small>Catégories : </small>';
								echo '</div>'; // Fermeture de .categorie
								echo '<br>';
								if ($resultCategories->num_rows > 0) {
									while ($category = $resultCategories->fetch_assoc()) {
										echo '<a href="categoriedetail.php?catid=' . urlencode($category['catid']) . '" class="link">' . htmlspecialchars($category['catnom']) . '</a><br>';
									}
									
								} else {
									echo '<div><small>Aucune catégorie associée.</small></div>';
								}
								
							
								foreach ($lien as $lien) {
                               	echo '<br>';
								echo '<div class="video"> Vidéo:</div><br>';
							    echo '<a href="' . htmlspecialchars($lien['lien_video']) . '" target="_blank"><img src="ytb2.png" alt="YouTube" width="60"></a>';
                                echo '<br>';
                            }
								
								
								foreach ($lien3 as $lien3) {
                                echo '<br>';
								echo '<div class="quiz"> Quiz:</div><br>';
								echo '<a href="' . htmlspecialchars($lien3['lien_quiz']) . '" target="_blank"><img src="quiz.png" alt="Quiz" width="60"></a>';
                                echo '<br>';
                            }
								
								echo '<br>';
								
                                 echo '<button class="btn-modifier" onclick="window.location.href=\'modef.php?defid=' . urlencode($definition['defid']) . '\'">Proposer<br>une modification</button>';
                              

								echo"</td></tr></table>";
                                                   

                                 echo '</div>';
                        
                            }

            $conn->close();
            ?>      <hr>       
            <h3>Les meilleures vidéos de Définitions-Numérique</h3>
          
    <div class="video-container">
    <iframe 
        src="https://www.youtube.com/embed/YwGXnUvtnZ8"
        title="Définition du numérique"
        allowfullscreen>
    </iframe>
    
    

    <iframe 
        src="https://youtu.be/JxRcaIpYnRk"
        title="Définition de l'IA"
        allowfullscreen>
    </iframe>
</div>  
<div class="video-container">
    <iframe 
        src="https://www.youtube.com/embed/79hSf34SiEM"
        title="Définition de l'AB Testing"
        allowfullscreen>
    </iframe>
    <iframe                     
        src="https://www.youtube.com/embed/cPyTQyvezOU"
        title="Définition de l'ergonomie"
        allowfullscreen>
    </iframe>

</div>  


<hr><br>
        </div>
    </div>
</div>
