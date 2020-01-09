<?php

namespace App\Http\Controllers;

use App\Models\KuwaiToday;
use Illuminate\Http\Request;
use App\Models\Penalprovision;
use Session;
class PenalprovisionController extends Controller
{
    public function create(KuwaiToday $versionID)
    {
        return view('RelatedToVersion.createProvision',compact(['versionID']));
    }

    public function store(Request $request, KuwaiToday $versionID)
    {
        $this->validate($request,
            [
                'provisiondate' => 'required',
                'caseno' => 'required',
                'policestation' => 'required',
                'provisionbody' => 'required',
            ], [
                'provisiondate.required' => 'مطلوب إدخال جهه الحكم',
                'caseno.required' => 'مطلوب إدخال نص الحكم',
                'policestation.required' => 'مطلوب إدخال جهه الحكم',
                'provisionbody.required' => 'مطلوب إدخال نص الحكم',
            ]);
        $Penalprovision = new Penalprovision();
        $Penalprovision->kuwai_todays_id = $versionID->id;
        $Penalprovision->provisiondate = $request->provisiondate;
        $Penalprovision->caseno = $request->caseno;
        $Penalprovision->policestation = $request->policestation;
        $Penalprovision->provisionbody = $request->provisionbody;
        $Penalprovision->save();
        if ($Penalprovision) {
            Session::put('notification', [
                'message' => " تم إضافة الحكم بنجاح  ",
                'alert-type' => 'success',
            ]);
            return redirect()->route('showVersion', ['version' => $versionID->id]);
        }

    }

    public function edit(Penalprovision $provision)
    {
        return view('RelatedToVersion.editProvision', compact(['provision']));
    }

    public function update(Request $request, Penalprovision $provision)
    {
        $this->validate($request,
            [
                'provisiondate' => 'required',
                'caseno' => 'required',
                'policestation' => 'required',
                'provisionbody' => 'required',
            ], [
                'provisiondate.required' => 'مطلوب إدخال جهه الحكم',
                'caseno.required' => 'مطلوب إدخال نص الحكم',
                'policestation.required' => 'مطلوب إدخال جهه الحكم',
                'provisionbody.required' => 'مطلوب إدخال نص الحكم',
            ]);

        $provision->provisiondate = $request->provisiondate;
        $provision->caseno = $request->caseno;
        $provision->policestation = $request->policestation;
        $provision->provisionbody = $request->provisionbody;
        $provision->save();
        if ($provision) {
            Session::put('notification', [
                'message' => " تم تعديل الحكم بنجاح  ",
                'alert-type' => 'success',
            ]);
            return redirect()->route('showVersion', ['version' => $provision->kuwaitVersion->id]);
        }


    }

    public function delete(Penalprovision $provision)
    {
        $provision->delete();
        Session::put('notification', [
            'message' => " تم حذف الحكم بنجاح  ",
            'alert-type' => 'success',
        ]);
        return back();
    }


}
