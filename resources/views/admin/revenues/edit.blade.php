<div class="p-4">
    <div class="panel-head">
        <div class="icon"> <img src="{{asset('img/icons/hu.png')}}"></div>
        <p class="panel-title">تعديل بيانات الايراد</p>
    </div>

    <form data-form="state" action="{{ route('admin.expenses.revenue.update',$revenue->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        @method('POST')

        <div class="mb-2">
            <label class="form-label">المبلغ</label>
            <input name="total_money"
                   value="{{ $revenue->total_money }}"
                   class="form-control @error('total_money') is-invalid @enderror"
                   type="text">
            @error('total_money')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">عنوان العقار</label>
            <input name="real_state_address"
                   value="{{ $revenue->real_state_address }}"
                   class="form-control @error('real_state_address') is-invalid @enderror"
                   type="text">
            @error('real_state_address')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">اسم المالك</label>
            <input name="owner_name"
                   value="{{ $revenue->owner_name }}"
                   class="form-control @error('owner_name') is-invalid @enderror"
                   type="text">
            @error('owner_name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">الوصف</label>
            <select name="description" class="form-select @error('description') is-invalid @enderror">
                <option disabled>اختر الوصف</option>

                <option value="عقد بيع" {{ $revenue->description == 'عقد بيع' ? 'selected' : '' }}>
                    عقد بيع
                </option>

                <option value="عقد ايجار" {{ $revenue->description == 'عقد ايجار' ? 'selected' : '' }}>
                    عقد ايجار
                </option>

                <option value="سند صرف" {{ $revenue->description == 'سند صرف' ? 'selected' : '' }}>
                    سند صرف
                </option>

            </select>
            @error('description')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">التاريخ</label>
            <input name="transaction_date"
                   value="{{ $revenue->transaction_date }}"
                   class="form-control @error('transaction_date') is-invalid @enderror"
                   type="date">
            @error('transaction_date')
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
                جاري تعديل بيانات الايراد...
            </span>
        </button>

        <button type="button" class="btn btn-link mt-3 w-100" data-bs-dismiss="modal"
                style="text-decoration:none;color:#6b7785;">
            إغلاق
        </button>
    </form>
</div>
