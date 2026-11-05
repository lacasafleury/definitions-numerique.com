<?php

include "env.php";

$conn = new mysqli($_ENV['DB_SERVERNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
	$conn->set_charset("utf8mb4");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $lettre = $_GET['id'];

    $sql = "SELECT definition, deftitre, defid FROM definition WHERE deftitre LIKE ? AND valider = 2 ORDER BY deftitre ASC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $lettre); 
    $stmt->execute();

    $result = $stmt->get_result();


    


    if ($result->num_rows > 0) {
        $definitions = [];
        while ($row = $result->fetch_assoc()) {
            $definitions[] = [
                'deftitre' => $row['deftitre'],
                'definition' => $row['definition'],
                'defid' => $row['defid'],
            ];
        }
        $_SESSION['definitions'] = $definitions;
    }
}

$conn->close();
header('Location: affichelesdefs.php');
exit();
?>
