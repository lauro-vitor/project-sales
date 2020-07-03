<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aliquot extends Model
{
    //
    protected $table = 'aliquots';
    protected $fillable = [
        'id',
        'state',
        'value'
    ];
    public function getAll(){
        $aliquots = $this->all();
        if(isset($aliquots)){
            return ['aliquots' => $aliquots, 'message'  => '', 'httpCode' => 201];
        }
        return ['aliquots' => null,'message' => 'Não encontrado', 'httpCode' => 404];
    }
    public function getById($id){
        $aliquot = $this->find($id);
        if(isset($aliquot)){
            return([
                'aliquot' => $aliquot,
                'message' => 'Alíquota encontrada com sucesso!',
                'httpCode' => 201
            ]);
        }
        return([
            'aliquot' => null,
            'message' => 'Alíquota não encontrada!',
            'httpCode' => 500
        ]);
    }
    public function createAliquot($aliquot)  {
        $result = $this->create($aliquot);
        if(isset($result)) {
            $newAliquot = $this->find($result->id);
            return([
                'aliquot' => $newAliquot,
                'message' => 'Alíquota adicionada com sucesso!',
                'httpCode' => 201
            ]);
        }
        return([
            'aliquot' => null,
            'message' => 'Error ao adicionar a alíquota',
            'httpCode' => 500
        ]);
    }
    public function  updateAliquot($aliquot, $id) {
        $newAliquot = null;
        $oldAliquot = $this->find($id);
        if(isset($oldAliquot)) {
            $result = $oldAliquot->update($aliquot);
            if($result) {
                $newAliquot = $this->find($id);
                return([
                    'aliquot' => $newAliquot,
                    'message'=> 'Alíquota alterada com sucesso!',
                    'httpCode' => 201
                ]);
            }
        }
        return([
            'aliquot' => null,
            'message'=> 'Não foi possível alterar a alíquota',
            'httpCode' => 500
        ]);
    }
    public function destroyAliquot($id) {
        $aliquot = $this->find($id);
        if(isset($aliquot)) {
            $aliquot->delete();
            return([
                'message' => 'Alíquota removida com sucesso',
                'httpCode' => 201
            ]);
        }
        return([
            'message' => 'Não foi possível remover a alíquota',
            'httpCode' => 500
        ]);
    }
}
