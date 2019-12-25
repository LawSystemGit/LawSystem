<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\judgmentNotes;
use App\judgments;
class JudgmentNotesController extends Controller
{

    public function addNote(Request $request, $judgmentID)
    {
        $judgment = judgments::find($judgmentID);
        return view('judgments.addNoteTojudgment', compact(['judgment']));
    }

    public function store(Request $request, judgments $judgmentID)
    {
        if ($judgmentID->incompletednotes != 0) {
            $request->validate([
                'judgment_id' => 'required',
                'judgrule' => 'required',
                'judgshort' => 'required',
                'lawarticles' => 'required',
            ], [
                'judgrule.required' => 'مطلوب إدخال المبدأ ',
                'judgshort.required' => 'مطلوب إدخال الموجز ',
                'lawarticles.required' => 'مطلوب إدخال المواد المرتبطة بهذا الحكم ',
            ]);
            $judgmentnotes = judgmentNotes::create([
                'judgment_id' => $request['judgment_id'],
                'judgrule' => $request['judgrule'],
                'judgshort' => $request['judgshort'],
            ]);
            $judgmentID->Articls()->attach($request['lawarticles']);
            if ($judgmentnotes) {
                $judgmentID->incompletednotes += -1;
                $judgmentID->save();
                return response()->json([
                    'message' => "تم الإضافة بنجاح  ",
                    "status" => 200
                ]);
            } else {
                return response()->json([
                    'message' => "خطأ قد يكون المبدأ والموجز موجودين بالفعل",
                    "status" => 422
                ]);
            }
        } else {
            return response()->json([
                'message' => "هذا الحكم مكتمل",
                "status" => 422
            ]);
        }

    }

    public function showNotes(Request $request, judgments $judgmentID)
    {
        return view('judgments.showNotes', compact('judgmentID'));
    }


}
