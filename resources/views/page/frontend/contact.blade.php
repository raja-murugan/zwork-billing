@extends('layout.frontend.guest')

@section('content')
    <section class="page-title" style="background-image:url({{ asset('assets/frontend/images/background/1.jpg') }})">
        <div class="auto-container">
            <h1>Get Touch With Us</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('frontend.index') }}">Home</a></li>
                <li>Contact</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Office Section-->
    <section class="office-section">
        <div class="auto-container">
            <div class="inner-container">
                <!--Title Box-->
                <div class="title-box">
                    <h2>Corporate Office</h2>
                </div>
                <div class="row clearfix">

                    <!--Office Block-->
                    <div class="office-block col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="icon-box">
                                <span class="icon flaticon-place"></span>
                            </div>
                            <h3>Visit Our Place</h3>
                            <div class="text">#14, Ganesh Complex, Vayalur Road, Kumaran Nagar, Tiruchirappalli, Tamil Nadu, Indioa - 620 017.</div>
                        </div>
                    </div>

                    <!--Office Block-->
                    <div class="office-block col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="icon-box">
                                <span class="icon flaticon-phone-symbol-of-an-auricular-inside-a-circle"></span>
                            </div>
                            <h3>24/7 Quick Contact</h3>
                            <div class="text">+91 98426 56590<br> info@anandupvcwindow.com</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--End Office Section-->

    <!--Fullwidth Map Section-->
    <section class="fullwidth-map-section">
        <div class="outer-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5235.424079949435!2d78.66785187616829!3d10.817898489333423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3baaf596731db98d%3A0xb4502a50990daa15!2sAnand%20Traders%2C!5e1!3m2!1sen!2sin!4v1695644613966!5m2!1sen!2sin" style="border:0; height: 600px; width: -moz-available;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <!--End Fullwidth Map Section-->

    <!--Contact Form Section-->
    <section class="contact-form-section" style="background-image: url({{ asset('assets/frontend/images/background/3.png') }})">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Title Column-->
                <div class="title-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h3>For Enquiries,</h3>
                        <h2>Just Say Hello.</h2>
                        <div class="text">For questions or concerns please contact us via telephone or simply complete the
                            contact form and one of our knowledgeable representatives will respond in a timely manner.</div>
                    </div>
                </div>

                <!--Form Column-->
                <div class="form-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!--Contact Form-->
                        <div class="contact-form">

                            <form method="post" action="sendemail.php" id="contact-form">
                                <div class="row clearfix">
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <input type="text" name="name" value="" placeholder="Name" required>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <input type="email" name="email" value="" placeholder="Email" required>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <textarea name="message" placeholder="Message..."></textarea>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="theme-btn btn-style-four"><span
                                                class="arrow flaticon-right-arrow-4"></span>Submit Now</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Contact Form Section-->
@endsection
