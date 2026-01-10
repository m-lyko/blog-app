<?php

class AppController {

    protected function isGet(): bool {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }

    protected function isPost(): bool {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
    
    // $template to nazwa pliku (np. "dashboard"), $variables to dane (np. karty)
    protected function render(string $template = null, array $variables = []){
        
        $templatePath404 = 'public/views/404.html';
        $output = "";

        // najpierw szukamy .php
        $templatePath = 'public/views/' . $template . '.php';
        $output = 'Nie znaleziono pliku.';

        // jeśli nie ma .php → .html
        if(!file_exists($templatePath)){
            $templatePath = 'public/views/' . $template . '.html';

        }

        // Sprawdzenie dostępności - czy plik widoku istnieje
        if(file_exists($templatePath)){
            // Skanuje tablicę: Przegląda wszystkie klucze w tablicy $variables (np. 'cards', 'title', 'uzytkownik').
            // Tworzy nowe symbole: Dla każdego klucza dodaje nowy wpis do tabeli symboli. Ten nowy wpis ma nazwę klucza (z dodanym znakiem $) i przypisaną mu wartość z tablicy.
            // Zamiast skomplikowanego dostępu do tablicy, możemy używać krótkich, prostych nazw zmiennych
            // $_variables['uzytkownik'] = 'Marek'      =====>     $uzytkownik = 'Marek' 
            extract($variables);
            // Kod HTML nie pojawia się od razu na ekranie. 
            // Zamiast tego, to co pomiędzy ob_start i ob_get_clean trafia do bufora w pamięci RAM.
            ob_start();
            // załadowanie pliku HTML, w którym PHP wstawia dane ($cards, $user, itp. dzięki extract)
            include $templatePath;
            // ob_get_clean bierze cały gotowy, sklejony kod HTML z bufora i przypisuje go do zmiennej
            $output = ob_get_clean();
        }
        else{
            // 404
            ob_start();
            include $templatePath404;
            $output = ob_get_clean();
        }
        
        print $output;
    }
}