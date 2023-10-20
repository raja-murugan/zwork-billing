@extends('layout.frontend.guest')

@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url({{ asset('assets/frontend/images/background/1.jpg') }})">
    <div class="auto-container">
        <h1>See Our Works</h1>
        <ul class="page-breadcrumb">
            <li><a href="{{ route('frontend.index') }}">Home</a></li>
            <li>Project</li>
        </ul>
    </div>
</section>
<!--End Page Title-->

<!--Gallery Section Four-->
<section class="gallery-section-four">
    <div class="auto-container">
        <!--Galery-->
        <div class="sortable-masonry">

            <!--Filter-->
            <div class="filters text-center clearfix">

                <ul class="filter-tabs filter-btns clearfix">
                    <li class="active filter" data-role="button" data-filter=".all">All</li>
                    <li class="filter" data-role="button" data-filter=".modern">Modern</li>
                    <li class="filter" data-role="button" data-filter=".classic">Classic</li>
                    <li class="filter" data-role="button" data-filter=".repair">Repair</li>
                    <li class="filter" data-role="button" data-filter=".colors">Colors & Designs</li>
                </ul>

            </div>

            <div class="items-container row clearfix">

                <!--Gallery Block Three-->
                <div class="gallery-block-three masonry-item repair all col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ asset('assets/frontend/images/gallery/17.jpg') }}" alt="">
                            <!--Overlay Box-->
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="content">
                                        <a href="javascript::void(o);" class="link"><span class="icon fa fa-link"></span></a>
                                        <a href="{{ asset('assets/frontend/images/gallery/17.jpg') }}" data-fancybox="gallery-images-2" data-caption="" class="link"><span class="icon fa fa-search"></span></a>
                                    </div>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>

                <!--Gallery Block Three-->
                <div class="gallery-block-three masonry-item repair classic colors all col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ asset('assets/frontend/images/gallery/18.jpg') }}" alt="">
                            <!--Overlay Box-->
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="content">
                                        <a href="javascript::void(o);" class="link"><span class="icon fa fa-link"></span></a>
                                        <a href="{{ asset('assets/frontend/images/gallery/18.jpg') }}" data-fancybox="gallery-images-2" data-caption="" class="link"><span class="icon fa fa-search"></span></a>
                                    </div>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>

                <!--Gallery Block Three-->
                <div class="gallery-block-three masonry-item colors classic all col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ asset('assets/frontend/images/gallery/19.jpg') }}" alt="">
                            <!--Overlay Box-->
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="content">
                                        <a href="javascript::void(o);" class="link"><span class="icon fa fa-link"></span></a>
                                        <a href="{{ asset('assets/frontend/images/gallery/19.jpg') }}" data-fancybox="gallery-images-2" data-caption="" class="link"><span class="icon fa fa-search"></span></a>
                                    </div>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>

                <!--Gallery Block Three-->
                <div class="gallery-block-three masonry-item repair all col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ asset('assets/frontend/images/gallery/21.jpg') }}" alt="">
                            <!--Overlay Box-->
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="content">
                                        <a href="javascript::void(o);" class="link"><span class="icon fa fa-link"></span></a>
                                        <a href="{{ asset('assets/frontend/images/gallery/21.jpg') }}" data-fancybox="gallery-images-2" data-caption="" class="link"><span class="icon fa fa-search"></span></a>
                                    </div>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>

                <!--Gallery Block Three-->
                <div class="gallery-block-three masonry-item modern classic colors all col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ asset('assets/frontend/images/gallery/20.jpg') }}" alt="">
                            <!--Overlay Box-->
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="content">
                                        <a href="javascript::void(o);" class="link"><span class="icon fa fa-link"></span></a>
                                        <a href="{{ asset('assets/frontend/images/gallery/20.jpg') }}" data-fancybox="gallery-images-2" data-caption="" class="link"><span class="icon fa fa-search"></span></a>
                                    </div>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>

                <!--Gallery Block Three-->
                <div class="gallery-block-three masonry-item repair all col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ asset('assets/frontend/images/gallery/24.jpg') }}" alt="">
                            <!--Overlay Box-->
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="content">
                                        <a href="javascript::void(o);" class="link"><span class="icon fa fa-link"></span></a>
                                        <a href="{{ asset('assets/frontend/images/gallery/24.jpg') }}" data-fancybox="gallery-images-2" data-caption="" class="link"><span class="icon fa fa-search"></span></a>
                                    </div>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>

                <!--Gallery Block Three-->
                <div class="gallery-block-three masonry-item modern all col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ asset('assets/frontend/images/gallery/22.jpg') }}" alt="">
                            <!--Overlay Box-->
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="content">
                                        <a href="javascript::void(o);" class="link"><span class="icon fa fa-link"></span></a>
                                        <a href="{{ asset('assets/frontend/images/gallery/22.jpg') }}" data-fancybox="gallery-images-2" data-caption="" class="link"><span class="icon fa fa-search"></span></a>
                                    </div>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>

                <!--Gallery Block Three-->
                <div class="gallery-block-three masonry-item colors classic all col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <figure class="image-box">
                            <img src="{{ asset('assets/frontend/images/gallery/23.jpg') }}" alt="">
                            <!--Overlay Box-->
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="content">
                                        <a href="javascript::void(o);" class="link"><span class="icon fa fa-link"></span></a>
                                        <a href="{{ asset('assets/frontend/images/gallery/23.jpg') }}" data-fancybox="gallery-images-2" data-caption="" class="link"><span class="icon fa fa-search"></span></a>
                                    </div>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!--End Gallery Section Three-->
@endsection
