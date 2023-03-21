const menu = document.querySelector('header nav .menu'),
      close = document.querySelector('nav .rigth .close'),
      rigth = document.querySelector('nav .rigth')

menu.addEventListener('click', () => {
    rigth.classList.add('active')
})

close.addEventListener('click', () => {
    rigth.classList.remove('active')
})