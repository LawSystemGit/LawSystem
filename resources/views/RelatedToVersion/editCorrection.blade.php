@extends('layouts.master')

@section('title')
    تعديل إستدراك
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
                            <li>العدد رقم {{$correction->kuwaitVersion->versionno}}</li>
                            <li>تعديل إستدراك</li>
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
                        <form action="{{route('update_Correction',['correction'=>$correction])}}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            {{method_field ('PATCH')}}
                            <div class="col-md-12 float-right">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="raster">جهه الإستدراك*</label>
                                        <input type="num" name="correctionsource"
                                               id="correctionsource"
                                               class="form-control"
                                               placeholder="جهه الإستدراك"
                                               dir="rtl"
                                               value="{{old('correctionsource')
                                               ??$correction->correctionsource??''}}"
                                        >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label> تاريخ الإصدار *</label>
                                        <input type="date" name="correctiondate" id="correctiondate"
                                               lang="en"
                                               class="form-control"
                                               placeholder=" تاريخ الإصدار"
                                               value="{{old('correctiondate')
                                               ??$correction->correctiondate??''}}" dir="ltr"
                                        >
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label> نص الإستدراك *</label>
                                        <textarea lang="ar" class="form-control"
                                                  name="correctionbody" id="correctionbody"
                                                  placeholder="نص الإستدراك" rows="8" required>
                                            {{old('correctionbody')
                                               ??$correction->correctionbody??''}}
                                        </textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <button type="submit" data-dismiss="modal"
                                                class="btn general_btn btn_1">حفظ
                                        </button>
                                        <a href="{{route('showVersion',
                                        ['version'=>$correction->kuwaitVersion->id])}}"
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
