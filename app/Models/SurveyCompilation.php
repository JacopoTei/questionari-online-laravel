<?php

namespace App\Models;

use App\Models\SurveyResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyCompilation extends Model
{
    public $guarded = [];
    
    use HasFactory;
    public function survey(){
        return $this->belongsTo(Survey::class);
    }

    public function responses(){
        return $this->hasMany(SurveyResponse::class);
    }
}
