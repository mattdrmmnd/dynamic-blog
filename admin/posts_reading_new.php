<?php
$pageTitle = 'ADMIN - New Reading Post';
$bodyClass = 'flex flex-col min-h-screen font-inter text-white';
$activePage = 'posts_reading';
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
                    <h1 class="font-bold text-lg tracking-wider">New - Reading Post</h1>
                    <a href="<?= BASE_URL ?>admin/posts_reading.php" class="inline-flex items-center gap-1 bg-dark-purple hover:bg-light-purple/80 tracking-wider transition-colors text-sm font-semibold px-4 py-2 rounded-sm">
                        <span aria-hidden="true">x</span> Close
                    </a>
                </div>

            

                    <!-- Form -->
                    <section class="flex flex-col gap-3 dark:bg-black/60 rounded-2xl p-7 overflow-x-auto">
                        <form action="<?= BASE_URL ?>admin/posts_reading_new.php" method="post" class="flex flex-col gap-2 tracking-wider">

                            <!-- Title Field -->
                            <label for="title" class="font-medium text-gray-300">Title:</label>
                            <input type="text" id="title" name="title" placeholder="Enter article title..." class="w-120 border border-amber-50 bg-white text-gray-500 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple">  


                            <details class="dropdown mt-3 w-33">
                                    <summary class="dropdown-button">
                                        Category <span class="dropdown-arrow" aria-hidden="true">▼</span>
                                    </summary>

                                    <div class="dropdown-menu">

                                        <label>
                                            <input type="checkbox" name="items[]" value="item1">
                                            Item 1
                                        </label>

                                        <label>
                                            <input type="checkbox" name="items[]" value="item2">
                                            Item 2
                                        </label>

                                        <label>
                                            <input type="checkbox" name="items[]" value="item3">
                                            Item 3
                                        </label>

                                        <label>
                                            <input type="checkbox" name="items[]" value="item4">
                                            Item 4
                                        </label>

                                        <label>
                                            <input type="checkbox" name="items[]" value="item5">
                                            Item 5
                                        </label>

                                        <label>
                                            <input type="checkbox" name="items[]" value="item6">
                                            Item 6
                                        </label>

                                        <label>
                                            <input type="checkbox" name="items[]" value="item7">
                                            Item 7
                                        </label>

                                        <label>
                                            <input type="checkbox" name="items[]" value="item8">
                                            Item 8
                                        </label>

                                        <label>
                                            <input type="checkbox" name="items[]" value="item9">
                                            Item 9
                                        </label>

                                        <label>
                                            <input type="checkbox" name="items[]" value="item10">
                                            Item 10
                                        </label>

                                    </div>
                            </details>

                            <!-- Excerpt Text Field -->
                            <label for="excerpt" class="font-medium text-gray-300 mt-2">
                                Excerpt Content:
                            </label>
                            <textarea id="excerpt" name="excerpt" rows="5"
                            placeholder="Write your excerpt content here..." 
                                        class="border border-amber-50 bg-white text-gray-700 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple resize-y w-full"></textarea>

                            <!-- Blog Body Text Field -->
                            <label for="body" class="font-medium text-gray-300 mt-2">
                                Body Content:
                            </label>
                            <textarea id="body" name="body" rows="10" 
                            placeholder="Write your blog post content here..." 
                                        class="border border-amber-50 bg-white text-gray-700 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple resize-y w-full"></textarea>

                            <div class="flex flex-row justify-center sm:justify-end items-center gap-5 mt-3">
                                <a href="" class="text-white hover:text-xlight-purple tracking-wider">Preview Post</a>
                                <button type="submit" class="bg-light-purple hover:bg-dark-purple transition w-50 p-2 pb-3 rounded-full cursor-pointer tracking-wider">Post</button>
                            </div>
                        </form>

                    </section>
                    
                
            </main>

        </div>

    </div>

<?php require __DIR__ . '/../includes/footer.php'; ?>
