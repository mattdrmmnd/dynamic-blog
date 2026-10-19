<?php
// Admin sidebar navigation
// Set $activePage before including this file to the current page's key below
// (e.g. 'users'). That link gets the highlighted style and aria-current="page"
require_once __DIR__ . '/config.php';

$activePage = $activePage ?? '';

// Prints the href, class and aria-current attributes for one sidebar link
$navLink = function (string $page) use ($activePage): string {
    $href = 'href="' . BASE_URL . 'admin/' . $page . '.php"';

    if ($page === $activePage) {
        return $href . ' aria-current="page" class="block p-2 rounded-sm bg-light-purple/40 font-semibold whitespace-nowrap"';
    }
    return $href . ' class="block p-2 rounded-sm hover:bg-light-purple/40 transition-colors whitespace-nowrap"';
};
?>
            <!-- Sidebar -->
            <aside aria-label="Admin navigation" class="sm:w-48 shrink-0 mt-5 dark:bg-black/40 rounded-2xl p-4 h-fit">
                <nav>
                    <ul class="flex flex-row sm:flex-col gap-2 tracking-wider text-sm overflow-x-auto sm:overflow-visible">
                        <li>
                            <a <?= $navLink('dashboard') ?>>
                                Overview
                            </a>
                        </li>
                        <li>
                            <a <?= $navLink('posts_blog') ?>>
                                Posts - Blog
                            </a>
                        </li>
                        <li>
                            <a <?= $navLink('posts_reading') ?>>
                                Posts - Reading
                            </a>
                        </li>
                        <li>
                            <!--Stays open while one of its pages is the current page-->
                            <details class="group"<?= $activePage === 'featured_posts' ? ' open' : '' ?>>
                                <summary class="flex items-center p-2 rounded-sm hover:bg-light-purple/40 transition-colors whitespace-nowrap cursor-pointer list-none">
                                    Home
                                    <span class="ml-2 transition-transform group-open:rotate-45" aria-hidden="true">+</span>
                                </summary>
                                <ul class="flex flex-col gap-1 mt-1 sm:ml-4">
                                    <li>
                                        <a <?= $navLink('featured_posts') ?>>
                                            Featured Posts
                                        </a>
                                    </li>
                                </ul>
                            </details>
                        </li>
                        <li>
                            <a <?= $navLink('users') ?>>
                                Users
                            </a>
                        </li>
                        <li>
                            <a <?= $navLink('requests') ?>>
                                Access Requests
                            </a>
                        </li>
                        <li>
                            <a <?= $navLink('settings') ?>>
                                Settings
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>
