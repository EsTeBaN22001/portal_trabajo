if(document.querySelector('.menu-icon-container')){

  const menuButton = document.querySelector('.menu-icon-container')
  const aside = document.querySelector('.aside')
  
  if(window.innerWidth < 768){
    aside.classList.add('hide')
  }

  menuButton.addEventListener('click', function(){
    
    aside.classList.toggle('hide')

  })

}