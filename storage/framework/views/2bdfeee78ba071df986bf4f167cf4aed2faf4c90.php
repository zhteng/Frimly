<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title>Laravel</title>
    </head>
    <body>
        <div id="root">

        </div>
    </body>
    <script type="text/javascript">
        window.master = <?php echo json_encode($master, 15, 512) ?>
    </script>
    <script src="<?php echo e(asset('js/admin.js')); ?>"></script>
</html>
