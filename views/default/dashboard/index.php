<?php Flight::render('layouts/header'); ?>

    <div class="uk-container">
        <div class="uk-card uk-card-default uk-card-body">
            <nav class="uk-navbar-container uk-navbar uk-navbar-transparent">
                <div class="uk-navbar-right">
                    <ul class="uk-navbar-nav">


                        <li class="uk-display-inline"><a><img width="25px" class="uk-margin-small-right" src="https://minotar.net/avatar/sky007" alt="avatar"> <?php echo $user['login'] ?></a></li>
                        <?php if (!empty($payments)): ?>
                            <li><a href="#pay_modal" uk-toggle>Пополнить</a></li>
                        <?php endif ?>
                        <li><a><?php if (empty($user['amount'])){echo 0.00;}else{echo $user['amount'];} ?> руб</a></li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>


    <div id="pay_modal" uk-modal>
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div>
                <div class="uk-modal-header uk-text-left">
                    <h2 class="uk-modal-title">Пополнение счёта</h2>
                </div>
                <div class="uk-modal-body uk-text-right">
                    <ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-fade">
                        <?php foreach ($payments as $key => $payment): ?>
                            <li><a href="#"><?php echo $payment['system'] ?></a></li>
                        <?php endforeach ?>
                    </ul>
                    <ul class="uk-switcher uk-margin">
                        <?php foreach ($payments as $key => $payment): ?>
                            <li>
                                <?php Flight::render('dashboard/payment/'.$payment['system']); ?>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="payment_iframe_box" class="uk-flex-top" uk-modal>
        <div style="padding: 0 !important;height: 80vh;margin-top: 0 !important;width: 100vw;" class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-padding-remove">

            <iframe class="payment_iframe" src="" frameborder="0" width="100%" height="100%"></iframe>

        </div>
    </div>

<?php Flight::render('layouts/footer'); ?>