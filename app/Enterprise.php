<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    protected $table = 'enterprises';
    protected $fillable = [
        'id',
        'name',
        'fantasy_name',
        'cnpj',
        'register_state',
        'contact_id',
        'address_id'
    ];
    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }
    public function address()
    {
        return $this->belongsTo('App\Address');
    }
    protected $relations = ['contact', 'address'];
    private function responseEnterprise($enterprises, $message, $httpCode){
        return([
            'enterprises' => $enterprises,
            'message' => $message,
            'httpCode' => $httpCode
        ]);
    }
    //ok
    public function getAll() {
        $enterprises =  $this->with($this->relations)->get();
        return $this->responseEnterprise($enterprises, 'Empresas retornada com sucesso!', 201);
    }
    //ok
    public function getById($id) {
        $enterprise = $this->with($this->relations)->find($id);
        if(isset($enterprise)) {
           return $enterprise;
        }
        return null;
    }
    //ok
    public function createEnterprise($enterprise) {
        $auxEnterprise = $this->create($enterprise);
        $newEnterprise = null;
        if(isset($auxEnterprise)) {
            $newEnterprise = $this->getById($auxEnterprise->id);
            return $this->responseEnterprise($newEnterprise,'Empresa inserida com sucesso', 201);
        }
        return $this->responseEnterprise(null, 'Não foi possível inserir a empresa', 500);
    }
    //
    public function updateEnterprise($enterprise, $id){
        $updatedEnterprise = null;
        $oldEnterprise = $this->find($id);
        $result = null;
        if(isset($oldEnterprise)) {
            $result = $oldEnterprise->update($enterprise);
            if($result) {
                $updatedEnterprise = $this->find($id);
                if(isset($updatedEnterprise)) {
                    return $this->responseEnterprise(
                        $updatedEnterprise,
                        'Empresa alterada com sucesso!',
                        201 
                    );
                }
            }
        }
        return $this->responseEnterprise(null, 'Erro ao editar empresa', 500);
    }
    public function destroyEnterprise($id) {
        $enterpriseToDelete = $this->find($id);
        $result = null;
        if(isset($enterpriseToDelete)) {
            $result = $enterpriseToDelete->delete();
            if($result){
                return $this->responseEnterprise(null, 'Empresa removida com sucesso', 201);
            }
        }
        return $this->responseEnterprise(null, 'Erro ao remover empresa', 500);
    }
}
