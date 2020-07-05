<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';

    protected $fillable = [
        'id',
        'name',
        'fantasy_name',
        'cnpj',
        'type_provider_id',
        'contact_id',
        'address_id',
        'enterprise_id'
    ];

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }
    public function typeProvider()
    {
        return $this->belongsTo('App\TypeProvider');
    }
    public function address()
    {
        return $this->belongsTo('App\Address');
    }
    public function enterprise()
    {
        return $this->belongsTo('App\Enterprise');
    }

    protected $relations = ['contact', 'typeProvider', 'address', 'enterprise'];
    //ok
    public function getAll() {
        $providers = $this->with($this->relations)->get();
        if(sizeof($providers) > 0){
            return([
                'providers' => $providers,
                'message' => 'Fornecedores encontrado com sucesso!',
                'httpCode' => 201
            ]);
        }
        return([
            'providers' => null,
            'message' => 'Não possui nehum cadastro de fornecedores realizado ',
            'httpCode' => 501
        ]);
    }
    //ok
    public function getById($id) {
        $provider = $this->with($this->relations)->find($id);
        if(isset($provider)) {
            return $this->responseProvider($provider,'Fornecedor encontrado com sucesso!',201);
        }
        return $this->responseProvider(null,'Fornecedor não localizado!', 500);
    }
    //ok
    public function createProvider($provider) {
        $auxProvider = $this->create($provider);
        $newProvider = null;
        if(isset($auxProvider)){
            $newProvider = $this->getById($auxProvider->id);
            return $this->responseProvider($newProvider,'Cadastro de fornecedor realizado com sucesso!', 201);
        }
        return $this->responseProvider(null, 'Não foi possível realizar cadastro de fornecedor', 500);
    }
    //ok
    public function updateProvider($provider, $id) {
        $newProvider = null;
        $oldProvider = $this->find($id);
        $result = false;
        if(isset($provider)){
            $result = $oldProvider->update($provider);
            if($result) {
                $newProvider = $this->getById($id);
                if(isset($newProvider)) {
                    return $this->responseProvider(
                        $newProvider,
                        'Fornecedor atualizado com sucesso!',
                        201
                    );
                }
            }
        }
        return $this->responseProvider(null, 'Não foi possível atualizar fornecedor',500);   
    }
    //ok
    public function destroyProvider($id) {
        $provider = $this->find($id);
        $result = false;
        if(isset($provider)){
            $result = $provider->delete();
            if($result) {
                return $this->responseProvider(null,'Fornecedor removido com sucesso!', 201);
            }
        }
        return $this->responseProvider(null, 'Não foi possível remover o fornecedor!', 500);
    }
    //ok
    private function responseProvider($provider, $message, $httpCode) {
        return([
            'provider' => $provider,
            'message' => $message,
            'httpCode' => $httpCode
        ]);
    }
}
