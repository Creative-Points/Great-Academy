<x-master-layout>
  <section class="padding-y-100 bg-light" style="height: auto !important;">
    <div class="container" style="height: auto !important;">
      <div class="row" style="height: auto !important;">
        <div class="col-lg-6 mx-auto" style="height: auto !important;">
          <div class="my-4">
       

            <div class="card shadow-v2">
              <div class="card-header border-bottom">
                <h1 class="mt-4 h4">
                  سجل الدخول لحسابك فى جريت أكاديمي! </h1>
              </div>
              <div class="card-body">
                <form id="login-form" class="px-lg-4" action="" method="post">
                  <input type="hidden" name="_csrf" value="wBSbIbA3BH7NBNF4Djyrgaz6wkLDaIulC3wL6bjPDAmZWdwW_WRHU7prlB9Rae7kmKuxDIIa1NNiGlGnjKBJUQ==">
                  <div class="form-group field-loginform-username required">
                    <label for="loginform-username">اسم المستخدم أو الأيميل</label>
                    <input type="email" id="loginform-username" class="form-control" name="" no-validate="" aria-required="true">
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="form-group field-loginform-password required">
                    <label for="loginform-password">كلمة السر</label>
                    <input type="password" id="loginform-password" class="form-control" name="" value="" aria-required="true">
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="d-md-flex justify-content-between my-4">
                    <div class="form-group field-loginform-rememberme">
                      <div class="custom-control custom-checkbox">
                        <input type="hidden" name="" value="0"><input type="checkbox" id="loginform-rememberme" class="custom-control-input" name="LoginForm[rememberMe]" value="1" checked="">
                        <label class="custom-control-label" for="loginform-rememberme">تذكرنى</label>
                        <div class="invalid-feedback"></div>
                      </div>
                    </div> <a href="/ar/request-password-reset" class="text-primary my-2 d-block">نسيت كلمة السر؟</a>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary" name="">تسجيل الدخول</button>
                  </div>
                </form>
                <!-- <ul class="my-5 list-unstyled">
                  <hr>
                  <li> - ليس لديك حساب؟ <a href="/ar/signup" class="text-primary">سجل اﻷن</a></li>
                  <li> - <a href="/ar/resend-verification-email" class="text-primary">إعادة ارسال بريد التفعيل</a></li>
                </ul> -->
              </div>
            </div>

          </div>
        </div>
      </div>
  </section>
</x-master-layout>