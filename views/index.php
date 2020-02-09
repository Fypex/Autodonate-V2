<?php Flight::render('layouts/header'); ?>

    <div class="container">
        <div class="uk-card uk-card-default uk-card-body main-card">
            <h2 class="uk-text-left uk-inline-clip">Привилегии</h2>
            <div class="row">
            <?php foreach ($products as $product): ?>
                <?php if ($product['type'] == 'privilage'): ?>
                    <div class="col-md-4">
                        <div class="uk-card uk-card-default uk-card-body card-products uk-margin-small-top">
                            <form id="buy-product-<?php echo $product['id']?>" method="post">
                                <div class="row">
                                    <div class="col-md-12 uk-text-left title-product-wrapper">
                                        <p class="uk-margin-remove title-product"><?php echo $product['name']?></p>
                                        <p class="uk-margin-remove price-product"><?php echo $product['price']?>руб</p>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" value="<?php echo $product['id']?>" name="id">
                                        <input class="uk-input" type="text" placeholder="Ваш ник" name="name">
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

        <div class="uk-card uk-card-default uk-card-body main-card mt-3">
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
                                        <input class="uk-input" type="text" placeholder="Ваш ник" name="name">
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

        <div class="uk-card uk-card-default uk-card-body uk-margin-medium-top uk-padding-remove">
            <script type="text/javascript" src="https://vk.com/js/api/openapi.js?159"></script>

            <!-- VK Widget -->
            <div id="vk_groups"></div>
            <script type="text/javascript">
                VK.Widgets.Group("vk_groups", {mode: 4,width: 'auto',height: '350px'}, <?php echo $widget['id'] ?>);
            </script>
        </div>
    </div>

<?php Flight::render('layouts/footer'); ?>