<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'name', 'display_name', 'description'
    ];

    protected $hidden = [
        'pivot'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
