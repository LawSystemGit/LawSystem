@extends('layouts.master')

@section('title')
    عرض الحكم لجلسة {{$judgment->judgmentDate}}
@endsection

@section('stylesheets')

@endsection

@section('content')

    <!-- start content-wrapper -->
    <div class="content-wrapper" id="top">
        <div class="main_content">
            <!-- start row -->
            <div class="row align-items-center min-height-row">
                <div class="col-lg-6">
                    <div class="d-flex align-items-center flex-wrap">
                        <ol class="breadcrumb">
                            <li><a href="#">الرئيسية</a></li>
                            <li>نوع الحكم {{$judgment->judgmentcategory}}</li>
                            <li> لجلسة {{$judgment->judgmentDate}}</li>

                        </ol>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div
                        class="navbar d-flex flex-wrap align-items-center justify-content-start justify-content-lg-end rec-counts">
                        <a href="{{route('addNote',['judgmentID'=>$judgment])}}">
                            <button class="general_btn btn_1 ml-2">
                                <i class="plus-icon btn-icon-width inline-icon green-icon"></i><span>إضافة مبادئ</span>
                            </button>
                        </a>
                        <a href="{{route('editJudgment',['judgmentID'=>$judgment])}}">
                            <button class="general_btn btn_1 ml-2">
                                <i class="edit-icon btn-icon-width inline-icon green-icon"></i><span>تعديل الحكم</span>
                            </button>
                        </a>
                        <a href="{{route('addJudgments')}}">
                            <button class="general_btn btn_1 ml-2">
                                <i class="plus-icon btn-icon-width inline-icon green-icon"></i><span>إضافة جديد</span>
                            </button>
                        </a>

                    </div>

                </div>
            </div>
            <div class="row align-items-center min-height-row">
                <div class="col-lg-12">
                    <table class="table table-active align-content-center">
                        <tr>
                            <th class="w_70 "><b>التصنيف</b></th>
                            <th class="w_70 "><b>تاريخ الجلسة</b></th>
                            <th class="w_70 "><b>سنة الإصدار</b></th>
                            <th class="w_100 "><b>رقم الطعن</b></th>
                            <th class="w_80 "><b>عدد المبادى </b></th>
                            <th class="w_250 "><b>الحالة</b></th>
                        </tr>
                        <tbody>
                        <tr>
                            <td><b>{{$judgment->judgmentcategory}}</b></td>
                            <td><b>{{$judgment->judgmentDate}}</b></td>
                            <td><b>{{$judgment->year}}</b></td>
                            <td><b>{{$judgment->objectionNo}}</b></td>
                            <td><b>{{$judgment->notes}}</b></td>
                            <td><b>@if(!$judgment->incompletednotes)
                                        مكتمل
                                    @else
                                        غير مكتمل متبقى {{($judgment->incompletednotes)}}
                                    @endif
                                </b></td>

                        </tr>
                        </tbody>
                    </table>
                    <table class="table table-info align-content-lg-center" style="margin: 0px auto;">
                        <tr>
                            <h4>المواد المرتبطة</h4>
                        </tr>
                        <tr>
                            <div class="row col-lg-12">
                                <div class="align-items-center min-height-row">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        @foreach($judgment->Articls as $article)
                                            <li class="nav-item">
                                                <a class="nav-link " id="tab{{$article->articleno}}" data-toggle="tab"
                                                   href="#article-tab{{$article->articleno}}" role="tab"
                                                   aria-controls="article{{$article->articleno}}"
                                                >مادة {{$article->articleno}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        @foreach($judgment->Articls as $article)
                                            <div class="tab-pane fade show " id="article-tab{{$article->articleno}}"
                                                 role="tabpanel"
                                                 aria-labelledby="tab{{$article->articleno}}">
                                                مادة رقم {{$article->articleno}}
                                                من القانون {{$article->law->lawcategory}}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="row mt-0">
                    <div class="col-lg-12 tbl-new-brdr">
                        <div class="panel panel-default no-brdr">

                            <div class="col-md-2 float-right">

                                <div class="user-block">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th>
                                                <div class="float-right ml-5"
                                                     style="padding-top: 12px;">
                                                    <i class="edit-icon btn-icon-width inline-icon gray-icon"></i>
                                                    عدد المبادئ ({{$judgment->judgmentnotes_count}})

                                                </div>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($judgment->judgmentnotes as $note)
                                            <tr id="link{{$note->id}}">
                                                <td>
                                                    <a class="tab-link" href='#note{{$note->id}}'
                                                    > <span
                                                            class="circle"></span>
                                                        مبدأ رقم ({{$note->id}})
                                                    </a>
                                                </td>

                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-9 float-right">
                                @foreach($judgment->judgmentnotes as $note)
                                    <div class="article " id="note{{$note->id}}">
                                        <h4 style="border-bottom: 1px solid #eee;">المبدأ</h4>
                                        <p style="font-size: 21px;text-justify: inter-word;text-align: justify;">
                                            {{$note->judgrule}}
                                        </p>
                                        <h4 style="border-bottom: 1px solid #eee;">الموجز</h4>
                                        <p style="font-size: 21px;text-justify: inter-word;text-align: justify;">
                                            {{$note->judgshort}}
                                        </p>
                                        <br>
                                        <button class="general_btn btn_1 ml-2"
                                                onclick="deleteNote({{json_encode($note->id)}})"
                                        >
                                            <i class="times-icon btn-icon-width inline-icon green-icon"></i><span>حذف</span>
                                        </button>
                                    </div>
                                    <br><br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(count($judgment->judgmentnotes))
                <a href="#top" class="general_btn btn_1">العودة للإعلى</a>
            @endif
        </div>
    </div>
@endsection

@section('secripts')
    <script>
        function deleteNote(id) {

            let confirmation = confirm('هل أنت متأكم من حذف هذا المبدأ ؟');
            if (confirmation) {
                axios.defaults.headers.common['X-CSRF-TOKEN']
                    = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                axios.delete("/judgments/" + id + "/deleteNote")
                    .then(function (response) {
                        if (response.data.status == 200) {
                            $('#link' + id).remove();
                            $('#note' + id).remove();
                            toast(" تم ", response.data.message, 'info');
                        } else if (response.data.status == 422) {
                            toast(" خطأ ", response.data.message, 'error');
                        }
                    });
            }
        }
    </script>
@endsection

