<x-master-layout>

    
    <div class="padding-y-25 bg-light-v5 border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><bdi>كلمة السر</bdi></h1>

                    <ul class="breadcrumb breadcrumb-tringle bg-transparent">
                        <li class="breadcrumb-item"><bdi><a href="/ar">الحساب</a></bdi></li>
                        <li class="breadcrumb-item"><bdi>كلمة السر</bdi></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

  

    <section class="paddingTop-50 paddingBottom-100 bg-light" style="height: auto !important;">
        <div class="container" style="height: auto !important;">
            <div class="row" style="height: auto !important;">
                <div class="col-12">

                </div>
                <div class="col-md-4  order-sm-1 order-2 mt-4" style="height: auto !important;">
                        <div class="card shadow-v1">
                            <div class="card-header text-center border-bottom pt-5 mb-4">
                                <a href="/ar">
                                    <span class="iconbox padding-60 bg-primary text-white mb-4 text-uppercase ">a</span>
                                </a>
                                <h4 class="text-capitalize">
                                    ahmed </h4>
                                <p class="small">
                                    تم الانضمام فى <bdi>13 Sep, 2022</bdi>
                                </p>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item m-2">
                                        <a href="/ar/profile/courses/user/in-progress" title="دوراتي" class="px-2">
                                        <i class="fa-solid fa-film text-primary"></i>
                                            <span class="h6">0</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item m-2">
                                        <a href="/ar/profile/comments/user/index" title="تعليقاتي" class="px-2">
                                        <i class="fa-solid fa-message text-primary"></i>
                                            <span class="h6">0</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item m-2">
                                        <a href="/ar/profile/reviews/user/index" title="تقييماتى" class="px-2">
                                        <i class="fa-regular fa-star text-primary"></i>
                                            <span class="h6">0</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item m-2">
                                        <a href="/ar/profile/tracks/user/in-progress" title="مساراتى التعليمية" class="px-2">
                                        <i class="fa-sharp fa-solid fa-chart-line text-primary"></i>
                                            <span class="h6">0</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body border-bottom">
                                <ul class="list-unstyled">
                                    <li class="mb-3">
                                        <span class="d-block">الإيميل:</span>
                                        <span class="h6">ahmedawiss80@gmail.com</span>
                                    </li>
                                    <li class="mb-3">
                                        <span class="d-block">اسم المستخدم:</span>
                                        <span class="h6">ahmedawiss80</span>
                                    </li>
                                    <li class="mb-3">
                                        <span class="d-block">رقم الحساب:</span>
                                        <span class="h6">632075abebb8b</span>
                                    </li>
                                </ul>
                                <a href="/ar/profile/account/profile/index" class="btn-block btn btn-primary mb-3">تحديث الحساب</a>

                            </div>
                        </div>

                       
                    </div> <!-- END col-md-4 -->
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
                                <i class="fa-solid fa-lock ml-1"></i> <span class="d-none d-md-inline">كلمة السر</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="/ar/profile/account/profile/image" title="الصورة">
                                    <i class="fa-solid fa-image ml-1"></i> <span class="d-none d-md-inline">الصورة</span>
                                </a>
                            </li>
                        </ul>
                        <div class="py-4 px-2">

                            <form id="update-password-form" action="" method="post">
                                <input type="hidden" name="_csrf" value="DHngxnyVmkbsLULK9d8AL2Ljmq3bOobcnkuMmzEOT9VgC6GvRfjRLaEaEovEtDJKNJT5yJ9s55jYBvnMQEsamA==">
                                <div class=" mb-4 pb-4">

                                    <h4 class="mb-4">تحديث كلمة السر</h4>

                                    <div class="form-group field-updatepasswordform-currentpassword required">
                                        <label for="updatepasswordform-currentpassword">كلمة السر الحالية</label>
                                        <input type="password" id="updatepasswordform-currentpassword" class="form-control" name="UpdatePasswordForm[currentPassword]" aria-required="true">

                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group field-updatepasswordform-newpassword required">
                                        <label for="updatepasswordform-newpassword">كلمة السر الجديدة</label>
                                        <input type="password" id="updatepasswordform-newpassword" class="form-control" name="UpdatePasswordForm[newPassword]" aria-required="true">

                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="form-group field-updatepasswordform-renewpassword required">
                                        <label for="updatepasswordform-renewpassword">تأكيد كلمة السر الجديدة</label>
                                        <input type="password" id="updatepasswordform-renewpassword" class="form-control" name="UpdatePasswordForm[reNewPassword]" aria-required="true">

                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    
            </div>
            <!--END row-->
        </div>
        <!--END container-->
    </section>



  
    <script>
        jQuery(function($) {
            jQuery('#update-password-form').yiiActiveForm([{
                "id": "updatepasswordform-currentpassword",
                "name": "currentPassword",
                "container": ".field-updatepasswordform-currentpassword",
                "input": "#updatepasswordform-currentpassword",
                "error": ".invalid-feedback",
                "validate": function(attribute, value, messages, deferred, $form) {
                    yii.validation.required(value, messages, {
                        "message": "كلمة السر الحالية لا يمكن تركه فارغًا."
                    });
                    yii.validation.string(value, messages, {
                        "message": "كلمة السر الحالية يجب أن يكون كلمات",
                        "min": 6,
                        "tooShort": "كلمة السر الحالية يجب أن يحتوي على أكثر من ٦ حروف.",
                        "skipOnEmpty": 1
                    });
                }
            }, {
                "id": "updatepasswordform-newpassword",
                "name": "newPassword",
                "container": ".field-updatepasswordform-newpassword",
                "input": "#updatepasswordform-newpassword",
                "error": ".invalid-feedback",
                "validate": function(attribute, value, messages, deferred, $form) {
                    yii.validation.required(value, messages, {
                        "message": "كلمة السر الجديدة لا يمكن تركه فارغًا."
                    });
                    yii.validation.string(value, messages, {
                        "message": "كلمة السر الجديدة يجب أن يكون كلمات",
                        "min": 6,
                        "tooShort": "كلمة السر الجديدة يجب أن يحتوي على أكثر من ٦ حروف.",
                        "skipOnEmpty": 1
                    });
                }
            }, {
                "id": "updatepasswordform-renewpassword",
                "name": "reNewPassword",
                "container": ".field-updatepasswordform-renewpassword",
                "input": "#updatepasswordform-renewpassword",
                "error": ".invalid-feedback",
                "validate": function(attribute, value, messages, deferred, $form) {
                    yii.validation.required(value, messages, {
                        "message": "تأكيد كلمة السر الجديدة لا يمكن تركه فارغًا."
                    });
                    yii.validation.string(value, messages, {
                        "message": "تأكيد كلمة السر الجديدة يجب أن يكون كلمات",
                        "min": 6,
                        "tooShort": "تأكيد كلمة السر الجديدة يجب أن يحتوي على أكثر من ٦ حروف.",
                        "skipOnEmpty": 1
                    });
                    yii.validation.compare(value, messages, {
                        "operator": "==",
                        "type": "string",
                        "compareAttribute": "updatepasswordform-newpassword",
                        "compareAttributeName": "UpdatePasswordForm[newPassword]",
                        "skipOnEmpty": 1,
                        "message": "تأكيد كلمة السر الجديدة يجب أن يساوي \"كلمة السر الجديدة\"."
                    }, $form);
                }
            }], {
                "errorSummary": ".alert.alert-danger",
                "errorCssClass": "is-invalid",
                "successCssClass": "is-valid",
                "validationStateOn": "input"
            });
        });
    </script>


</x-master-layout>