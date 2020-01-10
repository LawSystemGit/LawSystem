<?php

namespace App\Http\Controllers\AlKuwaitAlyoum;

use App\Models\Directives;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KuwaiToday;
use Session;
use App\Models\Decision;

class DecisionController extends Controller
{
    public function create(KuwaiToday $versionID)
    {
        return view('RelatedToVersion.createDecision', compact(['versionID']));
    }

    public function store(Request $request, KuwaiToday $versionID)
    {
        $this->validate($request,
            [
                'decisionno' => 'required',
                'decisionbody' => 'required',
            ], [
                'decisionno.required' => 'مطلوب إدخال رقم القرار',
                'decisionbody.required' => 'مطلوب إدخال نص القرار',
            ]);
        $decision = new Decision();
        $decision->kuwai_todays_id = $versionID->id;
        $decision->decisionno = $request->decisionno;
        $decision->decisionbody = $request->decisionbody;
        $decision->decisionsource = $request->decisionsource ? $request->decisionsource : null;
        $decision->decisiontitle = $request->decisiontitle ? $request->decisiontitle : null;
        $decision->decisiondate = $request->decisiondate ? $request->decisiondate : null;
        $decision->save();
        if ($decision) {
            Session::put('notification', [
                'message' => " تم إضافة القرار بنجاح  ",
                'alert-type' => 'success',
            ]);
            return redirect()->route('showVersion', ['version' => $versionID->id]);
        }
    }

    public function edit(Decision $decision)
    {
        return view('RelatedToVersion.editDecision', compact(['decision']));
    }

    public function update(Request $request, Decision $decision)
    {
        $this->validate($request,
            [
                'decisionno' => 'required',
                'decisionbody' => 'required',
            ], [
                'decisionno.required' => 'مطلوب إدخال رقم القرار',
                'decisionbody.required' => 'مطلوب إدخال نص القرار',
            ]);
        $decision->decisionno = $request->decisionno;
        $decision->decisionbody = $request->decisionbody;
        $decision->decisionsource = $request->decisionsource ? $request->decisionsource : null;
        $decision->decisiontitle = $request->decisiontitle ? $request->decisiontitle : null;
        $decision->decisiondate = $request->decisiondate ? $request->decisiondate : null;
        $decision->save();
        if ($decision) {
            Session::put('notification', [
                'message' => " تم تعديل القرار بنجاح  ",
                'alert-type' => 'success',
            ]);
            return redirect()->route('showVersion', ['version' => $decision->kuwaitVersion->id]);
        }

    }

    public function destroy(Decision $decision)
    {
        $id = $decision->kuwaitVersion->id;
        $decision->delete();
        Session::put('notification', [
            'message' => " تم  حذف القرار بنجاح  ",
            'alert-type' => 'success',
        ]);
        return redirect()->route('showVersion', ['version' => $id]);
    }

}
