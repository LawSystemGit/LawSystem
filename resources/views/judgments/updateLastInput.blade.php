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
                            <li>تعديل الأدخال الأخير</li>
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

                        <form action="{{route('saveLastInput',['lastJudgment'=>$judgment])}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-6 float-right">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>التصنيف<span class="redstar">*</span></label>

                                        <select class="SelectWithSearch" name="judgmentcategory" id="judgmentcategory"
                                                required>
                                            <option
                                                @if ($judgment->judgmentcategory == 'دستوري')
                                                selected
                                                @endif
                                                value="دستوري">دستوري
                                            </option>
                                            <option
                                                @if ($judgment->judgmentcategory == 'جنائي')
                                                selected
                                                @endif
                                                value="جنائي">جنائي
                                            </option>
                                            <option
                                                @if ($judgment->judgmentcategory == 'احوال')
                                                selected
                                                @endif
                                                value="احوال">احوال
                                            </option>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>تاريخ الجلسة</label>

                                        <input type="date"
                                               value="{{$judgment->judgmentDate}}"
                                               class="form-control" name="judgmentDate" id="judgmentDate" required>

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>السنة</label>
                                        <input type="text"
                                               value="{{$judgment->year}}"
                                               class="form-control" id="year" name="year" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>رقم الطعن</label>
                                        <input type="text"
                                               value="{{$judgment->objectionNo}}"
                                               class="form-control" id="objectionNo" name="objectionNo">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label> عدد المبادئ <span class="redstar">*</span></label>
                                        <input type="text"
                                               value="{{$judgment->notes}}"
                                               class="form-control" id="notes" name="notes"/>
                                    </div>
                                </div>

                                <button type="submit" data-dismiss="modal" class="btn general_btn btn_1">حفظ</button>
                                <a href="{{route('getJudgments')}}" data-dismiss="modal" class="btn general_btn btn_1">العودة</a>

                            </div>

                            <div class="col-md-6 float-right">
                                <iframe id="myFrame" style="display:none" width="100%" height="400"></iframe>

                                <div class="radio">

                                        <label>
                                            <input type="radio"
                                                   onclick="openPdf({{json_encode($judgment->judgmentFile)}})"
                                                   name="judgmentfile"
                                                   id="judgmentfile" value="{{$judgment->judgmentFile}}">
                                            {{$judgment->judgmentFile}}
                                        </label>

                                </div>
                                <script type="text/javascript">
                                    function openPdf(file) {
                                        var omyFrame = document.getElementById("myFrame");
                                        omyFrame.style.display = "block";
                                        let filename = "/storage/Finished_Judgments/" + file;
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
