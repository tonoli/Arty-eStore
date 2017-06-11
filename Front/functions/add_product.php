<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "Arty_shop";
$table = "Products";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO $table (price, description, img_path)
VALUES (250, 'Le Déjeuner sherbe est un tableau d\'Édouard Manet achevé en 1863, d\'abord intitulé Le Bain, puis La Partie carrée.', 'img/dejeuner.jpg')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
