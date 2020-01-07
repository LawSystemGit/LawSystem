<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\judgments;
use Storage;
use Session;
use App\LawArticl;
use Redirect, Response, DB, Config;
use Datatables;
use App\fileHandling;
class JudgmentsController extends Controller
{
    public function index()
    {
        return view('judgments.index');
    }

    public function judgmentsList()
    {
        $judgments = judgments::all();
        return datatables()->of($judgments)->make(true);

    }

    public function create($lastJudgment = null)
    {
        $files = fileHandling::readDirectory('/public/unfinished_judgments/');
        if ($lastJudgment) {
            $lastJudgment = judgments::find($lastJudgment);
        }
        return view('judgments.createNewJudgment', compact(['files', 'lastJudgment']));
    }

    public function store(Request $request)
    {

        $this->validate($request,
            [
                'judgmentfile' => 'required',
                'judgmentcategory' => 'required',
                'judgmentDate' => 'required',
                'year' => 'required',
                'objectionNo' => 'required',
                'notes' => 'required',
            ], [
                'judgmentfile.required' => 'مطلوب إدخال نص الحكم',
                'judgmentcategory.required' => 'تصنيف الحقل مطلوب',
                'judgmentDate.required' => 'تاريخ الجلسة مطلوب',
                'year.required' => 'مطلوب إدخال السنة',
                'objectionNo.required' => 'مطلوب إدخال رقم الطعن',
                'notes.required' => 'مطلوب إدخال عدد المبادئ ',
            ]);

        $lastJudgment = judgments::create($request->all());
        $lastJudgment->incompletednotes = $request['notes'];
        $lastJudgment->save();
        if ($lastJudgment) {

            $suuccess = Storage::move(('public/unfinished_judgments/' . $request['judgmentfile']), ('public/Finished_Judgments/'
                . $request['judgmentfile']));
            if ($suuccess) {
                Session::put('notification', [
                    'message' => " تم حفظ الحكم بنجاح  ",
                    'alert-type' => 'success',
                ]);
                return redirect()->route('addJudgments', ['lastJudgment' => $lastJudgment->id]);
            }
        } else {
            Session::put('notification', [
                'message' => " خطأ فى إدخال البيانات  ",
                'alert-type' => 'error',
            ]);
            return redirect()->route('addJudgments', ['lastJudgment' => $lastJudgment->id]);
        }

    }

    public function show(judgments $judgment)
    {
        return view('judgments.show', compact('judgment'));
    }

    public function update(Request $request, $judgmentID)
    {
        $this->validate($request,
            [
                'judgmentcategory' => 'required',
                'judgmentDate' => 'required',
                'year' => 'required',
                'objectionNo' => 'required',
                'notes' => 'required',
            ], [
                'judgmentcategory.required' => 'تصنيف الحقل مطلوب',
                'judgmentDate.required' => 'تاريخ الجلسة مطلوب',
                'year.required' => 'مطلوب إدخال السنة',
                'objectionNo.required' => 'مطلوب إدخال رقم الطعن',
                'notes.required' => 'مطلوب إدخال عدد المبادئ ',
            ]);
        $judgmentID = judgments::find($judgmentID);
        $judgmentID->judgmentcategory = $request['judgmentcategory'];
        $judgmentID->judgmentDate = $request['judgmentDate'];
        $judgmentID->year = $request['year'];
        $judgmentID->objectionNo = $request['objectionNo'];
        $judgmentID->notes = $request['notes'];
        if ($request['notes'] > count($judgmentID->judgmentnotes)) {
            $judgmentID->incompletednotes = ($request['notes']) - count($judgmentID->judgmentnotes);
        }

        $judgmentID->save();

        if ($judgmentID) {
            Session::put('notification', [
                'message' => " تم حفظ الحكم بنجاح  ",
                'alert-type' => 'success',
            ]);
            return redirect()->route('getJudgments');
        }
    }

    public function updateLastInput(Request $request, $lastJudgment)
    {
        $judgment = judgments::find($lastJudgment);
        return view('judgments.updateLastInput', compact(['judgment']));
    }

    public function saveLastInput(Request $request, $lastJudgment)
    {
        $this->validate($request,
            [

                'judgmentcategory' => 'required',
                'judgmentDate' => 'required',
                'year' => 'required',
                'objectionNo' => 'required',
                'notes' => 'required',
            ], [
                'judgmentcategory.required' => 'تصنيف الحقل مطلوب',
                'judgmentDate.required' => 'تاريخ الجلسة مطلوب',
                'year.required' => 'مطلوب إدخال السنة',
                'objectionNo.required' => 'مطلوب إدخال رقم الطعن',
                'notes.required' => 'مطلوب إدخال عدد المبادئ ',
            ]);

        $judgment = judgments::find($lastJudgment);
        $judgment->judgmentcategory = $request['judgmentcategory'];
        $judgment->judgmentDate = $request['judgmentDate'];
        $judgment->year = $request['year'];
        $judgment->objectionNo = $request['objectionNo'];
        $judgment->notes = $request['notes'];
        $judgment->save();
        if ($judgment) {
            $files = fileHandling::readDirectory('/public/unfinished_judgments/');
            $lastJudgment = null;
            Session::put('notification', [
                'message' => " تم حفظ الحكم بنجاح  ",
                'alert-type' => 'success',
            ]);
            return view('judgments.createNewJudgment')->with('files', $files)->with('lastJudgment', $lastJudgment);
        } else {
            Session::put('notification', [
                'message' => " خطأ فى إدخال البيانات  ",
                'alert-type' => 'error',
            ]);
            return redirect()->back();
        }
    }

    public function getalljudgments()
    {
        $judgments = judgments::all();
        return view('laws.getalljudgments', compact('judgments'));
    }

    public function edit(Request $request, judgments $judgmentID)
    {
        return view('judgments.editJudgment', compact('judgmentID'));
    }


}
