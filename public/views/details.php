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

    <?php
        $currentUserId = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : null;

        $userRoleId = isset($_SESSION['user_role']) ? (int)$_SESSION['user_role'] : 2;

        $isAuthor = ($currentUserId !== null) && ($post->getAuthorId() === $currentUserId);
        $isAdmin = ($userRoleId === 1);
    ?>

    <div class="base-container">

        <div class="menu-container">
            <div class="main-button">
                <img src="/public/img/hamburger.svg" alt="Menu button">
            </div>

            <a href="/dashboard" class="back-button">
                <img src="/public/img/back.svg" alt="Back button">
            </a>

            <?php if ($isAuthor || $isAdmin): ?>

                <a href="/edit-post?id=<?= $post->getID(); ?>" class="edit-button">
                    <img src="/public/img/edit.svg" alt="Edit post button">
                </a>

                <form id="delete-form" action="delete-post" method="POST">
                    <input type="hidden" name="id" value="<?= $post->getID(); ?>">

                    <button type="submit" class="delete-button">
                        <img src="/public/img/trash.svg" alt="Delete post button">
                    </button>
                </form>
                
            <?php endif; ?>
                
        </div>
        
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
                        <span><strong class="author-name"><?= $post->getAuthorName(); ?></strong></span>
                    </div>
                </div>

                <div class="box">
                    <div class="bar center">
                        <div class="box-icon">
                            <img src="/public/img/share.svg" alt="Share">
                        </div>
                        <span><b>13</b></span>
                    </div>
                </div>                

                <div class="box reverse">
                    <div class="bar right">
                        <span><b>76</b></span>
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