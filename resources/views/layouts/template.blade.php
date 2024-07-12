<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- favicon-->
    <link rel="icon" href="{{ asset('favicon.ico') }}" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a502e2142c.js" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <style>
        @importurl('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');.font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #2E2E2E;
        }

        .active-nav-link {
            background: #00B6E7;
        }

        .nav-item:hover {
            background: #414141;
        }

        [x-cloak] { display: none }
    </style>

    <livewire:styles />

</head>

<body class="bg-gray-300 font-family-karla flex">
    @yield('content')

    <livewire:scripts />

    @stack('js')
    <script type="text/javascript">
      Livewire.on('alert', function(message1,message2, type){
        Swal.fire(
          message1,
          message2,
          type
        )
      })
    </script>
</body>
</html>
