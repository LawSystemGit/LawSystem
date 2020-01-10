@extends('layouts.master')

@section('title')
    إضافة محضر إجتماع
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
                            <li>إضافة محضر إجتماع</li>
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
                        <form action="{{route('save_meetingRecord',['versionID'=>$versionID->id])}}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 float-right">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>جهه المحضر</label>
                                        <input type="num" name="meetingsource" id="meetingsource"
                                               class="form-control"
                                               placeholder="جهه المحضر" {{old('meetingsource')}}
                                               dir="rtl"
                                               required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label> تاريخ الإصدار</label>
                                        <input type="date" name="meetingdate" id="meetingdate"
                                               lang="en"
                                               class="form-control"
                                               placeholder=" تاريخ الإصدار"
                                               {{old('meetingdate')}} dir="ltr"
                                               required>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label>نص المحضر</label>
                                        <textarea class="form-control" dir="rtl"
                                                  name="meetingrecord" id="meetingrecord"
                                                  required placeholder="نص المحضر" rows="8">
                                        </textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <button type="submit" data-dismiss="modal"
                                                class="btn general_btn btn_1">حفظ
                                        </button>
                                        <a href="{{route('showVersion',['version'=>$versionID])}}"
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
