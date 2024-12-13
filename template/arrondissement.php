<?php
require '../db.php';

if (!isset($_GET['arrondissement_id'])) {
    die("Aucun arrondissement spécifié.");
}

$arrondissementId = (int) $_GET['arrondissement_id'];

$arrondissementMap = [
    1 => '75011', 
    2 => '75017', 
    3 => '75005', 
    4 => '75001', 
    5 => '75010', 
    6 => '75014', 
];

if (!array_key_exists($arrondissementId, $arrondissementMap)) {
    die("Arrondissement non trouvé.");
}

// Tableau associatif d'images pour chaque spectacle
$images = [
  "Cirque d'Hiver Bouglione" => "https://upload.wikimedia.org/wikipedia/commons/c/cf/Cirque_d%27hiver%2C_Paris_11e%2C_Southwest_view_20140316_1.jpg",
  "Le Palais des Congrès" => "https://paris-promeneurs.com/wp-content/uploads/2021/11/palais-congres1-800.jpg",
  "Église Saint-Julien le Pauvre" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROl-12Og07xu9AGgB-uwZE9jwz1JEgdlpLQA&s",
  "Théâtre du Palais Royal" => "https://upload.wikimedia.org/wikipedia/commons/b/bc/Théâtre_du_Palais-Royal_Paris_1er_005.JPG",
  "Laurette Théâtre" => "https://lirp.cdn-website.com/65947dc0/dms3rep/multi/opt/devanturetheatreparis-640w.jpg",
  "Bobino" => "https://cdn.sortiraparis.com/images/80/105766/1049053-bobino.jpg",
];

$borough = $arrondissementMap[$arrondissementId];
$stmt = $db->prepare("SELECT * FROM theatre WHERE borough = :borough");
$stmt->execute(['borough' => $borough]);
$theatres = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrondissement</title>
    <link rel="stylesheet" href="../output.css"> 
    <link rel="stylesheet" href="./input.css">
</head>
<body>
<header>
    <nav class="flex items-center justify-between p-4 relative">
      <div class="flex items-center gap-10 ">
        <a href="index.php" class="text-xl font-bold text-black">Scriptacle</a>
        <div class="relative">
          <a href="#" class="font-semibold hover:underline cursor-pointer" id="toggleCategories">Catégories</a>
            <ul id="categoriesMenu" class="absolute left-0 top-10 bg-white shadow-lg rounded-lg hidden z-10">
              <li class="px-4 py-2 hover:bg-gray-100"><a href="category.php?category_id=1">Théâtre</a></li>
              <li class="px-4 py-2 hover:bg-gray-100"><a href="category.php?category_id=2">Spectacle</a></li>
              <li class="px-4 py-2 hover:bg-gray-100"><a href="category.php?category_id=3">Concert</a></li>
              <li class="px-4 py-2 hover:bg-gray-100"><a href="category.php?category_id=4">Humour</a></li>
            </ul>
        </div>
        <div class="relative">
          <a href="#" class="font-semibold hover:underline" id="toggleArrondissement">Arrondissement</a>
            <ul id="arrondissementMenu" class="absolute left-0 top-10 bg-white shadow-lg rounded-lg hidden z-10">
              <li class="px-4 py-2 hover:bg-gray-100"><a href="arrondissement.php?arrondissement_id=1">11ème</a></li>
              <li class="px-4 py-2 hover:bg-gray-100"><a href="arrondissement.php?arrondissement_id=2">17ème</a></li>
              <li class="px-4 py-2 hover:bg-gray-100"><a href="arrondissement.php?arrondissement_id=3">5ème</a></li>
              <li class="px-4 py-2 hover:bg-gray-100"><a href="arrondissement.php?arrondissement_id=4">1ème</a></li>
              <li class="px-4 py-2 hover:bg-gray-100"><a href="arrondissement.php?arrondissement_id=5">10ème</a></li>
              <li class="px-4 py-2 hover:bg-gray-100"><a href="arrondissement.php?arrondissement_id=6">14ème</a></li>
            </ul>
          </div>
          <a href="room.php" class="font-semibold hover:underline">Salle</a>
          <a href="artiste.php" class="font-semibold hover:underline">Artiste</a>
          <a href="theatre.php" class="font-semibold hover:underline">Les mieux notés</a>
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
  <main class="m-6">
    <h1 class="text-2xl font-bold text-center mb-6">
        Lieu du <?php echo (int)substr($borough, -2); ?>ème arrondissement 
    </h1>
    <div class="flex items-center justify-center gap-6">
        <?php if (count($theatres) > 0): ?>
            <?php foreach ($theatres as $theatre): ?>
            <div class="w-[400px] bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden p-6">
                <!-- Ici on récupère l'image à afficher selon le titre du spectacle -->
                <!--  -->
                <?php 
                // Associe une image en fonction du nom du théâtre
                $imageUrl = isset($images[$theatre['name']]) ? $images[$theatre['name']] : ''; 
                ?>
                <img 
                    src="<?php echo htmlspecialchars($imageUrl); ?>" 
                    alt="<?php echo htmlspecialchars($theatre['name']); ?>" 
                    class="h-[200px] w-full object-cover rounded-lg">
                <h1 class="text-center text-lg font-semibold text-gray-900 mt-4"><?php echo htmlspecialchars($theatre['name']); ?></h1>
                <p class="text-gray-600 text-sm mt-2 text-justify"><?php echo htmlspecialchars($theatre['presentation']); ?></p>
                <p class="text-center text-gray-500 text-sm mt-4">Arrondissement <?php echo (int)substr($borough, -2); ?>ème</p>
            </div>
            <?php endforeach; ?>

        <?php else: ?>
            <p class="text-center text-gray-600">Aucun théâtre trouvé dans cet arrondissement.</p>
        <?php endif; ?>
    </div>
</main>
</body>
<script src="index.js"></script>
</html>