<?php require('views/partials/head.php') ?>
<?php require('views/partials/nav.php') ?>
<?php require('views/partials/banner.php') ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <p class="mb-6">
      <a href="/notes" class="text-indigo-600 hover:underline">&larr; Back to all notes</a>
    </p>
    <h2 class="mb-2 text-xl font-bold text-gray-900"><?= htmlspecialchars($note['body']) ?></h2>
  </div>
</main>

<?php require('views/partials/foot.php') ?>
