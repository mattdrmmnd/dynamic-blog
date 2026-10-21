<?php
$pageTitle = 'ADMIN - Edit Current User';
$bodyClass = 'flex flex-col min-h-screen font-inter text-white';
$activePage = 'users';

require_once __DIR__ . '/../includes/auth.inc.php';

require __DIR__ . '/../includes/head.php';
?>

    <div class="flex-1 relative z-10 flex flex-col">

        <?php require __DIR__ . '/../includes/admin_header.php'; ?>

        <!-- Sidebar & Form -->
        <div class="flex flex-col sm:flex-row flex-1 max-w-5xl mx-auto w-full px-5 gap-6 pb-10">

            <?php require __DIR__ . '/../includes/admin_sidebar.php'; ?>

            <!-- Main content -->
            <main class="flex-1 min-w-0 mt-5">

                <div class="flex items-center justify-between mb-5">
                    <h1 class="font-bold text-lg tracking-wider">Edit - User</h1>
                    <a href="<?= BASE_URL ?>admin/users.php" class="inline-flex items-center gap-1 bg-dark-purple hover:bg-light-purple/80 tracking-wider transition-colors text-sm font-semibold px-4 py-2 rounded-sm">
                        <span aria-hidden="true">x</span> Close
                    </a>
                </div>

            

                    <!-- Form -->
                    <section class="flex flex-col gap-3 dark:bg-black/60 rounded-2xl p-7 overflow-x-auto">
                       

                            <form action="<?= BASE_URL ?>admin/users_edit_current.php" method="post" enctype="multipart/form-data" class="flex flex-col gap-3 tracking-wider">
                                <!-- Which user is being edited -->
                                <input type="hidden" name="id" value="1">

                                <!-- Username Field -->
                                <label for="username" class="font-medium text-gray-300">Username:</label>
                                <input type="text" id="username" name="username" value="mattdrmmnd" placeholder="Enter username..." autocomplete="username" class="w-full max-w-120 border border-amber-50 bg-white text-gray-500 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple">

                                <!-- Display Name Field -->
                                <label for="display_name" class="font-medium text-gray-300 mt-5">Display name:</label>
                                <input type="text" id="display_name" name="display_name" value="Matt D" placeholder="Enter display name..." class="w-full max-w-120 border border-amber-50 bg-white text-gray-500 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple">

                                <!-- Email Field -->
                                <label for="email" class="font-medium text-gray-300 mt-5">Email:</label>
                                <input type="email" id="email" name="email" value="matt@email.net" placeholder="Enter email..." autocomplete="email" class="w-full max-w-120 border border-amber-50 bg-white text-gray-500 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple">

                                <!-- Password Field -->
                                <label for="password" class="font-medium text-gray-300 mt-5">New password:</label>
                                
                                <div class="relative w-full max-w-120">
                                    <input type="password" id="password" name="password" placeholder="Enter password..." autocomplete="new-password" minlength="12" aria-describedby="password-hint" class="w-full border border-amber-50 bg-white text-gray-500 p-2 pr-16 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple [&::-ms-reveal]:hidden">
                                    <button type="button" data-password-toggle aria-controls="password" aria-label="Show password" class="absolute right-2 top-1/2 -translate-y-1/2 px-2 py-1 text-sm font-semibold text-dark-purple hover:text-light-purple transition-colors cursor-pointer">Show</button>
                                </div>
                                <p id="password-hint" class="text-xs text-gray-400">Leave blank to keep the current password.</p>

                                <!-- Avatar Upload Field -->
                                <label for="avatar" class="font-medium text-gray-300 mt-2">Choose an avatar:</label>

                                <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg, image/webp"
                                        class="self-start text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-sm file:border-0 file:text-sm file:font-semibold file:bg-gray-600 file:text-white file:hover:bg-gray-500 file:cursor-pointer file:transition-colors">                       

                                <div class="flex flex-row justify-center sm:justify-end items-center gap-5 mt-3">  
                                    <button type="submit" class="bg-light-purple hover:bg-dark-purple transition w-50 p-2 pb-3 rounded-full cursor-pointer tracking-wider">
                                        Update
                                    </button>  
                                </div> 
                            </form>
                            
                            
                    </section>

                    
                    
                
            </main>

        </div>

    </div>

<?php require __DIR__ . '/../includes/footer.php'; ?>
