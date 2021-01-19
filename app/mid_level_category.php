<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mid_level_category extends Model
{
    public function top_cat()
    {
        return $this->hasOne(top_level_category::class,'id','top_cat_id');
    }
}
