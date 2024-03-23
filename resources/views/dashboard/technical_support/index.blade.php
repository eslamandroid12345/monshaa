@php use Illuminate\Support\Facades\Gate; @endphp

@extends('dashboard.core.app')
@section('title', __('titles.Courses'))
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>جميع الحجوزات</h1>
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
                            <h3 class="card-title">جميع الحجوزات</h3>
                            <div class="card-tools">
                                    <a href="{{url('create')}}" class="btn  btn-dark">حجوزات اليوم</a>

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
                                                    <label for="exampleInputName1">رقم الحجز</label>
                                                    <input name="name_ar" type="text" class="form-control" id="exampleInputName1">
                                                </div>

                                                <div class="form-group col-md-12 col-12">
                                                    <label for="exampleInputName1">اسم العميل</label>
                                                    <input  name="name_en" type="text" class="form-control" id="exampleInputName1">
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
                                    <th style="width: 10px">رقم الحجز</th>
                                    <th>اسم العميل</th>
                                    <th>نوع الغرفه</th>
                                    <th>تاريخ الوصول</th>
                                    <th>تاريخ المغادره</th>
                                    <th>قيمه الحجز</th>
                                    <th>ضريبه القبمه المضافه</th>
                                    <th>ضريبه البلديه</th>
                                    <th>ضريبه السياحه</th>
                                    <th>العموله + 5%</th>
                                    <th>هاتف العميل</th>
                                    <th>الاطفال</th>
                                    <th>البالغين</th>
                                    <th>عدد الغرف</th>
                                    <th>عدد الليالي</th>
                                    <th>حاله الحجز</th>
                                    <th>حاله الزبون</th>
                                    <th>العمليات</th>
{{--                                    <th>@lang('dashboard.Operations')</th>--}}
                                </tr>
                                </thead>
                                <tbody>
{{--                                @forelse($courses as $key => $course)--}}
                                    <tr>
                                        <td>4738098</td>
                                        <td>علي محمد</td>
                                        <td>Double room</td>
                                        <td>2024-02-20</td>
                                        <td>2024-02-24</td>
                                        <td>300 ريال عماني</td>
                                        <td>5 ريال عماني</td>
                                        <td>4 ريال عماني</td>
                                        <td>4 ريال عماني</td>
                                        <td>10 ريال عماني</td>
                                        <td>96629363576</td>
                                        <td>2</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>في الانتطار ...</td>
                                        <td>غير مقيم</td>

                                        <td>
                                            <div class="operations-btns" style="">
                                                    <a href="#" class="btn  btn-info">تعديل</a>
                                                    <a href="#" class="btn  btn-info">عرض</a>

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
                                    <tr>
                                        <td>74387478</td>
                                        <td>جمال السيد</td>
                                        <td>Double room</td>
                                        <td>2024-02-20</td>
                                        <td>2024-02-24</td>
                                        <td>230 ريال عماني</td>
                                        <td>5 ريال عماني</td>
                                        <td>4 ريال عماني</td>
                                        <td>4 ريال عماني</td>
                                        <td>10 ريال عماني</td>
                                        <td>96629363576</td>
                                        <td>2</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>4</td>
                                        <td>في الانتطار ...</td>
                                        <td>غير مقيم</td>

                                        <td>
                                            <div class="operations-btns" style="">
                                                    <a href="#" class="btn  btn-info">تعديل</a>
                                                    <a href="#" class="btn  btn-info">عرض</a>

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
                                    <tr>
                                        <td>7343667</td>
                                        <td>مصطفي حسن</td>
                                        <td>Double room</td>
                                        <td>2024-02-20</td>
                                        <td>2024-02-24</td>
                                        <td>340 ريال عماني</td>
                                        <td>5 ريال عماني</td>
                                        <td>4 ريال عماني</td>
                                        <td>4 ريال عماني</td>
                                        <td>10 ريال عماني</td>
                                        <td>96629363576</td>
                                        <td>2</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>في الانتطار ...</td>
                                        <td>غير مقيم</td>

                                        <td>
                                            <div class="operations-btns" style="">
                                                    <a href="#" class="btn  btn-info">تعديل</a>
                                                    <a href="#" class="btn  btn-info">عرض</a>

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
                                    <tr>
                                        <td>6634</td>
                                        <td>شادي محمد</td>
                                        <td>Double room</td>
                                        <td>2024-02-20</td>
                                        <td>2024-02-24</td>
                                        <td>300 ريال عماني</td>
                                        <td>5 ريال عماني</td>
                                        <td>4 ريال عماني</td>
                                        <td>4 ريال عماني</td>
                                        <td>20 ريال عماني</td>
                                        <td>96629363576</td>
                                        <td>2</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>في الانتطار ...</td>
                                        <td>غير مقيم</td>

                                        <td>
                                            <div class="operations-btns" style="">
                                                    <a href="#" class="btn  btn-info">تعديل</a>
                                                    <a href="#" class="btn  btn-info">عرض</a>

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
                                    <tr>
                                        <td>63534</td>
                                        <td>راضي علي</td>
                                        <td>Double room</td>
                                        <td>2024-02-20</td>
                                        <td>2024-02-24</td>
                                        <td>100 ريال عماني</td>
                                        <td>5 ريال عماني</td>
                                        <td>4 ريال عماني</td>
                                        <td>4 ريال عماني</td>
                                        <td>5 ريال عماني</td>
                                        <td>96629363576</td>
                                        <td>2</td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>4</td>
                                        <td>في الانتطار ...</td>
                                        <td>غير مقيم</td>

                                        <td>
                                            <div class="operations-btns" style="">
                                                    <a href="#" class="btn  btn-info">تعديل</a>
                                                    <a href="#" class="btn  btn-info">عرض</a>

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
{{--                                @empty--}}
{{--                                    @include('dashboard.core.includes.no-entries', ['columns' => 6])--}}
{{--                                @endforelse--}}
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
{{--                            {{ $courses->appends(request()->all())->links() }}--}}
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
