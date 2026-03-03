<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>عقارك | ابحث عن عقار</title>

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/client/welcome.css') }}">


</head>

<body>

@include('client.layouts.header')


<section class="hero-advanced">
    <div class="hero-overlay"></div>

    <div class="container hero-content">
        <h1>ابحث عن العقار المناسب بسهولة</h1>
        <p>فلترة سريعة، نتائج دقيقة، وتواصل مباشر — ابدأ البحث الآن.</p>

        <div class="search-box-advanced">
            <div class="search-row">
                <input class="form-control" placeholder="ابحث بالمكان ...">
                <input class="form-control" placeholder="السعر من ...">
                <input class="form-control" placeholder="السعر الي ...">
                <input class="form-control" placeholder="المساحه">
                <input class="form-control" placeholder="عدد الحمامات">
                <input class="form-control" placeholder="عدد الغرف">

                <select class="form-select">
                    <option selected>نوع العملية</option>
                    <option>للبيع</option>
                    <option>للإيجار</option>
                </select>

                <select class="form-select">
                    <option selected>نوع العقار</option>
                    <option>شقة فارغه</option>
                    <option>شقة مفروشه</option>
                    <option>فيلا فارغه</option>
                    <option>فيلا مفروشه</option>
                    <option>مكتب اداري فارغ</option>
                    <option>مكتب اداري مفروش</option>
                    <option>محل</option>
                </select>

                <button class="search-btn">
                    <i class="fa-solid fa-magnifying-glass me-2"></i>
                    بحث
                </button>
            </div>
        </div>
    </div>
</section>


<!-- Content -->
<main class="page">
    <!-- Cards -->
    <section class="grid">
        <a class="prop-card" href="#">
            <div class="prop-img">
                <span class="badge-float">للبيع</span>
                <img src="https://images.unsplash.com/photo-1523217582562-09d0def993a6?q=80&w=1200&auto=format&fit=crop" alt="">
            </div>
            <div class="prop-body">
                <p class="prop-title">شقة للبيع – التجمع الخامس</p>
                <div class="prop-meta">
                    <span><i class="fa-solid fa-location-dot"></i> القاهرة الجديدة</span>
                    <span><i class="fa-solid fa-bed"></i> 3 غرف</span>
                    <span><i class="fa-solid fa-maximize"></i> 160 م²</span>
                </div>
                <div class="prop-price">
                    <span class="price">3,250,000 ج.م</span>
                    <span class="cta">عرض التفاصيل <i class="fa-solid fa-arrow-left-long"></i></span>
                </div>
            </div>
        </a>

        <a class="prop-card" href="#">
            <div class="prop-img">
                <span class="badge-float">للإيجار</span>
                <img src="https://images.unsplash.com/photo-1502005229762-cf1b2da7c5d6?q=80&w=1200&auto=format&fit=crop" alt="">
            </div>
            <div class="prop-body">
                <p class="prop-title">فيلا للإيجار – الشيخ زايد</p>
                <div class="prop-meta">
                    <span><i class="fa-solid fa-location-dot"></i> الجيزة</span>
                    <span><i class="fa-solid fa-bed"></i> 5 غرف</span>
                    <span><i class="fa-solid fa-maximize"></i> 420 م²</span>
                </div>
                <div class="prop-price">
                    <span class="price">70,000 ج.م / شهر</span>
                    <span class="cta">عرض التفاصيل <i class="fa-solid fa-arrow-left-long"></i></span>
                </div>
            </div>
        </a>

        <a class="prop-card" href="#">
            <div class="prop-img">
                <span class="badge-float">للبيع</span>
                <img src="https://images.unsplash.com/photo-1523217582562-09d0def993a6?q=80&w=1200&auto=format&fit=crop" alt="">
            </div>
            <div class="prop-body">
                <p class="prop-title">أرض للبيع – الساحل الشمالي</p>
                <div class="prop-meta">
                    <span><i class="fa-solid fa-location-dot"></i> مطروح</span>
                    <span><i class="fa-solid fa-layer-group"></i> أرض</span>
                    <span><i class="fa-solid fa-maximize"></i> 600 م²</span>
                </div>
                <div class="prop-price">
                    <span class="price">5,800,000 ج.م</span>
                    <span class="cta">عرض التفاصيل <i class="fa-solid fa-arrow-left-long"></i></span>
                </div>
            </div>
        </a>
    </section>

    <!-- Featured -->
    <h3 class="sec-title">عقارات مميزة</h3>
    <section class="grid">
        <a class="prop-card" href="#">
            <div class="prop-img">
                <span class="badge-float">حصري</span>
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1200&auto=format&fit=crop" alt="">
            </div>
            <div class="prop-body">
                <p class="prop-title">شقة فاخرة – مدينتي</p>
                <div class="prop-meta">
                    <span><i class="fa-solid fa-location-dot"></i> القاهرة</span>
                    <span><i class="fa-solid fa-bed"></i> 4 غرف</span>
                    <span><i class="fa-solid fa-maximize"></i> 210 م²</span>
                </div>
                <div class="prop-price">
                    <span class="price">4,900,000 ج.م</span>
                    <span class="cta">عرض التفاصيل</span>
                </div>
            </div>
        </a>

        <a class="prop-card" href="#">
            <div class="prop-img">
                <span class="badge-float">جديد</span>
                <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?q=80&w=1200&auto=format&fit=crop" alt="">
            </div>
            <div class="prop-body">
                <p class="prop-title">فيلا – العاصمة الإدارية</p>
                <div class="prop-meta">
                    <span><i class="fa-solid fa-location-dot"></i> القاهرة</span>
                    <span><i class="fa-solid fa-bed"></i> 5 غرف</span>
                    <span><i class="fa-solid fa-maximize"></i> 450 م²</span>
                </div>
                <div class="prop-price">
                    <span class="price">9,800,000 ج.م</span>
                    <span class="cta">عرض التفاصيل</span>
                </div>
            </div>
        </a>

        <a class="prop-card" href="#">
            <div class="prop-img">
                <span class="badge-float">أفضل سعر</span>
                <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?q=80&w=1200&auto=format&fit=crop" alt="">
            </div>
            <div class="prop-body">
                <p class="prop-title">شقة – سموحة</p>
                <div class="prop-meta">
                    <span><i class="fa-solid fa-location-dot"></i> الإسكندرية</span>
                    <span><i class="fa-solid fa-bed"></i> 3 غرف</span>
                    <span><i class="fa-solid fa-maximize"></i> 170 م²</span>
                </div>
                <div class="prop-price">
                    <span class="price">2,650,000 ج.م</span>
                    <span class="cta">عرض التفاصيل</span>
                </div>
            </div>
        </a>
    </section>
