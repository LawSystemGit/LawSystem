<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KuwaiToday;
use Storage;
use App\LawArticl;
use Session;
use Redirect, Response, DB, Config;
use Datatables;

class KuwaiTodayController extends Controller
{
    public function index()
    {
        return "index";
    }

    public function create($lastVersion = null)
    {
        $files = KuwaiTodayController::readDirectory('/public/KuwaitAlyoum_unfinished/');
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
                'versionFile' => 'required',
            ], [  // change the default english error validation messages with arabic ones
                'versionNo.required' => 'مطلوب إدخال رقم العدد',
                'versionNo.unique' => 'ملف هذا العدد موجود بالفعل',
                'versionType.required' => 'مطلوب إخال نوع العدد',
                'versionDate.required' => 'مطلوب إدخال تاريخ العدد',
                'versionFile.required' => 'مطلوب إدخال مستند العدد ',
            ]);

        if (!(Storage::exists('public/KuwaitAlyoum_finished/' . $request->versionFile))) {
            $fileToSave = ($request->versionNo) . '.' . 'pdf';
            $path = Storage::move(('/public/KuwaitAlyoum_unfinished/' . $request->versionFile), ('public/KuwaitAlyoum_finished/' . $fileToSave));
            $kwAluom = KuwaiToday::create([
                'versionno' => $request->versionNo,
                'versiontype' => $request->versionType,
                'versiondate' => $request->versionDate,
                'versionfile' => $fileToSave,
            ]);

            if ($kwAluom) {
                Session::put('notification', [
                    'message' => " تم إضافة العدد بنجاح ",
                    'alert-type' => 'success',
                ]);
                return back();
            }
        } else {
            Session::put('notification', [
                'message' => " خطأ العدد موجود بالفعل ",
                'alert-type' => 'error',
            ]);
            return back();
        }


    }


    public static function readDirectory($directory)
    {
        $files = array_filter(Storage::disk('local')->files($directory),
            function ($item) {
                return strpos($item, 'pdf');
            });
        $realfilesName = [];
        foreach ($files as $file) {
            $data = explode("/", $file);
            $realfilesName [] = $data[2];
        }

        return $realfilesName;
    }
}
