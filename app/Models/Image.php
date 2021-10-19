<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'ess_id', 'original', 'lg', 'md', 'sm', 'xs', 'alt'
    ];
}
