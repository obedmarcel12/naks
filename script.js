window.addEventListener('scroll', () => {
  const nav = document.querySelector('.nav-two')
  if (window.scrollY > 50) nav.classList.add('scrolled')
  else nav.classList.remove('scrolled')
})
