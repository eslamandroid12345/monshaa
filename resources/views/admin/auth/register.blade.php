<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تسجيل الحساب</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/admin/toast.css')}}" />

    <style>
        :root{
            --page-bg:#f3f3f3;
            --primary:#6e98b6;
            --primary-dark:#5a88a8;
            --border:#c3dde6;
            --text-soft:#7aa3b8;
            --placeholder:#b7b7b7;
            --card-bg:#ffffff;
        }

        *{
            box-sizing:border-box;
        }

        body{
            margin:0;
            font-family:"Cairo",system-ui,-apple-system,"Segoe UI",Tahoma,Arial;
            min-height:100vh;
            color:#4b5563;
            background:var(--page-bg);
            overflow-x:hidden;
        }

        img{
            max-width:100%;
            height:auto;
            display:block;
        }

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

        #mainPage{
            display:none;
        }

        .auth-wrapper{
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:28px 18px;
        }

        .auth-card{
            width:100%;
            max-width:1100px;
            border-radius:28px;
        }

        .auth-grid{
            display:grid;
            grid-template-columns:minmax(0,1fr) minmax(0,1fr);
            gap:28px;
            align-items:center;
            background:var(--card-bg);
            border-radius:24px;
            padding:28px;
            box-shadow:0 12px 35px rgba(0,0,0,.06);
            overflow:hidden;
        }

        .illustration-side{
            display:flex;
            align-items:center;
            justify-content:center;
            min-width:0;
        }

        .illustration-box{
            width:100%;
            max-width:470px;
        }

        .illustration-box img{
            width:100%;
            object-fit:contain;
        }

        .form-side{
            padding:8px 18px;
            min-width:0;
        }

        .brand-icon{
            width:72px;
            height:72px;
            margin:0 auto 10px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:46px;
        }

        .brand-icon img{
            max-width:72px;
            max-height:72px;
            object-fit:contain;
        }

        .form-title{
            text-align:center;
            color:var(--text-soft);
            font-size:22px;
            font-weight:700;
            margin-bottom:22px;
        }

        .custom-input,
        .custom-password{
            position:relative;
            margin-bottom:16px;
        }

        .custom-input .form-control,
        .custom-password .form-control{
            height:48px;
            border-radius:10px;
            border:2px solid var(--border);
            background:#fff;
            padding-right:18px;
            padding-left:44px;
            font-size:15px;
            font-weight:600;
            color:#4b5563;
            box-shadow:none;
        }

        .custom-input .form-control::placeholder,
        .custom-password .form-control::placeholder{
            color:var(--placeholder);
            font-weight:500;
        }

        .custom-input .form-control:focus,
        .custom-password .form-control:focus{
            border-color:var(--primary);
            box-shadow:0 0 0 3px rgba(110,152,182,.12);
        }

        .custom-input .form-control.is-invalid,
        .custom-password .form-control.is-invalid{
            border-color:#dc3545 !important;
            box-shadow:none !important;
        }

        .field-icon,
        .toggle-password{
            position:absolute;
            top:50%;
            transform:translateY(-50%);
            color:#9b9b9b;
            font-size:14px;
            z-index:2;
        }

        .field-icon{
            left:14px;
            pointer-events:none;
        }

        .toggle-password{
            left:14px;
            background:none;
            border:0;
            cursor:pointer;
            padding:0;
            width:20px;
            height:20px;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .submit-btn{
            margin-top:8px;
            height:48px;
            border:0;
            border-radius:10px;
            background:var(--primary);
            color:#fff;
            font-weight:700;
            font-size:17px;
            transition:.2s ease;
        }

        .submit-btn:hover{
            background:var(--primary-dark);
        }

        .submit-btn:disabled{
            opacity:.9;
            cursor:not-allowed;
        }

        .btn-spinner{
            display:none;
            align-items:center;
            justify-content:center;
            gap:8px;
        }

        .submit-btn.loading .btn-text{
            display:none;
        }

        .submit-btn.loading .btn-spinner{
            display:inline-flex;
        }

        .auth-footer{
            text-align:center;
            margin-top:16px;
            font-size:15px;
            font-weight:700;
            color:var(--text-soft);
            line-height:1.8;
        }

        .auth-footer a{
            color:var(--primary);
            text-decoration:none;
        }

        .auth-footer a:hover{
            text-decoration:underline;
        }

        @media (max-width: 991.98px){
            .auth-wrapper{
                padding:22px 14px;
            }

            .auth-grid{
                grid-template-columns:1fr;
                gap:12px;
                padding:22px 16px;
            }

            .illustration-side{
                order:-1;
            }

            .illustration-box{
                max-width:320px;
                margin:0 auto 4px;
            }

            .form-side{
                padding:0;
                width:100%;
            }

            .form-title{
                font-size:20px;
                margin-bottom:18px;
            }
        }

        @media (max-width: 575.98px){
            #splash img{
                width:120px;
            }

            .auth-wrapper{
                padding:14px 10px;
                align-items:flex-start;
            }

            .auth-card{
                max-width:100%;
            }

            .auth-grid{
                padding:16px 12px;
                gap:10px;
                border-radius:18px;
            }

            .illustration-box{
                max-width:220px;
            }

            .brand-icon{
                width:58px;
                height:58px;
                margin-bottom:8px;
            }

            .brand-icon img{
                max-width:58px;
                max-height:58px;
            }

            .form-title{
                font-size:18px;
                margin-bottom:16px;
            }

            .custom-input,
            .custom-password{
                margin-bottom:12px;
            }

            .custom-input .form-control,
            .custom-password .form-control{
                height:46px;
                font-size:14px;
                border-radius:8px;
                padding-right:14px;
                padding-left:40px;
            }

            .field-icon,
            .toggle-password{
                left:12px;
                font-size:13px;
            }

            .submit-btn{
                height:46px;
                font-size:15px;
                border-radius:8px;
                margin-top:6px;
            }

            .auth-footer{
                font-size:14px;
                margin-top:14px;
            }
        }

        @media (max-width: 380px){
            .auth-wrapper{
                padding:10px 8px;
            }

            .auth-grid{
                padding:14px 10px;
            }

            .illustration-box{
                max-width:180px;
            }

            .form-title{
                font-size:17px;
            }

            .custom-input .form-control,
            .custom-password .form-control{
                font-size:13px;
            }

            .submit-btn{
                font-size:14px;
            }
        }
    </style>
