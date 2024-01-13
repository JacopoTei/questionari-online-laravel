<?php

namespace App\Models;

use App\Models\Answer;
use App\Models\Survey;
use App\Models\SurveyResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    public $guarded = [];
    public function survey(){
        return $this->belongsTo(Survey::class);
    }

    public function answers()
    {
        return $this->HasMany(Answer::class);
    }

    public function responses(){
        return $this->hasMany(SurveyResponse::class);
    }
}
