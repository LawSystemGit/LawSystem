@extends('layouts.master')

@section('title')
    إصدارات الكويت اليوم
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
                            <li>إصدارات الكويت اليوم</li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div
                        class="navbar d-flex flex-wrap align-items-center justify-content-start justify-content-lg-end rec-counts">
                        <a href="{{route('addVersion')}}">
                            <button class="general_btn btn_1 ml-2">
                                <i class="plus-icon btn-icon-width inline-icon green-icon"></i><span>اضافة جديد</span>
                            </button>
                        </a>
                    </div>

                </div>
            </div>
            <!-- end row -->
            <!-- start row -->
            <div class="row mt-0">
                <div class="col-lg-12 tbl-new-brdr">
                    <div class="panel panel-default no-brdr">
                        <div class="table-responsive">
                            <table id="versionsTable"
                                   class="table table-striped mb-0 table-right CustomTable datatable">
                                <thead>
                                <tr>
                                    <th class="w_10 pr-2">م</th>
                                    <th class="w_100 text-center">نوع العدد</th>
                                    <th class="w_100 text-center">رقم العدد</th>
                                    <th class="w_100 text-center">تاريخ الإصدار بالجريدة الرسمية</th>
                                    <th class="w_100 text-center">مستند العدد</th>
                                    <th class="w_100 text-center">إستعراض العدد</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th><input id="Name" class="form-control" type="text" placeholder="نوع العدد"/></th>
                                    <th><input id="Name" class="form-control" type="text" placeholder="رقم العدد"/></th>
                                    <th><input id="Name2" class="form-control" type="text"
                                               placeholder="تاريخ الإصدار بالجريدة الرسمية"/>
                                    </th>
                                    <th><input id="Name2" class="form-control" disabled placeholder="مستند العدد"/>
                                    </th>
                                    <th><input id="Name2" class="form-control" disabled placeholder="إستعراض العدد"/>
                                    </th>
                                </tr>
                                </tfoot>
                                <tbody>

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

@endsection

@section('secripts')
    <script>
        $.fn.DataTable.ext.pager.numbers_length = 3;
        var table = $('#versionsTable').DataTable({
            paging: true,
            destroy: true,
            columnDefs: [
                {
                    "targets": [0],
                    "orderable": false,
                }
            ],
            order: [[2, 'asc']],
            orderCellsTop: true,
            "lengthMenu": [[10, 50, 100, -1], [10, 50, 100, "الكل"]],
            'pagingType': 'full_numbers_no_ellipses',
            sDom: 'lrt<"row"<"col-sm-12 col-md-7"i><"col-sm-12 col-md-5"p>>',
            "bLengthChange": false,
            "language": {
                "emptyTable": "لا يوجد بيانات",
                "infoEmpty": "عرض 0 الي 0 من 0 قانون",
                "info": "عرض _START_ الى _END_ من _TOTAL_ قانون",
                "lengthMenu": "اظهر _MENU_ ملف",
                "infoFiltered": "(من اصل _MAX_ ملف)",
                "zeroRecords": "لا يوجد نتائج للبحث",
                "paginate": {
                    "previous": "<",
                    "next": ">",
                    "last": ">>",
                    "first": "<<"
                }
            },
            ajax: "{{ url('KuwaitAlyoum-list') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'versiontype', name: 'versiontype'},
                {data: 'versionno', name: 'versionno'},
                {data: 'versiondate', name: 'versiondate'},
                {
                    data: 'versionno', name: 'versionno', "render": function (data) {
                        data = '<a type="button" class="general_btn btn_1 ml-2" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="openFile(' + data + ')" >' + "مستند العدد " + '</a>';
                        return data;
                    }
                },
                {
                    data: 'id', name: 'showlaw', "render": function (data) {
                        data = '<a class="general_btn btn_1 ml-2" href="/KuwaitAlyoum/' + data + '/show">' + "إستعراض العدد" + '</a>';
                        return data;
                    }
                },
            ]
        });
        table.columns().every(function (index) {
            $('.CustomTable tfoot tr:eq(0) th:eq(' + index + ') input[type="text"],.CustomTable tfoot tr:eq(0) th:eq(' + index + ') select').on('change', function () {
                table.column($(this).parent().index() + ':visible')
                    .search(this.value)
                    .draw();
            });
        });
        table.on('order.dt search.dt', function () {
            table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
        $(window).on('load', function () {
            PageNumberInput();
        })
        $('.CustomTable').on('draw.dt', function () {
            PageNumberInput();
        });
        function PageNumberInput() {
            $(`<li><input type='number' min='1' id='goPage' onchange="Jumpto(this)" class='paginate_input go-to-page' placeholder='ادخل رقم'></li>`).insertBefore(".next");
        }
        function Jumpto(e) {
            table = $('.CustomTable').DataTable();
            var ss = e.value - 1;
            table.page(ss).draw(false);
        }
        function chabgepgln(pgln) {
            var value = pgln.value;
            var table = $('.CustomTable').DataTable();
            table.page.len(value).draw();
        }
    </script>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <iframe id="myFrame" style="display:none" width="100%" height="500"></iframe>

                <button type="button" class="general_btn btn_1 ml-2 btn-icon-width inline-icon green-icon"
                        data-dismiss="modal" style="margin: 6px 50px; height: 28px;width: 65px;">
                    <b>
                        إغلاق
                    </b>
                </button>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        function openFile(file) {
            var omyFrame = document.getElementById("myFrame");
            omyFrame.style.display = "block";
            let filename = "/storage/KuwaitAlyoum_finished/" + file + '.pdf';
            omyFrame.src = filename;
        }
    </script>
@endsection
