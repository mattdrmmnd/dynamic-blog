import './style.css'

// Close any open dropdown menu when clicking outside of it
document.addEventListener('click', (event) => {
  document.querySelectorAll<HTMLDetailsElement>('details.dropdown[open]').forEach((dropdown) => {
    if (!dropdown.contains(event.target as Node)) {
      dropdown.open = false
    }
  })
})

// Show/hide password toggle: a button with data-password-toggle and
// aria-controls set to the password input's id
document.querySelectorAll<HTMLButtonElement>('button[data-password-toggle]').forEach((button) => {
  const input = document.getElementById(button.getAttribute('aria-controls') ?? '')
  if (!(input instanceof HTMLInputElement)) return

  button.addEventListener('click', () => {
    const show = input.type === 'password'
    input.type = show ? 'text' : 'password'
    button.textContent = show ? 'Hide' : 'Show'
    button.setAttribute('aria-label', show ? 'Hide password' : 'Show password')
  })
})
