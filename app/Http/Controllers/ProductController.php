<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{     
    protected $product;
    public function __construct(Product $product) {
        $this->product = $product;
    }
    public function viewIndex(){
        return view('products.products');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = new Product();
        $products = $product->getAll();
        if(isset($products))
            return response()->json($products, 201);
        return reponse('Não encontrado', 404);
        //return json_encode($products->getAll());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $auxProduct = new Product();
        $product = $request->only($auxProduct->getFillable());
        $result = $auxProduct->createProduct($product);
        return json_encode($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = new Product();
        $result = $product->getById($id);
       if ($result['httpCode'] == 201) {
           return json_encode($result[0]);
       }
       return $result[0];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = $request->only($this->product->getFillable());
        $response = $this->product->updateProduct($product, $id);
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = new Product();
        $result = $product->destroyProduct($id);
        return $result;
    }
}
