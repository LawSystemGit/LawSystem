<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcements;
use App\Models\KuwaiToday;
use Session;

class AnnouncementsController extends Controller
{
    public function create(KuwaiToday $versionID)
    {
        return view('RelatedToVersion.createAnnouncement', compact(['versionID']));
    }

    public function store(Request $request, KuwaiToday $versionID)
    {
        $this->validate($request,
            [
                'announcource' => 'required',
                'announcbody' => 'required',
            ], [
                'announcource.required' => 'مطلوب إدخال جهه الإعلان',
                'announcbody.required' => 'مطلوب إدخال نص الإعلان',
            ]);

        $Announcement = new Announcements();
        $Announcement->announcource = $request->announcource;
        $Announcement->announcbody = $request->announcbody;
        $Announcement->kuwai_todays_id = $versionID->id;
        $Announcement->announctitle = $request->announctitle ? $request->announctitle : null;
        $Announcement->announno = $request->announno ? $request->announno : null;
        $Announcement->save();
        if ($Announcement) {
            Session::put('notification', [
                'message' => " تم إضافة الإعلان بنجاح  ",
                'alert-type' => 'success',
            ]);
            return redirect()->route('showVersion', ['version' => $versionID->id]);
        }

    }

    public function edit(Announcements $Announcement)
    {
        return view('RelatedToVersion.editAnnouncement', compact(['Announcement']));
    }

    public function update(Request $request, Announcements $Announcement)
    {
        $this->validate($request,
            [
                'announcource' => 'required',
                'announcbody' => 'required',
            ], [
                'announcource.required' => 'مطلوب إدخال جهه الإعلان',
                'announcbody.required' => 'مطلوب إدخال نص الإعلان',
            ]);

        $Announcement->announcource = $request->announcource;
        $Announcement->announcbody = $request->announcbody;
        $Announcement->announctitle = $request->announctitle ? $request->announctitle : null;
        $Announcement->announno = $request->announno ? $request->announno : null;
        $Announcement->save();
        if ($Announcement) {
            Session::put('notification', [
                'message' => " تم تعديل الإعلان بنجاح  ",
                'alert-type' => 'success',
            ]);
            return redirect()->route('showVersion', ['version' => $Announcement->kuwaitVersion->id]);
        }


    }

    public function delete(Announcements $Announcement)
    {
        $Announcement->delete();
        Session::put('notification', [
            'message' => " تم الإعلان الحكم بنجاح  ",
            'alert-type' => 'success',
        ]);
        return back();
    }


}
