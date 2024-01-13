<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['take', 'takeStore']);
    }

    public function create()
    {
        return view('survey.create');

        
    }

    public function show(Survey $survey)
    {
        return view('survey.show', compact ('survey'));
    }

    public function store()
    {
       $data = request()->validate([
        'title' => 'required',
        'description' => 'required'

       ]);

       $survey= auth()->user()->surveys()->create($data);

       return redirect('/survey/' .$survey->id);
    }

    public function take(Survey $survey, $slug){
         return view('survey.take', compact('survey'));
    }

    public function takeStore(Survey $survey){

        if ($survey->questions->isEmpty()) {
            return redirect()->back()->with('error', 'Impossibile pubblicare il sondaggio senza domande.');
        }

        $data = request()->validate([
            'info.name' => 'required',
            'info.email' => 'required',
            'responses.*.question_id' => 'required',
            'responses.*.answer_id' => 'required'
        ]);
        
        $surveyCompilation = $survey->surveyCompilation()->create($data['info']);
        $surveyCompilation->responses()->createMany($data['responses']);
        return view('survey.thank-you');
   }

   public function deleteQuestions(Survey $survey)
{
    foreach ($survey->questions as $question) {
        // Elimina le risposte al sondaggio collegate alla domanda
        $question->responses()->delete();
        
        // Elimina le risposte (answers) collegate alla domanda
        $question->answers()->delete();
        
        // Elimina la domanda stessa
        $question->delete();
    }

    return redirect()->route('home')->with('success', 'Domande del sondaggio cancellate con successo');
}



}
