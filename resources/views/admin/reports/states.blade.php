<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>تقرير العقارات</title>

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --topbar: #3f5564;
            --thead: #5c87a6;
            --border: #cfd6dd;
            --shadow: 0 8px 24px rgba(0, 0, 0, .08);
        }

        body {
            margin: 0;
            height: 100vh;
            overflow: hidden;
            background: #fff;
            font-family: system-ui, -apple-system, "Segoe UI", Tahoma, Arial;
        }

        /* ===== Topbar ===== */
        .app-topbar {
            height: 52px;
            background: var(--topbar);
            color: #fff;
            display: flex;
            align-items: center;
            padding: 0 14px;
            gap: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, .08);
        }

        .app-topbar .title {
            flex: 1;
            text-align: center;
            font-weight: 700;
        }

        .app-topbar .icon-btn {
            width: 34px;
            height: 34px;
            border: 0;
            background: transparent;
            color: #eaf1f7;
            display: grid;
            place-items: center;
            border-radius: 8px;
            transition: .2s;
        }

        .app-topbar .icon-btn:hover {
            background: rgba(255, 255, 255, .10);
        }

        /* ===== Table Layout ===== */
        .table-wrap {
            height: calc(100vh - 52px);
            overflow: auto;
            border-top: 1px solid var(--border);
        }

        table.report-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1400px;
        }

        table.report-table thead th {
            position: sticky;
            top: 0;
            background: var(--thead);
            color: #fff;
            font-weight: 700;
            padding: 10px 12px;
            border-bottom: 1px solid rgba(0, 0, 0, .1);
            white-space: nowrap;
            text-align: center;
        }

        table.report-table tbody td {
            padding: 14px 12px;
            border-bottom: 1px solid #e9eef2;
            white-space: nowrap;
            text-align: center;
        }

        table.report-table tbody tr:hover {
            background: #fafcff;
        }

        /* ===== Search Modal Style (زي اللي في الصورة) ===== */
        .search-modal{
            border:0;
            border-radius:18px;
            overflow:hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,.18);
        }

        .panel-modal{
            padding:28px 22px 18px;
            background:#fff;
        }

        .panel-head{
            text-align:center;
            margin-bottom:18px;
        }

        .panel-head .icon{
            width:84px;
            height:84px;
            margin:0 auto 10px;
            display:grid;
            place-items:center;
            border-radius:50%;
            background:#f3f6fb;
            color:#5c87a6;
            font-size:38px;
        }

        .panel-title{
            margin:0;
            font-weight:800;
            color:#2c3e50;
            font-size:20px;
        }

        .panel-modal .form-label{
            font-weight:700;
            color:#3b4752;
            margin-bottom:6px;
        }

        .panel-modal .form-control,
        .panel-modal .form-select{
            height:48px;
            border-radius:12px;
            border:1px solid #d7e0ea;
            box-shadow:none !important;
        }

        .panel-modal .form-control:focus,
        .panel-modal .form-select:focus{
            border-color:#5c87a6;
            box-shadow:0 0 0 .2rem rgba(92,135,166,.15) !important;
        }

        .btn-save{
            width:100%;
            height:48px;
            border:0;
            border-radius:12px;
            background:#334155; /* نفس اللون اللي بتحبه */
            color:#fff;
            font-weight:800;
            display:flex;
            align-items:center;
            justify-content:center;
            gap:10px;
            transition:.2s;
        }

        .btn-save:hover{
            background:#1e293b;
        }

        .btn-save:disabled{
            opacity:.75;
            cursor:not-allowed;
        }

        .btn-save .btn-spinner{
            display:flex;
            align-items:center;
            gap:8px;
        }

    </style>
</head>

<body>

<div class="app-topbar">

    <button class="icon-btn" type="button" title="رجوع"
            onclick="window.location.href='{{ route('admin.reports.index') }}'">
        <i class="fa-solid fa-arrow-right"></i>
    </button>

    <div class="title">العقارات</div>

    <button class="icon-btn" type="button" title="بحث" id="searchBtn">
        <i class="fa-solid fa-magnifying-glass"></i>
    </button>

    <button class="icon-btn" type="button" title="تحديث" onclick="window.location.href='{{ route('admin.reports.states') }}'">
        <i class="fa-solid fa-rotate-right"></i>
    </button>

</div>

