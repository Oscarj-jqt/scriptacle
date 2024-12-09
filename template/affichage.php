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


$spectacle_id = isset($_GET['id']) ? $_GET['id'] : null;

if ($spectacle_id) {
    // Connexion à la base de données (ou déjà fait)
    require '../db.php';
    
    // Récupérer les détails du spectacle spécifique
    $stmt = $db->prepare("SELECT * FROM spectacles_parisiens WHERE id = :id");
    $stmt->execute(['id' => $spectacle_id]);
    $spectacle = $stmt->fetch();

    if ($spectacle) {
        // Afficher le titre et d'autres informations
        $title = htmlspecialchars($spectacle['title']);
        $description = htmlspecialchars($spectacle['synopsis']);
        $stmt_avis = $db->prepare("SELECT commentaire FROM avis WHERE idSpectacle = :idSpectacle");
        $stmt_avis->execute(['idSpectacle' => $spectacle_id]);
        $avis = $stmt_avis->fetchAll();
        $stmt_representation = $db->prepare("SELECT first_date, last_date FROM representation WHERE spectacle_id = :spectacle_id");
        $stmt_representation->execute(['spectacle_id' => $spectacle_id]);
        $representation = $stmt_representation->fetch();
    }
  }


?>

<!-- // // Récupérer les spectacles
// $stmt = $db->query("SELECT * FROM spectacles_parisiens LIMIT 1"); 
// $spectacle = $stmt->fetch(); // fetch() renvoie une seule ligne ou false

// // Vérifiez si la variable $spectacle est définie et contient des données
// if ($spectacle === false) {
//     echo "Aucun spectacle trouvé.";
//     exit; // On arrête l'exécution du script si aucun résultat n'est trouvé
// } -->
<!-- 
$date = $db->query("SELECT * FROM representation ");
$mydate = $date->fetchAll();
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../output.css"> 
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
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

  <div class="flex  justify-center gap-6 m-6">
    <div class="bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden p-6 ">
      <h1 class="border-gray-200 border-b-2 text-xl inline-block pb-2">
        <?php echo htmlspecialchars($spectacle['title']); ?> 
      </h1>
    <div class="flex justify-center m-6">
      <div class="p-6 space-y-4 max-w-lg">
        <p>Nombre de réservation :</p>  
        <p class="">Description :</p>
        <p>
          <?php echo htmlspecialchars($spectacle['synopsis']); ?> 
        </p>
        <p>Note :</p>
        <?php foreach ($avis as $avis_item): ?>
          <div class="border-t-2 border-gray-200 mt-2 "></div>
            <p>Commentaire :</p>
            <p>
              <?php echo htmlspecialchars($avis_item['commentaire']); ?>
            </p>
        <?php endforeach; ?>
        </div>
          <div class="bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden flex flex-col p-6 space-y-4">
            <h1 class="text-xl ">Page de réservation</h1>
            <div class="flex items-center justify-between gap-4 p-4 rounded-lg border-2 border-gray-200">
              <div class="text-center p-2">
                <p>Début Spectacle</p>
                <p>
                  <?php 
                    if (isset($representation['first_date'])) {
                      $first_date = new DateTime($representation['first_date']);
                      echo $first_date->format('d-m-Y H:i');
                    } else {
                      echo "Date de début non définie";
                    }
                  ?>
                </p>
              </div>
                <div class="text-center p-2 ">
                  <p>Fin Spectacle</p>
                  <p>
                    <?php 
                      if (isset($representation['last_date'])) {
                        $last_date = new DateTime($representation['last_date']);
                        echo $last_date->format('d-m-Y H:i');
                      } else {
                        echo "Date de fin non définie";
                      }
                    ?>
                  </p>
                </div>
              </div>
                <p>Nombre de réservation :</p>
                <p>En cours</p>
                <button class="bg-blue-600 text-white font-bold py-2 px-4 rounded-md">Reservation</button>
              </div>
            </div>
            <div id="map" class="flex justify-center border-gray-200 border rounded-lg shadow-lg overflow-hidden h-[250px] w-full">
              <h1>Géocalisation</h1>
            </div>
        </div>
      </div>
      <script src="../geolocation/script.js"></script>
</body>
<script src="index.js"></script>
</html>