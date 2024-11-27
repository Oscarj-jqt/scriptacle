<!DOCTYPE html>
<html>
<head>
  <title>Carte</title>
  <!-- fichiers Leaflet pour la carte  -->
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>
<body>
  <div id="map" style="height: 500px; width: 100%;"></div>
    

    <?php
    // Connexion à la base de donnée
    $conn = new mysqli("localhost", "root", "", "spectacles_parisiens");
    if ($conn->connect_error) {
        die("Erreur de connexion " . $conn->connect_error);
    }

    // Récupération des localisations des théâtres
    $sql = "SELECT id, name, ST_X(geolocation) AS latitude, ST_Y(geolocation) AS longitude FROM theatre";
    $result = $conn->query($sql);
    

    //Tableau contenant les données récupérées
    $locations = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $locations[] = $row; 
        }
    } 
    $conn->close();
    ?>


    <script>
        // Carte géolocalisation
        // Initialisation de la carte avec une vue centrée sur Paris
        var map = L.map('map').setView([48.8566, 2.3522], 12);


        // Ajout des tuiles de base (carte de fond)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Récupération des données de lieux depuis PHP
        var locations = <?php echo json_encode($locations); ?>;

        // Ajout de marqueurs pour chaque lieu
        locations.forEach(function(location) {
            L.marker([location.latitude, location.longitude])
                .addTo(map)
                .bindPopup('<strong>' + location.name + '</strong>');
        });
    </script>
</body>
</html>

