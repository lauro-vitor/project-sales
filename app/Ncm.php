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
    public function  getById($id) {
        $ncm = $this->find($id);
        if(isset($ncm)) {
            return([
                'ncm' => $ncm,
                'message' => 'ncm encontrado com sucesso',
                'httpCode' => 201
            ]);
        }
        return([
            'ncm' => null,
            'message' => 'ncm não encontrado!',
            'httpCode' => 500
        ]);
    }
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
    public function updateNcm($ncm, $id) {
        $newNcm = null;
        $oldNcm = $this->find($id);
        if(isset($oldNcm)) {
            $result = $oldNcm->update($ncm);
            if($result) {
                $newNcm = $this->find($id);
                return([
                    'ncm' => $newNcm,
                    'message' => 'NCM alterado com sucesso!',
                    'httpCode' => 201
                ]);
            }
        }
        return([
            'ncm' => null,
            'message' => 'Não foi possível alterar o NCM',
            'httpCode' => 500
        ]);
    }
    public function destroyNcm($id) {
        $ncm = $this->find($id);
        if(isset($ncm)) {
            $ncm->delete();
            return([
                'message' => 'Produto removido com sucesso',
                'httpCode' => 201
            ]);
        } 
        return([
            'message' => 'Não foi possível remover o produto',
            'httpCode' => 500
        ]);
    }
}
