<div class="p-4">
    <div class="panel-head">
        <div class="icon"> <i class="fa-solid fa-city"></i></div>
        <p class="panel-title">تعديل بيانات العقار</p>
    </div>

    <form data-form="state" action="{{ route('admin.state.update', $state->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        @method('POST')

        <div class="mb-2">
            <label class="form-label">اسم المجمع السكني (اختياري) - الكمبوند</label>
            <input name="compound_name"
                   value="{{ $state->compound_name }}"
                   class="form-control @error('compound_name') is-invalid @enderror"
                   type="text">
            @error('compound_name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">عنوان العقار (اختياري)</label>
            <input name="real_state_address"
                   value="{{ $state->real_state_address }}"
                   class="form-control @error('real_state_address') is-invalid @enderror"
                   type="text">
            @error('real_state_address')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">عنوان العقار بالتفصيل</label>
            <input name="real_state_address_details"
                   value="{{ $state->real_state_address_details }}"
                   class="form-control @error('real_state_address_details') is-invalid @enderror"
                   type="text">
            @error('real_state_address_details')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">نوع العقار</label>
            <select name="real_state_type" class="form-select @error('real_state_type') is-invalid @enderror">
                <option disabled {{ $state->real_state_type ? '' : 'selected' }}>نوع العقار</option>

                <option value="empty_apartment" {{ $state->real_state_type == 'empty_apartment' ? 'selected' : '' }}>شقة فارغه</option>
                <option value="furnished_apartment" {{ $state->real_state_type == 'furnished_apartment' ? 'selected' : '' }}>شقة مفروشه</option>
                <option value="empty_villa" {{ $state->real_state_type == 'empty_villa' ? 'selected' : '' }}>فيلا فارغه</option>
                <option value="furnished_villa" {{ $state->real_state_type == 'furnished_villa' ? 'selected' : '' }}>فيلا مفروشه</option>
                <option value="empty_office" {{ $state->real_state_type == 'empty_office' ? 'selected' : '' }}>مكتب اداري فارغ</option>
                <option value="furnished_office" {{ $state->real_state_type == 'furnished_office' ? 'selected' : '' }}>مكتب اداري مفروش</option>
                <option value="shop" {{ $state->real_state_type == 'shop' ? 'selected' : '' }}>محل</option>
            </select>
            @error('real_state_type')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">القسم</label>
            <select name="department" class="form-select @error('department') is-invalid @enderror">
                <option disabled {{ $state->department ? '' : 'selected' }}>القسم</option>
                <option value="rent" {{ $state->department == 'rent' ? 'selected' : '' }}>ايجار</option>
                <option value="sale" {{ $state->department == 'sale' ? 'selected' : '' }}>بيع</option>
            </select>
            @error('department')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">المساحة</label>
            <input name="real_state_space"
                   value="{{ $state->real_state_space }}"
                   class="form-control @error('real_state_space') is-invalid @enderror"
                   type="number" min="0">
            @error('real_state_space')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">السعر</label>
            <input name="real_state_price"
                   value="{{ $state->real_state_price }}"
                   class="form-control @error('real_state_price') is-invalid @enderror"
                   type="number" min="0">
            @error('real_state_price')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">رقم الشقة (اختياري)</label>
            <input name="apartment_number"
                   value="{{ $state->apartment_number }}"
                   class="form-control @error('apartment_number') is-invalid @enderror"
                   type="number" min="0">
            @error('apartment_number')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">رقم العمارة (اختياري)</label>
            <input name="building_number"
                   value="{{ $state->building_number }}"
                   class="form-control @error('building_number') is-invalid @enderror"
                   type="number" min="0">
            @error('building_number')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">عدد الغرف (غير مطلوب.)</label>
            <input name="number_of_rooms"
                   value="{{ $state->number_of_rooms }}"
                   class="form-control @error('number_of_rooms') is-invalid @enderror"
                   type="number" min="0">
            @error('number_of_rooms')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">عدد الحمامات (غير مطلوب.)</label>
            <input name="number_of_bathrooms"
                   value="{{ $state->number_of_bathrooms }}"
                   class="form-control @error('number_of_bathrooms') is-invalid @enderror"
                   type="number" min="0">
            @error('number_of_bathrooms')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">نوع المعلن</label>
            <select name="advertiser_type" class="form-select @error('advertiser_type') is-invalid @enderror">
                <option disabled {{ $state->advertiser_type ? '' : 'selected' }}>نوع المعلن</option>
                <option value="real_state_owner" {{ $state->advertiser_type == 'real_state_owner' ? 'selected' : '' }}>صاحب عقار</option>
                <option value="real_state_company" {{ $state->advertiser_type == 'real_state_company' ? 'selected' : '' }}>شركه عقارات</option>
            </select>
            @error('advertiser_type')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">اسم المالك / الوسيط</label>
            <input name="advertiser_name"
                   value="{{ $state->advertiser_name }}"
                   class="form-control @error('advertiser_name') is-invalid @enderror"
                   type="text">
            @error('advertiser_name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">رقم هاتف المالك / الوسيط</label>
            <input name="advertised_phone_number"
                   value="{{ $state->advertised_phone_number }}"
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
                      rows="5">{{ $state->advertise_details }}</textarea>
            @error('advertise_details')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">التاريخ</label>
            <input name="state_date_register"
                   value="{{ $state->state_date_register }}"
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
            @error('real_state_images')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            @error('real_state_images.*')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-2">
            <label class="form-label">الحاله</label>
            <select name="status" class="form-select @error('status') is-invalid @enderror">
                <option disabled {{ $state->status ? '' : 'selected' }}>الحاله</option>
                <option value="waiting" {{ $state->status == 'waiting' ? 'selected' : '' }}>انتظار</option>
                @if($state->department == 'rent')
                    <option value="rent" {{ $state->status == 'rent' ? 'selected' : '' }}>تم الايجار</option>
                @else
                    <option value="sale" {{ $state->status == 'sale' ? 'selected' : '' }}>تم البيع</option>

                @endif

            </select>
            @error('status')
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
                جاري تعديل بيانات العقار...
            </span>
        </button>

        <button type="button" class="btn btn-link mt-3 w-100" data-bs-dismiss="modal"
                style="text-decoration:none;color:#6b7785;">
            إغلاق
        </button>
    </form>
</div>
