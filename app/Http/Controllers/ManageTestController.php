<?php

namespace App\Http\Controllers;

use App\Models\QuestionModel;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageTestController extends Controller
{
    public function index()
    {
        return view('ManageTest.index');
    }

    public function startTest()
    {
        $questionModel = QuestionModel::get();
        $count = 0;
        $row = 0;

        return view('ManageTest.questions', ['questions' => $questionModel, 'count' => $count]);
    }

    public function submitAnswer(Request $request)
    {
        $depression_scale = $request->depression_scale;
        $anxiety_scale = $request->anxiety_scale;
        $stress_scale = $request->stress_scale;

        $depression_total = 0;
        $anxiety_total = 0;
        $stress_total = 0;

        foreach ($depression_scale as $d_scale) {
            $depression_total = $depression_total + $d_scale;
        }

        foreach ($anxiety_scale as $a_scale) {
            $anxiety_total = $anxiety_total + $a_scale;
        }

        foreach ($stress_scale as $s_scale) {
            $stress_total = $stress_total + $s_scale;
        }

        $depression_total = $depression_total*2;
        $anxiety_total = $anxiety_total*2;
        $stress_total = $stress_total*2;

        $resultModel = Result::create([
            'StudentID' => Auth::id(),
            'depression_scale' => $depression_total,
            'anxiety_scale' => $anxiety_total,
            'stress_scale' => $stress_total
        ]);

        return redirect()->route('manage-tests.start-test');
    }
}
