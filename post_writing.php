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

                <div class="">
                <h2 class="font-semibold text-2xl sm:text-large text-xlight-purple tracking-wider">
                    <a href="">Let's talk about code!</a>
                </h2>
                <p class="text-sm mt-2 pb-1">Sept 19, 2026</p>
                <p class="text-sm mt-2 pb-4">Written by <a href="" class="text-xlight-purple hover:text-white">Matt D.</a> in <a href="" class="text-xlight-purple hover:text-white">Tech</a></p>
                </div>

                
                <a href=""><img src="<?= BASE_URL ?>public/images/post_img_00.jpg" alt="Computer screen with a code editor open." /></a>
                            
                <p class="text-sm text-gray-400 mt-1 text-center">
                This is a caption
                </p>

                <p class="text-lg mt-4 max-w-lg tracking-wide pb-8 leading-10">
                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pulvinar mauris ipsum, vitae volutpat felis varius sed. Aliquam vestibulum nisi a posuere viverra. Morbi porttitor, tellus eget molestie scelerisque, felis diam vulputate erat, in elementum orci lacus vitae mi. Duis sed augue mauris. <a href="" class="text-xlight-purple hover:text-white" aria-label="Read article: Lorem ipsum dolor sit amet">Suspendisse</a> potenti. Mauris eu pretium enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse porttitor ipsum vitae ante semper consequat. Cras massa nunc, vulputate ut feugiat at, viverra non sem. Proin a urna sit amet mi volutpat gravida.
                </p>

                <p class="text-base mt-4 max-w-lg tracking-wide pb-8 leading-10">
                 Ut sed arcu diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis blandit libero ut neque eleifend laoreet ut a quam. Curabitur nec faucibus lorem. Nam ut tortor ullamcorper, congue dui vel, gravida lectus. Nam quis egestas ex, et dignissim nunc. Phasellus vehicula elit neque, ut faucibus urna sagittis ut.
                </p>

                <p class="text-base mt-4 max-w-lg tracking-wide leading-10">
                 Sed vel auctor justo. Vivamus vitae orci est. Curabitur maximus dui id accumsan tristique. Suspendisse sit amet velit arcu. Sed lobortis nulla orci, sed dignissim turpis venenatis euismod. Vestibulum eu metus ut neque rutrum molestie in vitae eros. Ut porta dolor vitae ex malesuada, vitae accumsan sem efficitur. Etiam aliquet fringilla varius. Praesent id arcu fermentum arcu tincidunt pharetra tempor at turpis. Nam bibendum lectus eu sapien suscipit pretium. Duis luctus et tortor in ornare. Etiam pretium nulla vitae augue vehicula, in dignissim odio molestie. Maecenas at massa tempor, bibendum purus vitae, luctus augue.
                </p>
            
            </div>
    </section>

    <section class="flex flex-col max-w-2xl mx-auto mt-3 pb-27 px-12">
            <div class="flex flex-row gap-2 items-center pb-12 tracking-wider">
              <p>Share:</p>
              <img src="<?= BASE_URL ?>public/images/share_icon.svg" class="h-6 pt-1 cursor-pointer" id="share-icon" />
            </div>

            <!--Toast Message--> 
            <div id="share-toast" class="fixed bottom-6 left-1/2 -translate-x-1/2 bg-orange-200 text-darkest-purple px-4 py-2 rounded-md opacity-0 pointer-events-none transition-opacity duration-300">
            </div>

            <h3 class="uppercase font-bold tracking-wider pb-6">More Posts</h3>
            <ul>
              <li class="flex flex-col sm:flex-row justify-between border-b-[0.25px] border-solid border-gray-800 py-4">
                <a href="">
                  <p class="text-light-purple hover:text-xlight-purple text-xl">
                    Welcome to my blog!
                  </p>
                </a>
                <p class="text-md">Sept 15, 2026</p></a>
              </li>

              <li class="flex flex-col sm:flex-row justify-between border-b-[0.25px] border-solid border-gray-800 py-4">
                <a href="">
                  <p class="text-light-purple hover:text-xlight-purple text-xl">
                  Git Bash commands I use the most
                  </p>
                </a>
                <p class="text-md">Sept 12, 2026</p>
              </li>

              <li class="flex flex-col sm:flex-row justify-between border-b-[0.25px] border-solid border-gray-800 py-4">
                <a href="">
                  <p class="text-light-purple hover:text-xlight-purple text-xl">
                    How to setup Tailwind
                  </p>
                </a>
                <p class="text-md">Sept 9, 2026</p>
              </li>

              <li class="flex flex-col sm:flex-row justify-between border-b-[0.25px] border-solid  border-gray-800 py-4">
                  <a href="">
                    <p class="text-light-purple hover:text-xlight-purple text-xl">
                      Tips and Tricks: resizing images
                    </p>
                  </a>
                  <p class="text-md">Sept 1, 2026</p>
                </li>
            </ul>
    </section>
  </div>

    <script>
      const shareIcon = document.getElementById('share-icon');
      const toast = document.getElementById('share-toast');

      function showToast(message) {
        toast.textContent = message;
        toast.classList.remove('opacity-0');
        toast.classList.add('opacity-100');
        setTimeout(() => {
          toast.classList.remove('opacity-100');
          toast.classList.add('opacity-0');
        }, 2000);
      }

      shareIcon.addEventListener('click', async () => {
        const shareData = {
          title: document.title,
          url: window.location.href,
        };
        
        // If the browser supports the Web Share API
        if (navigator.share) { 

        // .share connects to the OS's default share options aka (Share Sheet).
        // .share is also called the Web Share API
          try {
            // Wait to see if user picks something or dismisses it
            await navigator.share(shareData);
          } catch (err) {
            // If the user cancels the share sheet, do nothing
            if (err.name !== 'AbortError') console.error(err);
          }
        } else {
          try {
            await navigator.clipboard.writeText(window.location.href);
            showToast('Link copied');
          } catch (err) {
            // Log error instead of letting it fail in silence
            console.error('Copy failed:', err);
          }
        }
      });
    </script>

<?php require __DIR__ . '/includes/footer.php'; ?>
