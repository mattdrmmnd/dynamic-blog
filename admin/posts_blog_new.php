<?php
$pageTitle = 'ADMIN - New Blog Post';
$bodyClass = 'flex flex-col min-h-screen font-inter text-white';
$activePage = 'posts_blog';

require_once __DIR__ . '/../includes/auth.inc.php';
require_once __DIR__ . '/../includes/posts_model.inc.php';

$title = '';
$body = '';
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if ($_POST === []) {
        $errors['too_large'] = "The upload is too large (max 8 MB in total).";
        
    } else {

        csrf_verify();

        $title = trim($_POST["title"] ?? '');
        $body = trim($_POST["body"] ?? '');

        // Read status value. If it is missing then draft is the default
        // If the value is one of the two allowed words, it stays otherwise it's draft
        // true makes in_array use === strict comparison
        $status = $_POST["status"] ?? 'draft';
        $status = in_array($status, ['draft', 'published'], true) ? $status : 'draft';

        if ($status === 'published' && $body === '') {
            $errors["empty_body"] = "The body is empty.";
        }

        if ($title === '') {
            $errors["empty_title"] = "The title is empty.";
        }

        if (mb_strlen($title) > 255) {
            $errors["title_length"] = "The title is too long.";
        }
        
        $image = $_FILES["featured_image"] ?? null;
        $imageError = $image["error"] ?? UPLOAD_ERR_NO_FILE;

        if ($imageError === UPLOAD_ERR_NO_FILE) {
            // No image chosen: images are optional
        } elseif ($imageError === UPLOAD_ERR_INI_SIZE) {
            $errors["img_too_large"] = "The image is too large (max 2 MB).";
        } elseif ($imageError !== UPLOAD_ERR_OK) {
            $errors["upload_failed"] = "The image upload failed.";  
        }

        $hasImage = $imageError === UPLOAD_ERR_OK;

        if ($hasImage) {
            $mimeType = new finfo(FILEINFO_MIME_TYPE)->file($image["tmp_name"]);
            
            if (!in_array($mimeType, ['image/jpeg', 'image/png', 'image/webp'], true)) {
                $errors["image_type"] = "The image must be a JPG, PNG or WebP.";
            }

            // 2MB Image filesize
            if ($image["size"] > 2 * 1024 * 1024) {
                $errors["img_too_large"] = "The image is too large (max 2 MB).";   
            }    
        }

        if (!$errors) {
            require_once __DIR__ . '/../includes/dbh.inc.php'; 

            create_blog_post($pdo, (int) $_SESSION["user_id"], $title, $body, $status);

            $_SESSION["posts_message"] = $status === 'draft' ? 'Draft saved.' : 'Post published.';

            header('Location: ' . BASE_URL . 'admin/posts_blog.php');
            die();
        }  
    }       
}
    


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

                            <form action="<?= BASE_URL ?>admin/posts_blog_new.php" method="post" data-keep-alive="Your session has expired. Copy your post before saving." enctype="multipart/form-data" class="flex flex-col gap-3 tracking-wider">

                                <?php csrf_field(); ?>

                                <div class="flex justify-between items-start gap-4 min-h-10">
                                    <?php if ($errors): ?>
                                        
                                        <ul role="alert" class="text-red-400 font-semibold text-sm tracking-wider">
                                            <?php foreach ($errors as $error): ?>
                                                <li><?= htmlspecialchars($error) ?></li>
                                            <?php endforeach; ?>    
                                        </ul>
                                        
                                    <?php endif; ?>    
                       
                                    <button name="status" value="draft" class="ml-auto text-white hover:text-xlight-purple tracking-wider cursor-pointer">Save draft</button>  
                                </div> 

                                <!-- Title Field -->
                                <label for="title" class="font-medium text-gray-300">Title:</label>
                                <input type="text" id="title" name="title" placeholder="Enter article title..." value="<?= htmlspecialchars($title) ?>" class="w-full max-w-120 border border-amber-50 bg-white text-gray-500 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple">  

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
                                            class="border border-amber-50 bg-white text-gray-500 p-2 rounded-sm focus:outline-none focus:ring-1 focus:ring-xlight-purple resize-y w-full"><?= htmlspecialchars($body) ?></textarea>       
                                
                                

                                <div class="flex flex-row justify-center sm:justify-end items-center gap-5 mt-3">
                                    <button type="button" disabled class="text-white hover:text-xlight-purple tracking-wider cursor-pointer">Preview
                                    </button>  
                                    

                                    <button name="status" value="published" class="bg-light-purple hover:bg-dark-purple transition w-50 p-2 pb-3 rounded-full cursor-pointer tracking-wider">
                                        Publish
                                    </button>  
                                </div>  
                            </form>
                            
                            
                    </section>

                    
                    
                
            </main>

        </div>

    </div>

<?php require __DIR__ . '/../includes/footer.php'; ?>
