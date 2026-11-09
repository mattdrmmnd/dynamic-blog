<?php require_once __DIR__ . '/config.php'; ?>
    <footer class="relative z-10 w-full h-45 sm:h-20 p-6 bg-darkest-purple">

      <div class="flex flex-col space-y-6 sm:space-y-1 sm:grid sm:grid-cols-[1fr_auto_1fr] max-w-5xl mx-auto justify-center items-center tracking-wider">

        <div class="flex flex-row gap-6 items-center">
          <a href="https://github.com/mattdrmmnd" target="_blank" rel="noopener noreferrer" class="col-start-1 justify-self-start transition-colors hover:text-orange-200 text-xs" aria-label="Visit Matt's Github repository.">
            <img src="<?= BASE_URL ?>public/images/github_logo_footer.svg" class="h-5 hover:opacity-50" />
          </a>

          <a href="https://dev.to/mattdrmmnd" target="_blank" rel="noopener noreferrer" class="col-start-1 transition-colors hover:text-orange-200 text-xs" aria-label="Visit Matt's DEV profile.">
            <img src="<?= BASE_URL ?>public/images/dev_logo.svg" class="h-4 hover:opacity-50" />
          </a>

          <a href="https://www.linkedin.com/in/mattdrummond/" target="_blank" rel="noopener noreferrer" class="col-start-1 transition-colors hover:text-orange-200 text-xs" aria-label="Visit Matt's Linkedin profile.">
            <img src="<?= BASE_URL ?>public/images/in_logo.webp" class="h-5 hover:opacity-50" />
          </a>

          <a href="https://discordapp.com/users/302595954207490048" target="_blank" rel="noopener noreferrer" class="col-start-1 transition-colors hover:text-orange-200 text-xs" aria-label="Visit Matt's Discord profile.">
            <img src="<?= BASE_URL ?>public/images/discord_logo.svg" class="h-4 hover:opacity-50" />
          </a>

          <a href="https://x.com/itsmattdev" target="_blank" rel="noopener noreferrer" class="col-start-1 transition-colors hover:text-orange-200 text-xs" aria-label="Visit Matt's X profile.">
            <img src="<?= BASE_URL ?>public/images/x_logo.svg" class="h-4 hover:opacity-50" />
          </a>

          

          
        </div>

        <p class="col-start-2 text-center text-orange-200">Matt The Dev | <?= date('Y') ?></p>
        <a href="https://optmzd.net" target="_blank" rel="noopener noreferrer" class="col-start-3 justify-self-end transition-colors hover:text-orange-200 text-xs mt-4 sm:mt-0">Powered by OPTMZD</a>
      </div>

    </footer>

  </body>
</html>
