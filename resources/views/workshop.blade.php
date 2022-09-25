<x-master-layout>


    <!--Full width header Start-->

    <!--Full width header End-->

    <!-- Main content Start -->
    <div class="main-content">



        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="/assets/images/bg/1.jpg" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text">
                <h1 class="page-title">ورش العمل</h1>
                <ul>
                    <li>
                        <a class="active" href="{{ route('home') }}">الرئيسية</a>
                    </li>
                    <li>
                        <a href="{{ route('workshops') }}">ورش العمل</a>
                    </li>
                    <li>
                        <a>{{ $workshop->name }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Intro Courses -->
        <section class="intro-section gray-bg pt-94 pb-100 md-pt-64 md-pb-70">
            <div class="container">
                <div class="row clearfix">
                    <!-- Content Column -->
                    <div class="col-lg-6 md-mb-50">
                        <!-- Intro Info Tabs-->
                        <div class="intro-info-tabs">
                            {{-- <ul class="nav nav-tabs intro-tabs tabs-box" id="myTab" role="tablist">
                                <li class="nav-item tab-btns">
                                    <a class="nav-link tab-btn active" id="prod-overview-tab" data-toggle="tab" href="#prod-overview" role="tab" aria-controls="prod-overview" aria-selected="true">Content</a>
                                </li>
                            </ul> --}}
                            <div class="tab-content tabs-content" id="myTabContent">
                                <div class="tab-pane tab fade show active" id="prod-overview" role="tabpanel"
                                    aria-labelledby="prod-overview-tab">
                                    <div class="content white-bg pt-30">
                                        <!-- Cource Overview -->
                                        <div class="course-overview">
                                            <div class="inner-box text-right">
                                                {{-- <p>اسم الكورس:</p> --}}
                                                <h2 class="text-center"><b>{{ $workshop->name }}</b></h2>
                                                <div class="image w-100">
                                                    <img class="w-100" src="/uploads/workshop/{{ $workshop->image }}"
                                                        alt="{{ $workshop->name }}">
                                                </div>
                                                <br>
                                                <p><b>تفاصيل الكورس:</b></p>
                                                {{-- <p>
                                                    <font style="background-color: rgb(0, 0, 0);" color="#efefef">
                                                    </font><b><br></b>
                                                </p> --}}
                                                <p style="white-space: pre">{{ $workshop->description }}</p>
                                                <p><span style="font-weight: bolder;">المستويات:</span>
                                                    {{ $workshop->level }} مستوى</p>
                                                <p><span style="font-weight: bolder;">الساعات:</span>
                                                    {{ $workshop->hours }} ساعة</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="prod-reviews" role="tabpanel"
                                    aria-labelledby="prod-reviews-tab">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Video Column -->
                    <div class="video-column col-lg-6">
                        <div class="inner-column">
                            <!-- Video Box -->

                            <!-- End Video Box -->
                            <div class="course-features-info">
                                {{-- <h3 class="text-center  p-3">قدم الان</h3> --}}
                                {{-- <div class="border p-2 my-2">
                                    <img src="https://eraasoft.com/front/course.jpeg" alt="">
                                </div> --}}
                                @role('student')
                                    <h3 class="text-center  p-3">اشترك الان</h3>
                                    @if (session('success'))
                                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                                    @endif
                                    @if (session('error'))
                                        <h6 class="alert alert-danger">{{ session('error') }}</h6>
                                    @endif
                                    <form action="{{ route('order.workshopRegisterUser', $workshop->slug) }}"
                                        method="POST" class="text-right">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <button type="submit" class="btn btn-success btn-block">تقديم</button>
                                        </div>
                                    </form>
                                @else
                                    <h3 class="text-center  p-3"> سجل حساب جديد الان وقدم على ورشة العمل </h3>
                                    @if (session('success'))
                                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                                    @endif
                                    @if (session('error'))
                                        <h6 class="alert alert-danger">{{ session('error') }}</h6>
                                    @endif
                                    @if ($errors->any())
                                        <ul class="alert alert-danger">
                                            @foreach ($errors->all() as $err)
                                                <li>{{ $err }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <form action="{{ route('order.workshopNewUser', $workshop->slug) }}" method="POST"
                                        class="text-right">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="name">الاسم الكامل <b>*</b></label>
                                            <input type="text" id="name" class="form-control" name="name"
                                                required />
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="Phone">رقم الهاتف <b>*</b></label>
                                            <input type="text" id="Phone" class="form-control" name="phone"
                                                required />
                                        </div>
                                        <div class="form-group">
                                            <label for="email mb-3">الايميل <b>*</b></label>
                                            <input type="text" id="email" class="form-control" name="email"
                                                required />
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="university">جامعة <b>*</b></label>
                                            <input type="text" id="university" class="form-control" name="university"
                                                required />
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="faculty">كلية <b>*</b></label>
                                            <input type="text" id="faculty" class="form-control" name="faculty"
                                                required />
                                        </div>
                                        <div class="form-group mb-3">
                                            <button type="submit" class="btn btn-success btn-block">سجل الان</button>
                                        </div>
                                        <h3 class="text-center apply-btn p-3">او تواصل معنا من خلال 01068268354</h3>
                                    </form>
                                @endrole
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End intro Courses -->



        <!-- Newsletter section start -->
        <div class="rs-newsletter style1 orange-color mb--90 sm-mb-0 sm-pb-70">
            <div class="container">
                <div class="newsletter-wrap">
                    <div class="row y-middle">
                        <div class="col-lg-6 col-md-12 md-mb-30">
                            <div class="content-part">
                                <div class="sec-title">
                                    <div class="title-icon md-mb-15">
                                        <img src="https://eraasoft.com/front/assets/images/newsletter.png"
                                            alt="images">
                                    </div>
                                    <h2 class="title mb-0 white-color">Subscribe to Newsletter</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <form class="newsletter-form" id="newsLetter" action="https://eraasoft.com/news-letter">
                                <input class="input" type="email" name="email" placeholder="Enter Your Email"
                                    required="">
                                <button type="submit">Submit</button>
                                <input type="hidden" name="_token"
                                    value="3NQY1eGvnaBdnxwMe2esiXDUB3l1nFjG13Fz1XZg">
                            </form>
                            <div class="row">
                                <div id="errors-newsletter" class="col-md-12 mx-auto my-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter section end -->
    </div>
    <!-- Main content End -->


</x-master-layout>
