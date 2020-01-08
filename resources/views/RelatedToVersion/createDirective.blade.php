@extends('layouts.master')

@section('title')
    إضافة تعليمات
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
                            <li>العدد رقم {{$versionID->versionno}}</li>
                            <li>إضافة تعليمات</li>
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
                        <form action="{{route('save_Directive',['versionID'=>$versionID->id])}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 float-right">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>جهه التعليمات</label>
                                        <input type="num" name="directivesource" id="directivesource" lang="ar"
                                               class="form-control"
                                               placeholder="جهه التعليمات" {{old('directivesource')}} dir="rtl"
                                               required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>رقم التعليمات</label>
                                        <input type="num" name="directiveno" id="directiveno" lang="en"
                                               class="form-control"
                                               placeholder="رقم التعليمات" {{old('directiveno')}} dir="rtl"
                                        >
                                    </div>


                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>عنوان التعليمات</label>
                                        <input type="num" name="directivetitle" id="directivetitle" lang="ar"
                                               class="form-control"
                                               placeholder="عنوان التعليمات" {{old('directivetitle')}} dir="rtl"
                                        >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label> سنة الإصدار</label>
                                        <input type="num" name="directiveyear" id="directiveyear" lang="ar"
                                               class="form-control"
                                               placeholder=" سنة الإصدار" {{old('directiveyear')}} dir="rtl"
                                        >
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label>نص التعليمات</label>
                                        <textarea lang="ar" class="form-control"
                                                  name="directivebody" id="directivebody"
                                                  required placeholder="نص التعليمات" rows="8"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <button type="submit" data-dismiss="modal" class="btn general_btn btn_1">حفظ
                                        </button>
                                        <a href="{{route('showVersion',['version'=>$versionID])}}" data-dismiss="modal"
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
