<?php
session_start();
require '../db.php';

// Tableau associatif d'images pour chaque lieu
$images = [
    "Cirque d'Hiver Bouglione" => "https://upload.wikimedia.org/wikipedia/commons/c/cf/Cirque_d%27hiver%2C_Paris_11e%2C_Southwest_view_20140316_1.jpg",
    "Le Palais des Congrès" => "https://paris-promeneurs.com/wp-content/uploads/2021/11/palais-congres1-800.jpg",
    "Église Saint-Julien le Pauvre" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROl-12Og07xu9AGgB-uwZE9jwz1JEgdlpLQA&s",
    "Théâtre du Palais Royal" => "https://upload.wikimedia.org/wikipedia/commons/b/bc/Théâtre_du_Palais-Royal_Paris_1er_005.JPG",
    "Laurette Théâtre" => "https://lirp.cdn-website.com/65947dc0/dms3rep/multi/opt/devanturetheatreparis-640w.jpg",
    "Bobino" => "https://cdn.sortiraparis.com/images/80/105766/1049053-bobino.jpg",
  ];

$sortOrder = isset($_GET['sort']) && $_GET['sort'] === 'desc' ? 'DESC' : 'ASC';

$stmt = $db->query("SELECT 
    theatre.id AS theatre_id, 
    theatre.name AS theatre_name, 
    theatre.presentation,
    AVG(avis.note) AS avg_rating
FROM 
    theatre
JOIN 
    room ON theatre.id = room.theater_id
JOIN 
    representation ON room.id = representation.room_id
JOIN 
    spectacle ON representation.spectacle_id = spectacle.id
JOIN 
    avis ON spectacle.id = idSpectacle
GROUP BY 
    theatre.id
ORDER BY 
    avg_rating DESC;
");

$theatres = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
  <main>
    <div class="flex flex-wrap justify-between gap-6 m-6">
        <?php foreach ($theatres as $theatre): ?>
        <div class="w-[400px] bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden p-6">
        <?php 
                // Associe une image en fonction du nom du théâtre
                $imageUrl = isset($images[$theatre['theatre_name']]) ? $images[$theatre['theatre_name']] : ''; 
                ?>
                <img 
                    src="<?php echo htmlspecialchars($imageUrl); ?>" 
                    alt="<?php echo htmlspecialchars($theatre['theatre_name']); ?>" 
                    class="h-[200px] w-full object-cover rounded-lg">
            <h1 class="text-center text-lg font-semibold text-gray-900">
                <?php echo htmlspecialchars($theatre['theatre_name']); ?>
            </h1>
            <div class="p-4">
                <div class="flex justify-center items-center">
                    <h2 class="text-lg font-semibold text-gray-900">Présentation</h2>
                </div>
                <p class="text-center font-semibold text-gray-900 text-sm mt-2">
                    <?php echo htmlspecialchars($theatre['presentation']); ?>
                </p>
                <div class="mt-4 flex justify-center">
                    <p class="text-sm font-semibold">Note Moyenne: <?php echo number_format($theatre['avg_rating'], 2); ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</main>



</body>
<script src="index.js"></script>
</html>