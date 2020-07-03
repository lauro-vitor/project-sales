<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   protected $table = 'categories';
    protected $fillable = [
        'id',
        'name', 
    ];
    public function createCategory($category) {
        $result = $this->create($category);
     
        if(isset($result)) {
            $newCategory = $this->find($result->id);
            return [
                'category' => $newCategory, 
                'message' => 'Categoria criada com sucesso', 
                'httpCode' => 201
            ];
        }
        return [
            'category' => null, 
            'message' => 'não foi possível criar categoria', 
            'httpCode' => 500
        ];
    }
    public function getById($id) {
        $result = $this->find($id);
        if(isset($result)){
            return $result;
        }
        return null;
    }
    public function getAll(){
        $categories = $this->all();
        if(isset($categories)){
            return [$categories,'httpCode' => 201];
        }
        return ['Categorias não encontradas', 'httpCode' => 404];
    }
    public function updateCategory($category, $id) {
        $newCategory = null;
        $oldCategory = $this->find($id);
        if(isset($oldCategory)) {
            $result = $oldCategory->update($category);
            if($result) {
                $newCategory = $this->getById($id);
                return ([
                    'category' => $newCategory,
                    'message' => 'Categoria atualizada com sucesso',
                    'httpCode' => 201
                ]);
            }
        }
        return ([
            'category' => null,
            'message' => 'Categoria não atualizada!',
            'httpCode' => 500
        ]);
    }
    public function destroyCategory($id){
        $category = $this->find($id);
        if(isset($category)) {
            $category->delete();
            return([
                'message' => 'Categoria removida com sucesso!', 
                'httpCode' => 201
            ]);
        }
        return([
            'message' => 'Ocorreu algum erro ao excluir categoria',
            'httpCode' => 500
        ]);
    }
}
