# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

A personal blog ("Matt The Dev") with a public frontend and an admin CMS, built to learn the full web stack. It uses Vite + Tailwind CSS v4 and was designed in Figma. The site now lives in `C:\xampp\htdocs\dynamic-blog` and Apache serves it at http://localhost/dynamic-blog/. **Every page is now a `.php` file built from the shared `includes/`.** The **MySQL backend has started**. The login system is done: database connection, `users` table, login, logout, auth guard, session timeouts, CSRF tokens and login attempt limiting (see "Login and sessions" below). Everything else (posts, users, requests, settings) is still a mockup with hardcoded content. The planned features still to build are tables for posts/categories/comments, the admin form handlers, and small JSON endpoints for features that don't reload the page (e.g. draft autosave). A full REST API isn't planned, because the pages are server-rendered. The README tracks progress.

**The user is learning PHP and types the backend code by hand for practice.** For PHP work, explain the plan and review what they write rather than writing it for them, unless they ask. Markup, CSS and docs changes are fine to make directly when asked.

The old copy in `C:\Users\jerse\Documents\github\dynamic-blog` was deleted on 2026-10-23. This htdocs folder is the only copy of the repo.

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
  - `head.php` opens the page: doctype, `<head>`, the Inter and Material Symbols Google Fonts, `build/main.css`, `build/main.js` and `<body>`. Set `$pageTitle` and `$bodyClass` before requiring it. It also resumes the session, but only when the browser already has a session cookie, so ordinary visitors get no cookie. Material Symbols only downloads the icons listed in `icon_names=` in its URL, so new icons must be added there (comma-separated, alphabetical) or they show as plain text.
  - `header.php` is the public header and nav. When logged in it shows a Dashboard link and a "Logout, <username>" button instead of Login. `footer.php` is the footer (with `<?= date('Y') ?>`) and closes `</body></html>`, so any page `<script>` goes before it (see `post_writing.php`).
  - `admin_header.php` is the logged-in admin header (logo, a Home link to the public site, and "Logout, <username>"). `admin_sidebar.php` is the admin nav. Set `$activePage` to the current section's key (`dashboard`, `posts_blog`, `posts_reading`, `featured_posts`, `users`, `requests`, `settings`) to highlight its link. Sub-pages use their parent's key, e.g. `users_add_new.php` uses `users`.
  - `auth_header.php` is the header for the logged-out pages (`login.php`, `request_access.php`). Set `$headerMessage` to the note shown top right.
  - Page pattern: set the variables, `require __DIR__ . '/includes/head.php'`, the page content with the header (and sidebar) includes, and `require …/footer.php` last. Admin pages use `__DIR__ . '/../includes/…'` and require `auth.inc.php` before `head.php`. See `index.php` and `admin/users.php`.
  - Always start include paths with `__DIR__`. A bare relative path like `'includes/config.php'` resolves from the page the browser opened, not from the file that contains the `require`.
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

## Login and sessions

- **Database:** MySQL database `dynamicblog` with two tables so far:
  - `users`: `id`, `username` (unique), `pwd` (`password_hash()` output, `VARCHAR(255)`), `email` (unique), `created_at` (defaults to `CURRENT_TIMESTAMP`). There's no signup; the admin user was inserted by hand with a hash made by `password_hash()`.
  - `login_attempts`: `id`, `ip` (`VARCHAR(45)`), `username`, `attempted_at` (defaults to `CURRENT_TIMESTAMP`), with an index on `(ip, username, attempted_at)`. One row per failed login.