<!-- Table -->
<div class="table-wrap">
    <table class="report-table">
        <thead>
        <tr>
            <th style="width: 260px;">اسم الموظف</th>
            <th style="width: 260px;">العنوان</th>
            <th style="width: 180px;">القسم</th>
            <th style="width: 160px;">السعر</th>
            <th style="width: 200px;">النوع</th>
            <th style="width: 200px;">اسم المعلن</th>
            <th style="width: 200px;">هاتف المعلن</th>
            <th style="width: 200px;">نوع المعلن</th>
            <th style="width: 160px;">المساحه</th>
            <th style="width: 160px;">التاريخ</th>
        </tr>
        </thead>

        <tbody>

        @foreach($states as $state)
            <tr data-id="{{ $state->id}}" style="cursor:pointer;">
                <td class="c-id" onclick="window.location='{{ route('admin.state.show', $state->id) }}'">{{$state->user?->name}}</td>
                <td class="c-real-state-address" onclick="window.location='{{ route('admin.state.show', $state->id) }}'">{{$state->real_state_address}}</td>
                <td class="c-department" onclick="window.location='{{ route('admin.state.show', $state->id) }}'">{{$state->department == 'rent' ? 'ايجار' : 'بيع'}}</td>
                <td class="c-real-state-price" onclick="window.location='{{ route('admin.state.show', $state->id) }}'">{{$state->real_state_price}}</td>
                <td class="c-real-state-type-label" onclick="window.location='{{ route('admin.state.show', $state->id) }}'">{{$state->real_state_type_label}}</td>
                <td class="c-advertiser-type" onclick="window.location='{{ route('admin.state.show', $state->id) }}'">{{$state->advertiser_name}}</td>
                <td class="c-advertiser-type" onclick="window.location='{{ route('admin.state.show', $state->id) }}'">{{$state->advertised_phone_number}}</td>
                <td class="c-advertiser-type" onclick="window.location='{{ route('admin.state.show', $state->id) }}'">{{$state->advertiser_type == 'real_state_owner' ? 'صاحب عقار' : 'شركه عقارات'}}</td>
                <td class="c-real-state-address" onclick="window.location='{{ route('admin.state.show', $state->id) }}'">{{$state->real_state_space}} م²</td>
                <td class="c-real-state-address" onclick="window.location='{{ route('admin.state.show', $state->id) }}'">{{$state->state_date_register}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer">
        <div>{{ $states->appends(request()->query())->links() }}</div>
    </div>
</div>


<div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 520px;">
        <div class="modal-content search-modal">
            <div class="modal-body p-0">
                <div class="panel-modal">
                    <div class="panel-head">
                        <div class="icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                        <p class="panel-title">بحث العقارات</p>
                    </div>


                    <form action="{{route('admin.reports.states')}}" method="GET" autocomplete="off">

                        <div class="mb-2">
                            <label class="form-label">التاريخ من</label>
                            <input name="date_from"
                                   class="form-control"
                                   type="date">
                        </div>

                        <div class="mb-2">
                            <label class="form-label">التاريخ الي</label>
                            <input name="date_to"
                                   class="form-control"
                                   type="date">
                        </div>


                        <button class="btn-save js-submit-loader" type="submit">
                    <span class="btn-text">
                        <i class="fa-solid fa-left-long"></i>
                        بحث
                    </span>

                            <span class="btn-spinner d-none">
                        <span class="spinner-border spinner-border-sm"></span>
                        جاري البحث...
                    </span>
                        </button>

                    </form>

                    <button type="button" class="btn btn-link mt-3 w-100" data-bs-dismiss="modal"
                            style="text-decoration:none;color:#6b7785;">
                        إغلاق
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById("refreshBtn").addEventListener("click", () => location.reload());
</script>

<script>
    const searchModal = new bootstrap.Modal(document.getElementById("searchModal"));
    document.getElementById("searchBtn").addEventListener("click", () => {
        const searchForm = document.querySelector('#searchModal form[action="{{ route('admin.reports.states') }}"]');
        if (searchModal) searchForm.reset();
        searchModal.show();
    });
</script>

<script>
    function activateButtonLoader(button){
        const text = button.querySelector('.btn-text');
        const spinner = button.querySelector('.btn-spinner');

        if (text) text.classList.add('d-none');
        if (spinner) spinner.classList.remove('d-none');

        button.disabled = true;
    }

    document
        .querySelectorAll('form[action="{{ route('admin.reports.states') }}"]')
        .forEach((form) => {
            form.addEventListener('submit', function () {
                const btn = form.querySelector('.js-submit-loader');
                if (btn) activateButtonLoader(btn);
            });
        });
</script>

</body>
</html>
