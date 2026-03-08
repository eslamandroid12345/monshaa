<div class="p-4">
    <div class="panel-head">
        <div class="icon"><img src="{{asset('img/icons/employees.png')}}"></div>
        <p class="panel-title">تعديل بيانات العميل</p>
    </div>

    <form data-form="state" action="{{ route('clients.update',$client->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        @method('POST')

        <div class="mb-2">
            <label class="form-label">اسم العميل</label>
            <input name="name"
                   value="{{$client->name}}"
                   class="form-control @error('name') is-invalid @enderror"
                   type="text">
            @error('name')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">رقم الهاتف</label>
            <input name="phone"
                   value="{{$client->phone}}"
                   class="form-control @error('phone') is-invalid @enderror"
                   type="text">
            @error('phone')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">كود المعاينه</label>
            <input name="code"
                   value="{{$client->code}}"
                   class="form-control @error('code') is-invalid @enderror"
                   type="number">
            @error('code')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-2">
            <label class="form-label">القسم</label>

            <select name="department" class="form-select @error('department') is-invalid @enderror">

                <option disabled {{ $client->department == '' ? 'selected' : '' }}>
                    القسم
                </option>

                <option value="state_sale"
                    {{ $client->department == 'state_sale' ? 'selected' : '' }}>
                    عقار بيع
                </option>

                <option value="state_rent"
                    {{ $client->department == 'state_rent' ? 'selected' : '' }}>
                    عقار ايجار
                </option>

                <option value="land_sale"
                    {{ $client->department == 'land_sale' ? 'selected' : '' }}>
                    ارض بيع
                </option>

            </select>

            @error('department')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-2">
            <label class="form-label">نوع العميل</label>

            <select name="client_type" class="form-select @error('client_type') is-invalid @enderror">

                <option disabled {{ $client->client_type == '' ? 'selected' : '' }}>
                    نوع العميل
                </option>

                <option value="client"
                    {{ $client->client_type == 'client' ? 'selected' : '' }}>
                    صاحب عقار
                </option>

                <option value="company"
                    {{ $client->client_type == 'company' ? 'selected' : '' }}>
                    شركه عقارات
                </option>

            </select>

            @error('client_type')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-2">
            <label class="form-label">تاريخ المعاينه</label>
            <input name="inspection_date"
                   value="{{$client->inspection_date}}"
                   class="form-control @error('inspection_date') is-invalid @enderror"
                   type="date">
            @error('inspection_date')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label">حاله المعاينه</label>

            <select name="status" class="form-select @error('status') is-invalid @enderror">

                <option disabled {{ $client->status== '' ? 'selected' : '' }}>
                    حاله المعاينه
                </option>

                <option value="waiting"
                    {{ $client->status == 'waiting' ? 'selected' : '' }}>
                    انتظار
                </option>

                <option value="inspection"
                    {{ $client->status == 'inspection' ? 'selected' : '' }}>
                    معاينه
                </option>

                <option value="inspection_accepted"
                  {{$client->status == 'inspection_accepted' ? 'selected' : '' }}>
                    معاينه مقبوله
                </option>

                <option value="inspection_refused"
                    {{ $client->status == 'inspection_refused' ? 'selected' : '' }}>
                    معاينه مرفوضه
                </option>

            </select>

            @error('status')
            <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-2">
            <label class="form-label">ملاحظات</label>
            <textarea name="notes"
                      class="form-control @error('notes') is-invalid @enderror"
                      rows="5">{{$client->notes}}</textarea>
            @error('notes')
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
                جاري تعديل بيانات العميل...
            </span>
        </button>

        <button type="button" class="btn btn-link mt-3 w-100" data-bs-dismiss="modal"
                style="text-decoration:none;color:#6b7785;">
            إغلاق
        </button>
    </form>
</div>
