<?php

namespace App\Models;

use App\Models\SurveyResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    public $guarded = [];
    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function responses(){
        return $this->hasMany(SurveyResponse::class);
    }
}
