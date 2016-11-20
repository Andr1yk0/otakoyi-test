<?php $update_mode = isset($record);
?>
<form action="<?=$update_mode?'/records/update/'.$record->id:'/records/store'?>" id="record_form">
    <fieldset class="form-group">
        <label>Ім'я</label>
        <input value="<?= $update_mode ? $record->name : '' ?>" class="form-control" name="name" type="text">
    </fieldset>
    <fieldset class="form-group">
        <label>Електронна адреса</label>
        <input value="<?= $update_mode ? $record->email : '' ?>" class="form-control" name="email" type="email">
    </fieldset>
    <fieldset class="form-group">
        <label>Сайт</label>
        <input value="<?= $update_mode ? $record->website : '' ?>" class="form-control" name="website" type="text">
    </fieldset>
    <?php if (!$update_mode): ?>
        <img class="captcha" src="<?=\App\core\App::buildCaptcha()->inline();?>">
        <a href="/site/captcha" class="btn btn-default captcha_reload"><i class="fa fa-refresh fa-2x"></i></a>
        <fieldset class="form-group">
            <label>Введіть код з картинки </label>
            <input class="form-control input-sm" name="captcha" type="text">
        </fieldset>

    <?php endif ?>
    <input type="submit" class="form-control btn btn-success" value="Зберегти">
</form>