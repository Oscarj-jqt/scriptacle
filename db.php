<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$user = 'root';
$pass = '';
$dsn = 'mysql:host=localhost;dbname=spectacles_parisiens';

try {
    $db = new PDO($dsn, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<script>Connection successful!</script>";
} catch (PDOException $e) {
    echo '<script>Erreur dans la connexion à la base de donnée: </script>' . $e->getMessage();
}


?>

