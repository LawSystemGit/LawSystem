<?php

namespace App\Http\Controllers\AlKuwaitAlyoum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\KuwaiToday;
use Session;

class InvitationController extends Controller
{
    public function create (KuwaiToday $versionID)
    {
        return view ('RelatedToVersion.createInvitation' , compact (['versionID']));
    }

    public function store (Request $request , KuwaiToday $versionID)
    {
        $this->validate ($request ,
            [
                'invitationbody' => 'required' ,
            ] , [
                'invitationbody.required' => 'مطلوب إدخال نص الدعوه' ,
            ]);

        $invitation = new Invitation();
        $invitation->kuwai_todays_id = $versionID->id;
        $invitation->invitationsource = $request->invitationsource ? $request->invitationsource : null;
        $invitation->invitationbody = $request->invitationbody;
        $invitation->save ();
        if ($invitation) {
            Session::put ('notification' , [
                'message' => " تم إضافة الدعوه بنجاح  " ,
                'alert-type' => 'success' ,
            ]);
            return redirect ()->route ('showVersion' , ['version' => $versionID->id]);
        }
    }

    public function edit (Invitation $invitation)
    {
        return view ('RelatedToVersion.editInvitation' , compact (['invitation']));
    }

    public function update (Request $request , Invitation $invitation)
    {
        $this->validate ($request ,
            [
                'invitationbody' => 'required' ,
            ] , [
                'invitationbody.required' => 'مطلوب إدخال نص الدعوه' ,
            ]);
        $invitation->invitationsource = $request->invitationsource ? $request->invitationsource : null;
        $invitation->invitationbody = $request->invitationbody;
        $invitation->save ();
        if ($invitation) {
            Session::put ('notification' , [
                'message' => " تم تعديل الدعوه بنجاح  " ,
                'alert-type' => 'success' ,
            ]);
            return redirect ()->route ('showVersion' , ['version' => $invitation->kuwaitVersion->id]);
        }
    }

    public function destroy (Invitation $invitation)
    {
        $id = $invitation->kuwaitVersion->id;
        $invitation->delete ();
        Session::put ('notification' , [
            'message' => " تم  حذف الدعوه بنجاح  " ,
            'alert-type' => 'success' ,
        ]);
        return redirect ()->route ('showVersion' , ['version' => $id]);
    }

}
