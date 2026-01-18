<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie postu</title>
    <link rel="stylesheet" type="text/css" href="/public/styles/add_post.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">

    <script type="text/javascript" src="/public/scripts/addPost.js" defer></script>
</head>
<body>
    <div class="menu-container">
        <div class="main-button">
            <img src="/public/img/hamburger.svg" alt="Menu button">
        </div>
        <a href="/dashboard" class="back-button">
            <img src="/public/img/back.svg" alt="Back button">
        </a>
        <a class="add-button" style="cursor: pointer;">
            <img src="/public/img/add_green.svg" alt="Add post button">
        </a>
    </div>

    <div class="post-container">
        <form action="/add-post" method="POST" id="postForm">

            <div class="messages">
                <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                ?>
            </div>

            <input name="title" type="text" placeholder="Wpisz tytuł posta..." required>

            <textarea name="description" rows="5" placeholder="Uzupełnij treść..." required></textarea>
        </form>
    </div>
</body>
</html>