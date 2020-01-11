<?php

namespace App\Http\Controllers\AlKuwaitAlyoum;

use App\Models\MeetingRecord;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Correction;
use App\Models\KuwaiToday;
use Session;

class CorrectionController extends Controller
{
    public function create (KuwaiToday $versionID)
    {
        return view ('RelatedToVersion.createCorrection' , compact (['versionID']));
    }

    public function store (Request $request , KuwaiToday $versionID)
    {
        $this->validate ($request ,
            [
                'correctionsource' => 'required' ,
                'correctiondate' => 'required' ,
                'correctionbody' => 'required' ,
            ] , [
                'correctionsource.required' => 'مطلوب إدخال جهة  الإستدراك' ,
                'correctiondate.required' => 'مطلوب إدخال تاريخ الإستدراك' ,
                'correctionbody.required' => 'مطلوب إدخال نص الإستدراك' ,
            ]);
        $correction = new Correction();
        $correction->kuwai_todays_id = $versionID->id;
        $correction->correctionsource = $request->correctionsource;
        $correction->correctiondate = $request->correctiondate;
        $correction->correctionbody = $request->correctionbody;
        $correction->save ();
        if ($correction) {
            Session::put ('notification' , [
                'message' => " تم إضافة الإستدراك بنجاح  " ,
                'alert-type' => 'success' ,
            ]);
            return redirect ()->route ('showVersion' , ['version' => $versionID->id]);
        }
    }

    public function edit (Correction $correction)
    {
        return view ('RelatedToVersion.editCorrection' , compact (['correction']));
    }

    public function update (Request $request , Correction $correction)
    {
        $this->validate ($request ,
            [
                'correctionsource' => 'required' ,
                'correctiondate' => 'required' ,
                'correctionbody' => 'required' ,
            ] , [
                'correctionsource.required' => 'مطلوب إدخال جهة  الإستدراك' ,
                'correctiondate.required' => 'مطلوب إدخال تاريخ الإستدراك' ,
                'correctionbody.required' => 'مطلوب إدخال نص الإستدراك' ,
            ]);
        $correction->correctionsource = $request->correctionsource;
        $correction->correctiondate = $request->correctiondate;
        $correction->correctionbody = $request->correctionbody;
        $correction->save ();
        if ($correction) {
            Session::put ('notification' , [
                'message' => " تم تعديل الإستدراك بنجاح  " ,
                'alert-type' => 'success' ,
            ]);
            return redirect ()->route ('showVersion' , ['version' => $correction->kuwaitVersion->id]);
        }
    }

    public function destroy (Correction $correction)
    {
        $id = $correction->kuwaitVersion->id;
        $correction->delete ();
        Session::put ('notification' , [
            'message' => " تم  حذف الإستدراك بنجاح  " ,
            'alert-type' => 'success' ,
        ]);
        return redirect ()->route ('showVersion' , ['version' => $id]);
    }
}
