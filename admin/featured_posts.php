<?php
$pageTitle = 'ADMIN - Featured Posts';
$bodyClass = 'flex flex-col min-h-screen font-inter text-white';
$activePage = 'featured_posts';
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
                    <h1 class="font-bold text-lg tracking-wider">Featured Posts</h1>
                    <a href="<?= BASE_URL ?>admin/dashboard.php" class="inline-flex items-center gap-1 bg-dark-purple hover:bg-light-purple/80 tracking-wider transition-colors text-sm font-semibold px-4 py-2 rounded-sm">
                        <span aria-hidden="true">x</span> Close
                    </a>
                </div>

            

                    <!-- Form -->
                    <section class="flex flex-col gap-3 dark:bg-black/60 rounded-2xl p-7 overflow-x-auto">

                        <!-- Search form -->
                        <form action="<?= BASE_URL ?>admin/featured_posts.php" method="get" role="search" class="flex flex-col gap-3 tracking-wider">
                            <label for="search" class="font-medium text-gray-300 tracking-wider">Search posts:</label>
                            <div class="flex flex-col sm:flex-row gap-2">
                                <input type="text" id="search" name="search" placeholder="Enter article title or category..." class="max-w-60 border border-amber-50 bg-white text-gray-500 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple">
                                <button type="submit" class="inline-flex items-center gap-1 bg-gray-600 hover:bg-gray-500 transition-colors text-sm font-semibold px-4 py-2 rounded-sm w-20">Search</button>
                            </div>
                        </form>

    

                        <!-- Featured post form: search results + slots -->
                        <form action="<?= BASE_URL ?>admin/featured_posts.php" method="post" class="flex flex-col gap-3 tracking-wider">

                        <!-- Search Results -->
                            <fieldset class="mt-8">
                                <legend class="tracking-wider">Search results:</legend>
                                <label class="flex flex-row items-center mt-4 gap-2 text-sm tracking-wider cursor-pointer">
                                    <input type="radio" name="post_id" value="12" required class="h-5 w-5 shrink-0 appearance-none rounded-full border border-white bg-white bg-center bg-no-repeat bg-contain checked:bg-light-purple cursor-pointer checked:border-0 checked:bg-check focus-visible:outline-2 focus-visible:outline-offset-1 focus-visible:outline-xlight-purple">
                                    Let's talk about code!<span class="text-xlight-purple"> Sept 19, 2026</span>
                                </label>

                                <!-- next result: same name, different value -->

                                <label class="flex flex-row items-center mt-4 gap-2 text-sm tracking-wider cursor-pointer">
                                    <input type="radio" name="post_id" value="14" class="h-5 w-5 shrink-0 appearance-none rounded-full border border-white bg-white bg-center bg-no-repeat bg-contain checked:bg-light-purple cursor-pointer checked:border-0 checked:bg-check focus-visible:outline-2 focus-visible:outline-offset-1 focus-visible:outline-xlight-purple">
                                    Welcome to my blog!<span class="text-xlight-purple"> Sept 12, 2026</span>
                                </label>
                                
                            </fieldset>

                        

                        <!-- Slots -->
                        <fieldset class="mt-8">
                            <legend>Make a selection:</legend>

                            <div class="flex flex-col mt-4 gap-3">

                                <label class="block">
                                    <input type="radio" name="slot" value="1" class="peer sr-only" required>
                                    <span class="block border border-light-purple hover:border-dark-purple peer-checked:bg-dark-purple peer-focus-visible:ring-2 peer-focus-visible:ring-xlight-purple transition w-50 p-2 pb-3 rounded-sm cursor-pointer tracking-wider text-center">
                                        Add to slot-1
                                    </span>
                                </label>

                                <label class="block">
                                    <input type="radio" name="slot" value="2" class="peer sr-only">
                                    <span class="block border border-light-purple hover:border-dark-purple peer-checked:bg-dark-purple peer-focus-visible:ring-2 peer-focus-visible:ring-xlight-purple transition w-50 p-2 pb-3 rounded-sm cursor-pointer tracking-wider text-center">
                                        Add to slot-2
                                    </span>
                                </label>

                                <label class="block">
                                    <input type="radio" name="slot" value="3" class="peer sr-only">
                                    <span class="block border border-light-purple hover:border-dark-purple peer-checked:bg-dark-purple peer-focus-visible:ring-2 peer-focus-visible:ring-xlight-purple transition w-50 p-2 pb-3 rounded-sm cursor-pointer tracking-wider text-center">
                                        Add to slot-3
                                    </span>
                                </label>

                            </div>

                            <label for="preview_text" class="block mt-6 mb-2">Preview text:</label>
                            <input type="text" id="preview_text" name="preview_text" placeholder="Enter preview text"
                                class="w-full max-w-120 border border-amber-50 bg-white text-gray-500 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple">
                        </fieldset>
                        
                        <div class="flex flex-row justify-center sm:justify-end items-center gap-5 mt-3">
                            <button type="submit" class="bg-light-purple hover:bg-dark-purple transition w-50 p-2 pb-3 rounded-full cursor-pointer tracking-wider">Submit</button>
                        </div>
                      </form>      
                    </section>

                    
                    
                
            </main>

        </div>

    </div>

<?php require __DIR__ . '/../includes/footer.php'; ?>
