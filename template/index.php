<?php
session_start();
require '../db.php';

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
// $stmt = $db->query("SELECT * FROM spectacles_parisiens");
$stmt = $db->query("
    SELECT sp.*, c.name AS category_name
    FROM spectacles_parisiens sp
    LEFT JOIN category c ON sp.category_id = c.id
");
$spectacles = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../output.css"> 
    <link rel="stylesheet" href="./index.css">
</head>
<body>

  <header>
    <nav class="flex items-center justify-between p-4 relative">
      <div class="flex items-center gap-10 ">
        <a href="index.html" class="text-xl font-bold text-black">Scriptacle</a>
        <a href="#" class="font-semibold hover:underline cursor-pointer">Catégories</a>
        <a href="#" class="font-semibold hover:underline">Spectacle</a>
        <a href="#" class="font-semibold hover:underline">Salle</a>
        <a href="#" class="font-semibold hover:underline">Artiste</a>
        <a href="#" class="font-semibold hover:underline">Les mieux notés</a>
      </div>
    
      <div class="flex items-center gap-4">
        <input
          type="text"
          placeholder="Rechercher"
          class="p-2 w-64 rounded-md bg-gray-100 text-black"
        />
        <a href="login.html" class="bg-blue-600 text-white font-bold py-2 px-4 rounded-md">
          Connexion
        </a>
    </nav>
    <div class="border-t-2 border-gray-200 mt-2"></div>
  </header>

  <div class="flex flex-wrap justify-between gap-6  m-6">
    <?php foreach ($spectacles as $spectacle): ?>
    <div class="w-[400px]  bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden p-6">
      <img 
        src="https://d1k4bi32qf3nf2.cloudfront.net/thumb@3x/product/2024/06/spectaculaire_1719221025.jpg.webp" 
        alt="<?php echo htmlspecialchars($spectacle['title']); ?>" 
        class="h-[200px] w-full object-cover rounded-lg !important">
      <h1 class="text-center text-lg font-semibold text-gray-900">
        <?php echo htmlspecialchars($spectacle['title']); ?>
      </h1>
      <div class="p-4">
        <div class="flex justify-center items-center">
          <h2 class="text-lg font-semibold text-gray-900">Arrondissement</h2>
        </div>
        <p class="text-center text-gray-600 text-sm mt-2">
         <?php 
            $category = isset($spectacle['category_name']) ? htmlspecialchars($spectacle['category_name']) : 'Catégorie inconnue';
            echo $category;
          ?>
        </p>
        <div class="mt-4 flex justify-center">
          <a href="affichage.html" class="text-sm font-semibold hover:underline">Afficher</a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>


</body>
</html>
