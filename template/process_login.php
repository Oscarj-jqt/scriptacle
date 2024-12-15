<?php
global $conn;
include('db_connection.php');


session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "Veuillez entrer votre email et mot de passe.";
    } else {

        $stmt = $conn->prepare("SELECT id, name, email, password FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();


        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $name, $email_db, $hashed_password);
            $stmt->fetch();


            if (password_verify($password, $hashed_password)) {

                $_SESSION['user_id'] = $id;
                $_SESSION['user_name'] = $name;


                header("Location: index.php");
                exit();
            } else {
                echo "Mot de passe incorrect.";
            }
        } else {
            echo "Aucun utilisateur trouvé avec cet email.";
        }
        $stmt->close();
    }
}
$conn->close();
?>