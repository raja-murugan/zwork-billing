<!-- Main Header-->
<header class="main-header">

    <!--Header-Upper-->
    <div class="header-upper">
        <div class="outer-container">
            <div class="clearfix">

                <div class="pull-left" style="margin-top:15px; margin-right:15px;">
                    <div class="logo"><a href="{{ route('frontend.index') }}"><img src="{{ asset('assets/frontend/images/logo.png') }}" alt=""
                                title=""></a></div>
                </div>

                <!-- Main Menu End-->
                <div class="outer-box clearfix">
                    <ul class="option-list">
                        <li><span
                                class="icon flaticon-phone-symbol-of-an-auricular-inside-a-circle"></span><strong>call:</strong>
                            +91 98426 56590</li>
                        <li><a href="https://api.whatsapp.com/send/?phone=%2B919842656590"target="_blank"><span
                                    class="icon flaticon-sent-mail"></span><strong>Chat With Us</strong></a>
                        </li>
                    </ul>
                </div>

                <div class="nav-outer clearfix">

                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-header">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="{{ Route::is('frontend.index') ? 'current' : '' }}"><a href="{{ route('frontend.index') }}">Home</a></li>

                                <li class="{{ Route::is('frontend.about') ? 'current' : '' }}"><a href="{{ route('frontend.about') }}">About Us</a></li>

                                <li class="{{ Route::is('frontend.service') ? 'current' : '' }}"><a href="{{ route('frontend.service') }}">Service</a></li>

                                <li class="{{ Route::is('frontend.project') ? 'current' : '' }}"><a href="{{ route('frontend.project') }}">Project</a></li>

                                <li class="{{ Route::is('frontend.contactus') ? 'current' : '' }}"><a href="{{ route('frontend.contactus') }}">Contact us</a></li>
                            </ul>
                        </div>

                    </nav>

                </div>

            </div>
        </div>
    </div>
    <!--End Header Upper-->

    <!--Sticky Header-->
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <!--Logo-->
            <div class="logo pull-left">
                <a href="{{ route('frontend.index') }}" class="img-responsive"><img src="{{ asset('assets/frontend/images/logo-small.png') }}" alt=""
                        title=""></a>
            </div>

            <!--Right Col-->
            <div class="right-col pull-right">
                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                        <ul class="navigation clearfix">
                            <li class="{{ Route::is('frontend.index') ? 'current' : '' }}"><a href="{{ route('frontend.index') }}">Home</a></li>

                            <li class="{{ Route::is('frontend.about') ? 'current' : '' }}"><a href="{{ route('frontend.about') }}">About Us</a></li>

                            <li class="{{ Route::is('frontend.service') ? 'current' : '' }}"><a href="{{ route('frontend.service') }}">Service</a></li>

                            <li class="{{ Route::is('frontend.project') ? 'current' : '' }}"><a href="{{ route('frontend.project') }}">Project</a></li>

                            <li class="{{ Route::is('frontend.contactus') ? 'current' : '' }}"><a href="{{ route('frontend.contactus') }}">Contact us</a></li>
                        </ul>
                    </div>
                </nav><!-- Main Menu End-->
            </div>

        </div>
    </div>
    <!--End Sticky Header-->

</header>
<!--End Main Header -->
