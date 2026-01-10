<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="public/styles/dashboard.css">
    <script src="public/scripts/main.js" defer></script>
    <title>Dashboard</title>
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
                <img src="/public/img/addPost.svg">
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
            <!-- sprawdza czy zmienna $posts istnieje -->
            <!-- dwukropek zastępuje nawias klamrowy -->
            <?php if(isset($posts)): ?>
                <?php foreach($posts as $post): ?>
                    <div class="card">
                        <img src="<?= $post->getAvatarPath(); ?>" alt="Profile image">
                        
                        <div class="card-text">
                            <h3><?= $post->getTitle(); ?></h3>
                            <p><?= $post->getSubtitle(); ?></p>
                            <p class="description"><?= $post->getDescription(); ?></p>
                        </div>
                        
                        <a href="/details">
                            <img src="/public/img/arrow.svg" alt="Arrow">
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>
    </main>

</body>
</html>
