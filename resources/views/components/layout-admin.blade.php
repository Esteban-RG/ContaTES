<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $title ?? 'ContaTES' }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png')}}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">



    </head>

    <body class="index-page">

        <div class="container-fluid d-flex flex-nowrap vh-100" style="padding: 0px">
            
            <x-admin-sidebar>
            </x-admin-sidebar>
    
            <!-- Contenido principal -->
            <div class="container-fluid flex-grow-1 overflow-auto">
                {{ $slot }}
            </div>
        </div>

        



        <!-- Vendor JS Files -->
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script>
            function mostrarFormulario() {
                var formulario = document.querySelector('.new');
                if (formulario.style.display === 'none' || formulario.style.display === '') {
                    formulario.style.display = 'block';
                } else {
                    formulario.style.display = 'none';
                }
            }
        </script>

    </body>

</html>