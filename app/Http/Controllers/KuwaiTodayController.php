<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KuwaiToday;
use Illuminate\Support\Facades\Storage;
use Session;

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
        dd($request->toArray());
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

        $kwtoday = new KuwaiToday();
        if (request()->hasFile('versionfile')) {
            // get the file name with extention
            $covernamewithEXT = $request->file('versionfile')->getClientOriginalName();
            // get just the file name
            $filename = pathinfo($covernamewithEXT, PATHINFO_FILENAME);
            // get just the extention
            $extention = $request->file('versionfile')->getClientOriginalExtension();
            // file to store
            $fileNmaeToStore = $kwtoday->versionno . '.' . $extention;
            // upload file
            if (!(Storage::exists('public/KuwaitAlyoum/' . $covernamewithEXT))) {
                $path = Storage::move('public/files/' . $covernamewithEXT, 'public/KuwaitAlyoum/' . $fileNmaeToStore);
                $kwtoday->versionno = $request->versionno;
                $kwtoday->versiontype = $request->versiontype;
                $kwtoday->versiondate = $request->versiondate;
                $kwtoday->versionfile = $fileNmaeToStore;
                $kwtoday->save();
            }

        }
        return redirect()->back();
    }
}
