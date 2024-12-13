// Initialisation de la carte avec une vue centrée sur Paris
var map = L.map('map').setView([48.8633, 2.3675], 12);  

// Ajout de la couche de tuiles (carte de fond)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

// Liste des lieux avec leurs coordonnées
var lieux = [
    { name: "Cirque d'Hiver Bouglione", lat: 48.8633, lon: 2.3675 },
    { name: "Le Palais des Congrès", lat: 48.8789, lon: 2.2833 },
    { name: "Église Saint-Julien le Pauvre", lat: 48.8519, lon: 2.3472 },
    { name: "Théâtre du Palais Royal", lat: 48.8661, lon: 2.3375 },
    { name: "Laurette Théâtre", lat: 48.8717, lon: 2.3681 },
    { name: "Bobino", lat: 48.8397, lon: 2.3231 }
];

 // Ajout des marqueurs pour chaque lieu
 lieux.forEach(function(lieu) {
    L.marker([lieu.lat, lieu.lon])
        .addTo(map)
        .bindPopup(lieu.name);
});