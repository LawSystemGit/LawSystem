@extends('layouts.master')

@section('title')
    إضافة حكم جزائي
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
                            <li><a href="{{route('KuwaitAlyoum')}}">الكويت اليوم</a></li>
                            <li>العدد رقم {{$versionID->versionno}}</li>
                            <li>إضافة حكم جزائي</li>
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
                        <form action="{{route('save_Provision',['versionID'=>$versionID->id])}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 float-right">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>تاريخ الجلسة</label>
                                        <input type="date" class="form-control" name="provisiondate" id="provisiondate"
                                               {{old('provisiondate')}} required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>رقم القضية</label>
                                        <input type="num" name="caseno" id="caseno" lang="en" class="form-control"
                                               placeholder="رقم القضية" {{old('caseno')}} dir="rtl"
                                               required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>رقم المخفر</label>
                                        <input type="num" name="policestation" id="policestation" lang="en"
                                               class="form-control"
                                               placeholder="رقم المخفر" {{old('policestation')}} dir="rtl"
                                               required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label> نص الحكم</label>
                                        <textarea lang="ar" class="form-control"
                                                  name="provisionbody" id="provisionbody"
                                                  required placeholder="نص الحكم" rows="8"></textarea>
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
