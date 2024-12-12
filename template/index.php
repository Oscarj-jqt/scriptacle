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
$stmt = $db->query("SELECT * FROM spectacles_parisiens");
$spectacles = $stmt->fetchAll();

// Tableau associatif d'images pour chaque spectacle
$images = [
  "Spectaculaire" => "https://d1k4bi32qf3nf2.cloudfront.net/thumb@3x/product/2024/06/spectaculaire_1719221025.jpg.webp",
  "Casse-Noisette" => "https://files.offi.fr/programmation/2429813/images/200/cd6e544330a4b92dc40de2fca043bb78.jpg",
  "Ensemble Royal de Paris" => "https://d1k4bi32qf3nf2.cloudfront.net/thumb@3x/product/2024/10/ensemble_royal_de_paris_1728894128.jpg.webp",
  "Edmond" => "https://d1k4bi32qf3nf2.cloudfront.net/thumb@3x/product/2024/03/edmond_1709915408.jpg.webp",
  "Sur les traces d'Arsène Lupin"
   => "https://d1k4bi32qf3nf2.cloudfront.net/thumb@3x/product/2022/07/surlestracesdarsenelupintheatrelyon_1658329341.png.webp",
  "Black Legends" => "https://d1k4bi32qf3nf2.cloudfront.net/thumb@3x/product/2024/04/blacklegendsbobino_01_1714379785.jpg.webp",

];

$theatreStmt = $db->query("SELECT * FROM theatre ORDER BY borough ASC");
$theatres = $theatreStmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scriptacle</title>
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
              <li class="px-4 py-2 hover:bg-gray-100"><a href="arrondissement.php?arrondissement_id=4">10ème</a></li>
              <li class="px-4 py-2 hover:bg-gray-100"><a href="arrondissement.php?arrondissement_id=4">14ème</a></li>
            </ul>
          </div>
          <a href="room.php" class="font-semibold hover:underline">Salle</a>
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
    <div class="border-t-2 border-gray-200 mt-4"></div>
  </header>
  <div class="flex flex-wrap justify-between gap-6  m-6">
    <?php foreach ($spectacles as $spectacle): ?>
    <div class="w-[400px]  bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden p-6">
      <img src="https://d1k4bi32qf3nf2.cloudfront.net/thumb@3x/product/2024/06/spectaculaire_1719221025.jpg.webp" alt="Spectaculaire" class="h-[200px] w-full object-cover rounded-lg !important">
      <h1 class="text-center text-lg font-semibold text-gray-900"><?php echo htmlspecialchars($spectacle['title']); ?></h1>
      <div class="p-4">
        <div class="flex justify-center items-center">
          <h2 class="text-lg font-semibold text-gray-900"><?php echo htmlspecialchars($spectacle['borough']); ?></h2>
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

    <div class="w-[400px]  bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden p-6">
      <img src="https://files.offi.fr/programmation/2429813/images/200/cd6e544330a4b92dc40de2fca043bb78.jpg" alt="Casse-Noisette" class="h-[200px] w-full object-cover rounded-lg ">
      <h1 class="text-center text-lg font-semibold text-gray-900">Casse-Noisette</h1>
      <div class="p-4">
        <div class="flex justify-center items-center">
          <h2 class="text-lg font-semibold text-gray-900">Arrondissement</h2>
        </div>
        <p class="text-center text-gray-600 text-sm mt-2">Opéra</p>
        <div class="mt-4 flex justify-center">
          <a href="affichage.html" class="text-sm font-semibold hover:underline">Afficher</a>
        </div>
      </div>
    </div>

    <div class="w-[400px]  bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden p-6">
      <img src="https://d1k4bi32qf3nf2.cloudfront.net/thumb@3x/product/2024/10/ensemble_royal_de_paris_1728894128.jpg.webp" alt="" class="h-[200px] w-full object-cover rounded-lg">
      <h1 class="text-center text-lg font-semibold text-gray-900">Ensemble Royal de Paris</h1>
      <div class="p-4">
        <div class="flex justify-center items-center">
          <h2 class="text-lg font-semibold text-gray-900">Arrondissement</h2>
        </div>
        <p class="text-center text-gray-600 text-sm mt-2">Concert</p>
        <div class="mt-4 flex justify-center">
          <a href="affichage.html" class="text-sm font-semibold hover:underline">Afficher</a>
        </div>
      </div>
    </div>

    <div class="w-[400px]  bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden p-6">
      <img src=" https://d1k4bi32qf3nf2.cloudfront.net/thumb@3x/product/2024/03/edmond_1709915408.jpg.webp" alt="" class="h-[200px] w-full object-cover rounded-lg">
      <h1 class="text-center text-lg font-semibold text-gray-900">Edmond</h1>
      <div class="p-4">
        <div class="flex justify-center items-center">
          <h2 class="text-lg font-semibold text-gray-900">Arrondissement</h2>
        </div>
        <p class="text-center text-gray-600 text-sm mt-2">Théâtre Contemporain</p>
        <div class="mt-4 flex justify-center">
          <a href="affichage.html" class="text-sm font-semibold hover:underline">Afficher</a>
        </div>
      </div>
    </div>

    <div class="w-[400px]  bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden p-6">
      <img src=" https://d1k4bi32qf3nf2.cloudfront.net/thumb@3x/product/2022/07/surlestracesdarsenelupintheatrelyon_1658329341.png.webp" alt="" class="h-[200px] w-full object-cover rounded-lg">
      <h1 class="text-center text-lg font-semibold text-gray-900">Arsene Lupin</h1>
      <div class="p-4">
        <div class="flex justify-center items-center">
          <h2 class="text-lg font-semibold text-gray-900">Arrondissement</h2>
        </div>
        <p class="text-center text-gray-600 text-sm mt-2">Théâtre</p>
        <div class="mt-4 flex justify-center">
          <a href="affichage.html" class="text-sm font-semibold hover:underline">Afficher</a>
        </div>
      </div>
    </div>

    <div class="w-[400px]  bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden p-6">
      <img src=" https://d1k4bi32qf3nf2.cloudfront.net/thumb@3x/product/2024/04/blacklegendsbobino_01_1714379785.jpg.webp" alt="" class="h-[200px] w-full object-cover rounded-lg">
      <h1 class="text-center text-lg font-semibold text-gray-900">Black Légends</h1>
      <div class="p-4">
        <div class="flex justify-center items-center">
          <h2 class="text-lg font-semibold text-gray-900">Arrondissement</h2>
        </div>
        <p class="text-center text-gray-600 text-sm mt-2">Musical</p>
        <div class="mt-4 flex justify-center">
          <a href="affichage.html" class="text-sm font-semibold hover:underline">Afficher</a>
        </div>
      </div>
    </div>
  </div> 
  <?php endforeach; ?>
</body>
<script src="index.js"></script>
</html>
