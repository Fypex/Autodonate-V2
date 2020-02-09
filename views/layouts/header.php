<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_ENV['ST_NAME'] ?></title>
    <meta name="description" content="<?php echo $_ENV['ST_DESC'] ?>">
    <meta name="keywords" content="<?php echo $_ENV['ST_KEYWORDS'] ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-v4-grid-only@1.0.0/dist/bootstrap-grid.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.20/css/uikit.min.css">


    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700&subset=cyrillic">
</head>
<body>
    <nav class="uk-navbar-container nav-full" uk-navbar>
        <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
                <li><a href="/"><h3 class="uk-text-lead title"><?php echo $_ENV['ST_NAME'] ?></h3></a></li>
            </ul>
        </div>
        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">

                <?php if (empty($_SESSION['user'])){echo '<li><a href="/login">Войти</a></li>';} ?>
                <?php if (empty($_SESSION['user'])){echo '<li><a href="/register">Создать аккаунт</a></li>';} ?>
                <?php if (!empty($_SESSION['user'])){echo '<li><a href="/logout">Выйти</a></li>';} ?>

            </ul>
        </div>
    </nav>


    <h3 id="menu" class="uk-text-lead title uk-margin-remove title-mobile"><?php echo $_ENV['ST_NAME'] ?></h3>
    <nav class="uk-navbar-container mobile-menu" uk-navbar>
        <div class="uk-navbar-center">
            <ul class="uk-navbar-nav nav-mobile">
                <li><a href="/login" uk-toggle>Войти</a></li>
                <li><a href="/register" uk-toggle>Создать аккаунт</a></li>
            </ul>
        </div>
    </nav>

<!--  Modal   -->
    <div id="modal-rules" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <h2 class="uk-modal-title">Правила</h2>

            <ul class="uk-subnav uk-subnav-pill" uk-switcher>
                <li><a href="#">Основные</a></li>
                <li><a href="#">Правила поведения</a></li>
            </ul>
            <ul class="uk-switcher uk-margin">
                <li class="uk-text-left">
                    <p>Основные</p>
                </li>
                <li class="uk-text-left">
                    <p>Правила поведения</p>
                </li>
            </ul>

            <p class="uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Закрыть</button>
            </p>
        </div>
    </div>

<!--  Modal   -->
    <div id="modal-contacts" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <h2 class="uk-modal-title">Контакты</h2>
                <div class="container uk-text-center">
                    <p class="uk-text-bold uk-display-inline">Контактная почта: </p><span><?php echo  $contacts['mail'] ?></span>
                    <br>
                    <p class="uk-text-bold uk-display-inline">Администратор: </p><span><a target="_black" href="<?php echo  $contacts['admin'] ?>"><?php echo $contacts['admin'] ?></a></span>
                    <br>
                    <p class="uk-text-bold uk-display-inline">Группа сервера: </p><span><a target="_blank" href="<?php echo  $contacts['group-server'] ?>"><?php echo $contacts['group-server'] ?></a></span>
                </div>
            <p class="uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Закрыть</button>
            </p>
        </div>
    </div>
<!--  Modal   -->