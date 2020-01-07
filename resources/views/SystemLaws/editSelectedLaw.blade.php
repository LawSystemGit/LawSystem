@extends('layouts.master')

@section('title')
    تعديل قانون رقم {{$lawID->lawno}}
@endsection

@section('stylesheets')

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="main_content">

            <!-- start row -->
            <div class="row align-items-center min-height-row">
                <div class="col-lg-6">
                    <div class="d-flex align-items-center flex-wrap">
                        <ol class="breadcrumb">
                            <li><a href="#">الرئيسية</a></li>
                            <li><a href="{{route('getLaws')}}">القوانين</a></li>
                            <li>تعديل القانون رقم {{$lawID->lawno}}</li>
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

                        <form method="post" action="{{route('updateLaw',['lawID'=>$lawID->id])}}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="col-md-6 float-right">
                                <div class="form-row">
                                    <div class="form-group col-md-3 col-lg-3">
                                        <label>النوع<span class="redstar">*</span></label>

                                        <select name="lawtype" id="lawtype" dir="rtl"
                                                class="SelectRemovedSearch"
                                                required>
                                            <option
                                                @if ($lawID->lawtype == "قانون")
                                                selected
                                                @endif
                                                dir="rtl" value="قانون">قانون
                                            </option>
                                            <option
                                                @if ($lawID->lawtype == "مرسوم")
                                                selected
                                                @endif
                                                dir="rtl" value="مرسوم">مرسوم
                                            </option>
                                            <option
                                                @if ($lawID->lawtype == "مقترح")
                                                selected
                                                @endif
                                                dir="rtl" value="مقترح">
                                                مقترح
                                            </option>
                                            <option
                                                @if ($lawID->lawtype == "إعلان")
                                                selected
                                                @endif
                                                dir="rtl" value="إعلان">
                                                مقترح
                                            </option>
                                            <option
                                                @if ($lawID->lawtype == "قرار")
                                                selected
                                                @endif
                                                dir="rtl" value="قرار">
                                                مقترح
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 col-lg-3">
                                        <label>التصنيف</label>

                                        <select name="lawcategory" id="lawcategory" dir="rtl"
                                                class="SelectWithSearch"
                                                required>
                                            <option
                                                @if ($lawID->lawcategory=="دستوري")
                                                selected
                                                @endif
                                                dir="rtl" value="دستوري">دستوري
                                            </option>
                                            <option
                                                @if ($lawID->lawcategory=="جنائي")
                                                selected
                                                @endif
                                                dir="rtl" value="جنائي">جنائي
                                            </option>
                                            <option
                                                @if ($lawID->lawcategory=="احوال")
                                                selected
                                                @endif
                                                dir="rtl" value="احوال">احوال
                                            </option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3 col-lg-3">
                                        <label>رقم القانون</label>
                                        <input type="num" name="lawno" id="lawno" lang="ar"
                                               class="form-control"
                                               placeholder="رقم القانون" {{old('lawno')}} required
                                               value="{{$lawID->lawno}}" dir="rtl">

                                    </div>
                                    <div class="form-group col-md-3 col-lg-3">
                                        <label>لسنة</label>
                                        <input type="num" name="lawyear" id="lawyear" lang="ar"
                                               class="form-control"
                                               placeholder="القانون لسنة" required
                                               value="{{$lawID->lawyear}}"
                                               dir="rtl" {{old('lawyear')}}>
                                    </div>
                                </div>
                                <div class="form-row col-md-6 col-lg-6">
                                    <label> بشأن <span class="redstar">*</span></label>
                                    <input type="num" class="form-control"
                                           placeholder="القانون بشأن"
                                           id="lawrelation" name="lawrelation"
                                           required value="{{$lawID->lawrelation}}">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>تاريخ النشر بالجريدة الرسمية</label>
                                        <input type="date" class="form-control" name="publishdate"
                                               id="publishdate"
                                               {{old('publishdate')}} value="{{$lawID->publishdate}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>رقم العدد بالجريدة الرسمية</label>
                                        <input type="num" name="publishid" id="publishid"
                                               class="form-control"
                                               placeholder="رقم العدد بالجريدة الرسمية"
                                               {{old('publishid')}} dir="rtl"
                                               value="{{$lawID->publishid}}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4" id="changefile">
                                        <label>
                                            <input type="radio"
                                                   onclick="document.getElementById('lawfilesection').style.display='block';document.getElementById('changefile').style.display='none';"/>
                                            تغيير مستند القانون </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="submit" class="btn general_btn btn_1"
                                               value="تحديث">
                                        <a href="{{route('showlaw',['law'=>$lawID])}}"
                                           class="btn general_btn btn_1">
                                            رجوع
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 float-right overflow-auto" style="height: 500px;
                            overflow-y: scroll;display: none; " id="lawfilesection">
                                <iframe id="myFrame" style="display:none" width="100%"
                                        height="400"></iframe>

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
@endsection

@section('secripts')

@endsection
