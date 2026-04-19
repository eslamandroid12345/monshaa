<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>الموظفين</title>

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- Google Font Cairo -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/admin/toast.css')}}" />

    <style>
        :root {
            --topbar: #3f5564;
            --thead: #5c87a6;
            --panel-border: #cfd6dd;
            --panel-bg: #ffffff;

            --btn: #5c87a6;
            --btn-hover: #4f7691;

            --input-border: #8fc0ff;
            --shadow: 0 8px 24px rgba(0, 0, 0, .08);
            --muted: #7a8793;

            --dropdown-bg: #f2f3f5;
        }

        body {
            background: #fff;
            font-family: "Cairo", sans-serif;
            height: 100vh;
            overflow: hidden;
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
            letter-spacing: .2px;
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

        /* ===== Layout ===== */
        .app {
            height: calc(100vh - 52px);
            display: grid;
            grid-template-columns: 460px 1fr;
            grid-template-areas: "panel table";
            gap: 14px;
            padding: 12px;
        }

        .panel {
            grid-area: panel;
            background: var(--panel-bg);
            border: 2px solid var(--panel-border);
            box-shadow: var(--shadow);
            padding: 16px 16px 14px;
            overflow: auto;
        }

        .table-wrap {
            grid-area: table;
            background: #fff;
            border: 1px solid var(--panel-border);
            box-shadow: var(--shadow);
            overflow: auto;
        }

        /* ===== Table ===== */
        table.props {
            width: 100%;
            border-collapse: collapse;
        }

        table.props thead th {
            position: sticky;
            top: 0;
            z-index: 2;
            background: var(--thead);
            color: #fff;
            font-weight: 700;
            padding: 10px 12px;
            border-bottom: 1px solid rgba(0, 0, 0, .10);
            white-space: nowrap;
        }

        table.props tbody td {
            padding: 16px 12px;
            border-bottom: 1px solid #e9eef2;
            vertical-align: middle;
            white-space: nowrap;
        }

        table.props tbody tr:hover {
            background: #fafcff;
        }

        .t-action {
            width: 90px;
            text-align: center;
        }

        .t-action i {
            cursor: pointer;
            opacity: .85;
            transition: .15s;
        }

        .t-action i:hover {
            opacity: 1;
            transform: translateY(-1px);
        }

        /* ===== Panel header ===== */
        .panel-head {
            text-align: center;
            padding-top: 8px;
            padding-bottom: 10px;
        }

        .panel-head .icon {
            font-size: 44px;
            color: #5a6b7a;
            margin-bottom: 6px;
        }

        .panel-head .panel-title {
            color: #2d8bd6;
            font-weight: 700;
            font-size: 16px;
            margin: 0;
        }

        .form-label {
            font-size: 13px;
            color: #6b7785;
            margin-top: 10px;
            margin-bottom: 6px;
        }

        .form-control,
        .form-select,
        textarea {
            border: 1px solid var(--input-border);
            border-radius: 2px;
            padding: 10px 12px;
            box-shadow: none !important;
        }

        .form-control:focus,
        .form-select:focus,
        textarea:focus {
            border-color: #5aa5ff;
            box-shadow: 0 0 0 .2rem rgba(90, 165, 255, .15) !important;
        }

        .btn-save {
            background: var(--btn);
            border: 0;
            color: #fff;
            width: 100%;
            padding: 12px 14px;
            border-radius: 4px;
            font-weight: 700;
            margin-top: 12px;
            transition: .2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-save:hover {
            background: var(--btn-hover);
        }

        /* ===== Modals ===== */
        .search-modal {
            background: transparent;
            border: 0;
            box-shadow: none;
        }

        .panel-modal {
            border: 2px solid var(--panel-border);
            box-shadow: var(--shadow);
            border-radius: 6px;
            background: var(--panel-bg);
            padding: 16px 16px 14px;
        }

        .modal-backdrop.show {
            opacity: .35;
        }

        /* ===== Floating + button (mobile) ===== */
        .fab-add {
            position: fixed;
            left: 16px;
            bottom: 16px;
            width: 54px;
            height: 54px;
            border-radius: 50%;
            border: 0;
            background: var(--btn);
            color: #fff;
            display: none;
            align-items: center;
            justify-content: center;
            box-shadow: 0 12px 30px rgba(0, 0, 0, .18);
            z-index: 1055;
            transition: .2s;
        }

        .fab-add:hover {
            background: var(--btn-hover);
        }

        /* ===== Responsive ===== */
        @media (max-width: 1100px) {
            body { overflow: auto; }

            .app {
                height: auto;
                grid-template-columns: 1fr;
                grid-template-areas: "table";
            }

            .panel { display: none; }

            .fab-add { display: flex; }
        }


        .edit-loader {
            position: relative;
            min-height: 280px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f8fafc, #eef2f7);
            border-radius: 6px;
        }

        .loader-box {
            text-align: center;
            animation: fadeIn .3s ease-in-out;
        }

        .loader-box .spinner-border {
            width: 3rem;
            height: 3rem;
        }

        .loader-text {
            margin-top: 12px;
            font-weight: 600;
            font-size: 14px;
            color: #5a6b7a;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(.95); }
            to { opacity: 1; transform: scale(1); }
        }


        /* ===== Permissions Dropdown ===== */
        .perm-wrap {
            position: relative;
        }

        .perm-trigger {
            width: 100%;
            border: 1px solid var(--input-border);
            border-radius: 2px;
            padding: 10px 12px;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            user-select: none;
        }

        .perm-trigger .placeholder {
            color: var(--muted);
            font-size: 13px;
        }

        .perm-trigger i {
            color: var(--muted);
        }

        .perm-panel {
            position: absolute;
            left: 0;
            right: 0;
            top: calc(100% + 6px);
            background: #f2f4f7;
            border: 1px solid #d7dee6;
            box-shadow: 0 10px 28px rgba(0, 0, 0, .12);
            max-height: 360px;
            overflow: auto;
            z-index: 50;
            display: none;
            padding-bottom: 10px;
        }

        .perm-panel.open { display: block; }

        .perm-item {
            display: grid;
            grid-template-columns: 1fr 24px;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-bottom: 1px solid #e1e6eb;
            background: transparent;
            font-weight: 600;
            font-size: 13px;
            color: #2c3e50;
            cursor: pointer;
        }

        .perm-item:last-child { border-bottom: 0; }

        .perm-item input {
            width: 16px;
            height: 16px;
            cursor: pointer;
        }

        .perm-footer {
            position: sticky;
            bottom: 0;
            background: #f2f4f7;
            padding: 10px 12px;
            border-top: 1px solid #e1e6eb;
            display: flex;
            gap: 8px;
        }

        .perm-btn {
            border: 0;
            border-radius: 4px;
            padding: 10px 12px;
            font-weight: 700;
            font-size: 13px;
            cursor: pointer;
            flex: 1;
        }

        .perm-btn.done {
            background: var(--btn);
            color: #fff;
        }

        .perm-btn.done:hover { background: var(--btn-hover); }

        .perm-btn.clear {
            background: #fff;
            border: 1px solid #cfd6dd;
            color: #3f5564;
        }

        .perm-btn.clear:hover { background: #f8fafc; }

        .btn-save {
            background: var(--btn);
            border: 0;
            color: #fff;
            width: 100%;
            padding: 12px 14px;
            border-radius: 4px;
            font-weight: 700;
            margin-top: 12px;
            transition: .2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-save:hover { background: var(--btn-hover); }

        /* ===== Responsive ===== */
        @media (max-width: 1100px) {
            body { overflow: auto; }
            .app {
                height: auto;
                grid-template-columns: 1fr;
                grid-template-areas: "table";
            }
            .panel { display: none; }
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

    <div class="title">الموظفين</div>


    <button class="icon-btn" type="button" title="بحث" id="searchBtn">
        <i class="fa-solid fa-magnifying-glass"></i>
    </button>

    <button class="icon-btn" type="button" title="تحديث" onclick="window.location.href='{{ route('admin.employees.index') }}'">
        <i class="fa-solid fa-rotate-right"></i>
    </button>

</div>

<div class="app">

    <!-- Table -->
    <div class="table-wrap">
        <table class="props" id="propsTable">
            <thead>
            <tr>
                <th style="width: 100px;">اسم الموظف</th>
                <th style="width: 100px;">العنوان</th>
                <th style="width: 100px;">الوظيفه</th>
                <th style="width: 100px;">رقم الهاتف</th>
                <th class="t-action">تعديل</th>
                <th class="t-action">حذف</th>
            </tr>
            </thead>

            <tbody>
            @foreach($employees as $employee)
             <tr data-id="{{ $employee->id}}" style="cursor:pointer;">
                <td class="c-real-state-address">{{$employee->name}}</td>
                <td class="c-real-state-price">{{$employee->employee_address}}</td>
                <td class="c-real-state-price">{{$employee->job_title}}</td>
                <td class="c-real-state-price">{{$employee->phone}}</td>

                <td class="t-action">
                    <a style="color: #3f5564" href="{{route('admin.employees.edit',$employee->id)}}" class="js-edit"><i class="fa-solid fa-file-pen"></i></a>
                </td>

                 <td class="t-action">
                     <i class="fa-solid fa-trash text-danger js-delete"></i>
                 </td>


                </tr>
            @endforeach

            </tbody>

        </table>

    </div>

    <!-- Right panel (Desktop Add) -->
    <div class="panel">
        <div class="panel-head">
            <div class="icon"><img src="{{asset('img/icons/people.png')}}"></div>
            <p class="panel-title">تسجيل الموظفين</p>
        </div>


        <form action="{{route('admin.employees.create')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('POST')

            <div class="mb-2">
                <label class="form-label">اسم الموظف</label>
                <input name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       type="text">
                @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">المسمي الوظيفي</label>
                <input name="job_title"
                       class="form-control @error('job_title') is-invalid @enderror"
                       type="text">
                @error('job_title')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">العنوان</label>
                <input name="employee_address"
                       class="form-control @error('employee_address') is-invalid @enderror"
                       type="text">
                @error('employee_address')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">رقم البطاقه</label>
                <input name="card_number"
                       class="form-control @error('card_number') is-invalid @enderror"
                       type="text">
                @error('card_number')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-2">
                <label class="form-label">رقم الهاتف</label>
                <input name="phone"
                       class="form-control @error('phone') is-invalid @enderror"
                       type="text">
                @error('phone')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-2">
                <label class="form-label">كلمه السر</label>
                <input name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       type="text">
                @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-2">
                <label class="form-label">صوره الموظف (اختياري)</label>
                <input type="file"
                       name="employee_image"
                       class="form-control @error('employee_image') is-invalid @enderror">
                @error('employee_image')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2 perm-wrap">
                <label class="form-label">الصلاحيات</label>

                    <label class="perm-item">
                        <span>العقارات</span>
                        <input type="checkbox" name="employee_permissions[]" value="states">
                    </label>

                    <label class="perm-item">
                        <span>الاراضي</span>
                        <input type="checkbox" name="employee_permissions[]" value="lands">
                    </label>

                    <label class="perm-item">
                        <span>المستأجرين</span>
                        <input type="checkbox" name="employee_permissions[]" value="tenants">
                    </label>

                    <label class="perm-item">
                        <span>عقود الايجار</span>
                        <input type="checkbox" name="employee_permissions[]" value="tenant_contracts">
                    </label>

                    <label class="perm-item">
                        <span>سندات القبض</span>
                        <input type="checkbox" name="employee_permissions[]" value="financial_cash">
                    </label>

                    <label class="perm-item">
                        <span>سندات الصرف</span>
                        <input type="checkbox" name="employee_permissions[]" value="financial_receipt">
                    </label>

                    <label class="perm-item">
                        <span>المصروفات</span>
                        <input type="checkbox" name="employee_permissions[]" value="expenses">
                    </label>

                    <label class="perm-item">
                        <span>الموظفين</span>
                        <input type="checkbox" name="employee_permissions[]" value="employees">
                    </label>

                    <label class="perm-item">
                        <span>الدعم الفني</span>
                        <input type="checkbox" name="employee_permissions[]" value="technical_support">
                    </label>

                    <label class="perm-item">
                        <span>الإيرادات</span>
                        <input type="checkbox" name="employee_permissions[]" value="revenues">
                    </label>

                    <label class="perm-item">
                        <span>العملاء</span>
                        <input type="checkbox" name="employee_permissions[]" value="clients">
                    </label>

                    <label class="perm-item">
                        <span>عمولة الموظفين</span>
                        <input type="checkbox" name="employee_permissions[]" value="employee_commission">
                    </label>

                    <label class="perm-item">
                        <span>العقود المنتهيه</span>
                        <input type="checkbox" name="employee_permissions[]" value="expired_contracts">
                    </label>

                    <label class="perm-item">
                        <span>الارباح</span>
                        <input type="checkbox" name="employee_permissions[]" value="profits">
                    </label>

                    <label class="perm-item">
                        <span>اخفاء ارقام العملاء</span>
                        <input type="checkbox" name="employee_permissions[]" value="client_phone_hidden">
                    </label>

                    <label class="perm-item">
                        <span>اخفاء ارقام الملاك</span>
                        <input type="checkbox" name="employee_permissions[]" value="owner_phone_hidden">
                    </label>

                @error('employee_permissions')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                @error('employee_permissions.*')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>


            <button class="btn-save js-submit-loader" type="submit">
        <span class="btn-text">
            <i class="fa-solid fa-left-long"></i>
           تسجيل البيانات
        </span>

                <span class="btn-spinner d-none">
            <span class="spinner-border spinner-border-sm"></span>
            جاري الحفظ...
        </span>
            </button>
        </form>
    </div>

</div>


<!-- Floating + button (mobile) -->
<button class="fab-add" id="openAddModalBtn" type="button" title="إضافة عقار">
    <i class="fa-solid fa-plus"></i>
</button>

<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 520px;">
        <div class="modal-content search-modal">
            <div class="modal-body p-0">
                <div class="panel-modal">
                    <div class="panel-head">
                        <div class="icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                        <p class="panel-title">بحث الموظفين</p>
                    </div>


                    <form action="{{ route('admin.employees.index') }}" method="GET" autocomplete="off">


                        <div class="mb-2">
                            <label class="form-label">اسم الموظف</label>
                            <select name="user_id" class="form-select">
                                <option value="" selected disabled>اسم الموظف</option>
                                @foreach($employees as $employee)
                                    <option value="{{$employee->id}}">{{$employee->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">رقم الهاتف</label>
                            <input name="phone"
                                   class="form-control"
                                   type="text">
                        </div>

                        <div class="mb-2">
                            <label class="form-label">رقم البطاقه</label>
                            <input name="card_number"
                                   class="form-control"
                                   type="text">
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



<!-- Add Modal (Mobile + also can be used on desktop if you want) -->
<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 560px;">
        <div class="modal-content search-modal">
            <div class="modal-body p-0">
                <div class="panel-modal">
                    <div class="panel-head">
                        <div class="icon"><img src="{{asset('img/icons/people.png')}}"></div>
                        <p class="panel-title">تسجيل الموظفين</p>
                    </div>


                    <form action="{{route('admin.employees.create')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('POST')

                        <div class="mb-2">
                            <label class="form-label">اسم الموظف</label>
                            <input name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   type="text">
                            @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">المسمي الوظيفي</label>
                            <input name="job_title"
                                   class="form-control @error('job_title') is-invalid @enderror"
                                   type="text">
                            @error('job_title')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">العنوان</label>
                            <input name="employee_address"
                                   class="form-control @error('employee_address') is-invalid @enderror"
                                   type="text">
                            @error('employee_address')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">رقم البطاقه</label>
                            <input name="card_number"
                                   class="form-control @error('card_number') is-invalid @enderror"
                                   type="text">
                            @error('card_number')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-2">
                            <label class="form-label">رقم الهاتف</label>
                            <input name="phone"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   type="text">
                            @error('phone')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-2">
                            <label class="form-label">كلمه السر</label>
                            <input name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   type="text">
                            @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-2">
                            <label class="form-label">صوره الموظف (اختياري)</label>
                            <input type="file"
                                   name="employee_image"
                                   class="form-control @error('employee_image') is-invalid @enderror">
                            @error('employee_image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2 perm-wrap">
                            <label class="form-label">الصلاحيات</label>

                             <label class="perm-item">
                                    <span>العقارات</span>
                                    <input type="checkbox" name="employee_permissions[]" value="states">
                                </label>

                                <label class="perm-item">
                                    <span>الاراضي</span>
                                    <input type="checkbox" name="employee_permissions[]" value="lands">
                                </label>

                                <label class="perm-item">
                                    <span>المستأجرين</span>
                                    <input type="checkbox" name="employee_permissions[]" value="tenants">
                                </label>

                                <label class="perm-item">
                                    <span>عقود الايجار</span>
                                    <input type="checkbox" name="employee_permissions[]" value="tenant_contracts">
                                </label>

                                <label class="perm-item">
                                    <span>سندات القبض</span>
                                    <input type="checkbox" name="employee_permissions[]" value="financial_cash">
                                </label>

                                <label class="perm-item">
                                    <span>سندات الصرف</span>
                                    <input type="checkbox" name="employee_permissions[]" value="financial_receipt">
                                </label>

                                <label class="perm-item">
                                    <span>المصروفات</span>
                                    <input type="checkbox" name="employee_permissions[]" value="expenses">
                                </label>

                                <label class="perm-item">
                                    <span>الموظفين</span>
                                    <input type="checkbox" name="employee_permissions[]" value="employees">
                                </label>

                                <label class="perm-item">
                                    <span>الدعم الفني</span>
                                    <input type="checkbox" name="employee_permissions[]" value="technical_support">
                                </label>

                                <label class="perm-item">
                                    <span>الإيرادات</span>
                                    <input type="checkbox" name="employee_permissions[]" value="revenues">
                                </label>


                                <label class="perm-item">
                                    <span>العملاء</span>
                                    <input type="checkbox" name="employee_permissions[]" value="clients">
                                </label>

                                <label class="perm-item">
                                    <span>عمولة الموظفين</span>
                                    <input type="checkbox" name="employee_permissions[]" value="employee_commission">
                                </label>

                                <label class="perm-item">
                                    <span>العقود المنتهيه</span>
                                    <input type="checkbox" name="employee_permissions[]" value="expired_contracts">
                                </label>

                                <label class="perm-item">
                                    <span>الارباح</span>
                                    <input type="checkbox" name="employee_permissions[]" value="profits">
                                </label>

                                <label class="perm-item">
                                    <span>اخفاء ارقام العملاء</span>
                                    <input type="checkbox" name="employee_permissions[]" value="client_phone_hidden">
                                </label>

                                <label class="perm-item">
                                    <span>اخفاء ارقام الملاك</span>
                                    <input type="checkbox" name="employee_permissions[]" value="owner_phone_hidden">
                                </label>

                            @error('employee_permissions')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            @error('employee_permissions.*')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                        <button class="btn-save js-submit-loader" type="submit">
        <span class="btn-text">
            <i class="fa-solid fa-left-long"></i>
           تسجيل البيانات
        </span>

                            <span class="btn-spinner d-none">
            <span class="spinner-border spinner-border-sm"></span>
            جاري الحفظ...
        </span>
                        </button>
                    </form>

                </div>


                    <button type="button" class="btn btn-link mt-3 w-100" data-bs-dismiss="modal"
                            style="text-decoration:none;color:#6b7785;">
                        إغلاق
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-0">

                <!-- Loader -->
                <div id="editModalLoader" class="edit-loader">
                    <div class="loader-box">
                        <div class="spinner-border text-primary"></div>
                        <div class="loader-text">جاري تحميل بيانات الموظف...</div>
                    </div>
                </div>
                <!-- Content -->
                <div id="editModalContent" class="d-none"></div>

            </div>
        </div>
    </div>
</div>




<!-- Delete Confirm Modal (Small) -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 420px;">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <i class="fa-solid fa-triangle-exclamation text-danger"></i>
                    <h6 class="m-0 fw-bold">تأكيد الحذف</h6>
                </div>

                <p class="mb-3" style="color:#64748b;font-size:13px;">
                    هل أنت متأكد أنك تريد حذف هذا الموظف؟ لا يمكن التراجع عن هذا الإجراء.
                </p>

                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')

                    <div class="d-flex gap-2">


                        <button type="submit" class="btn btn-danger flex-grow-1 js-submit-loader" id="confirmDeleteBtn">
                        <span class="btn-text">
                           حذف
                        </span>

                            <span class="btn-spinner d-none">
                            <span class="spinner-border spinner-border-sm"></span>
                            جاري الحذف...
                        </span>
                        </button>


                        <button type="button" class="btn btn-light flex-grow-1" data-bs-dismiss="modal">
                            إغلاق
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


@if(session('employee_create'))
    <div id="loginSuccessBar" class="login-success-bar show">
                <i class="fa-solid fa-circle-check" style="margin-left: 5px;"></i>
        {{ session('employee_create') }}
    </div>
@endif

@if(session('employee_update'))
    <div id="loginSuccessBar" class="login-success-bar show">
                <i class="fa-solid fa-circle-check" style="margin-left: 5px;"></i>
        {{ session('employee_update') }}
    </div>
@endif

@if(session('employee_delete'))
    <div id="loginSuccessBar" class="login-success-bar show">
                <i class="fa-solid fa-circle-check" style="margin-left: 5px;"></i>
        {{ session('employee_delete') }}
    </div>
@endif

@if(session('employee_create_error'))
    <div id="loginSuccessBar" class="login-success-bar show">
                <i class="fa-solid fa-circle-check" style="margin-left: 5px;"></i>
        {{ session('employee_create_error') }}
    </div>
@endif

@if(session('employee_limit_error'))
    <div id="loginSuccessBar" class="login-success-bar show">
                <i class="fa-solid fa-circle-check" style="margin-left: 5px;"></i>
        {{ session('employee_limit_error') }}
    </div>
@endif

@if(session('employee_update_error'))
    <div id="loginSuccessBar" class="login-success-bar show">
                <i class="fa-solid fa-circle-check" style="margin-left: 5px;"></i>
        {{ session('employee_update_error') }}
    </div>
@endif

@if(session('employee_index_error'))
    <div id="loginSuccessBar" class="login-success-bar show">
                <i class="fa-solid fa-circle-check" style="margin-left: 5px;"></i>
        {{ session('employee_index_error') }}
    </div>
@endif
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const addModal = new bootstrap.Modal(document.getElementById("addModal"));

    document.getElementById("openAddModalBtn").addEventListener("click", () => {
        const addForm = document.querySelector('#addModal form[action="{{ route('admin.employees.create') }}"]');
        if (addForm) addForm.reset();

        addModal.show();
    });
</script>


<script>
    const searchModal = new bootstrap.Modal(document.getElementById("searchModal"));
    document.getElementById("searchBtn").addEventListener("click", () => {
        const searchForm = document.querySelector('#searchModal form[action="{{ route('admin.employees.index') }}"]');
        if (searchModal) searchForm.reset();
        searchModal.show();
    });
</script>



<script>
    const deleteModal = new bootstrap.Modal(document.getElementById("deleteModal"));
    const deleteForm  = document.getElementById("deleteForm");
    const propsTable  = document.getElementById("propsTable");

    // route فيه placeholder
    const deleteUrlTemplate = `{{ route('admin.employees.delete', ':id') }}`;

    propsTable.addEventListener("click", function (e) {
        const btn = e.target.closest(".js-delete");
        if (!btn) return;

        const row = btn.closest("tr");
        const id  = row.dataset.id;

        if (!id) return;

        // نحط id في الفورم
        deleteForm.action = deleteUrlTemplate.replace(':id', id);

        deleteModal.show();
    });
</script>


{{-- Start Loader and logic with js --}}

<script>
    function activateButtonLoader(button){
        const text = button.querySelector('.btn-text');
        const spinner = button.querySelector('.btn-spinner');

        if (text) text.classList.add('d-none');
        if (spinner) spinner.classList.remove('d-none');

        button.disabled = true;
    }

    document.addEventListener('submit', function (e) {
        const form = e.target;
        if (!(form instanceof HTMLFormElement)) return;

        const btn = form.querySelector('.js-submit-loader');
        if (!btn) return;

        activateButtonLoader(btn);
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

    document.addEventListener('submit', function (e) {
        const form = e.target;
        if (!(form instanceof HTMLFormElement)) return;

        if (form.dataset.form !== 'state') return;

        const btn = form.querySelector('.js-submit-loader');
        if (btn) activateButtonLoader(btn);
    }, true);
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
        .querySelectorAll('form[action="{{ route('admin.employees.index') }}"]')
        .forEach((form) => {
            form.addEventListener('submit', function () {
                const btn = form.querySelector('.js-submit-loader');
                if (btn) activateButtonLoader(btn);
            });
        });
</script>

<script>
    const editModalEl = document.getElementById("editModal");
    const editModal = new bootstrap.Modal(editModalEl);

    const loaderEl  = document.getElementById("editModalLoader");
    const contentEl = document.getElementById("editModalContent");

    document.getElementById("propsTable").addEventListener("click", async (e) => {
        const link = e.target.closest(".js-edit");
        if(!link) return;

        e.preventDefault();

        contentEl.classList.add("d-none");
        loaderEl.classList.remove("d-none");
        editModal.show();

        const minimumDelay = 1000; // 3 ثواني
        const startTime = Date.now();

        try {
            const res = await fetch(link.href, {
                headers: { "X-Requested-With": "XMLHttpRequest" }
            });

            if(!res.ok) throw new Error("Failed to load edit view");

            const html = await res.text();

            // نحسب الوقت اللي عدى
            const elapsed = Date.now() - startTime;
            const remaining = minimumDelay - elapsed;

            // لو خلص بدري نستنى الباقي
            if (remaining > 0) {
                await new Promise(resolve => setTimeout(resolve, remaining));
            }

            contentEl.innerHTML = html;

            loaderEl.classList.add("d-none");
            contentEl.classList.remove("d-none");

        } catch (err) {
            loaderEl.classList.add("d-none");
            contentEl.classList.remove("d-none");

            contentEl.innerHTML = `
                <div class="p-4">
                    <div class="alert alert-danger m-0">
                        حدث خطأ أثناء تحميل صفحة التعديل.
                    </div>
                </div>
            `;
        }
    });
</script>


<script>
    document.querySelectorAll(".perm-wrap").forEach(wrapper => {
        const trigger = wrapper.querySelector(".perm-trigger");
        const panel = wrapper.querySelector(".perm-panel");
        const text = wrapper.querySelector(".perm-text");
        const doneBtn = wrapper.querySelector(".perm-done");
        const clearBtn = wrapper.querySelector(".perm-clear");

        function updatePermText() {
            const selected = [...panel.querySelectorAll('input[type="checkbox"]:checked')]
                .map(x => x.value);

            text.textContent = selected.length ? selected.join(" - ") : "اختر الصلاحيات";
            text.classList.toggle("placeholder", !selected.length);
        }

        // فتح / قفل
        trigger.addEventListener("click", (e) => {
            panel.classList.toggle("open");
            e.stopPropagation();
        });

        // منع القفل عند الضغط داخل القائمة
        panel.addEventListener("click", (e) => {
            e.stopPropagation();
        });

        // قفل عند الضغط خارجها
        document.addEventListener("click", () => {
            panel.classList.remove("open");
        });

        // تحديث النص
        panel.querySelectorAll('input[type="checkbox"]').forEach(cb => {
            cb.addEventListener("change", updatePermText);
        });

        // زر تم
        doneBtn.addEventListener("click", () => {
            updatePermText();
            panel.classList.remove("open");
        });

        // زر مسح
        clearBtn.addEventListener("click", () => {
            panel.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
            updatePermText();
        });

        updatePermText();
    });
</script>

@include('admin.layouts.toast')

</body>
</html>
