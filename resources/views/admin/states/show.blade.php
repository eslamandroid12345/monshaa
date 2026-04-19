<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>بيانات العقار</title>

    <!-- Google Font Cairo -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">


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
            font-family: "Cairo", sans-serif;
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
            gap:10px;
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
            display:grid;
            place-items:center;
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

        /* ===== Gallery ===== */
        .gallery{
            display:grid;
            grid-template-columns:repeat(auto-fill,minmax(260px,1fr));
            gap:6px;
        }

        .gallery img{
            width:100%;
            height:220px;
            object-fit:cover;
            border-radius:8px; /* في الصفحة عادي */
            cursor:pointer;
            transition:.3s;
            box-shadow:0 4px 12px rgba(0,0,0,.06);
            background:#fff;
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
            gap:12px;
            padding:8px 0;
            border-bottom:1px solid #f1f3f6;
            font-size:14px;
        }

        .detail-item:last-child{border-bottom:0;}

        .detail-label{
            color:#7a8793;
            white-space:nowrap;
        }

        .detail-value{
            font-weight:600;
            color:#34495e;
            text-align:left;
            overflow-wrap:anywhere;
        }

        /* ===== Responsive ===== */
        @media(max-width:1000px){
            body{overflow:auto;}
            .wrapper{
                grid-template-columns:1fr;
                height:auto;
            }
        }

        #pdfArea{ background:#f5f7fa; }
    </style>
</head>

<body>

<div class="app-topbar">
    <button class="icon-btn" type="button" title="رجوع"
            onclick="window.location.href='{{ route('states.index') }}'">
        <i class="fa-solid fa-arrow-right"></i>
    </button>
    <div class="title">بيانات العقار</div>

    <!-- زر PDF -->
    <button id="btnPdf" class="btn btn-danger btn-sm">
        <i class="fa-solid fa-file-pdf"></i>
        PDF
    </button>

</div>

<div id="pdfArea">
    <div class="wrapper">

        <!-- Gallery -->
        <div class="gallery">
            @foreach($state->stateImages as $image)
                <img src="{{ $image }}" crossorigin="anonymous" />
            @endforeach
        </div>

        <!-- Details -->
        <div class="details-card" id="detailsCard">
            <h5>تفاصيل الإعلان</h5>

            <div class="detail-item">
                <span class="detail-label">كود الاعلان</span>
                <span class="detail-value">{{$state->id}}</span>
            </div>

            <div class="detail-item">
                <span class="detail-label">اسم المجمع السكني - الكمبوند</span>
                <span class="detail-value">{{$state->compound_name ?? 'لا يوجد'}}</span>
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
                <span class="detail-value">{{$state->real_state_space}} م²</span>
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
                <span class="detail-label">رقم الشقه</span>
                <span class="detail-value">{{$state->apartment_number}}</span>
            </div>

            <div class="detail-item">
                <span class="detail-label">رقم العماره</span>
                <span class="detail-value">{{$state->building_number ?? 'لا يوجد'}}</span>
            </div>

            <div class="detail-item">
                <span class="detail-label">السعر</span>
                <span class="detail-value">{{$state->real_state_price ?? 'لا يوجد'}}</span>
            </div>

            <div class="detail-item hide-in-pdf">
                <span class="detail-label">نوع المعلن</span>
                <span class="detail-value">{{$state->advertiser_type == 'real_state_owner' ? 'صاحب عقار' : 'شركه عقارات'}}</span>
            </div>

            <div class="detail-item hide-in-pdf">
                <span class="detail-label">اسم المالك او الوسيط</span>
                <span class="detail-value">{{$state->advertiser_name}}</span>
            </div>

            <div class="detail-item hide-in-pdf">
                <span class="detail-label">رقم هاتف المالك او الوسيط</span>
                <span class="detail-value">{{$state->advertised_phone_number}}</span>
            </div>

            <div class="detail-item hide-in-pdf">
                <span class="detail-label">اسم الموظف</span>
                <span class="detail-value">{{$state?->user->name}}</span>
            </div>

            <div class="detail-item hide-in-pdf">
                <span class="detail-label">التاريخ</span>
                <span class="detail-value">{{$state->state_date_register}}</span>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Libraries for PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
    async function waitForImages(container) {
        const imgs = Array.from(container.querySelectorAll("img"));
        await Promise.all(imgs.map(img => {
            if (img.complete && img.naturalHeight !== 0) return Promise.resolve();
            return new Promise(resolve => {
                img.onload = resolve;
                img.onerror = resolve;
            });
        }));
    }

    async function captureElement(el) {
        return await html2canvas(el, {
            scale: 2,
            useCORS: true,
            allowTaint: true,
            backgroundColor: "#f5f7fa"
        });
    }

    function addCanvasFitPage(pdf, canvas) {
        const imgData = canvas.toDataURL("image/jpeg", 0.95);

        const pageW = pdf.internal.pageSize.getWidth();
        const pageH = pdf.internal.pageSize.getHeight();

        const margin = 8;
        const maxW = pageW - margin * 2;
        const maxH = pageH - margin * 2;

        const ratio = Math.min(maxW / canvas.width, maxH / canvas.height);

        const w = canvas.width * ratio;
        const h = canvas.height * ratio;

        const x = (pageW - w) / 2;
        const y = (pageH - h) / 2;

        pdf.addImage(imgData, "JPEG", x, y, w, h);
    }

    function addImageCoverFullPage(pdf, imgEl) {
        const pageW = pdf.internal.pageSize.getWidth();
        const pageH = pdf.internal.pageSize.getHeight();

        const iw = imgEl.naturalWidth;
        const ih = imgEl.naturalHeight;

        const srcCanvas = document.createElement("canvas");
        srcCanvas.width = iw;
        srcCanvas.height = ih;
        const sctx = srcCanvas.getContext("2d");
        sctx.drawImage(imgEl, 0, 0);

        const scale = Math.max(pageW / iw, pageH / ih);

        const drawW = iw * scale;
        const drawH = ih * scale;

        const offsetX = (pageW - drawW) / 2;
        const offsetY = (pageH - drawH) / 2;

        const imgData = srcCanvas.toDataURL("image/jpeg", 0.95);
        pdf.addImage(imgData, "JPEG", offsetX, offsetY, drawW, drawH);
    }

    function toggleHideInPdf(hide = true) {
        const els = document.querySelectorAll(".hide-in-pdf");
        els.forEach(el => {
            if (hide) {
                el.dataset.oldDisplay = el.style.display || "";
                el.style.display = "none";
            } else {
                el.style.display = el.dataset.oldDisplay || "";
            }
        });
    }

    document.getElementById("btnPdf").addEventListener("click", async () => {
        const btn = document.getElementById("btnPdf");
        btn.style.display = "none";

        await waitForImages(document);

        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF("p", "mm", "a4");

        toggleHideInPdf(true);

        const detailsCard = document.getElementById("detailsCard");
        const canvasDetails = await captureElement(detailsCard);
        addCanvasFitPage(pdf, canvasDetails);

        toggleHideInPdf(false);

        const images = Array.from(document.querySelectorAll(".gallery img"));
        for (let i = 0; i < images.length; i++) {
            pdf.addPage();
            addImageCoverFullPage(pdf, images[i]);
        }

        btn.style.display = "";
        pdf.save(`state-{{$state->id}}.pdf`);
    });
</script>

</body>
</html>
