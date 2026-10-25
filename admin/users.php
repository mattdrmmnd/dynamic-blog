<?php
$pageTitle = 'ADMIN - Users';
$bodyClass = 'flex flex-col min-h-screen font-inter text-white';
$activePage = 'users';

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
                    <h1 class="font-bold text-lg tracking-wider">Users</h1>
                    <a href="<?= BASE_URL ?>admin/users_add_new.php" class="inline-flex items-center gap-1 bg-dark-purple hover:bg-light-purple/80 transition-colors text-sm font-semibold px-4 py-2 rounded-sm tracking-wider">
                        <span aria-hidden="true">+</span> Add User
                    </a>
                </section>

                <section class="bg-black/50 rounded-2xl p-7 overflow-x-auto">
                    <table class="w-full text-sm text-left border-collapse tracking-wider">
                        <caption class="sr-only">List of users</caption>
                        <thead>
                            <tr class="text-gray-400 border-b border-white/10">
                                <th scope="col" class="pb-3 pr-4 font-normal">User</th>
                                <th scope="col" class="pb-3 pr-4 font-normal">Display name</th>
                                <th scope="col" class="pb-3 pr-4 font-normal">Email</th>
                                <th scope="col" class="pb-3 font-normal">Joined</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            <tr>
                                <td class="py-3 pr-4">
                                    <p>mattdrmmnd</p>
                                    <div class="flex gap-2 text-xs mt-1">
                                        <a href="<?= BASE_URL ?>admin/users_edit_current.php" class="text-light-purple hover:text-white transition-colors">Edit</a>
                                        <span aria-hidden="true" class="text-gray-500">|</span>
                                        <form action="<?= BASE_URL ?>admin/users_delete.php" method="post" class="inline">
                                            <input type="hidden" name="id" value="1">
                                            <button type="submit" class="text-red-400 hover:text-red-300 transition-colors" aria-label="Delete user: mattdrmmnd">Delete user</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="py-3 pr-4">Matt D</td>
                                <td class="py-3 pr-4">matt@email.net</td>
                                <td class="py-3"><time datetime="2026-08-20T21:20">2026/08/20 at 9:20 pm</time></td>
                            </tr>
                        </tbody>
                    </table>
                </section>

            </main>

        </div>
    </div>

<?php require __DIR__ . '/../includes/footer.php'; ?>
