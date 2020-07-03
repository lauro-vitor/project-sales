<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ncm extends Model
{
    //
    protected $table = 'ncms';
    protected $fillable = [
        'id',
        'code',
        'name'
    ];
    public function  getAll(){
        $ncms = $this->all();
        if(isset($ncms)) {
            return [$ncms,'httpCode' => 201];
        }
        return ['NCMS não encontrado','httpCode' => 404];
    }
    public function createNcm($ncm) {
        $result = $this->create($ncm);
        if(isset($result)){
            $newNcm = $this->find($result->id);
            return([
                'ncm' => $newNcm,
                'message' => 'NCM adicionado com sucesso',
                'httpCode' => 201
            ]);
        }
        return([
            'ncm' => null,
            'message' => 'Error ao adicionar o NCM',
            'httpCode' => 500
        ]);
    }
}
