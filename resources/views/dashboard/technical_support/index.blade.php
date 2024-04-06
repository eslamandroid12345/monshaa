
@extends('dashboard.core.app')
@section('title', 'رسائل الدعم الفني')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>رسائل الدعم الفني</h1>
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
                            <h3 class="card-title">جميع الرسائل</h3>
                            <div class="card-tools">
                                {{--start search model--}}
                                <button class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#delete-modal-0">بحث</button>
                                <div id="delete-modal-0" class="modal fade modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">                                                    <div class="modal-dialog">
                                        <div class="modal-content float-left">
                                            <div class="modal-header">
                                                <h5 class="modal-title">يرجي ادخال بيانات البحث</h5>
                                            </div>

                                            <form action="{{route('admin.technical_support')}}" method="GET">
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
                                    <th style="width: 10px">لوجو الشركه</th>
                                    <th>الموظف الذي ارسل الرساله</th>
                                    <th>اسم الشركه</th>
                                    <th>رقم هاتف الشركه</th>
                                    <th>عنوان الرساله</th>
                                    <th>محتوي الرساله</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($messages as $message)
                                    <tr>
                                        <td><img src="{{$message->user->company->logo}}" style="width: 60px;" /></td>
                                        <td>{{$message->user->name}}</td>
                                        <td>{{$message->user->company->company_name}}</td>
                                        <td>{{$message->user->company->company_phone}}</td>
                                        <td>{{$message->subject}}</td>
                                        <td>{{$message->message}}</td>
                                    </tr>

                                @empty
                                    لا يوجد اي بيانات

                                @endforelse
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">

                            <div class="my-5">{{$messages->links()}}</div>
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
