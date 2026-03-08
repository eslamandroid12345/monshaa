<div class="p-4">
    <div class="panel-head">
        <div class="icon"><img src="{{asset('img/icons/people.png')}}"></div>
        <p class="panel-title">تعديل بيانات الموظف</p>
    </div>

    <div class="panel-head">
        <div class="icon">
            <img src="{{$employee->employee_image}}" style="width: 100px;height: 100px;border-radius: 50px">
        </div>

    </div>

    <form data-form="state" action="{{ route('admin.employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        @method('POST')

        <div class="mb-2">
            <label class="form-label">اسم الموظف</label>
            <input name="name"
                   value="{{ old('name', $employee->name) }}"
                   class="form-control @error('name') is-invalid @enderror"
                   type="text">
            @error('name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">المسمي الوظيفي</label>
            <input name="job_title"
                   value="{{ old('job_title', $employee->job_title) }}"
                   class="form-control @error('job_title') is-invalid @enderror"
                   type="text">
            @error('job_title')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">العنوان</label>
            <input name="employee_address"
                   value="{{ old('employee_address', $employee->employee_address) }}"
                   class="form-control @error('employee_address') is-invalid @enderror"
                   type="text">
            @error('employee_address')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">رقم البطاقه</label>
            <input name="card_number"
                   value="{{ old('card_number', $employee->card_number) }}"
                   class="form-control @error('card_number') is-invalid @enderror"
                   type="text">
            @error('card_number')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">رقم الهاتف</label>
            <input name="phone"
                   value="{{ old('phone', $employee->phone) }}"
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
                   type="text" value="{{$employee->password_show}}">
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

        @php
            $selectedPermissions = old('employee_permissions', is_array($employee->employee_permissions) ? $employee->employee_permissions : json_decode($employee->employee_permissions, true));
            $selectedPermissions = is_array($selectedPermissions) ? $selectedPermissions : [];
        @endphp

        <div class="mb-2 perm-wrap">
            <label class="form-label">الصلاحيات</label>

                <label class="perm-item">
                    <span>العقارات</span>
                    <input type="checkbox" name="employee_permissions[]" value="states" {{ in_array('states', $selectedPermissions) ? 'checked' : '' }}>
                </label>

                <label class="perm-item">
                    <span>الاراضي</span>
                    <input type="checkbox" name="employee_permissions[]" value="lands" {{ in_array('lands', $selectedPermissions) ? 'checked' : '' }}>
                </label>

                <label class="perm-item">
                    <span>المستأجرين</span>
                    <input type="checkbox" name="employee_permissions[]" value="tenants" {{ in_array('tenants', $selectedPermissions) ? 'checked' : '' }}>
                </label>

                <label class="perm-item">
                    <span>عقود الايجار</span>
                    <input type="checkbox" name="employee_permissions[]" value="tenant_contracts" {{ in_array('tenant_contracts', $selectedPermissions) ? 'checked' : '' }}>
                </label>

                <label class="perm-item">
                    <span>سندات القبض</span>
                    <input type="checkbox" name="employee_permissions[]" value="financial_cash" {{ in_array('financial_cash', $selectedPermissions) ? 'checked' : '' }}>
                </label>

                <label class="perm-item">
                    <span>سندات الصرف</span>
                    <input type="checkbox" name="employee_permissions[]" value="financial_receipt" {{ in_array('financial_receipt', $selectedPermissions) ? 'checked' : '' }}>
                </label>

                <label class="perm-item">
                    <span>المصروفات</span>
                    <input type="checkbox" name="employee_permissions[]" value="expenses" {{ in_array('expenses', $selectedPermissions) ? 'checked' : '' }}>
                </label>

                <label class="perm-item">
                    <span>الموظفين</span>
                    <input type="checkbox" name="employee_permissions[]" value="employees" {{ in_array('employees', $selectedPermissions) ? 'checked' : '' }}>
                </label>

                <label class="perm-item">
                    <span>الدعم الفني</span>
                    <input type="checkbox" name="employee_permissions[]" value="technical_support" {{ in_array('technical_support', $selectedPermissions) ? 'checked' : '' }}>
                </label>

                <label class="perm-item">
                    <span>الإيرادات</span>
                    <input type="checkbox" name="employee_permissions[]" value="revenues" {{ in_array('revenues', $selectedPermissions) ? 'checked' : '' }}>
                </label>

                <label class="perm-item">
                    <span>العملاء</span>
                    <input type="checkbox" name="employee_permissions[]" value="clients" {{ in_array('clients', $selectedPermissions) ? 'checked' : '' }}>
                </label>

                <label class="perm-item">
                    <span>عمولة الموظفين</span>
                    <input type="checkbox" name="employee_permissions[]" value="employee_commission" {{ in_array('employee_commission', $selectedPermissions) ? 'checked' : '' }}>
                </label>

                <label class="perm-item">
                    <span>العقود المنتهيه</span>
                    <input type="checkbox" name="employee_permissions[]" value="expired_contracts" {{ in_array('expired_contracts', $selectedPermissions) ? 'checked' : '' }}>
                </label>

                <label class="perm-item">
                    <span>الارباح</span>
                    <input type="checkbox" name="employee_permissions[]" value="profits" {{ in_array('profits', $selectedPermissions) ? 'checked' : '' }}>
                </label>

                <label class="perm-item">
                    <span>اخفاء ارقام العملاء</span>
                    <input type="checkbox" name="employee_permissions[]" value="client_phone_hidden" {{ in_array('client_phone_hidden', $selectedPermissions) ? 'checked' : '' }}>
                </label>

                <label class="perm-item">
                    <span>اخفاء ارقام الملاك</span>
                    <input type="checkbox" name="employee_permissions[]" value="owner_phone_hidden" {{ in_array('owner_phone_hidden', $selectedPermissions) ? 'checked' : '' }}>
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
                تعديل البيانات
            </span>

            <span class="btn-spinner d-none">
                <span class="spinner-border spinner-border-sm"></span>
                جاري تعديل بيانات الموظف...
            </span>
        </button>

        <button type="button" class="btn btn-link mt-3 w-100" data-bs-dismiss="modal" style="text-decoration:none;color:#6b7785;">
            إغلاق
        </button>
    </form>
</div>
