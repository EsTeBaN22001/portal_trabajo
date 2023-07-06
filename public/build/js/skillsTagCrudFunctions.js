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
  const skillsContainer = document.querySelector('.skills')
  skillsContainer.appendChild(skill)

  // Añadir un input:hidden para enviar la matriz por post
  const hiddenInput = document.createElement('input')
  hiddenInput.type = 'hidden';
  hiddenInput.name = 'skills[]';
  hiddenInput.value = id;

  skillsContainer.appendChild(hiddenInput)

  // Agregar el evento de doble clic para eliminar la skill
  skill.addEventListener('dblclick', function() {
    removeSkill(skill, hiddenInput, id);
  });

}

function removeSkill(skillElement, hiddenInput, skillId) {
  // Eliminar el elemento del DOM
  skillElement.remove();

  // Eliminar el input:hidden del DOM
  hiddenInput.remove();

  // Eliminar el id de la skill del array
  const index = idSelectedSkills.indexOf(skillId);
  if (index !== -1) {
    idSelectedSkills.splice(index, 1);
  }
}