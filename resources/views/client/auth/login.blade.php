<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>عقارك | تسجيل الدخول</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/client/login.css') }}">

</head>

<body>

@include('client.layouts.header')

<main class="page">
    <div class="auth-wrap">

        <section class="auth-hero">
            <h1>أهلاً بك من جديد 👋</h1>
            <p>
                سجّل الدخول للوصول إلى حسابك في <b>عقارك</b> واستكمل رحلتك في البحث عن أفضل العقارات.
                تابع الإعلانات التي شاهدتها، احفظ المفضلة، وتواصل مباشرة مع المعلنين بكل سهولة.
            </p>

            <div class="bullets">
                <div><i class="fa-solid fa-shield-halved"></i> تسجيل دخول آمن وسريع</div>
                <div><i class="fa-solid fa-message"></i> تواصل أسهل مع المعلنين</div>
                <div><i class="fa-solid fa-magnifying-glass-location"></i> بحث ذكي وفلاتر دقيقة</div>
                <div><i class="fa-solid fa-star"></i> اقتراحات مخصصة حسب اهتماماتك</div>
            </div>

            <div style="margin-top:18px;font-size:13px;opacity:.95;line-height:1.9;max-width:420px;">
                <b>نصيحة:</b> فعّل خيار <b>تذكرني</b> لتسجيل دخول أسرع في المرات القادمة.
            </div>
        </section>


        <section class="card-auth">
            <h2>تسجيل الدخول</h2>
            <p class="sub">أدخل بياناتك للمتابعة.</p>

            <form>
                <div class="mb-3">
                    <label class="form-label">البريد الإلكتروني</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-user prefix"></i>
                        <input class="form-control" type="text" placeholder="example@email.com" required>
                    </div>
                </div>

                <div class="mb-2">
                    <label class="form-label">كلمة المرور</label>
                    <div class="input-wrap position-relative">
                        <i class="fa-solid fa-lock prefix"></i>
                        <input class="form-control pe-5" id="pass" type="password" placeholder="••••••••" required>
                        <i class="fa-solid fa-eye toggle-password" data-target="pass"></i>
                    </div>
                </div>


                <div class="row-2">
                    <label class="d-flex align-items-center gap-2" style="font-size:13px;color:#334155;font-weight:800;">
                        <input type="checkbox" style="width:18px;height:18px;accent-color:#2563eb;">
                        تذكرني
                    </label>
                    <a class="link" href="{{route('password.reset')}}">نسيت كلمة المرور؟</a>
                </div>

                <button class="btn-main mt-3" type="submit">
                    <i class="fa-solid fa-right-to-bracket me-2"></i> دخول
                </button>

                <div class="text-center mt-3" style="font-size:13px;color:#64748b;">
                    ليس لديك حساب؟ <a class="link" href="{{route('register.view')}}">إنشاء حساب جديد</a>
                </div>
            </form>

            <hr style="border-color:rgba(15,23,42,.08);margin:14px 0;">

{{--            <button class="btn btn-light w-100" type="button" style="border-radius:14px;font-weight:900;border:1px solid rgba(15,23,42,.12);">--}}
{{--                <i class="fa-brands fa-google me-2"></i> المتابعة باستخدام Google (Demo)--}}
{{--            </button>--}}

{{--            <button class="btn btn-light w-100 mt-2" type="button" style="border-radius:14px;font-weight:900;border:1px solid rgba(15,23,42,.12);">--}}
{{--                <i class="fa-brands fa-facebook me-2"></i> المتابعة باستخدام Facebook (Demo)--}}
{{--            </button>--}}
        </section>

    </div>
</main>

@include('client.layouts.footer')


<script>
    document.getElementById("year").textContent = new Date().getFullYear();
</script>

<script>
    document.getElementById("year").textContent = new Date().getFullYear();

    document.querySelectorAll(".toggle-password").forEach(icon => {
        icon.addEventListener("click", function () {
            const input = document.getElementById(this.dataset.target);

            if (input.type === "password") {
                input.type = "text";
                this.classList.remove("fa-eye");
                this.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                this.classList.remove("fa-eye-slash");
                this.classList.add("fa-eye");
            }
        });
    });
</script>

</body>
</html>
