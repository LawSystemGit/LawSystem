@extends('layouts.master')

@section('title')
    اضافة قانون
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
                            <li><a href="{{route('getLaws')}}">القوانين</a></li>
                            <li><a href="{{route('addNewLaw')}}">اضافة قانون</a></li>
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

                        <form action="{{route('saveLaw')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-6 col-lg-6 float-right">
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label>النوع<span class="redstar">*</span></label>

                                        <select name="lawtype" id="lawtype" dir="rtl" class="SelectWithSearch" required>
                                            <option selected>....</option>
                                            <option dir="rtl" value="قانون">قانون</option>
                                            <option dir="rtl" value="مرسوم">مرسوم</option>
                                            <option dir="rtl" value="مقترح"> مقترح</option>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label>التصنيف</label>

                                        <select name="lawcategory" id="lawcategory" dir="rtl" class="SelectWithSearch"
                                                required>
                                            <option selected>....</option>
                                            <option dir="rtl" value="دستوري">دستوري</option>
                                            <option dir="rtl" value="جنائي">جنائي</option>
                                            <option dir="rtl" value="احوال">احوال</option>

                                        </select>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label>رقم القانون</label>
                                        <input type="num" name="lawno" id="lawno" lang="ar"
                                               class="form-control"
                                               placeholder="رقم القانون" required
                                               {{old('lawno')}} dir="rtl">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label>لسنة</label>
                                        <input type="num" name="lawyear" id="lawyear" lang="ar" class="form-control"
                                               placeholder="القانون لسنة" required {{old('lawyear')}} dir="rtl">
                                    </div>

                                    <div class="form-group col-md-12 col-lg-12">
                                        <label> بشأن <span class="redstar">*</span></label>
                                        <input type="num" class="form-control" placeholder="القانون بشأن"
                                               id="lawrelation" name="lawrelation"
                                               required {{old('lawyear')}}>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label>تاريخ النشر بالجريدة الرسمية</label>
                                        <input type="date" class="form-control" name="publishdate" id="publishdate"
                                            {{old('publishdate')}}>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label>رقم العدد بالجريدة الرسمية</label>
                                        <input type="num" name="publishid" id="publishid" class="form-control"
                                               placeholder="رقم العدد بالجريدة الرسمية" {{old('publishid')}} dir="rtl">
                                    </div>
                                </div>
                                @if ($files)
                                    <button type="submit" data-dismiss="modal" class="btn general_btn btn_1">حفظ
                                    </button>
                                    <a href="{{route('getLaws')}}" data-dismiss="modal"
                                       class="btn general_btn btn_1">العودة</a>
                                @else
                                    <a href="{{route('getLaws')}}" data-dismiss="modal"
                                       class="btn general_btn btn_1">العودة</a>
                                @endif
                                @if ($lastLaw)
                                    <a href="{{route('updateLastLaw',['lastLaw'=>$lastLaw])}}"
                                       class="btn general_btn btn_1"
                                    >
                                        تعديل الإدخال الأخير
                                    </a>

                                @endif

                            </div>

                            <div class="col-md-6 col-lg-6 float-right overflow-auto" style="height: 500px;
                            overflow-y: scroll;">

                                <iframe id="myFrame" style="display:none" width="100%" height="400"></iframe>

                                <div class="radio">
                                    @foreach ($files as $fileName)
                                        <label>
                                            <input type="radio"
                                                   onclick="openFile({{json_encode($fileName)}},'laws_unfinished')"
                                                   name="lawfile"
                                                   id="lawfile" value="{{$fileName}}">
                                            {{$fileName}}
                                        </label>
                                    @endforeach
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <!-- end row -->

    <!-- end content-wrapper -->

@endsection

@section('secripts')

@endsection
