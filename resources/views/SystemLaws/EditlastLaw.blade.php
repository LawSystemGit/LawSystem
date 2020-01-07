@extends('layouts.master')

@section('title')
    تعديل قانون رقم {{$lastLaw->lawno}}
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
                            <li><a href="{{route('addNewLaw')}}">تعديل الإدخال الإخير </a></li>
                            <li>تعديل القانون رقم {{$lastLaw->lawno}}</li>
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

                        <form action="{{route('saveLastLaw',['lastLaw'=>$lastLaw])}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            {{method_field('PATCH')}}
                            <div class="col-md-7 float-right">
                                <div class="form-row">
                                    <div class="form-group col-md-2 col-lg-2">
                                        <label>النوع<span class="redstar">*</span></label>

                                        <select name="lawtype" id="lawtype" dir="rtl" class="SelectRemovedSearch"
                                                required>
                                            <option
                                                @if ($lastLaw->lawtype == "قانون")
                                                selected
                                                @endif
                                                dir="rtl" value="قانون">قانون
                                            </option>
                                            <option
                                                @if ($lastLaw->lawtype == "مرسوم")
                                                selected
                                                @endif
                                                dir="rtl" value="مرسوم">مرسوم
                                            </option>
                                            <option
                                                @if ($lastLaw->lawtype == "مقترح")
                                                selected
                                                @endif
                                                dir="rtl" value="مقترح">
                                                مقترح
                                            </option>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 col-lg-2">
                                        <label>التصنيف</label>

                                        <select name="lawcategory" id="lawcategory" dir="rtl" class="SelectWithSearch"
                                                required>
                                            <option
                                                @if ($lastLaw->lawcategory=="دستوري")
                                                selected
                                                @endif
                                                dir="rtl" value="دستوري">دستوري
                                            </option>
                                            <option
                                                @if ($lastLaw->lawcategory=="جنائي")
                                                selected
                                                @endif
                                                dir="rtl" value="جنائي">جنائي
                                            </option>
                                            <option
                                                @if ($lastLaw->lawcategory=="احوال")
                                                selected
                                                @endif
                                                dir="rtl" value="احوال">احوال
                                            </option>

                                        </select>
                                    </div>

                                    <div class="form-group col-md-2 col-lg-2">
                                        <label>رقم القانون</label>
                                        <input type="num" name="lawno" id="lawno" lang="ar" class="form-control"
                                               placeholder="رقم القانون" required {{old('lawno')}} dir="rtl"
                                               value="{{$lastLaw->lawno}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label>لسنة</label>
                                        <input type="num" name="lawyear" id="lawyear" lang="ar" class="form-control"
                                               placeholder="القانون لسنة" required {{old('lawyear')}} dir="rtl"
                                               value="{{$lastLaw->lawyear}}">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label> بشأن <span class="redstar">*</span></label>
                                        <input type="num" class="form-control" placeholder="القانون بشأن"
                                               id="lawrelation" name="lawrelation"
                                               required {{old('lawyear')}}
                                               value="{{$lastLaw->lawrelation}}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>تاريخ النشر بالجريدة الرسمية</label>
                                        <input type="date" class="form-control" name="publishdate" id="publishdate"
                                               {{old('publishdate')}}
                                               value="{{$lastLaw->publishdate}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>رقم العدد بالجريدة الرسمية</label>
                                        <input type="num" name="publishid" id="publishid" class="form-control"
                                               placeholder="رقم العدد بالجريدة الرسمية" {{old('publishid')}} dir="rtl"
                                               value="{{$lastLaw->publishid}}">
                                    </div>
                                </div>
                                <button type="submit" data-dismiss="modal" class="btn general_btn btn_1">حفظ
                                </button>
                                <a href="{{route('getLaws')}}" data-dismiss="modal"
                                   class="btn general_btn btn_1">العودة</a>

                            </div>

                            <div class="col-md-5 float-right overflow-auto" style="height: 500px;overflow-y: scroll;">

                                <iframe id="myFrame" style="display:none" width="100%" height="450"></iframe>
                                @if($lastLaw->lawfile)
                                    <div class="radio">
                                        <label>
                                            <input type="radio"
                                                   onclick="openFile({{json_encode($lastLaw->lawfile)}},'Law_PDF')"
                                                   name="lawfile"
                                                   id="lawfile" value="{{$lastLaw->lawfile}}">
                                            {{$lastLaw->lawfile}}
                                        </label>

                                    </div>
                                @endif
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
