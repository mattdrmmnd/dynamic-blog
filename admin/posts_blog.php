<?php
$pageTitle = 'ADMIN - Blog Posts';
$bodyClass = 'flex flex-col min-h-screen font-inter text-white';
$activePage = 'posts_blog';

require_once __DIR__ . '/../includes/auth.inc.php';

require __DIR__ . '/../includes/head.php';
?>

    <div class="flex-1 relative z-10 flex flex-col">

        <?php require __DIR__ . '/../includes/admin_header.php'; ?>

        <div class="flex flex-col sm:flex-row flex-1 max-w-5xl mx-auto w-full px-5 gap-6 pb-10">

            <?php require __DIR__ . '/../includes/admin_sidebar.php'; ?>

            <!-- Main content -->
            <main class="flex-1 min-w-0 mt-5">

                

                <section class="flex items-center justify-between mb-5">
                    <h1 class="font-bold text-lg tracking-wider">Posts - Blog</h1>
                    <a href="<?= BASE_URL ?>admin/posts_blog_new.php" class="inline-flex items-center gap-1 bg-dark-purple hover:bg-light-purple/80 transition-colors text-sm font-semibold px-4 py-2 rounded-sm tracking-wider">
                        <span aria-hidden="true">+</span> Add Post
                    </a>
                </section>

                <section class="dark:bg-black/60 rounded-2xl p-7 overflow-x-auto">
                    <table class="w-full text-sm text-left border-collapse tracking-wider">
                        <caption class="sr-only">List of blog posts</caption>
                        <thead>
                            <tr class="text-gray-400 border-b border-white/10">
                                <th scope="col" class="pb-3 pr-4 font-normal">Title</th>
                                <th scope="col" class="pb-3 pr-4 font-normal">Author</th>
                                <th scope="col" class="pb-3 pr-4 font-normal">Category</th>
                                <th scope="col" class="pb-3 font-normal">Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            <tr>
                                <td class="py-3 pr-4">
                                    <p>My first post!</p>
                                    <div class="flex gap-2 text-xs mt-1">
                                        <a href="<?= BASE_URL ?>admin/posts_blog_edit.php?id=1" class="text-light-purple hover:text-white transition-colors">Edit</a>
                                        <span aria-hidden="true" class="text-gray-500">|</span>
                                        <form action="<?= BASE_URL ?>admin/posts_blog_delete.php" method="post" class="inline">
                                            <input type="hidden" name="id" value="1">
                                            <button type="submit" class="text-red-400 hover:text-red-300 transition-colors" aria-label="Trash: My first post!">Trash</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="py-3 pr-4">Matt D</td>
                                <td class="py-3 pr-4">Resources</td>
                                <td class="py-3">
                                    <p>Published</p>
                                    <p class="text-xs text-gray-400">2026/08/20 at 9:20 pm</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-3 pr-4">
                                    <p>Second Post</p>
                                    <div class="flex gap-2 text-xs mt-1">
                                        <a href="<?= BASE_URL ?>admin/posts_blog_edit.php?id=2" class="text-light-purple hover:text-white transition-colors">Edit</a>
                                        <span aria-hidden="true" class="text-gray-500">|</span>
                                        <form action="<?= BASE_URL ?>admin/posts_blog_delete.php" method="post" class="inline">
                                            <input type="hidden" name="id" value="2">
                                            <button type="submit" class="text-red-400 hover:text-red-300 transition-colors" aria-label="Trash: Second Post">Trash</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="py-3 pr-4">Matt D</td>
                                <td class="py-3 pr-4">Funny</td>
                                <td class="py-3">
                                    <p>Published</p>
                                    <p class="text-xs text-gray-400">2026/08/20 at 9:20 pm</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-3 pr-4">
                                    <p>The third post you need to...</p>
                                    <div class="flex gap-2 text-xs mt-1">
                                        <a href="<?= BASE_URL ?>admin/posts_blog_edit.php?id=3" class="text-light-purple hover:text-white transition-colors">Edit</a>
                                        <span aria-hidden="true" class="text-gray-500">|</span>
                                        <form action="<?= BASE_URL ?>admin/posts_blog_delete.php" method="post" class="inline">
                                            <input type="hidden" name="id" value="3">
                                            <button type="submit" class="text-red-400 hover:text-red-300 transition-colors" aria-label="Trash: The third post you need to...">Trash</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="py-3 pr-4">Matt D</td>
                                <td class="py-3 pr-4">Frameworks</td>
                                <td class="py-3">
                                    <p>Published</p>
                                    <p class="text-xs text-gray-400">2026/08/20 at 9:20 pm</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-3 pr-4">
                                    <p>Okay one more I promise</p>
                                    <div class="flex gap-2 text-xs mt-1">
                                        <a href="<?= BASE_URL ?>admin/posts_blog_edit.php?id=4" class="text-light-purple hover:text-white transition-colors">Edit</a>
                                        <span aria-hidden="true" class="text-gray-500">|</span>
                                        <form action="<?= BASE_URL ?>admin/posts_blog_delete.php" method="post" class="inline">
                                            <input type="hidden" name="id" value="4">
                                            <button type="submit" class="text-red-400 hover:text-red-300 transition-colors" aria-label="Trash: Okay one more I promise">Trash</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="py-3 pr-4">Matt D</td>
                                <td class="py-3 pr-4">Resources</td>
                                <td class="py-3">
                                    <p>Published</p>
                                    <p class="text-xs text-gray-400">2026/08/20 at 9:20 pm</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <nav aria-label="Pagination" class="flex justify-center mt-20 pb-10">
                    <ul class="flex items-stretch divide-x divide-light-purple overflow-hidden rounded-md border border-light-purple text-white text-sm sm:text-base">

                    <li>
                        <a href="?page=1" class="flex h-10 sm:h-12 items-center gap-2 px-2 sm:px-4 hover:bg-purple-900/40">
                        <svg class="h-4 w-4 sm:h-5 sm:w-5 text-light-purple" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M15 5l-7 7 7 7" />
                        </svg>
                        <span class="hidden sm:inline">Prev.</span>
                        </a>
                    </li>

                    <li>
                        <a href="?page=1" aria-current="page" class="flex h-10 w-10 sm:h-12 sm:w-12 items-center justify-center bg-light-purple/40">1</a>
                    </li>
                    <li>
                        <a href="?page=2" class="flex h-10 w-10 sm:h-12 sm:w-12 items-center justify-center hover:bg-light-purple/40">2</a>
                    </li>
                    <li class="hidden sm:block">
                        <a href="?page=3" class="flex h-12 w-12 items-center justify-center hover:bg-light-purple/40">3</a>
                    </li>
                    <li class="hidden sm:block">
                        <span class="flex h-12 w-12 items-center justify-center" aria-hidden="true">&hellip;</span>
                    </li>
                    <li class="hidden sm:block">
                        <a href="?page=7" class="flex h-12 w-12 items-center justify-center hover:bg-light-purple/40">7</a>
                    </li>

                    <li>
                        <a href="?page=2" class="flex h-10 sm:h-12 items-center gap-2 px-2 sm:px-4 hover:bg-light-purple/40">
                        <span class="hidden sm:inline">Next</span>
                        <svg class="h-4 w-4 sm:h-5 sm:w-5 text-light-purple" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M9 5l7 7-7 7" />
                        </svg>
                        </a>
                    </li>

                    </ul>
                </nav>

            </main>

        </div>
    </div>

<?php require __DIR__ . '/../includes/footer.php'; ?>
