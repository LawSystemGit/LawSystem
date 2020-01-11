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
                        <div class="btn-group">
                            <button type="button" class="btn general_btn btn_1 dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"
                                    style="    width: 153px;height: 38px;">
                                أضف إلى العدد
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"
                                   href="{{route('add_Announcement',['versionID'=>$version->id])}}"
                                   title="أضف إعلان">
                                    أضف إعلان
                                </a>
                                <a class="dropdown-item" href="{{route('add_Provision',['versionID'=>$version->id])}}"
                                   title=" أضف حكم جزائي">
                                    أضف حكم جزائي
                                </a>
                                <a class="dropdown-item" href="{{route('add_Decree',['versionID'=>$version->id])}}"
                                   title=" أضف مرسوم">
                                    أضف مرسوم
                                </a>
                                <a class="dropdown-item" href="{{route('add_Directive',['versionID'=>$version->id])}}"
                                   title="  أضف تعليمات">
                                    أضف تعليمات
                                </a>
                                <a class="dropdown-item"
                                   href="{{route('add_Notice',['versionID'=>$version->id])}}"
                                   title="  أضف تنوية">
                                    أضف تنوية
                                </a>
                                <a class="dropdown-item"
                                   href="{{route('add_Decision',['versionID'=>$version->id])}}"
                                   title="  أضف قرار">
                                    أضف قرار
                                </a>
                                <a class="dropdown-item"
                                   href="{{route('add_meetingRecord',['versionID'=>$version->id])}}"
                                   title="محضر إجتماع">
                                    أضف محضر إجتماع
                                </a>
                                <a class="dropdown-item"
                                   href="{{route('add_invitation',['versionID'=>$version->id])}}"
                                   title="أضف دعوه">
                                    أضف دعوه
                                </a>
                            </div>
                        </div>
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
                        <a href="{{route('addVersion')}}">
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

                            <div class="col-md-3 float-right">

                                <div class="user-block">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                        <tr>
                                            <th>
                                                <div class="float-right ml-5"
                                                     style="padding-top: 12px;">
                                                    {{--                                                    <i class="cogs-icon btn-icon-width inline-icon gray-icon"></i>--}}
                                                    {{--                                                    عدد مواد القانون (20)--}}
                                                </div>
                                                <form>
                                                    <div class="input-group search_code">
                                                        {{--                                                        <input type="text" class="form-control"--}}
                                                        {{--                                                               placeholder="رقم المادة">--}}
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
                                                    عدد الإعلانات
                                                    ({{$version-> announcements_count?$version-> announcements_count:0}}
                                                    )
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a class="tab-link" href='#article'
                                                > <span
                                                        class="circle"></span>
                                                    عدد الأحكام الجزائية
                                                    ({{$version-> provisions_count?$version-> provisions_count:0}})
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a class="tab-link" href='#article'
                                                > <span
                                                        class="circle"></span>
                                                    عدد التعليمات
                                                    ({{$version-> directives_count?$version-> directives_count:0}})
                                                </a>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <a class="tab-link" href='#article'
                                                > <span
                                                        class="circle"></span>
                                                    عدد المراسيم
                                                    ({{$version->decrees_count?$version->decrees_count:0}})
                                                </a>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <a class="tab-link" href='#article'
                                                > <span
                                                        class="circle"></span>
                                                    عدد القرارات
                                                    ({{$version->decisions_count?$version->decisions_count:0}}
                                                    )
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a class="tab-link" href='#article'
                                                > <span
                                                        class="circle"></span>
                                                    عدد التنويهات
                                                    ({{$version->notices_count?$version->notices_count:0}})
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a class="tab-link" href='#article'
                                                > <span
                                                        class="circle"></span>
                                                    عدد محاضر الإجتماع
                                                    ({{$version->meeting_records_count?$version->meeting_records_count:0}}
                                                    )
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a class="tab-link" href='#article'
                                                > <span
                                                        class="circle"></span>
                                                    عدد الدعوات
                                                    ({{$version->invitations_count?$version->invitations_count:0}}
                                                    )
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
