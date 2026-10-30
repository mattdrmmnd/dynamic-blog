<?php
$pageTitle = 'ADMIN - New Blog Post';
$bodyClass = 'flex flex-col min-h-screen font-inter text-white';
$activePage = 'posts_blog';

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
                    <h1 class="font-bold text-lg tracking-wider">New - Blog Post</h1>
                    <a href="<?= BASE_URL ?>admin/posts_blog.php" class="inline-flex items-center gap-1 bg-dark-purple hover:bg-light-purple/80 tracking-wider transition-colors text-sm font-semibold px-4 py-2 rounded-sm">
                        <span aria-hidden="true">x</span> Close
                    </a>
                </div>

            

                    <!-- Form -->
                    <section class="flex flex-col gap-3 bg-black/50 rounded-2xl p-7 overflow-x-auto">
                       

                            <form action="<?= BASE_URL ?>admin/posts_blog_new.php" method="post" enctype="multipart/form-data" class="flex flex-col gap-3 tracking-wider">
                                <!-- Title Field -->
                                <label for="title" class="font-medium text-gray-300">Title:</label>
                                <input type="text" id="title" name="title" placeholder="Enter article title..." class="w-full max-w-120 border border-amber-50 bg-white text-gray-500 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple">  

                                <!-- Image Upload Field -->
                                <label for="image-upload" class="font-medium text-gray-300 mt-2">Choose a featured image:</label>

                                <input type="file" id="image-upload" name="featured_image" accept="image/png, image/jpeg, image/webp"
                                        class="self-start text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-sm file:border-0 file:text-sm file:font-semibold file:bg-gray-600 file:text-white file:hover:bg-gray-500 file:cursor-pointer file:transition-colors">

                                <!-- Image Alt Text Field -->
                                <label for="featured-image-alt" class="font-medium text-gray-300 mt-2">Image alt text:</label>
                                <input type="text" id="featured-image-alt" name="featured_image_alt" maxlength="255" placeholder="Describe the image for screen readers..." class="w-full max-w-120 border border-amber-50 bg-white text-gray-500 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple">

                                <!-- Image Caption Field -->
                                <label for="featured-image-caption" class="font-medium text-gray-300 mt-2">Image caption (optional):</label>
                                <input type="text" id="featured-image-caption" name="featured_image_caption" maxlength="255" placeholder="Shown below the image..." class="w-full max-w-120 border border-amber-50 bg-white text-gray-500 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple">

                                <!-- Blog Body Text Field -->
                                <label for="body" class="font-medium text-gray-300 mt-2">Body Content:</label>
                                <textarea id="body" name="body" rows="10" placeholder="Write your blog post content here..." 
                                            class="border border-amber-50 bg-white text-gray-500 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple resize-y w-full"></textarea>
                                

                                <div class="flex flex-row justify-center sm:justify-end items-center gap-5 mt-3">
                                    <a href="" class="text-white hover:text-xlight-purple tracking-wider">Preview Post
                                    </a>  
                                    <button type="submit" class="bg-light-purple hover:bg-dark-purple transition w-50 p-2 pb-3 rounded-full cursor-pointer tracking-wider">
                                        Post
                                    </button>  
                                </div>  
                            </form>
                            
                            
                    </section>

                    
                    
                
            </main>

        </div>

    </div>

<?php require __DIR__ . '/../includes/footer.php'; ?>
