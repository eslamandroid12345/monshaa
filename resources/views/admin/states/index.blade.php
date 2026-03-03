<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>العقارات</title>

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
    <button class="icon-btn" type="button" title="بحث" id="searchBtn">
        <i class="fa-solid fa-magnifying-glass"></i>
    </button>

    <button class="icon-btn" type="button" title="تحديث" onclick="window.location.href='{{ route('states.index') }}'">
        <i class="fa-solid fa-rotate-right"></i>
    </button>

    <div class="title">العقارات</div>

    <button class="icon-btn" type="button" title="رجوع"
            onclick="window.location.href='{{ route('admin.dashboard') }}'">
        <i class="fa-solid fa-arrow-left"></i>
    </button>
</div>

<div class="app">

    <!-- Table -->
    <div class="table-wrap">
        <table class="props" id="propsTable">
            <thead>
            <tr>
                <th style="width: 260px;">كود الاعلان</th>
                <th style="width: 260px;">العنوان</th>
                <th style="width: 180px;">القسم</th>
                <th style="width: 160px;">السعر</th>
                <th style="width: 200px;">النوع</th>
                <th style="width: 200px;">نوع المعلن</th>
                <th class="t-action">تعديل</th>
                <th class="t-action">حذف</th>
            </tr>
            </thead>

            <tbody>
            @foreach($states as $state)
             <tr data-id="{{ $state->id}}" style="cursor:pointer;">
                 <td class="c-id" onclick="window.location='{{ route('admin.state.show', $state->id) }}'">{{$state->id}}</td>
                <td class="c-real-state-address" onclick="window.location='{{ route('admin.state.show', $state->id) }}'">{{$state->real_state_address}}</td>
                <td class="c-department" onclick="window.location='{{ route('admin.state.show', $state->id) }}'">{{$state->department == 'rent' ? 'ايجار' : 'بيع'}}</td>
                <td class="c-real-state-price" onclick="window.location='{{ route('admin.state.show', $state->id) }}'">{{$state->real_state_price}}</td>
                <td class="c-real-state-type-label" onclick="window.location='{{ route('admin.state.show', $state->id) }}'">{{$state->real_state_type_label}}</td>
                <td class="c-advertiser-type" onclick="window.location='{{ route('admin.state.show', $state->id) }}'">{{$state->advertiser_type == 'real_state_owner' ? 'صاحب عقار' : 'شركه عقارات'}}</td>
                <td class="t-action">
                    <a href="{{route('admin.states.edit',$state->id)}}" class="js-edit"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
                <td class="t-action">
                    <i class="fa-solid fa-trash text-danger js-delete"></i>
                </td>
                </tr>
            @endforeach

            </tbody>

        </table>

        <div class="card-footer">
            <div>{{ $states->appends(request()->query())->links() }}</div>
        </div>
    </div>

    <!-- Right panel (Desktop Add) -->
    <div class="panel">
        <div class="panel-head">
            <div class="icon"><i class="fa-solid fa-building"></i></div>
            <p class="panel-title">تسجيل العقارات</p>
        </div>


        <form action="{{route('admin.state.create')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('POST')

            <div class="mb-2">
                <label class="form-label">اسم المجمع السكني (اختياري) - الكمبوند</label>
                <input name="compound_name"
                       class="form-control @error('compound_name') is-invalid @enderror"
                       type="text">
                @error('compound_name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">عنوان العقار (اختياري)</label>
                <input name="real_state_address"
                       class="form-control @error('real_state_address') is-invalid @enderror"
                       type="text">
                @error('real_state_address')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">عنوان العقار بالتفصيل</label>
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
                <label class="form-label">القسم</label>
                <select name="department" class="form-select @error('department') is-invalid @enderror">
                    <option disabled>القسم</option>
                    <option value="rent">ايجار</option>
                    <option value="sale">بيع</option>
                </select>
                @error('department')
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
                <label class="form-label">السعر</label>
                <input name="real_state_price"
                       class="form-control @error('real_state_price') is-invalid @enderror"
                       type="number" min="1">
                @error('real_state_price')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">رقم الشقة (اختياري)</label>
                <input name="apartment_number"
                       class="form-control @error('apartment_number') is-invalid @enderror"
                       type="number" min="1">
                @error('apartment_number')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">رقم العمارة (اختياري)</label>
                <input name="building_number"
                       class="form-control @error('building_number') is-invalid @enderror"
                       type="number" min="1">
                @error('building_number')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">عدد الغرف (غير مطلوب.)</label>
                <input name="number_of_rooms"
                       class="form-control @error('number_of_rooms') is-invalid @enderror"
                       type="number" min="0">
                @error('number_of_rooms')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label"> عدد الحمامات (غير مطلوب.)</label>
                <input name="number_of_bathrooms"
                       class="form-control @error('number_of_bathrooms') is-invalid @enderror"
                       type="number" min="0">
                @error('number_of_bathrooms')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">نوع المعلن</label>
                <select name="advertiser_type" class="form-select @error('advertiser_type') is-invalid @enderror">
                    <option disabled>نوع المعلن</option>
                    <option value="real_state_owner">صاحب عقار</option>
                    <option value="real_state_company">شركه عقارات</option>
                </select>
                @error('advertiser_type')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">اسم المالك / الوسيط</label>
                <input name="advertiser_name"
                       class="form-control @error('advertiser_name') is-invalid @enderror"
                       type="text">
                @error('advertiser_name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">رقم هاتف المالك / الوسيط</label>
                <input name="advertised_phone_number"
                       class="form-control @error('advertised_phone_number') is-invalid @enderror"
                       type="text">
                @error('advertised_phone_number')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">تفاصيل العقار (غير مطلوب.)</label>
                <textarea name="advertise_details"
                          class="form-control @error('advertise_details') is-invalid @enderror"
                          rows="5"></textarea>
                @error('advertise_details')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">التاريخ</label>
                <input name="state_date_register"
                       class="form-control @error('state_date_register') is-invalid @enderror"
                       type="date">
                @error('state_date_register')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label class="form-label">صور العقار (اختياري)</label>
                <input type="file"
                       name="real_state_images[]"
                       class="form-control @error('real_state_images') is-invalid @enderror @error('real_state_images.*') is-invalid @enderror"
                       multiple>
                {{-- لو عملت validation على real_state_images أو real_state_images.* --}}
                @error('real_state_images')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                @error('real_state_images.*')
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
        </form>    </div>

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
                        <p class="panel-title">بحث العقارات</p>
                    </div>


                    <form action="{{route('states.index')}}" method="GET" autocomplete="off">

                    <div class="mb-2">
                        <label class="form-label">اسم المجمع السكني - الكمبوند</label>
                        <input name="compound_name" value="{{ old('compound_name') }}" class="form-control" type="text">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">عنوان العقار</label>
                        <input name="real_state_address" class="form-control" type="text" placeholder="">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">اسم الموظف</label>
                        <select name="user_id" class="form-select">
                            <option value="" selected disabled>اسم الموظف</option>
                            <option>محمد احمد</option>
                            <option>راضي محمد</option>
                            <option>راضي محمد</option>
                            <option>راضي محمد</option>
                            <option>راضي محمد</option>
                            <option>راضي محمد</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">القسم</label>
                        <select name="department" class="form-select">
                            <option disabled {{ old('department') ? '' : 'selected' }}>القسم</option>
                            <option value="rent" {{ old('department') == 'rent' ? 'selected' : '' }}>ايجار</option>
                            <option value="sale" {{ old('department') == 'sale' ? 'selected' : '' }}>بيع</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">اقل سعر</label>
                        <input name="lowest_price" class="form-control" type="number" placeholder="">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">اعلي سعر</label>
                        <input name="highest_space" class="form-control" type="number" placeholder="">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">اقل مساحة</label>
                        <input name="lowest_space" class="form-control" type="number" placeholder="">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">اعلى مساحة</label>
                        <input name="highest_space" class="form-control" type="number" placeholder="">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">نوع العقار</label>
                        <select name="real_state_type" class="form-select">
                            <option disabled {{ old('real_state_type') ? '' : 'selected' }}>نوع العقار</option>
                            <option value="empty_apartment" {{ old('real_state_type') == 'empty_apartment' ? 'selected' : '' }}>شقة فارغه</option>
                            <option value="furnished_apartment" {{ old('real_state_type') == 'furnished_apartment' ? 'selected' : '' }}>شقة مفروشه</option>
                            <option value="empty_villa" {{ old('real_state_type') == 'empty_villa' ? 'selected' : '' }}>فيلا فارغه</option>
                            <option value="furnished_villa" {{ old('real_state_type') == 'furnished_villa' ? 'selected' : '' }}>فيلا مفروشه</option>
                            <option value="empty_office" {{ old('real_state_type') == 'empty_office' ? 'selected' : '' }}>مكتب اداري فارغ</option>
                            <option value="furnished_office" {{ old('real_state_type') == 'furnished_office' ? 'selected' : '' }}>مكتب اداري مفروش</option>
                            <option value="shop" {{ old('real_state_type') == 'shop' ? 'selected' : '' }}>محل</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">كود الإعلان</label>
                        <input name="code" class="form-control" type="text" placeholder="">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">نوع المعلن</label>
                        <select name="advertiser_type" class="form-select">
                            <option disabled {{ old('advertiser_type') ? '' : 'selected' }}>نوع المعلن</option>
                            <option value="real_state_owner" {{ old('advertiser_type') == 'real_state_owner' ? 'selected' : '' }}>صاحب عقار</option>
                            <option value="real_state_company" {{ old('advertiser_type') == 'real_state_company' ? 'selected' : '' }}>شركه عقارات</option>
                        </select>
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
                        <div class="icon"><i class="fa-solid fa-building"></i></div>
                        <p class="panel-title">تسجيل العقارات</p>
                    </div>


                    <form action="{{route('admin.state.create')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('POST')

                        <div class="mb-2">
                            <label class="form-label">اسم المجمع السكني (اختياري) - الكمبوند</label>
                            <input name="compound_name"
                                   value="{{ old('compound_name') }}"
                                   class="form-control @error('compound_name') is-invalid @enderror"
                                   type="text">
                            @error('compound_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">عنوان العقار (اختياري)</label>
                            <input name="real_state_address"
                                   value="{{ old('real_state_address') }}"
                                   class="form-control @error('real_state_address') is-invalid @enderror"
                                   type="text">
                            @error('real_state_address')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">عنوان العقار بالتفصيل</label>
                            <input name="real_state_address_details"
                                   value="{{ old('real_state_address_details') }}"
                                   class="form-control @error('real_state_address_details') is-invalid @enderror"
                                   type="text">
                            @error('real_state_address_details')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">نوع العقار</label>
                            <select name="real_state_type" class="form-select @error('real_state_type') is-invalid @enderror">
                                <option disabled {{ old('real_state_type') ? '' : 'selected' }}>نوع العقار</option>
                                <option value="empty_apartment" {{ old('real_state_type') == 'empty_apartment' ? 'selected' : '' }}>شقة فارغه</option>
                                <option value="furnished_apartment" {{ old('real_state_type') == 'furnished_apartment' ? 'selected' : '' }}>شقة مفروشه</option>
                                <option value="empty_villa" {{ old('real_state_type') == 'empty_villa' ? 'selected' : '' }}>فيلا فارغه</option>
                                <option value="furnished_villa" {{ old('real_state_type') == 'furnished_villa' ? 'selected' : '' }}>فيلا مفروشه</option>
                                <option value="empty_office" {{ old('real_state_type') == 'empty_office' ? 'selected' : '' }}>مكتب اداري فارغ</option>
                                <option value="furnished_office" {{ old('real_state_type') == 'furnished_office' ? 'selected' : '' }}>مكتب اداري مفروش</option>
                                <option value="shop" {{ old('real_state_type') == 'shop' ? 'selected' : '' }}>محل</option>
                            </select>
                            @error('real_state_type')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">القسم</label>
                            <select name="department" class="form-select @error('department') is-invalid @enderror">
                                <option disabled {{ old('department') ? '' : 'selected' }}>القسم</option>
                                <option value="rent" {{ old('department') == 'rent' ? 'selected' : '' }}>ايجار</option>
                                <option value="sale" {{ old('department') == 'sale' ? 'selected' : '' }}>بيع</option>
                            </select>
                            @error('department')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">المساحة</label>
                            <input name="real_state_space"
                                   value="{{ old('real_state_space') }}"
                                   class="form-control @error('real_state_space') is-invalid @enderror"
                                   type="number" min="1">
                            @error('real_state_space')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">السعر</label>
                            <input name="real_state_price"
                                   value="{{ old('real_state_price') }}"
                                   class="form-control @error('real_state_price') is-invalid @enderror"
                                   type="number" min="1">
                            @error('real_state_price')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">رقم الشقة (اختياري)</label>
                            <input name="apartment_number"
                                   value="{{ old('apartment_number') }}"
                                   class="form-control @error('apartment_number') is-invalid @enderror"
                                   type="number" min="1">
                            @error('apartment_number')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">رقم العمارة (اختياري)</label>
                            <input name="building_number"
                                   value="{{ old('building_number') }}"
                                   class="form-control @error('building_number') is-invalid @enderror"
                                   type="number" min="1">
                            @error('building_number')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">عدد الغرف (غير مطلوب.)</label>
                            <input name="number_of_rooms"
                                   value="{{ old('number_of_rooms') }}"
                                   class="form-control @error('number_of_rooms') is-invalid @enderror"
                                   type="number" min="0">
                            @error('number_of_rooms')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label"> عدد الحمامات (غير مطلوب.)</label>
                            <input name="number_of_bathrooms"
                                   value="{{ old('number_of_bathrooms') }}"
                                   class="form-control @error('number_of_bathrooms') is-invalid @enderror"
                                   type="number" min="0">
                            @error('number_of_bathrooms')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">نوع المعلن</label>
                            <select name="advertiser_type" class="form-select @error('advertiser_type') is-invalid @enderror">
                                <option disabled {{ old('advertiser_type') ? '' : 'selected' }}>نوع المعلن</option>
                                <option value="real_state_owner" {{ old('advertiser_type') == 'real_state_owner' ? 'selected' : '' }}>صاحب عقار</option>
                                <option value="real_state_company" {{ old('advertiser_type') == 'real_state_company' ? 'selected' : '' }}>شركه عقارات</option>
                            </select>
                            @error('advertiser_type')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">اسم المالك / الوسيط</label>
                            <input name="advertiser_name"
                                   value="{{ old('advertiser_name') }}"
                                   class="form-control @error('advertiser_name') is-invalid @enderror"
                                   type="text">
                            @error('advertiser_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">رقم هاتف المالك / الوسيط</label>
                            <input name="advertised_phone_number"
                                   value="{{ old('advertised_phone_number') }}"
                                   class="form-control @error('advertised_phone_number') is-invalid @enderror"
                                   type="text">
                            @error('advertised_phone_number')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">تفاصيل العقار (غير مطلوب.)</label>
                            <textarea name="advertise_details"
                                      class="form-control @error('advertise_details') is-invalid @enderror"
                                      rows="5">{{ old('advertise_details') }}</textarea>
                            @error('advertise_details')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">التاريخ</label>
                            <input name="state_date_register"
                                   value="{{ old('state_date_register') }}"
                                   class="form-control @error('state_date_register') is-invalid @enderror"
                                   type="date">
                            @error('state_date_register')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">صور العقار (اختياري)</label>
                            <input type="file"
                                   name="real_state_images[]"
                                   class="form-control @error('real_state_images') is-invalid @enderror @error('real_state_images.*') is-invalid @enderror"
                                   multiple>
                            {{-- لو عملت validation على real_state_images أو real_state_images.* --}}
                            @error('real_state_images')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            @error('real_state_images.*')
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
                        <div class="loader-text">جاري تحميل بيانات العقار...</div>
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
                    هل أنت متأكد أنك تريد حذف هذا العقار؟ لا يمكن التراجع عن هذا الإجراء.
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
        const addForm = document.querySelector('#addModal form[action="{{ route('admin.state.create') }}"]');
        if (addForm) addForm.reset();

        addModal.show();
    });
</script>


<script>
    const searchModal = new bootstrap.Modal(document.getElementById("searchModal"));
    document.getElementById("searchBtn").addEventListener("click", () => {
        const searchForm = document.querySelector('#searchModal form[action="{{ route('states.index') }}"]');
        if (searchModal) searchForm.reset();
        searchModal.show();
    });
</script>



<script>
    const deleteModal = new bootstrap.Modal(document.getElementById("deleteModal"));
    const deleteForm  = document.getElementById("deleteForm");
    const propsTable  = document.getElementById("propsTable");

    // route فيه placeholder
    const deleteUrlTemplate = `{{ route('admin.state.destroy', ':id') }}`;

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
        .querySelectorAll('form[action="{{ route('states.index') }}"]')
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

</body>
</html>
