const dates = document.querySelectorAll('.date-number')

dates.forEach(date => {

  moment.locale('es')

  date.textContent = moment(date.textContent, 'YYYY-MM-DD HH:mm:ss').fromNow()

})