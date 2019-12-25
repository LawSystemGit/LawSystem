<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LawArticl;

class lawfrontController extends Controller
{
    public function show(LawArticl $articleID)
    {
        return view('frontEnd.showArticle', compact('articleID'));
    }

    public function relatedJudgments(LawArticl $articleID)
    {
        return view('frontEnd.relatedJudgments', compact('articleID'));
    }
}
