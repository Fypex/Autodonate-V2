<?php Flight::render('panel/layouts/header'); ?>
<?php Flight::render('panel/layouts/menu'); ?>

<div class="container uk-text-right">
    <a class="uk-button uk-button-primary" onclick="clear_all_fields()" href="#modal-privileges" uk-toggle>Добавить привилегию</a>
</div>
<div class="container">

    <div class="row">
        <?php foreach ($privileges as $key => $privilege): ?>

            <div class="col-lg-6">
                <div class="uk-card uk-card-default uk-card-body card-products uk-margin-small-top">
                    <form id="buy-product-1" method="post">
                        <div class="row">
                            <div class="col-md-12 uk-text-left title-product-wrapper">
                                <p class="uk-margin-remove title-product"><?php echo $privilege['name'] ?></p>
                                <p class="uk-margin-remove price-product"><?php echo $privilege['price'] ?> руб</p>
                            </div>
                            <div class="col-md-12 uk-text-center title-product-wrapper">
                                <p class="uk-margin-remove title-product"><?php if (!$privilege['period']){echo 'Навсегда';}else{ echo $privilege['amount_days'].' Дней';} ?></p>
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" value="1" name="id">
                            </div>
                            <div class="col-md-12 uk-margin-small-top">
                                <a id="<?php echo $privilege['id'] ?>" class="uk-button uk-button-default uk-width-2-2" onclick="privilege_update(<?php echo $privilege['id'] ?>)">Редактировать</a>
                                <a href="#confirmation-modal-<?php echo $privilege['id'] ?>" uk-toggle class="uk-button uk-button-danger uk-width-2-2">Удалить</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div id="confirmation-modal-<?php echo $privilege['id'] ?>" class="uk-flex-top" uk-modal>
                <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-left">
                    <h4>Вы уверены что хотите удалить привилегию?</h4>
                    <p>Данное действие нельзя отменить!</p>
                    <div class="uk-text-right">
                        <a onclick="UIkit.modal('#confirmation-modal-<?php echo $privilege['id'] ?>').hide()" style="padding: 0 10px;" class="uk-button uk-button-default" href="#">Отмена</a>
                        <a style="padding: 0 10px;" onclick="privilege_delete(<?php echo $privilege['id'] ?>)" class="uk-button uk-button-danger">Удалить</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>


<?php Flight::render('panel/layouts/modals'); ?>
<?php Flight::render('panel/layouts/footer'); ?>
