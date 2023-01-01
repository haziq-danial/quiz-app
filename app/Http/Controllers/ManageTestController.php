<?php

namespace App\Http\Controllers;

use App\Models\QuestionModel;
use Illuminate\Http\Request;

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
        dd($request);
    }
}
