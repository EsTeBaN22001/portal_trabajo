// Array que contiene los id's de las skills seleccionadas
let idSelectedSkills = []

const selectSkills = document.querySelector('.select-skills')

selectSkills.addEventListener('change', function(){

  const skillId = selectSkills.value

  const skillName = selectSkills.options[selectSkills.selectedIndex].textContent

  // Verificar si ya existe la skill que se quiere agregar
  if(!idSelectedSkills.includes(skillId)){
    addSkillTag(skillId, skillName)
  }

})

function addSkillTag(id, name){
  // Añadir el id de la skill al array con las skills seleccionadas
  idSelectedSkills.push(id)

  // Crear el DOM
  const skill = document.createElement('div')
  skill.classList.add('skill')

  const skillName = document.createElement('p')
  skillName.textContent = name

  // Añadir el texto al elemento skill
  skill.appendChild(skillName)

  // Añadir la skill al contenedor de todas las skills
  const skillsContainer = document.querySelector('.skills-container')
  skillsContainer.appendChild(skill)

  // Añadir un input:hidden para enviar la matriz por post
  const hiddenInput = document.createElement('input')
  hiddenInput.type = 'hidden';
  hiddenInput.name = 'skills[]';
  hiddenInput.value = id;

  skillsContainer.appendChild(hiddenInput)  

}