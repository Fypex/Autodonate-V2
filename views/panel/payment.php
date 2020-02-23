<?php Flight::render('panel/layouts/header'); ?>
<?php Flight::render('panel/layouts/menu'); ?>

<div class="container">
    <ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
        <li><a href="#">Freekassa</a></li>
        <li><a href="#">Unitpay</a></li>
    </ul>

    <ul class="uk-switcher uk-margin">
        <li>
            <?php Flight::render('panel/layouts/payments/freekassa'); ?>
        </li>
        <li>
            <?php Flight::render('panel/layouts/payments/unitpay'); ?>
        </li>
    </ul>
</div>

<?php Flight::render('panel/layouts/modals'); ?>
<?php Flight::render('panel/layouts/footer'); ?>