<header class="header-area">
    <div class="extra-bg"></div>
    <div class="container-fluid">
        <!-- login and reg area -->
        <div class="user-login-area">
            <p>
                @if(\Auth::guest())
                    <a href="{{route('userLogin')}}" class="login-btn bg-btn-same">লগইন করুন</a>
                    <a href="{{route('createUser')}}" class="reg-btn bg-btn-same">নিবন্ধন করুন </a>
                @else

                    <a  href="{{route('userLogout')}}" class="btn btn bg-btn-same">লগ আউট</a>
                    <a  href="{{route('userProfile')}}" class="btn btn bg-btn-same">প্রোফাইল</a>


                @endif
            </p>
        </div>

        <!-- 	login and reg area end -->


        <div class="row">
            <div class="mobile-nav"></div>
            <div class="col-md-2 col-sm-2  text-center">
                <div class="logo-area">
                    <a href="{{route('showHome')}}"><img src="{{asset('fontPage/images/logo.png')}}" alt="Not found"></a>
                </div>
            </div>
            <div class="col-md-10 col-sm-10 text-right xs-hide">
                <div class="main-menu-area">
                    <ul id="nav">
                        <li><a class="@if($uril=='createPost') active @endif" href="{{url('createPost')}}">পোষ্ট করুন</a></li>
                        <li><a class="@if($uril=='createManuscript') active @endif" href="{{route('createManuscript')}}">বই প্রকাশের জন্য পাণ্ডুলিপি জমা দিন</a></li>

                        <li><a class="@if($uril=='monthWiseDoc') active @endif" href="{{url('monthWiseDoc')}}">{{optional($selectedCategory)->month_category.'  '}}সংখ্যার লেখা জমা দিন</a></li>

                        <li><a href="">শ্রাবন সংখ্যার সূচীপত্র</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>