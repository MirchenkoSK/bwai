<?php

namespace App\Helpers;

use App\Models\Seo;

class SeoBuilder
{
    public function fire($data, $id = null)
    {
        if (null === $id) {
            $seo = Seo::create($data);
        } else {
            if (!$seo = Seo::find($id)) {
                return null;
            }
            $seo->fill($data);
            $seo->save();
        }
        return $seo->id;
    }
}