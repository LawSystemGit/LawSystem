@extends('layouts.master')

@section('title')
    العدد رقم ({{$version->versionno}})
@endsection

@section('stylesheets')

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
                            <li>الأعداد</li>
                            <li> العدد رقم ({{$version->versionno}})</li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div
                        class="navbar d-flex flex-wrap align-items-center justify-content-start justify-content-lg-end rec-counts">
                        <select class="SelectRemovedSearch w_200_px  btn_1">
                            <option><a href="#">
                                    <span class="edit-icon btn-icon-width inline-icon green-icon">إضافة إعلان</span>
                                </a></option>
                            <option><a href="#">
                                    <span>إضافة قرار</span>
                                </a></option>
                            <option><a href="#">
                                    <span>إضافة حكم</span>
                                </a></option>
                            <option><a href="#">
                                    <span>إضافة مرسوم</span>
                                </a></option>
                            <option><a href="#">
                                    <span>إضافة مقترح</span>
                                </a></option>
                            <option><a href="#">
                                    <span>إضافة قانون</span>
                                </a></option>
                            <option><a href="#">
                                    <span>إضافة تعليمات</span>
                                </a></option>
                            <option><a href="#">
                                    <span>إضافة تنوية</span>
                                </a></option>
                            <option><a href="#">
                                    <span>إضافة محضر إجتماع</span>
                                </a></option>
                            <option><a href="#">
                                    <span>إضافة دعوة</span>
                                </a></option>
                            <option><a href="#">
                                    <span>إضافة إستدراك</span>
                                </a></option>
                            <option><a href="#">
                                    <span>إضافة تفليسة</span>
                                </a></option>
                            <option><a href="#">
                                    <span>إضافة براءة إختراع</span>
                                </a></option>
                        </select>

                        <a href="#">
                            <button class="general_btn btn_1 ml-2" style="height: 38px;">
                                <i class="edit-icon btn-icon-width inline-icon green-icon"></i><span>تعديل العدد</span>
                            </button>
                        </a>
                        <a href="#">
                            <button class="general_btn btn_1 ml-2" style="height: 38px;">
                                <i class="plus-icon btn-icon-width inline-icon green-icon"></i><span>إضافة ملحق</span>
                            </button>
                        </a>
                        <a href="#">
                            <button class="general_btn btn_1 ml-2" style="height: 38px;">
                                <i class="plus-icon btn-icon-width inline-icon green-icon"></i><span>إضافة عدد</span>
                            </button>
                        </a>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-7 ">
                    <table class="table table-active ">
                        <tr>
                            <th class="w_70"><b>نوع الإصدار</b></th>
                            <th class="w_70 "><b>رقم العدد</b></th>
                            <th class="w_200 "><b>تاريخ النشر بالجريدة الرسمية</b></th>
                            <th class="w_80 "><b>مستند العدد</b></th>
                            <th class="w_150 "><b>الملحقات</b></th>

                        </tr>
                        <tbody>
                        <tr>
                            <td><b>{{$version->versiontype}}</b></td>
                            <td><b>{{$version->versionno}}</b></td>
                            <td><b>{{$version->versiondate}}</b></td>
                            <td><a type="button" class="general_btn btn_1 ml-2" data-toggle="modal"
                                   data-target=".bd-example-modal-lg"
                                   onclick="openPdf({{$version->versionno}})">مستند العدد</a></td>
                            <td><a type="button" class="general_btn btn_1 ml-2" data-toggle="modal"
                                   data-target=".bd-example-modal-lg"
                                   onclick="openPdf({{$version->versionno}})">ملحق خاص بالعدد
                                    رقم {{$version->versionno}}</a></td>

                        </tr>
                        </tbody>
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
                                                    <i class="cogs-icon btn-icon-width inline-icon gray-icon"></i>
                                                    عدد مواد القانون (20)
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

                                        <tr id="link">
                                            <td>
                                                <a class="tab-link" href='#article'
                                                > <span
                                                        class="circle"></span>
                                                    عدد الملحقات (1)
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a class="tab-link" href='#article'
                                                > <span
                                                        class="circle"></span>
                                                    عدد الإعلانات (20)
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a class="tab-link" href='#article'
                                                > <span
                                                        class="circle"></span>
                                                    عدد القرارات 51)
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a class="tab-link" href='#article'
                                                > <span
                                                        class="circle"></span>
                                                    عدد الأحكام (01)
                                                </a>
                                            </td>

                                        </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{--                            <div class="col-md-9 float-right">--}}
                            {{--                                @foreach($law->lawArticles as $article)--}}
                            {{--                                    <div class="article " id="article{{$article->id}}">--}}
                            {{--                                        <h1 style="border-bottom: 1px solid #eee;">مادة {{$article->articleno}} </h1>--}}
                            {{--                                        <br/>--}}
                            {{--                                        <div class="float-right"><b>&nbsp;&nbsp; رقم الكتاب : {{$article->subjectid}}--}}
                            {{--                                                &nbsp;&nbsp;</b></div>--}}
                            {{--                                        <div class="float-right"><b>&nbsp;&nbsp; عنوان الكتاب--}}
                            {{--                                                : {{$article->subjectitle}} &nbsp;&nbsp;</b></div>--}}
                            {{--                                        <div class="float-right"><b>&nbsp;&nbsp; رقم الباب : {{$article->chapterid}}--}}
                            {{--                                                &nbsp;&nbsp;</b></div>--}}
                            {{--                                        <div class="float-right"><b>&nbsp;&nbsp;عنوان الباب : {{$article->chaptertitle}}--}}
                            {{--                                                &nbsp;&nbsp;</b></div>--}}
                            {{--                                        <div class="float-right"><b>&nbsp;&nbsp;رقم الفصل : {{$article->sectionid}}--}}
                            {{--                                                &nbsp;&nbsp;</b></div>--}}
                            {{--                                        <div class="float-right"><b>&nbsp;&nbsp;عنوان الفصل : {{$article->sectiontitle}}--}}
                            {{--                                                &nbsp;&nbsp;</b></div>--}}
                            {{--                                        <br>--}}
                            {{--                                        <div><b>&nbsp;&nbsp;عنوان المادة : {{$article->articletitle}} &nbsp;&nbsp;</b>--}}
                            {{--                                        </div>--}}
                            {{--                                        <br/>--}}
                            {{--                                        <p style="font-size: 21px;text-justify: inter-word;text-align: justify;">--}}
                            {{--                                            {{$article->articlebody}}--}}
                            {{--                                        </p>--}}
                            {{--                                        <a href="{{route('editArticle',['articleID'=>$article])}}">--}}
                            {{--                                            <button class="general_btn btn_1 ml-2">--}}
                            {{--                                                <i class="edit-icon btn-icon-width inline-icon green-icon"></i><span>تعديل</span>--}}
                            {{--                                            </button>--}}
                            {{--                                        </a>--}}
                            {{--                                        --}}{{--                                        <a href="{{route('deleteArticle',['articleID'=>$article])}}">--}}
                            {{--                                        <button class="general_btn btn_1 ml-2"--}}
                            {{--                                                onclick="deleteArticle({{$article->id}})"--}}
                            {{--                                        >--}}
                            {{--                                            <i class="times-icon btn-icon-width inline-icon green-icon"></i><span>حذف</span>--}}
                            {{--                                        </button>--}}
                            {{--                                        --}}{{--                                        </a>--}}
                            {{--                                        <br/><br/>--}}
                            {{--                                    </div>--}}
                            {{--                                @endforeach--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                            {{--                    </div>--}}
                            {{--                </div>--}}
                            {{--            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('secripts')
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <iframe id="myFrame" style="display:none" width="100%" height="500"></iframe>

                <button type="button" class="general_btn btn_1 ml-2"
                        data-dismiss="modal" style="margin: 6px 50px; height: 28px;width: 65px;">
                    <b>
                        إغلاق
                    </b>
                </button>

            </div>
        </div>
    </div>
@endsection
