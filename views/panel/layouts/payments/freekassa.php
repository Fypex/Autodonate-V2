<div class="uk-text-left uk-card uk-card-default uk-card-body uk-width-1-1@m uk-padding-remove-bottom">
    <form id="settings-freekassa" method="post">
        <input type="hidden" value="freekassa" name="system">
        <div style="justify-content: space-between;align-items: center;" class="uk-flex">
            <h3 class="uk-card-title uk-margin-remove">Freekassa</h3>
            <label style="cursor: pointer">
                <input  <?php if (!empty($freekassa['status'])){echo 'checked';}?> name="status" class="uk-checkbox" type="checkbox"> Активировать</label>
        </div>
        <div class="uk-margin">
            <div class="uk-grid-small" uk-grid>
                <div class="uk-width-1-2@s">
                    <?php
                    if ($freekassa['secret_key']){
                        $secret = 'secret-secret-secret';
                    }else{
                        $secret = '';
                    }
                    ?>
                    <input value="<?php echo $secret ?>" name="key" class="uk-input" type="password" placeholder="Секретный ключ">
                </div>
                <div class="uk-width-1-2@s">
                    <input value="<?php echo $freekassa['public'] ?>" name="shop" class="uk-input" type="text" placeholder="Идентификатор магазина">
                </div>
            </div>
            <div class="uk-margin uk-text-right">
                <button class="uk-button uk-button-primary" type="submit">Сохранить</button>
            </div>
        </div>

    </form>
</div>