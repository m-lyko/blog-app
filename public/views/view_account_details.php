<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Moje konto</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/public/styles/main.css">
    <link rel="stylesheet" type="text/css" href="/public/styles/view_account_details.css">
</head>
<body>
    <main>
        <div class="menu-container">
            <div class="main-button">
                <img src="/public/img/hamburger.svg" alt="Menu button">
            </div>

            <a href="/dashboard" class="back-button">
                <img src="/public/img/back.svg" alt="Back button">
            </a>

            <a href="change-user-data" class="edit-button" style="cursor: pointer;">
                <img src="/public/img/edit.svg" alt="Edit user data button">
            </a>

            <a href="/logout" class="logout-button" style="cursor: pointer;">
                <img src="/public/img/logout.svg" alt="Logout button">
            </a>            
        </div>

        <section class="avatar-section">
            <img src="/<?= $avatar ? $avatar : '/public/img/users/default_avatar.svg'; ?>" alt="Avatar" class="profile-avatar">
        </section>

        <h2>Twoje dane</h2>

        <section class="data-section">

            <div class="data-row">
                <span class="text-label">Imię</span>
                <div class="data-box">
                    <?= $name; ?>
                </div>
            </div>

            <div class="data-row">
                <span class="text-label">Nazwisko</span>
                <div class="data-box">
                    <?= $surname; ?>
                </div>
            </div>

            <div class="data-row">
                <span class="text-label">E-mail</span>
                <div class="data-box">
                    <?= $email; ?>
                </div>
            </div>  

            <div class="data-row">
                <span class="text-label">Liczba postów</span>
                <div class="data-box">
                    <?= $email; ?>
                </div>
            </div>              

        </section>
    </main>
</body>
</html>