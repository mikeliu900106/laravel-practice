<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPair extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'historypairbase';
    protected $guarded = [];
}
