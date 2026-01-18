<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blogosfera - Logowanie</title>
        <link rel="stylesheet" href="/public/styles/main.css">
        <link rel="stylesheet" href="/public/styles/login.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400&display=swap" rel="stylesheet">
    </head>
    <body>

        <?php if (isset($messages)): ?>
            <?php foreach ($messages as $msg): ?>
                <div class="message-error"><?= $msg ?></div>
            <?php endforeach; ?>
        <?php endif; ?>
        
        <div class="user-space">
            <div class="logo-section">
                <img src="/public/img/blogosfera.svg" alt="Blogosfera">
            </div>
            <div class="login-panel">
                <form action="login" method="post">
                    <input placeholder="Adres e-mail" name="email">
                    <input placeholder="Hasło" type="password" name="password">
                    <button type="submit">LOGIN</button>
                    <a href="/register" class="new-user">
                        Nowy użytkownik?
                    </a>
                </form>
            </div>
        </div>
    </body>
</html>