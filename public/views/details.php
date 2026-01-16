<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>

    <link rel="stylesheet" type="text/css" href="public/styles/main.css">
    <link rel="stylesheet" type="text/css" href="public/styles/details.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body>

    <div class="base-container">

        <nav>
            <div class="home-icon">
                <a href="/dashboard">
                    <img src="/public/img/home.svg" alt="Home">
                </a>
            </div>
        </nav>
        
        <main>
            <header>
                <h1><?= $post->getTitle(); ?></h1>
            </header>
            <div class="post-content">
                <p><?= $post->getDescription(); ?></p>
            </div>
        </main>
    </div>
    <section class="bottom-bar">
        <div class="base-container">
            <div class="stats-container">

                <div class="stat-box">
                    <div class="stat-icon">
                        <img src="<?= $post->getAvatarPath(); ?>" alt="Profile image">
                    </div>
                    <div class="stat-bar color-green">
                        <span>Autor: <?= $post->getAuthorName(); ?></span>
                    </div>
                </div>

                <div class="stat-box">
                    <div class="stat-icon">
                        <img src="/public/img/share.svg" alt="Share">
                    </div>
                    <div class="stat-bar color-blue center-text">
                        <span>77</span>
                    </div>
                </div>                

                <div class="stat-box reverse">
                    <div class="stat-bar color-dark center-text">
                        <span>77</span>
                    </div>
                    <div class="stat-icon icon-right">
                        <img src="/public/img/like.svg" alt="Like">                    
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>