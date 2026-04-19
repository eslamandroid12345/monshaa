{{--<!DOCTYPE html>--}}
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
{{--            background: #ffffff;--}}
{{--            margin: 0;--}}
{{--            color: #333;--}}
{{--            font-family: "Cairo", sans-serif;--}}
{{--        }--}}

{{--        /* ============= Layout ============= */--}}
{{--        .layout { display: flex; min-height: 100vh; position: relative; }--}}

{{--        /* ============= Sidebar ============= */--}}
{{--        .sidebar {--}}
{{--            width: 250px;--}}
{{--            background: #3f5063;--}}
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
{{--            background: #3f5063;--}}
{{--            height: 60px;--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            padding: 0 25px;--}}
{{--            position: sticky;--}}
{{--            top: 0;--}}
{{--            z-index: 1000;--}}
{{--        }--}}

{{--        .header-left {--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            gap: 20px;--}}
{{--            margin-right: auto;--}}
{{--        }--}}

{{--        .header-right { display: none; }--}}
{{--        .header-title { display: none; }--}}

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
{{--            min-width: 16px;--}}
{{--            height: 16px;--}}
{{--            padding: 0 4px;--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            justify-content: center;--}}
{{--            border-radius: 10px;--}}
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


{{--        /* ============= Notifications Dropdown ============= */--}}
{{--        .notif-wrap { position: relative; }--}}

{{--        .notif-menu {--}}
{{--            position: absolute;--}}
{{--            left: -10px;--}}
{{--            top: 45px;--}}
{{--            width: 380px;--}}
{{--            background: #fff;--}}
{{--            border-radius: 8px;--}}
{{--            box-shadow: 0 10px 25px rgba(0,0,0,0.15);--}}
{{--            display: none;--}}
{{--            z-index: 1000;--}}
{{--            border: 1px solid #e2e8f0;--}}
{{--            cursor: default;--}}
{{--        }--}}
{{--        .notif-menu.show { display: block; }--}}

{{--        .notif-header {--}}
{{--            padding: 18px 20px 10px;--}}
{{--            background: #f8fafc;--}}
{{--            border-radius: 8px 8px 0 0;--}}
{{--        }--}}
{{--        .notif-header h3 {--}}
{{--            margin: 0;--}}
{{--            font-size: 17px;--}}
{{--            font-weight: 800;--}}
{{--            color: #334155;--}}
{{--        }--}}

{{--        .notif-tabs {--}}
{{--            display: flex;--}}
{{--            padding: 10px 20px 15px;--}}
{{--            background: #f8fafc;--}}
{{--            gap: 10px;--}}
{{--            border-bottom: 1px solid #e2e8f0;--}}
{{--        }--}}
{{--        .notif-tab {--}}
{{--            flex: 1;--}}
{{--            padding: 8px;--}}
{{--            border-radius: 6px;--}}
{{--            border: none;--}}
{{--            background: #e2e8f0;--}}
{{--            font-family: inherit;--}}
{{--            font-size: 14px;--}}
{{--            font-weight: 800;--}}
{{--            color: #475569;--}}
{{--            cursor: pointer;--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            justify-content: center;--}}
{{--            gap: 8px;--}}
{{--            transition: all 0.2s;--}}
{{--        }--}}
{{--        .notif-tab.active {--}}
{{--            background: #025043;--}}
{{--            color: #fff;--}}
{{--        }--}}

{{--        .notif-tab-badge {--}}
{{--            background: #ef4444;--}}
{{--            color: #fff;--}}
{{--            font-size: 11px;--}}
{{--            padding: 2px 7px;--}}
{{--            border-radius: 20px;--}}
{{--            font-weight: 800;--}}
{{--            line-height: 1;--}}
{{--        }--}}

{{--        .notif-body {--}}
{{--            max-height: 400px;--}}
{{--            overflow-y: auto;--}}
{{--            padding: 15px;--}}
{{--            background: #fff;--}}
{{--            border-radius: 0 0 8px 8px;--}}
{{--        }--}}

{{--        .notif-body::-webkit-scrollbar { width: 5px; }--}}
{{--        .notif-body::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 5px; }--}}

{{--        .notif-card {--}}
{{--            border: 1px solid #f1f5f9;--}}
{{--            border-radius: 8px;--}}
{{--            padding: 15px;--}}
{{--            margin-bottom: 12px;--}}
{{--            background: #fff;--}}
{{--            box-shadow: 0 2px 6px rgba(0,0,0,0.03);--}}
{{--            transition: border-color 0.2s;--}}
{{--        }--}}
{{--        .notif-card:hover { border-color: #cbd5e1; }--}}
{{--        .notif-card:last-child { margin-bottom: 0; }--}}

{{--        .notif-card-header {--}}
{{--            display: flex;--}}
{{--            justify-content: space-between;--}}
{{--            align-items: flex-start;--}}
{{--            margin-bottom: 6px;--}}
{{--        }--}}

{{--        .notif-card-title {--}}
{{--            font-size: 14px;--}}
{{--            font-weight: 800;--}}
{{--            color: #334155;--}}
{{--            line-height: 1.4;--}}
{{--        }--}}

{{--        .notif-status-badge {--}}
{{--            background: #e0e7ff;--}}
{{--            color: #4f46e5;--}}
{{--            font-size: 11px;--}}
{{--            font-weight: 800;--}}
{{--            padding: 3px 8px;--}}
{{--            border-radius: 20px;--}}
{{--            white-space: nowrap;--}}
{{--        }--}}

{{--        .notif-card-desc {--}}
{{--            font-size: 13px;--}}
{{--            color: #64748b;--}}
{{--            margin-bottom: 12px;--}}
{{--            line-height: 1.5;--}}
{{--            font-weight: 600;--}}
{{--        }--}}

{{--        .notif-card-actions {--}}
{{--            display: flex;--}}
{{--            gap: 10px;--}}
{{--            margin-bottom: 12px;--}}
{{--        }--}}

{{--        .notif-btn {--}}
{{--            display: inline-flex;--}}
{{--            align-items: center;--}}
{{--            gap: 6px;--}}
{{--            padding: 6px 14px;--}}
{{--            border-radius: 6px;--}}
{{--            font-size: 11px;--}}
{{--            font-weight: 800;--}}
{{--            text-decoration: none !important;--}}
{{--            color: #fff !important;--}}
{{--            transition: opacity 0.2s;--}}
{{--            border: none;--}}
{{--        }--}}
{{--        .notif-btn:hover { opacity: 0.85; }--}}
{{--        .btn-word { background: #55a0ff; }--}}
{{--        .btn-pdf { background: #ff6b6b; }--}}

{{--        .notif-card-time {--}}
{{--            font-size: 12px;--}}
{{--            color: #94a3b8;--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            gap: 6px;--}}
{{--            font-weight: 600;--}}
{{--        }--}}


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

{{--        /* ============= Media Queries for Tablet/Mobile ============= */--}}
{{--        .mobile-only { display: none !important; }--}}
{{--        .mobile-only-block { display: none !important; }--}}

{{--        @media (max-width: 1200px) { .home-grid { grid-template-columns: repeat(3, 1fr); } }--}}

{{--        @media (max-width: 991px) {--}}
{{--            .top-header { padding: 0 15px; justify-content: space-between; }--}}
{{--            .header-right { display: block; margin-right: 0; }--}}
{{--            .menu-toggle {--}}
{{--                background: transparent;--}}
{{--                border: none;--}}
{{--                color: #fff;--}}
{{--                font-size: 22px;--}}
{{--                cursor: pointer;--}}
{{--                padding: 0;--}}
{{--                display: flex;--}}
{{--                align-items: center;--}}
{{--            }--}}
{{--            .header-title {--}}
{{--                display: block;--}}
{{--                position: absolute;--}}
{{--                left: 50%;--}}
{{--                transform: translateX(-50%);--}}
{{--                color: #fff;--}}
{{--                font-size: 16px;--}}
{{--                font-weight: 700;--}}
{{--            }--}}
{{--            .header-left { margin-right: 0; gap: 15px; }--}}
{{--            .desktop-only { display: none !important; }--}}
{{--            .mobile-only { display: flex !important; }--}}
{{--            .mobile-only-block { display: block !important; }--}}

{{--            /* Sidebar Off-canvas */--}}
{{--            .sidebar {--}}
{{--                position: fixed;--}}
{{--                right: -260px;--}}
{{--                top: 0;--}}
{{--                bottom: 0;--}}
{{--                z-index: 1050;--}}
{{--                transition: right 0.3s ease;--}}
{{--                box-shadow: -5px 0 15px rgba(0,0,0,0.1);--}}
{{--            }--}}
{{--            .sidebar.open { right: 0; }--}}

{{--            .sidebar-overlay {--}}
{{--                position: fixed;--}}
{{--                inset: 0;--}}
{{--                background: rgba(0,0,0,0.4);--}}
{{--                z-index: 1040;--}}
{{--                opacity: 0;--}}
{{--                visibility: hidden;--}}
{{--                transition: 0.3s ease;--}}
{{--            }--}}
{{--            .sidebar-overlay.active {--}}
{{--                opacity: 1;--}}
{{--                visibility: visible;--}}
{{--            }--}}
{{--        }--}}

{{--        @media (max-width: 768px) {--}}
{{--            /* Force 2 columns maximum on mobile/tablet */--}}
{{--            .home-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }--}}
{{--            .content-area { padding: 15px; }--}}
{{--            .home-card { height: 115px; padding: 15px 12px 12px; }--}}
{{--            .home-card-icon img { height: 38px; }--}}
{{--            .home-card-icon i { font-size: 34px; }--}}
{{--            .home-card-bottom { margin-top: 10px; }--}}
{{--            .home-card-title { font-size: 13px; }--}}
{{--            .home-card-value { font-size: 15px; }--}}
{{--        }--}}

{{--        @media (max-width: 480px) {--}}
{{--            .home-grid { gap: 10px; }--}}
{{--            .home-card { height: 110px; padding: 12px 10px; }--}}
{{--            .home-card-icon img { height: 35px; }--}}
{{--            .home-card-title { font-size: 12px; }--}}
{{--            .home-card-value { font-size: 14px; }--}}
{{--            .notif-menu { width: calc(100vw - 30px); left: -60px; }--}}
{{--        }--}}

{{--    </style>--}}
{{--</head>--}}

{{--<body>--}}
{{--<div class="layout" id="layout">--}}

{{--    <!-- Mobile Sidebar Overlay -->--}}
{{--    <div class="sidebar-overlay" id="sidebarOverlay"></div>--}}

{{--    <!-- Sidebar -->--}}
{{--    <aside class="sidebar" id="sidebar">--}}
{{--        <div class="sidebar-header">--}}
{{--            <div class="user-avatar">--}}
{{--                <img src="{{ asset(auth()->user()->company?->logo) }}">--}}
{{--            </div>--}}
{{--            <div class="user-info">--}}
{{--                <div class="user-name">{{ auth()->user()->company?->company_name }}</div>--}}
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

{{--            <!-- Mobile Only Profile & Logout -->--}}
{{--            <hr class="mobile-only-block" style="border-color: rgba(255,255,255,0.08); margin: 10px 20px;">--}}
{{--            <a href="#" class="nav-item mobile-only">--}}
{{--                <i class="fa-solid fa-id-card"></i>--}}
{{--                <span>الملف الشخصي</span>--}}
{{--            </a>--}}
{{--            <a id="btnLogoutMobile" href="{{route('admin.logout')}}" class="nav-item mobile-only" style="color: #ef4444;">--}}
{{--                <i class="fa-solid fa-arrow-right-from-bracket"></i>--}}
{{--                <span class="btn-text">تسجيل الخروج</span>--}}
{{--                <span class="btn-spinner d-none">--}}
{{--                    <span class="spinner-border spinner-border-sm"></span>--}}
{{--                </span>--}}
{{--            </a>--}}
{{--        </nav>--}}
{{--    </aside>--}}

{{--    <!-- Main -->--}}
{{--    <main class="main-wrapper">--}}

{{--        <!-- Top Header -->--}}
{{--        <header class="top-header">--}}
{{--            <!-- Mobile Right Icon (Hamburger) -->--}}
{{--            <div class="header-right">--}}
{{--                <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">--}}
{{--                    <i class="fa-solid fa-bars"></i>--}}
{{--                </button>--}}
{{--            </div>--}}

{{--            <!-- Title in center (Visible only on mobile/tablet) -->--}}
{{--            <div class="header-title">الرئيسية</div>--}}

{{--            <!-- LEFT ACTIONS (RTL) -->--}}
{{--            <div class="header-left">--}}
{{--                <a href="#" class="header-icon">--}}
{{--                    <i class="fa-regular fa-message"></i>--}}
{{--                </a>--}}

{{--                <!-- Notification Dropdown -->--}}
{{--                <div class="notif-wrap">--}}
{{--                    <div class="header-icon" id="notifBtn" style="cursor: pointer;">--}}
{{--                        <i class="fa-regular fa-bell"></i>--}}
{{--                        <span class="header-badge">+99</span>--}}
{{--                    </div>--}}

{{--                    <div class="notif-menu" id="notifMenu">--}}
{{--                        <div class="notif-header">--}}
{{--                            <h3>الإشعارات</h3>--}}
{{--                        </div>--}}
{{--                        <div class="notif-tabs">--}}
{{--                            <button class="notif-tab active">--}}
{{--                                غير مقروءة <span class="notif-tab-badge">+99</span>--}}
{{--                            </button>--}}
{{--                            <button class="notif-tab">الكل</button>--}}
{{--                        </div>--}}
{{--                        <div class="notif-body">--}}

{{--                            <!-- Notif Card 1 -->--}}
{{--                            <div class="notif-card">--}}
{{--                                <div class="notif-card-header">--}}
{{--                                    <div class="notif-card-title">تم إنشاء تقرير RD0 بنجاح</div>--}}
{{--                                    <span class="notif-status-badge">جديد</span>--}}
{{--                                </div>--}}
{{--                                <div class="notif-card-desc">--}}
{{--                                    تم إنشاء تقرير RD0 للمشروع رقم 100280 وهو جاهز للتحميل--}}
{{--                                </div>--}}
{{--                                <div class="notif-card-actions">--}}
{{--                                    <a href="#" class="notif-btn btn-word"><i class="fa-solid fa-file-word"></i> WORD</a>--}}
{{--                                    <a href="#" class="notif-btn btn-pdf"><i class="fa-solid fa-file-pdf"></i> PDF</a>--}}
{{--                                </div>--}}
{{--                                <div class="notif-card-time">--}}
{{--                                    <i class="fa-regular fa-clock"></i> 14/4/2026, 9:53:43 ص--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!-- Notif Card 2 -->--}}
{{--                            <div class="notif-card">--}}
{{--                                <div class="notif-card-header">--}}
{{--                                    <div class="notif-card-title">تم إنشاء تقرير الفحص بنجاح</div>--}}
{{--                                    <span class="notif-status-badge">جديد</span>--}}
{{--                                </div>--}}
{{--                                <div class="notif-card-desc">--}}
{{--                                    تم إنشاء تقرير الفحص للمشروع رقم 100199 وهو جاهز للتحميل--}}
{{--                                </div>--}}
{{--                                <div class="notif-card-actions">--}}
{{--                                    <a href="#" class="notif-btn btn-word"><i class="fa-solid fa-file-word"></i> WORD</a>--}}
{{--                                    <a href="#" class="notif-btn btn-pdf"><i class="fa-solid fa-file-pdf"></i> PDF</a>--}}
{{--                                </div>--}}
{{--                                <div class="notif-card-time">--}}
{{--                                    <i class="fa-regular fa-clock"></i> 13/4/2026, 4:27:57 م--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!-- Notif Card 3 -->--}}
{{--                            <div class="notif-card">--}}
{{--                                <div class="notif-card-header">--}}
{{--                                    <div class="notif-card-title">تم إنشاء تقرير الفحص بنجاح</div>--}}
{{--                                    <span class="notif-status-badge">جديد</span>--}}
{{--                                </div>--}}
{{--                                <div class="notif-card-desc">--}}
{{--                                    تم إنشاء تقرير الفحص للمشروع رقم 100190 وهو جاهز للتحميل--}}
{{--                                </div>--}}
{{--                                <div class="notif-card-actions">--}}
{{--                                    <a href="#" class="notif-btn btn-word"><i class="fa-solid fa-file-word"></i> WORD</a>--}}
{{--                                    <a href="#" class="notif-btn btn-pdf"><i class="fa-solid fa-file-pdf"></i> PDF</a>--}}
{{--                                </div>--}}
{{--                                <div class="notif-card-time">--}}
{{--                                    <i class="fa-regular fa-clock"></i> 13/4/2026, 4:20:00 م--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Profile dropdown (Hidden on mobile) -->--}}
{{--                <div class="profile-wrap desktop-only">--}}
{{--                    <img src="{{ asset(auth()->user()->employee_image) }}" class="top-user-avatar" id="profileBtn" alt="User">--}}

{{--                    <div class="profile-menu" id="profileMenu">--}}
{{--                        <a class="profile-item" href="#">--}}
{{--                            <i class="fa-solid fa-gear"></i>--}}
{{--                            <span>الإعدادات</span>--}}
{{--                        </a>--}}
{{--                        <a class="profile-item" href="#">--}}
{{--                            <i class="fa-solid fa-id-card"></i>--}}
{{--                            <span>الملف الشخصي</span>--}}
{{--                        </a>--}}
{{--                        <hr style="border-color:rgba(15,23,42,.08);margin:5px 0;">--}}
{{--                        <a id="btnLogout" class="profile-item danger" href="{{route('admin.logout')}}">--}}
{{--                            <i class="fa-solid fa-arrow-right-from-bracket"></i>--}}
{{--                            <span class="btn-text">تسجيل الخروج</span>--}}
{{--                            <span class="btn-spinner d-none">--}}
{{--                                <span class="spinner-border spinner-border-sm"></span>--}}
{{--                            </span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
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

{{--<!-- Scripts & Success Bars -->--}}
{{--<audio id="sound" src="{{ asset('sounds/eventually-590.mp3') }}"></audio>--}}

{{--@if(session('login'))--}}
{{--    <div id="loginSuccessBar" class="login-success-bar show">--}}
{{--        <i class="fa-solid fa-circle-check" style="margin-left: 5px;"></i>--}}
{{--        {{ session('login') }}--}}
{{--    </div>--}}
{{--@endif--}}

{{--@if(session('register'))--}}
{{--    <div id="loginSuccessBar" class="login-success-bar show">--}}
{{--        <i class="fa-solid fa-circle-check" style="margin-left: 5px;"></i>--}}
{{--        {{ session('register') }}--}}
{{--    </div>--}}
{{--@endif--}}

{{--<script>--}}
{{--    // Sidebar toggle for mobile/tablet--}}
{{--    const menuToggle = document.getElementById("menuToggle");--}}
{{--    const sidebar = document.getElementById("sidebar");--}}
{{--    const sidebarOverlay = document.getElementById("sidebarOverlay");--}}

{{--    if (menuToggle && sidebar && sidebarOverlay) {--}}
{{--        menuToggle.addEventListener("click", () => {--}}
{{--            sidebar.classList.add("open");--}}
{{--            sidebarOverlay.classList.add("active");--}}
{{--        });--}}

{{--        // Close sidebar when clicking on overlay--}}
{{--        sidebarOverlay.addEventListener("click", () => {--}}
{{--            sidebar.classList.remove("open");--}}
{{--            sidebarOverlay.classList.remove("active");--}}
{{--        });--}}
{{--    }--}}

{{--    // Profile dropdown--}}
{{--    const profileBtn = document.getElementById("profileBtn");--}}
{{--    const profileMenu = document.getElementById("profileMenu");--}}
{{--    const notifBtn = document.getElementById("notifBtn");--}}
{{--    const notifMenu = document.getElementById("notifMenu");--}}

{{--    if (profileBtn && profileMenu) {--}}
{{--        profileBtn.addEventListener("click", (e) => {--}}
{{--            e.stopPropagation();--}}
{{--            profileMenu.classList.toggle("show");--}}

{{--            // Close notif menu if open--}}
{{--            if(notifMenu) notifMenu.classList.remove("show");--}}
{{--        });--}}

{{--        profileMenu.addEventListener("click", (e) => e.stopPropagation());--}}
{{--    }--}}

{{--    // Notifications dropdown--}}
{{--    if(notifBtn && notifMenu) {--}}
{{--        notifBtn.addEventListener("click", (e) => {--}}
{{--            e.stopPropagation();--}}
{{--            notifMenu.classList.toggle("show");--}}

{{--            // Close profile menu if open--}}
{{--            if(profileMenu) profileMenu.classList.remove("show");--}}
{{--        });--}}

{{--        notifMenu.addEventListener("click", (e) => e.stopPropagation());--}}
{{--    }--}}

{{--    // Close all menus when clicking anywhere outside--}}
{{--    document.addEventListener("click", () => {--}}
{{--        if(profileMenu) profileMenu.classList.remove("show");--}}
{{--        if(notifMenu) notifMenu.classList.remove("show");--}}
{{--    });--}}


{{--    // Logout Loading behaviour--}}
{{--    const btnLogout = document.getElementById('btnLogout');--}}
{{--    const btnLogoutMobile = document.getElementById('btnLogoutMobile');--}}

{{--    function activateButtonLoader(button){--}}
{{--        if(!button) return;--}}
{{--        const text = button.querySelector('.btn-text');--}}
{{--        const spinner = button.querySelector('.btn-spinner');--}}

{{--        if(text) text.classList.add('d-none');--}}
{{--        if(spinner) spinner.classList.remove('d-none');--}}

{{--        button.style.pointerEvents = "none";--}}
{{--        button.style.opacity = "0.8";--}}
{{--    }--}}

{{--    if (btnLogout) {--}}
{{--        btnLogout.addEventListener('click', function () {--}}
{{--            activateButtonLoader(btnLogout);--}}
{{--        });--}}
{{--    }--}}

{{--    if (btnLogoutMobile) {--}}
{{--        btnLogoutMobile.addEventListener('click', function () {--}}
{{--            activateButtonLoader(btnLogoutMobile);--}}
{{--        });--}}
{{--    }--}}

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
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('css/admin/toast.css')}}" />

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
            width: 240px;
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
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            overflow: hidden;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .user-avatar img { width: 100%; height: 100%; object-fit: cover; }

        .user-info .user-name { font-weight: 600; font-size: 14px; line-height: 1.3; }
        .user-info .user-role { font-size: 12px; color: #cbd5e1; }

        .sidebar-nav { display: flex; flex-direction: column; padding: 10px 0; }

        .nav-item {
            display: flex; align-items: center; gap: 12px;
            padding: 11px 18px;
            color: #cbd5e1;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: background 0.2s, color 0.2s;
        }
        .nav-item:hover, .nav-item.active {
            background: rgba(255,255,255,.05);
            color: #fff;
        }
        .nav-item i { width: 18px; text-align: center; font-size: 14px; }

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
            margin-right: auto;
        }

        .header-right { display: none; }
        .header-title { display: none; }

        .header-icon {
            color: #cbd5e1;
            font-size: 18px;
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
            min-width: 16px;
            height: 16px;
            padding: 0 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
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

        /* ============= Notifications Dropdown ============= */
        .notif-wrap { position: relative; }

        .notif-menu {
            position: absolute;
            left: -10px;
            top: 45px;
            width: 380px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            display: none;
            z-index: 1000;
            border: 1px solid #e2e8f0;
            cursor: default;
        }
        .notif-menu.show { display: block; }

        .notif-header {
            padding: 18px 20px 10px;
            background: #f8fafc;
            border-radius: 8px 8px 0 0;
        }
        .notif-header h3 {
            margin: 0;
            font-size: 15px;
            font-weight: 800;
            color: #334155;
        }

        .notif-tabs {
            display: flex;
            padding: 10px 20px 15px;
            background: #f8fafc;
            gap: 10px;
            border-bottom: 1px solid #e2e8f0;
        }
        .notif-tab {
            flex: 1;
            padding: 8px;
            border-radius: 6px;
            border: none;
            background: #e2e8f0;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            color: #475569;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s;
        }
        .notif-tab.active {
            background: #025043;
            color: #fff;
        }

        .notif-tab-badge {
            background: #ef4444;
            color: #fff;
            font-size: 11px;
            padding: 2px 7px;
            border-radius: 20px;
            font-weight: 800;
            line-height: 1;
        }

        .notif-body {
            max-height: 400px;
            overflow-y: auto;
            padding: 15px;
            background: #fff;
            border-radius: 0 0 8px 8px;
        }

        .notif-body::-webkit-scrollbar { width: 5px; }
        .notif-body::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 5px; }

        .notif-card {
            border: 1px solid #f1f5f9;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 12px;
            background: #fff;
            box-shadow: 0 2px 6px rgba(0,0,0,0.03);
            transition: border-color 0.2s;
        }
        .notif-card:hover { border-color: #cbd5e1; }
        .notif-card:last-child { margin-bottom: 0; }

        .notif-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 6px;
        }

        .notif-card-title {
            font-size: 14px;
            font-weight: 800;
            color: #334155;
            line-height: 1.4;
        }

        .notif-status-badge {
            background: #e0e7ff;
            color: #4f46e5;
            font-size: 11px;
            font-weight: 800;
            padding: 3px 8px;
            border-radius: 20px;
            white-space: nowrap;
        }

        .notif-card-desc {
            font-size: 13px;
            color: #64748b;
            margin-bottom: 12px;
            line-height: 1.5;
            font-weight: 600;
        }

        .notif-card-actions {
            display: flex;
            gap: 10px;
            margin-bottom: 12px;
        }

        .notif-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 800;
            text-decoration: none !important;
            color: #fff !important;
            transition: opacity 0.2s;
            border: none;
        }
        .notif-btn:hover { opacity: 0.85; }
        .btn-word { background: #55a0ff; }
        .btn-pdf { background: #ff6b6b; }

        .notif-card-time {
            font-size: 12px;
            color: #94a3b8;
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
        }

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
            border: 1px solid #e1e5ea;
            border-radius: 4px;
            padding: 16px 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 115px;
            text-decoration: none;
            color: #3f5063;
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
            height: 38px;
            max-width: 100%;
            object-fit: contain;
            opacity: 0.85;
        }

        .home-card-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            flex-direction: row-reverse;
        }

        .home-card-title {
            font-size: 14px;
            font-weight: 600;
            color: #3f5063;
        }

        .home-card-value {
            font-size: 14px;
            font-weight: 500;
            color: #3f5063;
        }

        /* ============= Media Queries for Tablet/Mobile ============= */
        .mobile-only { display: none !important; }
        .mobile-only-block { display: none !important; }

        @media (max-width: 1200px) { .home-grid { grid-template-columns: repeat(3, 1fr); } }

        @media (max-width: 991px) {
            .charts-grid { grid-template-columns: 1fr; }
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
            .desktop-only { display: none !important; }
            .mobile-only { display: flex !important; }
            .mobile-only-block { display: block !important; }

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

            <!-- Mobile Only Profile & Logout -->
            <hr class="mobile-only-block" style="border-color: rgba(255,255,255,0.08); margin: 10px 20px;">
            <a href="#" class="nav-item mobile-only">
                <i class="fa-solid fa-id-card"></i>
                <span>الملف الشخصي</span>
            </a>
            <a id="btnLogoutMobile" href="{{route('admin.logout')}}" class="nav-item mobile-only" style="color: #ef4444;">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span class="btn-text">تسجيل الخروج</span>
                <span class="btn-spinner d-none">
                    <span class="spinner-border spinner-border-sm"></span>
                </span>
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

                <!-- Notification Dropdown -->
                <div class="notif-wrap">
                    <div class="header-icon" id="notifBtn" style="cursor: pointer;">
                        <i class="fa-regular fa-bell"></i>
                        <span class="header-badge" id="unreadBadgeCount">+99</span>
                    </div>

                    <div class="notif-menu" id="notifMenu">
                        <div class="notif-header">
                            <h3>الإشعارات</h3>
                        </div>
                        <div class="notif-tabs" id="notifTabsContainer">
                            <button class="notif-tab active" data-tab="unread">
                                غير مقروءة <span class="notif-tab-badge">+99</span>
                            </button>
                            <button class="notif-tab" data-tab="all">الكل</button>
                        </div>
                        <div class="notif-body">

                            <!-- Notif Card 1 (Unread) -->
                            <div class="notif-card" data-status="unread">
                                <div class="notif-card-header">
                                    <div class="notif-card-title">اشعار جديد لديك</div>
                                    <span class="notif-status-badge">جديد</span>
                                </div>
                                <div class="notif-card-desc">
                                    تم اضافه بيانات عقار جديد لديك بواسطه دنيا ذكي متولي ذكي
                                </div>
{{--                                <div class="notif-card-actions">--}}
{{--                                    <a href="#" class="notif-btn btn-word"><i class="fa-solid fa-file-word"></i> WORD</a>--}}
{{--                                    <a href="#" class="notif-btn btn-pdf"><i class="fa-solid fa-file-pdf"></i> PDF</a>--}}
{{--                                </div>--}}
                                <div class="notif-card-time">
                                    <i class="fa-regular fa-clock"></i> 14/4/2026, 9:53:43 ص
                                </div>
                            </div>

                            <!-- Notif Card 2 (Unread) -->
                            <div class="notif-card" data-status="unread">
                                <div class="notif-card-header">
                                    <div class="notif-card-title">اشعار جديد لديك</div>
                                    <span class="notif-status-badge">جديد</span>
                                </div>
                                <div class="notif-card-desc">
                                    تم اضافه عميل لمعاينه لديك بواسطه Ehab Elalami
                                </div>
{{--                                <div class="notif-card-actions">--}}
{{--                                    <a href="#" class="notif-btn btn-word"><i class="fa-solid fa-file-word"></i> WORD</a>--}}
{{--                                    <a href="#" class="notif-btn btn-pdf"><i class="fa-solid fa-file-pdf"></i> PDF</a>--}}
{{--                                </div>--}}
                                <div class="notif-card-time">
                                    <i class="fa-regular fa-clock"></i> 13/4/2026, 4:27:57 م
                                </div>
                            </div>

                            <!-- Notif Card 3 (Read) -->
                            <div class="notif-card read-status" data-status="read" style="display: none;">
                                <div class="notif-card-header">
                                    <div class="notif-card-title">اشعار جديد لديك</div>
                                </div>
                                <div class="notif-card-desc">
                                    تم اضافه بيانات عقار جديد لديك بواسطه محمد السيد
                                </div>
{{--                                <div class="notif-card-actions">--}}
{{--                                    <a href="#" class="notif-btn btn-word"><i class="fa-solid fa-file-word"></i> WORD</a>--}}
{{--                                    <a href="#" class="notif-btn btn-pdf"><i class="fa-solid fa-file-pdf"></i> PDF</a>--}}
{{--                                </div>--}}
                                <div class="notif-card-time">
                                    <i class="fa-regular fa-clock"></i> 13/4/2026, 4:20:00 م
                                </div>
                            </div>

                            <!-- Notif Card 4 (Read) -->
                            <div class="notif-card read-status" data-status="read" style="display: none;">
                                <div class="notif-card-header">
                                    <div class="notif-card-title">اشعار جديد لديك</div>
                                </div>
                                <div class="notif-card-desc">
                                    تذكير مهم للموظف Ehab Elalami لديك معاينة اليوم مع العميل أيه الساعة 14:2
                                </div>
                                <div class="notif-card-time">
                                    <i class="fa-regular fa-clock"></i> 12/4/2026, 11:15:00 ص
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

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
    <div id="loginSuccessBar" class="login-success-bar show">
        <i class="fa-solid fa-circle-check" style="margin-left: 5px;"></i>
        {{ session('login') }}
    </div>
@endif

@if(session('register'))
    <div id="loginSuccessBar" class="login-success-bar show">
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

    // Profile & Notifications dropdowns
    const profileBtn = document.getElementById("profileBtn");
    const profileMenu = document.getElementById("profileMenu");
    const notifBtn = document.getElementById("notifBtn");
    const notifMenu = document.getElementById("notifMenu");

    if (profileBtn && profileMenu) {
        profileBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            profileMenu.classList.toggle("show");
            if(notifMenu) notifMenu.classList.remove("show");
        });
        profileMenu.addEventListener("click", (e) => e.stopPropagation());
    }

    if (notifBtn && notifMenu) {
        notifBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            notifMenu.classList.toggle("show");
            if(profileMenu) profileMenu.classList.remove("show");
        });
        notifMenu.addEventListener("click", (e) => e.stopPropagation());
    }

    document.addEventListener("click", () => {
        if(profileMenu) profileMenu.classList.remove("show");
        if(notifMenu) notifMenu.classList.remove("show");
    });

    const btnLogout = document.getElementById('btnLogout');
    const btnLogoutMobile = document.getElementById('btnLogoutMobile');

    function activateButtonLoader(button){
        if(!button) return;
        const text = button.querySelector('.btn-text');
        const spinner = button.querySelector('.btn-spinner');

        if(text) text.classList.add('d-none');
        if(spinner) spinner.classList.remove('d-none');

        button.style.pointerEvents = "none";
        button.style.opacity = "0.8";
    }

    if (btnLogout) {
        btnLogout.addEventListener('click', function () {
            activateButtonLoader(btnLogout);
        });
    }

    if (btnLogoutMobile) {
        btnLogoutMobile.addEventListener('click', function () {
            activateButtonLoader(btnLogoutMobile);
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

        // ================= Notifications Tabs Logic =================
        const tabs = document.querySelectorAll('#notifTabsContainer .notif-tab');
        const notifCards = document.querySelectorAll('.notif-body .notif-card');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                const targetType = tab.getAttribute('data-tab'); // 'unread' or 'all'

                notifCards.forEach(card => {
                    if(targetType === 'all') {
                        card.style.display = 'block';
                    } else { // 'unread'
                        if(card.getAttribute('data-status') === 'unread') {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    }
                });
            });
        });
    });

</script>

@include('admin.layouts.toast')
</body>
</html>
