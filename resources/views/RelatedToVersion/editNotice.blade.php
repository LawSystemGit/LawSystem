@extends('layouts.master')

@section('title')
    تعديل تنوية
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
                            <li>العدد رقم {{$notice->kuwaitVersion->versionno}}</li>
                            <li>تعديل تنوية</li>
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
                        <form action="{{route('update_Notice',['notice'=>$notice])}}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            {{method_field('PATCH')}}
                            <div class="col-md-12 float-right">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>جهه التنويه</label>
                                        <input type="num" name="noticesource" id="noticesource"
                                               class="form-control"
                                               placeholder="جهه التنويه" value="{{old
                                               ('noticesource')??$notice->noticesource??''}}"
                                               dir="rtl"
                                        >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label> تاريخ الإصدار</label>
                                        <input type="date" name="noticedate" id="noticedate"
                                               lang="en"
                                               class="form-control"
                                               placeholder=" تاريخ الإصدار"
                                               value="{{old
                                               ('noticedate')??$notice->noticedate??''}}" dir="ltr"
                                        >
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label>نص التنويه</label>
                                        <textarea lang="ar" class="form-control"
                                                  name="noticebody" id="noticebody"
                                                  required placeholder="نص التنويه" rows="8">
                                            {{old
                                               ('noticebody')??$notice->noticebody??''}}
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
                                        ['version'=>$notice->kuwaitVersion->id])}}"
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
