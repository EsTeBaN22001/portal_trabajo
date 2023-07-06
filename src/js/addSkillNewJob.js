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