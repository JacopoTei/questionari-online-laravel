<?php

namespace App\Models;

use App\Models\User;
use App\Models\Question;
use App\Models\SurveyCompilation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Survey extends Model
{
    public $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->HasMany(Question::class);
    }

    public function surveyCompilation(){
        return $this->hasMany(SurveyCompilation::class);
    }
}
