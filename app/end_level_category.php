<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class end_level_category extends Model
{
    public function top_cat()
    {
        return $this->hasOne(top_level_category::class,'id','top_cat_id');
    }

    public function mid_cat()
    {
        return $this->hasOne(mid_level_category::class,'id','mid_cat_id');
    }
}
