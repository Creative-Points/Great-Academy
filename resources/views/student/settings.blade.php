<x-master-layout>

    <section class="paddingTop-50 paddingBottom-100 bg-light" style="height: auto !important;">
        <div class="container" style="height: auto !important;">
            <div class="row" style="height: auto !important;">
                <div class="col-12">

                </div>
                @include('layouts.info')
                <div class="col-md-8  order-sm-2 order-1 mt-4" style="height: auto !important;">

                    <div class="card padding-30 shadow-v1">
                        <ul class="nav tab-line tab-line border-bottom mb-4" role="link">
                            <li class="nav-item">
                                <a class="nav-link active" href="/ar/profile/account/profile/index" title="بياناتك">
                                    <i class="fa-solid fa-info ml-1"></i>
                                    <span class="d-none d-md-inline">بياناتك</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="/ar/profile/account/profile/update" title="تحديث">
                                    <i class="fa-solid fa-pen ml-1"></i> <span class="d-none d-md-inline">تحديث</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="/ar/profile/account/profile/password" title="كلمة السر">
                                    <i class="fa-solid fa-lock ml-1"></i> <span class="d-none d-md-inline">كلمة
                                        السر</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="/ar/profile/account/profile/image" title="الصورة">
                                    <i class="fa-solid fa-image ml-1"></i> <span
                                        class="d-none d-md-inline">الصورة</span>
                                </a>
                            </li>
                        </ul>
                        <div class="py-4 px-2">

                            <div class="table-responsive my-4">
                                <table class="table ">
                                    <tbody>
                                        <tr>
                                            <th><b>اسم المستخدم</b></th>
                                            <td>ahmedawiss80</td>
                                        </tr>
                                        <tr>
                                            <th><b>الإيميل</b></th>
                                            <td>ahmedawiss80@gmail.com</td>
                                        </tr>
                                        <tr>
                                            <th><b>حالة الحساب</b></th>
                                            <td>Not_Confirmed</td>
                                        </tr>
                                        <tr>
                                            <th><b>url</b></th>
                                            <td>ahmedawiss80</td>
                                        </tr>
                                        <tr>
                                            <th><b>الرقم التعريفى</b></th>
                                            <td>632075abebb8b</td>
                                        </tr>
                                        <tr>
                                            <th><b>الاسم</b></th>
                                            <td>ahmed</td>
                                        </tr>
                                        <tr>
                                            <th><b>اللقب</b></th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th><b>اﻷشتراك فى الخدمة البريدية</b></th>
                                            <td>No</td>
                                        </tr>
                                        <tr>
                                            <th><b>الدولة</b></th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th><b>الرتبة</b></th>
                                            <td>User</td>
                                        </tr>
                                        <tr>
                                            <th><b>نبذة عنك</b></th>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="height: auto !important;">

                    </div>
                </div> <!-- END col-md-8 -->
            </div>
            <!--END row-->
        </div>
        <!--END container-->
    </section>




</x-master-layout>
