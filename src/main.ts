import './style.css'

// Close any open dropdown menu when clicking outside of it
// Add a listener to the whole page
document.addEventListener('click', (event) => {
  document.querySelectorAll<HTMLDetailsElement>('details.dropdown[open]').forEach((dropdown) => {

    // Checks if click was outside of the dropdown menu
    if (!dropdown.contains(event.target as Node)) {
      dropdown.open = false
    }
  })
})

// Show/hide password toggle: a button with data-password-toggle and
// aria-controls set to the password input's id
// ?? is called a nullish coalescing operator
document.querySelectorAll<HTMLButtonElement>('button[data-password-toggle]').forEach((button) => {
  const input = document.getElementById(button.getAttribute('aria-controls') ?? '') 
  if (!(input instanceof HTMLInputElement)) return // This is a Guard Clause

  // Once clicked, checks to see if input type is password
  // Toggles between text visibilty and hidden password
  button.addEventListener('click', () => {
    const show = input.type === 'password'
    input.type = show ? 'text' : 'password'
    
    // Toggles the text and what screen reader announces
    button.textContent = show ? 'Hide' : 'Show'
    button.setAttribute('aria-label', show ? 'Hide password' : 'Show password')
  })
})
// Locates the Delete button and its message
document.addEventListener('click', (event) => {
  if (!(event.target instanceof Element)) return // This is a Guard Clause
  const target = event.target.closest('[data-confirm]')

  if (target) {
    const message = target.getAttribute('data-confirm') ?? ''

    if (!confirm(message)) {
      event.preventDefault()
    }
  }
})


function keepAlive() {
  // This is a Guard Clause. It checks whether the keep-alive form is on the page you're viewing.
  const keepAliveForm = document.querySelector<HTMLFormElement>('form[data-keep-alive]')
  if (!keepAliveForm) return   // not on this page: do nothing  

  // everything below only runs on the new-post page

  let typed = false

  // The listener runs on every keystroke and sets the flag
  keepAliveForm.addEventListener('input', () => {
    typed = true 
  })
  setInterval(async () => {

    // Guard Clause
    if (!typed) return

    typed = false

    // await waits for an answer before proceeding
    // await only works inside a function marked async
    const response = await fetch(new URL('ping.php', keepAliveForm.action))

    if (response.status === 401) alert(keepAliveForm.getAttribute('data-keep-alive') ?? '')


  }, 5 * 60 * 1000)
}

keepAlive()

