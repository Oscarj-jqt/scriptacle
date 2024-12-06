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
