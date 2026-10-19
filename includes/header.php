<?php require_once __DIR__ . '/config.php'; ?>
    <header class="max-w-5xl mx-auto px-5 py-3 min-h-40 flex">
      <div class="flex flex-col items-center sm:items-end w-full">
        <a href="<?= BASE_URL ?>admin/login.php" class="self-end mb-2 sm:mt-2 uppercase tracking-wider text-xs bg-black p-2 rounded-sm hover:bg-light-purple transition-colors">Login</a>

        <div class="flex flex-col items-center w-full flex-1 sm:flex-row sm:justify-between sm:items-center">
          <div class="mb-10">
            <a href="<?= BASE_URL ?>" class="inline-block bg-black/50 rounded-md">
              <img class="block transition hover:filter-[brightness(0)_saturate(100%)_invert(85%)_sepia(40%)_saturate(600%)_hue-rotate(320deg)]" src="<?= BASE_URL ?>public/images/logo.svg" alt="Matt Likes Stacks Logo" />
            </a>
          </div>

          <nav class="mt-auto sm:mt-2">
            <ul class="tracking-wider flex gap-x-6 gap-y-5 justify-center sm:justify-between flex-wrap">
              <li><a href="<?= BASE_URL ?>post_previews_writing.php" class="hover:text-orange-200 transition-colors p-2 rounded-sm font-semibold">What I'm Writing</a></li>
              <li><a href="<?= BASE_URL ?>post_previews_reading.php" class="hover:text-orange-200 transition-colors p-2 rounded-sm font-semibold">What I'm Reading</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
