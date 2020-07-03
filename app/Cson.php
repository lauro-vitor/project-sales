<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cson extends Model
{
    protected $table = 'csons';
    protected $fillable = [
        'id',
        'description', 
        'code'
    ];
    public function getAll(){
        $csons = $this->all();
        if(isset($csons)) {
            return ([
                'csons' => $csons,
                'message' => 'CSONS retornado com sucesso!', 
                'httpCode' => 201
            ]);
        }
        return ([
            'csons' => null,
            'message' => 'CSON não retornado!', 
            'httpCode' => 500
        ]);
    }
    public function getById($id){
        $cson = $this->find($id);
        if(isset($cson) ) {
            return([
                'cson' => $cson,
                'message' => 'ceson encontrado !',
                'httpCode' => 201
            ]);
        }
        return([
            'cson' => null,
            'message' => 'ceson não encontrado !',
            'httpCode' => 500
        ]);
    }
    public function createCson($cson){
        $result = $this->create($cson);
        if(isset($result)) {
            $newCson =  $this->find($result->id);
            return([
                'cson' => $newCson,
                'message' => 'CSON criado com suceso!',
                'httpCode' => 201
            ]);
        }
        return([
            'cson' => null,
            'message' => 'Erro ao criar CSON!',
            'httpCode' => 500
        ]);
    }
    public function updateCson($cson, $id) {
        $newCson = null;
        $oldCson = $this->find($id);
        if(isset($oldCson)) {
            $result = $oldCson->update($cson);
            if($result) {
                $newCson = $this->find($id);
                return ([
                    'cson' => $newCson,
                    'message' => 'CSON atualizado com sucesso',
                    'httpCode' => 201
                ]);
            }
        }
        return ([
            'cson' => null,
            'message' => 'CSON não atualizado!',
            'httpCode' => 500
        ]);
    }
    public function destroyCson($id) {
        $cson = $this->find($id);
        if(isset($cson)) {
            $cson->delete();
            return([
                'message' => 'CSON removido com sucesso!', 
                'httpCode' => 201
            ]);
        }
        return([
            'message' => 'Ocorreu algum erro ao remover categoria',
            'httpCode' => 500
        ]);
    }
}
