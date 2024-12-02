// Initialisation de la carte avec une vue centrée sur Paris
var map = L.map('map').setView([48.8566, 2.3522], 12);

// Ajout des tuiles de base (carte de fond)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Vérifier si les données de localisation sont disponibles
if (typeof locations !== "undefined") {
    // Ajout de marqueurs pour chaque lieu
    locations.forEach(function(location) {
        L.marker([location.latitude, location.longitude])
            .addTo(map)
            .bindPopup(`<strong>${location.name}</strong>`);
    });
} else {
    console.error("Aucune donnée de localisation disponible.");
}
