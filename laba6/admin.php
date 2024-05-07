<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/styles/stylesadmin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Admin</title>
</head>

<body>
    <main class="container">
        <div class="logo">
            <img src="images/admin_logo.svg" class="logo__image" alt="Logo" width="232" height="46">
            <p class="logo__caption">Log in to start creating</p>
        </div>

        <form class="form" id="form" novalidate>
            <h2 class="form__title">Log In</h2>
            <div class="form__incorrect-error form__incorrect-error_disabled">
                Email or password is incorrect.
            </div>
            <div class="form__check-fields-error form__check-fields-error_disabled">
                A-Ah! Check all fields.
            </div>
            <label class="form__email-label">Email</label>
            <div class="form__email-wrapper">
                <input type="email" id="emailField" name="emailField" class="form__email-field">
                <p class="form__email-error form__email-error_disabled">Email is required.</p>
                <p class="form__email-valid-error form__email-valid-error_disabled">Incorrect email format. Correct format is ****@**.***</p>
            </div>
            <label class="form__password-label">Password</label>
            <div class="form__password-wrapper">
                <input type="password" id="passwordField" name="passwordField" class="form__password-field">
                <button type="button" id="passwordView" class="form__password-view"></button>
                <p class="form__password-error form__password-error_disabled">Password is required.</p>
            </div>
            <input type="submit" class="form__submit" value="Log In">
        </form>
    </main>
    <script src="login.js"></script>
</body>

</html>