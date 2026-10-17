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
  if (!(input instanceof HTMLInputElement)) return

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
