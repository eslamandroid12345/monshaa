<div class="p-4">
    <div class="panel-head">
        <div class="icon"><i class="fa-solid fa-file-signature"></i></div>
        <p class="panel-title">تعديل بيانات عقد الايجار</p>
    </div>

    <form data-form="state" action="{{ route('tenant.contracts.update', $contract->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        @method('POST')

        <input type="hidden" name="tenant_id" value="{{ $contract->tenant_id }}">
        <div class="mb-2">
            <label class="form-label">اسم المستاجر</label>
            <input name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   type="text"
                   value="{{ $contract->tenant?->name }}">
            @error('name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">رقم هاتف المستاجر</label>
            <input name="phone"
                   class="form-control @error('phone') is-invalid @enderror"
                   type="text"
                   value="{{ $contract->tenant?->phone }}">
            @error('phone')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">رقم بطاقه المستاجر</label>
            <input name="card_number"
                   class="form-control @error('card_number') is-invalid @enderror"
                   type="text"
                   value="{{ $contract->tenant?->card_number }}">
            @error('card_number')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">عنوان المستاجر</label>
            <input name="card_address"
                   class="form-control @error('card_address') is-invalid @enderror"
                   type="text"
                   value="{{ $contract->tenant?->card_address }}">
            @error('card_address')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">وظيفه المستاجر</label>
            <input name="job_title"
                   class="form-control @error('job_title') is-invalid @enderror"
                   type="text"
                   value="{{$contract->tenant?->job_title }}">
            @error('job_title')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">جنسيه المستاجر</label>
            <input name="nationality"
                   class="form-control @error('nationality') is-invalid @enderror"
                   type="text"
                   value="{{$contract->tenant?->nationality }}">
            @error('nationality')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">اسم المالك</label>
            <input name="owner_name"
                   class="form-control @error('owner_name') is-invalid @enderror"
                   type="text"
                   value="{{ $contract->owner_name }}">
            @error('owner_name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">رقم هاتف المالك</label>
            <input name="owner_phone"
                   class="form-control @error('owner_phone') is-invalid @enderror"
                   type="text"
                   value="{{ $contract->owner_phone }}">
            @error('owner_phone')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">رقم بطاقه المالك</label>
            <input name="owner_card_number"
                   class="form-control @error('owner_card_number') is-invalid @enderror"
                   type="text"
                   value="{{ $contract->owner_card_number }}">
            @error('owner_card_number')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">عنوان المالك</label>
            <input name="owner_card_address"
                   class="form-control @error('owner_card_address') is-invalid @enderror"
                   type="text"
                   value="{{ $contract->owner_card_address }}">
            @error('owner_card_address')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">وظيفه المالك</label>
            <input name="owner_job_title"
                   class="form-control @error('owner_job_title') is-invalid @enderror"
                   type="text"
                   value="{{ $contract->owner_job_title }}">
            @error('owner_job_title')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">جنسيه المالك</label>
            <input name="owner_nationality"
                   class="form-control @error('owner_nationality') is-invalid @enderror"
                   type="text"
                   value="{{ $contract->owner_nationality }}">
            @error('owner_nationality')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">عنوان العقار</label>
            <input name="real_state_address"
                   class="form-control @error('real_state_address') is-invalid @enderror"
                   type="text"
                   value="{{ $contract->real_state_address }}">
            @error('real_state_address')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">المحافظه التابع لها العقار*</label>
            <input name="governorate"
                   class="form-control @error('governorate') is-invalid @enderror"
                   type="text"
                   value="{{ $contract->governorate }}">
            @error('governorate')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">عنوان العقار تفصيلي</label>
            <input name="real_state_address_details"
                   class="form-control @error('real_state_address_details') is-invalid @enderror"
                   type="text"
                   value="{{ $contract->real_state_address_details }}">
            @error('real_state_address_details')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">نوع العقار</label>
            <select name="real_state_type" class="form-select @error('real_state_type') is-invalid @enderror">
                <option disabled {{ !$contract->real_state_type ? 'selected' : '' }}>نوع العقار</option>
                <option value="empty_apartment" {{ $contract->real_state_type == 'empty_apartment' ? 'selected' : '' }}>شقة فارغه</option>
                <option value="furnished_apartment" {{ $contract->real_state_type == 'furnished_apartment' ? 'selected' : '' }}>شقة مفروشه</option>
                <option value="empty_villa" {{ $contract->real_state_type == 'empty_villa' ? 'selected' : '' }}>فيلا فارغه</option>
                <option value="furnished_villa" {{ $contract->real_state_type == 'furnished_villa' ? 'selected' : '' }}>فيلا مفروشه</option>
                <option value="empty_office" {{ $contract->real_state_type == 'empty_office' ? 'selected' : '' }}>مكتب اداري فارغ</option>
                <option value="furnished_office" {{ $contract->real_state_type == 'furnished_office' ? 'selected' : '' }}>مكتب اداري مفروش</option>
                <option value="shop" {{ $contract->real_state_type == 'shop' ? 'selected' : '' }}>محل</option>
            </select>
            @error('real_state_type')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">المساحة</label>
            <input name="real_state_space"
                   class="form-control @error('real_state_space') is-invalid @enderror"
                   type="number" min="1"
                   value="{{ $contract->real_state_space }}">
            @error('real_state_space')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">رقم الشقة</label>
            <input name="apartment_number"
                   class="form-control @error('apartment_number') is-invalid @enderror"
                   type="number" min="1"
                   value="{{ $contract->apartment_number }}">
            @error('apartment_number')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">رقم العمارة</label>
            <input name="building_number"
                   class="form-control @error('building_number') is-invalid @enderror"
                   type="number" min="1"
                   value="{{ $contract->building_number }}">
            @error('building_number')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">تاريخ تسجيل العقد*</label>
            <input name="contract_date"
                   class="form-control @error('contract_date') is-invalid @enderror"
                   type="date"
                   value="{{ $contract->contract_date ? \Carbon\Carbon::parse($contract->contract_date)->format('Y-m-d') : '' }}">
            @error('contract_date')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">الايجار من</label>
            <input name="contract_date_from"
                   class="form-control @error('contract_date_from') is-invalid @enderror"
                   type="date"
                   value="{{ $contract->contract_date_from ? \Carbon\Carbon::parse($contract->contract_date_from)->format('Y-m-d') : '' }}">
            @error('contract_date_from')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">الايجار الي</label>
            <input name="contract_date_to"
                   class="form-control @error('contract_date_to') is-invalid @enderror"
                   type="date"
                   value="{{ $contract->contract_date_to ? \Carbon\Carbon::parse($contract->contract_date_to)->format('Y-m-d') : '' }}">
            @error('contract_date_to')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">قيمه التامين</label>
            <input name="insurance_total"
                   class="form-control @error('insurance_total') is-invalid @enderror"
                   type="number" min="1"
                   value="{{ $contract->insurance_total }}">
            @error('insurance_total')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>


        <div class="commission-box">

            <div class="mb-2">
                <label class="form-label">قيمه الايجار</label>
                <input name="contract_total"
                       class="form-control js-contract-total @error('contract_total') is-invalid @enderror"
                       type="number" min="1" step="0.01"
                       value="{{ $contract->contract_total }}">

                @error('contract_total')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-2">
                <label class="form-label">نوع العموله</label>
                <select name="commission_type"
                        class="form-select js-commission-type @error('commission_type') is-invalid @enderror">

                    <option value="" disabled {{ !$contract->commission_type ? 'selected' : '' }}>نوع العموله</option>

                    <option value="per" {{ $contract->commission_type == 'per' ? 'selected' : '' }}>
                        بال %
                    </option>

                    <option value="val" {{ $contract->commission_type == 'val' ? 'selected' : '' }}>
                        مبلغ
                    </option>

                </select>

                @error('commission_type')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-2">
                <label class="form-label">ادخل النسبه او المبلغ*</label>
                <input name="commission_per"
                       class="form-control js-commission-per @error('commission_per') is-invalid @enderror"
                       type="number" min="1" step="0.01"
                       value="{{ $contract->commission_type == 'per' ? $contract->commission_per : $contract->commission }}">

                @error('commission_per')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-2">
                <label class="form-label">قيمه العموله</label>
                <input name="commission"
                       class="form-control js-commission-result @error('commission') is-invalid @enderror"
                       type="number" min="1" step="0.01"
                       value="{{ $contract->commission }}"
                       readonly>

                @error('commission')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

        </div>


        <div class="mb-2">
            <label class="form-label">نوع التحصيل</label>
            <select name="cash_type" class="form-select @error('cash_type') is-invalid @enderror">
                <option disabled {{ !$contract->cash_type ? 'selected' : '' }}>نوع التحصيل</option>
                <option value="owner" {{ $contract->cash_type == 'owner' ? 'selected' : '' }}>تحصيل الايجار من خلال المالك</option>
                <option value="company" {{ $contract->cash_type == 'company' ? 'selected' : '' }}>تحصيل الايجار من خلال الشركه</option>
            </select>
            @error('cash_type')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn-save js-submit-loader" type="submit">
            <span class="btn-text">
                <i class="fa-solid fa-left-long"></i>
                تعديل البيانات
            </span>

            <span class="btn-spinner d-none">
                <span class="spinner-border spinner-border-sm"></span>
                جاري تعديل بيانات عقد الايجار...
            </span>
        </button>

        <button type="button" class="btn btn-link mt-3 w-100" data-bs-dismiss="modal"
                style="text-decoration:none;color:#6b7785;">
            إغلاق
        </button>
    </form>
</div>
