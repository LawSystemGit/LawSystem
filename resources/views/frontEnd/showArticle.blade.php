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
                            <li><a href="{{route('getLaws')}}">القوانين</a></li>
                            <li> قانون رقم {{$articleID->law->lawno}} لسنة
                                {{$articleID->law->lawyear}}
                                بشأن {{$articleID->law->lawrelation}}
                            </li>
                        </ol>
                    </div>
                </div>

            </div>
            <div class="row mt-0">
                <div class="col-lg-12 tbl-new-brdr">
                    <div class="panel panel-default no-brdr">

                        <div class="col-md-3 float-right">

                            <div class="user-block">
                                <table class="table table-striped mb-0">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div class="float-right ml-5"
                                                 style="padding-top: 12px;">
                                                <i class="edit-icon btn-icon-width inline-icon gray-icon"></i>
                                                المواد <a href="viewall.html">(عرض الكل)</a>
                                            </div>
                                            <form>
                                                <div class="input-group search_code">
                                                    <input type="text" class="form-control"
                                                           placeholder="رقم المادة">
                                                </div>
                                            </form>

                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <a class="tab-link" href='#article1'> <span
                                                    class="circle"></span>
                                                مادة 1
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="tab-link" href='#article2'>
                                                <span class="circle"></span>
                                                مادة 2
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="tab-link" href='#article3'>

                                                <span class="circle"></span>
                                                مادة 3
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-9 float-right">
                            <div id="article1" class="article active-article">
                                <h1 style="border-bottom: 1px solid #eee;
">مادة {{$articleID->articleno}} </h1>
                                <br/>
                                <p style="font-size: 21px;text-justify: inter-word;text-align: justify;">
                                    {{$articleID->articlebody}}
                                </p>
                                <br/>
                                <a href="{{route('relatedJudgments',['articleID'=>$articleID])}}">
                                    <button
                                        class="btn
                                general_btn btn_4 p-3"><i
                                            class="gavel-icon btn-icon-width inline-icon white-icon pl-4"></i><span>  احكام متعلقة  </span>
                                    </button>
                                </a>
                                <br/><br/>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
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

