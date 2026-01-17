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
            <div class="box-container">

                <div class="box">
                    <div class="bar left">
                        <div class="box-icon">
                            <img src="/<?= $post->getAvatarPath(); ?>" alt="Profile image">
                        </div>
                        <span>Autor: <strong class="author-name"><?= $post->getAuthorName(); ?></strong></span>
                    </div>
                </div>

                <div class="box">
                    <div class="bar center">
                        <div class="box-icon">
                            <img src="/public/img/share.svg" alt="Share">
                        </div>
                        <span><b>77</b></span>
                    </div>
                </div>                

                <div class="box reverse">
                    <div class="bar right">
                        <span><b>77</b></span>
                        <div class="box-icon icon-right">
                            <img src="/public/img/like.svg" alt="Like">                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>