<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name') }}</title>
</head>

<body>

    <div class="main-wrapper">

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <!-- header -->
            <!-- sidbar -->

            <div class="content container-fluid">
                <!-- conteudo -->
                @yield('content')
                <!-- diretiva yield -->
            </div>

            <!-- Footer -->
            <footer>
                <p>Copyright © 2020 Dreamguys.</p>
            </footer>
            <!-- /Footer -->

        </div>
    </div>

</body>

</html>
