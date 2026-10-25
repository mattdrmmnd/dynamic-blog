<?php
$pageTitle = 'ADMIN - Dashboard';
$bodyClass = 'flex flex-col min-h-screen font-inter text-white';
$activePage = 'dashboard';

require_once __DIR__ . '/../includes/login_view.inc.php';
require_once __DIR__ . '/../includes/auth.inc.php';

require __DIR__ . '/../includes/head.php';
?>

    <!--Footer - flex-1 used in conjuction with body flex to push content downward-->
    <!--footer must be under this div-->
    <div class="flex-1 relative z-10 flex flex-col">

        <?php require __DIR__ . '/../includes/admin_header.php'; ?>

        <div class="flex flex-col sm:flex-row flex-1 max-w-5xl mx-auto w-full px-5 gap-6 pb-10">

            <?php require __DIR__ . '/../includes/admin_sidebar.php'; ?>

            <!-- Main content -->
            <main class="flex-1 min-w-0 mt-5">

                <div>
                    <h1 class="font-bold text-lg tracking-wider mb-4">
                        Welcome Back <span class="text-orange-200"><?= htmlspecialchars($_SESSION["user_username"]) ?></span> !
                    </h1>
                </div>

                <section class="bg-black/50 rounded-2xl p-7 mb-6">
                    <h2 class="font-normal text-lg tracking-wider mb-4">Overview</h2>
                    <p class="text-sm text-gray-400">Dashboard content goes here.</p>
                </section>

                <section class="bg-black/50 rounded-2xl p-7">
                    <h2 class="font-normal text-lg tracking-wider mb-4">Recent Activity</h2>
                    <p class="text-sm text-gray-400">Another section goes here.</p>
                </section>

            </main>

        </div>

    </div>

<?php require __DIR__ . '/../includes/footer.php'; ?>
