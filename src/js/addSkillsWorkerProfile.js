// Array que contiene los id's de las skills del usuario
let idSelectedSkills = []

// Obtener las skills actuales del usuario
const skillsContainer = document.querySelector('.skills')
const skillsDOM = skillsContainer.querySelectorAll('.skill')
const skillsInputHidden = skillsContainer.querySelectorAll('.skill-input-hidden')

// Agregar el id de las skills actuales al arreglo que contiene todas las skills
skillsInputHidden.forEach( input => { idSelectedSkills.push(input.value) })

// Agregar el evento de doble click para borrar la skill
skillsDOM.forEach( skill => {
  skill.addEventListener('dblclick', ()=>{
  const hiddenInput = skill.nextElementSibling
  removeSkill(skill, hiddenInput, hiddenInput.value);
  })
})


const selectSkills = document.querySelector('.select-skills')

selectSkills.addEventListener('change', function(){

  const skillId = selectSkills.value

  const skillName = selectSkills.options[selectSkills.selectedIndex].textContent

  // Verificar si ya existe la skill que se quiere agregar
  if(!idSelectedSkills.includes(skillId)){
    addSkillTag(skillId, skillName)
  }

  selectSkills.value = ""

})