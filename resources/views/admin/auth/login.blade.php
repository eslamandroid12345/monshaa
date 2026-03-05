<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تسجيل الدخول</title>

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- Cairo Font -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">

    <style>
        .btn-login{
            background-color: #3f5564 !important;
            border-color: #3f5564 !important;
            color: #fff;
        }

        .btn-login:hover{
            background-color: #1e293b !important;
            border-color: #1e293b !important;
        }

        .btn-login:focus,
        .btn-login:active{
            background-color: #1e293b !important;
            border-color: #1e293b !important;
            box-shadow: 0 0 0 0.2rem rgba(51,65,85,0.25);
        }

    </style>
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
                    <h2>مرحباً بعودتك 👋</h2>
                    <p>
                        ,قم بتسجيل الدخول للوصول إلى لوحة التحكم وإدارة عقاراتك، العملاء
                        والإيرادات والتقارير بشكل سريع وآمن.
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


                    </div>
                </div>
            </div>

            <div class="brand-footer">
                © <span id="y"></span> جميع الحقوق محفوظة
            </div>
        </section>

        <!-- RIGHT: Form -->
        <section class="form-side">
            <div class="form-title">
                <h1>تسجيل الدخول</h1>
                <p>أدخل بياناتك للوصول إلى لوحة التحكم</p>
            </div>

            <!-- form -->
            <form action="{{route('admin.login')}}" method="POST" autocomplete="off">
                @csrf
                <div class="field">
                    <label class="form-label fw-bold mb-2">اسم المستخدم</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-user prefix"></i>
                        <input
                            class="form-control custom @error('phone') is-invalid @enderror"
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            placeholder="ادخل رقم هاتف الدخول للنظام">
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

                <div class="row-actions">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">تذكرني</label>
                    </div>
                    <a class="link" href="#">نسيت كلمة المرور؟</a>
                </div>

                <button id="btnLogin" class="btn btn-primary w-100 btn-login" type="submit">
                    <span class="btn-text">تسجيل الدخول</span>
                    <span class="btn-spinner d-none">
            <span class="spinner-border spinner-border-sm"></span>
            جاري تسجيل الدخول...
        </span>
                </button>

                <a href="{{route('admin.register.view')}}">
                    <button class="btn btn-primary w-100 btn-login" type="button">
                        تسجيل حساب تجريبي
                    </button>
                </a>

                <div class="divider">أو</div>

                <div class="help">
                    لو عندك مشكلة في تسجيل الحساب التجريبي تواصل مع الدعم الفني.
                    <a class="link" href="https://wa.me/201062933188">تواصل مع الدعم</a>
                </div>
            </form>        </section>

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
