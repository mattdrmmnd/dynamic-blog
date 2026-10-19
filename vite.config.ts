import { defineConfig } from 'vite'
import { resolve } from 'node:path'
import tailwindcss from '@tailwindcss/vite'

// npm run dev: Vite serves the static .html mockups at http://localhost:5173
// npm run build / npm run watch: Vite only builds the CSS and JS into build/,
// and Apache serves the PHP pages at http://localhost/dynamic-blog/
export default defineConfig(({ command }) => ({
  plugins: [
    tailwindcss(),
  ],
  // Asset URLs inside the built CSS (like the hero background) point at build/
  base: command === 'build' ? '/dynamic-blog/build/' : '/',
  // PHP pages link to public/ directly, so don't copy it into build/
  publicDir: command === 'build' ? false : 'public',
  build: {
    outDir: 'build',
    // build/ only holds build output, never put PHP files in it
    emptyOutDir: true,
    rollupOptions: {
      input: resolve(import.meta.dirname, 'src/main.ts'),
      // Fixed file names so PHP pages can link build/main.css and build/main.js
      output: {
        entryFileNames: '[name].js',
        assetFileNames: '[name][extname]',
      },
    },
  },
}))
