<div class="p-4">
    <div class="panel-head">
        <div class="icon">  <img src="{{asset('img/icons/give.png')}}"></div>
        <p class="panel-title">تعديل بيانات المصروف</p>
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
            <label class="form-label">الوصف مثل..فاتوره..مرتب</label>
            <textarea name="description"
                      class="form-control @error('description') is-invalid @enderror"
                      rows="5">{{$revenue->description}}</textarea>
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
                جاري تعديل بيانات المصروف...
            </span>
        </button>

        <button type="button" class="btn btn-link mt-3 w-100" data-bs-dismiss="modal"
                style="text-decoration:none;color:#6b7785;">
            إغلاق
        </button>
    </form>
</div>
