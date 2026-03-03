<!-- Topbar -->
<div class="topbar">
    <div class="wrap">

        <a class="brand" href="{{route('welcome')}}">
            <span class="logo"><i class="fa-solid fa-house"></i></span>
            <span>عقارك</span>
        </a>

        <!-- زر الموبايل -->
        <div class="menu-toggle" id="menuToggle">
            <i class="fa-solid fa-bars"></i>
        </div>

        <div class="top-actions" id="topMenu">
            <a href="#">للبيع</a>
            <a href="#">للإيجار</a>
            <a href="#">مشاريع</a>
            <a href="#">خدمات</a>
            <a class="btn btn-sm btn-outline-secondary"
               href="{{route('login.view')}}"
               style="border-radius:12px;font-weight:800;">
                تسجيل الدخول
            </a>
        </div>

    </div>
</div>
