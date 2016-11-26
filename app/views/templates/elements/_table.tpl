
<table class="table records">
    <tr>
        <th>Ім'я</th>
        <th>Email</th>
        <th>Cайт</th>
        <th>ip адреса</th>
        <th>браузер</th>
        <th>Дата створення</th>
        {if $is_admin}
            <th></th>
        {/if}
    </tr>
    {foreach from=$page->records_on_page item=record}
        <tr>
            <td>{$record->name}</td>
            <td>{$record->email}</td>
            <td>{$record->website}</td>
            <td>{$record->ip}</td>
            <td>{$record->browser}</td>
            <td>{$record->created_at}</td>
            {if $is_admin}
                <td>
                    <a href="/records/delete/{$record->id}" class="btn btn-xs btn-danger delete_btn">
                        <i class="fa fa-remove"></i>
                    </a>
                    <a href="/records/edit/{$record->id}" data-describe="Редагувати запис" class="btn btn-xs btn-warning edit_btn">
                        <i class="fa fa-pencil"></i>
                    </a>
                </td>
            {/if}
        </tr>
    {/foreach}
</table>