</main>

<!-- Features -->
<section style="background:#fff;padding:40px 14px;margin-top:10px;">
    <div class="container" style="max-width:1100px;">
        <h4 style="text-align:center;font-weight:900;margin-bottom:30px;">
            لماذا تختار عقارك؟
        </h4>

        <div class="row g-4 text-center">
            <div class="col-md-4">
                <i class="fa-solid fa-magnifying-glass-location fa-2x mb-3 text-primary"></i>
                <h6 style="font-weight:800;">بحث ذكي</h6>
                <p style="color:#64748b;font-size:13px;">
                    فلترة دقيقة للوصول لأفضل العقارات بسهولة.
                </p>
            </div>

            <div class="col-md-4">
                <i class="fa-solid fa-handshake fa-2x mb-3 text-success"></i>
                <h6 style="font-weight:800;">تواصل مباشر</h6>
                <p style="color:#64748b;font-size:13px;">
                    تواصل سريع وآمن مع المالك أو الوسيط.
                </p>
            </div>

            <div class="col-md-4">
                <i class="fa-solid fa-shield-halved fa-2x mb-3 text-danger"></i>
                <h6 style="font-weight:800;">عروض موثوقة</h6>
                <p style="color:#64748b;font-size:13px;">
                    إعلانات موثقة ومراجعة لتحسين تجربة البحث.
                </p>
            </div>
        </div>
    </div>
</section>

@include('client.layouts.footer')
<script>
    document.getElementById("year").textContent = new Date().getFullYear();
</script>

<script>
    const toggle = document.getElementById("menuToggle");
    const menu = document.getElementById("topMenu");

    toggle.addEventListener("click", function () {
        menu.classList.toggle("show");

        // تغيير الأيقونة
        this.querySelector("i").classList.toggle("fa-bars");
        this.querySelector("i").classList.toggle("fa-xmark");
    });
</script>

</body>
</html>
