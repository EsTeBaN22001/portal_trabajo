const searchInput = document.querySelector('.search-input');

searchInput.addEventListener('input', function () {
  searchJobs();
});

function searchJobs() {
  const searchValue = searchInput.value.toLowerCase();
  const jobCards = document.querySelectorAll('.card');

  jobCards.forEach(function (jobCard) {
    const jobTitleElement = jobCard.querySelector('.title');
    
    // Elimina caracteres de nueva línea y divide el título en palabras
    const jobTitle = jobTitleElement.textContent.replace(/\n/g, '').toLowerCase();
    const titleWords = jobTitle.trim().split(' ');

    // Verifica si el cuadro de búsqueda está vacío o si alguna palabra del título comienza con la búsqueda
    const isMatch = searchValue === '' || titleWords.some(function (word) {
      return word.startsWith(searchValue);
    });

    if (isMatch) {
      jobCard.style.display = 'flex';
    } else {
      jobCard.style.display = 'none';
    }
  });
}
