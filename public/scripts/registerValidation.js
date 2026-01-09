const form = document.querySelector('form');

const emailInput = form.querySelector('input[name="email"]');
const confirmedEmailInput = form.querySelector('input[name="confirmedEmail"]');

const passwordInput = form.querySelector('input[name="password"]');
const confirmedPasswordInput = form.querySelector('input[name="confirmedPassword"]');

// funkcja sprawdzająca, czy warunek jest spełniony
function areValuesSame(element1, element2) {
    return element1.value === element2.value;
}

// funkcja wyświetlająca / usuwająca błąd dla konkretnego pola
function markValidation(element, condition) {
    // założenie że błąd jest następnym rodzeństwem
    const nextElement = element.nextElementSibling;
    // jeśli istnieje i ten element to komunikat → czyścimy
    if(nextElement && nextElement.classList.contains('message-error')){
        nextElement.remove();
    }

    // jeśli warunek (areValuesSame: true) nie jest spełniony i pole nie jest puste → wyskakuje błąd
    if(!condition && element.value !== '') {
        const message = document.createElement('div');
        message.classList.add('message-error');
        message.innerText = 'Wartości nie są identyczne.';

        element.after(message);
    }
}

function validateEmail() {
    markValidation(confirmedEmailInput, areValuesSame(emailInput, confirmedEmailInput));
}

function validatePassword() {
    markValidation(confirmedPasswordInput, areValuesSame(passwordInput, confirmedPasswordInput));
}


// nasłuchiwanie
confirmedEmailInput.addEventListener('keyup', validateEmail);
emailInput.addEventListener('keyup', validateEmail);

confirmedPasswordInput.addEventListener('keyup', validatePassword);
passwordInput.addEventListener('keyup', validatePassword);