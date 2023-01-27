<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = ['title', 'desc', 'img', 'aproved'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function question(){
        return $this->belongsTo('App\Question');
    }
}
