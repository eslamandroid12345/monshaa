@extends('dashboard.core.app')
@section('title', __('titles.Create') . " " . __('titles.Course'))

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
                    <h1>قسم الدورات</h1>
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
                        <form  action="#" method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="card-header">
                                <h3 class="card-title">اضافه دوره جديد</h3>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="row">


                                    <div class="form-group col-md-6 col-12">
                                        <label for="exampleInputName1">اسم الدوره باللغه العربيه</label>
                                        <input required name="name_ar" type="text" class="form-control" id="exampleInputName1">
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label for="exampleInputName1">اسم الدوره باللغه الانجليزبه</label>
                                        <input  name="name_en" type="text" class="form-control" id="exampleInputName1">
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label for="summernote">محتوي الدوره باللغه العربيه</label>
                                        <textarea  name="description_ar" type="text" class="form-control" id="summernote"></textarea>
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label for="summernote2">محتوي الدوره باللفه الانجليزيه</label>
                                        <textarea  name="description_en" type="text" class="form-control" id="summernote2"></textarea>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="form-group col-md-4 col-12">
                                        <label for="price">سعر الدوره علي الموقع</label>
                                        <input name="price" type="number" class="form-control" id="exampleInputName1">
                                    </div>

                                    <div class="form-group col-md-4 col-12">
                                        <label for="price">سعر الدوره علي التطبيق</label>
                                        <input name="app_price" type="number" class="form-control" id="exampleInputName1">
                                    </div>


                                    <div class="form-group col-md-4 col-12">
                                        <label for="exampleInputName1">صوره الدوره</label>
                                        <input name="image" type="file" class="form-control" id="exampleInputName1" placeholder="">
                                    </div>




                                    <div class="form-group col-md-4 col-12">
                                        <label for="exampleInputName1">الفيديو التمهيدي</label>
                                        <input name="explanation_video" type="text" class="form-control" id="exampleInputName1">
                                    </div>


                                    <div class="form-group col-md-4 col-12">
                                        <label for="exampleInputName1">خطه الدوره</label>
                                        <input name="profile_file" type="file"  class="form-control" id="exampleInputName1" placeholder="">
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label for="category">القسم</label>
                                        <select id="category" name="category_id"  class="form-control">

                                            <option value="one">one</option>
                                            <option value="two">two</option>
                                            <option value="three">three</option>
                                            <option value="four">four</option>
                                            <option value="five">five</option>

                                            {{--                                            @foreach($categories as $category)--}}
{{--                                                <option @selected(request('category_id') == $category['id']) value="{{$category['id']}}">{{$category->t('name')}}</option>--}}
{{--                                            @endforeach--}}
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 col-12">
                                        <label for="exampleInputName1">تاريخ بدايه الدوره</label>
                                        <input required name="start_date" type="date" class="form-control" id="exampleInputName1">
                                    </div>

                                    <div class="form-group col-md-4 col-12">
                                        <label for="exampleInputName1">تاريخ نهايه الدوره <span class="optional">اختياري</span></label>
                                        <input name="end_date" type="date" class="form-control" id="exampleInputName1">
                                    </div>

                                    <div class="form-group col-md-4 col-12">
                                        <label for="exampleInputName1">duration <span class="optional">اختياري</span></label>
                                        <input name="duration" type="number" class="form-control" id="exampleInputName1" >
                                    </div>

                                    <div class="form-group col-md-4 col-12">
                                        <label for="exampleInputName1">لينك الواتساب <span class="optional">اختياري</span></label>
                                        <input name="whatsapp_link" type="text" class="form-control" id="exampleInputName1">
                                    </div>

                                    <div class="form-group col-md-4 col-12">
                                        <label for="exampleInputName1">لينك قناه التيلجرام للاستاذ <span class="optional">اختياري</span></label>
                                        <input name="telegram_link" type="text" class="form-control" id="exampleInputName1">
                                    </div>

                                    <div class="form-group col-md-4 col-12">
                                        <label for="exampleInputName1">لينك قناه التيليجرام للدوره <span class="optional">اختياري</span></label>
                                        <input name="telegram_channel_link" type="text" class="form-control" id="exampleInputName1">
                                    </div>


                                    <div class="form-group clearfix col-3">
                                        <div class="icheck-wetasphalt d-inline">
                                            <input name="is_active" type="checkbox" id="checkboxPrimary3">
                                            <label for="checkboxPrimary3">تفعيل الدوره</label>
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn-add">تسجيل البيانات</button>
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

    <script>
        $(function () {
            $('#summernote').summernote();
            $('#summernote2').summernote();

            bsCustomFileInput.init();
            $('.select2').select2({
                language: {
                    searching: function() {}
                },
            });
        });
    </script>

    <script>
        $('#content').on('change' , '.is_check' , function (){
            if (this.checked) {
                $(this).next().next().removeAttr("disabled");
            } else {
                $(this).next().next().attr("disabled", true);
                $(this).next().next().val(0);
            }
        });

        $('#check_certificate').on('change' , function (){
           if(this.checked) {
               $('#certificatePrice').removeAttr('disabled');
           }else {
               $('#certificatePrice').attr('disabled' , true);
           }
        });
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
