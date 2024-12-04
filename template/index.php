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
 <?php foreach ($spectacles as $spectacle): ?>
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
    <div class="w-[400px]  bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden p-6">
      <img src="https://d1k4bi32qf3nf2.cloudfront.net/thumb@3x/product/2024/06/spectaculaire_1719221025.jpg.webp" alt="Spectaculaire" class="h-[200px] w-full object-cover rounded-lg !important">
      <h1 class="text-center text-lg font-semibold text-gray-900"><?php echo htmlspecialchars($spectacle['title']); ?></h1>
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
      <img src="https://files.offi.fr/programmation/2429813/images/200/cd6e544330a4b92dc40de2fca043bb78.jpg" alt="Casse-Noisette" class="h-[200px] w-full object-cover rounded-lg ">
      <h1 class="text-center text-lg font-semibold text-gray-900"><?php echo htmlspecialchars($spectacle['title']); ?></h1>
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
</html>
