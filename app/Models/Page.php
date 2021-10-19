<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'alias', 'title', 'subtitle', 'text', 'status', 'view', 'seo_id'
    ];

    protected $with = ['seo', 'image'];

    public function seo()
    {
        return $this->belongsTo(Seo::class)->withDefault([
            'st' => '',
            'sd' => '',
            'ogt' => '',
            'ogd' => ''
        ]);
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'ess_id', 'id')->where('type', 'page')->orderBy('id', 'desc')->withDefault([
            'original' => '/img/no-image.png',
            'lg' => '/img/no-image.png',
            'md' => '/img/no-image.png',
            'sm' => '/img/no-image.png',
            'xs' => '/img/no-image.png',
            'alt' => '',
        ]);
    }
}