- **`includes/dbh.inc.php`** connects with PDO (`utf8mb4`, exceptions on, `FETCH_ASSOC` by default) and creates `$pdo`. It holds the credentials, so it's **gitignored**. `dbh.inc.example.php` is the committed copy with blank values.
- **Login** follows a tutorial-style MVC split:
  - `admin/login.php` is the form. It logs in by **username**, with fields `username`, `pwd` and the `remember` checkbox, and posts to `includes/login.inc.php`. It redirects to the dashboard if already logged in.
  - `login.inc.php` is the handler, in this order:
    1. POST only, then the CSRF check.
    2. The empty-field check.
    3. **The lockout check:** 5 or more failed attempts from this IP for this username in the last 15 minutes redirects with "Too many login attempts" before the password is checked.
    4. The credential checks.
    5. On failure, it records an attempt (wrong credentials only), sets `$_SESSION["errors_login"]` and redirects back.
    6. On success, it clears this IP's attempts, regenerates the session ID and the CSRF token, and sets `user_id`, `user_username`, `last_regeneration`, `login_time`, `last_activity` and `remember`.
  - The lockout counts per IP and username together, so someone who knows the username can't lock the real user out from another IP. Old rows aren't deleted on a timer; they just stop counting once they're older than 15 minutes, and a successful login deletes them. Times come from MySQL (`NOW()`, `CURRENT_TIMESTAMP`), never PHP's `time()`, so the two clocks can't disagree.
  - `login_model.inc.php` holds the prepared-statement queries (`get_user()`, `recent_attempts()`, `failed_attempt()`, `clear_attempts()`), `login_contr.inc.php` the checks, and `login_view.inc.php` the output (`check_login_errors()`, `output_username()`).
  - Both credential failures show the same "Incorrect login info." message on purpose.
- **`includes/config.session.inc.php`** is loaded on every page that has a session. In order, it:
  1. Sets strict, cookie-only sessions with `samesite Lax`, `secure` and `httponly` cookies.
  2. Sets `gc_maxlifetime` to 4 hours.
  3. Starts the session.
  4. Regenerates the ID every 30 minutes.
  5. Checks the timeout: if `last_activity` is older than the limit, it calls `session_unset()`. The limit is 4 hours with `remember`, 30 minutes without. Both are **inactivity** timers, not a fixed cap.
  6. Creates the CSRF token if it's missing. This must stay after the timeout check, which wipes it.
  7. Re-sends the cookie with a 4-hour expiry when `remember` is set.
- **`includes/auth.inc.php`** is the auth guard. It redirects to the login page unless `$_SESSION["user_id"]` is set. Every admin page except `login.php` and `request_access.php` requires it before `head.php`.
- **`admin/logout.php`** is POST only with a CSRF check. It clears the session, deletes the cookie, destroys the session and redirects to login. Any other request just redirects.
- **`includes/csrf.inc.php`** (loaded by `config.session.inc.php`) has three functions:
  - `csrf_field()` prints the hidden token input. Put it in every POST form.
  - `csrf_verify()` stops with a 403 on a bad token. Call it at the top of every POST handler.
  - `csrf_is_valid()` returns true or false. `login.inc.php` uses it so it can redirect back with a message instead.
- Always follow `header('Location: …')` with `die()` or `exit`.

## Admin pages and the PHP backend

- Apart from the login system, the admin pages are mockups of the CMS: dashboard, blog and reading post lists, new-post forms, featured posts, users, access requests, request access and settings.
- Some links and form actions already point at `admin/` handlers that don't exist yet, so they 404: `posts_blog_delete.php`, `posts_reading_delete.php`, `users_delete.php`, `requests_delete.php`, `posts_blog_edit.php?id=N`, `posts_reading_edit.php?id=N`.
- The other forms (new posts, users, featured posts, settings) submit back to their own `.php` page, and `request_access.php` uses `action=""`. None of them handle `$_POST` yet, and none have `csrf_field()` yet.
- **New-post forms** (`posts_blog_new.php`, `posts_reading_new.php`):
  - The submit button must stay inside the `<form>`.
  - Every field needs a unique `name`, since that's the `$_POST` key.
  - The blog form uses `enctype="multipart/form-data"` for its featured image upload.

## Do not change

- **The Edit link in `admin/users.php` points to `users_edit_current.php` on purpose,** for local testing. Leave it alone unless asked.

## Backend checklist

Already done: build output in `build/`, the Vite `base`, `BASE_URL`, the shared includes, every page converted to `.php`, sidebar links, consistent image paths, the automatic footer year, and the login system (database connection, `users` table, login, logout, auth guard, "Keep me logged in", session timeouts, CSRF on the login and logout forms, login attempt limiting).

