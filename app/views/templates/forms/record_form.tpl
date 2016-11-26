
{$update_mode = isset($record)}
{$captcha_img = \App\core\App::buildCaptcha()->inline()}
<form action="{if $update_mode}{'/records/update/'|cat:$record->id}{else}{'/records/store'}{/if}" id="record_form">
    <fieldset class="form-group">
        <label>Ім'я</label>
        <input value="{if $update_mode}{$record->name}{/if}" class="form-control" name="name" type="text">
    </fieldset>
    <fieldset class="form-group">
        <label>Електронна адреса</label>
        <input value="{if $update_mode}{$record->email}{/if}" class="form-control" name="email" type="email">
    </fieldset>
    <fieldset class="form-group">
        <label>Сайт</label>
        <input value="{if $update_mode}{$record->website}{/if}" class="form-control" name="website" type="text">
    </fieldset>

    {if !$update_mode}
        <img class="captcha" src="{$captcha_img}">
        <a href="/site/captcha" class="btn btn-default captcha_reload"><i class="fa fa-refresh fa-2x"></i></a>
        <fieldset class="form-group">
            <label>Введіть код з картинки </label>
            <input class="form-control input-sm" name="captcha" type="text">
        </fieldset>
    {/if}


    <input type="submit" class="form-control btn btn-success" value="Зберегти">
</form>