<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تسجيل الدخول</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        :root{
            --page-bg:#f3f3f3;
            --primary:#6e98b6;
            --primary-dark:#5a88a8;
            --border:#c3dde6;
            --text-soft:#7aa3b8;
            --placeholder:#b7b7b7;
        }

        *{
            box-sizing:border-box
        }

        body{
            margin:0;
            font-family:"Cairo",system-ui,-apple-system,"Segoe UI",Tahoma,Arial;
            min-height:100vh;
            color:#4b5563;
            background:#fff;
        }

        /* splash screen */

        #splash{
            position:fixed;
            inset:0;
            background:#fff;
            display:flex;
            align-items:center;
            justify-content:center;
            flex-direction:column;
            z-index:9999;
        }

        /* logo animation */

        #splash img{
            width:160px;
            margin-bottom:20px;
            animation:logoSpin 2s ease-in-out forwards;
        }

        @keyframes logoSpin{

            0%{
                transform:scale(0.7) rotate(0deg);
                opacity:0;
            }

            40%{
                transform:scale(1.2) rotate(180deg);
                opacity:1;
            }

            100%{
                transform:scale(1) rotate(360deg);
                opacity:1;
            }

        }

        /* hide main page at first */

        #mainPage{
            display:none;
        }

        /* layout */

        .auth-wrapper{
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:28px 18px;
        }

        .auth-card{
            width:100%;
            max-width:1040px;
            border-radius:28px;
        }

        .auth-grid{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:28px;
            align-items:center;
        }

        .form-side{
            padding:8px 18px;
        }

        .brand-icon{
            width:64px;
            height:64px;
            margin:0 auto 8px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:46px;
        }

        .brand-icon img{
            max-width:100%;
        }

        .form-title{
            text-align:center;
            color:var(--text-soft);
            font-size:20px;
            font-weight:700;
            margin-bottom:18px;
        }

        .custom-input,
        .custom-password{
            position:relative;
            margin-bottom:18px;
        }

        .custom-input .form-control,
        .custom-password .form-control{
            height:44px;
            border-radius:4px;
            border:2px solid var(--border);
            background:transparent;
            padding-right:18px;
            padding-left:42px;
            font-size:15px;
            font-weight:600;
        }

        .field-icon,
        .toggle-password{
            position:absolute;
            top:50%;
            transform:translateY(-50%);
            color:#9b9b9b;
            font-size:14px;
        }

        .field-icon{
            left:14px;
        }

        .toggle-password{
            left:14px;
            background:none;
            border:0;
            cursor:pointer;
        }

        .submit-btn{
            margin-top:18px;
            height:44px;
            border:0;
            border-radius:4px;
            background:var(--primary);
            color:#fff;
            font-weight:700;
            font-size:17px;
        }

        .submit-btn:hover{
            background:var(--primary-dark);
        }

        .btn-spinner{
            display:none;
            align-items:center;
            gap:8px;
        }

        .submit-btn.loading .btn-text{
            display:none;
        }

        .submit-btn.loading .btn-spinner{
            display:inline-flex;
        }

        .illustration-side{
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .illustration-box{
            max-width:470px;
        }

        .illustration-box img{
            width:100%;
        }

        .auth-footer{
            text-align:center;
            margin-top:10px;
            font-size:15px;
            font-weight:700;
            color:var(--text-soft);
        }

        .auth-footer a{
            color:var(--primary);
            text-decoration:none;
        }
    </style>
</head>

<body>

<!-- splash screen -->

<div id="splash">
    <img src="{{asset('img/icons/monshaa.jpg')}}">
</div>

<!-- main page -->

<div id="mainPage">

    <div class="auth-wrapper">
        <div class="auth-card">

            <div class="auth-grid">

                <div class="illustration-side">
                    <div class="illustration-box">
                        <img src="{{asset('img/icons/qqq.jpg')}}">
                    </div>
                </div>

                <div class="form-side">

                    <div class="brand-icon">
                        <img src="{{asset('img/icons/employees.png')}}">
                    </div>

                    <div class="form-title">تسجيل الدخول</div>

                    <form id="registerForm" action="{{route('admin.login')}}" method="POST">
                        @csrf

                        <div class="custom-input">
                            <input type="text" class="form-control" placeholder="رقم هاتف المدير" name="phone">
                            <span class="field-icon"><i class="fa-solid fa-phone"></i></span>
                        </div>

                        <div class="custom-password">
                            <input type="password" class="form-control" placeholder="كلمة السر" name="password">
                            <button type="button" class="toggle-password">
                                <i class="fa-regular fa-eye-slash"></i>
                            </button>
                        </div>

                        <button type="submit" class="btn w-100 submit-btn" id="registerSubmitBtn">

<span class="btn-text">
<i class="fa-solid fa-right-to-bracket"></i>
تسجيل الدخول
</span>

                            <span class="btn-spinner">
<span class="spinner-border spinner-border-sm"></span>
جاري تسجيل الدخول...
</span>

                        </button>

                    </form>

                    <div class="auth-footer">
                        ليس لديك حساب ؟
                        <a href="{{route('admin.register.view')}}">تسجيل حساب</a>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

<script>

    /* splash */

    window.addEventListener("load",function(){

        setTimeout(function(){

            document.getElementById("splash").style.display="none";
            document.getElementById("mainPage").style.display="block";

        },2000);

    });

    /* password toggle */

    document.querySelectorAll('.toggle-password').forEach(function(btn){

        btn.addEventListener('click',function(){

            const input=this.previousElementSibling;

            const isPassword=input.type==='password';

            input.type=isPassword?'text':'password';

            this.innerHTML=isPassword
                ?'<i class="fa-regular fa-eye"></i>'
                :'<i class="fa-regular fa-eye-slash"></i>';

        });

    });

    /* button loader */

    const registerForm=document.getElementById('registerForm');
    const registerSubmitBtn=document.getElementById('registerSubmitBtn');

    registerForm?.addEventListener('submit',function(){
        registerSubmitBtn.disabled=true;
        registerSubmitBtn.classList.add('loading');
    });

</script>

</body>
</html>
