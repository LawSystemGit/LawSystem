@extends('layouts.master')

@section('title')
    القانون رقم ({{$law->lawno}})
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('lawSystem/assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('lawSystem/assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('lawSystem/assets/css/main.css')}}"/>
    <link rel="stylesheet" href="{{asset('lawSystem/assets/css/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('lawSystem/assets/css/icons.css')}}"/>
    <link rel="stylesheet" href="{{asset('lawSystem/assets/css/jquery.toast.css')}}"/>
@endsection

@section('content')

    <!-- start content-wrapper -->
    <div class="content-wrapper" id="to">
        <div class="main_content">
            <!-- start row -->
            <div class="row align-items-center min-height-row">
                <div class="col-lg-6">
                    <div class="d-flex align-items-center flex-wrap">
                        <ol class="breadcrumb">
                            <li><a href="#">الرئيسية</a></li>
                            <li> القانون رقم ({{$law->lawno}})</li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div
                        class="navbar d-flex flex-wrap align-items-center justify-content-start justify-content-lg-end rec-counts">
                        <a href="{{route('addArticle',['lawID'=>$law])}}">
                            <button class="general_btn btn_1 ml-2">
                                <i class="plus-icon btn-icon-width inline-icon green-icon"></i><span>إضافة مادة</span>
                            </button>
                        </a>
                        <a href="{{route('addNewLaw')}}">
                            <button class="general_btn btn_1 ml-2">
                                <i class="gavel-icon btn-icon-width inline-icon green-icon"></i><span>عرض المواد</span>
                            </button>
                        </a>
                        <a href="{{route('editLaw',['lawID'=>$law])}}">
                            <button class="general_btn btn_1 ml-2">
                                <i class="edit-icon btn-icon-width inline-icon green-icon"></i><span>تعديل القانون</span>
                            </button>
                        </a>
                        <a href="{{route('addNewLaw')}}">
                            <button class="general_btn btn_1 ml-2">
                                <i class="plus-icon btn-icon-width inline-icon green-icon"></i><span>إضافة جديد</span>
                            </button>
                        </a>

                    </div>

                </div>
            </div>
            <div class="row align-items-center">
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
                                                    مواد القانون
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
                                        @foreach($law->lawArticles as $article)
                                            <tr>
                                                <td>
                                                    <a class="tab-link" href='#article{{$article->id}}'> <span
                                                            class="circle"></span>
                                                        مادة رقم ({{$article->articleno}})
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-8 float-right">
                                @foreach($law->lawArticles as $article)
                                    <div class="article " id="article{{$article->id}}">
                                        <h1 style="border-bottom: 1px solid #eee;">مادة {{$article->articleno}} </h1>
                                        <br/>
                                        <p style="font-size: 21px;text-justify: inter-word;text-align: justify;">
                                            {{$article->articlebody}}
                                        </p>
                                        <a href="{{route('addNewLaw')}}">
                                            <button class="general_btn btn_1 ml-2">
                                                <i class="edit-icon btn-icon-width inline-icon green-icon"></i><span>تعديل</span>
                                            </button>
                                        </a>
                                        <a href="{{route('addNewLaw')}}">
                                            <button class="general_btn btn_1 ml-2">
                                                <i class="times-icon btn-icon-width inline-icon green-icon"></i><span>حذف</span>
                                            </button>
                                        </a>
                                        <br/><br/>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#top">top</a>
        </div>
    </div>
@endsection

@section('secripts')

    <script src="{{asset('lawSystem/assets/js/jquery.js')}}"></script>
    <script src="{{asset('lawSystem/assets/js/popper.js')}}"></script>
    <script src="{{asset('lawSystem/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('lawSystem/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('lawSystem/assets/js/full_numbers_no_ellipses.js')}}"></script>
    <script src="{{asset('lawSystem/assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('lawSystem/assets/js/function.js')}}"></script>
    <script src="{{asset('lawSystem/assets/js/select2.min.js')}}"></script>
    <script src="{{asset('lawSystem/assets/js/jquery.toast.js')}}"></script>
    <script src="{{asset('lawSystem/assets/js/alertfunction.js')}}"></script>

@endsection
