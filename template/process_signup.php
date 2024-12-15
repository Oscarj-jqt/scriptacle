<?php
include('db_connection.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs envoyées depuis le formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];

    // Validation des champs
    if (empty($name) || empty($email) || empty($password) || empty($password_confirmation)) {
        echo "Tous les champs doivent être remplis.";
    } elseif ($password !== $password_confirmation) {
        echo "Les mots de passe ne correspondent pas.";
    } else {
        // Règles de sécurité pour le mot de passe
        $password_regex = "/^(?=.[A-Z])(?=.[a-z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/";

        if (!preg_match($password_regex, $password)) {
            echo "Le mot de passe doit contenir au moins 8 caractères, incluant une majuscule, une minuscule, un chiffre et un caractère spécial.";
        } else {
            // Hachage du mot de passe pour la sécurité
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Préparer la requête SQL pour insérer les données
            $stmt = $conn->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $hashed_password);

            // Exécuter la requête
            if ($stmt->execute()) {
                echo "Inscription réussie.";
            } else {
                echo "Erreur lors de l'inscription : " . $stmt->error;
            }

            // Fermer la requête préparée
            $stmt->close();
        }
    }
}

// Fermer la connexion
$conn->close();
?>
process_signup.php
<?php
include('db_connection.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: process_login.php");
    var_dump($_SESSION);
    exit();
}else{
    echo "vous n'etes pas connecté";
}
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT name FROM user WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($name);
$stmt->fetch();
$stmt->close();
$conn->close();
$_SESSION['user_name'] = $name;
?>
user_info.php
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>SignUP</title>
    <meta charset="UTF-8">
</head>
<body>
    <section class="body_form">
    <form action="process_signup.php" method="post">
        <div>
            <h1>Signup Form</h1>
            <div>
                <label for="name">Names</label>
                <input type="text" id="name" name="name" placeholder="Names">
            </div>

            <br>

            <div>
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Email">
            </div>

            <br>

            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password">
            </div>

            <br>

            <div>
                <label for="password_confirmation">Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
            </div>

            <br>

            <button>Inscription</button>
        </div>
    </form>

        <form action="process_login.php" method="post">
            <div>
                <h1>Login Form</h1>
                <div>
                    <label for="email_login">Email</label>
                    <input type="text" id="email_login" name="email" placeholder="Email">
                </div>

                <br>

                <div>
                    <label for="password_login">Password</label>
                    <input type="password" id="password_login" name="password" placeholder="Password">
                </div>

                <br>

                <button>Login</button>
            </div>
        </form>


    </section>

    <style>
        .body_form{
            display: flex;
            gap: 270px;
        }
    </style>
</body>
</html>