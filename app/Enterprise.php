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

    public function getAll() {
        return([
            'enterprises' => $this->with($this->relations)->get(),
            'message' => 'Empresas retornada com sucesso!',
            'httpCode' =>201]);
    }
    public function getById($id){
        $enterprise = $this->with($this->relations)->find($id);
        if(isset($enterprise)) {
            return([
                'enterprise'  => $enterprise,
                'message' => 'Empresa encotrada!',
                'httpCode' => 201
            ]);
        }
        return([
            'enterprise'  => null,
            'message' => 'Empresa não encotrada!',
            'httpCode' => 500
        ]);
    }
    public function createEnterprise(){

    }
    public function updateEnterprise(){

    }
    public function removeEnterprise() {

    }
}
