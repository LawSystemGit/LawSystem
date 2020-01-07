<?php

namespace App\Http\Controllers;

use App\fileHandling;
use App\Law;
use Storage;
use App\LawArticl;
use Session;
use Redirect, Response, DB, Config;
use Datatables;
use Illuminate\Http\Request;

class LawsController extends Controller
{
    // index method gets all laws to show them in index page

    public function index()
    {
        return view('SystemLaws.index');
    }

    public function lawsList()
    {
        $laws = Law::all();
        return datatables()->of($laws)->make(true);

    }

    // store method used to save the new law
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'lawtype' => 'required',
                'lawcategory' => 'required',
                'lawno' => 'required|unique:laws',
                'lawyear' => 'required',
                'lawrelation' => 'required',
            ], [   // change the default error messages from english to arabic
                'lawno.required' => 'مطلوب إدخال رقم القانون',
                'lawno.unique' => 'القانون موجود بالفعل',
                'lawno.unique' => " القانون رقم " . $request['lawno'] . " موجود بالفعل  ",
                'lawtype.required' => 'مطلوب إخال نوع القانون',
                'lawcategory.required' => 'مطلوب إدخال تصنيف القانون',
                'lawyear.required' => 'مطلوب إدخال سنة القانون',
                'lawrelation.required' => 'القانون بشأن ماذا',
            ]);

        $lawId = Law::create($request->all());
        $lawId->publishdate = $request['publishdate'] ? $request['publishdate'] : null;
        $lawId->publishid = $request['publishid'] ? $request['publishid'] : null;
        $fileToStore = $lawId->lawno . '.' . 'pdf';
        //TODO:check if this code is working
        // check if the $request has a file
        if ($request->lawfile) {
            $path = Storage::move('/public/laws_unfinished/' . $request->lawfile, '/public/Law_PDF/' . $fileToStore);
            $lawId->lawfile = $fileToStore;
            $lawId->save();
        }
        $lawId->save();
        // check the creation of the new law is done
        // return success message
        if ($lawId) {
            Session::put('notification', [
                'message' => " تم إضافة القانون بنجاح ",
                'alert-type' => 'success',
            ]);
            return redirect()->route('addArticle', ['lawID' => $lawId]);
        } else {
            Session::put('notification', [
                'message' => " خطأ القانون موجود بالفعل ",
                'alert-type' => 'error',
            ]);
            // if the creation of new law is fails redirect it back
            return redirect()->route('addNewLaw');
        }


    }

    public function show(Law $law)
    {
        return view('SystemLaws.show', compact('law'));
    }

    // return view to create / add new law
    public function create($lastLaw = null)
    {
        if ($lastLaw) {
            $lastLaw = Law::find($lastLaw);
        }
        $files = fileHandling::readDirectory('/public/laws_unfinished/');
        return view('SystemLaws.createNewLaw', compact(['files', 'lastLaw']));
    }

    // return view to edit law
    public function edit(Law $lawID)
    {
        $files = fileHandling::readDirectory('/public/laws_unfinished/');
        return view('SystemLaws.editSelectedLaw', compact(['lawID', 'files']));
    }

    public function update(Request $request, Law $lawID)
    {
        $this->validate($request,
            [
                'lawtype' => 'required',
                'lawcategory' => 'required',
                'lawno' => 'required',
                'lawyear' => 'required',
                'lawrelation' => 'required',
            ], [  // change the default english error validation messages with arabic ones
                'lawno.required' => 'مطلوب إدخال رقم القانون',
                'lawtype.required' => 'مطلوب إخال نوع القانون',
                'lawcategory.required' => 'مطلوب إدخال تصنيف القانون',
                'lawyear.required' => 'مطلوب إدخال سنة القانون',
                'lawrelation.required' => 'القانون بشأن ماذا',
            ]);

        $lawID->lawtype = $request['lawtype'];
        $lawID->lawcategory = $request['lawcategory'];
        $lawID->lawno = $request['lawno'];
        $lawID->lawyear = $request['lawyear'];
        $lawID->lawrelation = $request['lawrelation'];
        $lawID->publishdate = $request['publishdate'] ? $request['publishdate'] : null;
        $lawID->publishid = $request['publishid'] ? $request['publishid'] : null;
        $lawID->save();

        // check if the request has file
        if ($request->lawfile) {


        }


        if ($request->lawfile) {
            $fileToStore = $request->lawno . '.' . 'pdf';
            if ($lawID->lawfile) {
                $path0 = Storage::move(('/public/Law_PDF/' . $lawID->lawfile), ('/public/laws_unfinished/' . $lawID->lawfile));
            }
            if (!(fileHandling::checkForFile('public/Law_PDF/', $fileToStore))) {
                $path = Storage::move(('/public/laws_unfinished/' . $request->lawfile), ('/public/Law_PDF/' . $fileToStore));
                $lawID->lawfile = $fileToStore;
                $lawID->save();
                Session::put('notification', [
                    'message' => " تم تعديل القانون رقم  " . $lawID->lawno,
                    'alert-type' => 'success',
                ]);
                return redirect()->route('showlaw', ['law' => $lawID]);
            }
        }

        Session::put('notification', [
            'message' => " تم تعديل القانون رقم  " . $lawID->lawno,
            'alert-type' => 'success',
        ]);
        return redirect()->route('showlaw', ['law' => $lawID]);

    }


    public function updateLastLaw(Law $lastLaw)
    {
        return view('SystemLaws.EditlastLaw', compact('lastLaw'));
    }

    public function saveLastLaw(Request $request, Law $lastLaw)
    {
        $this->validate($request,
            [
                'lawtype' => 'required',
                'lawcategory' => 'required',
                'lawno' => 'required',
                'lawyear' => 'required',
                'lawrelation' => 'required',
            ], [  // change the default english error validation messages with arabic ones
                'lawno.required' => 'مطلوب إدخال رقم القانون',
                'lawtype.required' => 'مطلوب إخال نوع القانون',
                'lawcategory.required' => 'مطلوب إدخال تصنيف القانون',
                'lawyear.required' => 'مطلوب إدخال سنة القانون',
                'lawrelation.required' => 'القانون بشأن ماذا',
            ]);
        $lastLaw->lawtype = $request['lawtype'];
        $lastLaw->lawcategory = $request['lawcategory'];
        $lastLaw->lawno = $request['lawno'];
        $lastLaw->lawyear = $request['lawyear'];
        $lastLaw->lawrelation = $request['lawrelation'];
        $lastLaw->publishdate = $request['publishdate'] ? $request['publishdate'] : null;
        $lastLaw->publishid = $request['publishid'] ? $request['publishid'] : null;

        if ($lastLaw->lawfile) {
            $lastLaw->lawfile = $request['lawno'] . '.' . 'pdf';
            $path = fileHandling::fileRename('public/Law_PDF/', $lastLaw->lawfile, $request['lawno'] . '.' . 'pdf');
        }
        $lastLaw->save();
        if ($lastLaw) {
            Session::put('notification', [
                'message' => " تم تعديل القانون رقم  " . $lastLaw->lawno,
                'alert-type' => 'success',
            ]);
            return redirect()->route('showlaw', ['law' => $lastLaw]);
        }


    }

    // laravel doesn't support arabic slug so this method is used to generate arabic ones
    public function AddArticles(Request $request, Law $lawID)
    {
        return view('SystemLaws.addArticleToLaw', compact('lawID'));
    }

    public function SaveLawArticles(Request $request)
    {

        $this->validate($request,
            [
                'articleno' => 'required',
                'articlebody' => 'required',
            ], [
                'articleno.required' => 'مطلوب إدخال رقم المادة',
                'articlebody.required' => 'مطلوب إدخال نص المادة',
            ]);
        $results = LawArticl::where('articleno', $request['articleno'])->get();

        if ($results) {
            foreach ($results as $result) {
                if ($result->laws_id == $request['laws_id']) {
                    return response()->json([
                        'message' => "هذه المادة موجودة بالفعل",
                        "status" => 422
                    ]);
                }
            }
        }

        $articleLaw = new LawArticl();
        $articleLaw->laws_id = $request['laws_id'];
        $articleLaw->articleno = $request['articleno'];
        $articleLaw->articlebody = $request['articlebody'];
        $articleLaw->subjectid = $request['subjectid'];
        $articleLaw->subjectitle = $request['subjectitle'];
        $articleLaw->chapterid = $request['chapterid'];
        $articleLaw->chaptertitle = $request['chaptertitle'];
        $articleLaw->sectionid = $request['sectionid'];
        $articleLaw->sectiontitle = $request['sectiontitle'];
        $articleLaw->articletitle = $request['articletitle'];
        $articleLaw->save();
        if ($articleLaw) {
            return response()->json([
                'message' => "تم اضافة المادة بنجاح",
                "status" => 200
            ]);
        } else {
            return response()->json([
                'message' => "هذه المادة موجودة بالفعل",
                "status" => 422
            ]);
        }

    }

    public function showArticles(Law $law)
    {
        $articles = $law->lawArticles;
        return view('SystemLaws.showArticles', compact(['law', 'articles']));
    }


    public function editArticle(LawArticl $articleID)
    {
        return view('SystemLaws.editArticle', compact('articleID'));
    }

    public function updateArticle(Request $request, LawArticl $articleID)
    {

        $this->validate($request,
            [
                'articleno' => 'required',
                'articlebody' => 'required',
            ], [
                'articleno.required' => 'مطلوب إدخال رقم المادة',
                'articlebody.required' => 'مطلوب إدخال نص المادة',
            ]);

        $articleID->articleno = $request['articleno'];
        $articleID->articlebody = $request['articlebody'];
        $articleID->subjectid = $request['subjectid'];
        $articleID->subjectitle = $request['subjectitle'];
        $articleID->chapterid = $request['chapterid'];
        $articleID->chaptertitle = $request['chaptertitle'];
        $articleID->sectionid = $request['sectionid'];
        $articleID->sectiontitle = $request['sectiontitle'];
        $articleID->articletitle = $request['articletitle'];
        $articleID->save();

        if ($articleID) {
            Session::put('notification', [
                'message' => " تم تعديل المادة بنجاح  ",
                'alert-type' => 'success',
            ]);
            return redirect()->route('showlaw', ['law' => $articleID->law]);
        } else {
            return back();
        }

    }

    public function deleteArticle(LawArticl $articleID)
    {

        $status = $articleID->delete();
        if ($status) {
            return response()->json([
                'message' => "تم حذ المادة بنجاح",
                "status" => 200
            ]);
        } else {
            return response()->json([
                'message' => "خطأ أثناء حذف المادة",
                "status" => 422
            ]);
        }
    }

    public function SearchArticles(Request $request, $articleNo)
    {
        if ($articleNo) {
            $formatedData = [];
            $results = DB::table('law_articls')
                ->where('articleno', $articleNo)
                ->get();
            foreach ($results as $article) {
                $attr = LawArticl::find($article->id);
                $somedata = [
                    'articleId' => $attr->id,
                    'info' => " المادة رقم {$attr->articleno} من القانون ال{$attr->law->lawcategory} ",
                ];
                $formatedData[] = $somedata;
            }
            return $formatedData;
        } else {
            return null;
        }
    }


}
