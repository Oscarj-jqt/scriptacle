<?php
/* session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'register':
            // Registration logic...
            break;

        case 'login':
            // Login logic...
            break;

        case 'create_spectacle':
            // Create spectacle logic...
            break;
    }
}

// Récupérer les spectacles
$stmt = $pdo->query("SELECT * FROM spectacle");
$spectacles = $stmt->fetchAll();
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Annuaire de Spectacles</title>
</head>
<body>
    <h1>Annuaire de Spectacles</h1>

    <!-- Afficher les spectacles -->
    <h2>Liste des Spectacles</h2>
    <ul>
        <?php foreach ($spectacles as $spectacle): ?>
            <li>
                <h3><?php echo htmlspecialchars($spectacle['title']); ?></h3>
                <p><?php echo htmlspecialchars($spectacle['summary']); ?></p>
                <p>Langue : <?php echo htmlspecialchars($spectacle['language']); ?></p>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Registration Form -->
    <form method="POST" action="index.php">
        <input type="hidden" name="action" value="register">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>

    <!-- Login Form -->
    <form method="POST" action="index.php">
        <input type="hidden" name="action" value="login">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <!-- Create Spectacle Form -->
    <form method="POST" action="index.php">
        <input type="hidden" name="action" value="create_spectacle">
        <input type="text" name="title" placeholder="Title" required>
        <textarea name="summary" placeholder="Summary" required></textarea>
        <select name="language">
            <option value="français">Français</option>
            <option value="autre">Autre</option>
        </select>
        <input type="number" name="theatre_id" placeholder="Theatre ID" required>
        <button type="submit">Create Spectacle</button>
    </form>
</body>
</html>
