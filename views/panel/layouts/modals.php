<div id="modal-privileges" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h3 id="modal_create_edit_title"></h3>

        <form id="create_privilege_form" method="post">

            <input name="id" class="uk-input" id="privilege_id" type="hidden">

            <div class="uk-margin uk-text-left">
                <label class="uk-form-label" for="form-stacked-text">Название привилегии</label>
                <div class="uk-form-controls">
                    <input name="name" class="uk-input" id="privilege_name" type="text" placeholder="Премиум" required>
                </div>
            </div>

            <div class="uk-margin uk-text-left">
                <label class="uk-form-label" for="form-stacked-text">Команда выдачи</label>
                <div class="uk-form-controls">
                    <input name="command" class="uk-input" id="command_field" type="text" placeholder="pex user [user] group set premium" required>
                </div>
            </div>

            <div class="uk-margin uk-text-left">
                <label class="uk-form-label" for="form-stacked-text">Цена покупки. руб</label>
                <div class="how_many_pay_user">
                    <input name="price_field" onkeyup="how_many_pay()" class="uk-input" id="how_many_pay_user" type="number" placeholder="200" required>
                </div>
            </div>

            <div class="uk-margin uk-text-left">
                <label class="uk-form-label" for="discount">Скидка %</label>
                <div class="uk-form-controls">
                    <input name="discount_field" onkeyup="how_many_pay()" class="uk-input" id="discount" type="number" min="0" max="100" placeholder="18" required>
                </div>
            </div>

            <div class="uk-margin uk-text-left">
                <label class="uk-form-label" for="total">Итого</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="total" type="text" placeholder="0" disabled>
                </div>
            </div>

            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                <label style="cursor:pointer;"><input name="issuing_period_field" onchange="issuing_period_func(this)" id="issuing_period" class="uk-checkbox" type="checkbox"> На время</label>
            </div>

            <div id="number_of_days_wrapper" class="uk-margin uk-text-left" style="display: none;">
                <label class="uk-form-label" for="number_of_days">Количество дней</label>
                <div class="uk-form-controls">
                    <input name="amount_days" min="0" id="number_of_days" class="uk-input" type="number" placeholder="30">
                </div>
            </div>

            <div id="reset_command_wrapper" class="uk-margin uk-text-left" style="display: none;">
                <label class="uk-form-label" for="reset_command_wrapper">Команда для сброса привилегии</label>
                <div class="uk-form-controls">
                    <input name="reset_command" id="reset_command" class="uk-input" type="text" placeholder="pex user [user] group set default">
                </div>
            </div>

            <p class="uk-text-right">
                <button style="padding: 0 10px;" class="uk-button uk-button-default uk-modal-close" type="button">Закрыть</button>
                <button style="padding: 0 10px;" class="uk-button uk-button-primary" type="submit">Ok</button>
            </p>

        </form>
    </div>
</div>