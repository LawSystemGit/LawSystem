<?php

namespace App\Http\Controllers\AlKuwaitAlyoum;

use App\Models\Penalprovision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KuwaiToday;
use Session;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function create(KuwaiToday $versionID)
    {
        return view('RelatedToVersion.createNotice', compact(['versionID']));
    }

    public function store(Request $request, KuwaiToday $versionID)
    {
        $this->validate($request,
            [
                'noticebody' => 'required',
            ], [
                'noticebody.required' => 'مطلوب إدخال نص التنوية',
            ]);
        $Notice = new Notice();
        $Notice->kuwai_todays_id = $versionID->id;
        $Notice->noticesource = $request->noticesource ? $request->noticesource : null;
        $Notice->noticedate = $request->noticedate ? $request->noticedate : null;
        $Notice->noticebody = $request->noticebody;
        $Notice->save();
        if ($Notice) {
            Session::put('notification', [
                'message' => " تم إضافة التنوية بنجاح  ",
                'alert-type' => 'success',
            ]);
            return redirect()->route('showVersion', ['version' => $versionID->id]);
        }

    }

    public function edit(Notice $notice)
    {
        return view('RelatedToVersion.editNotice', compact(['notice']));
    }

    public function update(Request $request, Notice $notice)
    {
        $this->validate($request,
            [
                'noticebody' => 'required',
            ], [
                'noticebody.required' => 'مطلوب إدخال نص التنوية',
            ]);
        $notice->noticesource = $request->noticesource ? $request->noticesource : null;
        $notice->noticedate = $request->noticedate ? $request->noticedate : null;
        $notice->noticebody = $request->noticebody;
        $notice->save();
        if ($notice) {
            Session::put('notification', [
                'message' => " تم تعديل التنوية بنجاح  ",
                'alert-type' => 'success',
            ]);
            return redirect()->route('showVersion', ['version' => $notice->kuwaitVersion->id]);
        }


    }

    public function delete(Notice $notice)
    {
        $notice->delete();
        Session::put('notification', [
            'message' => " تم حذف التنوية بنجاح  ",
            'alert-type' => 'success',
        ]);
        return back();
    }


}
