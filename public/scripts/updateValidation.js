const form = document.getElementById('updateForm');

const emailInput = form.querySelector('input[name="email"]');
const confirmedEmailInput = form.querySelector('input[name="confirmedEmail"]');

const passwordInput = form.querySelector('input[name="password"]');
const confirmedPasswordInput = form.querySelector('input[name="confirmedPassword"]');

const emailRegex = /\S+@\S+\.\S+/;
const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

function toggleError(inputElement, condition, messageText) {
    const container = inputElement.closest('.data-box');
    const existingError = container.querySelector('.message-error');

    if (condition) {
        if (existingError) {
            existingError.remove();
        }
        return true;
    }

    if (inputElement.value === '') {
        if (existingError) existingError.remove();
        return false;
    }

    if (existingError && existingError.innerText === messageText) {
        return false;
    }

    if (existingError) {
        existingError.remove();
    }

    const message = document.createElement('div');
    message.classList.add('message-error');
    message.innerText = messageText;
    
    message.style.color = '#C1666B';
    message.style.fontSize = '0.8rem';
    message.style.marginTop = '5px';
    message.style.width = '100%';       
    message.style.display = 'block';   
    message.style.textAlign = 'center'; 
    
    if(getComputedStyle(container).display === 'flex') {
        container.style.flexWrap = 'wrap';
    }

    container.appendChild(message);
    return false;
}

function validateEmail() {
    let isValid = true;

    if (emailInput && emailInput.value !== '') {
        if (!toggleError(emailInput, emailRegex.test(emailInput.value), 'Niepoprawny format e-maila.')) {
            isValid = false;
        }
    }

    if (confirmedEmailInput && emailInput) {
        const areSame = emailInput.value === confirmedEmailInput.value;
        if (!toggleError(confirmedEmailInput, areSame, 'Adresy e-mail nie są identyczne.')) {
            isValid = false;
        }
    }
    
    return isValid;
}

function validatePassword() {
    let isValid = true;

    if (passwordInput && passwordInput.value !== '') {
        const isComplex = passwordRegex.test(passwordInput.value);
        const errorMsg = 'Min. 8 znaków, mała i duża litera, cyfra, znak spec.';
        
        if (!toggleError(passwordInput, isComplex, errorMsg)) {
            isValid = false;
        }
    }

    if (confirmedPasswordInput && passwordInput) {
        const areSame = passwordInput.value === confirmedPasswordInput.value;
        if (!toggleError(confirmedPasswordInput, areSame, 'Hasła nie są identyczne.')) {
            isValid = false;
        }
    }

    return isValid;
}

if(emailInput) emailInput.addEventListener('keyup', validateEmail);
if(confirmedEmailInput) confirmedEmailInput.addEventListener('keyup', validateEmail);

if(passwordInput) passwordInput.addEventListener('keyup', validatePassword);
if(confirmedPasswordInput) confirmedPasswordInput.addEventListener('keyup', validatePassword);

form.addEventListener('submit', function(event) {
    let isEmailValid = true;
    let isPasswordValid = true;

    if (emailInput && (emailInput.value !== '' || confirmedEmailInput.value !== '')) {
        const formatOk = emailRegex.test(emailInput.value);
        toggleError(emailInput, formatOk, 'Niepoprawny format e-maila.');
        
        const sameOk = emailInput.value === confirmedEmailInput.value;
        toggleError(confirmedEmailInput, sameOk, 'Adresy e-mail nie są identyczne.');

        if (!formatOk || !sameOk) isEmailValid = false;
    }

    if (passwordInput && (passwordInput.value !== '' || confirmedPasswordInput.value !== '')) {
        const complexityOk = passwordRegex.test(passwordInput.value);
        toggleError(passwordInput, complexityOk, 'Min. 8 znaków, mała i duża litera, cyfra, znak spec.');

        const sameOk = passwordInput.value === confirmedPasswordInput.value;
        toggleError(confirmedPasswordInput, sameOk, 'Hasła nie są identyczne.');

        if (!complexityOk || !sameOk) isPasswordValid = false;
    }

    if(!isEmailValid || !isPasswordValid) {
        event.preventDefault();
        alert('Popraw błędy w formularzu przed zapisaniem.');
    }
});