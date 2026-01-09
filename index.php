<?php

session_start();

#echo "<h1>Hi Students! 🌅</h1>";

// Wczytujemy plik 'Routing.php', dzięki czemu skrypt "widzi" klasę Routing i może używać jej metod.
require 'Routing.php';

// Pobieramy adres wpisany w przeglądarkę (np. /home/) i usuwamy slashe '/' z początku i końca (zostaje samo "home").
$path = trim($_SERVER['REQUEST_URI'], '/');

// Odcinamy wszystko, co jest po znaku zapytania (np. ?id=5), żeby została tylko czysta ścieżka do pliku/akcji.
// PHP_URL_PATH jest to stała, która działa jak filtr.
// Mówi ona funkcji parse_url(), że interesuje nas tylko jeden konkretny fragment adresu URL
// – mianowicie ścieżka (path).
$path = parse_url($path, PHP_URL_PATH);

// Debugowanie w celu sprawdzenia, jaką finalną wartość ma zmienna $path tuż przed użyciem
//var_dump($path);

// Przekazujemy oczyszczoną ścieżkę do routera, który decyduje, jaki widok lub funkcję uruchomić dla użytkownika.
Routing::run($path);

?>