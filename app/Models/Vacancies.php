<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancies extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'vacanciesbase';
    protected $attributes = [
        'teacher_watch' => "還沒審查",
    ];
    protected $guarded = [];
    
}
