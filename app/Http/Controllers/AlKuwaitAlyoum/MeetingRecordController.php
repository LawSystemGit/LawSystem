<?php

namespace App\Http\Controllers\AlKuwaitAlyoum;

use App\Models\Decision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KuwaiToday;
use App\Models\MeetingRecord;
use Session;

class MeetingRecordController extends Controller
{
    public function create(KuwaiToday $versionID)
    {
        return view('RelatedToVersion.createmeetRecord', compact(['versionID']));
    }

    public function store(Request $request, KuwaiToday $versionID)
    {
        $this->validate($request,
            [
                'meetingsource' => 'required',
                'meetingdate' => 'required',
                'meetingrecord' => 'required',
            ], [
                'noticebody.required' => 'مطلوب إدخال جهة  المحضر',
                'meetingdate.required' => 'مطلوب إدخال تاريخ المحضر',
                'meetingrecord.required' => 'مطلوب إدخال نص المحضر',
            ]);
        $meeting = new MeetingRecord();
        $meeting->kuwai_todays_id = $versionID->id;
        $meeting->meetingsource = $request->meetingsource;
        $meeting->meetingdate = $request->meetingdate;
        $meeting->meetingrecord = $request->meetingrecord;
        $meeting->save();
        if ($meeting) {
            Session::put('notification', [
                'message' => " تم إضافة المحضر بنجاح  ",
                'alert-type' => 'success',
            ]);
            return redirect()->route('showVersion', ['version' => $versionID->id]);
        }
    }

    public function edit(MeetingRecord $meetingRecord)
    {
        return view('RelatedToVersion.editmeetRecord', compact(['meetingRecord']));
    }

    public function update(Request $request, MeetingRecord $meetingRecord)
    {
        $this->validate($request,
            [
                'meetingsource' => 'required',
                'meetingdate' => 'required',
                'meetingrecord' => 'required',
            ], [
                'noticebody.required' => 'مطلوب إدخال جهة  المحضر',
                'meetingdate.required' => 'مطلوب إدخال تاريخ المحضر',
                'meetingrecord.required' => 'مطلوب إدخال نص المحضر',
            ]);

        $meetingRecord->meetingsource = $request->meetingsource;
        $meetingRecord->meetingdate = $request->meetingdate;
        $meetingRecord->meetingrecord = $request->meetingrecord;
        $meetingRecord->save();
        if ($meetingRecord) {
            Session::put('notification', [
                'message' => " تم تعديل المحضر بنجاح  ",
                'alert-type' => 'success',
            ]);
            return redirect()->route('showVersion', ['version' => $meetingRecord->kuwaitVersion->id]);
        }
    }

    public function destroy(MeetingRecord $meetingRecord)
    {
        $id = $meetingRecord->kuwaitVersion->id;
        $meetingRecord->delete();
        Session::put('notification', [
            'message' => " تم  حذف القرار بنجاح  ",
            'alert-type' => 'success',
        ]);
        return redirect()->route('showVersion', ['version' => $id]);
    }
}
