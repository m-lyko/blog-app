<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Moje konto</title>
</head>
<body>
    <main>
        <nav aria-label="Nawigacja">
            <a href="/dashboard">← Wróć do dashboardu</a>
        </nav>

        <h1>Twój profil</h1>

        <section>
            <h2>Dane podstawowe</h2>
            <p><strong>Imię:</strong> <span><?= $name; ?></span></p>
            <p><strong>Nazwisko:</strong> <span><?= $surname; ?></span></p>
            <p><strong>E-mail:</strong> <span><?= $email; ?></span></p>
        </section>

        <hr>

        <section>
            <h2>Statystyki</h2>
            <p><strong>Liczba Twoich wątków:</strong> 5</p>
        </section>

        <a href="/logout">Wyloguj się</a>
    </main>
</body>
</html>