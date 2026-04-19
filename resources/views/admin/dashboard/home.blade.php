{{--<!DOCTYPE html>--}}
{{--<html lang="ar" dir="rtl">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8" />--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0" />--}}
{{--    <title>الرئيسية - لوحة التحكم</title>--}}

{{--    <!-- Bootstrap RTL -->--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">--}}

{{--    <!-- Google Font Cairo -->--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap">--}}

{{--    <!-- Font Awesome -->--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />--}}
{{--    <link rel="stylesheet" href="{{asset('css/admin/toast.css')}}" />--}}

{{--    <style>--}}
{{--        body{--}}
{{--            background:#f6f7fb;--}}
{{--            margin:0;--}}
{{--            color:#0f172a;--}}
{{--            font-family:"Cairo", system-ui, -apple-system, "Segoe UI", Tahoma, Arial;--}}
{{--        }--}}

{{--        /* ============= Layout ============= */--}}
{{--        .layout{ display:flex; min-height:100vh; }--}}

{{--        /* ============= Sidebar ============= */--}}
{{--        .sidebar{--}}
{{--            width:270px;--}}
{{--            background:#475569;--}}
{{--            color:#fff;--}}
{{--            padding:16px 14px;--}}
{{--            position:sticky;--}}
{{--            top:0;--}}
{{--            height:100vh;--}}
{{--            overflow-y:auto;--}}
{{--            overflow-x:hidden;--}}
{{--        }--}}
{{--        .sidebar::-webkit-scrollbar{ width:8px; }--}}
{{--        .sidebar::-webkit-scrollbar-track{ background:rgba(255,255,255,.08); border-radius:10px; }--}}
{{--        .sidebar::-webkit-scrollbar-thumb{ background:rgba(255,255,255,.25); border-radius:10px; }--}}
{{--        .sidebar::-webkit-scrollbar-thumb:hover{ background:rgba(255,255,255,.35); }--}}

{{--        .sidebar-header{--}}
{{--            padding:10px 6px 16px;--}}
{{--            border-bottom:1px solid rgba(255,255,255,.10);--}}
{{--            margin-bottom:12px;--}}
{{--        }--}}
{{--        .user-profile{ display:flex; align-items:center; gap:10px; }--}}
{{--        .user-avatar{--}}
{{--            width:44px;height:44px;border-radius:14px;--}}
{{--            background:rgba(255,255,255,.16);--}}
{{--            display:grid; place-items:center;--}}
{{--            font-size:18px;--}}
{{--        }--}}
{{--        .user-info .user-name{ font-weight:800; font-size:14px; line-height:1.2; }--}}
{{--        .user-info .user-role{ font-size:12px; opacity:.85; }--}}

{{--        .sidebar-nav{ display:flex; flex-direction:column; gap:6px; margin-top:12px; }--}}

{{--        .nav-item{--}}
{{--            display:flex; align-items:center; gap:10px;--}}
{{--            padding:10px 12px;--}}
{{--            border-radius:12px;--}}
{{--            color:rgba(255,255,255,.92);--}}
{{--            text-decoration:none;--}}
{{--            transition:background .15s ease, transform .15s ease;--}}
{{--        }--}}
{{--        .nav-item:hover{ background:rgba(255,255,255,.10); transform:translateX(-2px); }--}}
{{--        .nav-item.active{ background:rgba(255,255,255,.16); font-weight:700; }--}}
{{--        .nav-item i{ width:20px; text-align:center; opacity:.95; }--}}

{{--        /* ============= Main Content ============= */--}}
{{--        .main-content{ flex:1; min-width:0; padding:18px 18px 28px; }--}}

{{--        /* =========================--}}
{{--           TOP HEADER (RTL Dashboard)--}}
{{--        ========================= */--}}
{{--        .top-header{--}}
{{--            position:sticky; top:0; z-index:999;--}}
{{--            display:flex; align-items:center; gap:14px;--}}
{{--            padding:14px 18px;--}}
{{--            background:rgba(255,255,255,.78);--}}
{{--            backdrop-filter:blur(12px);--}}
{{--            -webkit-backdrop-filter:blur(12px);--}}
{{--            border:1px solid rgba(15,23,42,.08);--}}
{{--            border-radius:16px;--}}
{{--        }--}}

{{--        .menu-toggle{--}}
{{--            width:44px;height:44px;border-radius:14px;--}}
{{--            border:1px solid rgba(15,23,42,.10);--}}
{{--            background:#fff;--}}
{{--            cursor:pointer;--}}
{{--            display:grid;place-items:center;--}}
{{--            box-shadow:0 10px 22px rgba(15,23,42,.06);--}}
{{--            transition:transform .18s ease, box-shadow .2s ease, background .2s ease;--}}
{{--        }--}}
{{--        .menu-toggle:hover{--}}
{{--            transform:translateY(-2px);--}}
{{--            background:#f8fafc;--}}
{{--            box-shadow:0 14px 28px rgba(15,23,42,.10);--}}
{{--        }--}}
{{--        .menu-toggle i{ font-size:16px; color:#0f172a; }--}}

{{--        .header-search{--}}
{{--            flex:1 1 auto; min-width:0;--}}
{{--            display:flex; align-items:center; gap:10px;--}}
{{--            padding:10px 14px;--}}
{{--            border-radius:16px;--}}
{{--            background:#fff;--}}
{{--            border:1px solid rgba(15,23,42,.10);--}}
{{--            box-shadow:0 10px 22px rgba(15,23,42,.05);--}}
{{--            transition:box-shadow .2s ease, border-color .2s ease;--}}
{{--        }--}}
{{--        .header-search i{ color:#94a3b8; font-size:14px; }--}}
{{--        .header-search input{--}}
{{--            width:100%;--}}
{{--            border:0;--}}
{{--            outline:0;--}}
{{--            background:transparent;--}}
{{--            font-size:14px;--}}
{{--            color:#0f172a;--}}
{{--        }--}}
{{--        .header-search input::placeholder{ color:#94a3b8; }--}}
{{--        .header-search:focus-within{--}}
{{--            border-color:rgba(13,110,253,.55);--}}
{{--            box-shadow:0 0 0 4px rgba(13,110,253,.14);--}}
{{--        }--}}

{{--        /* Actions on LEFT (in RTL) */--}}
{{--        .header-actions{--}}
{{--            display:flex; align-items:center; gap:10px;--}}
{{--            margin-right:auto; /* يدفع الأزرار لليسار */--}}
{{--        }--}}

{{--        .icon-btn{--}}
{{--            width:44px;height:44px;border-radius:14px;--}}
{{--            border:1px solid rgba(15,23,42,.10);--}}
{{--            background:#fff;--}}
{{--            cursor:pointer;--}}
{{--            display:grid;place-items:center;--}}
{{--            box-shadow:0 10px 22px rgba(15,23,42,.06);--}}
{{--            transition:transform .18s ease, box-shadow .2s ease, background .2s ease;--}}
{{--            position:relative;--}}
{{--        }--}}
{{--        .icon-btn:hover{--}}
{{--            transform:translateY(-2px);--}}
{{--            background:#f8fafc;--}}
{{--            box-shadow:0 14px 28px rgba(15,23,42,.10);--}}
{{--        }--}}
{{--        .icon-btn i{ font-size:15px; color:#0f172a; }--}}

{{--        .notification-badge{--}}
{{--            position:absolute;--}}
{{--            top:6px;--}}
{{--            left:6px;--}}
{{--            background:#ef4444;--}}
{{--            color:#fff;--}}
{{--            font-size:11px;--}}
{{--            font-weight:800;--}}
{{--            padding:2px 7px;--}}
{{--            border-radius:999px;--}}
{{--            border:2px solid #fff;--}}
{{--            line-height:1.2;--}}
{{--        }--}}

{{--        /* Profile Dropdown */--}}
{{--        .profile-wrap{ position:relative; }--}}
{{--        .profile-menu{--}}
{{--            position:absolute;--}}
{{--            left:0; /* على الشمال */--}}
{{--            top:calc(100% + 10px);--}}
{{--            width:220px;--}}
{{--            background:#fff;--}}
{{--            border:1px solid rgba(15,23,42,.10);--}}
{{--            border-radius:14px;--}}
{{--            box-shadow:0 18px 45px rgba(15,23,42,.12);--}}
{{--            padding:10px;--}}
{{--            display:none;--}}
{{--            z-index:1000;--}}
{{--        }--}}
{{--        .profile-menu.show{ display:block; }--}}

{{--        .profile-head{--}}
{{--            display:flex; align-items:center; gap:10px;--}}
{{--            padding:10px;--}}
{{--            border-radius:12px;--}}
{{--            background:#f8fafc;--}}
{{--            border:1px solid rgba(15,23,42,.06);--}}
{{--            margin-bottom:10px;--}}
{{--        }--}}
{{--        .profile-head .mini-avatar{--}}
{{--            width:40px;height:40px;border-radius:12px;--}}
{{--            background:linear-gradient(135deg,#475569,#64748b);--}}
{{--            color:#fff;--}}
{{--            display:grid;place-items:center;--}}
{{--            font-weight:900;--}}
{{--        }--}}
{{--        .profile-head .meta{--}}
{{--            line-height:1.2;--}}
{{--        }--}}
{{--        .profile-head .meta .name{ font-weight:900; font-size:13px; color:#0f172a; }--}}
{{--        .profile-head .meta .role{ font-size:12px; color:#64748b; }--}}

{{--        .profile-item{--}}
{{--            display:flex; align-items:center; gap:10px;--}}
{{--            padding:10px 10px;--}}
{{--            border-radius:12px;--}}
{{--            color:#0f172a;--}}
{{--            text-decoration:none;--}}
{{--            font-weight:800;--}}
{{--            font-size:13px;--}}
{{--            transition:background .15s ease;--}}
{{--        }--}}
{{--        .profile-item:hover{ background:rgba(15,23,42,.05); }--}}
{{--        .profile-item i{ width:18px; text-align:center; color:#334155; }--}}

{{--        .profile-item.danger{ color:#b91c1c; }--}}
{{--        .profile-item.danger i{ color:#b91c1c; }--}}

{{--        @media (max-width: 768px){--}}
{{--            .header-search{ display:none; }--}}
{{--            .top-header{ padding:12px 12px; gap:10px; }--}}
{{--        }--}}

{{--        /* ============= Page Title ============= */--}}
{{--        .page-title{ margin:18px 2px 18px; }--}}
{{--        .page-title h1{--}}
{{--            font-size:20px;--}}
{{--            font-weight:900;--}}
{{--            margin:0 0 4px;--}}
{{--            color:#0f172a;--}}
{{--        }--}}
{{--        .page-title p{ font-size:13px; color:#64748b; margin:0; }--}}

{{--        /* ============= HOME CARDS ============= */--}}
{{--        .home-grid{--}}
{{--            display:grid;--}}
{{--            gap:18px;--}}
{{--            grid-template-columns:repeat(5, minmax(0, 1fr));--}}
{{--            margin-top:14px;--}}
{{--        }--}}
{{--        .home-card{--}}
{{--            position:relative;--}}
{{--            display:block;--}}
{{--            text-decoration:none;--}}
{{--            background:#fff;--}}
{{--            border:1px solid rgba(15,23,42,.10);--}}
{{--            border-radius:8px;--}}
{{--            height:155px;--}}
{{--            box-shadow:0 6px 14px rgba(15,23,42,.06);--}}
{{--            transition:transform .18s ease, box-shadow .2s ease, border-color .2s ease;--}}
{{--            padding:18px 18px 14px;--}}
{{--            overflow:hidden;--}}
{{--            color:#0f172a;--}}
{{--        }--}}
{{--        .home-card:hover{--}}
{{--            transform:translateY(-4px);--}}
{{--            box-shadow:0 14px 28px rgba(15,23,42,.10);--}}
{{--            border-color:rgba(15,23,42,.14);--}}
{{--        }--}}
{{--        .home-card-icon{--}}
{{--            width:56px;height:56px;--}}
{{--            margin:10px auto 12px;--}}
{{--            display:grid;place-items:center;--}}
{{--            color:#475569;--}}
{{--            font-size:34px;--}}
{{--            opacity:.92;--}}
{{--        }--}}
{{--        .home-card-title{--}}
{{--            text-align:center;--}}
{{--            font-size:14px;--}}
{{--            font-weight:700;--}}
{{--            color:#334155;--}}
{{--        }--}}
{{--        .home-card-value{--}}
{{--            position:absolute;--}}
{{--            bottom:12px;--}}
{{--            left:14px;--}}
{{--            font-size:14px;--}}
{{--            font-weight:700;--}}
{{--            color:#0f172a;--}}
{{--        }--}}

{{--        @media (max-width: 1400px){ .home-grid{ grid-template-columns:repeat(4,1fr);} }--}}
{{--        @media (max-width: 1200px){ .home-grid{ grid-template-columns:repeat(3,1fr);} }--}}
{{--        @media (max-width: 768px){ .home-grid{ grid-template-columns:repeat(1,1fr);} .home-card{ height:145px;} }--}}

{{--        /* ============= Sidebar collapse (optional) ============= */--}}
{{--        .sidebar-collapsed .sidebar{ width:86px; }--}}
{{--        .sidebar-collapsed .nav-item span{ display:none; }--}}
{{--        .sidebar-collapsed .user-info{ display:none; }--}}
{{--        .sidebar-collapsed .main-content{ padding-right:18px; }--}}



{{--        /* Sidebar notification badge */--}}
{{--        .nav-item.nav-notif{--}}
{{--            position: relative;--}}
{{--        }--}}

{{--        .nav-badge{--}}
{{--            margin-right: auto;        /* في RTL: يخليها تروح لليسار */--}}
{{--            background: #ef4444;--}}
{{--            color: #fff;--}}
{{--            font-size: 11px;--}}
{{--            font-weight: 900;--}}
{{--            height: 20px;--}}
{{--            min-width: 22px;--}}
{{--            padding: 0 7px;--}}
{{--            border-radius: 999px;--}}
{{--            display: inline-flex;--}}
{{--            align-items: center;--}}
{{--            justify-content: center;--}}
{{--            line-height: 1;--}}
{{--            border: 2px solid rgba(255,255,255,.18);--}}
{{--        }--}}

{{--        .user-avatar{--}}
{{--            width: 48px;--}}
{{--            height: 48px;--}}
{{--            border-radius: 50%;--}}
{{--            overflow: hidden;--}}
{{--            background: #f1f5f9;--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            justify-content: center;--}}
{{--        }--}}

{{--        .user-avatar img{--}}
{{--            width: 100%;--}}
{{--            height: 100%;--}}
{{--            object-fit: cover;--}}
{{--        }--}}


{{--        .notify-btn{--}}
{{--            position:relative;--}}
{{--        }--}}

{{--        .notify-badge{--}}
{{--            position:absolute;--}}
{{--            top:-5px;--}}
{{--            right:-5px;--}}
{{--            background:#ef4444;--}}
{{--            color:#fff;--}}
{{--            font-size:11px;--}}
{{--            font-weight:700;--}}
{{--            min-width:18px;--}}
{{--            height:18px;--}}
{{--            padding:0 5px;--}}
{{--            border-radius:20px;--}}
{{--            display:flex;--}}
{{--            align-items:center;--}}
{{--            justify-content:center;--}}
{{--            box-shadow:0 2px 6px rgba(0,0,0,.2);--}}
{{--        }--}}


{{--    </style>--}}
{{--</head>--}}

{{--<body>--}}
{{--<div class="layout" id="layout">--}}

{{--    <!-- Sidebar -->--}}
{{--    <aside class="sidebar" id="sidebar">--}}
{{--        <div class="sidebar-header">--}}
{{--            <div class="user-profile">--}}
{{--                <div class="user-avatar">--}}
{{--                <img src="{{ asset(auth()->user()->company?->logo) }}">--}}
{{--                </div>--}}

{{--                <div class="user-info">--}}
{{--                    <div class="user-name">    {{ auth()->user()->company?->company_name }}</div>--}}
{{--                    <div class="user-role">    {{ auth()->user()->name }} </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--        <nav class="sidebar-nav">--}}

{{--            @if(auth()->user()->is_admin == 1 || in_array('states', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                <a href="{{route('states.index')}}" class="nav-item">--}}
{{--                    <i class="fa-solid fa-city"></i>--}}
{{--                    <span>العقارات</span>--}}
{{--                </a>--}}
{{--            @endif--}}


{{--            @if(auth()->user()->is_admin == 1 || in_array('lands', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--            <a href="{{route('lands.index')}}" class="nav-item">--}}
{{--                <i class="fa-solid fa-map-location-dot"></i>--}}
{{--                <span>الأراضي</span>--}}
{{--            </a>--}}
{{--                @endif--}}


{{--            @if(auth()->user()->is_admin == 1 || in_array('tenants', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}

{{--                <a href="#" class="nav-item">--}}
{{--                <i class="fa-solid fa-house-user"></i>--}}
{{--                <span>المستأجرين</span>--}}
{{--            </a>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->is_admin == 1 || in_array('tenant_contracts', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}

{{--                <a href="{{route('tenant.contracts.index')}}" class="nav-item">--}}
{{--                <i class="fa-solid fa-file-signature"></i>--}}
{{--                <span>عقود الإيجار</span>--}}
{{--            </a>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->is_admin == 1 || in_array('expired_contracts', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}

{{--                <a href="{{route('admin.contracts.expired')}}" class="nav-item">--}}
{{--                <i class="fa-solid fa-file-circle-xmark"></i>--}}
{{--                <span>العقود المنتهية</span>--}}
{{--            </a>--}}
{{--                @endif--}}


{{--            <!-- الإشعارات -->--}}
{{--            <a href="#" class="nav-item nav-notif">--}}
{{--                <i class="fa-regular fa-bell"></i>--}}
{{--                <span>الإشعارات</span>--}}

{{--                <!-- الترقيم -->--}}
{{--                <span class="nav-badge" id="sideNotifCount">3</span>--}}
{{--            </a>--}}

{{--                @if(auth()->user()->is_admin == 1 || in_array('financial_cash', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}

{{--                <a href="#" class="nav-item">--}}
{{--                <i class="fa-solid fa-receipt"></i>--}}
{{--                <span>سندات القبض</span>--}}
{{--            </a>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->is_admin == 1 || in_array('financial_receipt', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}

{{--                <a href="#" class="nav-item">--}}
{{--                <i class="fa-solid fa-money-bill-transfer"></i>--}}
{{--                <span>سندات الصرف</span>--}}
{{--            </a>--}}
{{--                @endif--}}


{{--            @if(auth()->user()->is_admin == 1 || in_array('revenues', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}

{{--                <a href="{{route('admin.revenues.index')}}" class="nav-item">--}}
{{--                    <i class="fa-solid fa-coins"></i>--}}
{{--                <span>الإيرادات</span>--}}
{{--            </a>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->is_admin == 1 || in_array('expenses', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}

{{--                <a href="{{route('admin.expenses.index')}}" class="nav-item">--}}
{{--                <i class="fa-solid fa-sack-dollar"></i>--}}
{{--                <span>المصروفات</span>--}}
{{--            </a>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->is_admin == 1 || in_array('employee_commission', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}

{{--                    <a href="{{route('employee.commissions.index')}}" class="nav-item">--}}
{{--                        <i class="fa-solid fa-percent"></i>--}}
{{--                        <span>عمولة الموظفين</span>--}}
{{--                    </a>--}}
{{--                @endif--}}


{{--                @if(auth()->user()->is_admin == 1 || in_array('employees', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}

{{--                <a href="{{route('admin.employees.index')}}" class="nav-item">--}}
{{--                <i class="fa-solid fa-people-group"></i>--}}
{{--                <span>الموظفين</span>--}}
{{--            </a>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->is_admin == 1 || in_array('clients', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}

{{--                    <a href="{{route('clients.index')}}" class="nav-item">--}}
{{--                        <i class="fa-solid fa-users"></i>--}}
{{--                        <span>العملاء</span>--}}
{{--                    </a>--}}
{{--                @endif--}}


{{--                <a href="{{route('admin.reports.index')}}" class="nav-item">--}}
{{--                <i class="fa-solid fa-chart-column"></i>--}}
{{--                <span>التقارير</span>--}}
{{--               </a>--}}


{{--            <!-- طلبات العملاء -->--}}
{{--            <a href="#" class="nav-item nav-notif">--}}
{{--                <i class="fa-solid fa-clipboard-list"></i>--}}
{{--                <span>طلبات العملاء</span>--}}

{{--                <!-- الترقيم -->--}}
{{--                <span class="nav-badge" id="sideNotifCount">جديد</span>--}}
{{--            </a>--}}



{{--            <a href="#" class="nav-item">--}}
{{--                <i class="fa-solid fa-gear"></i>--}}
{{--                <span>الإعدادات</span>--}}
{{--            </a>--}}

{{--            <a href="#" class="nav-item">--}}
{{--                <i class="fa-solid fa-headset"></i>--}}
{{--                <span>الدعم الفني</span>--}}
{{--            </a>--}}

{{--            <!--      Admin            -->--}}
{{--            <!-- شكاوي العملاء -->--}}
{{--            <a href="#" class="nav-item">--}}
{{--                <i class="fa-solid fa-circle-exclamation"></i>--}}
{{--                <span>شكاوي العملاء</span>--}}
{{--            </a>--}}

{{--            <!-- الشركات -->--}}
{{--            <a href="#" class="nav-item">--}}
{{--                <i class="fa-solid fa-building"></i>--}}
{{--                <span>الشركات</span>--}}
{{--            </a>--}}
{{--        </nav>--}}
{{--    </aside>--}}

{{--    <!-- Main -->--}}
{{--    <main class="main-content" id="mainContent">--}}

{{--        <!-- Top Header -->--}}
{{--        <header class="top-header">--}}
{{--            <button class="menu-toggle" id="menuToggle" aria-label="toggle menu">--}}
{{--                <i class="fas fa-bars"></i>--}}
{{--            </button>--}}

{{--            <div class="header-search">--}}
{{--                <i class="fas fa-search"></i>--}}
{{--                <input type="text" placeholder="ابحث عن أي شيء...">--}}
{{--            </div>--}}

{{--            <!-- LEFT ACTIONS (in RTL) -->--}}
{{--            <div class="header-actions">--}}

{{--                <!-- Notification dropdown -->--}}


{{--                <!-- Profile dropdown -->--}}
{{--                <div class="profile-wrap">--}}

{{--                    <div class="user-avatar" id="profileBtn"  aria-label="profile menu">--}}
{{--                        <img style="cursor: pointer" src=" {{ asset(auth()->user()->company?->logo) }}">--}}
{{--                    </div>--}}

{{--                    <div class="profile-menu" id="profileMenu">--}}
{{--                        <div class="profile-head">--}}
{{--                            <div class="user-avatar">--}}
{{--                                <img src="{{ asset(auth()->user()->employee_image) }}">--}}
{{--                            </div>--}}
{{--                            <div class="meta">--}}
{{--                                <div class="name">{{auth()->user()->name}}</div>--}}
{{--                                <div class="role">المسؤول الرئيسي</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <a class="profile-item" href="#">--}}
{{--                            <i class="fa-solid fa-gear"></i>--}}
{{--                            <span>الإعدادات</span>--}}
{{--                        </a>--}}

{{--                        <a class="profile-item" href="#">--}}
{{--                            <i class="fa-solid fa-id-card"></i>--}}
{{--                            <span>الملف الشخصي</span>--}}
{{--                        </a>--}}

{{--                        <hr style="border-color:rgba(15,23,42,.08);margin:10px 0;">--}}

{{--                        <a id="btnLogout" class="profile-item danger" href="{{route('admin.logout')}}">--}}
{{--                            <i class="fa-solid fa-arrow-right-from-bracket"></i>--}}

{{--                            <span class="btn-text">تسجيل الخروج</span>--}}

{{--                            <span class="btn-spinner d-none">--}}
{{--                            <span class="spinner-border spinner-border-sm"></span>--}}
{{--                            جاري تسجيل الخروج...--}}
{{--                        </span>--}}
{{--                        </a>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </header>--}}


{{--        <!-- HOME CARDS -->--}}
{{--        <section class="home-grid">--}}


{{--            @if(auth()->user()->is_admin == 1 || in_array('states', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                <a href="#" class="home-card">--}}
{{--                    <div class="home-card-icon"> <img src="{{asset('img/icons/building.png')}}"></div>--}}
{{--                    <div class="home-card-title">عقارات البيع</div>--}}
{{--                    <div class="home-card-value">{{auth()->user()->company?->selling_states_count}}</div>--}}
{{--                </a>--}}
{{--            @endif--}}


{{--            @if(auth()->user()->is_admin == 1 || in_array('states', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                <a href="#" class="home-card">--}}
{{--                    <div class="home-card-icon"><img src="{{asset('img/icons/house.png')}}"></div>--}}
{{--                    <div class="home-card-title">عقارات الإيجار</div>--}}
{{--                    <div class="home-card-value">{{auth()->user()->company?->tenant_states_count}}</div>--}}
{{--                </a>--}}
{{--            @endif--}}


{{--            @if(auth()->user()->is_admin == 1 || in_array('clients', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                <a href="#" class="home-card">--}}
{{--                    <div class="home-card-icon"><img src="{{asset('img/icons/employees.png')}}"></div>--}}
{{--                    <div class="home-card-title">العملاء</div>--}}
{{--                    <div class="home-card-value">{{auth()->user()->company?->clients_count}}</div>--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            @if(auth()->user()->is_admin == 1 || in_array('lands', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}

{{--            <a href="#" class="home-card">--}}
{{--                <div class="home-card-icon"><img src="{{asset('img/icons/land.png')}}"></div>--}}
{{--                <div class="home-card-title">الأراضي</div>--}}
{{--                <div class="home-card-value">{{auth()->user()->company?->lands_count}}</div>--}}
{{--            </a>--}}
{{--            @endif--}}


{{--                @if(auth()->user()->is_admin == 1 || in_array('tenants', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}

{{--                    <a href="#" class="home-card">--}}
{{--                        <div class="home-card-icon"><img src="{{asset('img/icons/person.png')}}"></div>--}}
{{--                        <div class="home-card-title">المستأجرين</div>--}}
{{--                        <div class="home-card-value">{{auth()->user()->company?->tenants_count}}</div>--}}
{{--                    </a>--}}
{{--                @endif--}}



{{--                @if(auth()->user()->is_admin == 1 || in_array('tenant_contracts', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                    <a href="#" class="home-card">--}}
{{--                        <div class="home-card-icon"><img src="{{asset('img/icons/lease.png')}}"></div>--}}
{{--                        <div class="home-card-title">عقود الإيجار</div>--}}
{{--                        <div class="home-card-value">{{auth()->user()->company?->tenant_contracts_count}}</div>--}}
{{--                    </a>--}}
{{--                @endif--}}


{{--            @if(auth()->user()->is_admin == 1 || in_array('employees', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}

{{--            <a href="#" class="home-card">--}}
{{--                <div class="home-card-icon"><img src="{{asset('img/icons/people.png')}}"></div>--}}
{{--                <div class="home-card-title">الموظفين</div>--}}
{{--                <div class="home-card-value">{{auth()->user()->company?->employees_count}}</div>--}}
{{--            </a>--}}
{{--            @endif--}}

{{--                @if(auth()->user()->is_admin == 1 || in_array('revenue', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                    <a href="#" class="home-card">--}}
{{--                        <div class="home-card-icon"><img src="{{asset('img/icons/hu.png')}}"></div>--}}
{{--                        <div class="home-card-title">الإيرادات</div>--}}
{{--                        <div class="home-card-value">{{auth()->user()->company?->revenues_count}}</div>--}}
{{--                    </a>--}}
{{--                @endif--}}



{{--                @if(auth()->user()->is_admin == 1 || in_array('expenses', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                    <a href="#" class="home-card">--}}
{{--                        <div class="home-card-icon"><img src="{{asset('img/icons/give.png')}}"></div>--}}
{{--                        <div class="home-card-title">المصروفات</div>--}}
{{--                        <div class="home-card-value">{{auth()->user()->company?->expenses_count}}</div>--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->is_admin == 1 || in_array('profits', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}

{{--                    <a href="#" class="home-card">--}}
{{--                        <div class="home-card-icon"><img src="{{asset('img/icons/mo.png')}}"></div>--}}
{{--                        <div class="home-card-title">الأرباح</div>--}}
{{--                        <div class="home-card-value">{{auth()->user()->company?->profitsCount}}</div>--}}
{{--                    </a>--}}
{{--                @endif--}}



{{--        </section>--}}
{{--    </main>--}}
{{--</div>--}}

{{--<audio id="sound" src="{{ asset('sounds/eventually-590.mp3') }}"></audio>--}}

{{--@if(session('login'))--}}
{{--    <div id="loginSuccessBar" class="login-success-bar show">--}}
{{--        {{ session('login') }}--}}
{{--    </div>--}}
{{--@endif--}}

{{--@if(session('register'))--}}
{{--    <div id="loginSuccessBar" class="login-success-bar show">--}}
{{--        {{ session('register') }}--}}
{{--    </div>--}}
{{--@endif--}}

{{--<script>--}}
{{--    // Sidebar toggle--}}
{{--    const layout = document.getElementById("layout");--}}
{{--    const menuToggle = document.getElementById("menuToggle");--}}
{{--    menuToggle.addEventListener("click", () => {--}}
{{--        layout.classList.toggle("sidebar-collapsed");--}}
{{--    });--}}

{{--    // Profile dropdown--}}
{{--    const profileBtn = document.getElementById("profileBtn");--}}
{{--    const profileMenu = document.getElementById("profileMenu");--}}

{{--    profileBtn.addEventListener("click", (e) => {--}}
{{--        e.stopPropagation();--}}
{{--        profileMenu.classList.toggle("show");--}}
{{--    });--}}

{{--    // Close dropdown when clicking outside--}}
{{--    document.addEventListener("click", () => {--}}
{{--        profileMenu.classList.remove("show");--}}
{{--    });--}}

{{--    // Prevent closing when clicking inside menu--}}
{{--    profileMenu.addEventListener("click", (e) => e.stopPropagation());--}}



{{--    // (اختياري) تأكيد تسجيل الخروج--}}
{{--    const logoutLink = document.getElementById("logoutLink");--}}
{{--    logoutLink.addEventListener("click", (e) => {--}}
{{--        const ok = confirm("هل تريد تسجيل الخروج؟");--}}
{{--        if (!ok) e.preventDefault();--}}
{{--    });--}}
{{--</script>--}}


{{--<script>--}}
{{--    const btnLogout = document.getElementById('btnLogout');--}}

{{--    function activateButtonLoader(button){--}}
{{--        const text = button.querySelector('.btn-text');--}}
{{--        const spinner = button.querySelector('.btn-spinner');--}}

{{--        if(text) text.classList.add('d-none');--}}
{{--        if(spinner) spinner.classList.remove('d-none');--}}

{{--        button.style.pointerEvents = "none"; // يمنع الضغط المتكرر--}}
{{--        button.style.opacity = "0.8";--}}
{{--    }--}}

{{--    // عند الضغط على تسجيل الخروج--}}
{{--    btnLogout.addEventListener('click', function () {--}}
{{--        activateButtonLoader(btnLogout);--}}
{{--    });--}}
{{--</script>--}}

{{--<script>--}}
{{--    document.addEventListener("DOMContentLoaded", function () {--}}
{{--        const message = document.getElementById("loginSuccessBar");--}}
{{--        if(message){--}}
{{--            const sound = document.getElementById("sound");--}}
{{--            if(sound){--}}
{{--                sound.play();--}}
{{--            }--}}

{{--        }--}}

{{--    });--}}
{{--</script>--}}

{{--@include('admin.layouts.toast')--}}
{{--</body>--}}
{{--</html>--}}



{{--    <!DOCTYPE html>--}}
{{--<html lang="ar" dir="rtl">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8" />--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0" />--}}
{{--    <title>الرئيسية - لوحة التحكم</title>--}}

{{--    <!-- Bootstrap RTL -->--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">--}}

{{--    <!-- Google Font Cairo -->--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">--}}

{{--    <!-- Font Awesome -->--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />--}}
{{--    <link rel="stylesheet" href="{{asset('css/admin/toast.css')}}" />--}}

{{--    <style>--}}
{{--        body {--}}
{{--            background: #ffffff; /* White background to match the screenshot */--}}
{{--            margin: 0;--}}
{{--            color: #333;--}}
{{--            font-family: "Cairo", sans-serif;--}}
{{--        }--}}

{{--        /* ============= Layout ============= */--}}
{{--        .layout { display: flex; min-height: 100vh; }--}}

{{--        /* ============= Sidebar ============= */--}}
{{--        .sidebar {--}}
{{--            width: 250px;--}}
{{--            background: #3f5063; /* Header exact dark color from screenshot */--}}
{{--            color: #fff;--}}
{{--            position: sticky;--}}
{{--            top: 0;--}}
{{--            height: 100vh;--}}
{{--            overflow-y: auto;--}}
{{--            flex-shrink: 0;--}}
{{--        }--}}

{{--        .sidebar::-webkit-scrollbar { width: 5px; }--}}
{{--        .sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,.2); border-radius: 5px; }--}}

{{--        .sidebar-header {--}}
{{--            padding: 20px 15px;--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            gap: 12px;--}}
{{--        }--}}

{{--        .user-avatar {--}}
{{--            width: 40px;--}}
{{--            height: 40px;--}}
{{--            border-radius: 50%;--}}
{{--            overflow: hidden;--}}
{{--            background: #fff;--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            justify-content: center;--}}
{{--        }--}}
{{--        .user-avatar img { width: 100%; height: 100%; object-fit: cover; }--}}

{{--        .user-info .user-name { font-weight: 700; font-size: 15px; line-height: 1.3; }--}}
{{--        .user-info .user-role { font-size: 12px; color: #cbd5e1; }--}}

{{--        .sidebar-nav { display: flex; flex-direction: column; padding: 10px 0; }--}}

{{--        .nav-item {--}}
{{--            display: flex; align-items: center; gap: 12px;--}}
{{--            padding: 12px 20px;--}}
{{--            color: #cbd5e1;--}}
{{--            text-decoration: none;--}}
{{--            font-size: 15px;--}}
{{--            font-weight: 600;--}}
{{--            transition: background 0.2s, color 0.2s;--}}
{{--        }--}}
{{--        .nav-item:hover, .nav-item.active {--}}
{{--            background: rgba(255,255,255,.05);--}}
{{--            color: #fff;--}}
{{--        }--}}
{{--        .nav-item i { width: 22px; text-align: center; font-size: 18px; }--}}

{{--        /* ============= Main Content ============= */--}}
{{--        .main-wrapper { flex: 1; display: flex; flex-direction: column; min-width: 0; }--}}

{{--        /* ============= Top Header ============= */--}}
{{--        .top-header {--}}
{{--            background: #3f5063; /* Matches the sidebar identically */--}}
{{--            height: 60px;--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            justify-content: flex-end; /* Pushes content to left in RTL */--}}
{{--            padding: 0 25px;--}}
{{--            gap: 20px;--}}
{{--        }--}}

{{--        .header-icon {--}}
{{--            color: #cbd5e1;--}}
{{--            font-size: 20px;--}}
{{--            position: relative;--}}
{{--            cursor: pointer;--}}
{{--            text-decoration: none;--}}
{{--            transition: color 0.2s;--}}
{{--        }--}}
{{--        .header-icon:hover { color: #fff; }--}}

{{--        .header-badge {--}}
{{--            position: absolute;--}}
{{--            top: -6px;--}}
{{--            right: -6px;--}}
{{--            background: #ef4444;--}}
{{--            color: #fff;--}}
{{--            font-size: 10px;--}}
{{--            font-weight: 800;--}}
{{--            width: 16px;--}}
{{--            height: 16px;--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            justify-content: center;--}}
{{--            border-radius: 50%;--}}
{{--        }--}}

{{--        /* Profile Dropdown */--}}
{{--        .profile-wrap { position: relative; }--}}

{{--        .top-user-avatar {--}}
{{--            width: 32px;--}}
{{--            height: 32px;--}}
{{--            border-radius: 50%;--}}
{{--            cursor: pointer;--}}
{{--            object-fit: cover;--}}
{{--        }--}}

{{--        .profile-menu {--}}
{{--            position: absolute;--}}
{{--            left: 0;--}}
{{--            top: 45px;--}}
{{--            width: 200px;--}}
{{--            background: #fff;--}}
{{--            border-radius: 6px;--}}
{{--            box-shadow: 0 5px 15px rgba(0,0,0,0.1);--}}
{{--            padding: 8px 0;--}}
{{--            display: none;--}}
{{--            z-index: 1000;--}}
{{--            border: 1px solid #e2e8f0;--}}
{{--        }--}}
{{--        .profile-menu.show { display: block; }--}}

{{--        .profile-item {--}}
{{--            display: flex; align-items: center; gap: 10px;--}}
{{--            padding: 10px 15px;--}}
{{--            color: #334155;--}}
{{--            text-decoration: none;--}}
{{--            font-size: 14px;--}}
{{--            font-weight: 600;--}}
{{--        }--}}
{{--        .profile-item:hover { background: #f8fafc; }--}}
{{--        .profile-item i { width: 16px; text-align: center; }--}}
{{--        .profile-item.danger { color: #ef4444; }--}}
{{--        .profile-item.danger i { color: #ef4444; }--}}

{{--        /* ============= Content Area ============= */--}}
{{--        .content-area {--}}
{{--            padding: 25px;--}}
{{--            background: #ffffff;--}}
{{--            flex: 1;--}}
{{--        }--}}

{{--        /* ============= HOME CARDS ============= */--}}
{{--        .home-grid {--}}
{{--            display: grid;--}}
{{--            gap: 15px;--}}
{{--            grid-template-columns: repeat(5, 1fr);--}}
{{--        }--}}

{{--        .home-card {--}}
{{--            background: #fff;--}}
{{--            border: 1px solid #e2e8f0;--}}
{{--            border-radius: 6px;--}}
{{--            padding: 20px 15px 15px;--}}
{{--            display: flex;--}}
{{--            flex-direction: column;--}}
{{--            justify-content: space-between;--}}
{{--            height: 135px;--}}
{{--            text-decoration: none;--}}
{{--            color: #334155;--}}
{{--            transition: box-shadow 0.2s, transform 0.2s;--}}
{{--        }--}}

{{--        .home-card:hover {--}}
{{--            box-shadow: 0 4px 15px rgba(0,0,0,0.06);--}}
{{--            transform: translateY(-2px);--}}
{{--        }--}}

{{--        .home-card-icon {--}}
{{--            text-align: center;--}}
{{--            margin-bottom: auto;--}}
{{--        }--}}

{{--        .home-card-icon img {--}}
{{--            height: 48px;--}}
{{--            max-width: 100%;--}}
{{--            object-fit: contain;--}}
{{--        }--}}

{{--        .home-card-bottom {--}}
{{--            display: flex;--}}
{{--            justify-content: space-between;--}}
{{--            align-items: center;--}}
{{--            margin-top: 15px;--}}
{{--        }--}}

{{--        .home-card-title {--}}
{{--            font-size: 14px;--}}
{{--            font-weight: 700;--}}
{{--            color: #475569;--}}
{{--        }--}}

{{--        .home-card-value {--}}
{{--            font-size: 16px;--}}
{{--            font-weight: 800;--}}
{{--            color: #0f172a;--}}
{{--        }--}}

{{--        @media (max-width: 1200px){ .home-grid{ grid-template-columns:repeat(3, 1fr); } }--}}
{{--        @media (max-width: 768px){--}}
{{--            .home-grid{ grid-template-columns:repeat(2, 1fr); }--}}
{{--            .sidebar { width: 220px; }--}}
{{--        }--}}
{{--        @media (max-width: 576px){--}}
{{--            .home-grid{ grid-template-columns:1fr; }--}}
{{--            .layout { flex-direction: column; }--}}
{{--            .sidebar { width: 100%; height: auto; position: static; }--}}
{{--        }--}}

{{--    </style>--}}
{{--</head>--}}

{{--<body>--}}
{{--<div class="layout" id="layout">--}}

{{--    <!-- Sidebar -->--}}
{{--    <aside class="sidebar" id="sidebar">--}}
{{--        <div class="sidebar-header">--}}
{{--            <div class="user-avatar">--}}
{{--                <img src="{{ asset(auth()->user()->company?->logo) }}">--}}
{{--            </div>--}}
{{--            <div class="user-info">--}}
{{--                <div class="user-name">{{ auth()->user()->company?->company_name }}</div>--}}
{{--                <!-- <div class="user-role">{{ auth()->user()->name }}</div> -->--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <nav class="sidebar-nav">--}}
{{--            @if(auth()->user()->is_admin == 1 || in_array('states', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                <a href="{{route('states.index')}}" class="nav-item">--}}
{{--                    <i class="fa-solid fa-city"></i>--}}
{{--                    <span>العقارات</span>--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            @if(auth()->user()->is_admin == 1 || in_array('lands', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                <a href="{{route('lands.index')}}" class="nav-item">--}}
{{--                    <i class="fa-solid fa-map-location-dot"></i>--}}
{{--                    <span>الأراضي</span>--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            @if(auth()->user()->is_admin == 1 || in_array('tenants', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                <a href="#" class="nav-item">--}}
{{--                    <i class="fa-solid fa-house-user"></i>--}}
{{--                    <span>المستأجرين</span>--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            @if(auth()->user()->is_admin == 1 || in_array('tenant_contracts', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                <a href="{{route('tenant.contracts.index')}}" class="nav-item">--}}
{{--                    <i class="fa-solid fa-file-signature"></i>--}}
{{--                    <span>عقود الإيجار</span>--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            @if(auth()->user()->is_admin == 1 || in_array('expired_contracts', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                <a href="{{route('admin.contracts.expired')}}" class="nav-item">--}}
{{--                    <i class="fa-solid fa-file-circle-xmark"></i>--}}
{{--                    <span>العقود المنتهية</span>--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            @if(auth()->user()->is_admin == 1 || in_array('financial_cash', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                <a href="#" class="nav-item">--}}
{{--                    <i class="fa-solid fa-receipt"></i>--}}
{{--                    <span>سندات القبض</span>--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            @if(auth()->user()->is_admin == 1 || in_array('financial_receipt', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                <a href="#" class="nav-item">--}}
{{--                    <i class="fa-solid fa-money-bill-transfer"></i>--}}
{{--                    <span>سندات الصرف</span>--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            @if(auth()->user()->is_admin == 1 || in_array('revenues', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                <a href="{{route('admin.revenues.index')}}" class="nav-item">--}}
{{--                    <i class="fa-solid fa-coins"></i>--}}
{{--                    <span>الإيرادات</span>--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            @if(auth()->user()->is_admin == 1 || in_array('expenses', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                <a href="{{route('admin.expenses.index')}}" class="nav-item">--}}
{{--                    <i class="fa-solid fa-sack-dollar"></i>--}}
{{--                    <span>المصروفات</span>--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            @if(auth()->user()->is_admin == 1 || in_array('employee_commission', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                <a href="{{route('employee.commissions.index')}}" class="nav-item">--}}
{{--                    <i class="fa-solid fa-percent"></i>--}}
{{--                    <span>عمولة الموظفين</span>--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            @if(auth()->user()->is_admin == 1 || in_array('employees', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                <a href="{{route('admin.employees.index')}}" class="nav-item">--}}
{{--                    <i class="fa-solid fa-people-group"></i>--}}
{{--                    <span>الموظفين</span>--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            @if(auth()->user()->is_admin == 1 || in_array('clients', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                <a href="{{route('clients.index')}}" class="nav-item">--}}
{{--                    <i class="fa-solid fa-users"></i>--}}
{{--                    <span>العملاء</span>--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            <a href="{{route('admin.reports.index')}}" class="nav-item">--}}
{{--                <i class="fa-solid fa-chart-column"></i>--}}
{{--                <span>التقارير</span>--}}
{{--            </a>--}}

{{--            <a href="#" class="nav-item">--}}
{{--                <i class="fa-solid fa-gear"></i>--}}
{{--                <span>الإعدادات</span>--}}
{{--            </a>--}}

{{--            <a href="#" class="nav-item">--}}
{{--                <i class="fa-solid fa-headset"></i>--}}
{{--                <span>الدعم الفني</span>--}}
{{--            </a>--}}
{{--        </nav>--}}
{{--    </aside>--}}

{{--    <!-- Main -->--}}
{{--    <main class="main-wrapper">--}}

{{--        <!-- Top Header -->--}}
{{--        <header class="top-header">--}}
{{--            <!-- LEFT ACTIONS (RTL) -->--}}
{{--            <a href="#" class="header-icon">--}}
{{--                <i class="fa-regular fa-message"></i>--}}
{{--            </a>--}}

{{--            <a href="#" class="header-icon">--}}
{{--                <i class="fa-regular fa-bell"></i>--}}
{{--                <span class="header-badge">0</span>--}}
{{--            </a>--}}

{{--            <!-- Profile dropdown -->--}}
{{--            <div class="profile-wrap">--}}
{{--                <img src="{{ asset(auth()->user()->employee_image) }}" class="top-user-avatar" id="profileBtn" alt="User">--}}

{{--                <div class="profile-menu" id="profileMenu">--}}
{{--                    <a class="profile-item" href="#">--}}
{{--                        <i class="fa-solid fa-gear"></i>--}}
{{--                        <span>الإعدادات</span>--}}
{{--                    </a>--}}
{{--                    <a class="profile-item" href="#">--}}
{{--                        <i class="fa-solid fa-id-card"></i>--}}
{{--                        <span>الملف الشخصي</span>--}}
{{--                    </a>--}}
{{--                    <hr style="border-color:rgba(15,23,42,.08);margin:5px 0;">--}}
{{--                    <a id="btnLogout" class="profile-item danger" href="{{route('admin.logout')}}">--}}
{{--                        <i class="fa-solid fa-arrow-right-from-bracket"></i>--}}
{{--                        <span class="btn-text">تسجيل الخروج</span>--}}
{{--                        <span class="btn-spinner d-none">--}}
{{--                            <span class="spinner-border spinner-border-sm"></span>--}}
{{--                        </span>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </header>--}}

{{--        <!-- Content Area -->--}}
{{--        <div class="content-area">--}}

{{--            <!-- HOME CARDS -->--}}
{{--            <section class="home-grid">--}}

{{--                @if(auth()->user()->is_admin == 1 || in_array('states', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                    <a href="#" class="home-card">--}}
{{--                        <div class="home-card-icon"><img src="{{asset('img/icons/building.png')}}" alt="icon"></div>--}}
{{--                        <div class="home-card-bottom">--}}
{{--                            <span class="home-card-value">{{auth()->user()->company?->selling_states_count ?? '0'}}</span>--}}
{{--                            <span class="home-card-title">عقارات البيع</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->is_admin == 1 || in_array('states', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                    <a href="#" class="home-card">--}}
{{--                        <div class="home-card-icon"><img src="{{asset('img/icons/house.png')}}" alt="icon"></div>--}}
{{--                        <div class="home-card-bottom">--}}
{{--                            <span class="home-card-value">{{auth()->user()->company?->tenant_states_count ?? '0'}}</span>--}}
{{--                            <span class="home-card-title">عقارات الايجار</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->is_admin == 1 || in_array('clients', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                    <a href="#" class="home-card">--}}
{{--                        <div class="home-card-icon"><img src="{{asset('img/icons/employees.png')}}" alt="icon"></div>--}}
{{--                        <div class="home-card-bottom">--}}
{{--                            <span class="home-card-value">{{auth()->user()->company?->clients_count ?? '0'}}</span>--}}
{{--                            <span class="home-card-title">العملاء</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->is_admin == 1 || in_array('lands', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                    <a href="#" class="home-card">--}}
{{--                        <div class="home-card-icon"><img src="{{asset('img/icons/land.png')}}" alt="icon"></div>--}}
{{--                        <div class="home-card-bottom">--}}
{{--                            <span class="home-card-value">{{auth()->user()->company?->lands_count ?? '0'}}</span>--}}
{{--                            <span class="home-card-title">الاراضي</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->is_admin == 1 || in_array('tenants', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                    <a href="#" class="home-card">--}}
{{--                        <div class="home-card-icon"><img src="{{asset('img/icons/person.png')}}" alt="icon"></div>--}}
{{--                        <div class="home-card-bottom">--}}
{{--                            <span class="home-card-value">{{auth()->user()->company?->tenants_count ?? '0'}}</span>--}}
{{--                            <span class="home-card-title">المستاجرين</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->is_admin == 1 || in_array('tenant_contracts', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                    <a href="#" class="home-card">--}}
{{--                        <div class="home-card-icon"><img src="{{asset('img/icons/lease.png')}}" alt="icon"></div>--}}
{{--                        <div class="home-card-bottom">--}}
{{--                            <span class="home-card-value">{{auth()->user()->company?->tenant_contracts_count ?? '0'}}</span>--}}
{{--                            <span class="home-card-title">عقود الايجار</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->is_admin == 1 || in_array('employees', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                    <a href="#" class="home-card">--}}
{{--                        <div class="home-card-icon"><img src="{{asset('img/icons/people.png')}}" alt="icon"></div>--}}
{{--                        <div class="home-card-bottom">--}}
{{--                            <span class="home-card-value">{{auth()->user()->company?->employees_count ?? '0'}}</span>--}}
{{--                            <span class="home-card-title">الموظفين</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->is_admin == 1 || in_array('revenue', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                    <a href="#" class="home-card">--}}
{{--                        <div class="home-card-icon"><img src="{{asset('img/icons/hu.png')}}" alt="icon"></div>--}}
{{--                        <div class="home-card-bottom">--}}
{{--                            <span class="home-card-value">{{auth()->user()->company?->revenues_count ?? '0'}}</span>--}}
{{--                            <span class="home-card-title">الايرادات</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->is_admin == 1 || in_array('expenses', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                    <a href="#" class="home-card">--}}
{{--                        <div class="home-card-icon"><img src="{{asset('img/icons/give.png')}}" alt="icon"></div>--}}
{{--                        <div class="home-card-bottom">--}}
{{--                            <span class="home-card-value">{{auth()->user()->company?->expenses_count ?? '0'}}</span>--}}
{{--                            <span class="home-card-title">المصروفات</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                @if(auth()->user()->is_admin == 1 || in_array('profits', json_decode(auth()->user()->employee_permissions, true) ?? []))--}}
{{--                    <a href="#" class="home-card">--}}
{{--                        <div class="home-card-icon"><img src="{{asset('img/icons/mo.png')}}" alt="icon"></div>--}}
{{--                        <div class="home-card-bottom">--}}
{{--                            <span class="home-card-value">{{auth()->user()->company?->profitsCount ?? '0'}}</span>--}}
{{--                            <span class="home-card-title">الارباح</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--            </section>--}}
{{--        </div>--}}
{{--    </main>--}}
{{--</div>--}}

{{--<audio id="sound" src="{{ asset('sounds/eventually-590.mp3') }}"></audio>--}}

{{--@if(session('login'))--}}
{{--    <div id="loginSuccessBar" class="login-success-bar show">--}}
{{--        {{ session('login') }}--}}
{{--    </div>--}}
{{--@endif--}}

{{--@if(session('register'))--}}
{{--    <div id="loginSuccessBar" class="login-success-bar show">--}}
{{--        {{ session('register') }}--}}
{{--    </div>--}}
{{--@endif--}}

{{--<script>--}}
{{--    // Profile dropdown--}}
{{--    const profileBtn = document.getElementById("profileBtn");--}}
{{--    const profileMenu = document.getElementById("profileMenu");--}}

{{--    profileBtn.addEventListener("click", (e) => {--}}
{{--        e.stopPropagation();--}}
{{--        profileMenu.classList.toggle("show");--}}
{{--    });--}}

{{--    document.addEventListener("click", () => {--}}
{{--        profileMenu.classList.remove("show");--}}
{{--    });--}}

{{--    profileMenu.addEventListener("click", (e) => e.stopPropagation());--}}

{{--    const btnLogout = document.getElementById('btnLogout');--}}
{{--    function activateButtonLoader(button){--}}
{{--        const text = button.querySelector('.btn-text');--}}
{{--        const spinner = button.querySelector('.btn-spinner');--}}

{{--        if(text) text.classList.add('d-none');--}}
{{--        if(spinner) spinner.classList.remove('d-none');--}}

{{--        button.style.pointerEvents = "none";--}}
{{--        button.style.opacity = "0.8";--}}
{{--    }--}}

{{--    btnLogout.addEventListener('click', function () {--}}
{{--        activateButtonLoader(btnLogout);--}}
{{--    });--}}

{{--    document.addEventListener("DOMContentLoaded", function () {--}}
{{--        const message = document.getElementById("loginSuccessBar");--}}
{{--        if(message){--}}
{{--            const sound = document.getElementById("sound");--}}
{{--            if(sound){--}}
{{--                sound.play();--}}
{{--            }--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}

{{--@include('admin.layouts.toast')--}}
{{--</body>--}}
{{--</html>--}}















    <!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>الرئيسية - لوحة التحكم</title>

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- Google Font Cairo -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('css/admin/toast.css')}}" />

    <style>
        body {
            background: #ffffff;
            margin: 0;
            color: #333;
            font-family: "Cairo", sans-serif;
        }

        /* ============= Layout ============= */
        .layout { display: flex; min-height: 100vh; position: relative; }

        /* ============= Sidebar ============= */
        .sidebar {
            width: 250px;
            background: #3f5063;
            color: #fff;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            flex-shrink: 0;
        }

        .sidebar::-webkit-scrollbar { width: 5px; }
        .sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,.2); border-radius: 5px; }

        .sidebar-header {
            padding: 20px 15px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .user-avatar img { width: 100%; height: 100%; object-fit: cover; }

        .user-info .user-name { font-weight: 700; font-size: 15px; line-height: 1.3; }
        .user-info .user-role { font-size: 12px; color: #cbd5e1; }

        .sidebar-nav { display: flex; flex-direction: column; padding: 10px 0; }

        .nav-item {
            display: flex; align-items: center; gap: 12px;
            padding: 12px 20px;
            color: #cbd5e1;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            transition: background 0.2s, color 0.2s;
        }
        .nav-item:hover, .nav-item.active {
            background: rgba(255,255,255,.05);
            color: #fff;
        }
        .nav-item i { width: 22px; text-align: center; font-size: 18px; }

        /* ============= Main Content ============= */
        .main-wrapper { flex: 1; display: flex; flex-direction: column; min-width: 0; }

        /* ============= Top Header ============= */
        .top-header {
            background: #3f5063;
            height: 60px;
            display: flex;
            align-items: center;
            padding: 0 25px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-right: auto; /* Pushes content to left in RTL */
        }

        .header-right { display: none; }
        .header-title { display: none; }

        .header-icon {
            color: #cbd5e1;
            font-size: 20px;
            position: relative;
            cursor: pointer;
            text-decoration: none;
            transition: color 0.2s;
        }
        .header-icon:hover { color: #fff; }

        .header-badge {
            position: absolute;
            top: -6px;
            right: -6px;
            background: #ef4444;
            color: #fff;
            font-size: 10px;
            font-weight: 800;
            width: 16px;
            height: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        /* Profile Dropdown */
        .profile-wrap { position: relative; }

        .top-user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            cursor: pointer;
            object-fit: cover;
        }

        .profile-menu {
            position: absolute;
            left: 0;
            top: 45px;
            width: 200px;
            background: #fff;
            border-radius: 6px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            padding: 8px 0;
            display: none;
            z-index: 1000;
            border: 1px solid #e2e8f0;
        }
        .profile-menu.show { display: block; }

        .profile-item {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 15px;
            color: #334155;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }
        .profile-item:hover { background: #f8fafc; }
        .profile-item i { width: 16px; text-align: center; }
        .profile-item.danger { color: #ef4444; }
        .profile-item.danger i { color: #ef4444; }

        /* ============= Content Area ============= */
        .content-area {
            padding: 25px;
            background: #ffffff;
            flex: 1;
        }

        /* ============= HOME CARDS ============= */
        .home-grid {
            display: grid;
            gap: 15px;
            grid-template-columns: repeat(5, 1fr);
        }

        .home-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 20px 15px 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 135px;
            text-decoration: none;
            color: #334155;
            transition: box-shadow 0.2s, transform 0.2s;
        }

        .home-card:hover {
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
            transform: translateY(-2px);
        }

        .home-card-icon {
            text-align: center;
            margin-bottom: auto;
        }

        .home-card-icon img {
            height: 48px;
            max-width: 100%;
            object-fit: contain;
        }

        .home-card-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }

        .home-card-title {
            font-size: 14px;
            font-weight: 700;
            color: #475569;
        }

        .home-card-value {
            font-size: 16px;
            font-weight: 800;
            color: #0f172a;
        }

        /* ============= Media Queries for Tablet/Mobile ============= */
        @media (max-width: 1200px) { .home-grid { grid-template-columns: repeat(3, 1fr); } }

        @media (max-width: 991px) {
            .top-header { padding: 0 15px; justify-content: space-between; }
            .header-right { display: block; margin-right: 0; }
            .menu-toggle {
                background: transparent;
                border: none;
                color: #fff;
                font-size: 22px;
                cursor: pointer;
                padding: 0;
                display: flex;
                align-items: center;
            }
            .header-title {
                display: block;
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
                color: #fff;
                font-size: 16px;
                font-weight: 700;
            }
            .header-left { margin-right: 0; gap: 15px; }
            .desktop-only { display: none; }

            /* Sidebar Off-canvas */
            .sidebar {
                position: fixed;
                right: -260px;
                top: 0;
                bottom: 0;
                z-index: 1050;
                transition: right 0.3s ease;
                box-shadow: -5px 0 15px rgba(0,0,0,0.1);
            }
            .sidebar.open { right: 0; }

            .sidebar-overlay {
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,0.4);
                z-index: 1040;
                opacity: 0;
                visibility: hidden;
                transition: 0.3s ease;
            }
            .sidebar-overlay.active {
                opacity: 1;
                visibility: visible;
            }
        }

        @media (max-width: 768px) {
            /* Force 2 columns maximum on mobile/tablet */
            .home-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
            .content-area { padding: 15px; }
            .home-card { height: 115px; padding: 15px 12px 12px; }
            .home-card-icon img { height: 38px; }
            .home-card-icon i { font-size: 34px; }
            .home-card-bottom { margin-top: 10px; }
            .home-card-title { font-size: 13px; }
            .home-card-value { font-size: 15px; }
        }

        @media (max-width: 480px) {
            .home-grid { gap: 10px; }
            .home-card { height: 110px; padding: 12px 10px; }
            .home-card-icon img { height: 35px; }
            .home-card-title { font-size: 12px; }
            .home-card-value { font-size: 14px; }
        }


        /* Success Bar Override */
        .login-success-bar {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #ef4444; /* Error style for failed logic */
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

    </style>
</head>

<body>
<div class="layout" id="layout">

    <!-- Mobile Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="user-avatar">
                <img src="{{ asset(auth()->user()->company?->logo) }}">
            </div>
            <div class="user-info">
                <div class="user-name">{{ auth()->user()->company?->company_name }}</div>
            </div>
        </div>

        <nav class="sidebar-nav">
            @if(auth()->user()->is_admin == 1 || in_array('states', json_decode(auth()->user()->employee_permissions, true) ?? []))
                <a href="{{route('states.index')}}" class="nav-item">
                    <i class="fa-solid fa-city"></i>
                    <span>العقارات</span>
                </a>
            @endif

            @if(auth()->user()->is_admin == 1 || in_array('lands', json_decode(auth()->user()->employee_permissions, true) ?? []))
                <a href="{{route('lands.index')}}" class="nav-item">
                    <i class="fa-solid fa-map-location-dot"></i>
                    <span>الأراضي</span>
                </a>
            @endif

            @if(auth()->user()->is_admin == 1 || in_array('tenants', json_decode(auth()->user()->employee_permissions, true) ?? []))
                <a href="#" class="nav-item">
                    <i class="fa-solid fa-house-user"></i>
                    <span>المستأجرين</span>
                </a>
            @endif

            @if(auth()->user()->is_admin == 1 || in_array('tenant_contracts', json_decode(auth()->user()->employee_permissions, true) ?? []))
                <a href="{{route('tenant.contracts.index')}}" class="nav-item">
                    <i class="fa-solid fa-file-signature"></i>
                    <span>عقود الإيجار</span>
                </a>
            @endif

            @if(auth()->user()->is_admin == 1 || in_array('expired_contracts', json_decode(auth()->user()->employee_permissions, true) ?? []))
                <a href="{{route('admin.contracts.expired')}}" class="nav-item">
                    <i class="fa-solid fa-file-circle-xmark"></i>
                    <span>العقود المنتهية</span>
                </a>
            @endif

            @if(auth()->user()->is_admin == 1 || in_array('financial_cash', json_decode(auth()->user()->employee_permissions, true) ?? []))
                <a href="#" class="nav-item">
                    <i class="fa-solid fa-receipt"></i>
                    <span>سندات القبض</span>
                </a>
            @endif

            @if(auth()->user()->is_admin == 1 || in_array('financial_receipt', json_decode(auth()->user()->employee_permissions, true) ?? []))
                <a href="#" class="nav-item">
                    <i class="fa-solid fa-money-bill-transfer"></i>
                    <span>سندات الصرف</span>
                </a>
            @endif

            @if(auth()->user()->is_admin == 1 || in_array('revenues', json_decode(auth()->user()->employee_permissions, true) ?? []))
                <a href="{{route('admin.revenues.index')}}" class="nav-item">
                    <i class="fa-solid fa-coins"></i>
                    <span>الإيرادات</span>
                </a>
            @endif

            @if(auth()->user()->is_admin == 1 || in_array('expenses', json_decode(auth()->user()->employee_permissions, true) ?? []))
                <a href="{{route('admin.expenses.index')}}" class="nav-item">
                    <i class="fa-solid fa-sack-dollar"></i>
                    <span>المصروفات</span>
                </a>
            @endif

            @if(auth()->user()->is_admin == 1 || in_array('employee_commission', json_decode(auth()->user()->employee_permissions, true) ?? []))
                <a href="{{route('employee.commissions.index')}}" class="nav-item">
                    <i class="fa-solid fa-percent"></i>
                    <span>عمولة الموظفين</span>
                </a>
            @endif

            @if(auth()->user()->is_admin == 1 || in_array('employees', json_decode(auth()->user()->employee_permissions, true) ?? []))
                <a href="{{route('admin.employees.index')}}" class="nav-item">
                    <i class="fa-solid fa-people-group"></i>
                    <span>الموظفين</span>
                </a>
            @endif

            @if(auth()->user()->is_admin == 1 || in_array('clients', json_decode(auth()->user()->employee_permissions, true) ?? []))
                <a href="{{route('clients.index')}}" class="nav-item">
                    <i class="fa-solid fa-users"></i>
                    <span>العملاء</span>
                </a>
            @endif

            <a href="{{route('admin.reports.index')}}" class="nav-item">
                <i class="fa-solid fa-chart-column"></i>
                <span>التقارير</span>
            </a>

            <a href="#" class="nav-item">
                <i class="fa-solid fa-gear"></i>
                <span>الإعدادات</span>
            </a>

            <a href="#" class="nav-item">
                <i class="fa-solid fa-headset"></i>
                <span>الدعم الفني</span>
            </a>
        </nav>
    </aside>

    <!-- Main -->
    <main class="main-wrapper">

        <!-- Top Header -->
        <header class="top-header">
            <!-- Mobile Right Icon (Hamburger) -->
            <div class="header-right">
                <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>

            <!-- Title in center (Visible only on mobile/tablet) -->
            <div class="header-title">الرئيسية</div>

            <!-- LEFT ACTIONS (RTL) -->
            <div class="header-left">
                <a href="#" class="header-icon">
                    <i class="fa-regular fa-message"></i>
                </a>

                <a href="#" class="header-icon">
                    <i class="fa-regular fa-bell"></i>
                    <span class="header-badge">0</span>
                </a>

                <!-- Profile dropdown (Hidden on mobile) -->
                <div class="profile-wrap desktop-only">
                    <img src="{{ asset(auth()->user()->employee_image) }}" class="top-user-avatar" id="profileBtn" alt="User">

                    <div class="profile-menu" id="profileMenu">
                        <a class="profile-item" href="#">
                            <i class="fa-solid fa-gear"></i>
                            <span>الإعدادات</span>
                        </a>
                        <a class="profile-item" href="#">
                            <i class="fa-solid fa-id-card"></i>
                            <span>الملف الشخصي</span>
                        </a>
                        <hr style="border-color:rgba(15,23,42,.08);margin:5px 0;">
                        <a id="btnLogout" class="profile-item danger" href="{{route('admin.logout')}}">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <span class="btn-text">تسجيل الخروج</span>
                            <span class="btn-spinner d-none">
                                <span class="spinner-border spinner-border-sm"></span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content Area -->
        <div class="content-area">

            <!-- HOME CARDS -->
            <section class="home-grid">

                @if(auth()->user()->is_admin == 1 || in_array('states', json_decode(auth()->user()->employee_permissions, true) ?? []))
                    <a href="#" class="home-card">
                        <div class="home-card-icon"><img src="{{asset('img/icons/building.png')}}" alt="icon"></div>
                        <div class="home-card-bottom">
                            <span class="home-card-value">{{auth()->user()->company?->selling_states_count ?? '0'}}</span>
                            <span class="home-card-title">عقارات البيع</span>
                        </div>
                    </a>
                @endif

                @if(auth()->user()->is_admin == 1 || in_array('states', json_decode(auth()->user()->employee_permissions, true) ?? []))
                    <a href="#" class="home-card">
                        <div class="home-card-icon"><img src="{{asset('img/icons/house.png')}}" alt="icon"></div>
                        <div class="home-card-bottom">
                            <span class="home-card-value">{{auth()->user()->company?->tenant_states_count ?? '0'}}</span>
                            <span class="home-card-title">عقارات الايجار</span>
                        </div>
                    </a>
                @endif

                @if(auth()->user()->is_admin == 1 || in_array('clients', json_decode(auth()->user()->employee_permissions, true) ?? []))
                    <a href="#" class="home-card">
                        <div class="home-card-icon"><img src="{{asset('img/icons/employees.png')}}" alt="icon"></div>
                        <div class="home-card-bottom">
                            <span class="home-card-value">{{auth()->user()->company?->clients_count ?? '0'}}</span>
                            <span class="home-card-title">العملاء</span>
                        </div>
                    </a>
                @endif

                @if(auth()->user()->is_admin == 1 || in_array('lands', json_decode(auth()->user()->employee_permissions, true) ?? []))
                    <a href="#" class="home-card">
                        <div class="home-card-icon"><img src="{{asset('img/icons/land.png')}}" alt="icon"></div>
                        <div class="home-card-bottom">
                            <span class="home-card-value">{{auth()->user()->company?->lands_count ?? '0'}}</span>
                            <span class="home-card-title">الاراضي</span>
                        </div>
                    </a>
                @endif

                @if(auth()->user()->is_admin == 1 || in_array('tenants', json_decode(auth()->user()->employee_permissions, true) ?? []))
                    <a href="#" class="home-card">
                        <div class="home-card-icon"><img src="{{asset('img/icons/person.png')}}" alt="icon"></div>
                        <div class="home-card-bottom">
                            <span class="home-card-value">{{auth()->user()->company?->tenants_count ?? '0'}}</span>
                            <span class="home-card-title">المستاجرين</span>
                        </div>
                    </a>
                @endif

                @if(auth()->user()->is_admin == 1 || in_array('tenant_contracts', json_decode(auth()->user()->employee_permissions, true) ?? []))
                    <a href="#" class="home-card">
                        <div class="home-card-icon"><img src="{{asset('img/icons/lease.png')}}" alt="icon"></div>
                        <div class="home-card-bottom">
                            <span class="home-card-value">{{auth()->user()->company?->tenant_contracts_count ?? '0'}}</span>
                            <span class="home-card-title">عقود الايجار</span>
                        </div>
                    </a>
                @endif

                @if(auth()->user()->is_admin == 1 || in_array('employees', json_decode(auth()->user()->employee_permissions, true) ?? []))
                    <a href="#" class="home-card">
                        <div class="home-card-icon"><img src="{{asset('img/icons/people.png')}}" alt="icon"></div>
                        <div class="home-card-bottom">
                            <span class="home-card-value">{{auth()->user()->company?->employees_count ?? '0'}}</span>
                            <span class="home-card-title">الموظفين</span>
                        </div>
                    </a>
                @endif

                @if(auth()->user()->is_admin == 1 || in_array('revenue', json_decode(auth()->user()->employee_permissions, true) ?? []))
                    <a href="#" class="home-card">
                        <div class="home-card-icon"><img src="{{asset('img/icons/hu.png')}}" alt="icon"></div>
                        <div class="home-card-bottom">
                            <span class="home-card-value">{{auth()->user()->company?->revenues_count ?? '0'}}</span>
                            <span class="home-card-title">الايرادات</span>
                        </div>
                    </a>
                @endif

                @if(auth()->user()->is_admin == 1 || in_array('expenses', json_decode(auth()->user()->employee_permissions, true) ?? []))
                    <a href="#" class="home-card">
                        <div class="home-card-icon"><img src="{{asset('img/icons/give.png')}}" alt="icon"></div>
                        <div class="home-card-bottom">
                            <span class="home-card-value">{{auth()->user()->company?->expenses_count ?? '0'}}</span>
                            <span class="home-card-title">المصروفات</span>
                        </div>
                    </a>
                @endif

                @if(auth()->user()->is_admin == 1 || in_array('profits', json_decode(auth()->user()->employee_permissions, true) ?? []))
                    <a href="#" class="home-card">
                        <div class="home-card-icon"><img src="{{asset('img/icons/mo.png')}}" alt="icon"></div>
                        <div class="home-card-bottom">
                            <span class="home-card-value">{{auth()->user()->company?->profitsCount ?? '0'}}</span>
                            <span class="home-card-title">الارباح</span>
                        </div>
                    </a>
                @endif

            </section>
        </div>
    </main>
</div>

<!-- Scripts & Success Bars -->
<audio id="sound" src="{{ asset('sounds/eventually-590.mp3') }}"></audio>


@if(session('login'))
    <div id="loginSuccessBar" class="login-success-bar show" style="background: #10b981;">
        <i class="fa-solid fa-circle-check" style="margin-left: 5px;"></i>
        {{ session('login') }}
    </div>
@endif


@if(session('register'))
    <div id="loginSuccessBar" class="login-success-bar show" style="background: #10b981;">
        <i class="fa-solid fa-circle-check" style="margin-left: 5px;"></i>
        {{ session('register') }}
    </div>
@endif


<script>
    // Sidebar toggle for mobile/tablet
    const menuToggle = document.getElementById("menuToggle");
    const sidebar = document.getElementById("sidebar");
    const sidebarOverlay = document.getElementById("sidebarOverlay");

    if (menuToggle && sidebar && sidebarOverlay) {
        menuToggle.addEventListener("click", () => {
            sidebar.classList.add("open");
            sidebarOverlay.classList.add("active");
        });

        // Close sidebar when clicking on overlay
        sidebarOverlay.addEventListener("click", () => {
            sidebar.classList.remove("open");
            sidebarOverlay.classList.remove("active");
        });
    }

    // Profile dropdown
    const profileBtn = document.getElementById("profileBtn");
    const profileMenu = document.getElementById("profileMenu");

    if (profileBtn && profileMenu) {
        profileBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            profileMenu.classList.toggle("show");
        });

        document.addEventListener("click", () => {
            profileMenu.classList.remove("show");
        });

        profileMenu.addEventListener("click", (e) => e.stopPropagation());
    }

    const btnLogout = document.getElementById('btnLogout');
    if (btnLogout) {
        function activateButtonLoader(button){
            const text = button.querySelector('.btn-text');
            const spinner = button.querySelector('.btn-spinner');

            if(text) text.classList.add('d-none');
            if(spinner) spinner.classList.remove('d-none');

            button.style.pointerEvents = "none";
            button.style.opacity = "0.8";
        }

        btnLogout.addEventListener('click', function () {
            activateButtonLoader(btnLogout);
        });
    }

    document.addEventListener("DOMContentLoaded", function () {
        const message = document.getElementById("loginSuccessBar");
        if(message){
            const sound = document.getElementById("sound");
            if(sound){
                sound.play();
            }
        }
    });
</script>

@include('admin.layouts.toast')
</body>
</html>

