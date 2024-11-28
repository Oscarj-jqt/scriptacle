<?php
require 'reservation.php';


$query = $pdo->query("SELECT * FROM tickets");
$tickets = $query->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticket_id = $_POST['ticket_id'];
    $name = $_POST['name'];

    $stmt = $pdo->prepare("UPDATE tickets SET reserved_by = ? WHERE id = ? AND reserved_by IS NULL");
    $success = $stmt->execute([$name, $ticket_id]);

    if ($success && $stmt->rowCount() > 0) {
        echo "<p>Réservation réussie pour $name !</p>";
    } else {
        echo "<p>Échec de la réservation : la place est déjà réservée.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Réservations</title>
</head>
<body>
    <h1>Réserver des places</h1>

    <h2>Liste des places</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Représentation</th>
            <th>Place</th>
            <th>Réservé par</th>
            <th>Action</th>
        </tr>
        <?php foreach ($tickets as $ticket): ?>
        <tr>
            <td><?= htmlspecialchars($ticket['id']) ?></td>
            <td><?= htmlspecialchars($ticket['representation_name']) ?></td>
            <td><?= htmlspecialchars($ticket['seat_number']) ?></td>
            <td><?= htmlspecialchars($ticket['reserved_by'] ?? 'Disponible') ?></td>
            <td>
                <?php if (!$ticket['reserved_by']): ?>
                    <form method="post">
                        <input type="hidden" name="ticket_id" value="<?= $ticket['id'] ?>">
                        <input type="text" name="name" placeholder="Votre nom" required>
                        <button type="submit">Réserver</button>
                    </form>
                <?php else: ?>
                    Réservé
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
