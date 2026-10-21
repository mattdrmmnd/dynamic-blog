<?php
$pageTitle = 'Matt The Dev - What I\'m Writing';
$bodyClass = 'flex flex-col min-h-screen font-inter text-white';
require __DIR__ . '/includes/head.php';
?>

    <!--Footer - flex-1 used in conjuction with body flex to push content downward-->
    <!--footer must be under this div-->
    <div class="flex-1">

    <?php require __DIR__ . '/includes/header.php'; ?>
      
      <section class="flex flex-col max-w-2xl mx-auto mt-3 px-12 sm:px-5">
              <div class="flex flex-col mt-4 m-auto pb-17">

                  <h1 class="font-semibold text-lg sm:text-xl uppercase text-xlight-purple tracking-wider pb-5">What I'm writing</h1>
                  
                  <div class="">
                    <h2 class="font-semibold text-2xl sm:text-3xl">
                      <a href="<?= BASE_URL ?>post_writing.php">Let's talk about code!</a>
                    </h2>
                    <p class="text-sm mt-2 pb-4">Sept 19, 2026</p>
                  </div>

                  
                  <a href="<?= BASE_URL ?>post_writing.php"><img src="<?= BASE_URL ?>public/images/post_img_00.jpg" alt="Computer screen with a code editor open." /></a>
                                
                  <p class="text-sm text-gray-400 mt-1 text-center">
                    This is a caption
                  </p>

                  <p class="text-base mt-4 max-w-lg">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam placerat tortor ut magna consequat scelerisque. <a href="<?= BASE_URL ?>post_writing.php" aria-label="More: Let's talk about code!" class="text-xlight-purple hover:text-white">More</a>
                  </p>
                
              </div>
      </section>

       <section class="flex flex-col max-w-2xl mx-auto mt-3 px-12 sm:px-5">
              <div class="flex flex-col mt-4 m-auto pb-17">

                  <div class="">
                    <h2 class="font-semibold text-2xl sm:text-3xl">
                      <a href="">Welcome to my blog!</a>
                    </h2>
                    <p class="text-sm mt-2 pb-4">Sept 19, 2026</p>
                  </div>

                  
                  <a href=""><img src="<?= BASE_URL ?>public/images/post_img_01.jpg" alt="Computer screen with a code editor open." /></a>
                                
                  <p class="text-sm text-gray-400 mt-1 text-center">
                    This is a caption
                  </p>

                  <p class="text-base mt-4 max-w-lg">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam placerat tortor ut magna consequat scelerisque. <a href="" aria-label="More: Welcome to my blog!" class="text-xlight-purple hover:text-white">More</a>
                  </p>
                
              </div>
      </section>

      <section class="flex flex-col max-w-2xl mx-auto mt-3 px-12 sm:px-5">
              <div class="flex flex-col mt-4 m-auto pb-17">
                  
                  <div class="">
                    <h2 class="font-semibold text-2xl sm:text-3xl">
                      <a href="">Let's talk about code!</a>
                    </h2>
                    <p class="text-sm mt-2 pb-4">Sept 19, 2026</p>
                  </div>

                  
                  <a href=""><img src="<?= BASE_URL ?>public/images/post_img_00.jpg" alt="Computer screen with a code editor open." /></a>
                                
                  <p class="text-sm text-gray-400 mt-1 text-center">
                    This is a caption
                  </p>

                  <p class="text-base mt-4 max-w-lg">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam placerat tortor ut magna consequat scelerisque. <a href="" aria-label="More: Let's talk about code!" class="text-xlight-purple hover:text-white">More</a>
                  </p>
                
              </div>
      </section>

       <section class="flex flex-col max-w-2xl mx-auto mt-3 px-12 sm:px-5">
              <div class="flex flex-col mt-4 m-auto">

                  <div class="">
                    <h2 class="font-semibold text-2xl sm:text-3xl">
                      <a href="">Welcome to my blog!</a>
                    </h2>
                    <p class="text-sm mt-2 pb-4">Sept 19, 2026</p>
                  </div>

                  
                  <a href=""><img src="<?= BASE_URL ?>public/images/post_img_01.jpg" alt="Computer screen with a code editor open." /></a>
                                
                  <p class="text-sm text-gray-400 mt-1 text-center">
                    This is a caption
                  </p>

                  <p class="text-base mt-4 max-w-lg">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam placerat tortor ut magna consequat scelerisque. <a href="" aria-label="More: Welcome to my blog!" class="text-xlight-purple hover:text-white">More</a>
                  </p>
                
              </div>
      </section>
      

      <nav aria-label="Pagination" class="flex justify-center mt-20 pb-10">
        <ul class="flex items-stretch divide-x divide-light-purple overflow-hidden rounded-md border border-light-purple text-white text-sm sm:text-base">

          <li>
            <a href="?page=1" class="flex h-10 sm:h-12 items-center gap-2 px-2 sm:px-4 hover:bg-purple-900/40">
              <svg class="h-4 w-4 sm:h-5 sm:w-5 text-light-purple" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path d="M15 5l-7 7 7 7" />
              </svg>
              <span class="hidden sm:inline">Prev.</span>
            </a>
          </li>

          <li>
            <a href="?page=1" aria-current="page" class="flex h-10 w-10 sm:h-12 sm:w-12 items-center justify-center bg-light-purple/40">1</a>
          </li>
          <li>
            <a href="?page=2" class="flex h-10 w-10 sm:h-12 sm:w-12 items-center justify-center hover:bg-light-purple/40">2</a>
          </li>
          <li class="hidden sm:block">
            <a href="?page=3" class="flex h-12 w-12 items-center justify-center hover:bg-light-purple/40">3</a>
          </li>
          <li class="hidden sm:block">
            <span class="flex h-12 w-12 items-center justify-center" aria-hidden="true">&hellip;</span>
          </li>
          <li class="hidden sm:block">
            <a href="?page=7" class="flex h-12 w-12 items-center justify-center hover:bg-light-purple/40">7</a>
          </li>

          <li>
            <a href="?page=2" class="flex h-10 sm:h-12 items-center gap-2 px-2 sm:px-4 hover:bg-light-purple/40">
              <span class="hidden sm:inline">Next</span>
              <svg class="h-4 w-4 sm:h-5 sm:w-5 text-light-purple" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path d="M9 5l7 7-7 7" />
              </svg>
            </a>
          </li>

        </ul>
      </nav>
  </div>

<?php require __DIR__ . '/includes/footer.php'; ?>
