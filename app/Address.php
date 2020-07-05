<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = [
        'id',
        'street',
        'complement',
        'state',
        'city'
    ];
    //ok
    public function getAll() {
        return $this->responseAddress($this->all(), 'OK', 201);
    }
    //ok
    public function getById($id) {
        $address = $this->find($id);
        if(isset($address)) {
            return $this->responseAddress($address, 'OK', 201);
        }
        return $this->responseAddress(null, 'Não Existe', 500);
    }
    //ok
    public function createAddress($address){
        $newAddress = $this->create($address);
        if(isset($newAddress)) {
            return $this->responseAddress($newAddress, 'Endereço criado com sucesso', 201);
        }
        return $this->responseAddress(null, 'erro ao criar endereço', 500);
    }
    //ok
    public function updateAddress($address, $id){
        $oldAddress = $this->find($id);
        $updatedAddress = null;
        $result = null;
        if(isset($oldAddress)) {
            $result = $oldAddress->update($address);
            $updatedAddress = $this->find($id);
            if($result){
                return $this->responseAddress(
                    $updatedAddress, 
                    'Endereço atualizado com sucesso',
                    201
                );
            }
        }
        return $this->responseAddress(
            null,
            'Erro ao atualizar o endereço',
            500
        );
    }
    //ok
    public function destroyAddress($id) {
        $address = $this->find($id);
        if(isset($address)) {
            $result = $address->delete();
            if($result){
                return $this->responseAddress(null, 'Endereço removido com sucesso', 201);
            }
        }
        return $this->responseAddress(null, 'Erro ao excluir endereço', 500);
    }

    private function responseAddress($address, $message, $httpCode){
        return([
            'address' => $address,
            'message' => $message,
            'httpCode' => $httpCode
        ]);
    }
}
