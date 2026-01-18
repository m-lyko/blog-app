<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blogosfera - Logowanie</title>
        <link rel="stylesheet" href="/public/styles/login.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="logo-section">
            <img src="/public/img/blogosfera.svg" alt="Blogosfera">
        </div>
        <div class="login-panel">
            <form action="login" method="post">
                <input placeholder="Adres e-mail" name="email">
                <input placeholder="Hasło" type="password" name="password">
                <button type="submit">LOGIN</button>
            </form>
        </div>
    </body>
</html>