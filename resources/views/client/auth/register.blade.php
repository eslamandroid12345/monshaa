<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>عقارك | إنشاء حساب</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/client/register.css') }}">

</head>

<body>

@include('client.layouts.header')


<main class="page">
    <section class="card-auth">
        <h1>إنشاء حساب جديد</h1>
        <p class="sub">أنشئ حسابك خلال دقيقة وابدأ في نشر الإعلانات أو حفظ المفضلة.</p>

        <form>
            <div class="grid-2">
                <div class="mb-3">
                    <label class="form-label">الاسم بالكامل</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-user prefix"></i>
                        <input class="form-control" type="text" placeholder="مثال: محمد أحمد" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">العنوان بالتفصيل</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-location-dot prefix"></i>
                        <input class="form-control" type="text" placeholder="مثال: القاهرة، مدينة نصر" required>
                    </div>
                </div>


                <div class="mb-3">
                    <label class="form-label">رقم الهاتف</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-phone prefix"></i>
                        <input class="form-control" type="text" placeholder="01000000000" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">البريد الإلكتروني </label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-envelope prefix"></i>
                        <input class="form-control" type="email" placeholder="example@email.com">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">كلمة المرور</label>
                    <div class="input-wrap position-relative">
                        <i class="fa-solid fa-lock prefix"></i>
                        <input class="form-control pe-5" id="pass1" type="password" placeholder="••••••••" required>
                        <i class="fa-solid fa-eye toggle-password" data-target="pass1"></i>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">تأكيد كلمة المرور</label>
                    <div class="input-wrap position-relative">
                        <i class="fa-solid fa-lock prefix"></i>
                        <input class="form-control pe-5" id="pass2" type="password" placeholder="••••••••" required>
                        <i class="fa-solid fa-eye toggle-password" data-target="pass2"></i>
                    </div>
                </div>

            </div>

            <label class="d-flex align-items-start gap-2 mt-1" style="font-size:13px;color:#334155;font-weight:800;">
                <input type="checkbox" style="width:18px;height:18px;accent-color:#2563eb;margin-top:2px;" required>
                أوافق على <a href="{{route('terms.condition.view')}}" style="color:#2563eb;text-decoration:none;">الشروط والأحكام</a> وسياسة الخصوصية
            </label>

            <button class="btn-main mt-3" type="submit">
                <i class="fa-solid fa-user-plus me-2"></i> إنشاء الحساب
            </button>

            <div class="text-center mt-3" style="font-size:13px;color:#64748b;">
                لديك حساب بالفعل؟ <a href="{{route('login.view')}}" style="color:#2563eb;font-weight:900;text-decoration:none;">تسجيل الدخول</a>
            </div>
        </form>
    </section>
</main>

@include('client.layouts.footer')


<script>
    document.getElementById("year").textContent = new Date().getFullYear();
</script>

<script>
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
