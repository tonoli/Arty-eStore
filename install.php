<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "arty_store";

// Connection to mysql
$conn = mysqli_connect($servername, $username, $password);
echo "<br/>";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
echo "<br/>";

/* ******************************* */
/* *       DB CREATE             * */
/* ******************************* */

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
echo "<br/>";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
echo "<br/>";

// Check connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "<br/>";

/* ***************** USERS TABLE ***************** */

// Create users
$sql = "CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
admin INT(1),
email VARCHAR(50) NOT NULL,
login VARCHAR(100) NOT NULL,
password VARCHAR(500) NOT NULL,
is_active INT(1)
)";

// Check table creation
echo "<br  />";
if (mysqli_query($conn, $sql)) {
    echo "Table Users created successfully";
} else {
    echo "Error creating Users table : " . mysqli_error($conn);
}
echo "<br  />";

/* ***************** PRODUCTS TABLE ***************** */

// Set Products Table
$sql = "CREATE TABLE IF NOT EXISTS Products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
price INT(6) NOT NULL,
name VARCHAR(50) NOT NULL,
categorie VARCHAR(50),
description TEXT NOT NULL,
img_path CHAR(255) NOT NULL,
is_active INT(1)
)";

// Check table creation
if (mysqli_query($conn, $sql)) {
    echo "Table Products created successfully";
} else {
    echo "Error creating Products table: " . mysqli_error($conn);
}
echo "<br  />";

/* ***************** CATEGORIES TABLE ***************** */

$sql = "CREATE TABLE IF NOT EXISTS Categories(

id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
name VARCHAR(50) NOT NULL

)";

// Check table creation
if (mysqli_query($conn, $sql)) {
    echo "Table CATEGORIES created successfully";
} else {
    echo "Error creating Categories table: " . mysqli_error($conn);
}
echo "<br  />";

/* ***************** CART TABLE ***************** */


$sql = "CREATE TABLE IF NOT EXISTS Cart(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
user_login CHAR(50) NOT NULL,
product_id INT(10) NOT NULL,
nbr INT(10) NOT NULL )";

// Check table creation
if (mysqli_query($conn, $sql)) {
    echo "Table CART created successfully";
} else {
    echo "Error creating Cart table: " . mysqli_error($conn);
}
echo "<br  />";

/* ******************************* */
/* *       INSERTION             * */
/* ******************************* */

 // Instert Users
 $insertusers = "
 INSERT INTO `Users` (`admin`, `email`, `login`, `password`, `is_active`) VALUES
 (1, 'admin@42.fr','admin', '6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94',1),
 (0, 'ignacio@tonoli.com','itonoli', 'fe2bd3bed44e7252f0d2e5e9268dc0266c5142bf4ea2970a7e85ac8e6420b5f0873dae518ae3fe8e5d832690a98cc6ddefca6a788a5b35c4044c04291dc128b6', 1);";

 echo "<br  />";
 if (mysqli_query($conn, $insertusers)) {
     echo "Sucess - Table User";
 } else {
     echo "insertion - USERS Table error" . mysqli_error($conn);
 }
 echo "<br  />";

 // Insert Porducts
 $insertproducts = "
 INSERT INTO `Products` (`price`, `name`, `categorie`,`description`, `img_path`, `is_active`) VALUES
 (789, 'Picasso', 'Cubism', 'Accordionist', 'https://www.pablopicasso.org/images/paintings/accordionist.jpg', 1),
 (654, 'Picasso','Cubism', 'Crucifixion', 'https://www.pablopicasso.org/images/paintings/crucifixion.jpg', 1),
 (123, 'Picasso','Cubism', 'Avignon', 'https://www.pablopicasso.org/images/paintings/avignon.jpg', 1),
 (421, 'Picasso','Cubism', 'Guernica', 'https://www.pablopicasso.org/images/paintings/guernica3.jpg', 1),
 (423, 'Picasso','Cubism', 'The old guitarist', 'https://www.pablopicasso.org/images/paintings/the-old-guitarist.jpg', 1),
 (426, 'Banksy','Street Art', 'Keep your coins I want change', 'https://anticap.files.wordpress.com/2016/01/71sndsflebl-_sl1200_.jpg', 1),
 (428, 'Banksy','Street Art', 'No future', 'https://streetartrat.files.wordpress.com/2015/03/nofuture.jpg', 1),
 (654, 'Manet','Impressionism', 'Dejeuner sur l\'herbe', 'https://upload.wikimedia.org/wikipedia/commons/9/90/Edouard_Manet_-_Luncheon_on_the_Grass_-_Google_Art_Project.jpg', 1),
(987, 'Manet','Impressionism', 'Boating', 'https://www.metmuseum.org/toah/images/hb/hb_29.100.115.jpg', 1),
(951, 'Manet','Impressionism', 'Madame Manet', 'https://www.metmuseum.org/toah/images/hb/hb_1997.391.4.jpg', 1),
 (963, 'itonoli','Realism', 'Freedom of speach', 'https://mag.lesgrandsducs.com/wp-content/uploads/2016/10/IMG_6591-e1475698082510.jpg', 1),
 (4242, 'Courbet','Realism', 'Le déserpéré', 'https://upload.wikimedia.org/wikipedia/commons/3/30/Gustave_Courbet_-_Le_D%C3%A9sesp%C3%A9r%C3%A9.JPG', 1);";

 if (mysqli_query($conn, $insertproducts)) {
     echo "Sucess - Table PRODUCTS";
 } else {
     echo "insertion - PRODUCTS Table error" . mysqli_error($conn);
 }
 echo "<br  />";

 // Instert Categories
 $insertcategory = "
 INSERT INTO `Categories` (`name`) VALUES
 ('Street Art'),
 ('Cubism'),
 ('Realism'),
 ('Impressionism');";

 if (mysqli_query($conn, $insertcategory)) {
     echo "Sucess - Table CATEGORIES";
 } else {
     echo "insertion - CATEGORIES Table error" . mysqli_error($conn);
 }
 echo "<br  />";

  // Instert Cart

 $insertcart = "
 INSERT INTO `Cart` (`user_login`, `product_id`, `nbr`) VALUES
 ('itonoli', 2, 1);";

 if (mysqli_query($conn, $insertcart)) {
     echo "Sucess - Table CART";
 } else {
     echo "insertion - CART Table error" . mysqli_error($conn);
 }
 echo "<br  />";

?>
