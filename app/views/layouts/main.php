<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/main.css">
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
    <?= $content ?>


</div>
    <div class="modal fade" tabindex="-1" role="dialog" id="login_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Вхід</h4>
                </div>
                <div class="modal-body">
                    <?php require views_path().'forms/login_form.php' ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="record_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <div class="hidden_elements hidden">
    <div class="form_error">
        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
        <span class="error_text"></span>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--    <script src="/public/js/jquery-3.1.1.min.js"></script>-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>