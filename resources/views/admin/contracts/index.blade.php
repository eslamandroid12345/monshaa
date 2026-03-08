<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>عقود الايجار</title>

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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
            font-family: system-ui, -apple-system, "Segoe UI", Tahoma, Arial;
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




    </style>
</head>

<body>

<!-- Top bar -->
<div class="app-topbar">

    <button class="icon-btn" type="button" title="رجوع"
            onclick="window.location.href='{{ route('admin.dashboard') }}'">
        <i class="fa-solid fa-arrow-right"></i>
    </button>
    <div class="title">عقود الايجار</div>

    <button class="icon-btn" type="button" title="بحث" id="searchBtn">
        <i class="fa-solid fa-magnifying-glass"></i>
    </button>

    <button class="icon-btn" type="button" title="تحديث" onclick="window.location.href='{{ route('tenant.contracts.index') }}'">
        <i class="fa-solid fa-rotate-right"></i>
    </button>
</div>

<div class="app">

    <!-- Table -->
    <div class="table-wrap">
        <table class="props" id="propsTable">
            <thead>
            <tr>
                <th style="width: 260px;">نوع العقار</th>
                <th style="width: 260px;">اسم المستاجر</th>
                <th style="width: 260px;">رقم هاتف المستاجر</th>
                <th style="width: 260px;">اسم المالك</th>
                <th style="width: 260px;">رقم هاتف المالك</th>
                <th style="width: 260px;">عنوان العقار</th>
                <th class="t-action">طباعه العقد</th>
                <th class="t-action">تعديل</th>
                <th class="t-action">حذف</th>
            </tr>
            </thead>

            <tbody>
            @foreach($contracts as $contract)
                <tr data-id="{{ $contract->id}}" style="cursor:pointer;">
                    <td class="c-id">{{$contract->real_state_type_label}}</td>
                    <td class="c-id">{{$contract->tenant?->name}}</td>
                    <td class="c-id">{{$contract->tenant?->phone}}</td>
                    <td class="c-id">{{$contract->owner_name}}</td>
                    <td class="c-id">{{$contract->owner_phone}}</td>
                    <td class="c-id">{{$contract->real_state_address}}</td>
                    <td class="t-action">
                        <a style="color: #3f5564" href="{{ route('tenant.contracts.show', $contract->id) }}"><i class="fa-solid fa-print"></i></a>
                    </td>
                    <td class="t-action">
                        <a style="color: #3f5564" href="{{route('tenant.contracts.edit',$contract->id)}}" class="js-edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td class="t-action">
                        <i class="fa-solid fa-trash text-danger js-delete"></i>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>

        <div class="card-footer">
            <div>{{ $contracts->appends(request()->query())->links() }}</div>
        </div>
    </div>

    <!-- Right panel (Desktop Add) -->
    <div class="panel">
        <div class="panel-head">
            <div class="icon"><i class="fa-solid fa-file-signature"></i></div>
            <p class="panel-title">تسجيل عقد الايجار</p>
        </div>


        <form action="{{route('tenant.contracts.create')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('POST')

            <div class="mb-2">
                <label class="form-label">اسم المستاجر</label>
                <input name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       type="text">
                @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">رقم هاتف المستاجر</label>
                <input name="phone"
                       class="form-control @error('phone') is-invalid @enderror"
                       type="text">
                @error('phone')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">رقم بطاقه المستاجر</label>
                <input name="card_number"
                       class="form-control @error('card_number') is-invalid @enderror"
                       type="text">
                @error('card_number')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">عنوان المستاجر</label>
                <input name="card_address"
                       class="form-control @error('card_address') is-invalid @enderror"
                       type="text">
                @error('card_address')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">وظيفه المستاجر</label>
                <input name="job_title"
                       class="form-control @error('job_title') is-invalid @enderror"
                       type="text">
                @error('job_title')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-2">
                <label class="form-label">جنسيه المستاجر</label>
                <input name="nationality"
                       class="form-control @error('nationality') is-invalid @enderror"
                       type="text">
                @error('nationality')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>




            <div class="mb-2">
                <label class="form-label">اسم المالك</label>
                <input name="owner_name"
                       class="form-control @error('owner_name') is-invalid @enderror"
                       type="text">
                @error('owner_name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">رقم هاتف المالك</label>
                <input name="owner_phone"
                       class="form-control @error('owner_phone') is-invalid @enderror"
                       type="text">
                @error('owner_phone')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">رقم بطاقه المالك</label>
                <input name="owner_card_number"
                       class="form-control @error('owner_card_number') is-invalid @enderror"
                       type="text">
                @error('owner_card_number')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">عنوان المالك</label>
                <input name="owner_card_address"
                       class="form-control @error('owner_card_address') is-invalid @enderror"
                       type="text">
                @error('owner_card_address')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">وظيفه المالك</label>
                <input name="owner_job_title"
                       class="form-control @error('owner_job_title') is-invalid @enderror"
                       type="text">
                @error('owner_job_title')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-2">
                <label class="form-label">جنسيه المالك</label>
                <input name="owner_nationality"
                       class="form-control @error('owner_nationality') is-invalid @enderror"
                       type="text">
                @error('owner_nationality')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">عنوان العقار</label>
                <input name="real_state_address"
                       class="form-control @error('real_state_address') is-invalid @enderror"
                       type="text">
                @error('real_state_address')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">المحافظه التابع لها العقار*</label>
                <input name="governorate"
                       class="form-control @error('governorate') is-invalid @enderror"
                       type="text">
                @error('governorate')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">عنوان العقار تفصيلي</label>
                <input name="real_state_address_details"
                       class="form-control @error('real_state_address_details') is-invalid @enderror"
                       type="text">
                @error('real_state_address_details')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>



            <div class="mb-2">
                <label class="form-label">نوع العقار</label>
                <select name="real_state_type" class="form-select @error('real_state_type') is-invalid @enderror">
                    <option disabled>نوع العقار</option>
                    <option value="empty_apartment" >شقة فارغه</option>
                    <option value="furnished_apartment">شقة مفروشه</option>
                    <option value="empty_villa" >فيلا فارغه</option>
                    <option value="furnished_villa" >فيلا مفروشه</option>
                    <option value="empty_office" >مكتب اداري فارغ</option>
                    <option value="furnished_office" >مكتب اداري مفروش</option>
                    <option value="shop" >محل</option>
                </select>
                @error('real_state_type')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">المساحة</label>
                <input name="real_state_space"
                       class="form-control @error('real_state_space') is-invalid @enderror"
                       type="number" min="1">
                @error('real_state_space')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-2">
                <label class="form-label">رقم الشقة</label>
                <input name="apartment_number"
                       class="form-control @error('apartment_number') is-invalid @enderror"
                       type="number" min="1">
                @error('apartment_number')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">رقم العمارة</label>
                <input name="building_number"
                       class="form-control @error('building_number') is-invalid @enderror"
                       type="number" min="1">
                @error('building_number')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-2">
                <label class="form-label">تاريخ تسجيل العقد*</label>
                <input name="contract_date"
                       class="form-control @error('contract_date') is-invalid @enderror"
                       type="date">
                @error('contract_date')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-2">
                <label class="form-label">الايجار من</label>
                <input name="contract_date_from"
                       class="form-control @error('contract_date_from') is-invalid @enderror"
                       type="date">
                @error('contract_date_from')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">الايجار الي</label>
                <input name="contract_date_to"
                       class="form-control @error('contract_date_to') is-invalid @enderror"
                       type="date">
                @error('contract_date_to')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-2">
                <label class="form-label">قيمه التامين</label>
                <input name="insurance_total"
                       class="form-control @error('insurance_total') is-invalid @enderror"
                       type="number" min="1">
                @error('insurance_total')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="commission-box">

                <div class="mb-2">
                    <label class="form-label">قيمه الايجار</label>
                    <input name="contract_total"
                           class="form-control js-contract-total @error('contract_total') is-invalid @enderror"
                           type="number" min="1" step="0.01">

                    @error('contract_total')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-2">
                    <label class="form-label">نوع العموله</label>
                    <select name="commission_type"
                            class="form-select js-commission-type @error('commission_type') is-invalid @enderror">

                        <option value="" disabled selected>نوع العموله</option>
                        <option value="per">بال %</option>
                        <option value="val">مبلغ</option>

                    </select>

                    @error('commission_type')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-2">
                    <label class="form-label">ادخل النسبه او المبلغ*</label>
                    <input name="commission_per"
                           class="form-control js-commission-per @error('commission_per') is-invalid @enderror"
                           type="number" min="1" step="0.01">

                    @error('commission_per')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-2">
                    <label class="form-label">قيمه العموله</label>
                    <input name="commission"
                           class="form-control js-commission-result @error('commission') is-invalid @enderror"
                           type="number" min="1" step="0.01" readonly>

                    @error('commission')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="mb-2">
                <label class="form-label">نوع التحصيل</label>
                <select name="cash_type" class="form-select @error('cash_type') is-invalid @enderror">
                    <option disabled>نوع التحصيل</option>
                    <option value="owner" >تحصيل الايجار من خلال المالك</option>
                    <option value="company">تحصيل الايجار من خلال الشركه</option>
                </select>
                @error('cash_type')
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
                        <p class="panel-title">بحث عقود الايجار</p>
                    </div>


                    <form action="{{ route('tenant.contracts.index') }}" method="GET" autocomplete="off">

                        <div class="mb-2">
                            <label class="form-label">رقم هاتف المالك</label>
                            <input name="owner_phone"
                                   class="form-control"
                                   type="text">
                        </div>

                        <div class="mb-2">
                            <label class="form-label">رقم بطاقه المالك</label>
                            <input name="owner_card_number"
                                   class="form-control"
                                   type="text">
                        </div>

                        <div class="mb-2">
                            <label class="form-label">رقم هاتف المستاجر</label>
                            <input name="tenant_phone"
                                   class="form-control"
                                   type="text">
                        </div>

                        <div class="mb-2">
                            <label class="form-label">رقم بطاقه المستاجر</label>
                            <input name="tenant_card_number"
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
                        <div class="icon"><i class="fa-solid fa-file-signature"></i></div>
                        <p class="panel-title">تسجيل عقود الايجار</p>
                    </div>


                    <form action="{{route('tenant.contracts.create')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('POST')

                        <div class="mb-2">
                            <label class="form-label">اسم المستاجر</label>
                            <input name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   type="text">
                            @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">رقم هاتف المستاجر</label>
                            <input name="phone"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   type="text">
                            @error('phone')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">رقم بطاقه المستاجر</label>
                            <input name="card_number"
                                   class="form-control @error('card_number') is-invalid @enderror"
                                   type="text">
                            @error('card_number')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">عنوان المستاجر</label>
                            <input name="card_address"
                                   class="form-control @error('card_address') is-invalid @enderror"
                                   type="text">
                            @error('card_address')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">وظيفه المستاجر</label>
                            <input name="job_title"
                                   class="form-control @error('job_title') is-invalid @enderror"
                                   type="text">
                            @error('job_title')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-2">
                            <label class="form-label">جنسيه المستاجر</label>
                            <input name="nationality"
                                   class="form-control @error('nationality') is-invalid @enderror"
                                   type="text">
                            @error('nationality')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>




                        <div class="mb-2">
                            <label class="form-label">اسم المالك</label>
                            <input name="owner_name"
                                   class="form-control @error('owner_name') is-invalid @enderror"
                                   type="text">
                            @error('owner_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">رقم هاتف المالك</label>
                            <input name="owner_phone"
                                   class="form-control @error('owner_phone') is-invalid @enderror"
                                   type="text">
                            @error('owner_phone')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">رقم بطاقه المالك</label>
                            <input name="owner_card_number"
                                   class="form-control @error('owner_card_number') is-invalid @enderror"
                                   type="text">
                            @error('owner_card_number')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">عنوان المالك</label>
                            <input name="owner_card_address"
                                   class="form-control @error('owner_card_address') is-invalid @enderror"
                                   type="text">
                            @error('owner_card_address')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">وظيفه المالك</label>
                            <input name="owner_job_title"
                                   class="form-control @error('owner_job_title') is-invalid @enderror"
                                   type="text">
                            @error('owner_job_title')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-2">
                            <label class="form-label">جنسيه المالك</label>
                            <input name="owner_nationality"
                                   class="form-control @error('owner_nationality') is-invalid @enderror"
                                   type="text">
                            @error('owner_nationality')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">عنوان العقار</label>
                            <input name="real_state_address"
                                   class="form-control @error('real_state_address') is-invalid @enderror"
                                   type="text">
                            @error('real_state_address')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">المحافظه التابع لها العقار*</label>
                            <input name="governorate"
                                   class="form-control @error('governorate') is-invalid @enderror"
                                   type="text">
                            @error('governorate')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">عنوان العقار تفصيلي</label>
                            <input name="real_state_address_details"
                                   class="form-control @error('real_state_address_details') is-invalid @enderror"
                                   type="text">
                            @error('real_state_address_details')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="mb-2">
                            <label class="form-label">نوع العقار</label>
                            <select name="real_state_type" class="form-select @error('real_state_type') is-invalid @enderror">
                                <option disabled>نوع العقار</option>
                                <option value="empty_apartment" >شقة فارغه</option>
                                <option value="furnished_apartment">شقة مفروشه</option>
                                <option value="empty_villa" >فيلا فارغه</option>
                                <option value="furnished_villa" >فيلا مفروشه</option>
                                <option value="empty_office" >مكتب اداري فارغ</option>
                                <option value="furnished_office" >مكتب اداري مفروش</option>
                                <option value="shop" >محل</option>
                            </select>
                            @error('real_state_type')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">المساحة</label>
                            <input name="real_state_space"
                                   class="form-control @error('real_state_space') is-invalid @enderror"
                                   type="number" min="1">
                            @error('real_state_space')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-2">
                            <label class="form-label">رقم الشقة</label>
                            <input name="apartment_number"
                                   class="form-control @error('apartment_number') is-invalid @enderror"
                                   type="number" min="1">
                            @error('apartment_number')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">رقم العمارة</label>
                            <input name="building_number"
                                   class="form-control @error('building_number') is-invalid @enderror"
                                   type="number" min="1">
                            @error('building_number')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-2">
                            <label class="form-label">تاريخ تسجيل العقد*</label>
                            <input name="contract_date"
                                   class="form-control @error('contract_date') is-invalid @enderror"
                                   type="date">
                            @error('contract_date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-2">
                            <label class="form-label">الايجار من</label>
                            <input name="contract_date_from"
                                   class="form-control @error('contract_date_from') is-invalid @enderror"
                                   type="date">
                            @error('contract_date_from')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">الايجار الي</label>
                            <input name="contract_date_to"
                                   class="form-control @error('contract_date_to') is-invalid @enderror"
                                   type="date">
                            @error('contract_date_to')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-2">
                            <label class="form-label">قيمه التامين</label>
                            <input name="insurance_total"
                                   class="form-control @error('insurance_total') is-invalid @enderror"
                                   type="number" min="1">
                            @error('insurance_total')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="commission-box">

                            <div class="mb-2">
                                <label class="form-label">قيمه الايجار</label>
                                <input name="contract_total"
                                       class="form-control js-contract-total @error('contract_total') is-invalid @enderror"
                                       type="number" min="1" step="0.01">

                                @error('contract_total')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-2">
                                <label class="form-label">نوع العموله</label>
                                <select name="commission_type"
                                        class="form-select js-commission-type @error('commission_type') is-invalid @enderror">

                                    <option value="" disabled selected>نوع العموله</option>
                                    <option value="per">بال %</option>
                                    <option value="val">مبلغ</option>

                                </select>

                                @error('commission_type')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-2">
                                <label class="form-label">ادخل النسبه او المبلغ*</label>
                                <input name="commission_per"
                                       class="form-control js-commission-per @error('commission_per') is-invalid @enderror"
                                       type="number" min="1" step="0.01">

                                @error('commission_per')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-2">
                                <label class="form-label">قيمه العموله</label>
                                <input name="commission"
                                       class="form-control js-commission-result @error('commission') is-invalid @enderror"
                                       type="number" min="1" step="0.01" readonly>

                                @error('commission')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>


                        <div class="mb-2">
                            <label class="form-label">نوع التحصيل</label>
                            <select name="cash_type" class="form-select @error('cash_type') is-invalid @enderror">
                                <option disabled>نوع التحصيل</option>
                                <option value="owner" >تحصيل الايجار من خلال المالك</option>
                                <option value="company">تحصيل الايجار من خلال الشركه</option>
                            </select>
                            @error('cash_type')
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
                        <div class="loader-text">جاري تحميل بيانات عقد الايجار...</div>
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
                    هل أنت متأكد أنك تريد حذف هذا العقد؟ لا يمكن التراجع عن هذا الإجراء.
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const addModal = new bootstrap.Modal(document.getElementById("addModal"));

    document.getElementById("openAddModalBtn").addEventListener("click", () => {
        const addForm = document.querySelector('#addModal form[action="{{ route('tenant.contracts.create') }}"]');
        if (addForm) addForm.reset();

        addModal.show();
    });
</script>


<script>
    const searchModal = new bootstrap.Modal(document.getElementById("searchModal"));
    document.getElementById("searchBtn").addEventListener("click", () => {
        const searchForm = document.querySelector('#searchModal form[action="{{ route('tenant.contracts.index') }}"]');
        if (searchModal) searchForm.reset();
        searchModal.show();
    });
</script>



<script>
    const deleteModal = new bootstrap.Modal(document.getElementById("deleteModal"));
    const deleteForm  = document.getElementById("deleteForm");
    const propsTable  = document.getElementById("propsTable");

    // route فيه placeholder
    const deleteUrlTemplate = `{{ route('tenant.contracts.delete', ':id') }}`;

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
        .querySelectorAll('form[action="{{ route('tenant.contracts.index') }}"]')
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
    document.addEventListener('input', function (e) {

        const box = e.target.closest('.commission-box');
        if (!box) return;

        const contractTotal = parseFloat(box.querySelector('.js-contract-total')?.value) || 0;
        const commissionType = box.querySelector('.js-commission-type')?.value;
        const commissionPer = parseFloat(box.querySelector('.js-commission-per')?.value) || 0;

        const commissionInput = box.querySelector('.js-commission-result');

        let result = 0;

        if (commissionType === 'per') {
            result = (contractTotal * commissionPer) / 100;
        } else if (commissionType === 'val') {
            result = commissionPer;
        }

        if (commissionInput) {
            commissionInput.value = result ? result.toFixed(2) : '';
        }

    });
</script>
</body>
</html>
