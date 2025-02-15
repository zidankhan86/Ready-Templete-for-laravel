<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class properties extends Model
{
    use HasFactory;
    protected $fillable = [
        'before_image',
        'after_image',
        'title',
        'description'
    ];

}
