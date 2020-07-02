<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aliquot extends Model
{
    //
    protected $table = 'aliquots';
    public function getAll(){
        $aliquots = $this->all();
        if(isset($aliquots)){
            return [$aliquots, 'httpCode' => 201];
        }
        return ['Não encontrado', 'httpCode' => 404];
    }
}
