<?php Flight::render('layouts/header'); ?>

    <div class="container">
        <div class="uk-card uk-card-default uk-card-body main-card">
            <h2 class="uk-text-left uk-inline-clip">Привилегии</h2>
            <div class="row">
            <?php foreach ($products as $product): ?>

                    <div class="col-md-4">
                        <div class="uk-card uk-card-default uk-card-body card-products uk-margin-small-top">
                            <form id="buy-product-<?php echo $product['id']?>" method="post">
                                <div class="row">
                                    <div class="col-md-12 uk-text-left title-product-wrapper">
                                        <p class="uk-margin-remove title-product"><?php echo $product['name']?></p>
                                        <p class="uk-margin-remove price-product"><?php echo $product['price']?>руб</p>
                                    </div>
                                    <div class="col-md-12 uk-text-left title-product-wrapper">
                                    <?php if ($product['period']): ?>
                                        <p class="uk-margin-remove title-product">Дней:</p>
                                        <p class="uk-margin-remove price-product"><?php echo $product['amount_days']?></p>
                                    <?php else: ?>
                                        <p class="uk-margin-remove title-product">Дней:</p>
                                        <p class="uk-margin-remove price-product">Навсегда</p>
                                    <?php endif ?>
                                    </div>

                                    <div class="col-md-12">
                                        <input type="hidden" value="<?php echo $product['id']?>" name="id">
                                    </div>
                                    <div class="col-md-12 uk-margin-small-top">
                                        <a id="<?php echo $product['id']?>" class="uk-button uk-button-default uk-width-2-2" onclick="buyProduct(this)">Купить</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php endforeach ?>
            </div>
        </div>

        <div style="margin-top: 25px" class="uk-card uk-card-default uk-card-body main-card">
            <h2 class="uk-text-left uk-inline-clip">Ключи</h2>
            <div class="row">
            <?php foreach ($products as $product): ?>
                <?php if ($product['type'] == 'case'): ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="uk-card uk-card-default uk-card-body card-products uk-margin-small-top">
                            <form id="buy-product-<?php echo $product['id']?>" method="post">
                                <div class="row">
                                    <div class="col-md-12 uk-text-left title-product-wrapper">
                                        <p class="uk-margin-remove title-product"><?php echo $product['name']?></p>
                                        <p class="uk-margin-remove price-product"><?php echo $product['price']?>руб</p>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" value="<?php echo $product['id']?>" name="id">
                                </div>
                                    <div class="col-md-12 uk-margin-small-top">
                                        <a id="<?php echo $product['id']?>" class="uk-button uk-button-default uk-width-2-2" onclick="buyProduct(this)">Купить</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endif ?>
            <?php endforeach ?>
            </div>
        </div>

    </div>

<?php Flight::render('layouts/footer'); ?>