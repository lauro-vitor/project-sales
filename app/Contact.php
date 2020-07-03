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
    public function responseContact($contact, $message, $httpCode){
        return([
            'contact' => $contact,
            'message' => $message,
            'httpCode' => $httpCode
        ]);
    }
    
    public function getById($id){
        $contact = $this->find($id);
        if(isset($contact)) {
            return responseContact($contact, 'Contato encontrado', 201);
        }
        return responseContact(null, 'Contato não encontrado!', 500);
    }
    public function createContact($contact) {
        $result = $this->create($contact);
        if(isset($result)){
            $contact = $this->find($result->id);
            return responseContact($contact, 'Contato criado com sucesso', 201);
        }
        return responseContact(null, 'não foi possível crirar contato', 500);
    }
    public function updateContact($contact, $id) {
        $newContact = null;
        $oldContact = $this->find($id);
        $result = null;
        if(isset($oldContact)){
            $result = $oldContact->update($contact);
            if(isset($result)) {
                $newContact = $this->find($id);
                return responseContact($newContact, 'Contato atualizado com sucesso',201);
            }
        }
        return responseContact(null, 'Ocorreu algum erro ao atualizar o contato',500);
    }

    public function destroyContact($id) {
        $contact= $this->find(id);
        if(isset($contact)){
            $result = $contact->delete();
            if(isset($result)){
                return ['message' => 'Contato removido com sucesso','httpCode' =>201];
            }
        }
        return ['message' => 'Não foi possível remover o contato', 'httpCode' => 500];
    }   

}
