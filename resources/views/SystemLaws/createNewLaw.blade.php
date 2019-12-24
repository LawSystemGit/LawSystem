@extends('layouts.master')

@section('title')
    اضافة قانون
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

                        <form method="post" action="{{route('saveLaw')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label>النوع<span class="redstar">*</span></label>

                                    <select name="lawtype" id="lawtype" dir="rtl" class="SelectRemovedSearch" required>
                                        <option selected>....</option>
                                        <option dir="rtl" value="قانون">قانون</option>
                                        <option dir="rtl" value="مرسوم">مرسوم</option>
                                        <option dir="rtl" value="مقترح"> مقترح</option>


                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>التصنيف</label>

                                    <select name="lawcategory" id="lawcategory" dir="rtl" class="SelectWithSearch"
                                            required>
                                        <option selected>....</option>
                                        <option dir="rtl" value="دستوري">دستوري</option>
                                        <option dir="rtl" value="جنائي">جنائي</option>
                                        <option dir="rtl" value="احوال">احوال</option>

                                    </select>
                                </div>

                                <div class="form-group col-md-2">
                                    <label>رقم القانون</label>
                                    <input type="num" name="lawno" id="lawno" lang="ar" class="form-control"
                                           placeholder="رقم القانون" required {{old('lawno')}} dir="rtl">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>لسنة</label>
                                    <input type="num" name="lawyear" id="lawyear" lang="ar" class="form-control"
                                           placeholder="القانون لسنة" required {{old('lawyear')}} dir="rtl">
                                </div>

                                <div class="form-group col-md-4">
                                    <label> بشأن <span class="redstar">*</span></label>
                                    <input type="num" class="form-control" placeholder="القانون بشأن"
                                           id="lawrelation" name="lawrelation"
                                           required {{old('lawyear')}}>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">

                                    <label>مستند القانون</label>


                                    <div class="uploader">
                                        <span class="file-name" id="file-name">لم يتم ارفاق اي ملف</span>
                                        <input type="file" id="lawfile" name="lawfile" accept="application/pdf">
                                        <span class="upload-file btn btn-secondary">ارفق ملف</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="submit" class="btn general_btn btn_1" value="حفظ">
                                <input type="reset" class="btn general_btn btn_1" value="إلغاء">
                            </div>
                        </form>
                        {{-- onclick="return toast('عملية ناجحة','تم تعديل المستخدم','success')" --}}
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end content-wrapper -->

@endsection

@section('secripts')
    <script src="{{asset('js/master.js')}}"></script>
@endsection