</head>
<body>

<div id="splash">
    <img src="{{asset('img/icons/monshaa.jpg')}}">
</div>

<div id="mainPage">
    <div class="auth-wrapper">
        <div class="auth-card">
            <div class="auth-grid">
                <div class="illustration-side">
                    <div class="illustration-box">
                        <img src="{{ asset('img/icons/qqq.jpg') }}">
                    </div>
                </div>

                <div class="form-side">
                    <div class="brand-icon">
                        <img src="{{ asset('img/icons/employees.png') }}">
                    </div>

                    <div class="form-title">تسجيل الحساب</div>

                    <form id="registerForm" novalidate action="{{ route('admin.register') }}" method="POST" autocomplete="off">
                        @csrf
                        @method('POST')

                        <div class="custom-input">
                            <input type="text"
                                   class="form-control @error('company_name') is-invalid @enderror"
                                   placeholder="اسم الشركه"
                                   name="company_name"
                                   value="{{ old('company_name') }}">
                            <span class="field-icon"><i class="fa-solid fa-house"></i></span>
                            @error('company_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="custom-input">
                            <input type="text"
                                   class="form-control @error('company_address') is-invalid @enderror"
                                   placeholder="عنوان الشركه"
                                   name="company_address"
                                   value="{{ old('company_address') }}">
                            <span class="field-icon"><i class="fa-solid fa-location-dot"></i></span>
                            @error('company_address')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="custom-input">
                            <input type="text"
                                   class="form-control @error('company_phone') is-invalid @enderror"
                                   placeholder="رقم هاتف الشركه"
                                   name="company_phone"
                                   value="{{ old('company_phone') }}">
                            <span class="field-icon"><i class="fa-solid fa-phone"></i></span>
                            @error('company_phone')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="custom-input">
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   placeholder="اسم المدير"
                                   name="name"
                                   value="{{ old('name') }}">
                            <span class="field-icon"><i class="fa-solid fa-user"></i></span>
                            @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="custom-input">
                            <input type="text"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   placeholder="رقم هاتف المدير"
                                   name="phone"
                                   value="{{ old('phone') }}">
                            <span class="field-icon"><i class="fa-solid fa-phone"></i></span>
                            @error('phone')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="custom-password">
                            <input type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="كلمة السر"
                                   name="password"
                                   id="passwordField">
                            <button type="button" class="toggle-password" aria-label="إظهار أو إخفاء كلمة المرور">
                                <i class="fa-regular fa-eye-slash"></i>
                            </button>
                            @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="custom-password">
                            <input type="password"
                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                   placeholder="تاكيد كلمه السر"
                                   name="password_confirmation"
                                   id="passwordField2">
                            <button type="button" class="toggle-password" aria-label="إظهار أو إخفاء كلمة المرور">
                                <i class="fa-regular fa-eye-slash"></i>
                            </button>
                            @error('password_confirmation')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <input style="display:none;"
                               class="form-check-input"
                               type="checkbox"
                               id="remember"
                               name="privacy_and_policy"
                               value="1"
                               checked>

                        <button type="submit" class="btn w-100 submit-btn" id="registerSubmitBtn">
                            <span class="btn-text">
                                <i class="fa-solid fa-right-to-bracket"></i>
                                تسجيل الحساب
                            </span>

                            <span class="btn-spinner">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                جاري تسجيل الحساب...
                            </span>
                        </button>
                    </form>

                    <div class="auth-footer">
                        لديك حساب ؟
                        <a href="{{route('admin.login.view')}}">تسجيل الدخول</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@if(session('register_fail'))
    <div id="loginSuccessBar" class="login-success-bar show">
        {{ session('register_fail') }}
    </div>
@endif

<script>
    const splashLogo = document.querySelector('#splash img');

    splashLogo.addEventListener('animationend', function () {
        document.getElementById("splash").style.display = "none";
        document.getElementById("mainPage").style.display = "block";
    });

    document.querySelectorAll('.toggle-password').forEach(function(button) {
        button.addEventListener('click', function() {
            const input = this.previousElementSibling;
            const isPassword = input.type === 'password';

            input.type = isPassword ? 'text' : 'password';

            this.innerHTML = isPassword
                ? '<i class="fa-regular fa-eye"></i>'
                : '<i class="fa-regular fa-eye-slash"></i>';
        });
    });

    const registerForm = document.getElementById('registerForm');
    const registerSubmitBtn = document.getElementById('registerSubmitBtn');

    registerForm?.addEventListener('submit', function () {
        registerSubmitBtn.disabled = true;
        registerSubmitBtn.classList.add('loading');
    });
</script>

@include('admin.layouts.toast')
</body>
</html>
