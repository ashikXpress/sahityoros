<!doctype html>
<html lang="en">
<head>
@include('common._user_style')

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('fontPage/images/logo.png')}}">

    <title>Shaityoros</title>
</head>
<body>
<!-- preloder start -->

<div class="preloder"></div>
<!-- preloder end -->

<!--   	header area start -->
@include('common._user_header')
<!--   	header area end -->

<!--   	main section start -->

<section class="main-section">
    <div class="container-fluid">
        <div class="row">
            @include('common._user_left_side_adds')

            <div class="col-md-6 col-sm-6 order-item-2">
                <div class="main-content">
                    @yield('content')
                </div>
            </div>

            @include('common._user_right_side_adds')
        </div>
    </div>
</section>

<!--   	main section end -->

<!--   	footer area start -->

@include('common._user_footer')
<!--   	footer area end -->

<!--jQuery  -->
@include('common._user_script')
</body>
</html>