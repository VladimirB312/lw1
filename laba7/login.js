const emailField = document.getElementById('emailField')
const passwordField = document.getElementById('passwordField')
const viewPasswordButton = document.getElementById('passwordView')
const EMAIL_REGEXP = /^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/iu;
const errorValidateMessage = document.querySelector('.form__incorrect-error')
const errorCheckMessage = document.querySelector('.form__check-fields-error')
const errorEmailFormat = document.querySelector('.form__email-valid-error')
const errorEmailEmpty = document.querySelector('.form__email-error')
const errorPasswordEmpty = document.querySelector('.form__password-error')

emailField.onchange = function () {
    if (emailField.value) {
        emailField.classList.add('form__email-field_gray')
    } else {
        emailField.classList.remove('form__email-field_gray')
    }
}

passwordField.onchange = function () {
    if (passwordField.value) {
        passwordField.classList.add('form__password-field_gray')
    } else {
        passwordField.classList.remove('form__password-field_gray')
    }
}

viewPasswordButton.onclick = function () {
    if (passwordField.type === 'password') {
        viewPasswordButton.classList.add('form__password-view_on')
        passwordField.type = 'text'
    } else {
        viewPasswordButton.classList.remove('form__password-view_on')
        passwordField.type = 'password'
    }
}

function isEmailValid(value) {
    return EMAIL_REGEXP.test(value);
}

function handleFormSubmit(event) {
    event.preventDefault()

    errorValidateMessage.classList.add('form__incorrect-error_disabled')
    errorCheckMessage.classList.add('form__check-fields-error_disabled')
    errorEmailEmpty.classList.add('form__email-error_disabled')
    errorEmailFormat.classList.add('form__email-valid-error_disabled')
    errorPasswordEmpty.classList.add('form__password-error_disabled')
    emailField.classList.remove('form__field-red-border')
    passwordField.classList.remove('form__field-red-border')

    if (!emailField.value && !passwordField.value) {
        console.log('empty password and email')
        errorCheckMessage.classList.remove('form__check-fields-error_disabled')
        errorEmailEmpty.classList.remove('form__email-error_disabled')
        errorPasswordEmpty.classList.remove('form__password-error_disabled')
        emailField.classList.add('form__field-red-border')
        passwordField.classList.add('form__field-red-border')

        return 0
    }

    if (!isEmailValid(emailField.value) && (passwordField.value.length < 6)) {
        console.log('invalid empty password and email')
        errorCheckMessage.classList.remove('form__check-fields-error_disabled')
        errorEmailFormat.classList.remove('form__email-valid-error_disabled')
        errorPasswordEmpty.classList.remove('form__password-error_disabled')
        emailField.classList.add('form__field-red-border')
        passwordField.classList.add('form__field-red-border')

        return 0
    }

    if (!isEmailValid(emailField.value) || !emailField.value) {
        console.log('invalid or empty email')
        errorValidateMessage.classList.remove('form__incorrect-error_disabled')
        emailField.classList.add('form__field-red-border')

        if (!isEmailValid(emailField.value)) {
            errorEmailFormat.classList.remove('form__email-valid-error_disabled')
        } else {
            errorEmailEmpty.classList.remove('form__email-error_disabled')  
        }

        return 0
    }

    if (passwordField.value.length < 6) {
        console.log('invalid or empty password  ') 
        errorValidateMessage.classList.remove('form__incorrect-error_disabled')
        passwordField.classList.add('form__field-red-border')
        errorPasswordEmpty.classList.remove('form__password-error_disabled')
    }

}

const applicantForm = document.getElementById('form')
applicantForm.addEventListener('submit', handleFormSubmit)