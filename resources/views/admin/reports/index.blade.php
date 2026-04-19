<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>التقارير</title>

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- Google Font Cairo -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root{
            --topbar: #3f5564;
            --btn: #5c87a6;
            --btn-hover: #4f7691;
        }

        body{
            margin:0;
            height:100vh;
            overflow:hidden;
            background:#fff;
            font-family: "Cairo", sans-serif;
        }

        /* ===== Topbar ===== */
        .app-topbar{
            height:52px;
            background:var(--topbar);
            color:#fff;
            display:flex;
            align-items:center;
            padding:0 14px;
            gap:10px;
            border-bottom:1px solid rgba(255,255,255,.08);
        }

        .app-topbar .title{
            flex:1;
            text-align:center;
            font-weight:700;
            letter-spacing:.2px;
        }

        .app-topbar .icon-btn{
            width:34px;
            height:34px;
            border:0;
            background:transparent;
            color:#eaf1f7;
            display:grid;
            place-items:center;
            border-radius:8px;
            transition:.2s;
        }

        .app-topbar .icon-btn:hover{
            background: rgba(255,255,255,.10);
        }

        /* ===== Center ===== */
        .wrap{
            height: calc(100vh - 52px);
            display:grid;
            place-items:center;
            padding: 24px 12px;
        }

        .report-box{
            width: min(760px, 96vw);
            text-align:center;
        }

        .report-icon{
            font-size: 44px;
            color: #3f5564;
            margin-bottom: 14px;
            opacity:.95;
        }

        .report-btn{
            width:100%;
            height:44px;
            border:0;
            border-radius:3px;
            background: var(--btn);
            color:#fff;
            font-weight:700;
            margin: 12px 0;
            transition:.2s;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:14px;
        }

        .report-btn:hover{
            background: var(--btn-hover);
        }
    </style>
</head>

<body>

<!-- Top bar -->
<div class="app-topbar">

    <button class="icon-btn" type="button" title="رجوع"
            onclick="window.location.href='{{ route('admin.dashboard') }}'">
        <i class="fa-solid fa-arrow-right"></i>
    </button>
    <div class="title">التقارير</div>
    <button class="icon-btn" type="button" title="تحديث" onclick="window.location.href='{{ route('admin.reports.index') }}'">
        <i class="fa-solid fa-rotate-right"></i>
    </button>
</div>

<!-- Center content -->
<div class="wrap">
    <div class="report-box">

        <div class="report-icon">
            <img src="{{asset('img/icons/analytics.png')}}">
        </div>

        <button class="report-btn" type="button" onclick="location.href='{{route('admin.reports.states')}}'">العقارات</button>
        <button class="report-btn" type="button" onclick="location.href='{{route('admin.reports.lands')}}'">الأراضي</button>
        <button class="report-btn" type="button" onclick="location.href='{{route('admin.reports.contracts')}}'">عقود الإيجار</button>
        <button class="report-btn" type="button" onclick="location.href='{{route('admin.reports.revenues')}}'">الإيرادات</button>
        <button class="report-btn" type="button" onclick="location.href='{{route('admin.reports.expenses')}}'">المصروفات</button>
        <button class="report-btn" type="button" onclick="location.href='{{route('admin.reports.profits')}}'">الارباح</button>

    </div>
</div>

<script>
    document.getElementById("refreshBtn").addEventListener("click", () => location.reload());
</script>

</body>
</html>
