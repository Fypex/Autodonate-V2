<?php Flight::render('layouts/header'); ?>

<div class="uk-container max-width-600 uk-margin-large-top">
    <div class="uk-card uk-card-default uk-card-body">

        <form id="register_form" class="uk-margin-medium-top" method="post">
            <h2>Создание аккаунта</h2>

            <div class="uk-margin">
                <input name="login" class="uk-input" type="text" placeholder="Логин">
            </div>

            <div class="uk-margin">
                <input name="email" class="uk-input" type="text" placeholder="Почта">
            </div>

            <div class="uk-margin">
                <input name="password" class="uk-input" type="password" placeholder="Пароль">
            </div>

            <div class="uk-margin">
                <input name="password_repeat" class="uk-input" type="password" placeholder="Пароль">
            </div>
            <a href="/login" style="padding: 0 25px;" class="uk-button uk-button-default uk-float-left">Есть аккаунт?</a>
            <button style="padding: 0 25px;" type="submit" class="uk-button uk-button-default uk-float-right">Создать аккаунт</button>

        </form>
    </div>
</div>

<?php Flight::render('layouts/footer'); ?>
