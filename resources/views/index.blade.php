<x-master-layout>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- ***** Main Banner Area Start ***** -->
    <section class="section main-banner" id="top" data-section="section1">

        <section class="home">
            <div class="slider">
                @php($m = 1)
                @foreach ($sliders as $item)
                <div class="slide @if($m == 1)active @endif" style="background-image: url('uploads/main-website/slider/{{ $item->image }}')">
                    <div class="container">
                        <div class="caption">
                            <h1>{{ $item->title }}</h1>
                            <p>{{ $item->subtitle }}</p>
                            <a href="{{ $item->link_to }}">{{ $item->btn_text }}</a>
                        </div>
                    </div>
                </div>
                @php($m++)
                @endforeach
            </div>

            <!-- controls  -->

            <div class="controls">
                <div class="prev" id="prev"><i class="fa-solid fa-circle-arrow-left"></i></div>
                <div class="next" id="prev"><i class="fa-solid fa-circle-arrow-right"></i></div>
            </div>

            <!-- indicators -->
            <div class="indicator">

            </div>
        </section>
        <div class="marquee">
            @forelse ($news as $item)
            <h1>{{ $item->text }} * </h1>
            @empty
            {{-- <h1>Recent News </h1> --}}
            @endforelse
            {{-- <h1>Nepal * Himalayas * Mountains * Everest</h1>
            <h1>Nepal * Himalayas * Mountains * Everest</h1>
            <h1>Nepal * Himalayas * Mountains * Everest</h1>
            <h1>Nepal * Himalayas * Mountains * Everest</h1>
            <h1>Nepal * Himalayas * Mountains * Everest</h1>
            <h1>Nepal * Himalayas * Mountains * Everest</h1> --}}
        </div>
    </section>
    <!-- ***** Main Banner Area End ***** -->


    <section class="pt-5 bg-cover bg-center lazyloaded" data-primary-overlay="8" style="background:url('assets/images/sections/test1.png');">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-lg-3 col-md-6 mb-5 wow zoomIn" data-wow-delay=".1s" style="visibility: visible;">
                    <div class="mb-0">

                        <i class="fas fa-thin fa-display display-4"></i>
                    </div>
                    <p class="num2 font-size-46 font-semiBold mb-0" data-to="100">100</p>
                    <p class="lead my-0">
                        دورة اونلاين </p>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 wow zoomIn" data-wow-delay=".2s" style="visibility: visible;">
                    <div class="mb-0">
                        <i class="fas fa-user display-4"></i>
                    </div>
                    <p class="num2 font-size-46 font-semiBold mb-0" data-to="50">50</p>
                    <p class="lead my-0">
                        محاضر معتمد </p>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 wow zoomIn" data-wow-delay=".3s" style="visibility: visible;">
                    <div class="mb-0">
                        <i class="fas fa-users font-size-56"></i>

                    </div>
                    <p class="num2 font-size-46 font-semiBold mb-0" data-to="7000">
                        7000 </p>
                    <p class="lead my-0">
                        طالب اونلاين </p>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 wow zoomIn" data-wow-delay=".4s" style="visibility: visible;">
                    <div class="mb-0">

                        <i class="fas fa-users font-size-56"></i>
                    </div>
                    <p class="num2 font-size-46 font-semiBold mb-0" data-to="7000">
                        7000 </p>
                    <p class="lead my-0">
                        شهادة اونلاين </p>
                </div>
            </div>
        </div>
    </section>

    <div class="col-md-12">
        <div class="section-heading">
            <h2>صور من الأكاديمية</h2>
        </div>
    </div>
    <section id="slider">
        <input type="radio" name="slider" id="s1" checked>
        <input type="radio" name="slider" id="s2">
        <input type="radio" name="slider" id="s3">
        <input type="radio" name="slider" id="s4">
        <input type="radio" name="slider" id="s5">

        <label for="s2" id="slide2"><img src="assets/images/image-academy-slider/slider1.jpg" alt=""></label>
        <label for="s3" id="slide3"><img src="assets/images/image-academy-slider/slider2.jpg" alt=""></label>
        <label for="s4" id="slide4"><img src="assets/images/image-academy-slider/slider3.jpg" alt=""></label>
        <label for="s5" id="slide5"><img src="assets/images/image-academy-slider/slider4.jpg" alt=""></label>
    </section>

    </div>
    </div>
    </section>


    <section class="section video" data-section="section5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <div class="left-content">
                        <span>our presentation is for you</span>
                        <h4>Watch the video to learn more <em>about Grad School</em></h4>
                        <p>You are NOT allowed to redistribute this template ZIP file on any template collection
                            website. However, you can use this template to convert into a specific theme for any kind of
                            CMS platform such as WordPress. You may <a rel="nofollow" href="contact" target="_parent">contact TemplateMo</a> for
                            details.
                            <br><br>Suspendisse tincidunt, magna ut finibus rutrum, libero dolor euismod odio, nec
                            interdum quam felis non ante.
                        </p>
                        <div class="main-button"><a rel="nofollow" href="https://fb.com/templatemo" target="_parent">External URL</a></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <article class="video-item">
                        <div class="video-caption">
                            <h4>Power HTML Template</h4>
                        </div>
                        <figure>
                            <a href="https://www.youtube.com/watch?v=r9LtOG6pNUw" class="play"><img src="assets/images/main-thumb.png"></a>
                        </figure>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="section contact" data-section="section6">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>يمكنك التواصل معنا علي </h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="info-contact">
                        <li>
                            <span>
                                الجيزه 5 شارع جامعه القاهره <i class="fa fa-map-marker"></i>
                            </span>
                        </li>

                        <li>
                            <span>
                                رقم التليفون(1) : 01102353206 <i class="fa fa-phone"></i>
                            </span>
                        </li>
                        <li>
                            <span>
                                رقم التليفون(2) : 010102353206 <i class="fa fa-phone"></i>
                            </span>
                        </li>
                        <li>
                            <span>
                                رقم التليفون(3) : 01140181146 <i class="fa fa-phone"></i>
                            </span>
                        </li>

                        <li>
                            <span>
                                فاكس : 2124552552 <i class="fa fa-fax"></i>
                            </span>
                        </li>
                        <li>
                            <span>
                                info@great-academy.com البريد الإلكتروني :<i class="fa fa-envelope-o"></i>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div id="map">
                        <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="422px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>



</x-master-layout>