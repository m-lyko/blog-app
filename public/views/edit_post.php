<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie postu</title>
    <link rel="stylesheet" type="text/css" href="/public/styles/edit_post.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">

    <script type="text/javascript" src="/public/scripts/addPost.js" defer></script>
</head>
<body>
    <div class="menu-container">
        <div class="main-button">
            <img src="/public/img/hamburger.svg" alt="Menu button">
        </div>
        <a href="/details?id=<?= $post->getID(); ?>" class="back-button">
            <img src="/public/img/back.svg" alt="Back button">
        </a>
        <button type="submit" class="accept-button" form="edit-post-form" style="cursor: pointer;">
            <img src="/public/img/confirm.svg" alt="Accept change button">
        </a>
    </div>

    <div class="post-container">
        <form id="edit-post-form" action="edit-post" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $post->getID(); ?>">
            <input name="title" type="text" value="<?= $post->getTitle(); ?>">
            <textarea name="description" rows="5"><?= $post->getDescription(); ?></textarea>
        </form>
    </div>
</body>
</html>