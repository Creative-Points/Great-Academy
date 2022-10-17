<div class="col-md-4  order-sm-1 order-2 mt-4" style="height: auto !important;">
    <div class="card shadow-v1">
        <div class="card-header text-center border-bottom pt-5 mb-4">
            <a>
                <span class="iconbox padding-60 bg-primary text-white mb-4 text-uppercase ">a</span>
            </a>
            <h4 class="text-capitalize">
                {{ auth()->user()->name }} </h4>
            <p class="small">
                تم الانضمام فى <bdi>{{ auth()->user()->created_at }}</bdi>
            </p>
            {{-- <ul class="list-inline mb-0">
                <li class="list-inline-item m-2">
                    <a href="" title="دوراتي" class="px-2">
                        <i class="fa-solid fa-film text-primary"></i>
                        <span class="h6">0</span>
                    </a>
                </li>
                <li class="list-inline-item m-2">
                    <a href="" title="تعليقاتي" class="px-2">
                        <i class="fa-solid fa-message text-primary"></i>
                        <span class="h6">0</span>
                    </a>
                </li>
                <li class="list-inline-item m-2">
                    <a href="" title="تقييماتى" class="px-2">
                        <i class="fa-regular fa-star text-primary"></i>
                        <span class="h6">0</span>
                    </a>
                </li>
                <li class="list-inline-item m-2">
                    <a href="" title="مساراتى التعليمية"
                        class="px-2">
                        <i class="fa-sharp fa-solid fa-chart-line text-primary"></i>
                        <span class="h6">0</span>
                    </a>
                </li>
            </ul> --}}
        </div>
        <div class="card-body border-bottom">
            <ul class="list-unstyled">
                <li class="mb-3">
                    <span class="d-block">الإيميل:</span>
                    <span class="h6">{{ auth()->user()->email }}</span>
                </li>
                <li class="mb-3">
                    <span class="d-block">الهاتف:</span>
                    <span class="h6">{{ auth()->user()->phone }}</span>
                </li>
                <li class="mb-3">
                    <span class="d-block">العنوان:</span>
                    <span class="h6">{{ auth()->user()->address }}</span>
                </li>
                <li class="mb-3">
                    <span class="d-block">الكلية:</span>
                    <span class="h6">{{ auth()->user()->faculty }}</span>
                </li>
                <li class="mb-3">
                    <span class="d-block">اسم المستخدم:</span>
                    <span class="h6">{{ auth()->user()->university }}</span>
                </li>
            </ul>
            <a href="" class="btn-block btn btn-primary mb-3">تحديث
                الحساب</a>

        </div>
    </div>


</div> <!-- END col-md-4 -->
