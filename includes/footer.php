<?php require_once __DIR__ . '/config.php'; ?>
    <footer class="relative z-10 w-full min-h-55 footer:h-35 p-6 bg-darkest-purple bg-linear-to-b from-darkest-purple from-97% to-xlight-purple to-97%">

      <div class="flex flex-col space-y-6 footer:space-y-1 footer:grid footer:grid-cols-[1fr_auto_1fr] max-w-5xl mx-auto justify-center items-center tracking-wider">

        <div class="flex flex-row gap-6 items-center">
          <a href="mailto:matt@optmzd.net" rel="noopener noreferrer" class="transition-colors hover:text-orange-200 text-xs" aria-label="Send an email to Matt.">
            <img src="<?= BASE_URL ?>public/images/email_icon.svg" alt="" class="h-8 hover:opacity-50" />
          </a>

          <a href="https://github.com/mattdrmmnd" target="_blank" rel="noopener noreferrer" class="transition-colors hover:text-orange-200 text-xs" aria-label="Visit Matt's Github repository.">
            <img src="<?= BASE_URL ?>public/images/github_logo_footer.svg" alt="" class="h-5 hover:opacity-50" />
          </a>

          <a href="https://dev.to/mattdrmmnd" target="_blank" rel="noopener noreferrer" class="transition-colors hover:text-orange-200 text-xs" aria-label="Visit Matt's DEV profile.">
            <img src="<?= BASE_URL ?>public/images/dev_logo.svg" alt="" class="h-4 hover:opacity-50" />
          </a>

          <a href="https://www.linkedin.com/in/mattdrummond/" target="_blank" rel="noopener noreferrer" class="transition-colors hover:text-orange-200 text-xs" aria-label="Visit Matt's Linkedin profile.">
            <img src="<?= BASE_URL ?>public/images/in_logo.webp" alt="" class="h-5 hover:opacity-50" />
          </a>

          <a href="https://discordapp.com/users/302595954207490048" target="_blank" rel="noopener noreferrer" class="transition-colors hover:text-orange-200 text-xs" aria-label="Visit Matt's Discord profile.">
            <img src="<?= BASE_URL ?>public/images/discord_logo.svg" alt="" class="h-4 hover:opacity-50" />
          </a>

          <a href="https://x.com/itsmattdev" target="_blank" rel="noopener noreferrer" class="transition-colors hover:text-orange-200 text-xs" aria-label="Visit Matt's X profile.">
            <img src="<?= BASE_URL ?>public/images/x_logo.svg" alt="" class="h-4 hover:opacity-50" />
          </a>
        </div>

        <p class="col-start-2 text-center text-xlight-purple footer:absolute footer:inset-x-0 footer:bottom-8">Matt The Dev | <?= date('Y') ?></p>

        <a href="https://optmzd.net" target="_blank" rel="noopener noreferrer" class="col-start-3 justify-self-end transition-colors hover:text-orange-200 text-xs mt-1 footer:mt-0">Powered by OPTMZD</a>
        <p class="col-start-3 text-white text-xs justify-self-end pb-2 footer:pb-0">v0.9.0</p>
      </div>

    </footer>

  </body>
</html>
