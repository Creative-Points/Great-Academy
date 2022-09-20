<x-master-layout>
@section('title', 'الكورسات')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="main-content">



        <!-- Breadcrumbs Start -->
        <div class="padding-y-40 bg-light-v5">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div style="margin-bottom: -83px; padding-top: 24px;">
                        <h1><bdi>الكورسات</bdi></h1>
                        <ul class="breadcrumb breadcrumb-tringle bg-transparent">
                            <li class="breadcrumb-item"><bdi><a href="">الرئيسية</a></bdi></li>
                            <li class="breadcrumb-item"><bdi>الكورسات</bdi></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Popular Course Section Start -->
        <div class="rs-popular-courses style1 course-view-style orange-color rs-inner-blog white-bg pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 order-last">
                        <div class="widget-area">
                            <div class="search-widget mb-50">
                                <h3 class="widget-title">البحث</h3>
                                <form class="search-wrap" method="GET" action="courses-search">
                                    <input type="search" name="search" placeholder="بحث..." class="search-input" value="">
                                    <button type="submit" value="Search"><i class=" flaticon-search"></i></button>
                                </form>
                            </div>

                            <div class="widget-archives mb-50">
                                <h3 class="widget-title">الاقسام</h3>
                                <ul class="categories">
                                    @foreach ($sections as $section)
                                        <li><a href="{{ route('section', $section->slug) }}">{{ $section->name }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 pr-50 md-pr-15">

                        <div class="course-part clearfix">

                            @forelse ($courses as $item)
                                <div class="courses-item">
                                    <div class="img-part">
                                        <a href="{{ route('course', $item->slug) }}">
                                            <img src="/uploads/course/{{ $item->image }}" style="height:200px;"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="content-part">
                                        <ul class="meta-part">
                                            <li>
                                                <span class="price"> {{ $item->price }} جنية </span>
                                            </li>
                                            <li>
                                                <a class="categorie">{{ $item->sec }}</a>
                                                </li>
                                        </ul>
                                        <h3 class="title">
                                            <a href="{{ route('course', $item->slug) }}">{{ $item->name }}</a>
                                            </h3>
                                        <div class="bottom-part">
                                            <div class="info-meta">
                                                <ul>
                                                    <!-- <li class="user"><i class="fa fa-user"></i> 245</li> -->
                                                    <li class="ratings">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i> (05)
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="btn-part">
                                                <a href="{{ route('course', $item->slug) }}">
                                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center text-warning h3">لا يوجد بيانات الان.</div>
                            @endforelse


                        </div>
                        <!-- <div class="pagination-area orange-color text-center mt-30 md-mt-0">
                    <ul class="pagination-part">
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">Next <i class="fa fa-long-arrow-right"></i></a></li>
                    </ul>
                </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Popular Course Section End -->



        <!-- Newsletter section start -->

        <!-- Newsletter section end -->
    </div>
    <!-- Main content End -->

    <!-- Footer Start -->

    <!-- Search Modal End -->

    <!-- modernizr js -->
    {{-- <div class="rs-newsletter style1 orange-color mb--90 sm-mb-0 sm-pb-70">
        <div class="container">
            <div class="newsletter-wrap">
                <div class="row y-middle">
                    <div class="col-lg-6 col-md-12 md-mb-30">
                        <div class="content-part">
                            <div class="sec-title">
                                <div class="title-icon md-mb-15">
                                    <img src="assets/images/bg/newsletter.png" alt="images">
                                </div>
                                <h2 class="title mb-0 white-color">Subscribe to Newsletter</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <form class="newsletter-form" id="newsLetter" action="#">
                            <input class="input" type="email" name="email" placeholder="Enter Your Email" required="">
                            <button type="submit">Submit</button>
                            <input type="hidden" name="_token" value="3NQY1eGvnaBdnxwMe2esiXDUB3l1nFjG13Fz1XZg">
                        </form>
                        <div class="row">
                            <div id="errors-newsletter" class="col-md-12 mx-auto my-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#newsLetter").on("submit", function(e) {
            e.preventDefault();
            var el = $(this);
            let data = el.serialize();
            $.ajax({
                "type": "POST",
                "url": el.attr("action"),
                "data": data,
                success: function(data) {
                    if (data.message != undefined) {
                        $("#errors-newsletter").html('');
                        $("#errors-newsletter").append("<div class='alert alert-success'>" + `${data.message}` + "</div>");
                        el.find(".input").val('');
                    }
                },
                error: function(data) {
                    if (data.responseJSON.errors != undefined) {
                        let errors = data.responseJSON.errors;
                        $("#errors-newsletter").html('');
                        for (const key in errors) {
                            $("#errors-newsletter").append("<div class='alert alert-danger'>" + `${errors[key]}` + "</div>");
                        }
                    }
                }

            })

        });
    </script> --}}


</x-master-layout>