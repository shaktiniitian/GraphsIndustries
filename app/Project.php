<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    
    public function category(){
        
        return $this->belongsTo('\App\Type');
    }
}
