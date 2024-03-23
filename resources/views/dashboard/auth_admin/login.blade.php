<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('auth/css/login.css')}}">
    <title>تسجيل دخول الادمن</title>

    <link rel="icon" type="{{asset('auth/imag/Logo.png')}}" href="{{asset('auth/images/MainLogo.png')}}" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet" />
    <!-- End Google Fonts -->


    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset("plugins/fontawesome-free/css/all.min.css")}}">
    <!-- end Links -->
</head>

<body>
<div class="container">


    <div class="forms-container">
        <div class="signin-signup">
            <form action="{{route('loginProcess')}}" class="sign-in-form" method="post">
                @csrf
                <h2 class="title">دخول الادمن</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input class="auth-user" type="text" placeholder="البريد الالكتروني" name="email" />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input class="auth-user" type="password" placeholder="كلمةالسر" name="password" />
                </div>

                <input type="submit" value="تسجيل الدخول" class="btn solid"/>


            </form>

        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>تسجيل دخول الادمن</h3>
                <p>
                   موظفين لوحه التحكم بالتطبيق
                </p>

            </div>
            <img src="{{asset('auth/images/auth_login.svg')}}" class="image" alt="" />
        </div>


    </div>
</div>


</body>

</html>
