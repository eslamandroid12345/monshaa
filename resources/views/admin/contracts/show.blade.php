<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>طباعه عقد الايجار</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


    <style>
        :root {
            --ink: #111827;
            --muted: #6b7280;
            --bg: #f3f4f6;
            --border: #e5e7eb;
            --accent: #1d4ed8;
        }

        body {
            background: var(--bg);
            color: var(--ink);
            margin: 0;
            font-family: system-ui, -apple-system, "Segoe UI", Tahoma, Arial;

        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 50;
            background: rgba(255, 255, 255, .9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(17, 24, 39, .08);
        }

        .topbar .wrap {
            width: 96%;
            max-width: 1600px;
            margin: 0 auto;
            padding: 12px 0;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .topbar .title {
            font-weight: 900;
            font-size: 18px;
            white-space: nowrap;
        }

        .actions {
            margin-right: auto;
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .btn-main {
            border: 0;
            border-radius: 8px;
            padding: 12px 24px;
            font-size: 15px;
            font-weight: 700;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #fff;
            cursor: pointer;
            transition: transform 0.1s;
        }

        .btn-main:active {
            transform: scale(0.98);
        }

        .btn-ghost {
            border: 1px solid #d1d5db;
            background: #fff;
            border-radius: 8px;
            padding: 12px 24px;
            font-size: 15px;
            font-weight: 700;
            color: #374151;
            cursor: pointer;
            transition: background 0.1s;
        }

        .btn-ghost:hover {
            background: #f9fafb;
        }

        .page {
            width: 96%;
            max-width: 1600px;
            margin: 24px auto;
            min-height: calc(100vh - 100px);
        }

        .editor {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 32px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .editor h2 {
            margin: 0 0 24px;
            font-weight: 800;
            font-size: 20px;
            color: #111827;
            border-bottom: 2px solid #f3f4f6;
            padding-bottom: 12px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            align-items: end;
        }

        @media(max-width: 1200px) {
            .grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media(max-width: 992px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 600px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 700;
            color: #374151;
        }

        .form-control {
            width: 100%;
            height: 48px;
            padding: 0 16px;
            border-radius: 8px !important;
            border: 1px solid #d1d5db !important;
            font-size: 15px;
            transition: border-color 0.15s;
            background: #f9fafb;
        }

        .form-control:focus {
            background: #fff;
            border-color: var(--accent) !important;
            outline: 2px solid rgba(37, 99, 235, 0.1);
            outline-offset: -1px;
        }

        .note {
            margin-top: 10px;
            font-size: 12px;
            color: var(--muted);
            line-height: 1.9;
        }

        .paper {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            display: none;
            /* Hide from main view */
        }

        /* Preview Overlay */
        .preview-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.85);
            z-index: 1000;
            display: none;
            overflow-y: auto;
            padding: 20px 0;
            direction: rtl;
        }

        .preview-overlay.show {
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .preview-container {
            background: #f3f4f6;
            width: 100%;
            max-width: 220mm;
            padding: 20px;
            border-radius: 8px;
            position: relative;
            margin-bottom: 40px;
        }

        .preview-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            background: #fff;
            padding: 12px 20px;
            border-radius: 8px;
            border: 1px solid var(--border);
        }

        .preview-title {
            font-weight: 800;
            font-size: 16px;
        }

        .preview-actions {
            display: flex;
            gap: 10px;
        }

        .preview-content {
            background: #fff;
            min-height: 297mm;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin: auto;
        }

        /* Ensure preview content looks like A4 */
        .preview-content .a4 {
            margin: 0 auto;
        }

        /* ===== A4 ===== */
        .a4 {
            width: 210mm;
            min-height: 297mm;
            padding: 14mm;
            box-sizing: border-box;
            background: #fff;
            color: #111827;
        }

        .contract-title {
            text-align: center;
            font-weight: 900;
            font-size: 20px;
            margin: 0 0 10px;
        }

        .para {
            font-size: 14px;
            line-height: 2.2;
            /* Slightly increased line height for better readability */
            margin: 0 0 12px;
            overflow-wrap: anywhere;
            word-break: break-word;
            text-align: justify;
            /* Justify text for professional look */
        }

        .dots {
            display: inline-block;
            /* Removed border-bottom: 1px dotted ... */
            font-weight: 800;
            /* Make variables bold */
            color: #000;
            padding: 0 2px;
        }

        .clause-title {
            font-weight: 900;
        }

        .hr {
            margin: 10px 0;
            border-top: 1px solid #111827;
            opacity: .2;
        }

        .two-cols {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 14px;
        }

        .two-cols td {
            width: 50%;
            vertical-align: top;
            padding: 8px 0;
        }

        .sig {
            margin-top: 10px;
            border-top: 1px solid rgba(17, 24, 39, .35);
            width: 70%;
            display: inline-block;
        }

        .muted {
            color: var(--muted);
        }

        .avoid-break {
            break-inside: avoid;
            page-break-inside: avoid;
        }

        /* ===== Loading overlay ===== */
        .loading-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.8);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            flex-direction: column;
            gap: 16px;
        }

        .loading-overlay.show {
            display: flex;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid rgba(255, 255, 255, .3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .loading-text {
            color: #fff;
            font-weight: 800;
        }

        /* ===== Export helpers (FINAL FIX) ===== */
        .export-holder {
            position: fixed;
            left: -10000px;
            top: 0;
            background: #fff;
            direction: rtl;
            width: 210mm;
        }

        .export-mode {
            width: 210mm !important;
            padding: 14mm !important;
            box-sizing: border-box !important;
            background: #fff !important;
            overflow: hidden !important;
        }

        .export-mode * {
            box-sizing: border-box !important;
            max-width: 100% !important;
        }

        .export-mode .para {
            overflow-wrap: anywhere !important;
            word-break: break-word !important;
        }

        .export-mode .dots {
            max-width: 100% !important;
            white-space: normal !important;
            min-width: 0 !important;
            width: auto !important;
        }
    </style>
</head>

<body>

<div class="loading-overlay" id="loadingOverlay">
    <div class="spinner"></div>
    <div class="loading-text">جاري تجهيز ملف PDF...</div>
</div>

<div class="topbar">
    <div class="wrap">
        <div class="title"><a href="{{route('tenant.contracts.index')}}">رجوع</a> </div>
        <div class="actions">
            <button style="display: none" class="btn-ghost" type="button" id="fillBtn">تحديث بيانات العقد</button>
            <button class="btn-main" type="button" id="pdfBtn">طباعه</button>
        </div>
    </div>
</div>

<main class="page">
    <section class="editor">
        <h2>نموذج طباعه عقد الايجار</h2>

        <div class="grid">
            <div>
                <label>تاريخ تسجيل العقد*</label>
                <input class="form-control" id="c_today" placeholder="مثال: 2026-02-17" value="{{$contract->contract_date}}">
            </div>

            <div>
                <label>اسم المؤجر (طرف أول)</label>
                <input class="form-control" id="l_name" placeholder="اسم المؤجر" value="{{$contract->owner_name}}">
            </div>

            <div>
                <label>عنوان المؤجر</label>
                <input class="form-control" id="l_addr" placeholder="العنوان" value="{{$contract->owner_card_address}}">
            </div>

            <div>
                <label>رقم بطاقة المؤجر</label>
                <input class="form-control" id="l_id" placeholder="رقم البطاقة" value="{{$contract->owner_card_number}}">
            </div>

            <div>
                <label>اسم المستأجر (طرف ثاني)</label>
                <input class="form-control" id="t_name" placeholder="اسم المستأجر" value="{{$contract->tenant?->name}}">
            </div>

            <div>
                <label>عنوان المستأجر</label>
                <input class="form-control" id="t_addr" placeholder="العنوان" value="{{$contract->tenant?->card_address}}">
            </div>

            <div>
                <label>رقم بطاقة المستأجر</label>
                <input class="form-control" id="t_id" placeholder="رقم البطاقة" value="{{$contract->tenant?->card_number}}">
            </div>

            <div>
                <label>وصف العين (شقة/محل...)</label>
                <input class="form-control" id="unit_what" placeholder="ما هو؟" value="{{$contract->real_state_type_label}}">
            </div>

            <div>
                <label>رقم العقار</label>
                <input class="form-control" id="building_no" placeholder="رقم العقار" value="{{$contract->apartment_number}}">
            </div>

            <div>
                <label>مدة الإيجار (سنوات)</label>
                <input class="form-control" id="term_years" placeholder="مثال: 1" value="1">
            </div>

            <div>
                <label>تاريخ بداية العقد</label>
                <input class="form-control" id="start_date" placeholder="مثال: 2026-03-01" value="{{$contract->contract_date_from}}">
            </div>

            <div>
                <label>تاريخ نهاية العقد</label>
                <input class="form-control" id="end_date" placeholder="مثال: 2027-03-01" value="{{$contract->contract_date_from}}">
            </div>

            <div>
                <label>قيمة الايجار الشهري (جنيه)</label>
                <input class="form-control" id="rent_month" placeholder="مثال: 5000" value="{{$contract->contract_total}}">
            </div>

            <div>
                <label>مقدم الإيجار</label>
                <input class="form-control" id="advance_total" placeholder="مثال: 10000" value="{{$contract->contract_total}}">
            </div>

            <div>
                <label>يتم خصم (جنيه) شهرياً من المقدم</label>
                <input class="form-control" id="advance_deduct" placeholder="مثال: 500" value="500">
            </div>

            <div>
                <label>يدفع المستأجر (جنيه) أول كل شهر</label>
                <input class="form-control" id="pay_each_month" placeholder="مثال: 4500" value="{{$contract->contract_total}}">
            </div>

            <div>
                <label>تعويض التأخير اليومي (جنيه) (اختياري)</label>
                <input class="form-control" id="late_day_comp" placeholder="مثال: 200" value="200">
            </div>

            <div>
                <label>اسم المحكمة المختصة</label>
                <input class="form-control" id="court_name" placeholder="مثال: محكمة القاهرة الجديدة"
                       value="محكمه القاهره">
            </div>

            <div style="grid-column: 1 / -1;">
                <label>بند إضافي (اختياري)</label>
                <input class="form-control" id="extra_clause" placeholder="اكتب أي بند إضافي هنا">
            </div>
        </div>

    </section>

    <section class="paper">
        <div class="a4" id="contractArea">
            <h1 class="contract-title">عقد إيجار</h1>

            <p class="para">
                إنه في يوم <span id="v_today_text" class="dots">.......................</span>
                الموافق: <span id="v_today_day" class="dots"> </span> /
                <span id="v_today_month" class="dots"> </span> /
                <span id="v_today_year" class="dots">20 </span>
            </p>

            <p class="para">
                قد أجر السيد/ <b id="v_l_name" class="dots">.......................</b>
                (طرف أول مؤجر)
            </p>

            <p class="para">
                المقيم بـ: <span id="v_l_addr" class="dots">.......................</span>
                ويحمل بطاقة رقم: <span id="v_l_id" class="dots">.......................</span>
            </p>

            <p class="para">
                إلى السيد/ <b id="v_t_name" class="dots">.......................</b>
                (طرف ثاني مستأجر)
            </p>

            <p class="para">
                المقيم بـ: <span id="v_t_addr" class="dots">.......................</span>
                ويحمل بطاقة رقم: <span id="v_t_id" class="dots">.......................</span>
            </p>

            <p class="para">
                ما هو: <span id="v_unit_what" class="dots">.......................</span>
                كائن بالعقار رقم: <span id="v_building_no" class="dots">.......................</span>
            </p>

            <p class="para">
                وقد قرر المستأجر بأن العين المؤجرة مستوفي جميع لوازمه كعقار ومشطب كاملاً وقد اعترف المستأجر
                بمعاينته العين المذكورة وأنه خال من أي خلل وأنه صالح للغرض الذي اُستأجر من أجله
                وقد اتفق المتعاقدين وهما بكامل الأهلية على الشروط الآتية:
            </p>

            <div class="hr"></div>

            <div class="avoid-break">
                <p class="para">
                    <span class="clause-title">البند الأول:</span>
                    مدة الإيجـار <span id="v_term_years" class="dots">.......................</span> سنوات تبدأ من
                    <span id="v_start_date" class="dots">.......................</span>
                    وتنتهـي فـي
                    <span id="v_end_date" class="dots">.......................</span>
                    ولا يجوز تجديدها لمدة مماثلة إلا بعقد جديد ويلتزم المستأجر بتسليمه المحل عند نهاية المدة
                    وفي حالة عدم تسليم المحل في نهاية المدة يحق للمالك دخول المحل واستغلاله بوضع اليد عليه.
                </p>
            </div>

            <div class="avoid-break">
                <p class="para">
                    <span class="clause-title">البند الثاني:</span>
                    الأجرة المتفق عليها هي مبلغ <span id="v_rent_month" class="dots">.......................</span>
                    جنيه كل شهر والأجرة تدفع شهرياً مقدماً عند أول كل شهر.
                </p>
            </div>

            <div class="avoid-break">
                <p class="para">
                    <span class="clause-title">البند الثالث:</span>
                    تقاضى الطرف الأول من الطرف الثاني مبلغ وقدره <span id="v_advance_total"
                                                                       class="dots">.......................</span>
                    كمقدم إيجار يتم خصم <span id="v_advance_deduct" class="dots">.......................</span>
                    جنيه من القيمة الإيجارية المشار إليها في البند الثاني كل شهر ويدفع المستأجر
                    <span id="v_pay_each_month" class="dots">.......................</span>
                    جنيه كل أول شهر.
                </p>
            </div>

            <div class="avoid-break">
                <p class="para">
                    <span class="clause-title">البند الرابع:</span>
                    إذا تأخر المستأجر عن دفع الإيجار في المواعيد المحددة لمدة شهر يُفسخ هذا العقد فوراً وتلقائياً
                    ودون أي تنبيه أو إنذار وللمالك الحق في رفع دعوى طرد مستعجلة أمام قاضي الأمور المستعجلة
                    لاستصدار حكماً بإخلاء المستأجر بمجرد التثبت من التأخير في السداد ولا يجوز للمستأجر التأخير
                    في سداد قيمة الإيجار لأي سبب أو يدعي المقاصة مع أي مصاريف او تصليحات أو خلافه ولا يجوز له إيداعه
                    خزانة المحكمة.
                </p>
            </div>

            <div class="avoid-break">
                <p class="para">
                    <span class="clause-title">البند الخامس:</span>
                    محظور على المستأجر أن يؤجر العين المذكورة من الباطن أو يتنازل عنها للغير عن أي مدة كانت
                    أو يؤجر من الباطن كل أو جزء من المكان المؤجر مهما كانت الأسباب بمقابل أو غير مقابل أو لأي شخص
                    كان
                    وإذا حصل تغيير بالعين المؤجرة بدون إذن المالك كتابة وإذا خالف ذلك يكون العقد مفسوخاً من تلقاء
                    نفسه
                    ويلزمه بالعطل والأضرار والمصاريف التي تحدث.
                </p>
            </div>

            <div class="avoid-break">
                <p class="para">
                    <span class="clause-title">البند السادس:</span>
                    يلتزم المستأجر باستعمال العين المؤجرة وفقاً للبنود المتفق عليها بالعقد وأن يحافظ عليها ويراعيها
                    كما يراعي الإنسان ماله الخاص
                    ويحظر على المستأجر ان يضع في المكان المؤجر أية مواد ملتهبة أو مضرة بالصحة العامة وإذا خالف ذلك
                    يحق للمالك ان يفسخ العقد ويلزمه بالعطل والمصاريف
                    ويحظر على المستأجر إحداث أي تغيير في المكان المؤجر له إلا بتصريح كتابي من المالك وإذا خالف ذلك
                    يعتبر العقد مفسوخاً من تلقاء نفسه.
                </p>
            </div>

            <div class="avoid-break">
                <p class="para">
                    <span class="clause-title">البند السابع:</span>
                    جميع ما ينفقه المستأجر بعد استلامه العين المؤجرة من دهانات أو لصق ورق أو ديكور وخلافه لا يلزم
                    المالك بشيء منها
                    ولا يحق للمستأجر أن يطلب قيمتها عند انتهاء العقد بل يكون متبرعاً بها للمالك ولا يجوز للمستأجر أن
                    يعلو بواجهة المحل بإقامة ديكورات تعلو عن مستوى سقف المحل.
                </p>
            </div>

            <div class="avoid-break">
                <p class="para">
                    <span class="clause-title">البند الثامن:</span>
                    يلتزم المستأجر بعلم الترميمات التأجيرية للعين المؤجرة مثل إصلاح البلاط أو الأبواب والمفاتيح
                    ودهان الحوائط وذلك طوال مدة الإيجار أمام الترميمات الضرورية تكون على عاتق المالك.
                </p>
            </div>

            <div class="avoid-break">
                <p class="para">
                    <span class="clause-title">البند التاسع:</span>
                    جميع ما يملكه المستأجر من أثاثات ومنقولات وبضائع وخلافه بالعين المؤجرة يحق للمالك الحجر عليها في
                    حالة التأخير عن دفع الأجرة واستيفاء حقه منها كما يحق له حبسها
                    وأن يمنع المستأجر من نقلها حتى استيفاء مستحقاته من قيمة إيجارية متأخرة لدى المستأجر.
                </p>
            </div>

            <div class="avoid-break">
                <p class="para">
                    <span class="clause-title">البند العاشر:</span>
                    إذا ترك المستأجر العين المؤجرة قبل انتهاء المدة فيلتزم بدفع القيمة الإيجارية عن المدة كاملة مع
                    مصاريف ما يكون قد أتلف بها.
                </p>
            </div>

            <div class="avoid-break">
                <p class="para">
                    <span class="clause-title">البند الحادي عشر:</span>
                    بانتهاء مدة التعاقد المحددة بهذا العقد يعتبر هذا العقد مفسوخاً من تلقاء نفسه دون حاجة إلى إنذار
                    او تنبيه او لجوء إلى القضاء
                    ويلتزم المستأجر بالإخلاء دون حاجة الى اخطار المالك للمستأجر برغبته في إخلاء المكان المؤجر
                    وفي حالة التأخير عن التسليم يلتزم المستأجر بدفع تعويض قدره
                    <span id="v_late_day_comp" class="dots">.......................</span>
                    جنيه عن كل يوم تأخير في التسليم كما يتعهد المستأجر بتمكين المالك من دخول كل من يرغب في معاينة
                    المكان المؤجر.
                </p>
            </div>

            <div class="avoid-break">
                <p class="para">
                    <span class="clause-title">البند الثاني عشر:</span>
                    إذا حدث أمر مخل بالعين المؤجرة فللمالك الحق في إخراج المستأجر من العين بمجرد الإبلاغ عنه شفوياً
                    ويحق له فسخ العقد.
                </p>
            </div>

            <div class="avoid-break">
                <p class="para">
                    <span class="clause-title">البند الثالث عشر:</span>
                    يلتزم المستأجر بدفع قيمة الضرائب العقارية وسداد فواتير الكهرباء والمياه التليفون.
                </p>
            </div>

            <div class="avoid-break">
                <p class="para">
                    <span class="clause-title">البند الرابع عشر:</span>
                    يخضع هذا العقد لأحكام القانون رقم 4 لسنة 1996 بشأن سريان أحكام القانون المدني على الأماكن التي
                    لم يسبق تأجيرها والأماكن التي انتهت أو تنتهي عقود إيجارها والقانون 137 لسنة 2006.
                </p>
            </div>

            <div class="avoid-break">
                <p class="para">
                    <span class="clause-title">البند الخامس عشر:</span>
                    تختص محكمة <span id="v_court_name" class="dots">.......................</span>
                    بالنظر فيما ينشأ من منازعات وخلافه حول بنود العقد وقد تحرر هذا العقد من نسختين بيد كل طرف نسخة
                    للعمل بموجبها.
                </p>
            </div>

            <div class="avoid-break">
                <p class="para">
                    <span class="clause-title">بند إضافي:</span>
                    <span id="v_extra_clause" class="dots">.......................</span>
                </p>
            </div>

            <div class="hr"></div>

            <table class="two-cols avoid-break">
                <tr>
                    <td>
                        <b>الطرف الأول (المؤجر)</b><br>
                        الاســـــم: <span id="v_l_name2" class="dots">.......................</span><br>
                        التوقـيـع: <span class="sig"></span><br>
                        رقم قومي: <span id="v_l_id2" class="dots">.......................</span>
                    </td>
                    <td>
                        <b>الطرف الثاني (المستأجر)</b><br>
                        الاســـــم: <span id="v_t_name2" class="dots">.......................</span><br>
                        التوقـيـع: <span class="sig"></span><br>
                        رقم قومي: <span id="v_t_id2" class="dots">.......................</span>
                    </td>
                </tr>
            </table>

            <div class="hr"></div>

            <p class="para" style="margin-bottom:6px;"><b>الشهـــود</b></p>

            <table class="two-cols avoid-break" style="margin-top:6px;">
                <tr>
                    <td>
                        <b>الشاهد الاول</b><br>
                        الاســـــم: <span class="dots">.......................</span><br>
                        التوقـيـع: <span class="sig"></span><br>
                        رقم قومي: <span class="dots">.......................</span>
                    </td>
                    <td>
                        <b>الشاهد الثاني</b><br>
                        الاســـــم: <span class="dots">.......................</span><br>
                        التوقـيـع: <span class="sig"></span><br>
                        رقم قومي: <span class="dots">.......................</span>
                    </td>
                </tr>
            </table>


        </div>
    </section>
</main>

<div class="preview-overlay" id="previewOverlay">
    <div class="preview-container">
        <div class="preview-header">
            <div class="preview-title">معاينة العقد قبل الطباعة</div>
            <div class="preview-actions">
                <button class="btn-ghost" onclick="closePreview()">إغلاق</button>
                <button class="btn-main" onclick="confirmDownload()">تحميل PDF</button>
            </div>
        </div>
        <div id="previewBody" class="preview-content">
            <!-- Contract clone will go here -->
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/html2pdf.js@0.10.1/dist/html2pdf.bundle.min.js"></script>

<script>
    function val(id, fallback = ".......................") {
        const el = document.getElementById(id);
        const v = (el && el.value ? el.value.trim() : "");
        return v || fallback;
    }

    function setText(id, value) {
        const el = document.getElementById(id);
        if (el) el.textContent = value;
    }

    function splitDateParts(iso) {
        if (!iso || iso.length < 10) return { y: "20", m: "", d: "" };
        return { y: iso.slice(0, 4), m: iso.slice(5, 7), d: iso.slice(8, 10) };
    }

    function fillContract() {
        const today = val("c_today", new Date().toISOString().slice(0, 10));
        const parts = splitDateParts(today);

        setText("v_today_text", ".......................");
        setText("v_today_day", parts.d || "  ");
        setText("v_today_month", parts.m || "  ");
        setText("v_today_year", parts.y || "20  ");

        const l_name = val("l_name");
        const l_addr = val("l_addr");
        const l_id = val("l_id");
        const t_name = val("t_name");
        const t_addr = val("t_addr");
        const t_id = val("t_id");

        setText("v_l_name", l_name);
        setText("v_l_addr", l_addr);
        setText("v_l_id", l_id);

        setText("v_t_name", t_name);
        setText("v_t_addr", t_addr);
        setText("v_t_id", t_id);

        setText("v_unit_what", val("unit_what"));
        setText("v_building_no", val("building_no"));

        setText("v_term_years", val("term_years"));
        setText("v_start_date", val("start_date"));
        setText("v_end_date", val("end_date"));

        setText("v_rent_month", val("rent_month"));
        setText("v_advance_total", val("advance_total"));
        setText("v_advance_deduct", val("advance_deduct"));
        setText("v_pay_each_month", val("pay_each_month"));

        setText("v_late_day_comp", val("late_day_comp", "......................."));
        setText("v_court_name", val("court_name"));
        setText("v_extra_clause", val("extra_clause", "......................."));

        setText("v_l_name2", l_name);
        setText("v_l_id2", l_id);
        setText("v_t_name2", t_name);
        setText("v_t_id2", t_id);
    }

    (function init() {
        document.getElementById("c_today").value = new Date().toISOString().slice(0, 10);
        fillContract();
    })();

    document.getElementById("fillBtn").addEventListener("click", fillContract);

    document.getElementById("fillBtn").addEventListener("click", fillContract);

    // Open Preview
    function openPreview() {
        fillContract();
        const original = document.getElementById("contractArea");
        const previewBody = document.getElementById("previewBody");

        // Clear previous
        previewBody.innerHTML = "";

        // Clone and show
        const clone = original.cloneNode(true);
        clone.style.display = "block"; // Ensure it's visible in preview even if original is unique
        previewBody.appendChild(clone);

        document.getElementById("previewOverlay").classList.add("show");
        document.body.style.overflow = "hidden"; // Prevent background scrolling
    }

    function closePreview() {
        document.getElementById("previewOverlay").classList.remove("show");
        document.body.style.overflow = "";
    }

    // Real PDF Download
    async function confirmDownload() {
        const loadingOverlay = document.getElementById("loadingOverlay");
        const previewElement = document.getElementById("previewBody").firstElementChild; // The .a4 element

        if (!previewElement) return;

        loadingOverlay.classList.add("show");

        try {
            // Wait for fonts
            if (document.fonts && document.fonts.ready) {
                try { await document.fonts.ready; } catch (e) { }
                await new Promise(r => setTimeout(r, 200));
            }

            const opt = {
                margin: 0,
                filename: `عقد_ايجار_${new Date().toISOString().slice(0, 10)}.pdf`,
                image: { type: "jpeg", quality: 0.98 },
                html2canvas: {
                    scale: 2.5, // Good balance of quality and size
                    useCORS: true,
                    backgroundColor: "#ffffff",
                    logging: false,
                    foreignObjectRendering: false, // Sometimes causes issues, false is safer with standard HTML
                    scrollY: 0
                },
                jsPDF: { unit: "mm", format: "a4", orientation: "portrait" },
                pagebreak: { mode: ["css", "legacy"], avoid: ".avoid-break" }
            };

            await html2pdf().set(opt).from(previewElement).save();

        } catch (err) {
            console.error(err);
            alert("حصل خطأ أثناء تصدير PDF: " + err.message);
        } finally {
            loadingOverlay.classList.remove("show");
        }
    }

    document.getElementById("pdfBtn").addEventListener("click", openPreview);
</script>

</body>

</html>
