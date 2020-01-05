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
                            <li><a href="#">اضافة عدد</a></li>
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

                        <form method="post" action="{{route('saveversion')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label>نوع الإصدار<span class="redstar"></span></label>
                                    <select name="versiontype" id="versiontype" dir="rtl" class="SelectWithSearch"
                                            required>
                                        <option dir="rtl" value="عدد اساسى">عدد اساسى</option>
                                        <option dir="rtl" value="ملحق">ملحق</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>رقم العدد</label>
                                    <input type="num" name="versionno" id="versionno" lang="en" class="form-control"
                                           placeholder=" رقم العدد" required {{old('versionno')}} dir="rtl">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>تاريخ النشر بالجريدة الرسمية</label>
                                    <input type="date" class="form-control" name="versiondate" id="versiondate"
                                           {{old('versiondate')}} required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">

                                    <label>مستند العدد</label>

                                    <div class="uploader">
                                        {{--                                        <span class="file-name" id="file-name">لم يتم ارفاق اي ملف</span>--}}
                                        <input type="file" id="versionfile" name="versionfile" required
                                               accept="application/pdf">
                                        <span class="upload-file btn btn-secondary">ارفق ملف</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="submit" class="btn general_btn btn_1" value="حفظ">
                                <a href="{{route('getLaws')}}" class="btn general_btn btn_1">
                                    العودة
                                </a>
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

@endsection
