// Verificar si se está registrando una EMPRESA o un ALUMNO

if(document.querySelector('.login-form-container')){

  const empresaRadio = document.querySelector('#empresa')
  const alumnoRadio = document.querySelector('#alumno')


  empresaRadio.addEventListener('change', changeType)
  alumnoRadio.addEventListener('change', changeType)


  function changeType(){
    // Campos a mostrar según la selección
    const alumnoInputs = document.querySelectorAll('.alumno-input')

    if(alumnoRadio.checked){

      alumnoInputs.forEach(input => {
        input.classList.remove('hide')
      })
      
    }else{

      alumnoInputs.forEach(input => {
        input.classList.add('hide')
      })

    }
  }

}