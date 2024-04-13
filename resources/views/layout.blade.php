<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MDAS MDM Management</title>
    <link rel="stylesheet" href="<?php echo asset('css/styles.css') ?>" type="text/css">
</head>

<body>
    <div class="">
        <!-- Nav -->
        @include('nav')
        <div class="container">


            <!-- Page Content -->
            @if(Route::is('distribution'))
            @include('distr')
            @endif
            @if(Route::is('distribution-filter'))
            @include('distr')
            @endif
            @if(Route::is('editions'))
            @include('edition')
            @endif
            @if(Route::is('versions'))
            @include('version')
            @endif

            @if(Route::is('os'))
            @include('os')
            @endif

            @if(Route::is('alias.os'))
            @include('alias')
            @endif
            @if(Route::is('alias.partner'))
            @include('alias')
            @endif


            @if(Route::is('alias'))
            @include('alias')
            @endif

            @if(Route::is('aliasmodel'))
            @include('aliasmodel')
            @endif
        </div>
    </div>
</body>

</html>