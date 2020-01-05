@extends('layouts.master')

@section('title')
    إضافة المبدأ والموجز
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
                            <li>الاحكام</li>
                            <li>اضافة مبدأ والموجز</li>
                            {{--                            <li > <p class="alert alert-info">هذا الحكم مكتمل</p></li>--}}
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
                    <div class="panel panel-default no-brdr" id="formaction">
                        <form method="post"
                              action="{{route('saveNote',['judgmentID'=>$judgment])}}"
                              enctype="multipart/form-data"
                              @submit.prevent="SaveData({{$judgment->id}})"
                        >
                            @csrf
                            <div class="col-md-6 float-right">
                                <div class="form-row">
                                    <div class="form-group col-md-12">

                                        <div class="form-group">
                                            <label>الموجز</label>
                                            <textarea class="form-control rounded-0" rows="4"
                                                      name="judgshort" id="judgshort"
                                                      v-model="judgshort"
                                                      required
                                            ></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>المبدأ</label>
                                            <textarea class="form-control rounded-0" rows="4"
                                                      name="judgrule" id="judgrule" required
                                                      v-model="judgrule"
                                            ></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputAddress">المواد المرتبطة</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input id="AddArticle" type="text"
                                                           class="form-control"
                                                           v-model="articleToSearch"
                                                           @keyup="search"
                                                    >

                                                    <select id="SelectedArticles" name="from[]"
                                                            class="multiselect form-control"
                                                            size="8"
                                                            multiple="multiple"
                                                            data-right="#multiselect_to_1"
                                                            data-right-all="#right_All_1"
                                                            data-right-selected="#right_Selected_1"
                                                            data-left-all="#left_All_1"
                                                            data-left-selected="#left_Selected_1">

                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="to[]" id="multiselect_to_1"
                                                            class="form-control" size="8"
                                                            multiple="multiple">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                @if($judgment->incompletednotes)
                                    <input type="submit" class="btn general_btn btn_1" value="حفظ">

                                @endif
                                <a href="{{route('addJudgments')}}" class="btn general_btn btn_1">الرجوع</a>
                            </div>

                            <div class="col-md-6 float-right">

                                <iframe id="myFrame" style="display:none" width="100%"
                                        height="400"></iframe>
                                @if($judgment->incompletednotes)
                                    <div class="radio">
                                        <label><input type="radio" name="pdf"
                                                      onclick="openPdf({{json_encode($judgment->judgmentFile)}})">
                                            {{$judgment->judgmentFile}}
                                        </label>
                                    </div>
                                @endif
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
    <!-- end main-wrapper -->

    <script>
        const notes = new Vue({
            el: '#formaction',
            data: {
                articleToSearch: '',
                judgshort: '',
                judgrule: '',
                lawarticles: [],
            },
            methods: {
                SaveData: function (id) {
                    var articles = document.getElementById('multiselect_to_1').options;
                    for (var i = 0; i < articles.length; i++) {
                        this.lawarticles.push(articles[i].value);
                    }
                    axios.post('/judgments/saveNote/' + id,
                        {
                            judgment_id: id,
                            judgrule: this.judgrule,
                            judgshort: this.judgshort,
                            lawarticles: this.lawarticles,
                        })
                        .then(function (response) {
                            if (response.data.status == 200) {
                                toast("عملية ناجة ", response.data.message, 'success');
                            } else if (response.data.status == 422) {
                                toast('خطأ', response.data.message, 'error');
                            }

                        })
                        .catch(function (error) {
                            toast('خطأ', "خطأ لقد إكتمل هذا الحكم", 'error');
                        });
                    this.articleToSearch = this.judgshort = this.judgrule = "";
                    $('#SelectedArticles').find('option').remove();
                    $('#multiselect_to_1').find('option').remove();
                    this.lawarticles = [];
                },
                search: function () {
                    $('#SelectedArticles').find('option').remove();
                    axios.get('/laws/SearchArticles/' + this.articleToSearch)
                        .then(function (response) {
                            var datalength = response.data.length;
                            if (datalength) {

                                for (var i = 0; i < datalength; i++) {
                                    var option = document.createElement('option');
                                    option.innerHTML = response.data[i].info;
                                    option.value = response.data[i].articleId;
                                    option.setAttribute('id', response.data[i].articleId);
                                    // option.setAttribute('name', '');
                                    $('#SelectedArticles').append(option);
                                }
                            }

                        });
                }
            },


        })
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            // make code pretty
            window.prettyPrint && prettyPrint();

            $('.multiselect').multiselect();
        });
    </script>
    <script type="text/javascript">

        function openPdf(file) {
            let filename = "/storage/Finished_Judgments/" + file;
            var omyFrame = document.getElementById("myFrame");
            omyFrame.style.display = "block";
            omyFrame.src = filename;
        }

    </script>


    </body>
@endsection
