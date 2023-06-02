// Verificar si se está registrando una EMPRESA o un TRABAJADOR

if(document.querySelector('.login-form-container')){

  const businessRadio = document.querySelector('#business')
  const workerRadio = document.querySelector('#worker')


  businessRadio.addEventListener('change', changeType)
  workerRadio.addEventListener('change', changeType)


  function changeType(){
    // Campos a mostrar según la selección
    const workerInputs = document.querySelectorAll('.worker-input')

    if(workerRadio.checked){

      workerInputs.forEach(input => {
        input.classList.remove('hide')
      })
      
    }else{

      workerInputs.forEach(input => {
        input.classList.add('hide')
      })

    }
  }

}