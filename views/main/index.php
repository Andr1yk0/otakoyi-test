<?php
/**
 * @var App\Models\RecordsPage $page
 * @var array $sorting_columns - поля для сортування
 * @var int $records_amount - загальна кількість записів
 * @var int $records_per_page - кількість записів на одну сторінку
 *
 */

?>


<div class="row controls">
    <div class="col-sm-5">
        <div class="input-group input-group-sm">
            <span class="input-group-addon">
                Сортувати по стовбцю:
            </span>
            <select class="form-control" id="sorting_column">
                <?php foreach($page->sorting_columns as $i=>$column):?>
                    <option value="<?=$i?>" <?=$page->sorting_by['name']===$column['name']?'selected':''?>><?=$column['label']?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="input-group input-group-sm">
            <span class="input-group-addon">
                В порядку:
            </span>
            <select class="form-control" id="sorting_order">
                <?php foreach($page->sorting_orders as $i=>$order):?>
                    <option value="<?=$i?>" <?=$page->sorting_order['name']===$order['name']?'selected':''?>><?=$order['label']?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="col-sm-3">
        <a href="/records/create" data-describe="Додати запис" class="btn btn-success form-control" id="add_record_btn">Додати запис</a>
    </div>
</div>
<div class="content_wrap">

    <?php require_once BASE_PATH.'/views/elements/_loading.php';?>
    <div class="content">
        <?php require_once BASE_PATH.'/views/elements/_table.php';?>
    </div>
</div>
<nav aria-label="Page navigation" class="text-center">
    <ul class="pagination">
<!--        <li class="previous">-->
<!--            <a href="#" aria-label="Previous">-->
<!--                <span aria-hidden="true">&laquo;</span>-->
<!--            </a>-->
<!--        </li>-->
        <?php
        for($i=0;$i<$page->records_amount;$i+=$page->records_per_page): ?>
            <li class="page <?=$i==0?'active':''?>"><a href="#" data-offset="<?=$i?>"><?=$i/$page->records_per_page+1?></a></li>
        <?php endfor ?>
<!--        <li class="next">-->
<!--            <a href="#" aria-label="Next">-->
<!--                <span aria-hidden="true">&raquo;</span>-->
<!--            </a>-->
<!--        </li>-->
    </ul>
</nav>


