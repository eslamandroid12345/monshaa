<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تسجيل حساب تجريبي</title>

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- Cairo Font -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap" rel="stylesheet"> -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/admin/register.css') }}">

</head>

<body>

<div class="login-shell">
    <div class="login-card">

        <!-- LEFT: Branding -->
        <section class="brand-side">
            <div>
                <div class="brand-top">
                    <div class="brand-logo">
                        <i class="fa-solid fa-hospital"></i>
                    </div>
                    <div>
                        <div class="brand-name">عقارك</div>
                        <div class="brand-sub">اداره عقاراتك بكل سهوله</div>
                    </div>
                </div>

                <div class="brand-mid">
                    <h2>اهلا بك في تطبيق عقارك</h2>👋</h2>
                    <p>
                        سجّل حساب شركتك الآن وابدأ إدارة عقاراتك بكفاءة وسهولة تامة.
                    </p>

                    <div class="brand-illustration">

                        <div class="mini-stat">
                            <div class="v"><i class="fa-solid fa-city"></i></div>
                            <div class="t">العقارات</div>
                        </div>

                        <div class="mini-stat">
                            <div class="v"><i class="fa-solid fa-map-location-dot"></i></div>
                            <div class="t">الاراضي</div>
                        </div>

                        <div class="mini-stat">
                            <div class="v"><i class="fa-solid fa-user-check"></i></div>
                            <div class="t">المستاجرين</div>
                        </div>

                        <div class="mini-stat">
                            <div class="v"><i class="fa-solid fa-file-signature"></i></div>
                            <div class="t">عقود الايجار</div>
                        </div>

                        <div class="mini-stat">
                            <div class="v"><i class="fa-solid fa-file-circle-xmark"></i></div>
                            <div class="t">العقود المنتهيه</div>
                        </div>

                        <div class="mini-stat">
                            <div class="v"><i class="fa-solid fa-receipt"></i></div>
                            <div class="t">سندات القبض</div>
                        </div>

                        <div class="mini-stat">
                            <div class="v"><i class="fa-solid fa-money-bill-transfer"></i></div>
                            <div class="t">سندات الصرف</div>
                        </div>

                        <div class="mini-stat">
                            <div class="v"><i class="fa-solid fa-wallet"></i></div>
                            <div class="t">الايردات</div>
                        </div>


                        <div class="mini-stat">
                            <div class="v"><i class="fa-solid fa-sack-dollar"></i></div>
                            <div class="t">المصروفات</div>
                        </div>


                        <div class="mini-stat">
                            <div class="v"><i class="fa-solid fa-percent"></i></div>
                            <div class="t">عموله الموظفين</div>
                        </div>

                        <div class="mini-stat">
                            <div class="v"> <i class="fa-regular fa-bell"></i></div>
                            <div class="t">الاشعارات</div>
                        </div>

                        <div class="mini-stat">
                            <div class="v"><i class="fa-solid fa-users"></i></div>
                            <div class="t">الموظفين</div>
                        </div>

                        <div class="mini-stat">
                            <div class="v"><i class="fa-solid fa-user-group"></i></div>
                            <div class="t">العملاء</div>
                        </div>

                        <div class="mini-stat">
                            <div class="v"><i class="fa-solid fa-chart-column"></i></div>
                            <div class="t">التقارير</div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="brand-footer">
                © <span id="y"></span> عقارك - جميع الحقوق محفوظة
            </div>
        </section>

        <!-- RIGHT: Form -->
        <section class="form-side">
            <div class="form-title">
                <h1>تسجيل حساب تجريبي</h1>
                <p>أنشئ حساب شركتك اليوم واستمتع بإدارة عقاراتك بكل احترافية وسلاسة.</p>
            </div>

            <form action="{{route('admin.register')}}" method="POST" autocomplete="off">
                @csrf
                @method('POST')

                <div class="field">
                    <label class="form-label fw-bold mb-2">اسم الشركة</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-building prefix"></i>
                        <input
                            class="form-control custom @error('company_name') is-invalid @enderror"
                            type="text"
                            name="company_name"
                            value="{{ old('company_name')}}"
                            placeholder="اسم الشركة">
                    </div>
                    @error('company_name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label class="form-label fw-bold mb-2">عنوان الشركة</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-location-dot prefix"></i>
                        <input
                            class="form-control custom @error('company_address') is-invalid @enderror"
                            type="text"
                            name="company_address"
                            value="{{ old('company_address')}}"
                            placeholder="عنوان الشركة">
                    </div>
                    @error('company_address')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label class="form-label fw-bold mb-2">رقم هاتف الشركة</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-phone prefix"></i>
                        <input
                            class="form-control custom @error('company_phone') is-invalid @enderror"
                            type="text"
                            name="company_phone"
                            value="{{ old('company_phone') }}"
                            placeholder="رقم هاتف الشركة">
                    </div>
                    @error('company_phone')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label class="form-label fw-bold mb-2">اسم المدير</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-user-tie prefix"></i>
                        <input
                            class="form-control custom @error('name') is-invalid @enderror"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="اسم المدير">
                    </div>
                    @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label class="form-label fw-bold mb-2">رقم هاتف المدير</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-mobile-screen-button prefix"></i>
                        <input
                            class="form-control custom @error('phone') is-invalid @enderror"
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            placeholder="رقم هاتف المدير">
                    </div>
                    @error('phone')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label class="form-label fw-bold mb-2">كلمة المرور</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-lock prefix"></i>
                        <input
                            class="form-control custom @error('password') is-invalid @enderror"
                            id="password"
                            type="password"
                            name="password"
                            placeholder="أدخل كلمة المرور">
                        <button type="button" class="toggle-pass" id="togglePass" aria-label="show password">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="field">
                    <label class="form-label fw-bold mb-2">تأكيد كلمة المرور</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-lock prefix"></i>
                        <input
                            class="form-control custom @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            placeholder="تأكيد كلمة المرور">
                        <button type="button" class="toggle-pass" id="togglePass2" aria-label="show password">
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                    @error('password_confirmation')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row-actions">
                    <div class="form-check">
                        <input class="form-check-input @error('privacy_and_policy') is-invalid @enderror"
                               type="checkbox"
                               id="remember"
                               name="privacy_and_policy"
                               value="1"
                            {{ old('privacy_and_policy') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">الموافقة على الشروط والسياسات</label>
                    </div>

                    @error('privacy_and_policy')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button id="btnLogin" class="btn btn-primary w-100 btn-login" type="submit">
                    <span class="btn-text">تسجيل الحساب</span>
                    <span class="btn-spinner d-none">
                    <span class="spinner-border spinner-border-sm"></span>
                    برجاء الانتظار جاري تسجيل البيانات...
                </span>
                </button>

                <div class="divider">أو</div>

                <div class="help">
                    لديك حساب بالفعل
                    <a class="link" href="{{route('admin.login.view')}}">تسجيل الدخول</a>
                </div>

                <div class="help">
                    لو عندك مشكلة في تسجيل الحساب التجريبي تواصل مع الدعم الفني.
                    <a class="link" href="https://wa.me/201062933188">تواصل مع الدعم</a>
                </div>
            </form>
        </section>

    </div>
</div>

<script>
    // year
    document.getElementById("y").textContent = new Date().getFullYear();

    // show/hide password
    const pass = document.getElementById("password");
    const toggle = document.getElementById("togglePass");
    toggle.addEventListener("click", () => {
        const isPass = pass.type === "password";
        pass.type = isPass ? "text" : "password";
        toggle.innerHTML = isPass
            ? '<i class="fa-regular fa-eye-slash"></i>'
            : '<i class="fa-regular fa-eye"></i>';
    });
</script>

<script>
    // show/hide confirmation password
    const passwordConfirmation = document.getElementById("password_confirmation");
    const togglePass2 = document.getElementById("togglePass2");
    togglePass2.addEventListener("click", () => {
        const isPass = passwordConfirmation.type === "password";
        passwordConfirmation.type = isPass ? "text" : "password";
        togglePass2.innerHTML = isPass
            ? '<i class="fa-regular fa-eye-slash"></i>'
            : '<i class="fa-regular fa-eye"></i>';
    });
</script>


<script>
    const form = document.querySelector('form');
    const btnLogin = document.getElementById('btnLogin');
    const btnDemo = document.getElementById('btnDemo');

    function activateButtonLoader(button){
        const text = button.querySelector('.btn-text');
        const spinner = button.querySelector('.btn-spinner');

        text.classList.add('d-none');
        spinner.classList.remove('d-none');

        button.disabled = true;
    }

    // تسجيل الدخول
    form.addEventListener('submit', function () {
        activateButtonLoader(btnLogin);
    });

    // تسجيل الحساب التجريبي
    btnDemo.addEventListener('click', function () {
        activateButtonLoader(btnDemo);
    });
</script>
</body>
</html>
