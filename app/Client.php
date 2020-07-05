<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
    
class Client extends Model
{  
    protected $table = 'clients';
    protected $fillable = [
        'id',
        'name',
        'cnpj',
        'register_state',
        'address_id'
    ];
    public function address()
    {
        return $this->belongsTo('App\Address');
    }
    //ok
    public function getAll() {
        $clients = $this->with('address')->get();
        if(sizeof($clients) > 0){
            return([
                'clients' => $clients,
                'message' => 'success',
                'httpCode' => 201
            ]);
        }
        return([
            'clients' => null,
            'message' => 'error',
            'httpCode' => 500
        ]);
    }
    //ok
    public function getById($id) {
        $client = $this->with('address')->find($id);
        if(isset($client)) {
            return $this->responseClient($client,'Cliente encontrado com sucesso!', 201);
        }
        return $this->responseClient(null, 'Não foi possível localizar o cliente', 500);
    }
    //ok
    public function createClient($client) {
        $auxClient = $this->create($client);
        $newClient = null;
        if(isset($auxClient)){
            $newClient = $this->with('address')->find($auxClient->id);
            if(isset($newClient)) {
                return $this->responseClient($newClient, 'Cliente cadastrado com sucesso!', 201);
            }
        }
        return $this->responseClient(null, 'Não foi possível cadastrar o cliente', 500);
    }
    //ok
    public function updateClient($client, $id) {
        $newClient = null;
        $oldClient = $this->find($id);
        $result = false;
        if(isset($oldClient)) {
            $result = $oldClient->update($client);
            if($result){
                $newClient = $this->with('address')->find($id);
                if(isset($newClient)) {
                    return $this->responseClient($newClient,'Cliente atualizado com sucesso!', 201);
                }
            }
        }
        return $this->responseClient(null, 'Não foi possível atualizar o cliente', 500);
    }
    //ok 
    public function destroyClient($id) {
        $clientToDelete = $this->find($id);
        $result = false;
        if(isset($clientToDelete)) {
            $result = $clientToDelete->delete();
            if($result) {
                return $this->responseClient(null, 'Cliente removido com sucesso!', 201);
            }
        }
        return $this->responseClient(null, 'Não foi possível remover o cliente', 500);
    }

    private function responseClient($client, $message, $httpCode){
        return([
            'client' => $client,
            'message' => $message,
            'httpCode' => $httpCode
        ]);
    }
}
