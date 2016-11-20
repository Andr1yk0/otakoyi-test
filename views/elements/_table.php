
<?php
/**
 * @var App\Models\RecordsPage $page
 */
?>
<table class="table records">
    <tr>
        <th>Ім'я</th>
        <th>Email</th>
        <th>Cайт</th>
        <th>ip адреса</th>
        <th>браузер</th>
        <th>Дата створення</th>
        <?php if(\App\core\App::isAdmin()): ?>
            <th></th>
        <?php endif?>
    </tr>
    <?php foreach($page->records_on_page as $record): ?>
        <tr>
            <td><?=$record->name?></td>
            <td><?=$record->email?></td>
            <td><?=$record->website?></td>
            <td><?=$record->ip?></td>
            <td><?=$record->browser?></td>
            <td><?=$record->created_at?></td>
            <?php if(\App\core\App::isAdmin()): ?>
                <td>
                    <a href="/records/delete/<?=$record->id?>" class="btn btn-xs btn-danger delete_btn">
                        <i class="fa fa-remove"></i>
                    </a>
                    <a href="/records/edit/<?=$record->id?>" data-describe="Редагувати запис" class="btn btn-xs btn-warning edit_btn">
                        <i class="fa fa-pencil"></i>
                    </a>
                </td>
            <?php endif?>
        </tr>
    <?php endforeach;?>
</table>