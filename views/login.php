<?php Flight::render('layouts/header'); ?>

<div class="uk-container max-width-600 uk-margin-large-top">

    <form class="uk-margin-medium-top">
        <h2>Авторизация</h2>

        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="Логин" required>
        </div>

        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="Пароль" required>
        </div>
        <a href="/register" style="padding: 0 25px;" class="uk-button uk-button-default uk-float-left">Нет аккаунта?</a>
        <a id="login" style="padding: 0 25px;" class="uk-button uk-button-default uk-float-right">Войти</a>

    </form>
</div>

<?php Flight::render('layouts/footer'); ?>
