@extends('layouts.master')

@section('title')
    قوانين
@endsection

@section('stylesheets')

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
                            <li><a href="{{route('getJudgments')}}"> نوع الحكم
                                    {{$judgmentID->judgmentcategory}}</a></li>
                            <li><a href="#">مواد القانون</a></li>
                        </ol>
                    </div>
                </div>

            </div>
            <!-- end row -->
            <!-- start row -->
            <div class="row mt-0">
                <div class="col-lg-12 tbl-new-brdr">
                    <div class="panel panel-default no-brdr">
                        <div class="table-responsive">
                            <table id="usersTable"
                                   class="table table-striped mb-0 table-right CustomTable datatable">
                                <thead>
                                <tr>
                                    <th class="w_100 pr-2">م</th>
                                    <th class="w_70 text-center">المبدأ</th>
                                    <th class="w_70 text-center">الموجز</th>
                                    <th class="w_170 text-center">المواد المرتبطة</th>
                                </tr>
                                </thead>
                                <tfoot>
                                </tfoot>
                                <tbody>
                                @if (count($judgmentID->judgmentnotes))
                                    @foreach ($judgmentID->judgmentnotes as $note)
                                        <tr>
                                            <td>{{$note->id}}</td>
                                            <td>{{$note->judgrule}}</td>
                                            <td>{{$note->judgshort}} </td>
                                            <td>
                                                @foreach($judgmentID->Articls as $art)
                                                    <a class="btn  general_btn btn_1"
                                                       href="{{route('showArticle',
                                                         ['articleID'=>$art->id])
                                                         }}">{{$art->articleno}}</a>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach

                                @else
                                    <h3>لا يوجد مبادئ</h3>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end content-wrapper -->
    in
@endsection

@section('secripts')

    <script src="{{asset('lawSystem/assets/js/jquery.js')}}"></script>

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

