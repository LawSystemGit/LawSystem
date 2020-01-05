@extends('layouts.master')

@section('title')
    قوانين
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

@endsection

