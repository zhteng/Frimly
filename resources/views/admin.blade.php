<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>后台</title>
    </head>
    <body>
        <div id="root">

        </div>
    </body>
    <script type="text/javascript">
        window.master = @json($master)
    </script>
    <script src="{{ asset('js/admin.js') }}"></script>
</html>
