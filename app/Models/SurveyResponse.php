<?php

namespace App\Models;

use App\Models\Survey;
use App\Models\SurveyCompilation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyResponse extends Model
{
    protected $fillable = [
        'question_id',
        'survey_compilation_id',
        'answer_id',
    ];

    public function surveyCompilation(){
       return $this->belongTo(SurveyCompilation::class); 
    } 
}
