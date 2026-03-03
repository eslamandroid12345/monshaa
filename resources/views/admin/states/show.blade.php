<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>بيانات العقار</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root{
            --topbar:#3f5564;
            --card:#ffffff;
            --border:#e3e8ee;
            --primary:#5c87a6;
        }

        body{
            margin:0;
            font-family:system-ui;
            background:#f5f7fa;
            height:100vh;
            overflow:hidden;
        }

        /* ===== Topbar ===== */
        .app-topbar{
            height:52px;
            background:var(--topbar);
            color:#fff;
            display:flex;
            align-items:center;
            padding:0 14px;
        }

        .app-topbar .title{
            flex:1;
            text-align:center;
            font-weight:700;
        }

        .icon-btn{
            background:transparent;
            border:0;
            color:#fff;
            width:34px;
            height:34px;
            border-radius:8px;
        }
        .icon-btn:hover{background:rgba(255,255,255,.1);}

        /* ===== Layout ===== */
        .wrapper{
            height:calc(100vh - 52px);
            display:grid;
            grid-template-columns: 1fr 360px;
            gap:16px;
            padding:16px;
            overflow:auto;
        }

        /* ===== Gallery (UPDATED) ===== */
        .gallery{
            display:grid;
            grid-template-columns:repeat(auto-fill,minmax(260px,1fr));
            gap:6px; /* تم تقليل المسافات */
        }

        .gallery img{
            width:100%;
            height:220px;
            object-fit:cover;
            border-radius:8px;
            cursor:pointer;
            transition:.3s;
            box-shadow:0 4px 12px rgba(0,0,0,.06);
        }

        .gallery img:hover{
            transform:scale(1.02);
        }

        /* ===== Details Card ===== */
        .details-card{
            background:var(--card);
            border-radius:14px;
            padding:20px;
            box-shadow:0 10px 25px rgba(0,0,0,.06);
            border:1px solid var(--border);
            height:fit-content;
        }

        .details-card h5{
            font-weight:700;
            margin-bottom:20px;
            color:#2c3e50;
        }

        .detail-item{
            display:flex;
            justify-content:space-between;
            padding:8px 0;
            border-bottom:1px solid #f1f3f6;
            font-size:14px;
        }

        .detail-item:last-child{border-bottom:0;}

        .detail-label{
            color:#7a8793;
        }

        .detail-value{
            font-weight:600;
            color:#34495e;
        }

        /* ===== Responsive ===== */
        @media(max-width:1000px){
            .wrapper{
                grid-template-columns:1fr;
            }
        }
    </style>
</head>

<body>


<div class="app-topbar">
    <div class="title">بيانات العقار</div>
    <button class="icon-btn" type="button" title="رجوع"
            onclick="window.location.href='{{ route('states.index') }}'">
        <i class="fa-solid fa-arrow-left"></i>
    </button>
</div>

<div class="wrapper">
    <!-- Gallery -->
    <div class="gallery">
        @foreach($state->stateImages as $image)
            <img src="{{$image}}">

        @endforeach

    </div>

    <!-- Details -->
    <div class="details-card">
        <h5>تفاصيل الإعلان</h5>

        <div class="detail-item">
            <span class="detail-label">كود الاعلان</span>
            <span class="detail-value">{{$state->id}}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label">نوع العقار</span>
            <span class="detail-value">{{$state->real_state_type_label}}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label">القسم</span>
            <span class="detail-value">{{$state->department == 'rent' ? 'ايجار' : 'بيع'}}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label">عنوان العقار</span>
            <span class="detail-value">{{$state->real_state_address}}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label">عنوان العقار بالتفصيل</span>
            <span class="detail-value">{{$state->real_state_address_details}}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label">مساحه العقار</span>
            <span class="detail-value">{{$state->real_state_space}}  م²</span>
        </div>

        <div class="detail-item">
            <span class="detail-label">عدد الغرف</span>
            <span class="detail-value">{{$state->number_of_rooms}} غرف</span>
        </div>

        <div class="detail-item">
            <span class="detail-label">عدد الحمامات</span>
            <span class="detail-value">{{$state->number_of_bathrooms}}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label">السعر</span>
            <span class="detail-value">{{$state->real_state_price}}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label">نوع المعلن</span>
            <span class="detail-value">{{$state->advertiser_type == 'real_state_owner' ? 'صاحب عقار' : 'شركه عقارات'}}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label">اسم المالك</span>
            <span class="detail-value">{{$state->advertiser_name}}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label">هاتف المالك</span>
            <span class="detail-value">{{$state->advertised_phone_number}}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label">اسم الموظف</span>
            <span class="detail-value">{{$state?->user->name}}</span>
        </div>

        <div class="detail-item">
            <span class="detail-label">تاريخ تسجيل العقار</span>
            <span class="detail-value">{{$state->state_date_register}}</span>
        </div>

    </div>

</div>

</body>
</html>
