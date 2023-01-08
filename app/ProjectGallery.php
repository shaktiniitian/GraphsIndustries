<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectGallery extends Model
{
    //
    
    public function project(){
        
        return $this->belongsTo('\App\Page','project_id');
    }

}
