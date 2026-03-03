<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>403 - ليس لديك صلاحيه الوصول</title>

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #eef3fb, #f8fafc);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: system-ui;
        }

        .error-card {
            background: #fff;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0,0,0,.08);
            max-width: 520px;
            width: 95%;
        }

        .error-code {
            font-size: 100px;
            font-weight: 900;
            color: #2d8bd6;
            line-height: 1;
        }

        .error-icon {
            font-size: 50px;
            color: #dc3545;
            margin-bottom: 15px;
        }

        .btn-back {
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 700;
        }

        @media (max-width: 576px) {
            .error-code {
                font-size: 70px;
            }
        }
    </style>
</head>
<body>

<div class="error-card">
    <div class="error-icon">
        <i class="fa-solid fa-triangle-exclamation"></i>
    </div>

    <div class="error-code">403</div>

    <h4 class="mt-3 fw-bold">ليس لديك صلاحيه الوصول لهذه الصفحه</h4>

    <p class="text-muted mt-2">
        عذراً، الصفحة التي تحاول الوصول إليها غير مصرح لك بالدخول اليها.
    </p>

    <div class="mt-4 d-flex justify-content-center gap-2 flex-wrap">
        <!-- زرار يرجع للخلف -->
        <button onclick="history.back()" class="btn btn-primary btn-back">
            <i class="fa-solid fa-arrow-right ms-2"></i>
            الرجوع للخلف
        </button>

        <!-- زرار يروح للرئيسية -->
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-back">
            <i class="fa-solid fa-house ms-2"></i>
            الصفحة الرئيسية
        </a>
    </div>
</div>

</body>
</html>
