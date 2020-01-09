@extends('layouts.master')

@section('title')
    تعديل مرسوم
@endsection

@section('stylesheets')

@endsection

@section('content')

    <!-- start content-wrapper -->
    <div class="content-wrapper">
        <div class="main_content">

            <!-- start row -->
            <div class="row align-items-center min-height-row">
                <div class="col-lg-6">
                    <div class="d-flex align-items-center flex-wrap">
                        <ol class="breadcrumb">
                            <li><a href="#">الرئيسية</a></li>
                            <li>الكويت اليوم</li>
                            <li>العدد رقم {{$decree->kuwaitVersion->versionno}}</li>
                            <li>تعديل مرسوم</li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-6">
                </div>
            </div>
            <!-- end row -->
            <!-- start row -->
            <div class="row mt-0">
                <div class="col-lg-12 tbl-new-brdr">
                    <div class="panel panel-default no-brdr">
                        <form action="{{route('update_Decree',['decree'=>$decree->id])}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            {{method_field('PATCH')}}
                            <div class="col-md-12 float-right">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>جهه المرسوم</label>
                                        <input type="num" name="decreesource" id="decreesource" lang="ar"
                                               class="form-control"
                                               placeholder="جهه المرسوم" {{old('decreesource')}} dir="rtl"
                                               value="{{$decree->decreesource}}"
                                               required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>رقم المرسوم</label>
                                        <input type="num" name="decreeno" id="decreeno" lang="en" class="form-control"
                                               placeholder="رقم المرسوم" {{old('decreeno')}} dir="rtl"
                                               value="{{$decree->decreeno}}"
                                               required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>عنوان المرسوم</label>
                                        <input type="num" name="decreetitle" id="decreetitle" lang="ar"
                                               class="form-control"
                                               placeholder="عنوان المرسوم" {{old('decreetitle')}} dir="rtl"
                                               value="{{$decree->decreetitle}}"
                                               required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label> سنة الإصدار</label>
                                        <input type="num" name="decreeyear" id="decreeyear" lang="ar"
                                               class="form-control"
                                               placeholder="سنة الإصدار" {{old('decreeyear')}} dir="rtl"
                                               value="{{$decree->decreeyear}}"
                                               required>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label>نص المرسوم</label>
                                        <textarea lang="ar" class="form-control"
                                                  name="decreebody" id="decreebody"
                                                  required placeholder="نص المرسوم" rows="8" {{old('decreebody')}}>
                                           {{$decree->decreebody}}
                                        </textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <button type="submit" data-dismiss="modal" class="btn general_btn btn_1">حفظ
                                        </button>
                                        <a href="{{route('showVersion',['version' =>$decree->kuwaitVersion->id])}}"
                                           data-dismiss="modal"
                                           class="btn general_btn btn_1">العودة</a>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end content-wrapper -->

@endsection

@section('secripts')

@endsection
