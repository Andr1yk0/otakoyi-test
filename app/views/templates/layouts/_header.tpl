<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/public/css/main.css">
    <title></title>


</head>
<body>
<div class="container-fluid">
    <div class="row">
        <header>
            <?php if (\App\core\App::isAdmin()): ?>
            <div class="text-right">
                <span>Ви увійшли як Admin </span>
                <a href="/auth/logout" class="btn btn-warning">Вийти</a>
            </div>

            <?php else: ?>
            <button class="btn btn-default pull-right" data-toggle="modal" data-target="#login_modal">Вхід</button>
            <?php endif ?>
        </header>
    </div>