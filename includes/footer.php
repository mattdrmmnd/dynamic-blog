<?php require_once __DIR__ . '/config.php'; ?>
    <footer class="relative z-10 w-full h-45 sm:h-20 p-6 bg-darkest-purple">

      <div class="flex flex-col space-y-6 sm:space-y-1 sm:grid sm:grid-cols-[1fr_auto_1fr] max-w-5xl mx-auto justify-center items-center tracking-wider">
        <a href="https://github.com/mattdrmmnd" target="_blank" rel="noopener noreferrer" class="col-start-1 justify-self-start transition-colors hover:text-orange-200 text-xs" aria-label="Visit Matt's Github repository.">
          <img src="<?= BASE_URL ?>public/images/github_logo_footer.svg" class="h-8 hover:opacity-50" />
        </a>

        <p class="col-start-2 text-center text-orange-200">Matt Likes Stacks | <?= date('Y') ?></p>
        <a href="https://optmzd.net" target="_blank" rel="noopener noreferrer" class="col-start-3 justify-self-end transition-colors hover:text-orange-200 text-xs">Powered by OPTMZD</a>
      </div>

    </footer>

  </body>
</html>
