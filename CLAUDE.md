# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

A personal blog ("Matt The Dev") with a public frontend and an admin CMS, built to learn the full web stack. It uses Vite + Tailwind CSS v4 and was designed in Figma. The site now lives in `C:\xampp\htdocs\dynamic-blog` and Apache serves it at http://localhost/dynamic-blog/. **Every page is now a `.php` file built from the shared `includes/`,** but they're still mockups with hardcoded content. A **MySQL backend is planned but not started**. The planned features are auth and protected content, tables for users/posts/categories/comments, and REST endpoints. The README tracks progress.

A stale copy of the repo is still in `C:\Users\jerse\Documents\github\dynamic-blog`. Work in the htdocs folder only.

## Commands

- `npm run build`: runs `tsc` (type-checks `src/` only) and then `vite build`, which compiles `src/` into `build/main.css` and `build/main.js`. Use it for a one-off build and to catch type errors before committing.
- `npm run watch`: `vite build --watch`. It rebuilds `build/` on every save in `src/`, but skips `tsc`. The user runs it while working, then reloads the page in Apache.
- `npm run dev`: Vite dev server at http://localhost:5173. It can't run PHP, so it's no longer useful for this site. Test in Apache instead.
- `npm run preview`: left over from the old `dist/` setup, not useful now.

`build/` is gitignored, so a fresh clone needs `npm install` and then `npm run build` before the PHP pages have any CSS or JS. There are no tests and no linter.

## Architecture

- **Multi-page site, no framework or router.**
  - Every page shares its head, header, sidebar and footer through `includes/`, so a shared markup change, like a sidebar link, is made once in the include.
  - Public pages are in the root: `index.php`, `post_writing.php`, `post_previews_*.php`. `writing.html` is a leftover stub. `about.html` is obsolete because its content moved to the home page, so it was never converted. Don't fix or update it.
  - Admin pages are in `admin/`.
- **`includes/`:**
  - `config.php` defines `BASE_URL` (`/dynamic-blog/`). Build every link and asset path from it (`<?= BASE_URL ?>public/images/…`) so it works from any folder, including `admin/`. If the site moves to another folder or the server root, change it only here.
  - `head.php` opens the page: doctype, `<head>`, `build/main.css`, `build/main.js` and `<body>`. Set `$pageTitle` and `$bodyClass` before requiring it.
  - `header.php` is the public header and nav. `footer.php` is the footer (with `<?= date('Y') ?>`) and closes `</body></html>`, so any page `<script>` goes before it (see `post_writing.php`).
  - `admin_header.php` is the logged-in admin header (logo and Logout). `admin_sidebar.php` is the admin nav. Set `$activePage` to the current section's key (`dashboard`, `posts_blog`, `posts_reading`, `featured_posts`, `users`, `requests`, `settings`) to highlight its link. Sub-pages use their parent's key, e.g. `users_add_new.php` uses `users`.
  - `auth_header.php` is the header for the logged-out pages (`login.php`, `request_access.php`). Set `$headerMessage` to the note shown top right.
  - Page pattern: set the variables, `require __DIR__ . '/includes/head.php'`, the page content with the header (and sidebar) includes, and `require …/footer.php` last. Admin pages use `__DIR__ . '/../includes/…'`. See `index.php` and `admin/users.php`.
- **[vite.config.ts](vite.config.ts)** has two modes:
  - **Build** (`build`/`watch`), the one that matters: the only input is `src/main.ts`. Output goes to `build/` with fixed names (`main.js`, `main.css`, no hashes), so PHP can link them directly. `base` is `/dynamic-blog/build/` so asset URLs inside the CSS resolve, and `publicDir` is off because PHP links `public/` directly. `emptyOutDir: true` wipes `build/` on every build, so never put anything else in it.
  - **Dev** (`npm run dev`): normal Vite serving, left over from the `.html` mockups. Only `about.html` and `writing.html` remain for it to serve.
- **[src/main.ts](src/main.ts) is the only entry point**, and every page loads it through `build/main.js` in `head.php`. It imports the CSS and holds small shared behavior. Right now that's closing an open `details.dropdown` menu when the user clicks outside it, and the show/hide password toggle: a `<button type="button" data-password-toggle aria-controls="<input id>">` placed next to a password input.
  - New JS goes in `main.ts` or in a new `src/*.ts` file imported from it, so it lands in the single bundle with no new `<script>` tags. Page-specific code should check for its elements first and do nothing when they're missing.
- **[src/style.css](src/style.css)** is the Tailwind v4 entry point:
  - Tailwind scans the project, `.php` files included, for classes. `@source "../admin"` adds the admin pages explicitly.
  - New CSS goes here, or in a new file `@import`ed right after `@import "tailwindcss"`.
  - The `@theme` block defines the custom tokens used throughout the markup: the colors `xlight-purple`, `light-purple`, `dark-purple`, `darkest-purple`, and `mango`; the `font-inter` font; the `bg-check` check-mark image used by checked checkboxes and radios (`checked:bg-check`); and the extra breakpoints `xmid`, `mid`, and `mid1000`.
  - Images used from CSS must be theme tokens pointing at `../public/images/…`, like `--background-image-check`, so Vite rewrites the URL during a build (it copies large files into `build/` and inlines small ones). An arbitrary class like `bg-[url('/images/…')]` breaks under Apache.
  - It also defines the `.button` component, the `grid-cols-autofit` utility, and the plain-CSS Category dropdown.
