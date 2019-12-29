@extends('layouts.master')

@section('title')
    إضافة حكم
@endsection

@section('stylesheets')
    <!-- <link rel="shortcut icon" href="assets/images/favicon.ico" /> -->
    <link rel="stylesheet" href="{{asset('lawSystem/assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('lawSystem/assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('lawSystem/assets/css/main.css')}}"/>
    <link rel="stylesheet" href="{{asset('lawSystem/assets/css/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('lawSystem/assets/css/icons.css')}}"/>
    <link rel="stylesheet" href="{{asset('lawSystem/assets/css/jquery.toast.css')}}"/>

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
                            <li>الأحكام</li>
                            <li>تعديل حكم</li>
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

                        <form action="{{route('updateJudgment',['judgmentID'=>$judgmentID->id])}}" method="POST"
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
                                                @if($judgmentID->judgmentcategory == "دستوري")
                                                selected
                                                @endif
                                                value="دستوري">دستوري
                                            </option>
                                            <option
                                                @if($judgmentID->judgmentcategory == "جنائي")
                                                selected
                                                @endif
                                                value="جنائي">جنائي
                                            </option>
                                            <option
                                                @if($judgmentID->judgmentcategory == "احوال")
                                                selected
                                                @endif
                                                value="احوال">احوال
                                            </option>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>تاريخ الجلسة</label>

                                        <input type="date" class="form-control" name="judgmentDate" id="judgmentDate"
                                               required value="{{$judgmentID->judgmentDate}}"
                                            {{old('judgmentDate')}}>

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>السنة</label>
                                        <input type="text" class="form-control" id="year" name="year" required
                                               value="{{$judgmentID->year}}"
                                            {{old('year')}}
                                        >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>رقم الطعن</label>
                                        <input type="text" class="form-control" id="objectionNo" name="objectionNo"
                                               value="{{$judgmentID->objectionNo}}"
                                            {{old('objectionNo')}}
                                        >
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label> عدد المبادئ <span class="redstar"></span></label>
                                        <input type="text" class="form-control" id="notes" name="notes"
                                               required value="{{$judgmentID->notes}}"
                                            {{old('notes')}}
                                        >
                                    </div>
                                </div>

                                <button type="submit" data-dismiss="modal" class="btn general_btn btn_1">حفظ
                                </button>

                                <a href="{{route('getJudgments')}}" data-dismiss="modal"
                                   class="btn general_btn btn_1">العودة</a>


                            </div>

                            <div class="col-md-6 float-right">

                                <iframe id="myFrame" style="display:none" width="100%" height="400"></iframe>
                                <div class="radio">

                                    <label>
                                        <input type="radio"
                                               onclick="openPdf({{json_encode($judgmentID->judgmentFile)}})"
                                               name="judgmentfile"
                                               id="judgmentfile" value="{{$judgmentID->judgmentFile}}">
                                        {{$judgmentID->judgmentFile}}
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
    <script src="{{asset('lawSystem/assets/js/jquery.js')}}"></script>
    <script>
        $(function () {
            $("#header").load("header.html");
            $("#footer").load("footer.html");

        });
    </script>
    <script src="{{asset('lawSystem/assets/js/popper.js')}}"></script>
    <script src="{{asset('lawSystem/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('lawSystem/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('lawSystem/assets/js/full_numbers_no_ellipses.js')}}"></script>
    <script src="{{asset('lawSystem/assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('lawSystem/assets/js/function.js')}}"></script>
    <script src="{{asset('lawSystem/assets/js/select2.min.js')}}"></script>
    <script src="{{asset('lawSystem/assets/js/jquery.toast.js')}}"></script>
    <script src="{{asset('lawSystem/assets/js/users.js')}}"></script>
    <script src="{{asset('lawSystem/assets/js/alertfunction.js')}}"></script>

@endsection


