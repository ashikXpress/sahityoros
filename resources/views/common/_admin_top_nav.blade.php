<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>

    </ul>

    <!-- SEARCH FORM -->


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li>
        <a href="{{route('adminLogout')}}" style="display: inline-block">{{optional(\Auth::guard('admin')->user())->name}}<i class="fa fa-power-off" aria-hidden="true"></i></a>
        </li>

    </ul>
</nav>