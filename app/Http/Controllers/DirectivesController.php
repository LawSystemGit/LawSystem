<?php

namespace App\Http\Controllers;

use App\Models\Directives;
use App\Models\KuwaiToday;
use Illuminate\Http\Request;
use Session;
class DirectivesController extends Controller
{
    public function create(KuwaiToday $versionID)
    {
        return view('RelatedToVersion.createDirective',compact(['versionID']));
    }

    public function store(Request $request, KuwaiToday $versionID)
    {
        $this->validate($request,
            [
                'directivesource' => 'required',
                'directivebody' => 'required',
            ], [
                'directivesource.required' => 'مطلوب إدخال جهه التعليمات',
                'directivebody.required' => 'مطلوب إدخال نص التعليمات',
            ]);
        $directive = new Directives();
        $directive->kuwai_todays_id = $versionID->id;
        $directive->directivesource = $request->directivesource;
        $directive->directiveno = $request->directiveno;
        $directive->directiveyear = $request->directiveyear;
        $directive->directivetitle = $request->directivetitle;
        $directive->directivebody = $request->directivebody;
        $directive->save();
        if ($directive) {
            Session::put('notification', [
                'message' => " تم إضافة التعليمات بنجاح  ",
                'alert-type' => 'success',
            ]);
            return redirect()->route('showVersion', ['version' => $versionID->id]);
        }

    }

    public function edit(Directives $directive)
    {
        return view('RelatedToVersion.editDirective',compact(['directive']));
    }

    public function update(Request $request,Directives $directive)
    {
        $this->validate($request,
            [
                'directivesource' => 'required',
                'directivebody' => 'required',
            ], [
                'directivesource.required' => 'مطلوب إدخال جهه التعليمات',
                'directivebody.required' => 'مطلوب إدخال نص التعليمات',
            ]);
        $directive->directivesource = $request->directivesource;
        $directive->directiveno = $request->directiveno;
        $directive->directiveyear = $request->directiveyear;
        $directive->directivetitle = $request->directivetitle;
        $directive->directivebody = $request->directivebody;
        $directive->save();
        if ($directive) {
            Session::put('notification', [
                'message' => " تم تعديل التعليمات بنجاح  ",
                'alert-type' => 'success',
            ]);
            return redirect()->route('showVersion', ['version' =>$directive->kuwaitVersion->id]);
        }

    }

    public function destroy(Directives $directive)
    {
        $id = $directive->kuwaitVersion->id;
        Session::put('notification', [
            'message' => " تم  حذف التعليمات بنجاح  ",
            'alert-type' => 'success',
        ]);
        return redirect()->route('showVersion', ['version' => $id]);
    }
}
