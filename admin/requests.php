<?php
$pageTitle = 'ADMIN - Access Requests';
$bodyClass = 'flex flex-col min-h-screen font-inter text-white';
$activePage = 'requests';

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
                    <h1 class="font-bold text-lg tracking-wider">Access Requests</h1>
                </section>

                <section class="dark:bg-black/60 rounded-2xl p-7 overflow-x-auto">
                    <table class="w-full text-sm text-left border-collapse tracking-wider">
                        <caption class="sr-only">List of access requests</caption>
                        <thead>
                            <tr class="text-gray-400 border-b border-white/10">
                                <th scope="col" class="pb-3 pr-4 font-normal">Name</th>
                                <th scope="col" class="pb-3 pr-4 font-normal">Email</th>
                                <th scope="col" class="pb-3 font-normal">Date requested</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            <tr>
                                <td class="py-3 pr-4">
                                    <p>Person</p>
                                    <div class="flex gap-2 text-xs mt-1">
                                        <a href="<?= BASE_URL ?>admin/users_add_new.php" class="text-light-purple hover:text-white transition-colors" aria-label="Add user: Person">Add user</a>
                                        <span aria-hidden="true" class="text-gray-500">|</span>
                                        <form action="<?= BASE_URL ?>admin/requests_delete.php" method="post" class="inline">
                                            <input type="hidden" name="id" value="1">
                                            <button type="submit" class="text-red-400 hover:text-red-300 transition-colors" aria-label="Delete request: Person">Delete</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="py-3 pr-4">person@hotmail.com</td>
                                <td class="py-3"><time datetime="2026-10-17T10:07">2026/10/17 at 10:07 am</time></td>
                            </tr>
                        </tbody>
                    </table>
                </section>

            </main>

        </div>
    </div>

<?php require __DIR__ . '/../includes/footer.php'; ?>
