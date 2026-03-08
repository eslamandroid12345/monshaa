<div class="p-4">
    <div class="panel-head">
        <div class="icon"><img src="{{asset('img/icons/accountant.png')}}"></div>
        <p class="panel-title">تعديل بيانات عموله الموظف</p>
    </div>

    <form data-form="state" action="{{ route('employee.commissions.update',$commission->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        @method('POST')

        <div class="mb-2">
            <label class="form-label">اسم الموظف</label>
            <select name="employee_id" class="form-select @error('employee_id') is-invalid @enderror">
                <option value="" disabled {{ !$commission->employee_id ? 'selected' : '' }}>اسم الموظف</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $commission->employee_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->name }}
                    </option>
                @endforeach
            </select>
            @error('employee_id')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">المبلغ</label>
            <input name="total_money"
                   class="form-control @error('total_money') is-invalid @enderror"
                   type="number"
                   value="{{ $commission->total_money }}">
            @error('total_money')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">الوصف</label>
            <select name="description" class="form-select @error('description') is-invalid @enderror">
                <option value="" disabled {{ !$commission->description ? 'selected' : '' }}>اختر الوصف</option>

                <option value="عموله عقد ايجار"
                    {{ $commission->description == 'عموله عقد ايجار' ? 'selected' : '' }}>
                    عموله عقد ايجار
                </option>

                <option value="عموله عقد بيع"
                    {{ $commission->description == 'عموله عقد بيع' ? 'selected' : '' }}>
                    عموله عقد بيع
                </option>
            </select>

            @error('description')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">عنوان العقار</label>
            <input name="real_state_address"
                   class="form-control @error('real_state_address') is-invalid @enderror"
                   type="text"
                   value="{{ $commission->real_state_address }}">
            @error('real_state_address')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">اسم المالك</label>
            <input name="owner_name"
                   class="form-control @error('owner_name') is-invalid @enderror"
                   type="text"
                   value="{{ $commission->owner_name }}">
            @error('owner_name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">التاريخ</label>
            <input name="transaction_date"
                   class="form-control @error('transaction_date') is-invalid @enderror"
                   type="date"
                   value="{{ $commission->transaction_date ? \Carbon\Carbon::parse($commission->transaction_date)->format('Y-m-d') : '' }}">
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
                جاري تعديل بيانات عموله الموظف...
            </span>
        </button>

        <button type="button" class="btn btn-link mt-3 w-100" data-bs-dismiss="modal"
                style="text-decoration:none;color:#6b7785;">
            إغلاق
        </button>
    </form>
</div>
