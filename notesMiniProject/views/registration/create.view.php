<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<main>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" class="mx-auto h-10 w-auto" />
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Register for a new account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

    <form action="/register" method="POST" class="space-y-6">

        <div>
          <label for="email" hidden class="sr-only">Email address</label>
          <input id="email"
                 type="email"
                name="email"
                required
                autocomplete="email"
                class="block w-full rounded-md  bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                value="<?= $email ?>"
                />
            <?php if (! empty($errors['email'])) : ?>
                <p class="mt-2 text-sm text-red-500"><?= htmlspecialchars($errors['email']) ?></p>
              <?php endif; ?>
        </div>
        <div>
          <label for="password" hidden class="sr-only">Password</label>
          <input id="password" type="password" name="password" required autocomplete="current-password"
                 class="block w-full rounded-md  bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
          <?php if (! empty($errors['password'])) : ?>
                <p class="mt-2 text-sm text-red-500"><?= htmlspecialchars($errors['password']) ?></p>
          <?php endif; ?>
        </div>


      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
      </div>
    </form>
  </div>
</div>

</main>

<?php require base_path('views/partials/foot.php') ?>
