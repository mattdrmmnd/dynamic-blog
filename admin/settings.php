<?php
$pageTitle = 'ADMIN - Settings';
$bodyClass = 'flex flex-col min-h-screen font-inter text-white';
$activePage = 'settings';

require_once __DIR__ . '/../includes/auth.inc.php';

require __DIR__ . '/../includes/head.php';
?>

    <div class="flex-1 relative z-10 flex flex-col">

        <?php require __DIR__ . '/../includes/admin_header.php'; ?>

        <!-- Sidebar & Settings -->
        <div class="flex flex-col sm:flex-row flex-1 max-w-5xl mx-auto w-full px-5 gap-6 pb-10">

            <?php require __DIR__ . '/../includes/admin_sidebar.php'; ?>

            <!-- Main content -->
            <main class="flex-1 min-w-0 mt-5 flex flex-col gap-6">

                <h1 class="font-bold text-lg tracking-wider">Settings</h1>

                <!-- Site info -->
                <section aria-labelledby="site-heading" class="flex flex-col gap-3 bg-black/50 rounded-2xl p-7 overflow-x-auto">
                    <h2 id="site-heading" class="font-bold tracking-wider text-orange-200">Site info</h2>

                    <form action="<?= BASE_URL ?>admin/settings.php" method="post" class="flex flex-col gap-3 tracking-wider">
                        <label for="site_title" class="font-medium text-gray-300">Site title:</label>
                        <input type="text" id="site_title" name="site_title" value="Matt The Dev" placeholder="Enter site title..." required class="w-full max-w-120 border border-amber-50 bg-white text-gray-500 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple">

                        <label for="site_tagline" class="font-medium text-gray-300 mt-5">Tagline:</label>
                        <input type="text" id="site_tagline" name="site_tagline" value="" placeholder="Enter tagline..." class="w-full max-w-120 border border-amber-50 bg-white text-gray-500 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple">

                        <label for="help_email" class="font-medium text-gray-300 mt-5">Help email:</label>
                        <input type="email" id="help_email" name="help_email" value="matt@email.com" placeholder="Enter help email..." autocomplete="email" aria-describedby="help-email-hint" class="w-full max-w-120 border border-amber-50 bg-white text-gray-500 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple">
                        <p id="help-email-hint" class="text-xs text-gray-400">Shown as the "Need help?" link on the login page.</p>

                        <div class="flex flex-row justify-center sm:justify-end items-center gap-5 mt-3">
                            <button type="submit" class="bg-light-purple hover:bg-dark-purple transition w-50 p-2 pb-3 rounded-full cursor-pointer tracking-wider">
                                Save site info
                            </button>
                        </div>
                    </form>
                </section>

                <!-- Account -->
                <section aria-labelledby="account-heading" class="flex flex-col gap-3 bg-black/50 rounded-2xl p-7 overflow-x-auto">
                    <h2 id="account-heading" class="font-bold tracking-wider text-orange-200">Your account</h2>

                    <form action="<?= BASE_URL ?>admin/settings.php" method="post" class="flex flex-col gap-3 tracking-wider">
                        <label for="display_name" class="font-medium text-gray-300">Display name:</label>
                        <input type="text" id="display_name" name="display_name" value="Matt D" placeholder="Enter display name..." required class="w-full max-w-120 border border-amber-50 bg-white text-gray-500 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple">

                        <label for="account_email" class="font-medium text-gray-300 mt-5">Email:</label>
                        <input type="email" id="account_email" name="account_email" value="matt@email.net" placeholder="Enter email..." autocomplete="email" required class="w-full max-w-120 border border-amber-50 bg-white text-gray-500 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple">

                        <label for="password" class="font-medium text-gray-300 mt-5">New password:</label>
                        <div class="relative w-full max-w-120">
                            <input type="password" id="password" name="password" placeholder="Enter password..." autocomplete="new-password" minlength="12" aria-describedby="password-hint" class="w-full border border-amber-50 bg-white text-gray-500 p-2 pr-16 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple [&::-ms-reveal]:hidden">
                            <button type="button" data-password-toggle aria-controls="password" aria-label="Show password" class="absolute right-2 top-1/2 -translate-y-1/2 px-2 py-1 text-sm font-semibold text-dark-purple hover:text-light-purple transition-colors cursor-pointer">Show</button>
                        </div>
                        <p id="password-hint" class="text-xs text-gray-400">Leave blank to keep the current password. Minimum 12 characters.</p>

                        <div class="flex flex-row justify-center sm:justify-end items-center gap-5 mt-3">
                            <button type="submit" class="bg-light-purple hover:bg-dark-purple transition w-50 p-2 pb-3 rounded-full cursor-pointer tracking-wider">
                                Save account
                            </button>
                        </div>
                    </form>
                </section>

                <!-- Post defaults -->
                <section aria-labelledby="posts-heading" class="flex flex-col gap-3 bg-black/50 rounded-2xl p-7 overflow-x-auto">
                    <h2 id="posts-heading" class="font-bold tracking-wider text-orange-200">Post defaults</h2>

                    <form action="<?= BASE_URL ?>admin/settings.php" method="post" class="flex flex-col gap-3 tracking-wider">
                        <label for="posts_per_page" class="font-medium text-gray-300">Posts per page:</label>
                        <input type="number" id="posts_per_page" name="posts_per_page" value="10" min="1" max="50" required class="w-full max-w-32 border border-amber-50 bg-white text-gray-500 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple">

                        <label for="default_status" class="font-medium text-gray-300 mt-5">Default status for new posts:</label>
                        <select id="default_status" name="default_status" class="w-full max-w-120 border border-amber-50 bg-white text-gray-500 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple">
                            <option value="draft" selected>Draft</option>
                            <option value="published">Published</option>
                        </select>

                        <div class="flex flex-row justify-center sm:justify-end items-center gap-5 mt-3">
                            <button type="submit" class="bg-light-purple hover:bg-dark-purple transition w-50 p-2 pb-3 rounded-full cursor-pointer tracking-wider">
                                Save post defaults
                            </button>
                        </div>
                    </form>
                </section>

            </main>

        </div>

    </div>

<?php require __DIR__ . '/../includes/footer.php'; ?>
