<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KuwaiToday;
use Illuminate\Support\Facades\Storage;

class KuwaiTodayController extends Controller
{
    public function index()
    {
        return "index";
    }

    public function create()
    {
        return view('kuwaiToday.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'versionno' => 'required|unique:kuwaitodays',
                'versiontype' => 'required',
                'versiondate' => 'required',
                'versionfile' => 'required',
            ], [  // change the default english error validation messages with arabic ones
                'versionno.required' => 'مطلوب إدخال رقم العدد',
                'versiontype.required' => 'مطلوب إخال نوع العدد',
                'versiondate.required' => 'مطلوب إدخال تاريخ العدد',
                'versionfile.required' => 'مطلوب إدخال مستند العدد ',
            ]);
        if (request()->hasFile('versionfile')) {
            // get the file name with extention
            $filenamewithEXT = $request->file('versionfile')->getClientOriginalName();
            // get just the file name
            $filename = pathinfo($filenamewithEXT, PATHINFO_FILENAME);
            // get just the extention
            $extention = $request->file('versionfile')->getClientOriginalExtension();
            // file to store
            $fileNmaeToStore = $request['versionno'] . '.' . $extention;
            // upload file
            if (!(Storage::exists('public/KuwaitAlyoum/' . $filenamewithEXT))) {
                $path = Storage::move('public/files/' . $filenamewithEXT, 'public/KuwaitAlyoum/' . $fileNmaeToStore);

                $kwtoday = KuwaiToday::create([
                    'versionno' => $request['versionno'],
                    'versiontype' => $request['versiontype'],
                    'versiondate' => $request['versiondate'],
                    'versionfile' => $fileNmaeToStore,
                ]);

            } else {
                Session::put('notification', [
                    'message' => " خطأ العدد موجود بالفعل ",
                    'alert-type' => 'error',
                ]);
                return redirect()->back();
            }
        }
        Session::put('notification', [
            'message' => " خطأ العدد موجود بالفعل ",
            'alert-type' => 'success',
        ]);
        return redirect()->back();


    }
}
