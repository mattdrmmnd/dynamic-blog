<?php
$pageTitle = 'ADMIN - Login';
$bodyClass = 'home flex flex-col min-h-screen bg-cover bg-center bg-fixed font-inter text-white';
$headerMessage = 'Please LOGIN to get started !';
require __DIR__ . '/../includes/head.php';
?>

     <!--To Top Gradient for background-->
    <div class="fixed inset-0 top-[30vh] bg-linear-to-t from-[#0C0C0C] from-50% to-transparent to-100%"></div>


    <!--Footer - flex-1 used in conjuction with body flex to push content downward-->
    <!--footer must be under this div-->
    <div class="flex-1 relative z-10">

        <?php require __DIR__ . '/../includes/auth_header.php'; ?>

        <section class="max-w-sm mx-auto mt-3 p-5">
        <div class="min-h-full dark:bg-black/60 rounded-4xl p-7">

            <div class="flex flex-col gap-3 items-center ">
                <h1 class="font-normal text-lg sm:text-lg tracking-wider">ADMIN Login</h1>

                <form action="" method="post" class="flex flex-col gap-4 pb-3 tracking-wider">
                    
                    <div class="flex flex-col gap-2">
                      <label for="email" class="text-xlight-purple text-sm tracking-wider">Email</label>
                      <input type="email" id="email" name="email" placeholder="" autocomplete="email" required class="border border-amber-50 bg-white text-gray-500 p-1 rounded-sm">

                      <label for="password" class="text-xlight-purple text-sm tracking-wider mt-4">Password</label>
                      <div class="relative">
                        <input type="password" id="password" name="password" placeholder="" autocomplete="current-password" required class="w-full border border-amber-50 bg-white text-gray-500 p-1 pr-14 rounded-sm [&::-ms-reveal]:hidden">
                        <button type="button" data-password-toggle aria-controls="password" aria-label="Show password" class="absolute right-1 top-1/2 -translate-y-1/2 px-2 text-sm font-semibold text-dark-purple hover:text-light-purple transition-colors cursor-pointer">Show</button>
                      </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <a href="mailto:matt@email.com?subject=Admin%20login%20help" class="self-start text-light-purple text-sm hover:text-white transition-colors tracking-wider">Need help?</a>

                        <div>
                            <label class="flex flex-row items-center gap-2 text-sm tracking-wider cursor-pointer">
                                <input
                                    type="checkbox"
                                    name="remember"
                                    class="h-5 w-5 shrink-0 appearance-none rounded-sm border border-white bg-white bg-center bg-no-repeat bg-contain checked:bg-light-purple cursor-pointer checked:border-0 checked:bg-check focus-visible:outline-2 focus-visible:outline-offset-1 focus-visible:outline-xlight-purple"
                                >
                                Keep me logged in
                            </label>
                        </div>

                    </div>
                    
                    <button class="bg-light-purple hover:bg-dark-purple transition-colors w-full p-2 pb-3 rounded-full cursor-pointer">Login</button>

                    <div class="flex flex-row items-center gap-3" aria-hidden="true">
                        <span class="h-px flex-1 bg-gray-400/40"></span>
                        <span class="test-sm text-gray-400 tracking-wider">or</span>
                        <span class="h-px flex-1 bg-gray-400/40"></span>
                    </div>

                    <a href="<?= BASE_URL ?>admin/request_access.php" class="flex flex-row m-auto text-sm tracking-wider mt-2 hover:text-light-purple">Request access</a>
                </form>
            </div>
        </div>
        </section>
    </div>

<?php require __DIR__ . '/../includes/footer.php'; ?>
