
@extends('dashboard.core.app')
@section('title', __('titles.Courses'))
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
                                <button class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#delete-modal-0">بحث</button>
                                <div id="delete-modal-0" class="modal fade modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">                                                    <div class="modal-dialog">
                                        <div class="modal-content float-left">
                                            <div class="modal-header">
                                                <h5 class="modal-title">يرجي ادخال بيانات البحث</h5>
                                            </div>

                                            <form action="#" method="post">
                                            <div class="modal-body">
                                                <div class="form-group col-md-12 col-12">
                                                    <label for="exampleInputName1">رقم هاتف الشركه</label>
                                                    <input name="name_ar" type="text" class="form-control" id="exampleInputName1">
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
                                    <th style="width: 10px">لوجو الشركه</th>
                                    <th>اسم الشركه</th>
                                    <th>عنوان الشركه</th>
                                    <th>رقم هاتف الشركه</th>
                                    <th>تاريخ بدايه الاشتراك</th>
                                    <th>تاريخ نهايه الاشتراك</th>
                                    <th>حاله الحساب</th>
                                    <th>عدد الموظفين</th>
                                    <th>العمله</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($companies as $key => $company)
                                    <tr>
                                        <td><img src="{{$company->logo}}" style="width: 60px;" /></td>
                                        <td>{{$company->company_name}}</td>
                                        <td>{{$company->company_address}}</td>
                                        <td>{{$company->company_phone}}</td>
                                        <td>{{$company->date_start_subscription}}</td>
                                        <td>{{$company->date_end_subscription}}</td>
                                        <td>{{$company->is_active == 1 ? 'الحساب مفعل' : 'الحساب محظور'}}</td>
                                        <td>6</td>
                                        <td>{{$company->currency}}</td>


                                        <td>
                                            <div class="operations-btns" style="">

                                                    <a href="#" class="btn  {{$company->is_active == 1 ? 'btn-info' : 'btn-danger'}}">{{$company->is_active == 1 ? 'الغاء تفعيل' : 'تفعيل'}}</a>

                                                        <button class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#delete-modal-1">حذف</button>
                                                        <div id="delete-modal-1" class="modal fade modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">                                                    <div class="modal-dialog">
                                                                <div class="modal-content float-left">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">تأكيد الحذف</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>هل انت متاكد من حذف البيانات</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" data-dismiss="modal" class="btn btn-dark waves-effect waves-light m-l-5 mr-1 ml-1">
                                                                            غلق
                                                                        </button>
                                                                        <form action="#" method="post">
                                                                            @csrf
                                                                            {{method_field('DELETE')}}
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
                                    @include('dashboard.core.includes.no-entries', ['columns' => 6])
                                @endforelse
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <ul class="edu-pagination ">
                                @if ($companies->lastPage() >= 1)
                                    <li class="{{ ($companies->currentPage() == 1) ? ' disabled' : '' }}">
                                        <a href="{{ $companies->previousPageUrl() }}" aria-label="Previous">
                                            <i class="icon-east"></i>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $companies->lastPage(); $i++)
                                        <li class="{{ ($companies->currentPage() == $i) ? ' active' : '' }}">
                                            <a href="{{ $companies->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="{{ ($companies->currentPage() == $companies->lastPage()) ? ' disabled' : '' }}">
                                        <a href="{{ $companies->nextPageUrl() }}" aria-label="Next">
                                            <i class="icon-west"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
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
