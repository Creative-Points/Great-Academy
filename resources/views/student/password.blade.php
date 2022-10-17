<x-master-layout>

    <div class="card padding-30 shadow-v1">
        <ul class="nav tab-line tab-line border-bottom mb-4" role="link">
            <li class="nav-item">
                <a class="nav-link" href="/ar/profile/account/profile/index" title="بياناتك">
                    <i class="fa-solid fa-info ml-1"></i>
                    <span class="d-none d-md-inline">بياناتك</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/ar/profile/account/profile/update" title="تحديث">
                    <i class="fa-solid fa-pen ml-1"></i> <span class="d-none d-md-inline">تحديث</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link " href="/ar/profile/account/profile/password" title="كلمة السر">
                    <i class="fa-solid fa-lock ml-1"></i> <span class="d-none d-md-inline">كلمة السر</span>
                </a>
            </li>
        </ul>
        <div class="py-4 px-2">

            <form id="update-password-form" action="" method="post">
                @csrf
                <div class=" mb-4 pb-4">

                    <h4 class="mb-4">تحديث كلمة السر</h4>

                    <div class="form-group field-updatepasswordform-currentpassword required">
                        <label for="updatepasswordform-currentpassword">كلمة السر الحالية</label>
                        <input type="password" id="updatepasswordform-currentpassword" class="form-control"
                            name="UpdatePasswordForm[currentPassword]" aria-required="true">

                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group field-updatepasswordform-newpassword required">
                        <label for="updatepasswordform-newpassword">كلمة السر الجديدة</label>
                        <input type="password" id="updatepasswordform-newpassword" class="form-control"
                            name="UpdatePasswordForm[newPassword]" aria-required="true">

                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group field-updatepasswordform-renewpassword required">
                        <label for="updatepasswordform-renewpassword">تأكيد كلمة السر الجديدة</label>
                        <input type="password" id="updatepasswordform-renewpassword" class="form-control"
                            name="UpdatePasswordForm[reNewPassword]" aria-required="true">

                        <div class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>

            </form>
        </div>
    </div>


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
