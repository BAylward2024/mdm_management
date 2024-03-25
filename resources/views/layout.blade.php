<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MDAS MDM Management</title>
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css') ?>" type="text/css">

</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Nav -->
            @include('nav')
            <div class="col py-3">

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
                @if(Route::is('alias'))
                @include('alias')
                @endif
            </div>
        </div>
    </div>
    <script src="<?php echo asset('js/bootstrap.bundle.min.js') ?>" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>