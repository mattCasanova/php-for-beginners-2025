<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <p class="mb-6">
      <a href="/notes" class="text-indigo-600 hover:underline">&larr; Back to all notes</a>
    </p>
    <h2 class="mb-2 text-xl font-bold text-gray-900"><?= htmlspecialchars($note['body']) ?></h2>

    <footer class="mt-6">
      <a href="/notes/edit?id=<?= $note['id'] ?>" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
      >Edit</a>
    </footer>


    <form class="mt-6" method="POST">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="id" value="<?= $note['id'] ?>">
          <button type="submit" class="text-red-600 hover:underline">Delete</button>
        </form>
  </div>
</main>

<?php require base_path('views/partials/foot.php') ?>
