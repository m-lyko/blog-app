<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/public/styles/main.css">
    <link rel="stylesheet" href="/public/styles/register.css">
    <script type="text/javascript" src="./public/scripts/error.js" defer></script>
    <!-- link czcionki -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja nowego użytkownika</title>
</head>
<body>


    <a class="logo" href="/login">
        <img src="/public/img/blogosfera.svg">
    </a>


    <div class="register-panel">
        <form action="/register" method="POST">

            <div class="messages">
                <?php if (isset($messages)): ?>
                    <?php foreach ($messages as $msg): ?>
                        <div class="message-error"><?= htmlspecialchars($msg) ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div> 

            <input placeholder="Adres e-mail" name="email">
            <input placeholder="Powtórz adres e-mail" name="confirmedEmail">
            <input placeholder="Hasło" type="password" name="password" id="password_1">
            <input placeholder="Powtórz hasło" type="password" name="confirmedPassword" id="password_2">
            <input placeholder="Imię" type="name" name="name">
            <input placeholder="Nazwisko" type="surname" name="surname">
            <button type="submit">ZAREJESTRUJ</button>
        </form>
    </div>

    <script type="text/javascript" src="./public/scripts/registerValidation.js"></script>
</body>
</html>