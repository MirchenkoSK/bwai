<?php

namespace App\Helpers;

use App\Models\Image;
use Carbon\Carbon;
use Image as InterventionImage;

class ImageBuilder
{
    private $image;
    private $file;

    private function checkDir()
    {
        $date = Carbon::today();
        $dir = 'uploads/' . $date->year . '/' . $date->month . '/';
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }
        return $dir;
    }

    private function getImageName()
    {
        $data = [
            'Q','q','W','w','E','e',
            'R','r','T','t','Y','y',
            'U','u','I','i','O','o',
            'P','p','A','a','S','s',
            'D','d','F','f','G','g',
            'H','h','J','j','K','k',
            'L','l','Z','z','X','x',
            'C','c','V','v','B','b',
            'N','n','M','m','1','2',
            '3','4','5','6','8','9',
        ];
        $num = 9;
        $name = '';
        for ($i=0; $i < $num; $i++) { 
            $r = rand(0, 59);
            $name .= $data[$r];
        }
        return $this->checkDir() . $name . '.jpg';
    }

    private function create()
    {
        $this->image->original = $this->build();
        $this->image->lg = $this->build(1080);
        $this->image->md = $this->build(600);
        $this->image->sm = $this->build(400);
        $this->image->xs = $this->build(200);
    }

    private function build($size = null)
    {
        if (null != $size) {
            $this->file->widen($size);
        }
        $fileName = $this->getImageName();
        $this->file->save($fileName, 85, 'jpg');
        return '/'.$fileName;
    }

    public function fire($file, $type, $id, $alt)
    {
        $this->image = new Image();
        $this->image->type = $type;
        $this->image->ess_id = $id;
        $this->image->alt = $alt;
        $this->file = InterventionImage::make($file);
        $this->create();
        return $this->image->save() ? true : false;
    }
}