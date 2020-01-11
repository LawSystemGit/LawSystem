@extends('layouts.master')

@section('title')
    تعديل دعوه
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
                            <li>العدد رقم {{$invitation->kuwaitVersion->versionno}}</li>
                            <li>تعديل دعوه</li>
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
                        <form action="{{route('update_invitation',['invitation'=>$invitation])
                        }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            {{method_field ('PATCH')}}
                            <div class="col-md-12 float-right">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>جهه الدعوه</label>
                                        <input type="num" name="invitationsource"
                                               id="invitationsource" lang="ar"
                                               class="form-control"
                                               placeholder="جهه الدعوه" dir="rtl"
                                               value="{{old('invitationsource')
                                               ??$invitation->invitationsource??''}}"
                                        >
                                    </div>

                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label>نص الدعوه</label>
                                        <textarea lang="ar" class="form-control"
                                                  name="invitationbody" id="invitationbody"
                                                  required placeholder="نص الدعوه" rows="8">
                                            {{old('invitationsource')??$invitation->invitationbody??''}}
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
                                        ['version'=>$invitation->kuwaitVersion->id])}}"
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
