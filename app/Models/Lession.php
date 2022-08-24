<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lession extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'name',
        'chapter',
        'duration',
        'file',
        'video_url',
        'final_examid',
    ];
}
