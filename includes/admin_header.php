<?php require_once __DIR__ . '/config.php'; ?>
        <header class="max-w-5xl mx-auto px-5 py-3 w-full flex items-center justify-between">
            <a href="<?= BASE_URL ?>admin/dashboard.php"><img class="h-10" src="<?= BASE_URL ?>public/images/logo.svg" alt="Matt The Dev Logo" /></a>

            <div class="mb-2 sm:mt-2 flex items-center gap-2">
                
            <a class="tracking-wider text-xs hover:text-xlight-purple transition-colors" href="<?= BASE_URL ?>">Home</a>

            <form action="<?= BASE_URL ?>admin/logout.php" method="post">
                <button type="submit" class="uppercase tracking-wider text-xs bg-black p-2 rounded-sm hover:bg-dark-purple transition-colors">Logout, <span class="text-orange-200 font-semibold"><?= htmlspecialchars($_SESSION["user_username"]) ?></span></button>
            </form>
            </div>
            
        </header>
