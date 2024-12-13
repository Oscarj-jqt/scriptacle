<?php
    session_start();
    require '../db.php';

    // Tableau associatif d'images pour chaque lieu
$images = [
  "Cirque d'Hiver" => "https://www.cirquedhiver.com/pics/location/image8.jpg",
  "Grand Amphithéâtre" => "https://www.lightzoomlumiere.fr/wp-content/uploads/2023/10/Palais-des-Congres-de-Paris-grand-amphitheatre-eclairage-LED-blanc-chaud-cote-jardin-Concepteur-lumiere-maitre-oeuvre-Lyum-Luminaire-Anolis-Ambiane-Copyright-La-Chouette-Photo-Olivier-Hannauer.jpg",
  "Eglise Saint-Julien Le Pauvre" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRNCimqhJOd4bwap9NTToCAyCy-8WzqUooMYw&s",
  "Salle du Palais-Royal" => "https://parisjetaime.com/data/layout_image/14289_Théâtre-du-Palais-Royal-Salle-de-spectacle--630x405--©-B.-Richebé_square_1-1_xl.jpg?ver=1700687003",
  "Le Laurette théâtre" => "https://www.theatreonline.com/BDDPhoto/Medias//theatre/593/52299/grand.jpg",
  "La salle de Bobino" => "https://www.theatreinparis.com/uploads/images/theatre/theatre-bobino-header.png",
];

    $sortOrder = isset($_GET['sort']) && $_GET['sort'] === 'desc' ? 'DESC' : 'ASC';
    $stmt = $db->query("SELECT * FROM room ORDER BY gauge $sortOrder");
    $room = $stmt->fetchAll();
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
<div class="flex justify-end relative">
  <button id="toggleSort" class="font-bold py-2 px-4 rounded-lg border-black border">Taux de remplissage</button>
  <ul id="sortMenu" class="absolute top-full bg-white shadow-lg rounded-lg hidden z-10 mt-2">
    <li class="px-4 py-2 hover:bg-gray-100"> <a href="?sort=asc">Croissant</a></li>
    <li class="px-4 py-2 hover:bg-gray-100"> <a href="?sort=desc">Décroissant</a></li>
  </ul>
</div>
<div class="flex flex-wrap justify-between gap-6  m-6">
    <?php foreach ($room as $room): ?>
    <div class="w-[400px]  bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden p-6">
    <?php 
                // Associe une image en fonction du nom du théâtre
                $imageUrl = isset($images[$room['name']]) ? $images[$room['name']] : ''; 
                ?>
                <img 
                    src="<?php echo htmlspecialchars($imageUrl); ?>" 
                    alt="<?php echo htmlspecialchars($room['name']); ?>" 
                    class="h-[200px] w-full object-cover rounded-lg !important">
      <h1 class="text-center text-lg font-semibold text-gray-900">
        <?php echo htmlspecialchars($room['name']); ?>
      </h1>
      <div class="p-4">
        <div class="flex justify-center items-center">
          <h2 class="text-lg font-semibold text-gray-900">Nombre de spectateur</h2>
        </div>
        <p class="text-center font-semibold text-gray-900 text-sm mt-2">
            <?php echo htmlspecialchars($room['gauge']); ?>
        </p>
        <div class="mt-4 flex justify-center">
          <a href="#" class="text-sm font-semibold hover:underline">Afficher</a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
</main>
</body>
<script src="index.js"></script>
</html>