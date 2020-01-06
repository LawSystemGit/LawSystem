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

                        <form action="{{route('saveVersion')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6 float-right">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>نوع الإصدار</label>
                                        <select name="versionType" id="versionType" dir="rtl" class="SelectWithSearch"
                                                required>
                                            <option dir="rtl" value="عدد اساسى">عدد اساسى</option>
                                            <option dir="rtl" value="ملحق">ملحق</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>رقم العدد</label>
                                        <input type="num" name="versionNo" id="versionNo" lang="en" class="form-control"
                                               placeholder=" رقم العدد" required {{old('versionNo')}} dir="rtl">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>تاريخ النشر بالجريدة الرسمية</label>
                                        <input type="date" class="form-control" name="versionDate" id="versionDate"
                                               {{old('versionDate')}} required>
                                    </div>

                                </div>
                                @if ($files)
                                    <button type="submit" data-dismiss="modal" class="btn general_btn btn_1">حفظ
                                    </button>
                                    <a href="{{route('KuwaitAlyoum')}}" data-dismiss="modal"
                                       class="btn general_btn btn_1">العودة</a>
                                @else
                                    <a href="{{route('KuwaitAlyoum')}}" data-dismiss="modal"
                                       class="btn general_btn btn_1">العودة</a>
                                @endif
                                @if ($lastVersion)
                                    <a href="{{route('updateLastVersion',['lastVersion'=>$lastVersion])}}"
                                       class="btn general_btn btn_1"
                                    >
                                        تعديل الإدخال الأخير
                                    </a>

                                @endif

                            </div>

                            <div class="col-md-6 float-right overflow-auto" style="height: 650px;overflow-y: scroll;">

                                <iframe id="myFrame" style="display:none" width="100%" height="400"></iframe>

                                <div class="radio">
                                    @foreach ($files as $fileName)
                                        <label>
                                            <input type="radio"
                                                   onclick="openPdf({{json_encode($fileName)}})" name="versionFile"
                                                   id="versionFile" value="{{$fileName}}" required>
                                            {{$fileName}}
                                        </label>
                                    @endforeach
                                </div>
                                <script type="text/javascript">
                                    function openPdf(file) {
                                        var omyFrame = document.getElementById("myFrame");
                                        omyFrame.style.display = "block";
                                        let filename = "/storage/KuwaitAlyoum_unfinished/" + file;
                                        omyFrame.src = filename;
                                    }
                                </script>
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
