// wstrzymanie wykonania kodu do momentu wczytania i przetworzenia całego drzewa dokumentu
document.addEventListener('DOMContentLoaded', () => {
    // pobranie elementów
    const form = document.getElementById('postForm');
    const submitButton = document.querySelector('.add-button');

    // jeśli oba elementy istnieją na stronie
    if(form && submitButton) {
        submitButton.addEventListener('click', (event) => {
            // blokada domyślnego zachowania przeglądarki, aby przejąć kontrolę
            event.preventDefault();

            // walidacja danych po stronie klienta
            const titleInput = form.querySelector('input[name="title"]');
            const descriptionInput = form.querySelector('textarea[name="description"]');

            if(titleInput.value.trim() === ""
               || descriptionInput.value.trim() === ""
            )
            {
                alert("Treść i tytuł posta nie mogą być puste.");
                return;
            }

            // ręczne wysłanie danych
            form.submit();
        })
    }
})