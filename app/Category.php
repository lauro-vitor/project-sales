<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   protected $table = 'categories';
    //
    public function getAll(){
        $categories = $this->all();
        if(isset($categories)){
            return [$categories,'httpCode' => 201];
        }
        return ['Categorias não encontradas', 'httpCode' => 404];
    }
}
