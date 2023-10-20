@extends('layout.frontend.guest')

@section('content')
    <section class="page-title" style="background-image:url({{ asset('assets/frontend/images/background/1.jpg') }})">
        <div class="auto-container">
            <h1>About Our Company</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('frontend.index') }}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Company Section-->
    <section class="company-section">
        <div class="auto-container">

            <!--Sec Title-->
            <div class="sec-title">
                <h2>leading upvc <span class="theme_color">Doors & Windows</span> company</h2>
            </div>
            <div class="row clearfix">

                <!--Mission Column-->
                <div class="mission-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h2>Our Mission</h2>
                        <div class="text">
                            Quality, Service, Affordability: Our mission is to deliver high-quality UPVC products that
                            exceed our customers' expectations. We are driven by a passion for innovation, service
                            excellence, and affordability, ensuring that local businesses can access the best solutions for
                            their needs.</div>
                        <div class="row clearfix">
                            <div class="image-column col-lg-6 col-md-6 col-sm-6">
                                <div class="image">
                                    <a href="images/resource/mission-1.jpg" class="overlay-box lightbox-image"
                                        data-fancybox="mission-gallery" data-caption=""><img
                                            src="{{ asset('assets/frontend/images/resource/mission-1.jpg') }}"
                                            alt="" /></a>
                                </div>
                            </div>
                            <div class="image-column col-lg-6 col-md-6 col-sm-6">
                                <div class="image">
                                    <a href="images/resource/mission-2.jpg" class="overlay-box lightbox-image"
                                        data-fancybox="mission-gallery" data-caption=""><img
                                            src="{{ asset('assets/frontend/images/resource/mission-2.jpg') }}"
                                            alt="" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Vision Column-->
                <div class="vision-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="row clearfix">
                            <div class="image-column col-lg-6 col-md-6 col-sm-6">
                                <div class="image">
                                    <a href="images/resource/vision-1.jpg" class="overlay-box lightbox-image"
                                        data-fancybox="vision-gallery" data-caption=""><img
                                            src="{{ asset('assets/frontend/images/resource/vision-1.jpg') }}"
                                            alt="" /></a>
                                </div>
                            </div>
                            <div class="image-column col-lg-6 col-md-6 col-sm-6">
                                <div class="image">
                                    <a href="images/resource/vision-2.jpg" class="overlay-box lightbox-image"
                                        data-fancybox="vision-gallery" data-caption=""><img
                                            src="{{ asset('assets/frontend/images/resource/vision-2.jpg') }}"
                                            alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <h2>Our Vision</h2>
                        <div class="text">
                            Transforming Spaces, Enriching Lives: Our vision is to be the foremost choice
                            for local businesses seeking to elevate their environments. We aspire to transform spaces into
                            functional, aesthetically pleasing, and sustainable havens that enrich the lives of those who
                            inhabit them.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Company Section-->

    <!--Services Section Two-->
    <section class="services-section-two">
        <div class="auto-container">
            <!--Sec Title-->
            <div class="sec-title centered">
                <h2>Reason for <span class="theme_color">Choose Us</span></h2>
            </div>
            <div class="services-item-carousel-two owl-carousel owl-theme">

                <!--Services Block Two-->
                <div class="services-block-two">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon flaticon-door-4"></span>
                        </div>
                        <div class="content-box">
                            <h3><a href="javascript::void(o);">10+ Yrs <br> of Expertise</a></h3>
                            <div class="text">Proven experience you can trust.</div>

                        </div>
                    </div>
                </div>

                <!--Services Block Two-->
                <div class="services-block-two">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon flaticon-award"></span>
                        </div>
                        <div class="content-box">
                            <h3><a href="javascript::void(o);">Quality <br> is Our Priority</a></h3>
                            <div class="text">We prioritize top-notch quality.
                            </div>

                        </div>
                    </div>
                </div>

                <!--Services Block Two-->
                <div class="services-block-two">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon flaticon-money"></span>
                        </div>
                        <div class="content-box">
                            <h3><a href="javascript::void(o);"> Skilled <br> and Committed Team</a></h3>
                            <div class="text">Highly trained, dedicated professionals.
                            </div>

                        </div>
                    </div>
                </div>

                <!--Services Block Two-->
                <div class="services-block-two">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon flaticon-labor-man"></span>
                        </div>
                        <div class="content-box">
                            <h3><a href="javascript::void(o);">Tailored <br> UPVC Solutions</a></h3>
                            <div class="text">Customized solutions for your unique needs.
                            </div>

                        </div>
                    </div>
                </div>

                <!--Services Block Two-->
                <div class="services-block-two">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon flaticon-door-4"></span>
                        </div>
                        <div class="content-box">
                            <h3><a href="javascript::void(o);">Reliable, <br> Prompt Service</a></h3>
                            <div class="text">Dependable, quick, and efficient service.</div>

                        </div>
                    </div>
                </div>

                <!--Services Block Two-->
                <div class="services-block-two">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon flaticon-award"></span>
                        </div>
                        <div class="content-box">
                            <h3><a href="javascript::void(o);">Local Community <br> Understanding</a></h3>
                            <div class="text">Deep understanding of local needs.
                            </div>

                        </div>
                    </div>
                </div>

                <!--Services Block Two-->
                <div class="services-block-two">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon flaticon-money"></span>
                        </div>
                        <div class="content-box">
                            <h3><a href="javascript::void(o);"> Energy-Efficient <br> UPVC</a></h3>
                            <div class="text">Savings through energy-efficient products.</div>

                        </div>
                    </div>
                </div>

                <!--Services Block Two-->
                <div class="services-block-two">
                    <div class="inner-box">
                        <div class="icon-box">
                            <span class="icon flaticon-labor-man"></span>
                        </div>
                        <div class="content-box">
                            <h3><a href="javascript::void(o);">Eco-Friendly <br> Practices</a></h3>
                            <div class="text">Commitment to sustainable, recyclable UPVC solutions.</div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Services Section Two-->

    <!--Fun Facts Section-->
    <div class="fact-counter-section style-two">
        <div class="fact-counter">
            <div class="auto-container">
                <div class="row clearfix">

                    <!--Column-->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="6000" data-stop="5">0</span>k+
                                <h4 class="counter-title">Windows Installed</h4>
                            </div>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="6000" data-stop="2">0</span>K+
                                <h4 class="counter-title">Doors Installed</h4>
                            </div>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="6000" data-stop="14">0</span>+
                                <h4 class="counter-title">Expert Team Members</h4>
                            </div>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="column counter-column col-lg-3 col-md-5 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="900ms" data-wow-duration="1500ms">
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="6000" data-stop="10">0</span>Year+
                                <h4 class="counter-title">Expertise</h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--End Fun Facts Section-->
@endsection
