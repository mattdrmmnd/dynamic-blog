<?php
$pageTitle = 'Matt Likes Stacks';
$bodyClass = 'home flex flex-col min-h-screen bg-cover bg-center bg-fixed font-inter text-white';
require __DIR__ . '/includes/head.php';
?>

     <!--To Top Gradient for background-->
    <div class="fixed inset-0 top-[30vh] bg-linear-to-t from-[#0C0C0C] from-50% to-transparent to-100%"></div>

    <!--Footer - flex-1 used in conjuction with body flex to push content downward-->
    <!--footer must be under this div-->
    <div class="flex-1 relative z-10">

    <?php require __DIR__ . '/includes/header.php'; ?>

    <section class="max-w-3xl mx-auto mt-3 px-5 py-3">
      <div class="w-full max-w-[725px] min-h-full dark:bg-black/50 rounded-xl p-12 text-center">

        <h1 class="font-semibold text-3xl sm:text-4xl tracking-wider">Matt Drummond</h1>
        <p class="mt-5 font-extralight text-lg sm:text-2xl tracking-wider"><span class="text-xlight-purple">Full-Stack</span> Software Developer</p>
        <p class="mt-3 font-extralight text-lg sm:text-xl tracking-wider">Web Applications <span class="text-light-purple" aria-hidden="true">&&</span> <span class="sr-only">and</span> Modern Web Technologies</p>

      </div>

      <div class="flex flex-col xmid:flex-row gap-10 xmid:gap-0 justify-between items-center px-16 py-10 min-h-full max-w-87 xmid:max-w-full dark:bg-black/50 rounded-xl mt-12 mx-auto">
        

        <h2 class="font-semibold text-xl text-center text-xlight-purple tracking-wider">Visit Me:</h2>

        <a href="https://github.com/mattdrmmnd" target="_blank" rel="noopener noreferrer" aria-label="Visit Matt on GitHub"><img src="<?= BASE_URL ?>public/images/github_logo.svg" class="h-8 hover:opacity-50" /></a>

        <a href="https://dev.to/mattdrmmnd" target="_blank" rel="noopener noreferrer" aria-label="Visit Matt on The Dev Community"><img src="<?= BASE_URL ?>public/images/dev_logo.svg" class="h-8 hover:opacity-50" /></a>

        <a href="https://www.linkedin.com/in/mattdrummond" target="_blank" rel="noopener noreferrer" aria-label="Visit Matt on Linkedin"><img src="<?= BASE_URL ?>public/images/linkedin_logo.webp" class="h-8 hover:opacity-50" /></a>
    
      </div>
    </section>


    <section class="flex flex-col max-w-3xl mx-auto mt-3 px-7 sm:px-5">
            <div class="flex flex-col mt-4 m-auto pb-5 w-full max-w-[725px] min-h-full dark:bg-black/60 rounded-xl p-7 sm:pl-25">

                <div class="flex flex-row items-center gap-4 mt-7">
                  
                  <img src="<?= BASE_URL ?>public/images/avatar.webp" alt="Matt's profile image: a Hand-drawn M and @ symbol" class="w-15 h-15 rounded-full object-cover" />
                  
                  <div>
                    <p class="text-lg tracking-wider"><b>Location: </b>USA</p>
                    <p class="text-md max-w-71 tracking-wider mt-1">Contact me: <a href="mailto:matt@optmzd.net" class="text-gray-400 hover:text-white" target="_blank" rel="noopener noreferrer">matt@optmzd.net</a></p>
                  </div>
                  
                </div> 
                
                <p class="text-lg mt-7 pb-8 max-w-lg tracking-wider  leading-10">
                I'm an Alumnus of Full Sail University where I completed the <a href="https://www.fullsail.edu/degrees/digital-arts-design-bachelor-degree-program" class="text-xlight-purple hover:text-white" target="_blank" rel="noopener noreferrer">Digital Arts & Design</a> program and achieved a Bachelors of Science degree. My interests include developing secure three-tier applications. <!--My workflow includes the use of AI tools like Claude to accelerate learning & debugging.-->
                </p>
                
                <p class="text-lg pb-8 max-w-lg tracking-wider">Visit <a href="https://github.com/mattdrmmnd" class="text-xlight-purple hover:text-white" target="_blank" rel="noopener noreferrer">my GitHub</a> profile to see the latest.</p>

                <div class="w-full max-w-lg min-h-full">
                  <h2 class="font-bold text-xl sm:text-xl tracking-wider pb-3">
                  Experience:
                  </h2>

                  <p class="text-md sm:text-lg pb-3 max-w-lg tracking-wider">Software Developer @ <a href="https://optmzd.net" class="text-xlight-purple hover:text-white" target="_blank" rel="noopener noreferrer">OPTMZD</a></p>

                  <p class="text-md sm:text-lg max-w-lg tracking-wider pb-8">Front-End Development @ <a href="https://sieb.com/" class="text-xlight-purple hover:text-white" target="_blank" rel="noopener noreferrer">SIEB</a></p>
                </div>


            </div>
    </section>

    <section class="flex flex-col max-w-3xl mx-auto px-7 sm:px-5">

            <div class="flex flex-col p-7 pt-12 pb-12 sm:pl-15 mt-12 dark:bg-black/60 rounded-xl ">
              <h2 class="font-semibold text-white text-xl sm:text-xl tracking-wider">
                  Skills
              </h2>


                <div class="grid grid-cols-autofit gap-5 tracking-wider pt-3 m-auto sm:m-0">
                  <div>
                  <h3 class="text-orange-200 pb-2">Front-End</h3>
                      <ul>
                          <li>CSS</li>
                          <li>HTML</li>
                          <li>Javascript</li>
                          <li>React.js</li>
                          <li>Tailwind</li>
                          <li>TypeScript</li>
                      </ul>
                  </div>
                  
                  <div>
                  <h3 class="text-orange-200 pb-2">Server-Side</h3>
                      <ul>
                          <li>MySQL</li>
                          <li>Node.js</li>
                          <li>PHP / Laravel</li>
                      </ul>
                  </div>

                  <div>
                  <h3 class="text-orange-200 pb-2">Tools & Design</h3>
                      <ul>
                          <li>Adobe CC Pro</li>
                          <li>Figma</li>
                          <li>Git / GitHub</li>
                          <li>phpMyAdmin</li>
                          <li>Vite</li>
                          <li>Xampp</li>
                          
                      </ul>
                  </div>
                </div>
                
            </div>
            
    </section>

    <section class="max-w-fit mx-auto my-12 px-7 sm:px-5">
      
      <div class="px-12 sm:px-8 py-12 dark:bg-black/60 rounded-xl">
        <h2 class="font-semibold text-xl text-center text-white tracking-wider">Featured Posts</h2>

        <div class="mt-5 flex flex-col mid1000:flex-row justify-center items-center gap-15">
          <div class="flex flex-col items-center tracking-wider">
            <a href=""><img src="<?= BASE_URL ?>public/images/post_img_01.jpg" alt="Read the first feature story" class="w-auto h-auto max-w-full max-h-65 mid1000:max-h-40 rounded-md" /></a>
            <p class="pt-3 tracking-wider">Lorem ipsum dolor sit amet...</p>
            <a href="" class="button mt-7" aria-label="Read article: The First article">Read the article</a>
          </div>

          <div class="flex flex-col items-center tracking-wider">
            <a href=""><img src="<?= BASE_URL ?>public/images/post_img_00.jpg" alt="Read the second feature story" class="w-auto h-auto max-w-full max-h-65 mid1000:max-h-40 rounded-md" /></a>
            <p class="pt-3 tracking-wider">Lorem ipsum dolor sit amet...</p>
            <a href="" class="button mt-7" aria-label="Read article: The second">Read the article</a>
          </div>

          <div class="flex flex-col items-center tracking-wider">
            <a href=""><img src="<?= BASE_URL ?>public/images/post_img_03.jpg" alt="Read the third feature story" class="w-auto h-auto max-w-full max-h-65 mid1000:max-h-40 rounded-md" /></a>
            <p class="pt-3 tracking-wider">Lorem ipsum dolor sit amet...</p>
            <a href="" class="button mt-7" aria-label="Read article: The third article">Read the article</a>
          </div>
        </div>

      </div>
        
    </section>

  </div>

<?php require __DIR__ . '/includes/footer.php'; ?>
