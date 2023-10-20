{{-- @extends('layout.frontend.guest')

@section('content')
    <!--Main Slider-->
    <section class="main-slider">

        <div class="main-slider-carousel owl-carousel owl-theme">

            <div class="slide"
                style="background-image: url('{{ asset('assets/frontend/images/main-slider/image-1.jpg') }}');">
                <div class="auto-container">
                    <div class="content">
                        <h2>Doors</h2>
                        <h3>There is always space for <span>Another One.</span></h3>
                        <div class="text">UPVC Doors with extra space to abopt with all your needs!</div>
                        <div class="link-box">
                            <a href="#" class="theme-btn btn-style-one"><span
                                    class="arrow flaticon-right-arrow-4"></span>About Company</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slide"
                style="background-image: url('{{ asset('assets/frontend/images/main-slider/image-2.jpg') }}');">
                <div class="auto-container">
                    <div class="content">
                        <h2>Windows</h2>
                        <h3>That Available in Wide Range of <span>Colors.</span></h3>
                        <div class="text">UPVC windows that let you experience the nature as it is!
                        </div>
                        <div class="link-box">
                            <a href="#" class="theme-btn btn-style-one"><span
                                    class="arrow flaticon-right-arrow-4"></span>About Company</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slide"
                style="background-image: url('{{ asset('assets/frontend/images/main-slider/image-3.jpg') }}');">
                <div class="auto-container">
                    <div class="content">
                        <h2>Prices</h2>
                        <h3>Not Cheap but afforable for <span>Your Dream!</span></h3>
                        <div class="text">Priced with flexibility, always considering your budget as a top priority.</div>
                        <div class="link-box">
                            <a href="#" class="theme-btn btn-style-one"><span
                                    class="arrow flaticon-right-arrow-4"></span>About Company</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--End Main Slider-->

    <!--Welcome Section-->
    <section class="welcome-section">

        <div class="auto-container">
            <!--Sec Title-->
            <div class="sec-title">
                <h2>Welcome to <span class="theme_color">Anand Traders</span></h2>
            </div>
            <div class="row clearfix">

                <!--Image Column-->
                <div class="image-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column wow slideInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="{{ asset('assets/frontend/images/resource/welcome-1.jpg') }}" alt="" />
                        </div>
                    </div>
                </div>

                <!--Content Column-->
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h2>Your Ultimate Destination <br> for UPVC Windows and Doors!</h2>
                        <div class="text">
                            <p>At Anand Traders, we are dedicated to serving you with top-quality UPVC windows and doors
                                that not only enhance the aesthetics of your space but also provide superior durability and
                                energy efficiency. With a commitment to excellence and a passion for customer satisfaction,
                                we are your trusted partner in transforming your living spaces.</p>
                            <p>Discover a world of possibilities with our extensive range of UPVC windows and doors,
                                available in a wide variety of designs, colors, and sizes to suit your unique needs. Whether
                                you're renovating your home or working on a new project, our team is here to assist you
                                every step of the way.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!--Address Box-->
        <section class="address-box">
            <div class="inner-box" style="background-image: url(images/background/pattern-1.png)">
                <div class="icon-box">
                    <span class="icon flaticon-place"></span>
                </div>
                <h2>Address</h2>
                <div class="text">#14, Ganesh Complex, Vayalur Road, Kumaran Nagar, Trichy, <br> Tamil Nadu, India - 620
                    017.</div>
            </div>
        </section>
        <!--End Address Box-->

    </section>
    <!--End Welcome Section-->

    <section class="services-section">
        <div class="outer-container">
            <div class="auto-container">
                <!--Sec Title-->
                <div class="sec-title centered">
                    <div class="title-inner">
                        <h2>Our Main <span class="theme_color">Services</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-item-carousel owl-carousel owl-theme">

                <!--Services Block-->
                <div class="services-block">
                    <div class="inner-box">
                        <div class="image-outer">
                            <div class="image">
                                <img src="{{ asset('assets/frontend/images/resource/service-1.jpg') }}" alt="" />
                                <a href="{{ asset('assets/frontend/images/resource/service-1.jpg') }}"
                                    class=" lightbox-image" data-fancybox="services-gallery" data-caption=""><span
                                        class="plus flaticon-plus-symbol"></span></a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <div class="big-icon flaticon-window"></div>
                            <div class="icon-box">
                                <span class="icon flaticon-window"></span>
                            </div>
                            <h3><a href="javascript::void(o);">PVC Doors and Cupboards</a></h3>
                            <div class="text">Durable PVC solutions for doors and storage that enhance your space.</div>
                        </div>
                    </div>
                </div>

                <!--Services Block-->
                <div class="services-block">
                    <div class="inner-box">
                        <div class="image-outer">
                            <div class="image">
                                <img src="{{ asset('assets/frontend/images/resource/service-2.jpg') }}" alt="" />
                                <a href="{{ asset('assets/frontend/images/resource/service-2.jpg') }}"
                                    class=" lightbox-image" data-fancybox="services-gallery" data-caption=""><span
                                        class="plus flaticon-plus-symbol"></span></a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <div class="big-icon flaticon-doorway"></div>
                            <div class="icon-box">
                                <span class="icon flaticon-doorway"></span>
                            </div>
                            <h3><a href="javascript::void(o);">Solid PVC & WPVC Doors</a></h3>
                            <div class="text">Sturdy and secure doors for added safety and elegance.</div>
                        </div>
                    </div>
                </div>

                <!--Services Block-->
                <div class="services-block">
                    <div class="inner-box">
                        <div class="image-outer">
                            <div class="image">
                                <img src="{{ asset('assets/frontend/images/resource/service-3.jpg') }}" alt="" />
                                <a href="{{ asset('assets/frontend/images/resource/service-3.jpg') }}"
                                    class=" lightbox-image" data-fancybox="services-gallery" data-caption=""><span
                                        class="plus flaticon-plus-symbol"></span></a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <div class="big-icon flaticon-car-parts"></div>
                            <div class="icon-box">
                                <span class="icon flaticon-car-parts"></span>
                            </div>
                            <h3><a href="javascript::void(o);">UPVC Window & Door</a></h3>
                            <div class="text">Crafted UPVC windows and doors designed for energy efficiency and aesthetics.</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--Fluid Section One-->
    <section class="fluid-section-one">
        <div class="outer-container clearfix">

            <!--Content Column-->
            <div class="content-column clearfix">
                <div class="inner-column">
                    <div class="sec-title">
                        <h2>Upvc Key <span class="theme_color">Features</span></h2>
                    </div>

                    <div class="single-vertical-carousel">

                        <div class="slide">

                            <!--Key Block-->
                            <div class="key-block">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <span class="icon flaticon-rain"></span>
                                        <span class="number">1</span>
                                    </div>
                                    <div class="content">
                                        <h3><a href="javascript::void(o);">Energy Efficiency</a></h3>
                                        <div class="text">UPVC's natural insulating properties help maintain indoor temperatures, reducing energy consumption and utility costs.</div>
                                    </div>
                                </div>
                            </div>

                            <!--Key Block-->
                            <div class="key-block">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <span class="icon flaticon-handle"></span>
                                        <span class="number">2</span>
                                    </div>
                                    <div class="content">
                                        <h3><a href="javascript::void(o);">Low Maintenance</a></h3>
                                        <div class="text">UPVC is easy to clean and does not require painting, ensuring a hassle-free, long-lasting solution.</div>
                                    </div>
                                </div>
                            </div>

                            <!--Key Block-->
                            <div class="key-block">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <span class="icon flaticon-speaker-1"></span>
                                        <span class="number">3</span>
                                    </div>
                                    <div class="content">
                                        <h3><a href="javascript::void(o);">Rot and Corrosion Resistance</a></h3>
                                        <div class="text">Unlike traditional materials, UPVC does not rot, corrode, or deteriorate over time, ensuring extended product life.</div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="slide">

                            <!--Key Block-->
                            <div class="key-block">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <span class="icon flaticon-rain"></span>
                                        <span class="number">4</span>
                                    </div>
                                    <div class="content">
                                        <h3><a href="javascript::void(o);">Environmentally Friendly</a></h3>
                                        <div class="text">UPVC is recyclable and energy-efficient, making it an eco-friendly choice for sustainable construction and design.</div>
                                    </div>
                                </div>
                            </div>

                            <!--Key Block-->
                            <div class="key-block">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <span class="icon flaticon-handle"></span>
                                        <span class="number">5</span>
                                    </div>
                                    <div class="content">
                                        <h3><a href="javascript::void(o);">Customizable Design</a></h3>
                                        <div class="text">UPVC products are available in a wide range of styles, shapes, and colors, allowing for personalized design.</div>
                                    </div>
                                </div>
                            </div>

                            <!--Key Block-->
                            <div class="key-block">
                                <div class="inner-box">
                                    <div class="icon-box">
                                        <span class="icon flaticon-speaker-1"></span>
                                        <span class="number">6</span>
                                    </div>
                                    <div class="content">
                                        <h3><a href="javascript::void(o);">UV Stability</a></h3>
                                        <div class="text">UPVC is resistant to UV rays, preventing fading and discoloration, so your doors and windows will look great for years to come.</div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

            <!--Image Column-->
            <div class="image-column"
                style="background-image: url('{{ asset('assets/frontend/images/resource/image-1.jpg') }}');">
                <figure class="image-box"><img src="{{ asset('assets/frontend/images/resource/image-1.jpg') }}"
                        alt=""></figure>
            </div>

        </div>
    </section>
    <!--End Fluid Section One Section-->

    <!--Feedback Section-->
    <section class="feedback-section">
        <!--Title Box-->
        <div class="title-box">
            <div class="auto-container">
                <!--Sec Title-->
                <div class="sec-title centered">
                    <div class="title-inner">
                        <h2>Customer <span class="theme_color">Feedback</span></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="lower-section">
            <div class="lower-inner-section">
                <div class="single-item-carousel owl-theme owl-carousel">

                    <!--Testimonial Block-->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="image-outer">
                                <div class="image">
                                    <img src="{{ asset('assets/frontend/images/resource/author-4.jpg') }}"
                                        alt="" />
                                </div>
                                <div class="quote-icon">
                                    <span class="icon flaticon-quote-1"></span>
                                </div>
                            </div>
                            <div class="text">Anand Traders delivered on their promise of top-notch UPVC doors and windows. The improved insulation has helped cut down on energy costs, making it a smart investment for my local business.</div>
                        </div>
                    </div>

                    <!--Testimonial Block-->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="image-outer">
                                <div class="image">
                                    <img src="{{ asset('assets/frontend/images/resource/author-5.jpg') }}"
                                        alt="" />
                                </div>
                                <div class="quote-icon">
                                    <span class="icon flaticon-quote-1"></span>
                                </div>
                            </div>
                            <div class="text">We chose Anand Traders for their UPVC doors, and we couldn't be happier. The high-security features provide peace of mind for our shop, and the local service is a real advantage.
                            </div>
                        </div>
                    </div>

                    <!--Testimonial Block-->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="image-outer">
                                <div class="image">
                                    <img src="{{ asset('assets/frontend/images/resource/author-6.jpg') }}"
                                        alt="" />
                                </div>
                                <div class="quote-icon">
                                    <span class="icon flaticon-quote-1"></span>
                                </div>
                            </div>
                            <div class="text">Thanks to Anand Traders, our restaurant now boasts UPVC windows that not only enhance the ambiance but also keep street noise at bay. Our diners love the cozy atmosphere.</div>
                        </div>
                    </div>

                    <!--Testimonial Block-->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="image-outer">
                                <div class="image">
                                    <img src="{{ asset('assets/frontend/images/resource/author-4.jpg') }}"
                                        alt="" />
                                </div>
                                <div class="quote-icon">
                                    <span class="icon flaticon-quote-1"></span>
                                </div>
                            </div>
                            <div class="text">Anand Traders' prompt service and repair team saved us during an unexpected issue with our doors. Their local presence and quick response are invaluable.</div>
                        </div>
                    </div>

                    <!--Testimonial Block-->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="image-outer">
                                <div class="image">
                                    <img src="{{ asset('assets/frontend/images/resource/author-5.jpg') }}"
                                        alt="" />
                                </div>
                                <div class="quote-icon">
                                    <span class="icon flaticon-quote-1"></span>
                                </div>
                            </div>
                            <div class="text">Anand Traders' UPVC windows offered a cost-efficient solution for our small retail store. The weather resistance and low maintenance have been a game-changer for our budget.</div>
                        </div>
                    </div>

                    <!--Testimonial Block-->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="image-outer">
                                <div class="image">
                                    <img src="{{ asset('assets/frontend/images/resource/author-6.jpg') }}"
                                        alt="" />
                                </div>
                                <div class="quote-icon">
                                    <span class="icon flaticon-quote-1"></span>
                                </div>
                            </div>
                            <div class="text">We appreciate supporting local businesses like Anand Traders. Their UPVC products have improved our store's aesthetics and functionality. We're proud to partner with them</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--End Feedback Section-->

    <!--Map Section-->
    <section class="map-section">
        <!--Map Outer-->
        <div class="map-outer">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15675.65572420324!2d78.6704268!3d10.8178985!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3baaf596731db98d%3A0xb4502a50990daa15!2sAnand%20Traders%2C!5e0!3m2!1sen!2sin!4v1696338547284!5m2!1sen!2sin"
                width="600" height="450" style="border:0; width: -moz-available;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
        </div>
    </section>
    <!--End Map Section-->
@endsection --}}

@extends('layout.backend.guest')

@section('content')
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <img class="img-fluid logo-dark mb-2" src="{{ asset('assets/backend/img/logo2.png') }}" alt="Logo">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="form-addons">
                                        <label class="form-control-label">Email Address</label>
                                        <input type="email" id="email"
                                            class="floating form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus placeholder="Enter your email address">
                                    </div>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="form-addons">
                                        <label class="form-control-label">Password</label>
                                        <div class="pass-group">
                                            <input type="password" id="password"
                                                class="pass-input floating form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Enter your password">
                                            <span class="fas fa-eye toggle-password"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                        </div>
                                        <div class="col-6 text-end">
                                            <a class="forgot-link" href="javascript::void(o);">Forgot Password ?</a>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-block btn-primary w-100" type="submit">Login</button>

                                <div class="text-center dont-have">Don't have an account yet? <a
                                        href="{{ route('register') }}">Register</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
