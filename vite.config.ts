import { defineConfig } from 'vite'
import { resolve } from 'node:path'
import { readdirSync } from 'node:fs'
import tailwindcss from '@tailwindcss/vite'

// Build every .html page in the root and admin/ folders, not just index.html
const htmlPages = (dir: string) =>
  readdirSync(resolve(__dirname, dir))
    .filter((file) => file.endsWith('.html'))
    .map((file) => resolve(__dirname, dir, file))

export default defineConfig({
  plugins: [
    tailwindcss(),
  ],
  build: {
    rollupOptions: {
      input: [...htmlPages('.'), ...htmlPages('admin')],
    },
  },
})
