# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

A personal blog ("Matt Likes Stacks") with a public frontend and an admin CMS, built to learn the full web stack. It is currently **static HTML only**: Vite + Tailwind CSS v4, designed in Figma. A **PHP + MySQL backend is planned but not started**. The planned features are auth and protected content, tables for users/posts/categories/comments, and REST endpoints. The README tracks progress: the client frontend is done, and the admin CMS frontend is in progress.

## Commands

- `npm run dev`: Vite dev server at http://localhost:5173 (the user usually has this running already)
- `npm run build`: runs `tsc` (type-checks `src/` only) and then `vite build` into `dist/`
- `npm run preview`: serves the built `dist/`

There are no tests and no linter.

## Architecture

- **Multi-page site, no framework or router.** Each page is a standalone `.html` file with its own full copy of the header, nav, and footer. A shared markup change, like a sidebar link, has to be repeated in every page that has it.
  - Public pages are in the root: `index.html`, `about.html`, `post_writing.html`, `post_previews_*.html`. `writing.html` is a leftover stub. `about.html` is obsolete because its content moved to `index.html`, so don't fix or update it.
  - Admin pages are in `admin/`.
- **[vite.config.ts](vite.config.ts) builds every `.html` file in the root and `admin/`** automatically. New pages in those folders need no config change. Pages in any other folder must be added to it.
- **[src/main.ts](src/main.ts) is the only script, and every page loads it** with `<script type="module" src="/src/main.ts">`. It imports the CSS and holds small shared behavior. Right now that's closing an open `details.dropdown` menu when the user clicks outside it.
- **[src/style.css](src/style.css)** is the Tailwind v4 entry point:
  - `@source "../admin"` makes Tailwind scan the admin pages for classes.
  - The `@theme` block defines the custom tokens used throughout the markup: the colors `xlight-purple`, `light-purple`, `dark-purple`, `darkest-purple`, and `mango`; the `font-inter` font; and the extra breakpoints `xmid`, `mid`, and `mid1000`.
  - It also defines the `.button` component, the `grid-cols-autofit` utility, and the plain-CSS Category dropdown.
- **Category dropdown pattern:** `<details class="dropdown">`, with `<summary class="dropdown-button">` as the toggle and `.dropdown-menu` holding checkboxes named `items[]`. The checkbox values are still placeholders (`item1`…`item10`).
- **Static assets** live in `public/` (`public/images/`, favicons). Pages currently reference them three ways: `public/images/…`, `/public/images/…` and `../public/images/…`.

## Admin pages and the future PHP backend

- The admin pages are mockups of the CMS: login, request access, dashboard, blog and reading post lists, new-post forms, and featured posts.
- Some form actions already point at `.php` handlers that don't exist yet: `logout.php`, `posts_blog_delete.php`, `posts_reading_delete.php`.
- The sidebar links to `requests.html` and `settings.html`, which don't exist yet.
- **New-post forms** (`posts_blog_new.html`, `posts_reading_new.html`):
  - Each form submits back to its own `.html` page for now. **When the PHP backend exists, switch each `action` to the `.php` handler.**
  - The submit button must stay inside the `<form>`.
  - Every field needs a unique `name`, since that's the `$_POST` key.
  - The blog form uses `enctype="multipart/form-data"` for its featured image upload.

## Do not change

- **The hardcoded `http://localhost:5173/admin/...` links in the admin sidebars are intentional.** The user uses them for local testing until the site moves to `htdocs` for PHP. Leave them alone unless asked.

## When moving to htdocs

When the user says they're ready to move the site to `htdocs`, remind them of this checklist:

- **Build output:** `build.outDir` isn't set, so builds go to `dist/`.
  - Decide whether to keep `dist/` and copy it over, or set `outDir` to the htdocs folder. If outputting directly, `emptyOutDir: true` wipes that folder on every build, so keep PHP files out of it.
- **`base`:** set `base: '/<subfolder>/'` in the Vite config if the site is served from a subfolder rather than the server root.
- **Sidebar links:** replace the hardcoded `http://localhost:5173/...` links with relative paths.
- **Form actions:** switch the `.html` form actions to their `.php` handlers.
- **Image paths:** make the mixed `public/images/`, `/public/images/` and `../public/images/` references consistent.
- **Footer year:** the year in every page footer (`Matt Likes Stacks | 2026`) is hardcoded. Once pages are PHP, replace it with `<?= date('Y') ?>` so it updates automatically.
