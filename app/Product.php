<?php

namespace App;
use App\IDAO;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
    public function ncm()
    {
        return $this->belongsTo('App\Ncm', 'ncm_id');
    }
    public function aliquot()
    {
        return $this->belongsTo('App\Aliquot', 'aliquot_id');
    }
    public function cson() 
    {
        return $this->belongsTo('App\Cson', 'cson_id');
    }

    public function getAll()
    {
        $relations = ['category','ncm' ,'aliquot', 'cson'];
        return $this->with($relations)->get();
    }
    public function getById($id){
        $result = '';

        $product = $this->find($id);
        if(isset($product)){
            $result = [$product, 'httpCode' => 201];
            return $result;
        }
        $result = ['Produto não encontrado', 'httpCode' => 404];

        return $result;
    }
}
