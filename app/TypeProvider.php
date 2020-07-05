<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProvider extends Model
{   
    protected $table = 'type_providers';
    protected $fillable = ['id', 'description'];

    public function createTypeProvider($typeProvider) {
       $newProvider = $this->create($typeProvider);
       if(isset($newProvider)){
            return $this->responseTypeProvider($newProvider, 'Tipo de fornecedor adicionado com sucesso!', 201);
       }
       return $this->responseTypeProvider(
           null, 
           'Não foi possível relizar tipo de cadastro', 
           500
        );
    }
    public function getById($id) {
        $typeProvider = $this->find($id);
        if(isset($typeProvider)) {
            return $this->responseTypeProvider($typeProvider, 'Encontrado com sucesso!', 201);
        }
        return $this->responseTypeProvider(null, 'Tipo de fornecedor não encontrado', 500);
    }
    public function getAll() {
        $typesProviders = $this->all();
        if(isset($typesProviders)){
            return([
                'typesProviders' => $typesProviders,
                'message' => 'Encontrado com sucesso!',
                'httpCode' => 201
            ]);
        }
        return([
            'typesProviders' => null,
            'message' => 'Não foi encontrado nehum tipo de fornecedor!',
            'httpCode' => 500
        ]);
    }
    public function updateTypeProvider($typeProvider, $id) {
        $newTypeProvider = null;
        $oldTypeProvider = $this->find($id);
        $result = null;
        if(isset($oldTypeProvider)){
            $result = $oldTypeProvider->update($typeProvider);
            if($result) {
                $newTypeProvider = $this->find($id);
                if(isset($newTypeProvider)){
                    return $this->responseTypeProvider(
                        $newTypeProvider, 
                        'Tipo de fornecedor atualizado com sucesso!',
                        201
                    );
                }
            }
        }
        return $this->responseTypeProvider(null,'Erro ao atualizar o tipo de fornecedor', 500);
    }
    public function destroyTypeProvider($id) {
        $typeProvider = $this->find($id);
        $result = $typeProvider->delete();
        if($result) {
            return([
                'message' => 'Tipo de fornecedor excluido com suceso!',
                'httpCode' => 201
            ]);
        }
        return([
            'message' => 'Não foi possível excluir tipo de forncedor!',
            'httpCode' => 500
        ]);
    }
    public function responseTypeProvider($typeProvider, $message, $httpCode) {
        return([
            'typeProvider' => $typeProvider,
            'message' => $message,
            'httpCode' => $httpCode
        ]);
    }
}   
