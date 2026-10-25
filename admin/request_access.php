<?php
$pageTitle = 'ADMIN - Request Access';
$bodyClass = 'home flex flex-col min-h-screen bg-cover bg-center bg-fixed font-inter text-white';
$headerMessage = 'Request access to get started !';

require __DIR__ . '/../includes/head.php';
?>

     <!--To Top Gradient for background-->
    <div class="fixed inset-0 top-[30vh] bg-linear-to-t from-[#0C0C0C] from-50% to-transparent to-100%"></div>


    <!--Footer - flex-1 used in conjuction with body flex to push content downward-->
    <!--footer must be under this div-->
    <div class="flex-1 relative z-10">

        <?php require __DIR__ . '/../includes/auth_header.php'; ?>

        <section class="max-w-sm mx-auto mt-3 p-5">
        <div class="min-h-full bg-black/50 rounded-4xl p-7">

            <div class="flex flex-col gap-3 items-center ">
                <h1 class="font-normal text-lg sm:text-lg tracking-wider">ADMIN Access Request</h1>

                <form action="" method="post" class="flex flex-col gap-4 pb-3 tracking-wider">
                    
                    <div class="flex flex-col gap-2">
                      <label for="name" class="text-xlight-purple text-sm tracking-wider">Name</label>
                      <input type="text" id="name" name="name" placeholder="" autocomplete="name" required class="border border-amber-50 bg-white text-gray-500 p-1 rounded-sm">

                      <label for="email" class="text-xlight-purple text-sm tracking-wider mt-4">Email</label>
                      <input type="email" id="email" name="email" placeholder="" autocomplete="email" required class="border border-amber-50 bg-white text-gray-500 p-1 rounded-sm">
                    </div>
        
                    <button class="bg-light-purple hover:bg-dark-purple transition-colors w-full p-2 pb-3 mt-5 rounded-full cursor-pointer">Request</button>

                    <div class="flex flex-row items-center gap-3" aria-hidden="true">
                        <span class="h-px flex-1 bg-gray-400/40"></span>
                        <span class="test-sm text-gray-400 tracking-wider">or</span>
                        <span class="h-px flex-1 bg-gray-400/40"></span>
                    </div>

                    <a href="<?= BASE_URL ?>admin/login.php" class="flex flex-row m-auto text-sm tracking-wider mt-2 hover:text-light-purple">Login</a>
                </form>
            </div>
        </div>
        </section>
    </div>

<?php require __DIR__ . '/../includes/footer.php'; ?>
