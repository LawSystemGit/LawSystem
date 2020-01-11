@extends('layouts.master')

@section('title')
    إضافة دعوه
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
                            <li>إضافة دعوه</li>
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
                        <form action="{{route('save_invitation',['versionID'=>$versionID->id])}}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 float-right">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>جهه الدعوه</label>
                                        <input type="num" name="invitationsource"
                                               id="invitationsource" lang="ar"
                                               class="form-control"
                                               placeholder="جهه الدعوه"
                                               {{old('invitationsource')}} dir="rtl"
                                        >
                                    </div>

                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label>نص الدعوه</label>
                                        <textarea lang="ar" class="form-control"
                                                  name="invitationbody" id="invitationbody"
                                                  required placeholder="نص الدعوه" rows="8" {{old ('invitationbody')}}>
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
