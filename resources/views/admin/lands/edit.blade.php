<div class="p-4">
    <div class="panel-head">
        <div class="icon"><i class="fa-solid fa-building"></i></div>
        <p class="panel-title">تعديل بيانات الارض</p>
    </div>

    <form data-form="state" action="{{ route('lands.update', $land->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        @method('POST')

        <div class="mb-2">
            <label class="form-label">العنوان (المدينه)</label>
            <input name="address"
                   class="form-control @error('address') is-invalid @enderror"
                   type="text"
                   value="{{ $land->address }}">
            @error('address')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">عنوان الارض بالتفصيل (الحي او الشارع)</label>
            <input name="address_details"
                   class="form-control @error('address_details') is-invalid @enderror"
                   type="text"
                   value="{{ $land->address_details }}">
            @error('address_details')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">اسم المالك / الوسيط</label>
            <input name="seller_name"
                   class="form-control @error('seller_name') is-invalid @enderror"
                   type="text"
                   value="{{ $land->seller_name }}">
            @error('seller_name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">رقم هاتف المالك / الوسيط</label>
            <input name="seller_phone_number"
                   class="form-control @error('seller_phone_number') is-invalid @enderror"
                   type="text"
                   value="{{ $land->seller_phone_number }}">
            @error('seller_phone_number')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">المساحة</label>
            <input id="size_in_metres"
                   value="{{ $land->size_in_metres }}"
                   name="size_in_metres"
                   class="form-control @error('size_in_metres') is-invalid @enderror"
                   type="number"
                   min="1">

            @error('size_in_metres')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-2">
            <label class="form-label">سعر المتر</label>
            <input id="price_of_one_meter"
                   value="{{ $land->price_of_one_meter }}"
                   name="price_of_one_meter"
                   class="form-control @error('price_of_one_meter') is-invalid @enderror"
                   type="number"
                   min="1">

            @error('price_of_one_meter')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">اجمالي التكلفه</label>
            <input id="total_cost"
                   value="{{ $land->total_cost }}"
                   name="total_cost"
                   class="form-control"
                   type="number"
                   readonly>
        </div>

        <div class="mb-2">
            <label class="form-label">نوع المعلن</label>
            <select name="advertiser_type" class="form-select @error('advertiser_type') is-invalid @enderror">
                <option disabled>نوع المعلن</option>

                <option value="real_state_owner" {{ $land->advertiser_type == 'real_state_owner' ? 'selected' : '' }}>
                    صاحب عقار
                </option>

                <option value="real_state_company" {{ $land->advertiser_type == 'real_state_company' ? 'selected' : '' }}>
                    شركه عقارات
                </option>
            </select>

            @error('advertiser_type')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">تفاصيل الارض (اختياري)</label>
            <textarea name="advertise_details"
                      class="form-control @error('advertise_details') is-invalid @enderror"
                      rows="5">{{ $land->advertise_details }}</textarea>
            @error('advertise_details')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">التاريخ</label>
            <input name="land_date_register"
                   class="form-control @error('land_date_register') is-invalid @enderror"
                   type="date"
                   value="{{ $land->land_date_register }}">
            @error('land_date_register')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">صور الارض</label>
            <input type="file"
                   name="land_images[]"
                   class="form-control @error('land_images') is-invalid @enderror @error('land_images.*') is-invalid @enderror"
                   multiple>

            @error('land_images')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            @error('land_images.*')
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
                جاري تعديل بيان الارض...
            </span>
        </button>

        <button type="button" class="btn btn-link mt-3 w-100" data-bs-dismiss="modal"
                style="text-decoration:none;color:#6b7785;">
            إغلاق
        </button>
    </form>
</div>
