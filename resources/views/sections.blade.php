<x-master-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @section('title', 'الاقسام')
    <div class="main-content">



        <!-- Breadcrumbs Start -->
        <div class="padding-y-40 bg-light-v5">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div style="margin-bottom: -83px; padding-top: 24px;">


                        <h1><bdi>اﻷقسام</bdi></h1>
                        <ul class="breadcrumb breadcrumb-tringle bg-transparent">
                            <li class="breadcrumb-item"><bdi><a href="/ar">الرئيسية</a></bdi></li>
                            <li class="breadcrumb-item"><bdi>اﻷقسام</bdi></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popular Course Section Start -->
        <div class="rs-popular-courses style1 course-view-style orange-color rs-inner-blog white-bg pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="row">
                    @forelse ($sections as $section)
                        <div class="col-md-4 col-sm-6 mb-4">
                            <a href="{{ route('section', [$section->slug, 'courses']) }}" class="card text-white height-100p hover:parent wow fadeInUp" data-wow-delay="0.1s" title="كورسات برمجة الحاسب بشهاده معتمده مجانا" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                <img class="hover:zoomin transition-0_3 opacity-07 lazyloaded" title="{{ $section->name }}" alt="{{ $section->name }}" src="uploads/section/{{ $section->image }}">
                                <div class="card-img-overlay bg-black-0_6 flex-center">
                                    <h3 class="text-center h4">
                                        <bdi>{{ $section->name }}</bdi>
                                    </h3>
                                    <button class="btn btn-primary btn-sm btn-pill">
                                        أكثر من {{ $section->count + $section->workshops }} دورة </button>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="text-center text-warning h3">
                                لم يتم اضافة اي بيانات بعد. <a href="{{ route('home') }}">اضغط هنا للعودة</a>
                            </div>
                        </div>
                    @endforelse
                    {{-- <div class="col-md-4 col-sm-6 mb-4">
                        <a href="/ar/category/computer-programming" class="card text-white height-100p hover:parent wow fadeInUp" data-wow-delay="0.1s" title="كورسات برمجة الحاسب بشهاده معتمده مجانا" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                            <img class="hover:zoomin transition-0_3 opacity-07 lazyloaded" data-src="/../../uploads/images/cache/1b/1b05c0_computer-programming.jpg" title="برمجة الحاسب" alt="برمجة الحاسب" src="assets/images/sections/computer-programming.jpg">
                            <div class="card-img-overlay bg-black-0_6 flex-center">
                                <h3 class="text-center h4">
                                    <bdi>برمجة الحاسب</bdi>
                                </h3>
                                <button class="btn btn-primary btn-sm btn-pill">
                                    أكثر من 224 دورة </button>
                            </div>
                        </a>
                    </div> --}}
                    {{-- <div class="col-md-4 col-sm-6 mb-4">
                        <a href="/ar/category/engineering-programs" class="card text-white height-100p hover:parent wow fadeInUp" data-wow-delay="0.2s" title="كورسات البرامج الهندسية احترافيه للمبتدئين اونلاين" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <img class="hover:zoomin transition-0_3 opacity-07 ls-is-cached lazyloaded" data-src="assets/images/sections/front_1627325042.png" title="المواد والبرامج الهندسية" alt="المواد والبرامج الهندسية" src="assets/images/sections/engineering-programs.jpg">
                            <div class="card-img-overlay bg-black-0_6 flex-center">
                                <h3 class="text-center h4">
                                    <bdi>المواد والبرامج الهندسية</bdi>
                                </h3>
                                <button class="btn btn-primary btn-sm btn-pill">
                                    أكثر من 137 دورة </button>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <a href="/ar/category/soft-skills" class="card text-white height-100p hover:parent wow fadeInUp" data-wow-delay="0.3s" title="افضل 10 كورسات مهارات شخصية " soft="" skills"="" في="" cv="" من="" البدايه="" للاحتراف="" اونلاين="" مجاني"="" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                            <img class="hover:zoomin transition-0_3 opacity-07 ls-is-cached lazyloaded" data-src="/../../uploads/images/cache/f0/f0f8f0_soft-skills.jpg" title="المهارات الشخصية" alt="المهارات الشخصية" src="assets/images/sections/soft-skills.jpg">
                            <div class="card-img-overlay bg-black-0_6 flex-center">
                                <h3 class="text-center h4">
                                    <bdi>المهارات الشخصية</bdi>
                                </h3>
                                <button class="btn btn-primary btn-sm btn-pill">
                                    أكثر من 75 دورة </button>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-6 mb-4">
                        <a href="/ar/category/graphic-design" class="card text-white height-100p hover:parent wow fadeInUp" data-wow-delay="0.4s" title="اون لاين مجانا تعلم تصميم الجرافيك خطوه بخطوه" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                            <img class="hover:zoomin transition-0_3 opacity-07 ls-is-cached lazyloaded" data-src="/../../uploads/images/cache/04/047201_graphic-design.png" title="تصميم الجرافيك" alt="تصميم الجرافيك" src="assets/images/sections/graphic-design.png">
                            <div class="card-img-overlay bg-black-0_6 flex-center">
                                <h3 class="text-center h4">
                                    <bdi>تصميم الجرافيك</bdi>
                                </h3>
                                <button class="btn btn-primary btn-sm btn-pill">
                                    أكثر من 49 دورة </button>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <a href="/ar/category/computer-networks" class="card text-white height-100p hover:parent wow fadeInUp" data-wow-delay="0.5s" title="كورسات شبكات الحاسب احترافيه للمبتدئين اونلاين" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <img class="hover:zoomin transition-0_3 opacity-07 ls-is-cached lazyloaded" data-src="/../../uploads/images/cache/c0/c06690_computer-networks.jpg" title="شبكات الحاسب" alt="شبكات الحاسب" src="assets/images/sections/computer-networks.jpg">
                            <div class="card-img-overlay bg-black-0_6 flex-center">
                                <h3 class="text-center h4">
                                    <bdi>شبكات الحاسب</bdi>
                                </h3>
                                <button class="btn btn-primary btn-sm btn-pill">
                                    أكثر من 45 دورة </button>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-6 mb-4">
                        <a href="/ar/category/information-technology" class="card text-white height-100p hover:parent wow fadeInUp" data-wow-delay="0.6s" title="كورسات تكنولوجيا المعلومات (IT) بشهاده معتمده مجانا" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                            <img class="hover:zoomin transition-0_3 opacity-07 lazyloaded" data-src="/../../uploads/images/cache/c1/c1ef35_information-technology--it-.jpg" title="تكنولوجيا المعلومات (IT)" alt="تكنولوجيا المعلومات (IT)" src="assets/images/sections/information-technology--it-.jpg">
                            <div class="card-img-overlay bg-black-0_6 flex-center">
                                <h3 class="text-center h4">
                                    <bdi>تكنولوجيا المعلومات (IT)</bdi>
                                </h3>
                                <button class="btn btn-primary btn-sm btn-pill">
                                    أكثر من 63 دورة </button>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <a href="/ar/category/accounting" class="card text-white height-100p hover:parent wow fadeInUp" data-wow-delay="0.7s" title="خطوه بخطوه تعلم المحاسبة مجانا اون لاين" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp;">
                            <img class="hover:zoomin transition-0_3 opacity-07 lazyloaded" data-src="/../../uploads/images/accounting.jpg" title="المحاسبة" alt="المحاسبة" src="assets/images/sections/accounting.jpg">
                            <div class="card-img-overlay bg-black-0_6 flex-center">
                                <h3 class="text-center h4">
                                    <bdi>المحاسبة</bdi>
                                </h3>
                                <button class="btn btn-primary btn-sm btn-pill">
                                    أكثر من 57 دورة </button>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <a href="/ar/category/tongue-languages" class="card text-white height-100p hover:parent wow fadeInUp" data-wow-delay="0.8s" title="كورسات لغات مجانيه من البدايه للاحتراف" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">
                            <img class="hover:zoomin transition-0_3 opacity-07 lazyloaded" data-src="/../../uploads/images/cache/67/67b8af_languages.png" title="لغات" alt="لغات" src="assets/images/sections/languages.png">
                            <div class="card-img-overlay bg-black-0_6 flex-center">
                                <h3 class="text-center h4">
                                    <bdi>لغات</bdi>
                                </h3>
                                <button class="btn btn-primary btn-sm btn-pill">
                                    أكثر من 21 دورة </button>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <a href="/ar/category/marketing" class="card text-white height-100p hover:parent wow fadeInUp" data-wow-delay="0.9s" title="خطوه بخطوه تعلم التسويق اون لاين مجانا" style="visibility: visible; animation-delay: 0.9s; animation-name: fadeInUp;">
                            <img class="hover:zoomin transition-0_3 opacity-07 lazyloaded" data-src="/../../uploads/images/cache/a7/a794f2_marketing.jpg" title="التسويق" alt="التسويق" src="assets/images/sections/marketing.jpg">
                            <div class="card-img-overlay bg-black-0_6 flex-center">
                                <h3 class="text-center h4">
                                    <bdi>التسويق</bdi>
                                </h3>
                                <button class="btn btn-primary btn-sm btn-pill">
                                    أكثر من 65 دورة </button>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <a href="/ar/category/business-administration" class="card text-white height-100p hover:parent wow fadeInUp" data-wow-delay="1s" title="اون لاين مجانا تعلم اداره الاعمال خطوه بخطوه" style="visibility: visible; animation-delay: 1s; animation-name: fadeInUp;">
                            <img class="hover:zoomin transition-0_3 opacity-07 lazyloaded" data-src="/../../uploads/images/cache/52/528396_business-model-canvas.png" title="اداره الاعمال" alt="اداره الاعمال" src="assets/images/sections/business-model-canvas.png">
                            <div class="card-img-overlay bg-black-0_6 flex-center">
                                <h3 class="text-center h4">
                                    <bdi>اداره الاعمال</bdi>
                                </h3>
                                <button class="btn btn-primary btn-sm btn-pill">
                                    أكثر من 30 دورة </button>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <a href="/ar/category/computer-databases" class="card text-white height-100p hover:parent wow fadeInUp" data-wow-delay="1.1s" title="خطوه بخطوه تعلم قواعد بيانات مجانا اون لاين" style="visibility: visible;">
                            <img class="hover:zoomin transition-0_3 opacity-07 lazyloaded" data-src="/../../uploads/images/cache/10/10372e_databases.png" title="قواعد بيانات" alt="قواعد بيانات" src="assets/images/sections/databases.png">
                            <div class="card-img-overlay bg-black-0_6 flex-center">
                                <h3 class="text-center h4">
                                    <bdi>قواعد بيانات</bdi>
                                </h3>
                                <button class="btn btn-primary btn-sm btn-pill">
                                    أكثر من 25 دورة </button>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <a href="/ar/category/devops" class="card text-white height-100p hover:parent wow fadeInUp" data-wow-delay="1.2s" title="كورسات DevOps بشهاده معتمده مجانا" style="visibility: visible;">
                            <img class="hover:zoomin transition-0_3 opacity-07 lazyloaded" data-src="/../../uploads/images/cache/32/32b09c_devops.png" title="DevOps" alt="DevOps" src="assets/images/sections/devops.png">
                            <div class="card-img-overlay bg-black-0_6 flex-center">
                                <h3 class="text-center h4">
                                    <bdi>DevOps</bdi>
                                </h3>
                                <button class="btn btn-primary btn-sm btn-pill">
                                    أكثر من 36 دورة </button>
                            </div>
                        </a>
                    </div> --}}
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
                                        <img src="assets/images/sections/newsletter.png" alt="images">
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