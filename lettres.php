<?php
// lettres.php
// ?? Ne jamais utiliser $result ici (collision avec les pages appelantes)

$conn = new mysqli(
    $_ENV['DB_SERVERNAME'],
    $_ENV['DB_USERNAME'],
    $_ENV['DB_PASSWORD'],
    $_ENV['DB_NAME']
);

$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Erreur connexion lettres : " . $conn->connect_error);
}
?>

<div class="container">
    <div class="lettrescript">
        <div class="controls">

            <ul class="lettre-list">
                <?php
                $lettersSql = "
                    SELECT deflettre
                    FROM definition
                    GROUP BY deflettre
                    ORDER BY deflettre
                ";

                $lettersResult = $conn->query($lettersSql);

                if ($lettersResult && $lettersResult->num_rows > 0) {
                    while ($row = $lettersResult->fetch_assoc()) {
                        $lettre = htmlspecialchars($row['deflettre']);
                        echo "
                            <li>
                                <a href='defparlettre.php?id={$lettre}' class='lettre'>
                                    {$lettre}
                                </a>
                            </li>
                        ";
                    }
                }
                ?>
            </ul>

        </div>
    </div>
</div>

<?php
$conn->close();
?>
