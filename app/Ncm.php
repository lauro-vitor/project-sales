<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ncm extends Model
{
    //
    protected $table = 'ncms';

    public function  getAll(){
        $ncms = $this->all();
        if(isset($ncms)) {
            return [$ncms,'httpCode' => 201];
        }
        return ['NCMS não encontrado','httpCode' => 404];
    }
}
