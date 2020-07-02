<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cson extends Model
{
    protected $table = 'csons';
    public function getAll(){
        $csons = $this->all();
        if(isset($csons)) {
            return [$csons, 'httpCode' => 201];
        }
        return ['Não encontrado', 'httpCode' => 404];
    }
}
