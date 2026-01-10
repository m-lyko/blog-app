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
function markValidation(element1, element2, condition) {
    // założenie że błąd jest następnym rodzeństwem
    const nextElement = element1.nextElementSibling;
    // jeśli istnieje i ten element to komunikat → czyścimy
    if(nextElement && nextElement.classList.contains('message-error')){
        nextElement.remove();
    }

    // jeśli warunek (areValuesSame: true) nie jest spełniony i pole nie jest puste → wyskakuje błąd
    if(!condition && element1.value !== '' && element2.value !== '') {
        const message = document.createElement('div');
        message.classList.add('message-error');
        message.innerText = 'Wartości nie są identyczne.';

        element1.after(message);
    }
}

function validateEmail() {
    markValidation(confirmedEmailInput, emailInput, areValuesSame(emailInput, confirmedEmailInput));
}

function validatePassword() {
    markValidation(confirmedPasswordInput, passwordInput, areValuesSame(passwordInput, confirmedPasswordInput));
}


// nasłuchiwanie
confirmedEmailInput.addEventListener('keyup', validateEmail);
emailInput.addEventListener('keyup', validateEmail);

confirmedPasswordInput.addEventListener('keyup', validatePassword);
passwordInput.addEventListener('keyup', validatePassword);

form.addEventListener('submit', 
    function(event) {
        const emailValid = areValuesSame(emailInput, confirmedEmailInput);
        const passwordValid = areValuesSame(passwordInput, confirmedPasswordInput);

        if(!emailValid || !passwordValid) {
            event.preventDefault(); // zatrzymanie wysłania do PHP
            alert('Popraw błędy w formularzu przed wysłaniem.');
        }
    }
);