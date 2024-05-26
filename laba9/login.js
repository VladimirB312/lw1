document.addEventListener("DOMContentLoaded", () => {
    const loginData = {
        email: '',
        password: ''
    }

    function isEmailValid(value) {
        const EMAIL_REGEXP = /^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/iu;
        return EMAIL_REGEXP.test(value);
    }

    function removeErrors() {
        errorValidateMessage.classList.add('form__incorrect-error_disabled');
        errorCheckMessage.classList.add('form__check-fields-error_disabled');
        errorEmailEmpty.classList.add('form__email-error_disabled');
        errorEmailFormat.classList.add('form__email-valid-error_disabled');
        errorPasswordEmpty.classList.add('form__password-error_disabled');
        emailField.classList.remove('form__field-red-border');
        passwordField.classList.remove('form__field-red-border');
    }

    function validloginData() {
        let isValidPost = true;
        let emailEmpty = false;
        let passwordEmpty = false;
        let emailValid = true;
        let passwordValid = true;

        if (!emailField.value) {
            errorEmailEmpty.classList.remove('form__email-error_disabled');
            emailField.classList.add('form__field-red-border');
            isValidPost = false;
            emailEmpty = true;
        }

        if (!passwordField.value) {
            errorPasswordEmpty.classList.remove('form__password-error_disabled');
            passwordField.classList.add('form__field-red-border');
            isValidPost = false;
            passwordEmpty = true;
        }

        if (emailField.value && !isEmailValid(emailField.value)) {
            errorEmailFormat.classList.remove('form__email-valid-error_disabled');
            emailField.classList.add('form__field-red-border');
            isValidPost = false;
            emailValid = false;
        }

        if (passwordField.value && (passwordField.value.length < 5)) {
            errorPasswordEmpty.classList.remove('form__password-error_disabled');
            passwordField.classList.add('form__field-red-border');
            isValidPost = false;
            passwordValid = false;
        }

        if (emailEmpty || passwordEmpty) {
            errorCheckMessage.classList.remove('form__check-fields-error_disabled');

            return isValidPost;
        }

        if (!emailValid || !passwordValid) {
            errorValidateMessage.classList.remove('form__incorrect-error_disabled');

            return isValidPost;    
        }

        return isValidPost;
    }

    async function postJSON(data) {
        try {
            const response = await fetch("/api/login.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data),
            });

            if (!response.ok) {
                const result = await response.text(); 
                throw new Error(result)   
            } else {
                const result = await response.url;
                console.log("Success:", result);
                window.location.href = result;
            }
            
        } catch (error) {
            // console.error("Error:", error.message);      
            alert(error.message);  
        }
    }

    function handleloginSubmit(event) {
        event.preventDefault();
        removeErrors();
        
        if (!validloginData()) {
            loginButton.setAttribute('disabled', '');  
            loginButton.classList.add('form__submit_disable');  

            return;
        }

        postJSON(loginData)
        console.log(JSON.stringify(loginData));
    }

    function handleInputEmail(event) {
        if (emailField.value) {
            emailField.classList.add('form__email-field_gray');
        } else {
            emailField.classList.remove('form__email-field_gray');
        }
        errorEmailEmpty.classList.add('form__email-error_disabled');
        errorEmailFormat.classList.add('form__email-valid-error_disabled');
        emailField.classList.remove('form__field-red-border');
        
        rerenderForm()
    }

    function handleInputPassword(event) {
        if (passwordField.value) {
            passwordField.classList.add('form__password-field_gray')
        } else {
            passwordField.classList.remove('form__password-field_gray')
        }
        errorPasswordEmpty.classList.add('form__password-error_disabled');
        passwordField.classList.remove('form__field-red-border');

        rerenderForm()
    }

    function handleViewPassword(event) {
        if (passwordField.type === 'password') {
            viewPasswordButton.classList.add('form__password-view_on');
            passwordField.type = 'text';
        } else {
            viewPasswordButton.classList.remove('form__password-view_on');
            passwordField.type = 'password';
        }
    }

    const loginButton = document.getElementById('loginButton')

    const emailField = document.getElementById('emailField');
    const passwordField = document.getElementById('passwordField');
    const viewPasswordButton = document.getElementById('passwordView');


    const errorValidateMessage = document.querySelector('.form__incorrect-error');
    const errorCheckMessage = document.querySelector('.form__check-fields-error');
    const errorEmailFormat = document.querySelector('.form__email-valid-error');
    const errorEmailEmpty = document.querySelector('.form__email-error');
    const errorPasswordEmpty = document.querySelector('.form__password-error');

    function initEventListeners() {
        loginButton.addEventListener('click', handleloginSubmit);
        emailField.addEventListener('input', handleInputEmail);
        passwordField.addEventListener('input', handleInputPassword);
        viewPasswordButton.addEventListener('click', handleViewPassword);
    }

    function rerenderForm() {
        loginData.email = emailField.value;
        loginData.password = passwordField.value;

        if (emailField.value && passwordField.value) {
            loginButton.removeAttribute('disabled'); 
            loginButton.classList.remove('form__submit_disable');
        } else {
            loginButton.setAttribute('disabled', ''); 
            loginButton.classList.add('form__submit_disable');           
        }       
    }

    initEventListeners()
    rerenderForm()
});