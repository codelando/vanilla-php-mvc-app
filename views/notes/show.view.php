<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/notes" class="text-blue-500 hover:underline">Back to notes</a>
        </p>
        <p><?= htmlspecialchars($note['body']); ?></p>
        <p class="mt-6">
            <form method="POST">
                <input type="hidden" name="id" value="<?= $note['id']; ?>">
                <button class="text-red-500 hover:underline">Delete note</button>
            </form>
        </p>

    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>