const salaries = document.querySelectorAll('.salary-number')
// const salary = salaries.map((item) => console.log(item))
salaries.forEach(salary => {

  const numberFormated = numeral(salary.textContent).format('$0,0')

  salary.textContent = numberFormated

})