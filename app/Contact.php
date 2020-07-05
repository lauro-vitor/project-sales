<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{   
    //
    protected $table = 'contacts';
    protected $fillable = [
        'id',
        'email',
        'phone'
    ];
    //ok
    private function responseContact($contact, $message, $httpCode){
        return([
            'contact' => $contact,
            'message' => $message,
            'httpCode' => $httpCode
        ]);
    }
    public function getAll() {
        return $this->responseContact($this->all(), 'OK',  201);
    }
    //ok
    public function getById($id){
        $contact = $this->find($id);
        if(isset($contact)) {
            return $this->responseContact($contact, 'Contato encontrado', 201);
        }
        return $this->responseContact(null, 'Contato não encontrado!', 500);
    }
    //ok
    public function createContact($contact) {
        $result = $this->create($contact);
        if(isset($result)){
            $contact = $this->find($result->id);
            return $this->responseContact($contact, 'Contato criado com sucesso', 201);
        }
        return $this->responseContact(null, 'não foi possível crirar contato', 500);
    }
    //ok
    public function updateContact($contact, $id) {
        $newContact = null;
        $oldContact= $this->find($id);
        $result = null;
        if(isset($oldContact)) {
            $result = $oldContact->update($contact);
            if($result) {
                $newContact = $this->find($id);
                return $this->responseContact($newContact, 'Contato alterado com sucesso', 201);
            }
        }
        return $this->responseContact(null, 'Ocorreu algum erro ao alterar o contato', 500);
    }
    //ok
    public function destroyContact($id) {
        $contact= $this->find($id);
        if(isset($contact)){
            $result = $contact->delete();
            if(isset($result)){
                return ['message' => 'Contato removido com sucesso','httpCode' =>201];
            }
        }
        return ['message' => 'Não foi possível remover o contato', 'httpCode' => 500];
    }   

}
