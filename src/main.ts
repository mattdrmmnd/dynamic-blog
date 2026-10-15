import './style.css'

// Close any open dropdown menu when clicking outside of it
document.addEventListener('click', (event) => {
  document.querySelectorAll<HTMLDetailsElement>('details.dropdown[open]').forEach((dropdown) => {
    if (!dropdown.contains(event.target as Node)) {
      dropdown.open = false
    }
  })
})
