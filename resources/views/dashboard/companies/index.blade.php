
@extends('dashboard.core.app')
@section('title', 'جميع الشركات')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>جميع الشركات</h1>
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
                        <div class="card-header">
                            <h3 class="card-title">جميع الشركات</h3>
                            <div class="card-tools">
                                {{--start search model--}}
                                <a href="{{route('admin.companies')}}" style="color: #fff" class="btn btn-dark waves-effect waves-light"><i class="fa fa-spinner"></i> </a>
                                <button class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#delete-modal-0">بحث</button>
                                <div id="delete-modal-0" class="modal fade modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">                                                    <div class="modal-dialog">
                                        <div class="modal-content float-left">
                                            <div class="modal-header">
                                                <h5 class="modal-title">يرجي ادخال بيانات البحث</h5>
                                            </div>

                                            <form action="{{route('admin.companies')}}" method="GET">
                                            <div class="modal-body">
                                                <div class="form-group col-md-12 col-12">
                                                    <label for="exampleInputName1">رقم هاتف الشركه</label>
                                                    <input name="company_phone" type="text" class="form-control" id="exampleInputName1">
                                                </div>

                                            </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger">بحث</button>
                                                    <button type="button" data-dismiss="modal" class="btn btn-dark waves-effect waves-light m-l-5 mr-1 ml-1">
                                                        غلق النافذه
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                {{--end search---}}
                            </div>
                        </div>


                        <div style="overflow-x: auto" class="card-body">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="width: 10px">لوجو الشركه</th>
                                    <th>اسم الشركه</th>
                                    <th>عنوان الشركه</th>
                                    <th>رقم هاتف الشركه</th>
                                    <th>اسم المدير</th>
                                    <th>رقم هاتف المدير</th>
                                    <th>كلمه السر</th>
                                    <th>تاريخ بدايه الاشتراك</th>
                                    <th>تاريخ نهايه الاشتراك</th>
                                    <th>حاله الحساب</th>
                                    <th>عدد الموظفين</th>
                                    <th>العمله</th>
                                    <th>نوع الحساب</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($companies as $company)
                                    <tr>
                                        <td>{{$company->id}}</td>
                                        <td><img src="{{$company->logo}}" style="width: 60px;height: 60px" /></td>
                                        <td>{{$company->company_name}}</td>
                                        <td>{{$company->company_address}}</td>
                                        <td>{{$company->company_phone}}</td>
                                        <td>{{$company->admin->name}}</td>
                                        <td>{{$company->admin->phone}}</td>
                                        <td>{{$company->admin->password_show}}</td>
                                        <td>{{$company->date_start_subscription}}</td>
                                        <td>{{$company->date_end_subscription}}</td>
                                      <td><img src="{{$company->is_active == 1 ? asset('img/icons/active.png') : asset('img/icons/un_active.png')}}" style="width: 40px;height: 40px" /></td>
                                        <td>{{$company->number_of_employees}}</td>
                                        <td>{{$company->currency}}</td>
                                        <td>{{$company->is_package == 1 ? 'باقه اشتراك' : 'حساب تجريبي'}}</td>
                                        <td>
                                            <div class="operations-btns" style="">
                                                <a href="{{route('admin.companies.edit' , $company->id)}}"> <button class="btn btn-dark waves-effect waves-light">تعديل</button></a>
                                                        <button class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#delete-modal{{$company->id}}">حذف</button>
                                                        <div id="delete-modal{{$company->id}}" class="modal fade modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">                                                    <div class="modal-dialog">
                                                                <div class="modal-content float-left">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">تأكيد الحذف</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>هل انت متاكد من حذف بيانات الشركه ؟</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" data-dismiss="modal" class="btn btn-dark waves-effect waves-light m-l-5 mr-1 ml-1">
                                                                            غلق
                                                                        </button>
                                                                        <form action="{{route('admin.companies.destroy' , $company->id)}}" method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-danger">حذف</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                            </div>
                                        </td>
                                    </tr>

                                @empty
                                  لا يوجد اي بيانات
                                @endforelse
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div>{{$companies->links()}}</div>
                        </div>
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
