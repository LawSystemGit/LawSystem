@extends('layouts.master')

@section('title')
    إضافة قرار
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
                            <li>إضافة قرار</li>
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
                        <form action="{{route('save_Decision',['versionID'=>$versionID->id])}}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 float-right">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>جهه التنويه</label>
                                        <input type="num" name="decisionsource" id="decisionsource"
                                               class="form-control"
                                               placeholder="جهه القرار" {{old('decisionsource')}}
                                               dir="rtl"
                                        >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>رقم القرار</label>
                                        <input type="num" name="decisionno" id="decisionno"
                                               class="form-control"
                                               placeholder="رقم القرار" {{old('decisionno')}}
                                               dir="rtl"
                                               required>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>القرار بشأن / عنوان القرار</label>
                                        <input type="num" name="decisiontitle" id="decisiontitle"
                                               class="form-control"
                                               placeholder="القرار بشأن / عنوان القرار"
                                               {{old('decisiontitle')}}
                                               dir="rtl"
                                        >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label> تاريخ الإصدار</label>
                                        <input type="date" name="decisiondate" id="decisiondate"
                                               lang="en"
                                               class="form-control"
                                               placeholder=" تاريخ الإصدار"
                                               {{old('decisiondate')}} dir="ltr"
                                        >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>نص القرار</label>
                                        <textarea lang="ar" class="form-control"
                                                  name="decisionbody" id="decisionbody"
                                                  placeholder="نص القرار" rows="8" required>
                                            {{old('decisionbody')}}
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
