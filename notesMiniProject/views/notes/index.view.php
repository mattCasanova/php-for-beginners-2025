<?php require('views/partials/head.php') ?>
<?php require('views/partials/nav.php') ?>
<?php require('views/partials/banner.php') ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <ul>
      <?php foreach ($notes as $note) : ?>
      <li class="mb-4 list-none rounded border border-gray-200 bg-white p-6 shadow-sm">
        <a href="/note?id=<?= $note['id'] ?>" class="hover:underline">
          <h2 class="mb-2 text-xl font-bold text-gray-900"><?= htmlspecialchars($note['body']) ?></h2>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>

    <p class="mt-6">
      <a href="/notes/create" class="text-indigo-500 hover:underline">+ Create a new note</a>
    </p>

  </div>
</main>

<?php require('views/partials/foot.php') ?>
