<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تسجيل حساب تجريبي - منشأة</title>

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- Google Font Cairo -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="{{asset('css/admin/toast.css')}}" />

    <style>
        :root {
            --primary: #3f5063;
            --primary-dark: #22303e;
            --accent: #38bdf8;
            --text-dark: #1e293b;
        }

        body {
            font-family: 'Cairo', sans-serif;
            margin: 0;
            min-height: 100vh;
            background-color: #0f172a;
            background-image:
                radial-gradient(at 0% 0%, hsla(211,40%,25%,1) 0px, transparent 50%),
                radial-gradient(at 100% 100%, hsla(214,32%,17%,1) 0px, transparent 50%);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            color: var(--text-dark);
            padding: 20px 0; /* Extra padding top/bottom for scrollable areas on small screens */
        }

        /*
        * Splash
        */
        #splash {
            position: fixed;
            inset: 0;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            z-index: 9999;
        }

        #splash img {
            width: 160px;
            margin-bottom: 20px;
            animation: logoSpin 2s cubic-bezier(0.68, -0.55, 0.27, 1.55) forwards;
        }

        @keyframes logoSpin {
            0% { transform: scale(0.5) rotate(0deg); opacity: 0; }
            40% { transform: scale(1.1) rotate(180deg); opacity: 1; }
            100% { transform: scale(1) rotate(360deg); opacity: 1; }
        }

        /*
        * Layout
        */
        .login-shell {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            box-sizing: border-box;
            backdrop-filter: blur(10px);
        }

        .login-card {
            display: flex;
            width: 100%;
            max-width: 1200px;
            background: rgba(255, 255, 255, 0.98);
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 40px 80px rgba(0,0,0,0.5);
            border: 1px solid rgba(255,255,255,0.1);
            position: relative;
            z-index: 10;
            animation: slideUpFade 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            transform: translateY(40px);
        }

        @keyframes slideUpFade {
            to { opacity: 1; transform: translateY(0); }
        }

        /* ----- Brand Side (LHS but Visual Right in RTL) ----- */
        .brand-side {
            flex: 1.1;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 60px 40px;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .brand-side::before {
            content: '';
            position: absolute;
            top: -20%; right: -20%; width: 500px; height: 500px;
            background: radial-gradient(circle, var(--accent) 0%, transparent 60%);
            opacity: 0.15;
            border-radius: 50%;
            z-index: 0;
            animation: floatOrb 10s ease-in-out infinite alternate;
        }

        @keyframes floatOrb {
            from { transform: translate(0, 0); }
            to { transform: translate(-30px, 30px); }
        }

        .brand-side > * { position: relative; z-index: 1; }

        .brand-top { display: flex; align-items: center; gap: 15px; margin-bottom: 30px; }
        .brand-logo {
            width: 60px; height: 60px;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            font-size: 28px;
            color: #fff;
            border: 1px solid rgba(255,255,255,0.2);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .brand-name { font-size: 28px; font-weight: 900; line-height: 1.2; }
        .brand-sub { font-size: 14px; opacity: 0.85; font-weight: 500; }

        .brand-mid h2 { font-size: 34px; font-weight: 900; margin-bottom: 12px; }
        .brand-mid p { font-size: 15px; line-height: 1.8; opacity: 0.9; margin-bottom: 30px; font-weight: 500; }

        .brand-illustration {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .mini-stat {
            background: rgba(255,255,255,0.06);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255,255,255,0.1);
            padding: 12px 5px;
            border-radius: 16px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: default;
        }

        .mini-stat:hover {
            transform: translateY(-8px) scale(1.02);
            background: rgba(255,255,255,0.12);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
            border-color: rgba(255,255,255,0.3);
        }

        .mini-stat .v {
            width: 42px; height: 42px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 18px;
            color: #fff;
            transition: all 0.3s;
        }
        .mini-stat:hover .v {
            background: var(--accent);
            color: var(--primary-dark);
            transform: rotate(-10deg);
        }

        .mini-stat .t { font-size: 12px; font-weight: 800; }

        .brand-footer { font-size: 14px; opacity: 0.6; margin-top: 30px; font-weight: 600; }

        /* ----- Form Side (RHS but Visual Left in RTL) ----- */
        .form-side {
            flex: 1.3;
            padding: 50px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #ffffff;
        }

        .form-title { margin-bottom: 35px; text-align: center; }
        .form-title h1 {
            font-size: 32px;
            font-weight: 900;
            color: var(--text-dark);
            margin-bottom: 8px;
        }
        .form-title p { color: #64748b; font-size: 15px; font-weight: 600;}

        /* Form Grid Layout for Register Fields */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 20px;
            row-gap: 0px;
        }
        .field { margin-bottom: 20px; text-align: right; }
        .field.full-width { grid-column: span 2; }

        .form-label { color: #334155; font-size: 14px; font-weight: 700; margin-bottom: 8px; display: block; }

        .input-wrap { position: relative; }
        .input-wrap .prefix {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 16px;
            transition: 0.3s;
        }

        .form-control.custom {
            height: 52px;
            padding-right: 45px;
            padding-left: 20px;
            border-radius: 14px;
            border: 2px solid #e2e8f0;
            font-size: 14px;
            font-weight: 700;
            color: #1e293b;
            background: #f8fafc;
            transition: all 0.3s;
        }

        .form-control.custom:focus {
            background: #ffffff;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(63, 80, 99, 0.15);
            outline: none;
        }

        .form-control.custom:focus + .prefix,
        .input-wrap:focus-within .prefix {
            color: var(--primary);
        }

        .toggle-pass {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none; border: none; cursor: pointer;
            color: #94a3b8; font-size: 16px;
            transition: 0.3s;
            padding: 0;
        }
        .toggle-pass:hover { color: var(--primary); }

        /* Custom Checkbox */
        .row-actions {
            margin-bottom: 25px;
            background: #f8fafc;
            padding: 15px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }
        .form-check { display: flex; align-items: center; gap: 10px; padding-left: 0; margin-bottom: 0;}
        .form-check-input {
            width: 20px; height: 20px;
            margin-left: 0; margin-top: 0;
            cursor: pointer;
            border: 2px solid #cbd5e1;
            transition: 0.3s;
        }
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        .form-check-input:focus { border-color: var(--primary); box-shadow: 0 0 0 4px rgba(63, 80, 99, 0.15); }
        .form-check-label { font-size: 14px; font-weight: 700; color: #475569; position: relative; top: 1px; cursor: pointer; }

        .btn-login {
            height: 56px;
            font-size: 17px;
            font-weight: 800;
            border-radius: 14px;
            border: none;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: #fff;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
            box-shadow: 0 8px 20px rgba(30, 41, 59, 0.2);
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(135deg, var(--primary-dark) 0%, #0f172a 100%);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .btn-login:hover { transform: translateY(-3px); box-shadow: 0 12px 25px rgba(30, 41, 59, 0.3); color: #fff; }
        .btn-login:hover::before { opacity: 1; }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: #64748b;
            font-size: 14px;
            font-weight: 700;
            margin: 20px 0;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            border-bottom: 2px solid #f1f5f9;
        }
        .divider::before { margin-left: 20px; }
        .divider::after { margin-right: 20px; }

        .help {
            text-align: center;
            font-size: 15px;
            color: #64748b;
            line-height: 1.8;
            font-weight: 600;
        }
        .help .link {
            color: #0ea5e9;
            font-weight: 800;
            transition: 0.3s;
            margin-right: 5px;
            text-decoration: none;
        }
        .help .link:hover { text-decoration: underline; color: var(--primary-dark); }

        /* Success Bar Override */
        .login-success-bar {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #ef4444;
            color: #fff;
            padding: 15px 25px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            font-weight: 700;
            z-index: 9999;
            display: none;
            animation: slideIn 0.4s ease-out forwards;
        }
        .login-success-bar.show { display: block; }

        @keyframes slideIn {
            from { transform: translateX(100px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        /* Responsive Breakpoints */
        @media (max-width: 1024px) {
            .brand-side { padding: 40px; flex: none; border-radius: 24px 24px 0 0; }
            .brand-illustration, .brand-footer, .brand-mid p { display: none; }
            .brand-mid h2 { font-size: 26px; margin-bottom: 0px; text-align: center;}
            .brand-top { justify-content: center; margin-bottom: 20px; }
            .form-side { padding: 40px; border-radius: 0 0 24px 24px; flex: auto;}
            .login-card { flex-direction: column; max-width: 700px; border-radius: 24px; }
        }

        @media (max-width: 768px) {
            .form-grid { grid-template-columns: 1fr; } /* Stack fields vertically */
            .field.full-width { grid-column: span 1; }
        }

        @media (max-width: 576px) {
            .login-shell { padding: 15px 10px; }
            .form-side { padding: 30px 15px; }
            .brand-side { padding: 30px 15px; }
            .form-title h1 { font-size: 26px; }
        }
    </style>
</head>

<body>

<!-- Splash Screen -->
<div id="splash">
    <img src="{{asset('img/icons/monshaa.jpg')}}" alt="شعار منشأة">
</div>

<!-- Main UI -->
<div class="login-shell">
    <div class="login-card">

        <!-- LEFT: Branding -->
        <section class="brand-side">
            <div>
                <div class="brand-top">
                    <div class="brand-logo">
                        <i class="fa-solid fa-building"></i>
                    </div>
                    <div>
                        <div class="brand-name">منشأة</div>
                        <div class="brand-sub">إدارة عقاراتك بكل سهولة وذكاء</div>
                    </div>
                </div>

                <div class="brand-mid">
                    <h2>أهلاً بك في تطبيق منشأة 👋</h2>
                    <p>
                        سجّل حساب شركتك الآن وابدأ إدارة عقاراتك، المستأجرين، والعقود بكفاءة واحترافية تامة.
                    </p>

                    <div class="brand-illustration">
                        <div class="mini-stat"><div class="v"><i class="fa-solid fa-city"></i></div><div class="t">العقارات</div></div>
                        <div class="mini-stat"><div class="v"><i class="fa-solid fa-map-location-dot"></i></div><div class="t">الاراضي</div></div>
                        <div class="mini-stat"><div class="v"><i class="fa-solid fa-user-check"></i></div><div class="t">المستاجرين</div></div>
                        <div class="mini-stat"><div class="v"><i class="fa-solid fa-file-signature"></i></div><div class="t">عقود الايجار</div></div>
                        <div class="mini-stat"><div class="v"><i class="fa-solid fa-file-circle-xmark"></i></div><div class="t">العقود المنتهيه</div></div>
                        <div class="mini-stat"><div class="v"><i class="fa-solid fa-receipt"></i></div><div class="t">سندات القبض</div></div>
                        <div class="mini-stat"><div class="v"><i class="fa-solid fa-money-bill-transfer"></i></div><div class="t">سندات الصرف</div></div>
                        <div class="mini-stat"><div class="v"><i class="fa-solid fa-wallet"></i></div><div class="t">الايردات</div></div>
                        <div class="mini-stat"><div class="v"><i class="fa-solid fa-sack-dollar"></i></div><div class="t">المصروفات</div></div>
                        <div class="mini-stat"><div class="v"><i class="fa-regular fa-bell"></i></div><div class="t">الاشعارات</div></div>
                        <div class="mini-stat"><div class="v"><i class="fa-solid fa-users"></i></div><div class="t">الموظفين</div></div>
                        <div class="mini-stat"><div class="v"><i class="fa-solid fa-user-group"></i></div><div class="t">العملاء</div></div>
                    </div>
                </div>
            </div>

            <div class="brand-footer">
                © <span id="y"></span> منشأة - جميع الحقوق محفوظة
            </div>
        </section>

        <!-- RIGHT: Form -->
        <section class="form-side">
            <div class="form-title">
                <h1>إنشاء حساب تجريبي</h1>
                <p>أنشئ حساب شركتك اليوم واستمتع بنظام متكامل</p>
            </div>

            <form action="{{route('admin.register')}}" method="POST" autocomplete="off">
                @csrf
                @method('POST')

                <div class="form-grid">
                    <div class="field full-width">
                        <label class="form-label">اسم الشركة</label>
                        <div class="input-wrap">
                            <i class="fa-solid fa-building prefix"></i>
                            <input
                                class="form-control custom @error('company_name') is-invalid @enderror"
                                type="text"
                                name="company_name"
                                value="{{ old('company_name')}}"
                                placeholder="اسم الشركة الرسمية" required>
                        </div>
                        @error('company_name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="form-label">عنوان الشركة</label>
                        <div class="input-wrap">
                            <i class="fa-solid fa-location-dot prefix"></i>
                            <input
                                class="form-control custom @error('company_address') is-invalid @enderror"
                                type="text"
                                name="company_address"
                                value="{{ old('company_address')}}"
                                placeholder="العنوان التفصيلي" required>
                        </div>
                        @error('company_address')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="form-label">رقم هاتف الشركة</label>
                        <div class="input-wrap">
                            <i class="fa-solid fa-phone prefix"></i>
                            <input
                                class="form-control custom @error('company_phone') is-invalid @enderror"
                                type="text"
                                name="company_phone"
                                value="{{ old('company_phone') }}"
                                placeholder="هاتف الشركة">
                        </div>
                        @error('company_phone')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="form-label">اسم المدير</label>
                        <div class="input-wrap">
                            <i class="fa-solid fa-user-tie prefix"></i>
                            <input
                                class="form-control custom @error('name') is-invalid @enderror"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="الاسم بالكامل" required>
                        </div>
                        @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="form-label">رقم هاتف المدير (للدخول)</label>
                        <div class="input-wrap">
                            <i class="fa-solid fa-mobile-screen-button prefix"></i>
                            <input
                                class="form-control custom @error('phone') is-invalid @enderror"
                                type="text"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="سيتم استخدامه كاسم مستخدم" required>
                        </div>
                        @error('phone')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="form-label">كلمة المرور</label>
                        <div class="input-wrap">
                            <i class="fa-solid fa-lock prefix"></i>
                            <input
                                class="form-control custom @error('password') is-invalid @enderror"
                                id="password"
                                type="password"
                                name="password"
                                placeholder="أدخل كلمة المرور" required>
                            <button type="button" class="toggle-pass" id="togglePass" aria-label="إظهار كلمة المرور">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="form-label">تأكيد كلمة المرور</label>
                        <div class="input-wrap">
                            <i class="fa-solid fa-lock prefix"></i>
                            <input
                                class="form-control custom @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                placeholder="تطابق كلمة المرور" required>
                            <button type="button" class="toggle-pass" id="togglePass2" aria-label="إظهار كلمة المرور">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                        @error('password_confirmation')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row-actions mt-2">
                    <div class="form-check">
                        <input class="form-check-input @error('privacy_and_policy') is-invalid @enderror"
                               type="checkbox"
                               id="remember"
                               name="privacy_and_policy"
                               value="1"
                               {{ old('privacy_and_policy') ? 'checked' : '' }} required>
                        <label class="form-check-label" for="remember">لقد قرأت وأوافق على شروط الخدمة وسياسة الخصوصية</label>
                    </div>

                    @error('privacy_and_policy')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button id="btnLogin" class="btn btn-primary w-100 btn-login mt-3" type="submit">
                    <span class="btn-text">تسجيل الحساب</span>
                    <span class="btn-spinner d-none">
                        <span class="spinner-border spinner-border-sm" style="margin-left: 8px;"></span>
                        جاري تسجيل البيانات...
                    </span>
                </button>

                <div class="divider">أو</div>

                <div class="help mt-3">
                    لديك حساب بالفعل؟
                    <a class="link" href="{{route('admin.login.view')}}">تسجيل الدخول</a>
                </div>

                <div class="help mt-2" style="font-size: 14px;">
                    هل تواجه مشكلة؟
                    <a class="link" href="https://wa.me/201062933188" target="_blank">تواصل مع فريق الدعم</a>
                </div>
            </form>
        </section>

    </div>
</div>

@if(session('register_fail'))
    <div id="loginSuccessBar" class="login-success-bar show">
        {{ session('register_fail') }}
    </div>
@endif

<script>
    // System Year
    document.getElementById("y").textContent = new Date().getFullYear();

    // Show/Hide Main Password
    const pass = document.getElementById("password");
    const toggle = document.getElementById("togglePass");
    toggle.addEventListener("click", () => {
        const isPass = pass.type === "password";
        pass.type = isPass ? "text" : "password";
        toggle.innerHTML = isPass
            ? '<i class="fa-regular fa-eye-slash"></i>'
            : '<i class="fa-regular fa-eye"></i>';
    });

    // Show/Hide Confirmation Password
    const passwordConfirmation = document.getElementById("password_confirmation");
    const togglePass2 = document.getElementById("togglePass2");
    togglePass2.addEventListener("click", () => {
        const isPass = passwordConfirmation.type === "password";
        passwordConfirmation.type = isPass ? "text" : "password";
        togglePass2.innerHTML = isPass
            ? '<i class="fa-regular fa-eye-slash"></i>'
            : '<i class="fa-regular fa-eye"></i>';
    });

    // Form Loading Animation
    const form = document.querySelector('form');
    const btnLogin = document.getElementById('btnLogin');

    function activateButtonLoader(button){
        const text = button.querySelector('.btn-text');
        const spinner = button.querySelector('.btn-spinner');

        text.classList.add('d-none');
        spinner.classList.remove('d-none');

        button.style.pointerEvents = 'none';
        button.style.opacity = '0.85';
    }

    form.addEventListener('submit', function () {
        // Prevent activation if client validation fails (like required attributes)
        if(form.checkValidity()) {
            activateButtonLoader(btnLogin);
        }
    });

    // Splash Screen
    const splashLogo = document.querySelector('#splash img');
    if(splashLogo) {
        splashLogo.addEventListener('animationend', function () {
            document.getElementById("splash").style.display = "none";
        });
    }

    // Auto-hide alert messages after a few seconds
    setTimeout(() => {
        const bar = document.getElementById("loginSuccessBar");
        if(bar) {
            bar.style.opacity = '0';
            setTimeout(() => bar.style.display = 'none', 300);
        }
    }, 5000);
</script>

</body>
</html>
