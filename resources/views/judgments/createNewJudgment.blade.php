@extends('layouts.master')

@section('title')
    إضافة حكم
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
                            <li>القوانين</li>
                            <li>اضافة حكم</li>
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

                        <form action="{{route('saveJudgments')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6 float-right">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>التصنيف<span class="redstar">*</span></label>

                                        <select class="SelectWithSearch" name="judgmentcategory" id="judgmentcategory"
                                                required>
                                            <option selected>....</option>
                                            <option value="دستوري">دستوري</option>
                                            <option value="جنائي">جنائي</option>
                                            <option value="احوال">احوال</option>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>تاريخ الجلسة</label>

                                        <input type="date" class="form-control" name="judgmentDate" id="judgmentDate"
                                               required>

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>السنة</label>
                                        <input type="text" class="form-control" id="year" name="year"
                                               required {{old('year')}}>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>رقم الطعن</label>
                                        <input type="text" class="form-control" id="objectionNo" name="objectionNo"
                                               required {{old('objectionNo')}}>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label> عدد المبادئ <span class="redstar">*</span></label>
                                        <input type="text" class="form-control" id="notes" name="notes"
                                               required {{old('notes')}}>
                                    </div>
                                </div>
                                @if ($files)
                                    <button type="submit" data-dismiss="modal" class="btn general_btn btn_1">حفظ
                                    </button>
                                    <a href="{{route('getJudgments')}}" data-dismiss="modal"
                                       class="btn general_btn btn_1">العودة</a>
                                @else
                                    <a href="{{route('getJudgments')}}" data-dismiss="modal"
                                       class="btn general_btn btn_1">العودة</a>
                                @endif
                                @if ($lastJudgment)
                                    <a href="{{route('updateLastInput',['lastJudgment'=>$lastJudgment])}}"
                                       class="btn general_btn btn_1"
                                    >
                                        تعديل الإدخال الأخير
                                    </a>

                                @endif

                            </div>

                            <div class="col-md-6 float-right">

                                <iframe id="myFrame" style="display:none" width="100%" height="400"></iframe>

                                <div class="radio">
                                    @foreach ($files as $fileName)
                                        <label>
                                            <input type="radio"
                                                   onclick="openPdf({{json_encode($fileName)}})" name="judgmentfile"
                                                   id="judgmentfile" value="{{$fileName}}" required>
                                            {{$fileName}}
                                        </label>
                                    @endforeach
                                </div>
                                <script type="text/javascript">
                                    function openPdf(file) {
                                        var omyFrame = document.getElementById("myFrame");
                                        omyFrame.style.display = "block";
                                        let filename = "/storage/unfinished_judgments/" + file;
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


