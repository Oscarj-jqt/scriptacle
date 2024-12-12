// Initialisation de la carte avec une vue centrée sur Paris
var map = L.map('map').setView([48.8633, 2.3675], 12);  

// Ajout de la couche de tuiles (carte de fond)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

// Liste des lieux avec leurs coordonnées
var lieux = [
    { name: "Lieu 1", lat: 48.8633, lon: 2.3675 },
    { name: "Lieu 2", lat: 48.8789, lon: 2.2833 },
    { name: "Lieu 3", lat: 48.8519, lon: 2.3472 },
    { name: "Lieu 4", lat: 48.8661, lon: 2.3375 },
    { name: "Lieu 5", lat: 48.8717, lon: 2.3681 },
    { name: "Lieu 6", lat: 48.8397, lon: 2.3231 }
];

 // Ajout des marqueurs pour chaque lieu
 lieux.forEach(function(lieu) {
    L.marker([lieu.lat, lieu.lon])
        .addTo(map)
        .bindPopup(lieu.name);
});