- **Category dropdown pattern:** `<details class="dropdown">`, with `<summary class="dropdown-button">` as the toggle and `.dropdown-menu` holding checkboxes named `items[]`. The checkbox values are still placeholders (`item1`…`item10`).
- **Static assets** live in `public/` (`public/images/`, favicons). Every page links them as `<?= BASE_URL ?>public/…`.

## Admin pages and the PHP backend

- The admin pages are mockups of the CMS: login, request access, dashboard, blog and reading post lists, new-post forms, featured posts, users, access requests, and settings.
- Some links and form actions already point at `admin/` handlers that don't exist yet, so they 404: `logout.php`, `posts_blog_delete.php`, `posts_reading_delete.php`, `users_delete.php`, `requests_delete.php`, `posts_blog_edit.php?id=N`, `posts_reading_edit.php?id=N`.
- The other forms (new posts, users, featured posts, settings) submit back to their own `.php` page, and `login.php` and `request_access.php` use `action=""`. None of them handle `$_POST` yet.
- **New-post forms** (`posts_blog_new.php`, `posts_reading_new.php`):
  - The submit button must stay inside the `<form>`.
  - Every field needs a unique `name`, since that's the `$_POST` key.
  - The blog form uses `enctype="multipart/form-data"` for its featured image upload.

## Do not change

- **The Edit link in `admin/users.php` points to `users_edit_current.php` on purpose,** for local testing. Leave it alone unless asked.

## Backend checklist

Already done: build output in `build/`, the Vite `base`, `BASE_URL`, the shared includes, every page converted to `.php`, sidebar links, consistent image paths, and the automatic footer year.

When the user works on the backend, or asks what's left, remind them of this checklist:

- **Form handling:** write the missing handlers listed above, and handle `$_POST` in the pages that submit to themselves.
- **User password handling:** hash every password with `password_hash()` before saving it, and never store plain text. On the add-user page, check the 12-character minimum in PHP too, because the browser check can be bypassed. On the edit-user page the password field is optional: only hash and update the password when `$_POST['password']` isn't empty, and leave the existing hash alone otherwise.
- **Help email:** the "Need help?" link in `admin/login.php` is a `mailto:` to the placeholder address `matt@email.com`. Swap in the real address.
- **Merge add/edit pages:** combine `users_add_new.php` and `users_edit_current.php` into one `users_form.php`. With no `?id` it's the Add page (empty fields, password required, "Add user" button, `INSERT`). With `?id=N` it loads that user and becomes the Edit page (filled-in fields, optional password, hidden `id`, "Update" button, `UPDATE`). Escape every printed value with `htmlspecialchars()`, and check the user is a logged-in admin before saving, because the hidden `id` can be changed in the browser. If the `if ($isEdit)` checks pile up, put the form markup in a shared include instead. Do the same for the blog and reading post new/edit pages.
- **User Edit link:** in `admin/users.php`, the Edit link points to `users_edit_current.php` for local testing only. Switch it to the PHP edit page with the user's id (e.g. `users_form.php?id=1`).
- **Access request "Add user" link:** in `admin/requests.php`, each row's "Add user" link points to `users_add_new.php`. Switch it to the PHP add-user page with the request id (e.g. `users_form.php?request_id=1`) so the name and email are filled in, and delete the request once the user is created.

## When deploying to production

When the user says they're ready to put the site on a remote host (e.g. Bluehost), remind them of this checklist:

- **Paths:** `BASE_URL` in `includes/config.php` and `base: '/dynamic-blog/build/'` in `vite.config.ts` both assume the site is at `/dynamic-blog/`. At the domain root they become `/` and `/build/`. Change both, then run `npm run build`, because the base is baked into `build/main.css`. Offer to make them switch automatically between localhost and production.
- **What to upload:** the root `.php` pages, `admin/`, `includes/`, `public/` and `build/`. Leave out `node_modules/`, `src/`, `package.json`, `package-lock.json`, `vite.config.ts`, `tsconfig.json`, `.git/`, `.claude/`, `CLAUDE.md`, `README.md`, `about.html` and `writing.html`. With cPanel Git deployment, `build/` still needs a separate upload because it's gitignored.
- **Server setup:** pick a PHP version in cPanel that matches or is newer than XAMPP's. Create the MySQL database and user, and import the tables with phpMyAdmin. Keep the database credentials in a gitignored config file. Turn on SSL and redirect to `https`. Turn `display_errors` off and log errors instead.
- **Linux differences:** file names are case-sensitive. Block direct access to `includes/` (with `.htaccess`, or move it above `public_html`). Make the featured-image upload folder writable.
- **Admin:** don't deploy `admin/` until sessions, login and a login check at the top of every admin page exist, along with the password handling above. Until then, deploy only the public pages.
