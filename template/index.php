<?php
session_start();
require '../db.php';

// Tableau associatif d'images pour chaque spectacle
$images = [
    "Spectaculaire" => "https://d1k4bi32qf3nf2.cloudfront.net/thumb@3x/product/2024/06/spectaculaire_1719221025.jpg.webp",
    "Casse-Noisette" => "https://files.offi.fr/programmation/2429813/images/200/cd6e544330a4b92dc40de2fca043bb78.jpg",
    "Ensemble Royal de Paris" => "https://d1k4bi32qf3nf2.cloudfront.net/thumb@3x/product/2024/10/ensemble_royal_de_paris_1728894128.jpg.webp",
    "Edmond" => "https://d1k4bi32qf3nf2.cloudfront.net/thumb@3x/product/2024/03/edmond_1709915408.jpg.webp",
    "Sur les traces d'Arsène Lupin" => "https://d1k4bi32qf3nf2.cloudfront.net/thumb@3x/product/2022/07/surlestracesdarsenelupintheatrelyon_1658329341.png.webp",
    "Black Legends" => "https://d1k4bi32qf3nf2.cloudfront.net/thumb@3x/product/2024/04/blacklegendsbobino_01_1714379785.jpg.webp",
  ];

// Vérifier la méthode de la requête et l'action
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'register':
            // Logique d'enregistrement...
            break;

        case 'login':
            // Logique de connexion...
            break;

        case 'create_spectacle':
            // Logique de création de spectacle...
            break;
    }
}

// Récupérer les spectacles avec leurs arrondissements
$query = "
    SELECT spectacle.id, spectacle.title, theatre.borough, category.name AS category_name
    FROM spectacle
    LEFT JOIN theatre ON spectacle.theatre_name = theatre.id
    LEFT JOIN category ON spectacle.category_id = category.id
";
$stmt = $db->query($query);
$spectacles = $stmt->fetchAll();

// Récupération des catégories
$queryCategories = "SELECT id, name FROM category";
$stmtCategories = $db->query($queryCategories);
$categories = $stmtCategories->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scriptacle</title>
    <link rel="stylesheet" href="../output.css"> 
    <link rel="stylesheet" href="./index.css">
</head>
<body>

<header class="flex items-center justify-between p-4 bg-white shadow-md">
  <!-- Titre -->
  <a href="index.php" class="text-xl font-bold text-black">Scriptacle</a>

  <!-- Navigation -->
  <nav class="flex items-center gap-14 relative">
    <div class="relative mr-4">
      <a href="#" class="font-semibold hover:underline cursor-pointer" id="toggleCategories">Catégories</a>
      <a href="room.php" class="font-semibold hover:underline">Salle</a>
      <a href="artiste.php" class="font-semibold hover:underline">Artiste</a>
      <a href="theatre.php" class="font-semibold hover:underline">Les mieux notés</a>
      <ul id="categoriesMenu" class="absolute left-0 top-10 bg-white shadow-lg rounded-lg hidden z-10 gap-4 px-4 py-2">
        <?php foreach ($categories as $category): ?>
          <li class="hover:bg-gray-100">
            <a href="category.php?category_id=<?php echo htmlspecialchars($category['id']); ?>" 
              class="px-4 py-2 font-semibold text-gray-700 hover:text-blue-600">
              <?php echo htmlspecialchars($category['name']); ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </nav>

  <!-- Barre de recherche et connexion -->
  <div class="flex items-center gap-4">
    <input
      type="text"
      placeholder="Rechercher"
      class="p-2 w-64 rounded-md bg-gray-100 text-black"
    />
    <a href="login.html" class="bg-blue-600 text-white font-bold py-2 px-4 rounded-md">
      Connexion
    </a>
  </div>
</header>

  <div class="flex flex-wrap justify-between gap-6 m-6">
    <?php foreach ($spectacles as $spectacle): ?>
    <div class="w-[400px] bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden p-6">
      <!-- Utilisation de la variable d'image spécifique -->
      <?php 
        // Vérifier si une image est associée au titre du spectacle
        $imageUrl = isset($images[$spectacle['title']]) ? $images[$spectacle['title']] : 'images/default.jpg';
      ?>
      <img src="<?php echo htmlspecialchars($imageUrl); ?>" alt="Spectacle Image" class="h-[200px] w-full object-cover rounded-lg !important">
      <h1 class="text-center text-lg font-semibold text-gray-900"><?php echo htmlspecialchars($spectacle['title']); ?></h1>
      <div class="p-4">
        <div class="flex justify-center items-center">
          <h2 class="text-lg font-semibold text-gray-900"><?php echo htmlspecialchars($spectacle['borough']); ?></h2>
        </div>

      <p class="text-center text-gray-600 text-sm mt-2">
      <p class="text-center text-gray-600 text-sm mt-2">
        <?php 
        // Vérifier si une catégorie est associée au spectacle
        echo !empty($spectacle['category_name']) ? htmlspecialchars($spectacle['category_name']) : 'Catégorie non spécifiée';
        ?>
      </p>        
        <div class="mt-4 flex justify-center">
          <a href="affichage.php?id=<?php echo $spectacle['id']; ?>" class="text-sm font-semibold hover:underline">Afficher</a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div> 

</body>
<script src="./index.js"></script>
</html>
