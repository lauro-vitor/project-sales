<?php

namespace App;
use App\IDAO;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
            'id',
            'description', 
            'unity', 
            'price',
            'reference',
            'category_id', 
            'ncm_id',
            'aliquot_id',
            'cson_id',
            'enterprise_id'
    ];
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
        $relations = ['category','ncm' ,'aliquot', 'cson'];
        $product = $this->with($relations)->find($id);
        if(isset($product)){
            $result = [$product, 'httpCode' => 201];
            return $result;
        }
        $result = ['Produto não encontrado', 'httpCode' => 404];

        return $result;
    }
    public function  createProduct($product){
        $relations = ['category','ncm' ,'aliquot', 'cson'];
        $result = $this->create($product);
        $product = $this->with($relations)->find($result->id);

        if(isset($result)) {
            return ['product' => $product, 'message' => 'Produto criado com sucesso', 'httpCode' => 201];
        }
        return ['product' => null, 'message' => 'Produto não foi criado', 'httpCode' => 500];
    }

    public function destroyProduct($id) {
        $product = $this->find($id);
        if(isset($product)) {
            $product->delete();
            return ['message' => 'Produto removido com sucesso!', 'httpCode' => 201];
        }
        return ['message' => 'Produto não encontrado', 'httpCode' => 500];
    }

    public function updateProduct($product, $id) {
        $newProduct = null;
        $oldProduct = $this->find($id);
        $result = null;
        if(isset($oldProduct)) {
            $result = $oldProduct->update($product);
            $newProduct = $this->getById($id)[0];
        }
        $response = (isset($result)) ? 
            ['product' => $newProduct, 'message' => 'Produto alterado com sucesso', 'httpCode' => 201] :
            ['product' => $newProduct, 'message' => 'Erro ao alterar produto', 'httpCode' => 500];
        return $response;
    }
}
