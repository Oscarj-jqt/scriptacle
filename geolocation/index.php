<!DOCTYPE html>
<html>
<head>
  <title>Cartes multiples</title>
  <!-- fichiers Leaflet pour la carte -->
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>
<body>

  <!-- Cartes pour chaque lieu -->
  <div id="Cirque d'Hiver Bouglione" style="height: 500px; width: 100%; margin-bottom: 20px;"></div>
  <div id="Le Palais des Congrès" style="height: 500px; width: 100%; margin-bottom: 20px;"></div>
  <div id="Église Saint-Julien le Pauvre" style="height: 500px; width: 100%; margin-bottom: 20px;"></div>
  <div id="Théâtre du Palais Royal" style="height: 500px; width: 100%; margin-bottom: 20px;"></div>
  <div id="Laurette Théâtre" style="height: 500px; width: 100%; margin-bottom: 20px;"></div>
  <div id="Bobino" style="height: 500px; width: 100%; margin-bottom: 20px;"></div>

  <?php
  // Connexion à la base de donnée
  $conn = new mysqli("localhost", "root", "", "spectacles_parisiens");
  if ($conn->connect_error) {
      die("Erreur de connexion " . $conn->connect_error);
  }

  // Récupération des localisations des théâtres
  $sql = "SELECT id, name, ST_X(geolocation) AS latitude, ST_Y(geolocation) AS longitude FROM theatre";
  $result = $conn->query($sql);

  // Tableau contenant les données récupérées
  $locations = [];
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $locations[] = $row;
      }
  }
  $conn->close();
  ?>

  <script>
    // Fonction pour initialiser une carte pour chaque lieu
    function initMap(id, lat, lon) {
        var map = L.map(id).setView([lat, lon], 14); // Vue centrée sur le lieu

        // Ajout des tuiles de base (carte de fond)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Ajout des marqueurs
        L.marker([lat, lon]).addTo(map).bindPopup('<strong>' + id + '</strong>');  // Popup avec le nom
    }

    // Lieux avec leurs coordonnées
    var lieux = [
        { id: "Cirque d'Hiver Bouglione", lat: 48.8633, lon: 2.3675 },
        { id: "Le Palais des Congrès", lat: 48.8789, lon: 2.2833 },
        { id: "Église Saint-Julien le Pauvre", lat: 48.8519, lon: 2.3472 },
        { id: "Théâtre du Palais Royal", lat: 48.8661, lon: 2.3375 },
        { id: "Laurette Théâtre", lat: 48.8717, lon: 2.3681 },
        { id: "Bobino", lat: 48.8397, lon: 2.3231 }
    ];

    // Initialisation de chaque carte centrée sur le lieu correspondant
    lieux.forEach(function(lieu) {
        initMap(lieu.id, lieu.lat, lieu.lon);
    });

    // Ajout des marqueurs pour les lieux récupérés de la base de données
    var locations = <?php echo json_encode($locations); ?>;
    locations.forEach(function(location) {
        L.marker([location.latitude, location.longitude])
            .addTo(map)
            .bindPopup('<strong>' + location.name + '</strong>');
    });
  </script>

</body>
</html>
