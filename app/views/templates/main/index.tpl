
<div class="row controls">
    <div class="col-sm-5">
        <div class="input-group input-group-sm">
            <span class="input-group-addon">
                Сортувати по стовбцю:
            </span>
            {html_options name='sorting_column' selected=$page->sorting_by  class='form-control'
            id='sorting_column' options=$page->sorting_columns}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="input-group input-group-sm">
            <span class="input-group-addon">
                В порядку:
            </span>
            {html_options name='sorting_order' selected=$page->sorting_order  class='form-control'
            id='sorting_order' options=$page->sorting_orders}
        </div>
    </div>
    <div class="col-sm-3">
        <a href="/records/create" data-describe="Додати запис" class="btn btn-success form-control" id="add_record_btn">Додати запис</a>
    </div>
</div>
<div class="content_wrap">
    {include 'elements/_loading.tpl'}
    <div class="content">
        {include "elements/_table.tpl"}
    </div>
</div>
<nav aria-label="Page navigation" class="text-center">
    <ul class="pagination">
        {for $i=0 to $page->records_amount step $page->records_per_page}
            <li class="page{if $i==0}{' active'}{/if}"><a href="#" data-offset="{$i}">{$i/$page->records_per_page+1}</a></li>
        {/for}
    </ul>
</nav>


