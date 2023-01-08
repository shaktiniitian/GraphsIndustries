<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //

    public function gallries(){
        return $this->hasMany('\App\Gallery')->whereNull('type');
    }

    public function brochures(){
        return $this->hasMany('\App\Gallery')->where('type','brochure');
    }  
      public function maps(){
        return $this->hasMany('\App\Gallery')->where('type','map');
    }
    
          public function category(){
        return $this->belongsTo('\App\Type','type');
    }
    
        public function gallery(){
        
        return $this->hasMany('\App\ProjectGallery', 'project_id');
    }
    
}
