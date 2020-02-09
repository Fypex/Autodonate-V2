<?php Flight::render('layouts/header'); ?>

<div class="uk-container max-width-600 uk-margin-large-top">

    <form id="login_form" method="post" class="uk-margin-medium-top">
        <h2>Авторизация</h2>

        <div class="uk-margin">
            <input name="login" class="uk-input" type="text" placeholder="Логин" required>
        </div>

        <div class="uk-margin">
            <input name="password" class="uk-input" type="password" placeholder="Пароль" required>
        </div>
        <a href="/register" style="padding: 0 25px;" class="uk-button uk-button-default uk-float-left">Нет аккаунта?</a>
        <button style="padding: 0 25px;" type="submit" class="uk-button uk-button-default uk-float-right">Войти</button>

    </form>
</div>

<?php Flight::render('layouts/footer'); ?>
