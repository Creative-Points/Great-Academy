<x-master-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Page breadcrumb -->
    <!-- Page breadcrumb -->
    {{-- <div class="padding-y-25 bg-light-v5 border-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1><bdi>ahmed</bdi></h1>

                            <ul class="breadcrumb breadcrumb-tringle bg-transparent">
                                <li class="breadcrumb-item"><bdi><a href="/ar">الحساب</a></bdi></li>
                                <li class="breadcrumb-item"><bdi>ahmed</bdi></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
     --}}


    <section class="paddingTop-50 paddingBottom-100 bg-light" style="height: auto !important;">
        <div class="container" style="height: auto !important;">
            <div class="row" style="height: auto !important;">
                <div class="col-12">

                </div>
                @include('layouts.info')
                <div class="col-md-8 order-sm-2 order-1 mt-4" style="height: auto !important;">


                    {{-- <div class="card padding-30 shadow-v1"> --}}
                    <div
                        class="rs-popular-courses style1 course-view-style orange-color rs-inner-blog white-bg pt-100 pb-100 md-pt-70 md-pb-70">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 pr-50 md-pr-15">
                                    <h1 class="text-center">قائمة مواد الكورس</h1>
                                    <table class="table text-center">
                                        <thead style="background:var(--main-color); color: white; font-weight: bold;">
                                            <th>#</th>
                                            <th>الاسم</th>
                                            {{-- <th>التفاصيل</th>
                                            <th>السعر</th>
                                            <th>المستويات</th>
                                            <th>عدد الساعات</th> --}}
                                        </thead>
                                        <tbody>
                                            @forelse ($materials as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('student.material', $item->slug) }}">{{ $item->name }}</a>
                                                    </td>
                                                    {{-- <td>{{ substr($item->description, 0, 100) }}</td>
                                                    <td>{{ $item->price }}</td>
                                                    <td>{{ $item->level }}</td>
                                                    <td>{{ $item->hours }}</td> --}}
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="2">لم تشترك في اي كورسات بعد...</td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                    {{-- <div class="course-part clearfix">

                                        @forelse ($courses as $item)
                                            <div class="courses-item col-6">
                                                <div class="img-part">
                                                    <a href="{{ route('course', $item->slug) }}">
                                                        <img src="/uploads/course/{{ $item->image }}" style="height:200px;width:200px"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="content-part">
                                                    <ul class="meta-part">
                                                        <li>
                                                            <span class="price"> {{ $item->price }} جنية </span>
                                                        </li>
                                                        <li>
                                                            {{-- <a class="categorie">{{ $item->sec }}</a> --}
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


                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- </div> --}}
                </div> <!-- END col-md-8 -->
            </div>
            <!--END row-->
        </div>
        <!--END container-->
    </section>





</x-master-layout>
