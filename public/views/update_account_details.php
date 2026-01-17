<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Moje konto</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/public/styles/main.css">
    <link rel="stylesheet" type="text/css" href="/public/styles/update_account_details.css">
</head>
<body>
    <main>
        <div class="menu-container">
            <div class="main-button">
                <img src="/public/img/hamburger.svg" alt="Menu button">
            </div>

            <a href="/account" class="back-button">
                <img src="/public/img/deny.svg" alt="Back button">
            </a>

            <button type="submit" form="updateForm" class="edit-button" style="cursor: pointer; background: none; border: none;">
                <img src="/public/img/confirm.svg" alt="Save user data button">
            </button>        
        </div>

        <section class="avatar-section">
            <img src="/<?= $avatar ? $avatar : 'public/img/users/default_avatar.svg'; ?>" alt="Avatar" class="profile-avatar">
        </section>


        <form id="updateForm" action="change-user-data" method="POST" class="data-section">
            
            <input type="submit" style="display: none;">

            <h2>Edycja danych</h2>

            <div class="data-row">
                <span class="text-label">Imię</span>
                <div class="data-box">
                    <input name="name" type="text" value="<?= isset($name) ? $name : ''; ?>" placeholder="Wpisz imię" autocomplete="given-name">
                </div>
            </div>

            <div class="data-row">
                <span class="text-label">Nazwisko</span>
                <div class="data-box">
                    <input name="surname" type="text" value="<?= isset($surname) ? $surname : ''; ?>" placeholder="Wpisz nazwisko">
                </div>
            </div>

            <div class="data-row">
                <span class="text-label">E-mail</span>
                <div class="data-box">
                    <input name="email" type="text" value="<?= isset($email) ? $email : ''; ?>" placeholder="Wpisz email">
                </div>
            </div>      

            <div class="data-row">
                <span class="text-label">Hasło</span>
                <div class="data-box">
                    <input name="password" type="password" value="<?= isset($password) ? $password : ''; ?>" placeholder="Wpisz nowe hasło lub zostaw puste">
                </div>
            </div>                               

        </form>
    </main>
</body>
</html>