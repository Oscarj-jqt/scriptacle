toggleCategories.addEventListener('click', (e) => {
    e.preventDefault();
    if (categoriesMenu.style.display === 'none' || categoriesMenu.style.display === '') {
        categoriesMenu.style.display = 'block';
    } else {
        categoriesMenu.style.display = 'none';
    }
});

document.addEventListener('click', (e) => {
    if (!e.target.closest('#toggleCategories') && !e.target.closest('#categoriesMenu')) {
        categoriesMenu.style.display = 'none';
    }
});

toggleArrondissement.addEventListener('click', (e) => {
    e.preventDefault();
    if (arrondissementMenu.style.display === 'none' || arrondissementMenu.style.display === '') {
        arrondissementMenu.style.display = 'block';
    } else {
        arrondissementMenu.style.display = 'none';
    }
});

document.addEventListener('click', (e) => {
    if (!e.target.closest('#toggleArrondissement') && !e.target.closest('#arrondissementMenu')) {
        arrondissementMenu.style.display = 'none';
    }
});


toggleArtiste.addEventListener('click', (e)=> {
    e.preventDefault;
    if (artiste.style.display === 'none' || artiste.style.display === '') {
        artiste.style.display = 'block';
        toggleArtiste.textContent = 'Afficher moins';
    } else {
        artiste.style.display = 'none';
        
    }
});

document.addEventListener('click', (e) => {
    if (!e.target.closest('#toggleArtiste') && !e.target.closest('#artiste')) {
        artiste.style.display = 'none';
    }
});
