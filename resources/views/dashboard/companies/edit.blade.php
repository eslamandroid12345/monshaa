@extends('dashboard.core.app')
@section('title', 'تعديل بيانات الشركه')

@section('css_addons')
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <style>
        .optional{
            opacity: .5;
            font-size: 13px;
        }
    </style>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>عرض بيانات الشركه العقاريه</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <form  action="{{route('admin.companies.update',$company->id)}}" method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="card-header">
                                <h3 class="card-title">تعديل بيانات الشركه</h3>
                            </div>
                            <div class="card-body">
                                @csrf
                                @method('PUT')

                                <div class="mt-3 mb-3">
                                    <img src="{{$company->logo}}" style="width: 80px;height: 80px" />
                                </div>

                                <div class="row">


                                    <div class="form-group col-md-6 col-12">
                                        <label for="exampleInputName1">اسم الشركه </label>
                                        <input  type="text" class="form-control" id="exampleInputName1" value="{{$company->company_name}}" readonly>
                                    </div>


                                      <div class="form-group col-md-6 col-12">
                                        <label for="exampleInputName1">رقم هاتف الشركه </label>
                                        <input  type="text" class="form-control" id="exampleInputName1" value="{{$company->company_phone}}" readonly>
                                      </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label for="exampleInputName1">اسم المدير </label>
                                        <input  type="text" class="form-control" id="exampleInputName1" value="{{$company->admin->name}}" readonly>
                                    </div>


                                    <div class="form-group col-md-6 col-12">
                                        <label for="exampleInputName1">رقم هاتف المدير* </label>
                                        <input  type="text" class="form-control" id="exampleInputName1" value="{{$company->admin->phone}}" readonly>
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label for="exampleInputName1">كلمه السر* </label>
                                        <input  type="text" class="form-control" id="exampleInputName1" value="{{$company->admin->password_show}}" readonly>
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label for="exampleInputName1">عنوان الشركه </label>
                                        <input  type="text" class="form-control" id="exampleInputName1" value="{{$company->company_address}}" readonly>
                                    </div>


                                    <div class="form-group col-md-6 col-12">
                                        <label for="exampleInputName1">تاريخ بدايه الاشتراك </label>
                                        <input  type="text" class="form-control" id="exampleInputName1" value="{{$company->date_start_subscription}}" readonly>
                                    </div>


                                    <div class="form-group col-md-6 col-12">
                                        <label for="exampleInputName1">تاريخ نهايه الاشتراك </label>
                                        <input  type="text" class="form-control" id="exampleInputName1" value="{{$company->date_end_subscription}}" readonly>
                                    </div>



                                    <div class="form-group col-md-12 col-12">
                                        <label for="exampleInputName1">عمله الشركه </label>
                                        <input  type="text" class="form-control" id="exampleInputName1" value="{{$company->currency}}" readonly>
                                    </div>

                                    @if( \Carbon\Carbon::now()->format('Y-m-d') >= $company->date_end_subscription && $company->is_package == 0)

                                        <div class="alert alert-info col-12" role="alert">
                                            ملحوظه : تم الانتهاء من النسخه التجريبيه
                                        </div>
                                    @endif

                                    @if(\Carbon\Carbon::now()->format('Y-m-d') >= $company->date_end_subscription && $company->is_package == 1)

                                    <div class="form-group clearfix col-12">
                                        <div class="icheck-wetasphalt d-inline">
                                            <input name="add_new_package" type="checkbox" value="1" id="checkboxPrimary4">
                                            <label for="checkboxPrimary4">تجديد الباقه للشركه</label>
                                        </div>
                                    </div>
                                    @endif

                                @if($company->is_package == 0)
                                        <div class="form-group clearfix col-12">
                                            <div class="icheck-wetasphalt d-inline">
                                                <input name="is_package" type="checkbox" value="1" id="checkboxPrimary2">
                                                <label for="checkboxPrimary2">تفعيل الباقه السنويه للشركه</label>
                                            </div>
                                        </div>

                                    @endif



                                    <div class="form-group clearfix col-12">
                                        <div class="icheck-wetasphalt d-inline">
                                            <input name="is_active" type="checkbox" value="1" id="checkboxPrimary3" {{$company->is_active == 1 ? 'checked' : ''}}>
                                            <label for="checkboxPrimary3">  تفعيل الحساب للشركه</label>
                                        </div>
                                    </div>



                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-dark waves-effect waves-light">تعديل بيانات الشركه</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


@section('js_addons')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>

    </script>



    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            bsCustomFileInput.init();
            $('.select2').select2({
                language: {
                    searching: function() {}
                },
            });
        });
    </script>


@endsection
