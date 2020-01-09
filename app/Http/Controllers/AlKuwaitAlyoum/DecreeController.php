<?php

namespace App\Http\Controllers\AlKuwaitAlyoum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KuwaiToday;
use App\Models\Decree;
use Session;
class DecreeController extends Controller
{
    public function create(KuwaiToday $versionID)
    {
        return view('RelatedToVersion.createDecree',compact(['versionID']));
    }

    public function store(Request $request, KuwaiToday $versionID)
    {
        $this->validate($request,
            [
                'decreesource' => 'required',
                'decreeno' => 'required',
                'decreeyear' => 'required|numeric',
                'decreetitle' => 'required',
                'decreebody' => 'required',
            ], [
                'decreesource.required' => 'مطلوب إدخال جهه المرسوم',
                'decreeno.required' => 'مطلوب إدخال رقم المرسوم',
                'decreeyear.required' => 'مطلوب إدخال سنة الإصدار',
                'decreeyear.numeric' => 'مطلوب إدخال سنة الإصدار ارقام فقط',
                'decreetitle.required' => 'مطلوب إدخال عنوان المرسوم',
                'decreebody.required' => 'مطلوب إدخال جهه المرسوم',

            ]);
        $decree = new Decree();
        $decree->kuwai_todays_id = $versionID->id;
        $decree->decreesource = $request->decreesource;
        $decree->decreeno = $request->decreeno;
        $decree->decreeyear = $request->decreeyear;
        $decree->decreetitle = $request->decreetitle;
        $decree->decreebody = $request->decreebody;
        $decree->save();
        if ($decree) {
            Session::put('notification', [
                'message' => " تم إضافة المرسوم بنجاح  ",
                'alert-type' => 'success',
            ]);
            return redirect()->route('showVersion', ['version' => $versionID->id]);
        }

    }

    public function edit(Decree $decree)
    {
        return view('RelatedToVersion.editDecree',compact(['decree']));
    }

    public function update(Request $request,Decree $decree)
    {
        $this->validate($request,
            [
                'decreesource' => 'required',
                'decreeno' => 'required',
                'decreeyear' => 'required|numeric',
                'decreetitle' => 'required',
                'decreebody' => 'required',
            ], [
                'decreesource.required' => 'مطلوب إدخال جهه المرسوم',
                'decreeno.required' => 'مطلوب إدخال رقم المرسوم',
                'decreeyear.required' => 'مطلوب إدخال سنة الإصدار',
                'decreeyear.numeric' => 'مطلوب إدخال سنة الإصدار ارقام فقط',
                'decreetitle.required' => 'مطلوب إدخال عنوان المرسوم',
                'decreebody.required' => 'مطلوب إدخال جهه المرسوم',

            ]);
        $decree->decreesource = $request->decreesource;
        $decree->decreeno = $request->decreeno;
        $decree->decreeyear = $request->decreeyear;
        $decree->decreetitle = $request->decreetitle;
        $decree->decreebody = $request->decreebody;
        $decree->save();
        if ($decree) {
            Session::put('notification', [
                'message' => " تم تعديل المرسوم بنجاح  ",
                'alert-type' => 'success',
            ]);
            return redirect()->route('showVersion', ['version' =>$decree->kuwaitVersion->id]);
        }

    }

    public function destroy(Decree $decree)
    {
        $id = $decree->kuwaitVersion->id;
        Session::put('notification', [
            'message' => " تم حذف المرسوم بنجاح  ",
            'alert-type' => 'success',
        ]);
        return redirect()->route('showVersion', ['version' =>$id]);
    }
}

