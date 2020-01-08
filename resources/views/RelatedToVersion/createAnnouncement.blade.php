@extends('layouts.master')

@section('title')
    إضافة إعلان
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
                            <li>إضافة إعلان</li>
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
                        <form action="{{route('save_Announcement',['versionID'=>$versionID->id])}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 float-right">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>جهه الإعلان</label>
                                        <input type="num" name="announcource" id="announcource" lang="ar"
                                               class="form-control"
                                               placeholder="جهه الإعلان" {{old('announcource')}} dir="rtl"
                                               required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>رقم الإعلان</label>
                                        <input type="num" name="announno" id="announno" lang="en" class="form-control"
                                               placeholder="رقم الإعلان" {{old('announno')}} dir="rtl"
                                        >
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>عنوان الإعلان</label>
                                        <input type="num" name="announctitle" id="announctitle" lang="ar"
                                               class="form-control"
                                               placeholder="عنوان الإعلان" {{old('announctitle')}} dir="rtl"
                                        >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>نص الإعلان</label>
                                        <textarea lang="ar" class="form-control"
                                                  name="announcbody" id="announcbody"
                                                  required placeholder="نص الإعلان" rows="8"></textarea>
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
