<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('fontPage/images/logo.png')}}">

    <title>Shaityoros | | Admin Login</title>
    @include('common._admin_style')
    <style>
        .login-table {
            display: table;
            height: 100%;
            width: 100%;
        }
        body, html {
            height: 100%;
        }
        .login-tablecell {
            display: table-cell;
            vertical-align: middle;
        }

    </style>
</head>
<body class="hold-transition login-page">

        <div class="container">
            @yield('content')

</div>


</body>
</html>