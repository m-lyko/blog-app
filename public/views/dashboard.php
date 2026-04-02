<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/styles/dashboard.css">
    <script type="text/javascript" src="./public/scripts/search.js" defer></script>
    <title>Postorium</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400&display=swap" rel="stylesheet">

</head>

<body>
    <header class="top-bar">
        <div class="header-left">
            <div class="user-icon">
                <a href="/account" aria-label="Konto">
                    <img src="/public/img/user.svg">
                </a>
            </div>
            <div class="add-icon">
                <a href="/add-post" aria-label="Dodaj post">
                    <img src="/public/img/addPost.svg">
                </a>
            </div>
        </div>
        <div class="header-right">
            <div class="search-container">
                <input type="text" placeholder="Szukaj">
                <img src="/public/img/search.svg" alt="Szukaj">
            </div>
        </div>
    </header>

    <main class="content-area">
        <section class="card-grid">
            <?php if (isset($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <div class="card">
                        <img src="<?= $post->getAvatarPath(); ?>" alt="Profile image">

                        <div class="card-text">
                            <h3><?= htmlspecialchars($post->getTitle(), ENT_QUOTES, 'UTF-8') ?></h3>
                            <p class="description"><?= htmlspecialchars($post->getShortDescription(), ENT_QUOTES, 'UTF-8') ?>
                            </p>
                            <p class="author">Autor: <?= htmlspecialchars($post->getAuthorName(), ENT_QUOTES, 'UTF-8') ?></p>
                        </div>

                        <a href="/details?id=<?= $post->getID(); ?>">
                            <img src="/public/img/arrow.svg" alt="Arrow">
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>
    </main>

    <template id="post-template">
        <div class="card">
            <img src="" alt="Profile image">
            <div class="card-text">
                <h3>title</h3>
                <p class="description">description</p>
                <p class="author">author</p>
            </div>
            <a href="#">
                <img src="/public/img/arrow.svg" alt="Arrow">
            </a>
        </div>
    </template>
</body>

</html>