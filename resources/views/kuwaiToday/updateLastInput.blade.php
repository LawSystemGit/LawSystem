@extends('layouts.master')

@section('title')
    اضافة عدد
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
                            <li>تعديل العدد رقم {{$lastVersion->versionno}}</li>
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

                        <form action="{{route('saveLastVersion',['lastVersion'=>$lastVersion])}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            {{method_field('PATCH')}}
                            <div class="col-md-6 float-right">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>نوع الإصدار</label>
                                        <select name="versionType" id="versionType" dir="rtl" class="SelectWithSearch"
                                                required>

                                            <option dir="rtl" value="عدد اساسى"
                                                    @if($lastVersion->versiontype == "عدد اساسى")
                                                    selected
                                                @endif
                                            >عدد اساسى
                                            </option>
                                            <option dir="rtl" value="ملحق"
                                                    @if($lastVersion->versiontype == "ملحق")
                                                    selected
                                                @endif

                                            >ملحق
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>رقم العدد</label>
                                        <input type="num" name="versionNo" id="versionNo" lang="en" class="form-control"
                                               placeholder=" رقم العدد" required {{old('versionNo')}} dir="rtl"
                                               value="{{$lastVersion->versionno}}"
                                        >
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>تاريخ النشر بالجريدة الرسمية</label>
                                        <input type="date" class="form-control" name="versionDate" id="versionDate"
                                               {{old('versionDate')}}
                                               value="{{$lastVersion->versiondate}}"
                                        >
                                    </div>

                                </div>
                                <button type="submit" data-dismiss="modal" class="btn general_btn btn_1">حفظ
                                </button>
                                <a href="{{route('addVersion')}}" data-dismiss="modal"
                                   class="btn general_btn btn_1">العودة</a>
                            </div>

                            <div class="col-md-6 float-right overflow-auto" style="height: 650px;overflow-y: scroll;">

                                <iframe id="myFrame" style="display:none" width="100%" height="400"></iframe>

                                <div class="radio">
                                    <label>
                                        <input type="radio"
                                               onclick="openPdf({{json_encode($lastVersion->versionfile)}})"
                                               name="versionFile"
                                               id="versionFile" value="{{$lastVersion->versionfile}}">
                                        {{$lastVersion->versionfile}}
                                    </label>
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
