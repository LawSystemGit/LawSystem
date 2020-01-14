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
                            <button type="button" class="btn general_btn btn_1 dropdown-toggle"
                                    data-toggle="dropdown"
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
                                <a class="dropdown-item"
                                   href="{{route('add_Provision',['versionID'=>$version->id])}}"
                                   title=" أضف حكم جزائي">
                                    أضف حكم جزائي
                                </a>
                                <a class="dropdown-item"
                                   href="{{route('add_Decree',['versionID'=>$version->id])}}"
                                   title=" أضف مرسوم">
                                    أضف مرسوم
                                </a>
                                <a class="dropdown-item" href="{{route('add_Correction',
                                ['versionID'=>$version->id])}}"
                                   title=" أضف إستدراك">
                                    أضف إستدراك
                                </a>
                                <a class="dropdown-item"
                                   href="{{route('add_Directive',['versionID'=>$version->id])}}"
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
                                   href="{{route('add_Bankruptcy',['versionID'=>$version->id])}}"
                                   title="أضف تفليسة">
                                    أضف تفليسة
                                </a>
                                <a class="dropdown-item"
                                   href="{{route('add_invitation',['versionID'=>$version->id])}}"
                                   title="أضف دعوه">
                                    أضف دعوه
                                </a>
                            </div>
                        </div>
                        <a href="{{route('editVersion',['versionID'=>$version->id])}}">
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
            <div class="row align-items-center min-height-row">
                <div class="col-lg-12">
                    <table class="table table-active ">
                        <tr>
                            <th class="w_80"><b>نوع الإصدار</b></th>
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
                                        <th>
                                            <div class="float-right ml-5"
                                                 style="padding-top: 12px;">

                                            </div>
                                        </th>
                                        </thead>
                                        <tbody>
                                        <div class="nav flex-column nav-pills" id="v-pills-tab"
                                             role="tablist" aria-orientation="vertical">
                                            <a class="nav-link"
                                               disabled role="tab">
                                                محتويات العدد
                                            </a>
                                            <a class="nav-link"
                                               data-toggle="modal"
                                               data-target=".bd-example-modal-lg" role="tab"
                                               aria-selected="true"
                                               onclick="openPdf({{$version->versionno}})">
                                                <span class="circle"></span>
                                                عدد الملحقات (1)
                                            </a>
                                            <a class="nav-link active"
                                               id="v-pills-Announcements-tab"
                                               data-toggle="pill" href="#Announcements" role="tab"
                                               aria-controls="Announcements"
                                               aria-selected="false">
                                                <span class="circle"></span>
                                                عدد الإعلانات
                                                ({{$version-> announcements_count?$version-> announcements_count:0}}
                                                )
                                            </a>
                                            <a class="nav-link" id="v-pills-provisions-tab"
                                               data-toggle="pill" href="#provisions"
                                               role="tab" aria-controls="provisions"
                                               aria-selected="false">
                                                <span class="circle"></span>
                                                عدد الأحكام الجزائية
                                                ({{$version-> provisions_count?$version-> provisions_count:0}}
                                                )
                                            </a>
                                            <a class="nav-link" id="v-pills-corrections-tab"
                                               data-toggle="pill" href="#corrections"
                                               role="tab" aria-controls="corrections"
                                               aria-selected="false">
                                                <span class="circle"></span>
                                                عدد الإستدراكات
                                                ({{$version-> corrections_count?$version->
                                                                                            corrections_count:0}}
                                                )
                                            </a>
                                            <a class="nav-link" id="v-pills-directives-tab"
                                               data-toggle="pill" href="#directives"
                                               role="tab" aria-controls="directives"
                                               aria-selected="false">
                                                <span class="circle"></span>
                                                عدد التعليمات
                                                ({{$version-> directives_count?$version-> directives_count:0}}
                                                )
                                            </a>
                                            <a class="nav-link" id="v-pills-decrees-tab"
                                               data-toggle="pill" href="#decrees"
                                               role="tab" aria-controls="decrees"
                                               aria-selected="false">
                                                <span class="circle"></span>
                                                عدد المراسيم
                                                ({{$version->decrees_count?$version->decrees_count:0}}
                                                )
                                            </a>
                                            <a class="nav-link" id="v-pills-decisions-tab"
                                               data-toggle="pill" href="#decisions"
                                               role="tab" aria-controls="decisions"
                                               aria-selected="false">
                                                <span class="circle"></span>
                                                عدد القرارات
                                                ({{$version->decisions_count?$version->decisions_count:0}}
                                                )
                                            </a>
                                            <a class="nav-link" id="v-pills-notices-tab"
                                               data-toggle="pill" href="#notices"
                                               role="tab" aria-controls="notices"
                                               aria-selected="false">
                                                <span class="circle"></span>
                                                عدد التنويهات
                                                ({{$version->notices_count?$version->notices_count:0}}
                                                )
                                            </a>
                                            <a class="nav-link" id="v-pills-meeting_records-tab"
                                               data-toggle="pill" href="#meeting_records"
                                               role="tab" aria-controls="meeting_records"
                                               aria-selected="false">
                                                <span class="circle"></span>
                                                عدد محاضر الإجتماع
                                                ({{$version->meeting_records_count?$version->meeting_records_count:0}}
                                                )
                                            </a>
                                            <a class="nav-link" id="v-pills-invitations-tab"
                                               data-toggle="pill" href="#invitations"
                                               role="tab" aria-controls="invitations"
                                               aria-selected="false">
                                                <span class="circle"></span>
                                                عدد الدعوات
                                                ({{$version->invitations_count?$version->invitations_count:0}}
                                                )
                                            </a>
                                            <a class="nav-link" id="v-pills-bankruptcies-tab"
                                               data-toggle="pill" href="#bankruptcies"
                                               role="tab" aria-controls="bankruptcies"
                                               aria-selected="false">
                                                <span class="circle"></span>
                                                عدد التفليسات
                                                ({{$version->bankruptcies_count?$version->bankruptcies_count:0}}
                                                )
                                            </a>
                                        </div>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-9 float-right">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="Announcements"
                                         role="tabpanel" aria-labelledby="Announcements">
                                        @foreach($version-> Announcements as $announce)
                                            <div class="article">
                                                <h4 style="border-bottom: 1px solid #eee;">الجهه :
                                                    {{$announce->announcource}}
                                                </h4>
                                                <p>رقم الإعلان : {{$announce->announno}}</p>
                                                <p>العنوان : {{$announce->announctitle}}</p>
                                                <p>{{$announce->announcbody}}</p>
                                            </div>
                                            <br>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="provisions" role="tabpanel"
                                         aria-labelledby="provisions">
                                        @foreach($version-> Provisions as $pro)
                                            <div class="article">
                                                <h4 style="border-bottom: 1px solid #eee;">رقم
                                                    القضية : {{$pro->caseno}}</h4>
                                                <p>رقم المخفر : {{$pro->policestation}}</p>
                                                <p>تاريخ الجلسة : {{$pro->provisiondate}}</p>
                                                <p>{{$pro->provisionbody}}</p>
                                            </div>
                                            <br>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="corrections" role="tabpanel"
                                         aria-labelledby="corrections">
                                        @foreach($version-> Corrections as $correction)
                                            <div class="article">
                                                <h4 style="border-bottom: 1px solid #eee;">الجهه
                                                    : {{$correction->correctionsource}}</h4>
                                                <p>تاريخ الجلسة
                                                    : {{$correction->correctiondate}}</p>
                                                <p>{{$correction->correctionbody}}</p>
                                            </div>
                                            <br>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="directives" role="tabpanel"
                                         aria-labelledby="directives">
                                        @foreach($version-> Directives as $directive)
                                            <div class="article">
                                                <h4 style="border-bottom: 1px solid #eee;">الجهه
                                                    : {{$directive->directivesource}}</h4>
                                                <p> العنوان : {{$directive->directivetitle}}</p>
                                                <p>تعليمات رقم : {{$directive->directiveno}}</p>
                                                <p> لسنة : {{$directive->directiveyear}}</p>
                                                <p>{{$directive->directivebody}}</p>
                                            </div>
                                            <br>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="decrees" role="tabpanel"
                                         aria-labelledby="decrees">
                                        @foreach($version-> Decrees as $decree)
                                            <div class="article">
                                                <h4 style="border-bottom: 1px solid #eee;">الجهه
                                                    : {{$decree->decreesource}}</h4>
                                                <h4 style="border-bottom: 1px solid #eee;">رقم
                                                    المرسوم
                                                    : {{$decree->decreeno}}</h4>
                                                <p> العنوان : {{$decree->decreetitle}}</p>
                                                <p> لسنة : {{$decree->decreeyear}}</p>
                                                <p>{{$decree->decreebody}}</p>
                                            </div>
                                            <br>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="decisions" role="tabpanel"
                                         aria-labelledby="decisions">
                                        @foreach($version-> Decisions as $decision)
                                            <div class="article">
                                                <h4 style="border-bottom: 1px solid #eee;">الجهه
                                                    : {{$decision->decisionsource}}</h4>
                                                <h4 style="border-bottom: 1px solid #eee;">رقم
                                                    القرار
                                                    : {{$decision->decisionno}}</h4>
                                                <p> العنوان : {{$decision->decisiontitle}}</p>
                                                <p>{{$decision->decisionbody}}</p>
                                            </div>
                                            <br>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="notices" role="tabpanel"
                                         aria-labelledby="notices">
                                        @foreach($version-> Notices as $notice)
                                            <div class="article">
                                                <h4 style="border-bottom: 1px solid #eee;">الجهه
                                                    : {{$notice->noticesource}}</h4>
                                                <p> تاريخ الإصدار : {{$notice->noticedate}}</p>
                                                <p>{{$notice->noticebody}}</p>
                                            </div>
                                            <br>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="meeting_records" role="tabpanel"
                                         aria-labelledby="meeting_records">
                                        @foreach($version->MeetingRecords as $record)
                                            <div class="article">
                                                <h4 style="border-bottom: 1px solid #eee;">الجهه
                                                    : {{$record->meetingsource}}</h4>
                                                <p> تاريخ الإصدار : {{$record->meetingdate}}</p>
                                                <p>{{$record->meetingrecord}}</p>
                                            </div>
                                            <br>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="invitations" role="tabpanel"
                                         aria-labelledby="invitations">
                                        @foreach($version->Invitations as $invitation)
                                            <div class="article">
                                                <h4 style="border-bottom: 1px solid #eee;">الجهه
                                                    : {{$invitation->invitationsource}}</h4>
                                                <p>{{$invitation->invitationbody}}</p>
                                            </div>
                                            <br>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="bankruptcies" role="tabpanel"
                                         aria-labelledby="bankruptcies">
                                        @foreach($version->Bankruptcies as $bankruptcy)
                                            <div class="article">
                                                <h4 style="border-bottom: 1px solid #eee;">الجهه
                                                    : {{$bankruptcy->bankruptcysource}}</h4>
                                                <p> ضد / الخصم
                                                    : {{$bankruptcy->bankruptcyagainst}}</p>
                                                <p> رقم القضية : {{$bankruptcy->bankruptcyjudg}}</p>
                                                <p> تاريخ الجلسة
                                                    : {{$bankruptcy->bankruptcydate}}</p>
                                                <p>{{$bankruptcy->bankruptcybody}}</p>
                                            </div>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--            ---end of content------}}
    </div>
    </div>
@endsection

@section('secripts')
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel"
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
    <script>
        function deleteArticle(id) {
            let confirmation = confirm('هل أنت متأكم من حذف هذه المادة ؟');
            if (confirmation) {
                axios.delete("/laws/" + id + "/deleteArticle")
                    .then(function (response) {
                        if (response.data.status == 200) {
                            $('#link' + id).remove();
                            $('#article' + id).remove();
                            toast(" تم ", response.data.message, 'info');
                        } else if (response.data.status == 422) {
                            toast(" خطأ ", response.data.message, 'error');
                        }
                    });
            }
        }
    </script>
@endsection
