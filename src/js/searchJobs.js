const searchInput = document.querySelector('.search-input');

searchInput.addEventListener('input', function () {
  searchJobs();
});

function searchJobs() {
  const searchValue = searchInput.value.toLowerCase();
  const jobCards = document.querySelectorAll('.card');

  jobCards.forEach(function (jobCard) {
    const jobTitle = jobCard.querySelector('.title').textContent.toLowerCase();
    if (jobTitle.includes(searchValue)) {
      jobCard.style.display = 'flex';
    } else {
      jobCard.style.display = 'none';
    }
  });
}