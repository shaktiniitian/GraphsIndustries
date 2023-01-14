<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

        public function galleries()
        {
            return $this->hasMany(ProductGallery::class);
    }
}