When the user works on the backend, or asks what's left, remind them of this checklist:

- **Optional `login_attempts` cleanup:** rows from IPs that never log in successfully stay forever. A `DELETE … WHERE attempted_at < NOW() - INTERVAL 1 DAY` in `failed_attempt()` would keep the table small.
- **Form handling:** write the missing handlers listed above, and handle `$_POST` in the pages that submit to themselves. Every POST form gets `csrf_field()`, and every handler starts with `csrf_verify()`. Use prepared statements for every query.
- **Drafts:** when the new-post forms start saving, add autosave or a keep-alive. Typing doesn't count as activity, so a long writing session can time out and lose the post on Save.
- **User password handling:** hash every password with `password_hash()` before saving it, and never store plain text. On the add-user page, check the 12-character minimum in PHP too, because the browser check can be bypassed. On the edit-user page the password field is optional: only hash and update the password when `$_POST['password']` isn't empty, and leave the existing hash alone otherwise.
- **Help email:** the "Need help?" link in `admin/login.php` is a `mailto:` to the placeholder address `matt@email.com`. Swap in the real address.
- **Merge add/edit pages:** combine `users_add_new.php` and `users_edit_current.php` into one `users_form.php`. With no `?id` it's the Add page (empty fields, password required, "Add user" button, `INSERT`). With `?id=N` it loads that user and becomes the Edit page (filled-in fields, optional password, hidden `id`, "Update" button, `UPDATE`). Escape every printed value with `htmlspecialchars()`, and check the user is a logged-in admin before saving, because the hidden `id` can be changed in the browser. If the `if ($isEdit)` checks pile up, put the form markup in a shared include instead. Do the same for the blog and reading post new/edit pages.
- **User Edit link:** in `admin/users.php`, the Edit link points to `users_edit_current.php` for local testing only. Switch it to the PHP edit page with the user's id (e.g. `users_form.php?id=1`).
- **Access request "Add user" link:** in `admin/requests.php`, each row's "Add user" link points to `users_add_new.php`. Switch it to the PHP add-user page with the request id (e.g. `users_form.php?request_id=1`) so the name and email are filled in, and delete the request once the user is created.

## When deploying to production

When the user says they're ready to put the site on a remote host (e.g. Bluehost), remind them of this checklist:

- **Paths:** `BASE_URL` in `includes/config.php` and `base: '/dynamic-blog/build/'` in `vite.config.ts` both assume the site is at `/dynamic-blog/`. At the domain root they become `/` and `/build/`. Change both, then run `npm run build`, because the base is baked into `build/main.css`. Offer to make them switch automatically between localhost and production.
- **What to upload:** the root `.php` pages, `admin/`, `includes/`, `public/` and `build/`. Leave out `node_modules/`, `src/`, `package.json`, `package-lock.json`, `vite.config.ts`, `tsconfig.json`, `.git/`, `.claude/`, `CLAUDE.md`, `README.md`, `about.html` and `writing.html`. With cPanel Git deployment, `build/` still needs a separate upload because it's gitignored.
- **Server setup:** pick a PHP version in cPanel that matches or is newer than XAMPP's. Create the MySQL database and user, and import the tables with phpMyAdmin. The database name will likely get a cPanel account prefix. `includes/dbh.inc.php` is gitignored, so create it on the server from `dbh.inc.example.php` with the production credentials. Turn on SSL and redirect to `https`, which the `secure` session cookie requires. Turn `display_errors` off and log errors instead.
- **Linux differences:** file names are case-sensitive. Block direct access to `includes/` (with `.htaccess`, or move it above `public_html`). Make the featured-image upload folder writable.
- **Admin:** sessions, login, the auth guard, CSRF and login attempt limiting exist now. Before deploying `admin/`, also have https, blocked access to `includes/`, and the password handling above. Import both tables, `users` and `login_attempts`. Until then, deploy only the public pages.
