<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $table = 'currencies';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ApiId','Name','NumCode','CharCode','Nominal','Value','Date'
    ];
    protected $casts = [
        'Date' => 'date',
    ];
}
