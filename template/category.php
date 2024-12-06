<?php
// Démarrer la session et inclure la base de données
session_start();
require '../db.php';

// Vérifier si un ID de catégorie est passé dans l'URL
if (!isset($_GET['category_id'])) {
    die("Aucune catégorie sélectionnée.");
}

$category_id = (int) $_GET['category_id'];

// Récupérer la catégorie et les spectacles associés
$stmt_category = $db->prepare("SELECT name FROM category WHERE id = :id");
$stmt_category->execute(['id' => $category_id]);
$category = $stmt_category->fetch();

if (!$category) {
    die("Catégorie introuvable.");
}

$stmt_spectacles = $db->prepare("
    SELECT sp.* 
    FROM spectacles_parisiens sp 
    WHERE sp.category_id = :category_id
");
$stmt_spectacles->execute(['category_id' => $category_id]);
$spectacles = $stmt_spectacles->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scriptacle - <?php echo htmlspecialchars($category['name']); ?></title>
    <link rel="stylesheet" href="../output.css"> 
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

<main class="m-6">
    <h1 class="text-2xl font-bold text-center mb-6"><?php echo htmlspecialchars($category['name']); ?></h1>
    <div class="flex flex-wrap justify-between gap-6">
        <?php if (count($spectacles) > 0): ?>
            <?php foreach ($spectacles as $spectacle): ?>
            <div class="w-[400px] bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden p-6">
                <img 
                    src="https://d1k4bi32qf3nf2.cloudfront.net/thumb@3x/product/2024/06/spectaculaire_1719221025.jpg.webp" 
                    alt="<?php echo htmlspecialchars($spectacle['title']); ?>" 
                    class="h-[200px] w-full object-cover rounded-lg">
                <h1 class="text-center text-lg font-semibold text-gray-900"><?php echo htmlspecialchars($spectacle['title']); ?></h1>
                <p class="text-center text-gray-600 text-sm mt-2"><?php echo htmlspecialchars($category['name']); ?></p>
                <div class="mt-4 flex justify-center">
                    <a href="affichage.php?id=<?php echo $spectacle['id']; ?>" class="text-sm font-semibold hover:underline">Afficher</a>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center text-gray-600">Aucun spectacle trouvé dans cette catégorie.</p>
        <?php endif; ?>
    </div>
</main>
</body>
<script src="index.js"></script>
</html>
