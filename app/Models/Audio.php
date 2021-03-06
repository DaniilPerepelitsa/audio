<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    protected $table = 'audio';
    public $timestamps = false;

    protected $fillable = [
            'id',
            'title',
            'path',
            'duration',
            'duration_in_sec'
        ];

}
