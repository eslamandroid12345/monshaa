<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>عقارك | نسيت كلمة المرور</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/client/password_reset.css') }}">

</head>

<body>

@include('client.layouts.header')


<main class="page">
    <section class="card-auth">
        <h1>نسيت كلمة المرور؟</h1>
        <p class="sub">
            لا تقلق—أدخل البريد الإلكتروني، وسنرسل لك كود لإعادة تعيين كلمة المرور.
        </p>

        <div class="hint">
            <i class="fa-solid fa-circle-info"></i>
            <div>
                <div style="font-weight:900;margin-bottom:2px;">معلومة</div>
                <div style="color:#64748b;">
                    لا تشارك كود تغيير كلمه المرور مع اي شخص حفاظا علي الامان!
                </div>
            </div>
        </div>

        <form onsubmit="event.preventDefault(); demoSend();">
            <div class="mb-3">
                <label class="form-label"> البريد الإلكتروني</label>
                <div class="input-wrap">
                    <i class="fa-solid fa-envelope prefix"></i>
                    <input id="identity" class="form-control" type="text" placeholder="example@email.com" required>
                </div>
            </div>

            <button class="btn-main" type="submit">
                <i class="fa-solid fa-paper-plane me-2"></i> إرسال كود الاسترجاع
            </button>

            <div class="text-center mt-3" style="font-size:13px;color:#64748b;">
                تذكرت كلمة المرور؟ <a class="link" href="{{route('login.view')}}">تسجيل الدخول</a>
            </div>

            <div id="msg" class="mt-3" style="display:none;border-radius:14px;padding:12px;font-size:13px;"></div>
        </form>
    </section>
</main>


@include('client.layouts.footer')


<script>
    document.getElementById("year").textContent = new Date().getFullYear();

    function demoSend(){
        const val = document.getElementById("identity").value.trim();
        const msg = document.getElementById("msg");

        msg.style.display = "block";
        msg.style.background = "rgba(16,185,129,.08)";
        msg.style.border = "1px solid rgba(16,185,129,.18)";
        msg.style.color = "#065f46";
        msg.innerHTML = `<b>تم الإرسال (Demo)</b> — تم إرسال كود الاسترجاع إلى: <span dir="ltr">${val}</span><br>
      <span style="color:#64748b;">بعدها وجّه المستخدم لصفحة "إعادة تعيين كلمة المرور".</span>`;
    }
</script>
</body>
</html>
