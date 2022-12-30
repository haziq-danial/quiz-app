<?php

namespace App\Http\Controllers;

use App\Models\QuestionModel;
use Illuminate\Http\Request;

class QuestionModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $questionModel = QuestionModel::get();
        $count = 0;

        return view('ManageQuestion.index' ,['questions' => $questionModel, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(Request $request)
    {
        $questionModel = new QuestionModel;

        $questionModel->question = $request->question;
        $questionModel->type = $request->type;

        $questionModel->save();

        return redirect()->route('manage-questions.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $QuestionID
     *
     */
    public function edit(int $QuestionID)
    {
        $questionModel = QuestionModel::where('QuestionID', $QuestionID)->first();

        return view('ManageQuestion.edit', ['question' => $questionModel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $QuestionID
     *
     */
    public function update(Request $request, int $QuestionID)
    {
        $questionModel = QuestionModel::find($QuestionID);

        $questionModel->question = $request->question;
        $questionModel->type = $request->type;

        $questionModel->save();

        return redirect()->route('manage-questions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $QuestionID
     *
     */
    public function destroy(int $QuestionID)
    {
        QuestionModel::destroy($QuestionID);

        return redirect()->route('manage-questions.index');
    }
}
