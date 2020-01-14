<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KuwaiToday;
use Illuminate\Support\Facades\Storage;
use Session;
use App\fileHandling;

class KuwaiTodayController extends Controller
{
    public function index()
    {
        return view('kuwaiToday.index');
    }

    public function KuwaitAlyoumList()
    {
        $versions = KuwaiToday::all();
        return datatables()->of($versions)->make(true);
    }

    public function create($lastVersion = null)
    {
        $files = fileHandling::readDirectory('/public/KuwaitAlyoum_unfinished/');
        if ($lastVersion) {
            $lastVersion = KuwaiToday::find($lastVersion);
        }
        return view('kuwaiToday.create', compact(['files'], 'lastVersion'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'versionNo' => 'required|unique:kuwai_todays',
                'versionType' => 'required',
                'versionDate' => 'required',
                'versionFile' => 'required|unique:kuwai_todays',
            ], [  // change the default english error validation messages with arabic ones
                'versionNo.required' => 'مطلوب إدخال رقم العدد',
                'versionNo.unique' => 'رقم هذا العدد موجود بالفعل',
                'versionType.required' => 'مطلوب إخال نوع العدد',
                'versionDate.required' => 'مطلوب إدخال تاريخ العدد',
                'versionFile.required' => 'مطلوب إدخال مستند العدد ',
                'versionFile.unique' => 'مستند العدد موجود بالفعل',
            ]);
        $fileToSave = ($request->versionNo) . '.' . 'pdf';
        if (!fileHandling::checkForFile('public/KuwaitAlyoum_finished/', $fileToSave)) {
            $path = Storage::move(('/public/KuwaitAlyoum_unfinished/' . $request->versionFile), ('public/KuwaitAlyoum_finished/' . $fileToSave));
            $lastVersion = KuwaiToday::create([
                'versionno' => $request->versionNo,
                'versiontype' => $request->versionType,
                'versiondate' => $request->versionDate,
                'versionfile' => $fileToSave,
            ]);
            if ($lastVersion) {
                Session::put('notification', [
                    'message' => " تم إضافة العدد بنجاح ",
                    'alert-type' => 'success',
                ]);
                return redirect()->route('addVersion', ['lastVersion' => $lastVersion]);
            }
        } else {
            Session::put('notification', [
                'message' => " خطأ العدد موجود بالفعل ",
                'alert-type' => 'error',
            ]);
            return back();
        }
    }

    public function show(KuwaiToday $version)
    {
        return view('kuwaiToday.showVersion', compact(['version']));
    }
     public function edit(KuwaiToday $versionID)
    {
        return view('kuwaiToday.edit', compact(['versionID']));
    }

    public function update(Request $request, KuwaiToday $version)
    {
        $this->validate($request,
            [
                'versionNo' => 'required',
                'versionType' => 'required',
                'versionDate' => 'required',
            ], [  // change the default english error validation messages with arabic ones
                'versionNo.required' => 'مطلوب إدخال رقم العدد',
                'versionType.required' => 'مطلوب إخال نوع العدد',
                'versionDate.required' => 'مطلوب إدخال تاريخ العدد',
            ]);
        $version->versionno = $request->versionNo;
        $version->versiontype = $request->versionType;
        $version->versiondate = $request->versionDate;
        $path = fileHandling::fileRename('/public/KuwaitAlyoum_finished/', $version->versionfile, $request->versionNo . '.' . 'pdf');
        $version->save();
        if ($version) {
            Session::put('notification', [
                'message' => " تم تعديل العدد بنجاح ",
                'alert-type' => 'success',
            ]);
            return redirect()->route('showVersion', ['version' => $version]);
        }
    }

    public function updateLastInput(KuwaiToday $lastVersion)
    {
        return view('kuwaiToday.updateLastInput', compact('lastVersion'));
    }

    public function saveLastInput(Request $request, KuwaiToday $lastVersion)
    {
        $this->validate($request,
            [
                'versionNo' => 'required',
                'versionType' => 'required',
                'versionDate' => 'required',
            ], [  // change the default english error validation messages with arabic ones
                'versionNo.required' => 'مطلوب إدخال رقم العدد',
                'versionType.required' => 'مطلوب إخال نوع العدد',
                'versionDate.required' => 'مطلوب إدخال تاريخ العدد',
            ]);
        $updatedFilename = ($request->versionNo . '.' . 'pdf');
        if ($request->versionNo != $lastVersion->versionno) {
            $path = fileHandling::fileRename('/public/KuwaitAlyoum_finished/', $lastVersion->versionfile, $updatedFilename);
            $lastVersion->versionfile = $updatedFilename;
        }
        $lastVersion->versionno = $request->versionNo;
        $lastVersion->versiontype = $request->versionType;
        $lastVersion->versiondate = $request->versionDate;
        $lastVersion->save();
        Session::put('notification', [
            'message' => " تم تعديل العدد بنجاح ",
            'alert-type' => 'success',
        ]);
        return redirect()->route('addVersion', ['lastVersion' => $lastVersion]);
    }


}
