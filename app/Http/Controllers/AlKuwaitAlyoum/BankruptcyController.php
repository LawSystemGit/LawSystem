<?php


namespace App\Http\Controllers\AlKuwaitAlyoum;

use App\Models\Correction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KuwaiToday;
use App\Models\Bankruptcy;
use Session;

class BankruptcyController extends Controller
{
    public function create (KuwaiToday $versionID)
    {
        return view ('RelatedToVersion.createBankruptcy' , compact (['versionID']));
    }

    public function store (Request $request , KuwaiToday $versionID)
    {
        $this->validate ($request ,
            [
                'bankruptcysource' => 'required' ,
                'bankruptcyagainst' => 'required' ,
                'bankruptcyjudg' => 'required' ,
                'bankruptcydate' => 'required' ,
                'bankruptcybody' => 'required' ,
            ] , [
                'bankruptcysource.required' => 'مطلوب إدخال جهه القرار/ التفليسة ' ,
                'bankruptcyagainst.required' => 'مطلوب إدخال الخصم' ,
                'bankruptcyjudg.required' => 'مطلوب إدخال رقم القضية' ,
                'bankruptcydate.required' => 'مطلوب إدخال تاريخ الجلسة' ,
                'bankruptcybody.required' => 'مطلوب إدخال نص القرار/ التفليسة' ,
            ]);
        $Bankruptcy = new Bankruptcy();
        $Bankruptcy->kuwai_todays_id = $versionID->id;
        $Bankruptcy->bankruptcysource = $request->bankruptcysource;
        $Bankruptcy->bankruptcyagainst = $request->bankruptcyagainst;
        $Bankruptcy->bankruptcyjudg = $request->bankruptcyjudg;
        $Bankruptcy->bankruptcydate = $request->bankruptcydate;
        $Bankruptcy->bankruptcybody = $request->bankruptcybody;
        $Bankruptcy->save ();
        if ($Bankruptcy) {
            Session::put ('notification' , [
                'message' => " تم إضافة القرار/ التفليسة بنجاح  " ,
                'alert-type' => 'success' ,
            ]);
            return redirect ()->route ('showVersion' , ['version' => $versionID->id]);
        }
    }

    public function edit (Bankruptcy $bankruptcy)
    {
        return view ('RelatedToVersion.editBankruptcy' , compact (['bankruptcy']));
    }

    public function update (Request $request , Bankruptcy $bankruptcy)
    {
        $this->validate ($request ,
            [
                'bankruptcysource' => 'required' ,
                'bankruptcyagainst' => 'required' ,
                'bankruptcyjudg' => 'required' ,
                'bankruptcydate' => 'required' ,
                'bankruptcybody' => 'required' ,
            ] , [
                'bankruptcysource.required' => 'مطلوب إدخال جهه القرار/ التفليسة ' ,
                'bankruptcyagainst.required' => 'مطلوب إدخال الخصم' ,
                'bankruptcyjudg.required' => 'مطلوب إدخال رقم القضية' ,
                'bankruptcydate.required' => 'مطلوب إدخال تاريخ الجلسة' ,
                'bankruptcybody.required' => 'مطلوب إدخال نص القرار/ التفليسة' ,
            ]);
        $bankruptcy->bankruptcysource = $request->bankruptcysource;
        $bankruptcy->bankruptcyagainst = $request->bankruptcyagainst;
        $bankruptcy->bankruptcyjudg = $request->bankruptcyjudg;
        $bankruptcy->bankruptcydate = $request->bankruptcydate;
        $bankruptcy->bankruptcybody = $request->bankruptcybody;
        $bankruptcy->save ();
        if ($bankruptcy) {
            Session::put ('notification' , [
                'message' => " تم تعديل القرار/ التفليسة بنجاح  " ,
                'alert-type' => 'success' ,
            ]);
            return redirect ()->route ('showVersion' , ['version' => $bankruptcy->kuwaitVersion->id]);
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
